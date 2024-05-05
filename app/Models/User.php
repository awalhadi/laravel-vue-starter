<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'first_name',
      'last_name',
      'email',
      'phone',
      'gender',
      'password',
      'avatar',
      'type',
      'status',
      'email_verified_at',
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
        ];
    }


    //--------------------------------- Start constants -----------------------------------

    public const STATUS_ACTIVE      = 'active';
    public const STATUS_INACTIVE    = 'inactive';
    public const FILE_STORE_PATH    = 'users';
    public const TYPE_STUDENT       = 'Student';
    public const TYPE_ADMIN         = 'Admin';
    public const TYPE_STAFF         = 'Staff';
    public const TYPE_INSTRUCTOR    = 'Instructor';

    public const TYPES = [
        self::TYPE_STUDENT,
        self::TYPE_ADMIN,
        self::TYPE_STAFF,
        self::TYPE_INSTRUCTOR,
    ];

    public const GENDER_FEMALE  = '0';
    public const GENDER_MALE    = '1';
    public const GENDER_OTHER   = '2';

    public const GENDERS = [
        self::GENDER_FEMALE     => 'Female',
        self::GENDER_MALE       => 'Male',
        self::GENDER_OTHER      => 'Other',
    ];

    //--------------------------------- End constants -----------------------------------
}
