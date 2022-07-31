<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }
    
    public function bank()
    {
        return $this->hasOne(Bank::class);
    }

    public function virtual_card()
    {
        return $this->hasMany(VirtualCard::class);
    }

    public function airtime()
    {
        return $this->hasMany(Airtime::class);
    }

    public function beneficiary()
    {
        return $this->hasMany(Beneficiary::class);
    }

    public function betting()
    {
        return $this->hasMany(Betting::class);
    }

    public function cable()
    {
        return $this->hasMany(Cable::class);
    }

    public function card()
    {
        return $this->hasMany(Card::class);
    }

    public function data()
    {
        return $this->hasMany(Data::class);
    }

    public function deposit()
    {
        return $this->hasMany(Deposit::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function electricity()
    {
        return $this->hasMany(Electricity::class);
    }

    public function statement()
    {
        return $this->hasMany(Statement::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function transfer()
    {
        return $this->hasMany(Transfer::class);
    }

    public function kyc()
    {
        return $this->hasMany(Kyc::class);
    }
    public function view_notification()
    {
        return $this->hasMany(ViewNotification::class);
    }
}
