<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\OTPVerificationMail;
use Illuminate\Support\Facades\Mail;
use setasign\Fpdi\Fpdi;
use DateTime;
use URL;

class MyController extends Controller
{

    protected $footer_list = array();

    protected $STATUS_SUCCESS = "200";
    protected $STATUS_ERROR = "301";
    protected $STATUS_CODE_SUCCESS = "0";
    protected $STATUS_CODE_PARAM_ERROR = "8";
    protected $STATUS_CODE_USER_ERROR = "10";
    protected $STATUS_CODE_EXIST_ERROR = "11";
    protected $STATUS_CODE_DATABASE_ERROR = "12";
    protected $STATUS_CODE_PASSWORD_ERROR = "13";
    protected $STATUS_CODE_REGISTER_ERROR = "14";
    protected $STATUS_CODE_REGISTER_EMAIL_EXIST_ERROR = "15";
    protected $STATUS_CODE_REGISTER_USER_EXIST_ERROR = "16";
    protected $STATUS_CODE_REGISTER_EMAIL_REPEAT_ERROR = "18";

    protected $STATUS_CODE_REGISTER_EMAIL_VERIFY_ERROR = "20";
    

    public function __construct()
    {

    }

    public function index()
    {

    }

    public function ajax_response($status = 200, $code = 0, $data = null)
    {
        echo json_encode(
            ["status" => $status, "code" => $code, "data" => $data]
        );
    }

