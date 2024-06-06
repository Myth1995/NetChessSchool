<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendProfitHistory extends Model
{
    use HasFactory;

    public function Service(){
        return $this->belongsTo(Service::class ,'package_id', 'id');
    }

    public function fromUser(){
        return $this->belongsTo(User::class ,'from','id');
    }

    public function toUser(){
        return $this->belongsTo(User::class ,'to','id');
    }
}
