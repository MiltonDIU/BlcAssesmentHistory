<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assessment extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const DEPARTMENT_SELECT = [
        'CSE' => 'CSE',
        'SWE' => 'SWE',
    ];

    public const ERP_COURSE_SELECT = [
        'CSE'     => 'CSE',
        'CSE-112' => 'CSE-112',
    ];

    public const SEMESTER_SELECT = [
        'Spring 2021' => 'Spring 2021',
        'Fall 2021'   => 'Fall 2021',
    ];

    public const PROGRAM_SELECT = [
        'B.Sc in CSE' => 'B.Sc in CSE',
        'B.Sc in SWE' => 'B.Sc in SWE',
    ];

    public $table = 'assessments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'faculty_id',
        'exam_type_id',
        'department',
        'program',
        'semester',
        'teacherid',
        'user_id',
        'course_code',
        'course_name',
        'section_and_section_ids',
        'blc_course_link',
        'assessment_question_link',
        'assessment_link',
        'erp_course',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function exam_type()
    {
        return $this->belongsTo(ExamType::class, 'exam_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function checkExamType($course_code,$user_id,$semester){
        $assessment = Assessment::where('course_code',$course_code)->where('user_id',$user_id)->where('semester',$semester)->get();
        return count($assessment);
    }


    public static function checkExamDone($teacherid,$program,$department,$semester,$course_code){
        $assessment = Assessment::where('course_code',$course_code)->where('teacherid',$teacherid)->where('semester',$semester)->where('department',$department)->where('program',$program)->get();
        if (count($assessment)>2 or count($assessment)>3 or count($assessment)>4){
            return true;
        }else{
            return false;
        }
    }

    public static function checkExamType2($teacherid,$program,$department,$semester,$course_code,$section_and_section_ids,$exam_type_id){
//      dd($teacherid.'=='.$program.'=='.$department.'=='.$semester.'=='.$course_code.'=='.$exam_type_id);
        $assessment = Assessment::where('course_code',$course_code)
            ->where('exam_type_id',$exam_type_id)
            ->where('teacherid',$teacherid)
            ->where('semester',$semester)
            ->where('department',$department)
            ->where('program',$program)
            ->where('section_and_section_ids',$section_and_section_ids)
            ->get();
        if (count($assessment)>0){
            return true;
        }else{
            return false;
        }
    }
}
