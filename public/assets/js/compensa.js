//----------------------------Salary sum 100% validation----------------------------------
const submitButton = document.querySelector("#submit-button-compensa");
submitButton.addEventListener("click", (event) => {
    // let salary1 = parseInt(document.querySelector('input[name="compensa_first_beneficiary_salary"]').value);
    // let salary2 = document.querySelector('input[name="compensa_second_beneficiary_salary"]').value;
    // let salary3 = document.querySelector('input[name="compensa_third_beneficiary_salary"]').value;
    // if(salary2 == '') {
    //   salary2 = 0;
    // } else {
    //   salary2 = parseInt(salary2);
    // }
    // if(salary3 == '') {
    //   salary3 = 0;
    // } else {
    //   salary3 = parseInt(salary3);
    // }
    // if (salary1 + salary2 + salary3 != 100) {
    //   event.preventDefault();
    //   alert('Suma świadczeń wszystkich podanych beneficjentów musi wynosić 100%.');
    // }

    // compensa_select_sickness
    let selectElements1 = document.querySelectorAll(
        'input[name="compensa_select_sickness"]'
    );
    let isSelected1 = false;

    for (const element of selectElements1) {
        if (element.checked) {
            isSelected1 = true;
            break;
        }
    }
    if (!isSelected1) {
        event.preventDefault();
        alert("Musisz wybrać znacznik wejściowy.");
        return;
    }
    // compensa_select_after_end
    let selectElements2 = document.querySelectorAll(
        'input[name="compensa_select_after_end"]'
    );
    let isSelected2 = false;

    for (const element of selectElements2) {
        if (element.checked) {
            console.log("hi");

            isSelected2 = true;
            break;
        }
    }

    if (!isSelected2) {
        event.preventDefault();
        alert("Musisz wybrać znacznik wejściowy.");
        return;
    }

    // compensa_select_during
    let selectElements3 = document.querySelectorAll(
        'input[name="compensa_select_during"]'
    );
    let isSelected3 = false;

    for (const element of selectElements3) {
        if (element.checked) {
            isSelected3 = true;
            break;
        }
    }

    if (!isSelected3) {
        event.preventDefault();
        alert("Musisz wybrać znacznik wejściowy.");
        return;
    }

    // compensa_select_sms
    let selectElements4 = document.querySelectorAll(
        'input[name="compensa_select_sms"]'
    );
    let isSelected4 = false;

    for (const element of selectElements4) {
        if (element.checked) {
            isSelected4 = true;
            break;
        }
    }

    if (!isSelected4) {
        event.preventDefault();
        alert("Musisz wybrać znacznik wejściowy.");
        return;
    }

    // compensa_select_voice
    let selectElements5 = document.querySelectorAll(
        'input[name="compensa_select_voice"]'
    );
    let isSelected5 = false;
    for (const element of selectElements5) {
        if (element.checked) {
            isSelected5 = true;
            break;
        }
    }

    if (!isSelected5) {
        event.preventDefault();
        alert("Musisz wybrać znacznik wejściowy.");
        return;
    }

    // compensa_select_agree
    let selectElements6 = document.querySelectorAll(
        'input[name="compensa_select_agree"]'
    );
    let isSelected6 = false;

    for (const element of selectElements6) {
        if (element.checked) {
            isSelected6 = true;
            break;
        }
    }

    if (!isSelected6) {
        event.preventDefault();
        alert("Musisz wybrać znacznik wejściowy.");
        return;
    }
});

//----------------------------compensa_insured_person_phonenumber validation----------------------------------
const input = document.querySelector(
    'input[name="compensa_insured_person_phonenumber"]'
);

input.addEventListener("input", function () {
    let value = input.value.replace(/\D/g, "");
    value = value.slice(0, 9);
    value = value.replace(
        /(\d{3})(\d{1,3})?(\d{1,3})?/,
        function (match, p1, p2, p3) {
            let result = p1;
            if (p2) {
                result += "-" + p2;
            }
            if (p3) {
                result += "-" + p3;
            }
            return result;
        }
    );
    input.value = value;
});

//----------------------------compensa_insured_person_zip_code validation----------------------------------
const zipCode = document.getElementById("compensa_insured_person_zip_code");
zipCode.addEventListener("input", function (e) {
    const input = e.target.value;
    const digits = input.replace(/\D/g, ""); // remove non-digits from input
    const parts = [];
    parts.push(digits.slice(0, 2));
    if (digits.length > 2) {
        parts.push(digits.slice(2));
    }
    const formatted = parts.join("-"); // insert hyphen after first two digits
    e.target.value = formatted; // update input value
});

//----------------------------compensa_insured_person_correspondence_zip_code validation----------------------------------
const correspondenceZipCode = document.getElementById(
    "compensa_insured_person_correspondence_zip_code"
);
correspondenceZipCode.addEventListener("input", function (e) {
    const input = e.target.value;
    const digits = input.replace(/\D/g, ""); // remove non-digits from input
    const parts = [];
    parts.push(digits.slice(0, 2));
    if (digits.length > 2) {
        parts.push(digits.slice(2));
    }
    const formatted = parts.join("-"); // insert hyphen after first two digits
    e.target.value = formatted; // update input value
});

//----------------------------PESEL type select validation first----------------------------------
var peselTypeSelect1 = document.getElementById(
    "compensa_first_beneficiary_pesel_type"
);
var peselField1 = document.getElementById("compensa_first_beneficiary_pesel");
var birthdayField1 = document.getElementById(
    "compensa_first_beneficiary_birthday"
);

peselTypeSelect1.addEventListener("change", () => {
    if (peselTypeSelect1.value == "pesel") {
        peselField1.classList.add("d-none");
        birthdayField1.classList.add("d-none");
        peselField1.classList.remove("d-none");
    }
    if (peselTypeSelect1.value == "birthday") {
        peselField1.classList.add("d-none");
        birthdayField1.classList.add("d-none");
        birthdayField1.classList.remove("d-none");
    }
});

//----------------------------PESEL type select validation second----------------------------------
var peselTypeSelect2 = document.getElementById(
    "compensa_second_beneficiary_pesel_type"
);
var peselField2 = document.getElementById("compensa_second_beneficiary_pesel");
var birthdayField2 = document.getElementById(
    "compensa_second_beneficiary_birthday"
);

peselTypeSelect2.addEventListener("change", () => {
    if (peselTypeSelect2.value == "pesel") {
        peselField2.classList.add("d-none");
        birthdayField2.classList.add("d-none");
        peselField2.classList.remove("d-none");
    }
    if (peselTypeSelect2.value == "birthday") {
        peselField2.classList.add("d-none");
        birthdayField2.classList.add("d-none");
        birthdayField2.classList.remove("d-none");
    }
});

//----------------------------PESEL type select validation third----------------------------------
var peselTypeSelect3 = document.getElementById(
    "compensa_third_beneficiary_pesel_type"
);
var peselField3 = document.getElementById("compensa_third_beneficiary_pesel");
var birthdayField3 = document.getElementById(
    "compensa_third_beneficiary_birthday"
);

peselTypeSelect3.addEventListener("change", () => {
    if (peselTypeSelect3.value == "pesel") {
        peselField3.classList.add("d-none");
        birthdayField3.classList.add("d-none");
        peselField3.classList.remove("d-none");
    }
    if (peselTypeSelect3.value == "birthday") {
        peselField3.classList.add("d-none");
        birthdayField3.classList.add("d-none");
        birthdayField3.classList.remove("d-none");
    }
});
