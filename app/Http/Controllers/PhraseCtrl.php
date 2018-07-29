<?php

namespace App\Http\Controllers;

use App\Book;
use App\Phrase;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PhraseCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $book = Book::find($id);
        return view('admin.phrase.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $file->move('admin/images/phrase', $filename);
        }

        Phrase::create($data);
        Helper::flashMessage();
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
        $phrase = Phrase::find($id);
        return view('admin.phrase.edit', compact('phrase'));
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
        $old = Phrase::find($id);
        $new = $request->all();
        if(Input::hasFile('image')){
            Helper::deleteFile('admin/images/phrase/' . $old->image);
            $file = Input::file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $new['image'] = $filename;
            $file->move('admin/images/phrase', $filename);
        }
        $old->fill($new)->update();

        Helper::flashMessage('تم تعديل التصنيف بنجاح');
        return redirect('phrase/index/' . $old->book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phrase = Phrase::find($id);
        if ($phrase->delete()){
            Helper::deleteFile('admin/images/phrase/' . $phrase->image);
        }
        Helper::flashMessage('تم حذف التصنيف بنجاح');
        return redirect()->back();
    }
}
