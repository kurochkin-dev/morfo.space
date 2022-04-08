<?php

namespace App\Models;

use App\Models\Registers\BodyPart;
use App\Models\Registers\Color;
use App\Models\Registers\Department;
use App\Models\Registers\MedicalCenter;
use App\Models\Registers\MkbonkoRegister;
use App\Models\Registers\MkbRegister;
use App\Models\Registers\ResearchType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientCard extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'incoming_number',
        'name',
        'surname',
        'patronymic',
        'birth_date',
        'delivery_date',
        'sex',
        'medical_center',
        'department',
        'create_by_doctor',
        'diagnosis',
        'research_date',
        'technician',
        'body_part',
        'blocks_count',
        'glasses_count',
        'research_type',
        'color',
        'mkb',
        'mkbonko',
        'macro_description',
        'appointed_doctor',
        'micro_description',
        'conclusion',
        'note',
        'status',
        'email_send',
        'research_area',
        'shipment_date',
        'customer_id',
    ];

    protected $statuses_order = [
        'created' => 'cutting',
        'cutting' => 'cutting_completed',
        'cutting_completed' => 'clipping',
        'clipping' => 'clipping_completed',
        'clipping_completed' => 'completed',
    ];

    public function medical_center()
    {
        return $this->hasOne(MedicalCenter::class, 'id', 'medical_center')->first();
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department')->first();
    }

    public function technician()
    {
        return $this->hasOne(User::class, 'id', 'technician')->first();
    }

    public function body_part()
    {
        return $this->hasOne(BodyPart::class, 'id', 'body_part')->first();
    }

    public function research_type()
    {
        return $this->hasOne(ResearchType::class, 'id', 'research_type')->first();
    }

    public function mkb()
    {
        return $this->hasOne(MkbRegister::class, 'id', 'mkb')->first();
    }

    public function mkbonko()
    {
        return $this->hasOne(MkbonkoRegister::class, 'id', 'mkbonko')->first();
    }

    public function appointed_doctor()
    {
        return $this->hasOne(User::class, 'id', 'appointed_doctor')->first();
    }
}
