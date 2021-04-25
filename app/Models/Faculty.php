<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const IS_ACTIVE_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    public $table = 'faculties';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'short_name',
        'slug',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function facultyDepartments()
    {
        return $this->hasMany(Department::class, 'faculty_id', 'id');
    }

    public function facultyAssessments()
    {
        return $this->hasMany(Assessment::class, 'faculty_id', 'id');
    }
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
