<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolModel;
use App\Models\CourseModule;
use App\Models\Teachers;
class StudentController extends Controller
{
    public function index(){
    $course_list = CourseModule::all();
    // return $course_list;
    $student_list=SchoolModel::all();
    return view('student')->with('course_list',$course_list);
    // return response()->json(['student_list'=>$student_list]);
    }
    public function insert(Request $request){
        // return $request;
        $insert= new SchoolModel;
        $insert->st_name=$request->st_name;
        $insert->st_address=$request->st_address;
        $insert->e_mail=$request->e_mail;
        $insert->mo_num=$request->mo_num;
        $insert->coures_id=$request->coures_id;
        // return $request->coures_id;
        $insert->save();
        return response()->json(['success'=>'Student Added Successfully']); 
    }

    public function destroy($id){
        $del=SchoolModel::find($id);
        $del=$del->delete();
        return redirect('student');
    }
    public function edit($id){
        $student=SchoolModel::find($id);
        return view('edit',['student'=>$student]);
    }
    public function update(Request $request){
        // return $request;
        $student=SchoolModel::find($request->id);
        // return $student;
        $student->st_name=$request->st_name;
        $student->st_address=$request->st_address;
        $student->e_mail=$request->e_mail;
        $student->mo_num=$request->mo_num;
        $student->course_id=$request->course_id;
        $student->save();
    }
    public function student_course(){
        $course_data=CourseModule::all();
        $st_data=SchoolModel::select('id','st_name','coures_id')->get();
        return view('student_course')->with('course_data', $course_data)->with('st_data', $st_data);
        
        
    }
    public function co_st(Request $request){
        $cid=$request->id;
        $c_data= SchoolModel::where('coures_id',$cid)->get();
        return view('student_list')->with('c_data',$c_data);
    }
    public function student_show(){
        $st_list=SchoolModel::all();
        // return $st_list;
        return response()->json(['st_list'=>$st_list,]);
    }
    public function teachersInfo(){
        $data= Teachers::all();
        // return $data;
        return view('teachers')->with('data',$data);
    }
    public function addTeacher(Request $req){
        // return $req;
        $create=new Teachers;
        $create->name=$req->name;
        $create->sub=$req->sub;
        $create->contect=$req->contect;
        $create->possition=$req->possition;
        $create->save();
        return redirect('teachers')->with('message', 'Teachers Added Successfully');
    }
    public function teacherDel($id){
        $data=Teachers::find($id);
        $data->delete();
        return redirect('teachers')->with('message','Deleted Success');
    }
}
