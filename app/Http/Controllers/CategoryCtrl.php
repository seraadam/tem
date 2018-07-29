<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CategoryCtrl extends Controller
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
        return view('admin.category.index', compact('categories', 'book_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return $id;
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
        if(Input::hasFile('logo')){
            $file = Input::file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $data['logo'] = $filename;
            $file->move('admin/images/category', $filename);
        }

        Category::create($data);
        Helper::flashMessage('تم الإدخال');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
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
        $old = Category::find($id);
        $new = $request->all();
        if(Input::hasFile('logo')){
            Helper::deleteFile('admin/images/category/' . $old->logo);
            $file = Input::file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $new['logo'] = $filename;
            $file->move('admin/images/category', $filename);
        }
        $old->fill($new)->update();

        Helper::flashMessage('تم التعديل');
        return redirect('category/index/' . $old->book_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category->delete()){
            Helper::deleteFile('admin/images/category/' . $category->logo);
        }

        Helper::flashMessage('تم الحذف');
        return redirect()->back();
    }
}
