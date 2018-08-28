<?php

namespace App\Http\Controllers;


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

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['role_id'] = 2;
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;


        return response()->json(['success'=>$success], $this-> successStatus);
    }

    public function profile()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }

}
