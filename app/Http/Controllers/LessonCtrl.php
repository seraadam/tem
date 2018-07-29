<?php

namespace App\Http\Controllers;

use App\Book;
use App\Lesson;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LessonCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $book_id = $id;
        $book = Book::find($book_id);
        $categories = $book->categories;
        return view('admin.lesson.index', compact('categories', 'book_id', 'book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $book_id = $id;
        $book = Book::find($id);
        $categories = $book->categories;

        if (count($categories) > 0){
            return view('admin.lesson.create', compact('categories', 'book_id'));
        }else{
            Helper::flashMessage('لا يمكن إدخال درس بدون تصنيف', 'error', 2);
            return redirect()->back();
        }
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
            $file->move('admin/images/lesson', $filename);
        }

        Lesson::create($data);
        Helper::flashMessage('تم الإدخال');
        return redirect('lesson/index/' . $request['book_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        return view('admin.lesson.show' , compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::find($id);
        $book_id = $lesson->category->book->id;
        $categories = $lesson->category->book->categories;
        return view('admin.lesson.edit' , compact('lesson', 'book_id', 'categories'));
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
        $old = Lesson::find($id);
        $new = $request->all();
        if(Input::hasFile('image')){
            Helper::deleteFile('admin/images/lesson/' . $old->image);
            $file = Input::file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $new['image'] = $filename;
            $file->move('admin/images/lesson', $filename);
        }
        $old->fill($new)->update();

        Helper::flashMessage('تم التعديل');
        return redirect('lesson/index/' . $old->category->book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::find($id);

        if ($lesson->delete()){
            Helper::deleteFile('admin/images/lesson/' . $lesson->image);
        }

        Helper::flashMessage('تم الحذف');
        return redirect()->back();
    }
}
