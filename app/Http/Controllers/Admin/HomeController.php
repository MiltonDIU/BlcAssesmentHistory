<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\ExamType;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AssessmentController;
class HomeController extends Controller
{
    public function index()
    {
        $assesments = new AssessmentController();
        $url ='http://apps.diu.edu.bd:8686/externals/rest/smis/semester-list';
        $semesters = $assesments->getApiData($url);
        $semesterData = array();
        $name = $value =$value2 ="";
        $i=0;$j=1;
        foreach ($semesters as $key=>$semester){
            $count = Assessment::where('semester',$semester['id'])->where('exam_type_id',1)->count();
            $count2 = Assessment::where('semester',$semester['id'])->where('exam_type_id',2)->count();
            if ($count>0 or $count2>0){
                $name .= '"'.$semester['semesterName'].'-'.$semester['semesterYear'].'"';
                $value .= $count;
                $value2 .= $count2;
               $i++;
                if ($i==$j){
                    $name .= ',';
                    $value .= ',';
                    $value2 .= ',';
                }
                $j++;

            }

        }

        array_push($semesterData,substr_replace($name,"",-1));
        array_push($semesterData,substr_replace($value ,"",-1));
        array_push($semesterData,substr_replace($value2 ,"",-1));

        $examData = $this->examTypeWiseValue();
        return view('dashboard',compact('examData','semesterData'));
    }
    public function notAllowed(){
        return view('not-allowed');
    }


    public function examTypeWiseValue(){
        $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
        $title =$color = $color2 = $value ="";
        $examType = ExamType::withCount('examTypeAssessments')->where('is_active',1)->get();
        $examData=array();
        foreach ($examType as $key => $item) {
            $title .= '"'.$item->title.'"';
            $value .= $item->exam_type_assessments_count;
            $color .= '"#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)].'"';
            $color2 .= '"#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)].'"';
            if (($key+1)<count($examType)){
                $title .= ',';
                $value .= ',';
                $color .= ',';
                $color2 .= ',';
            }
        }
        array_push($examData,$title);
        array_push($examData,$value);
        array_push($examData,$color);
        array_push($examData,$color2);
        return $examData;
    }
}
