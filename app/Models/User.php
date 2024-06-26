<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id'
        ,'email'
        ,'email_verified_at'
        ,'password'
        ,'user_name'
        ,'first_name'
        ,'last_name'
        ,'gender'
        ,'avatar'
        ,'ncs_coin'
        ,'spenser_id'
        ,'birthday'
        ,'age'
        ,'country'
        ,'phone_number'
        ,'permission'
        ,'status'
        ,'remember_token'
        ,'created_at'
        ,'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'instructor' => 'integer'
        ];
    }

    public function FriendProfitHistory(){
        return $this->hasMany('id');
    }

    public function Invite(){
        return $this->hasMany('id');
    }

}
