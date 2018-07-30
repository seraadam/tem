<?php

namespace App\Http\Controllers;


use App\Book;
use App\Exam;
use App\Group;
use Illuminate\Http\Request;

class AppClientCtrl extends Controller
{
    public function getGroups(){
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

}
