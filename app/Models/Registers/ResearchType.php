<?php

namespace App\Models\Registers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'medical_center',
        'price',
        'medical_id',
    ];

    public function medical_center()
    {
        return $this->hasOne(MedicalCenter::class, 'id', 'medical_center')->get()->first();
    }
}
