<?php

namespace App\Http\Controllers;

use App\Book;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BookCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->get();
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create');
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
        if(Input::hasFile('cover')){
            $file = Input::file('cover');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $data['cover'] = $filename;
            $file->move('admin/images/book', $filename);
        }

        Book::create($data);
        Helper::flashMessage('تم إدخال الكتاب بنجاح');
        return redirect('book');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('admin.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('admin.book.edit', compact('book'));
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
        $old = Book::find($id);
        $new = $request->all();
        if(Input::hasFile('cover')){
            Helper::deleteFile('admin/images/book/' . $old->cover);
            $file = Input::file('cover');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $new['cover'] = $filename;
            $file->move('admin/images/book', $filename);
        }
        $old->fill($new)->update();

        Helper::flashMessage('تم التعديل');
        return redirect('book/' . $old->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if ($book->delete()){
            Helper::deleteFile('admin/images/book/' . $book->cover);
        }

        Helper::flashMessage('تم حذف الكتاب بنجاح');
        return redirect()->back();
    }
}