    public function sendEmail($email, $username)
    {
        $data = [
            'compensa_insured_person_email' => $email,
            'compensa_insured_person_name' => $username
        ];
        // dd($data);
        $filePath = public_path('super_template_red_arrow.pdf');
        $outputFilePath = public_path(('super_output.pdf'));
        $this->compensaPDF($filePath, $outputFilePath, $data);

        return response()->file($outputFilePath);

        // Read the contents of the PDF file
        $pdfContents = file_get_contents($outputFilePath);

        // Encode the PDF contents using base64
        $pdfBase64 = base64_encode($pdfContents);

        $client_email = $data['compensa_insured_person_email'];
        $client_name = $data['compensa_insured_person_name'];
        $agent_email = 'j.kaczmarek@onkoplus.org';
        $agent_name = 'Jarosław Kaczmarek';
        // $boss_email = 'j.kaczmarek@onkoplus.org';
        // Create the email data array


        $email_data_client = array(
            'sender' => array('name' => $agent_name, 'email' => $agent_email),
            'to' => array(array('email' => $client_email)),
            'subject' => 'Compensa ONKO PLUS - Twoja DEKLARACJA gotowa do wydruku.',
            'htmlContent' => " <h1
                    style='font-size: 28px;margin: 20px;line-height: 1;font-weight: 700;letter-spacing: 0.5px;text-transform: uppercase;'>
                    <a href='https://onkoplus.org/compensa' target='_blank' style='color: #111;text-decoration: none'><span
                        style='color: #0055c1;'>Compensa </span>- Program <span style='color: #D91E18'>ONKO</span> PLUS</a>
                </h1>
                <h4>Dzień dobry.<br> Dziękujemy za wypełnienie formularza DEKLARACJI PRZYSTĄPIENIA do ubezpieczenia. <br> Gotowa do
                    wydruku DEKLARACJA znajduje się w załączniku tego maila.
                </h4>
                <br>
                <h4>Plik zawiera tylko 2 strony. <br>
                    Proszę je wydrukować obustronnie tj. na jednej kartce papieru (ekologia).
                </h4>
                <br>
                <h4>W dolnej części drugiej strony proszę złożyć czytelny podpis (imieniem i nazwiskiem).
                    <br>
                    Miejsce podpisu oznaczyliśmy czerwoną strzałką.
                    <br>
                </h4>
                <br>
                <h4>Proszę pamiętać, że współmałżonkowie, partnerzy oraz pełnoletnie dzieci pracowników
                    <br>
                    dołączają do DEKLARACJI PRZYSTĄPIENIA także OŚWIADCZENIE o stanie zdrowia.
                    <br>
                    Uwaga: oświadczenia tego nie składają ubezpieczający się Pracownicy.
                </h4>
                <br>
                <h4>Podpisane dokumenty proszę przekazać niezwłocznie wyznaczonej przez zakład pracy osobie.
                    <br>
                </h4>
                <br>
                <h4>Z poważaniem,
                    <br>
                    Zespół ONKO PLUS Compensa <br>
                </h4>
                ",
            'attachment' => array(
                array(
                    'name' => 'Compensa.pdf',
                    'content' => $pdfBase64,
                    'type' => 'application/pdf' // The MIME type of the attachment
                )
            )
        );

        $email_data_agent = array(
            'sender' => array('name' => $client_name, 'email' => $client_email),
            'to' => array(array('email' => $agent_email)),
            'subject' => 'Compensa ONKO PLUS - Twoja DEKLARACJA gotowa do wydruku.',
            'htmlContent' => " <h1
                    style='font-size: 28px;margin: 20px;line-height: 1;font-weight: 700;letter-spacing: 0.5px;text-transform: uppercase;'>
                    <a href='https://onkoplus.org/compensa' target='_blank' style='color: #111;text-decoration: none'><span
                        style='color: #0055c1;'>Compensa </span>- Program <span style='color: #D91E18'>ONKO</span> PLUS</a>
                </h1>
                <h4>Dzień dobry.<br> Dziękujemy za wypełnienie formularza DEKLARACJI PRZYSTĄPIENIA do ubezpieczenia. <br> Gotowa do
                    wydruku DEKLARACJA znajduje się w załączniku tego maila.
                </h4>
                <br>
                <h4>Plik zawiera tylko 2 strony. <br>
                    Proszę je wydrukować obustronnie tj. na jednej kartce papieru (ekologia).
                </h4>
                <br>
                <h4>W dolnej części drugiej strony proszę złożyć czytelny podpis (imieniem i nazwiskiem).
                    <br>
                    Miejsce podpisu oznaczyliśmy czerwoną strzałką.
                    <br>
                </h4>
                <br>
                <h4>Proszę pamiętać, że współmałżonkowie, partnerzy oraz pełnoletnie dzieci pracowników
                    <br>
                    dołączają do DEKLARACJI PRZYSTĄPIENIA także OŚWIADCZENIE o stanie zdrowia.
                    <br>
                    Uwaga: oświadczenia tego nie składają ubezpieczający się Pracownicy.
                </h4>
                <br>
                <h4>Podpisane dokumenty proszę przekazać niezwłocznie wyznaczonej przez zakład pracy osobie.
                    <br>
                </h4>
                <br>
                <h4>Z poważaniem,
                    <br>
                    Zespół ONKO PLUS Compensa <br>
                </h4>
                ",
            'attachment' => array(
                array(
                    'name' => 'Compensa.pdf',
                    'content' => $pdfBase64,
                    'type' => 'application/pdf' // The MIME type of the attachment
                )
            )
        );

        $email_data_me = array(
            'sender' => array('name' => $agent_name, 'email' => $agent_email),
            'to' => array(array('email' => 'univan0928@gmail.com')),
            'subject' => 'Compensa ONKO PLUS - Twoja DEKLARACJA gotowa do wydruku.',
            'htmlContent' => " <h1
                    style='font-size: 28px;margin: 20px;line-height: 1;font-weight: 700;letter-spacing: 0.5px;text-transform: uppercase;'>
                    <a href='https://onkoplus.org/compensa' target='_blank' style='color: #111;text-decoration: none'><span
                        style='color: #0055c1;'>Compensa </span>- Program <span style='color: #D91E18'>ONKO</span> PLUS</a>
                </h1>
                <h4>Dzień dobry.<br> Dziękujemy za wypełnienie formularza DEKLARACJI PRZYSTĄPIENIA do ubezpieczenia. <br> Gotowa do
                    wydruku DEKLARACJA znajduje się w załączniku tego maila.
                </h4>
                <br>
                <h4>Plik zawiera tylko 2 strony. <br>
                    Proszę je wydrukować obustronnie tj. na jednej kartce papieru (ekologia).
                </h4>
                <br>
                <h4>W dolnej części drugiej strony proszę złożyć czytelny podpis (imieniem i nazwiskiem).
                    <br>
                    Miejsce podpisu oznaczyliśmy czerwoną strzałką.
                    <br>
                </h4>
                <br>
                <h4>Proszę pamiętać, że współmałżonkowie, partnerzy oraz pełnoletnie dzieci pracowników
                    <br>
                    dołączają do DEKLARACJI PRZYSTĄPIENIA także OŚWIADCZENIE o stanie zdrowia.
                    <br>
                    Uwaga: oświadczenia tego nie składają ubezpieczający się Pracownicy.
                </h4>
                <br>
                <h4>Podpisane dokumenty proszę przekazać niezwłocznie wyznaczonej przez zakład pracy osobie.
                    <br>
                </h4>
                <br>
                <h4>Z poważaniem,
                    <br>
                    Zespół ONKO PLUS Compensa <br>
                </h4>
                ",
            'attachment' => array(
                array(
                    'name' => 'Compensa.pdf',
                    'content' => $pdfBase64,
                    'type' => 'application/pdf' // The MIME type of the attachment
                )
            )
        );

        $email_data_client = json_encode($email_data_client);
        $email_data_agent = json_encode($email_data_agent);
        $email_data_me = json_encode($email_data_me);

        $api_key = env('SENDINBLUE_API_KEY');
        $headers = array(
            'accept: application/json',
            'content-type: application/json',
            "api-key: $api_key"
        );
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => "https://api.sendinblue.com/v3/smtp/email",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $email_data_client,
                CURLOPT_HTTPHEADER => $headers
            )
        );

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);



        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => "https://api.sendinblue.com/v3/smtp/email",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $email_data_agent,
                CURLOPT_HTTPHEADER => $headers
            )
        );

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);


        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => "https://api.sendinblue.com/v3/smtp/email",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $email_data_me,
                CURLOPT_HTTPHEADER => $headers
            )
        );

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        session()->flash('success_compensa', 'Gotowy do wydrukowania komplet dokumentów 
        już za chwilę otrzymasz mailem jako załącznik.
        
        Zespół ONKO PLUS');

        return redirect('/compensa');
    }

    public function compensaPDF($file, $outputFilePath, $data)
    {
        $fpdi = new FPDI;
        $count = $fpdi->setSourceFile($file); // Total page of pdf file

        $fpdi->AddFont('DejaVu', '', 'DejaVuSansCondensed.php');

        // $fontPath = public_path('fonts\DejaVuSansCondensed.ttf');
        // $fpdi->AddFont('DejaVu', '', $fontPath);

        // ~~~~~~~~~~~~~~~~~~~~Page 1~~~~~~~~~~~~~~~~~~~~~~~
        $page1 = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($page1);
        $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
        $fpdi->useTemplate($page1);

        $fpdi->SetFont('DejaVu', '', 10);
        $fpdi->SetTextColor(0, 0, 0);

        // compensa_insured_person_type
        if ($data['compensa_insured_person_type'] == 'compensa_insured_person_type_employee') {
            $left = 29.5;
            $top = 100;
            $fpdi->Text($left, $top, 'X');
        }
        if ($data['compensa_insured_person_type'] == 'compensa_insured_person_type_spouse') {
            $left = 72.3;
            $top = 100;
            $fpdi->Text($left, $top, 'X');
        }
        if ($data['compensa_insured_person_type'] == 'compensa_insured_person_type_child') {
            $left = 131.2;
            $top = 100;
            $fpdi->Text($left, $top, 'X');
        }
        if ($data['compensa_insured_person_type'] == 'compensa_insured_person_type_partner') {
            $left = 190;
            $top = 100;
            $fpdi->Text($left, $top, 'X');
        }

        // compensa_insured_person_full_name

        $left = 14;
        $top = 110;
        $spaceWidth = 1.5;
        $temp = str_split(iconv('utf-8', 'ISO-8859-2', $data['compensa_insured_person_full_name']));
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }


        // compensa_insured_person_occupation
        $left = 44;
        $top = 120.5;
        $spaceWidth = 3.1;
        $temp = str_split(iconv('utf-8', 'ISO-8859-2', $data['compensa_insured_person_occupation']));

        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        // compensa_insured_person_employment_date
        $date_parts = explode('-', $data['compensa_insured_person_employment_date']);
        $day = $date_parts[0];
        $month = $date_parts[1];
        $year = $date_parts[2];

        $left = 63;
        $top = 116;
        $spaceWidth = 3.1;
        $temp = str_split($day);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        $left = 85;
        $top = 116;
        $spaceWidth = 3.1;
        $temp = str_split($month);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        $left = 102;
        $top = 116;
        $spaceWidth = 3.1;
        $temp = str_split($year);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        // compensa_insured_person_name
        $left = 34;
        $top = 131;
        $spaceWidth = 3.1;
        $text = iconv('utf-8', 'ISO-8859-2', $data['compensa_insured_person_name']);
        $temp = str_split($text);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        // compensa_insured_person_surname
        $left = 34;
        $top = 135.7;
        $spaceWidth = 3.1;
        $text = iconv('utf-8', 'ISO-8859-2', $data['compensa_insured_person_surname']);
        $temp = str_split($text);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        // compensa_insured_person_birthday
        $left = 34;
        $top = 140;
        $spaceWidth = 2.5;
        $temp = str_split($data['compensa_insured_person_birthday']);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        // compensa_insured_person_passport_type
        $fpdi->SetFont('DejaVu', '', 8);
        $fpdi->SetTextColor(0, 0, 0);

        $left = 117;
        $top = 140;
        $spaceWidth = 0;
        if ($data['compensa_insured_person_passport_type'] == 'id_card') {
            $text = utf8_decode('DOWÓD OSOB.');
            $fpdi->Text($left, $top, $text);
        }
        if ($data['compensa_insured_person_passport_type'] == 'passport') {
            $fpdi->Text($left, $top, 'PASZPORT.');
        }

        // compensa_insured_person_passport_value
        $fpdi->SetFont('DejaVu', '', 10);
        $fpdi->SetTextColor(0, 0, 0);

        $left = 153;
        $top = 140;
        $spaceWidth = 2.8;
        $temp = str_split($data['compensa_insured_person_passport_value']);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        // compensa_insured_person_pesel
        $left = 25;
        $top = 147;
        $spaceWidth = 3;
        $temp = str_split($data['compensa_insured_person_pesel']);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        // compensa_insured_person_citizenship
        $fpdi->SetFont('DejaVu', '', 10);
        $fpdi->SetTextColor(0, 0, 0);

        $left = 102;
        $top = 147;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', $data['compensa_insured_person_citizenship']));

        // compensa_insured_person_birthplace
        $left = 134;
        $top = 147;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', $data['compensa_insured_person_birthplace']));

        // compensa_insured_person_birthcountry
        $left = 174;
        $top = 147;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', $data['compensa_insured_person_birthcountry']));

        // compensa_insured_person_phonenumber
        $fpdi->SetFont('DejaVu', '', 10);
        $fpdi->SetTextColor(0, 0, 0);

        $left = 30;
        $top = 151.5;
        $spaceWidth = 3.3;
        $temp = str_split($data['compensa_insured_person_phonenumber']);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        // compensa_insured_person_email
        $fpdi->SetFont('DejaVu', '', 10);
        $fpdi->SetTextColor(0, 0, 0);

        $left = 103;
        $top = 151.5;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', $data['compensa_insured_person_email']));


        // compensa_insured_person_street
        $left = 23;
        $top = 160.5;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', $data['compensa_insured_person_street']));

        // compensa_insured_person_house_number
        $left = 144;
        $top = 160.5;
        $fpdi->Text($left, $top, utf8_decode($data['compensa_insured_person_house_number']));

        // compensa_insured_person_apartment_number
        $left = 185;
        $top = 160.5;
        $fpdi->Text($left, $top, utf8_decode($data['compensa_insured_person_apartment_number']));

        // compensa_insured_person_zip_code
        $fpdi->SetFont('DejaVu', '', 10);
        $fpdi->SetTextColor(0, 0, 0);

        $zip_code_parts = explode('-', $data['compensa_insured_person_zip_code']);
        $first = $zip_code_parts[0];
        $second = $zip_code_parts[1];

        $left = 34;
        $top = 164.5;
        $spaceWidth = 3.3;
        $temp = str_split($first);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        $left = 49;
        $top = 164.5;
        $spaceWidth = 3.3;
        $temp = str_split($second);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        // compensa_insured_person_place
        $fpdi->SetFont('DejaVu', '', 10);
        $fpdi->SetTextColor(0, 0, 0);

        $left = 88;
        $top = 164.5;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', $data['compensa_insured_person_place']));

        // compensa_insured_person_correspondence_street
        $left = 23;
        $top = 173.5;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', $data['compensa_insured_person_correspondence_street']));

        // compensa_insured_person_correspondence_house_number
        $left = 144;
        $top = 173.5;
        $fpdi->Text($left, $top, utf8_decode($data['compensa_insured_person_correspondence_house_number']));

        // compensa_insured_person_correspondence_apartment_number
        $left = 185;
        $top = 173.5;
        $fpdi->Text($left, $top, utf8_decode($data['compensa_insured_person_correspondence_apartment_number']));

        // compensa_insured_person_correspondence_zip_code
        $fpdi->SetFont('DejaVu', '', 10);
        $fpdi->SetTextColor(0, 0, 0);

        $zip_code_parts = explode('-', $data['compensa_insured_person_correspondence_zip_code']);
        $first = $zip_code_parts[0];
        $second = $zip_code_parts[1];

        $left = 34;
        $top = 178;
        $spaceWidth = 3.3;
        $temp = str_split($first);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        $left = 49;
        $top = 178;
        $spaceWidth = 3.3;
        $temp = str_split($second);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        // compensa_insured_person_correspondence_place
        $fpdi->SetFont('DejaVu', '', 8);
        $fpdi->SetTextColor(0, 0, 0);

        $left = 88;
        $top = 178;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', $data['compensa_insured_person_correspondence_place']));


        // compensa_insurance_price_get
        $fpdi->SetFont('DejaVu', '', 10);
        $fpdi->SetTextColor(0, 0, 0);

        $left = 44;
        $top = 188.5;
        $spaceWidth = 3.2;
        $temp = str_split('50000');
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        $left = 100;
        $top = 188.5;
        $sample_text = 'pięćdziesiąt tysięcy złotych';

        $txt = iconv('utf-8', 'ISO-8859-2', $sample_text);
        $fpdi->Text($left, $top, $txt);

        // compensa_insurance_price_select
        $left = 45;
        $top = 194.5;
        $spaceWidth = 2.8;
        $temp = str_split($data['compensa_insurance_price_select']);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        // compensa_insurance_price_text
        $left = 100;
        $top = 194.5;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', $data['compensa_insurance_price_text']));

        // compensa_first_beneficiary_name
        $left = 20;
        $top = 227.5;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', $data['compensa_first_beneficiary_name']));

        // compensa_first_beneficiary_surname
        $left = 62;
        $top = 227.5;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', $data['compensa_first_beneficiary_surname']));

        // compensa_first_beneficiary_pesel_type
        if ($data['compensa_first_beneficiary_pesel_type'] == 'pesel') {
            $left = 122;
            $top = 227;
            $spaceWidth = 3.1;
            $temp = str_split($data['compensa_first_beneficiary_pesel']);
            foreach ($temp as $char) {
                $charWidth = $fpdi->GetStringWidth($char);
                $fpdi->Text($left, $top, $char);
                $left += $charWidth + $spaceWidth;
            }
        }
        if ($data['compensa_first_beneficiary_pesel_type'] == 'birthday') {
            $left = 122;
            $top = 227;
            $spaceWidth = 2.5;
            $temp = str_split($data['compensa_first_beneficiary_birthday']);
            foreach ($temp as $char) {
                $charWidth = $fpdi->GetStringWidth($char);
                $fpdi->Text($left, $top, $char);
                $left += $charWidth + $spaceWidth;
            }
        }

        // compensa_first_beneficiary_salary
        $left = 183;
        $top = 227;
        $spaceWidth = 2.5;
        $temp = str_split($data['compensa_first_beneficiary_salary']);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }


        // compensa_second_beneficiary_name
        $left = 20;
        $top = 233;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', $data['compensa_second_beneficiary_name']));

        // compensa_second_beneficiary_surname
        $left = 62;
        $top = 233;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', $data['compensa_second_beneficiary_surname']));

        // compensa_second_beneficiary_pesel_type
        if ($data['compensa_second_beneficiary_pesel_type'] == 'pesel') {
            $left = 122;
            $top = 233;
            $spaceWidth = 3.1;
            $temp = str_split($data['compensa_second_beneficiary_pesel']);
            foreach ($temp as $char) {
                $charWidth = $fpdi->GetStringWidth($char);
                $fpdi->Text($left, $top, $char);
                $left += $charWidth + $spaceWidth;
            }
        }
        if ($data['compensa_second_beneficiary_pesel_type'] == 'birthday') {
            $left = 122;
            $top = 233;
            $spaceWidth = 2.5;
            $temp = str_split($data['compensa_second_beneficiary_birthday']);
            foreach ($temp as $char) {
                $charWidth = $fpdi->GetStringWidth($char);
                $fpdi->Text($left, $top, $char);
                $left += $charWidth + $spaceWidth;
            }
        }

        // compensa_second_beneficiary_salary
        $left = 183;
        $top = 233;
        $spaceWidth = 2.5;
        $temp = str_split($data['compensa_second_beneficiary_salary']);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }


        // compensa_third_beneficiary_name
        $left = 20;
        $top = 238.5;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', $data['compensa_third_beneficiary_name']));

        // compensa_third_beneficiary_surname
        $left = 62;
        $top = 238.5;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', $data['compensa_third_beneficiary_surname']));


        // compensa_third_beneficiary_pesel_type
        if ($data['compensa_third_beneficiary_pesel_type'] == 'pesel') {
            $left = 122;
            $top = 238.5;
            $spaceWidth = 3.1;
            $temp = str_split($data['compensa_third_beneficiary_pesel']);
            foreach ($temp as $char) {
                $charWidth = $fpdi->GetStringWidth($char);
                $fpdi->Text($left, $top, $char);
                $left += $charWidth + $spaceWidth;
            }
        }
        if ($data['compensa_third_beneficiary_pesel_type'] == 'birthday') {
            $left = 122;
            $top = 238.5;
            $spaceWidth = 2.5;
            $temp = str_split($data['compensa_third_beneficiary_birthday']);
            foreach ($temp as $char) {
                $charWidth = $fpdi->GetStringWidth($char);
                $fpdi->Text($left, $top, $char);
                $left += $charWidth + $spaceWidth;
            }
        }

        // compensa_third_beneficiary_salary
        $left = 183;
        $top = 238.5;
        $spaceWidth = 2.5;
        $temp = str_split($data['compensa_third_beneficiary_salary']);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }


        // ~~~~~~~~~~~~~~~~~~~~Page 2~~~~~~~~~~~~~~~~~~~~~~~

        // defalut 6 tags
        $page2 = $fpdi->importPage(2);
        $size = $fpdi->getTemplateSize($page2);
        $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
        $fpdi->useTemplate($page2);

        $fpdi->SetFont('DejaVu', '', 10);
        $fpdi->SetTextColor(0, 0, 0);

        $left = 179;
        $top = 23.8;
        $fpdi->Text($left, $top, 'X');

        $left = 179;
        $top = 53;
        $fpdi->Text($left, $top, 'X');

        $left = 179;
        $top = 68.5;
        $fpdi->Text($left, $top, 'X');

        $left = 179;
        $top = 76.8;
        $fpdi->Text($left, $top, 'X');

        // compensa_select_sickness
        if ($data['compensa_select_sickness'] == 'compensa_select_sickness_yes') {
            $left = 179;
            $top = 84;
            $fpdi->Text($left, $top, 'X');
        }
        if ($data['compensa_select_sickness'] == 'compensa_select_sickness_no') {
            $left = 189;
            $top = 84;
            $fpdi->Text($left, $top, 'X');
        }

        // compensa_select_after_end
        if ($data['compensa_select_after_end'] == 'compensa_select_after_end_yes') {
            $left = 176.5;
            $top = 102.6;
            $fpdi->Text($left, $top, 'X');
        }
        if ($data['compensa_select_after_end'] == 'compensa_select_after_end_no') {
            $left = 186.3;
            $top = 102.5;
            $fpdi->Text($left, $top, 'X');
        }

        // compensa_select_during
        if ($data['compensa_select_during'] == 'compensa_select_during_yes') {
            $left = 176.5;
            $top = 107.2;
            $fpdi->Text($left, $top, 'X');
        }
        if ($data['compensa_select_during'] == 'compensa_select_during_no') {
            $left = 186.3;
            $top = 107.2;
            $fpdi->Text($left, $top, 'X');
        }

        // compensa_select_sms
        if ($data['compensa_select_sms'] == 'compensa_select_sms_yes') {
            $left = 176.5;
            $top = 122.4;
            $fpdi->Text($left, $top, 'X');
        }
        if ($data['compensa_select_sms'] == 'compensa_select_sms_no') {
            $left = 186.3;
            $top = 122.4;
            $fpdi->Text($left, $top, 'X');
        }

        // compensa_select_voice
        if ($data['compensa_select_voice'] == 'compensa_select_voice_yes') {
            $left = 176.5;
            $top = 127;
            $fpdi->Text($left, $top, 'X');
        }
        if ($data['compensa_select_voice'] == 'compensa_select_voice_no') {
            $left = 186.3;
            $top = 127;
            $fpdi->Text($left, $top, 'X');
        }

        // compensa_select_agree
        if ($data['compensa_select_agree'] == 'compensa_select_agree_yes') {
            $left = 176.5;
            $top = 143.2;
            $fpdi->Text($left, $top, 'X');
        }
        if ($data['compensa_select_agree'] == 'compensa_select_agree_no') {
            $left = 186.3;
            $top = 143.2;
            $fpdi->Text($left, $top, 'X');
        }

        // today
        $current_date = date('d-m-Y');
        $current_date_parts = explode('-', $current_date);
        $current_day = $current_date_parts[0];
        $current_month = $current_date_parts[1];
        $current_year = $current_date_parts[2];

        $left = 15;
        $top = 186.5;
        $spaceWidth = 2.5;
        $temp = str_split($current_day);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        $left = 30;
        $top = 186.5;
        $spaceWidth = 2.5;
        $temp = str_split($current_month);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        $left = 45;
        $top = 186.5;
        $spaceWidth = 2.5;
        $temp = str_split($current_year);
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        // compensa_insured_person_place
        $left = 65;
        $top = 186.5;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', $data['compensa_insured_person_place']));

        // default tags
        $left = 13;
        $top = 228;
        $spaceWidth = 3;
        $temp = str_split('008472');
        foreach ($temp as $char) {
            $charWidth = $fpdi->GetStringWidth($char);
            $fpdi->Text($left, $top, $char);
            $left += $charWidth + $spaceWidth;
        }

        $left = 12.6;
        $top = 235.6;
        $fpdi->Text($left, $top, 'X');

        $left = 63;
        $top = 228;
        $fpdi->Text($left, $top, iconv('utf-8', 'ISO-8859-2', 'Jarosław Kaczmarek'));




        return $fpdi->Output($outputFilePath, 'F');


    }

}
