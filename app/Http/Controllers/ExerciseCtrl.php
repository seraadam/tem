<?php

namespace App\Http\Controllers;

use App\Book;
use App\Exercise;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ExerciseCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $book = Book::find($id);
        $exercises = Exercise::latest()->get();
        return view('admin.exercise.index', compact('book', 'exercises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $book = Book::find($id);
        return view('admin.exercise.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if(Input::hasFile('image')){
            $file = Input::file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $data['image'] = $filename;
            $file->move('admin/images/exercise', $filename);
        }

        $exercise = new Exercise($data);
        $exercise->save();
        Helper::flashMessage();
        return redirect('exercise/' . $exercise->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exercise = Exercise::find($id);
        return view('admin.exercise.show', compact('exercise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exercise = Exercise::find($id);
        $book = $exercise->lesson->category->book;
        return view('admin.exercise.edit', compact('exercise', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $old = Exercise::find($id);
        $new = $request->all();
        if(Input::hasFile('image')){
            Helper::deleteFile('admin/images/exercise/' . $old->image);
            $file = Input::file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $new['image'] = $filename;
            $file->move('admin/images/exercise', $filename);
        }
        $old->fill($new)->update();

        Helper::flashMessage('تم التعديل');
        return redirect('exercise/' . $old->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exercise = Exercise::find($id);
        if ($exercise->delete()){
            Helper::deleteFile('admin/images/exercise/' . $exercise->image);
        }

        Helper::flashMessage('تم الحذف');
        return redirect()->back();
    }
}
