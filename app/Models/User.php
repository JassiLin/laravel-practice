<?php

namespace App\Models;

use Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject as JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;

class User extends Authenticatable implements JWTSubject, MustVerifyEmailContract
{
    protected $fillable = [
        'name', 'phone', 'email', 'password', 'introduction', 'avatar', 'weixin_openid', 'weixin_unionid'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $hidden = [
        'password', 'remember_token', 'weixin_openid', 'weixin_unionid'
    ];
}
