<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;

    const USER_RIGHTS = 1;

    const ASSISTANT_RIGHTS = 2;

    const ADMINISTRATOR_RIGHTS = 3;

    const DOCTOR_RIGHTS = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'fields',
        'statuses',
        'is_admin',
    ];

    protected $rights = [
        self::USER_RIGHTS => 'user',
        self::ADMINISTRATOR_RIGHTS => 'administrator',
        self::ASSISTANT_RIGHTS => 'assistant',
        self::DOCTOR_RIGHTS => 'doctor',
    ];

    public function getRights() {
        return $this->rights;
    }
}
