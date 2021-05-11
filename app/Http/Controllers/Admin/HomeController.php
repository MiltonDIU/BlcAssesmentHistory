<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\ExamType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        if (auth()->user()->is_admin) {
            $semesterData = $this->semesterWiseData();
            $examData = $this->examTypeWiseValue();
        }else{
            $semesterData = $this->semesterWiseDataByTeacher();
            $examData = $this->examTypeWiseValueByTeacher();
        }
        return view('dashboard',compact('examData','semesterData'));
    }
    public function semesterWiseData(){
        $url ='http://apps.diu.edu.bd:8686/externals/rest/smis/semester-list';
        $semesters = $this->getApiData($url);
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

        return $semesterData;
    }

    public function semesterWiseDataByTeacher(){
        $url ='http://apps.diu.edu.bd:8686/externals/rest/smis/semester-list';
        $semesters = $this->getApiData($url);
        $semesterData = array();
        $name = $value =$value2 ="";
        $i=0;$j=1;
        foreach ($semesters as $key=>$semester){
            $count = Assessment::where('user_id',Auth::id())->where('semester',$semester['id'])->where('exam_type_id',1)->count();
            $count2 = Assessment::where('user_id',Auth::id())->where('semester',$semester['id'])->where('exam_type_id',2)->count();
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
        return $semesterData;
    }
    public function notAllowed(){
        return view('not-allowed');
    }

    public function getApiData($url){

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'clientId: d7aea3a47a474f8f9f53b85ae0adb3d4',
                'clientSecret: 1d9fe966-5f38-44a1-a277-9acb2943901a',
                'Cookie: JSESSIONID=5FCA72D6B7FBAD4EA53200554B71820C'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
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



    public function examTypeWiseValueByTeacher(){
        $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
        $title =$color = $color2 = $value ="";

        $examType = ExamType::withCount('examTypeAssessments')->where('is_active',1)->get();

        $examData=array();
        foreach ($examType as $key => $item) {
            $title .= '"'.$item->title.'"';
//            $value .= $item->exam_type_assessments_count;
            $value .= Assessment::where('user_id',Auth::id())->where('exam_type_id',$item->id)->count();
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
