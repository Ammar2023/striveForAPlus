<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $courses=Course::query()->orderBy("created_at","desc")->get();
        $categories=Category::all();
        $users=User::select("name")->get();
        return view("welcome",compact("courses","categories","users"));
    }

    public function filtered(Request $request){



        $courses=Course::query();
        $categories=Category::all();
        $users=User::select("id","name")->get();

        if ($request->has("category_id") && $request["category_id"]!==null){
            $courses->where("category_id",$request["category_id"]);
        }
        if ($request->has("user_id") &&$request["user_id"]!==null){
            $courses->where("user_id",$request["user_id"]);
        }
        if ($request->has("orderBy") &&$request["orderBy"]!==null){
            $courses->orderBy("created_at",$request["orderBy"]);
        }
        $courses=$courses->get();

        return view("welcome",compact("courses","categories","users"));
    }
}
