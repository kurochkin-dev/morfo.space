<?php

namespace App\Models;

use App\Models\Registers\BodyPart;
use App\Models\Registers\ResearchType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'template_type',
        'body_part',
        'research_type',
        'template_description',
        'template_name',
    ];

    public function body_part()
    {
        $this->hasOne(BodyPart::class, 'body_part');
    }

    public function research_type()
    {
        $this->hasOne(ResearchType::class, 'research_type');
    }

    public function user_id()
    {
        $this->hasOne(User::class, 'user_id');
    }
}
