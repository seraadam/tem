<?php

namespace App\Http\Controllers;


use App\Book;
use App\Group;
use Illuminate\Http\Request;

class AppClientCtrl extends Controller
{
    public function getGroups(){
        $groups = Group::where('is_active', '=', 1)->latest()->get();
        $groups->load('books');
        return compact('groups');
    }

    public function getExercises(Request $request){
        $id = $request->all();
        $book = Book::find($id)->first();

        $book->load('categories');
        
        foreach ($book->categories as $category){
            $category->load('lessons');
            foreach ($category->lessons as $lesson){
                $lesson->load('exercises');
                foreach ($lesson->exercises as $exercise){
                    $exercise->load('answers', 'corrections');
                }
            }
        }

        //foreach ($book->categories as $category){
         //   $category->load('exercies');
         //   foreach($category->exercies as $exercie){
          //  	$exercie->load('answers', 'corrections');
          //  }
       // }

        return compact('book');
    }


}
