<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CourseModule;
class CourseController extends Controller
{
    public function create_course(Request $request){
        $create= new CourseModule;
        $create->course_name=$request->course_name;
        $create->course_fee=$request->course_fee;
       // $id = CourseModule::create(['course_name'=>$request->course_name,'course_fee'=>$request->course_fee]);
       $create->save();
        $data= CourseModule::latest()->take(1)->get();
        return response()->json(['success'=>'Data is successfully added','data'=>$data]);
        // return redirect('course')
    }
    function fetchCoures(){
        $coures=CourseModule::all();
        return response()->json(['coures'=>$coures,]);
    }
    function del_coures($id){
        // return $id;
        $del=CourseModule::where('id',$id)->delete();
        return back();
        // return $del;
    }
}
