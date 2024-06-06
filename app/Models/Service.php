<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    use HasFactory;

    public function Subscriptions(){
        return $this->hasMany('id');
    }

    public function PaymentPackageHistories(){
        return $this->hasMany('id');
    }

    public function FriendProfitHistory(){
        return $this->hasMany('id');
    }
}
