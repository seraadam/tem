<?php

namespace App\Http\Controllers\API;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');


use App\Book;
use App\Exam;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;


class AppClientCtrl extends Controller
{
    public $successStatus = 200;

    public function getGroups(){
      $user = Auth::user();
        $groups = Group::where('is_active', '=', 1)->latest()->get();
        $groups->load('books');
        return compact('groups');
    }

    public function getBook(Request $request){
        $id = $request->all();
        $book = Book::find($id)->first();
        $book->load('categories');

        foreach ($book->categories as $category){
            $category->load('exams');
        }

//        $book->load('categories');

//        foreach ($book->categories as $category){
//            $category->load('lessons');
//            foreach ($category->lessons as $lesson){
//                $lesson->load('exercises');
//                foreach ($lesson->exercises as $exercise){
//                    $exercise->load('answers', 'corrections');
//                }
//            }
//        }

        //foreach ($book->categories as $category){
         //   $category->load('exercies');
         //   foreach($category->exercies as $exercie){
          //  	$exercie->load('answers', 'corrections');
          //  }
       // }

        return compact('book');
    }

    public function getExercise(Request $request){

        $res = 0;

        $id = $request->all();
        $exam = Exam::find($id)->first();
        $exam->load('examExercises');

        foreach ($exam->examExercises as $examExercise){
            $examExercise->load('exercise');
            $examExercise->exercise->load('answers', 'corrections');
        }

        if(count($exam->examExercises) > 0){
            $res = 1;
        }

        return compact('exam', 'res');
    }

    
    public function profile()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }

}
