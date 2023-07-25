<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $courses=Course::where("user_id",auth()->id())->get();
        return view("course.index",compact("courses"));
    }

    public function create(){
        $categories=Category::all();
        return view("course.create",compact("categories"));
    }


    public function store(Request $request){

        $fileName = time() . '.' . $request->file("image")->extension();
        $request->file("image")->storeAs("public/images",$fileName);




        $course=new Course();
        $course->name=$request["name"];
        $course->category_id=$request["category_id"];
        $course->user_id=auth()->id();
        $course->max=$request["max"];
        $course->image=$fileName;
        $course->price=$request["price"];
        $course->save();

        return redirect()->route("course.index");
    }

    public function edit(Course $course){
        $categories=Category::all();
        return view("course.edit",compact("course","categories"));
    }

    public function update(Request $request, Course $course){
        $course->name=$request["name"];
        $course->category_id=$request["category_id"];
        $course->user_id=auth()->id();
        $course->max=$request["max"];
        $course->price=$request["price"];
        $course->save();
        return redirect()->route("course.index");
    }
}
