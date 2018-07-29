<?php

namespace App\Http\Controllers;

use App\Language;
use Helper;
use Illuminate\Http\Request;

class LanguageCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::latest()->get();
        $language = null;
        return view('admin.language.index', compact('languages', 'language'));
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
        Language::create($request->all());
        Helper::flashMessage('تم إدخال لغة جديدة بنجاح');
        return redirect('language');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $language = Language::find($id);
        return view('admin.language.show', compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language = Language::find($id);
        $languages = Language::latest()->get();
        return view('admin.language.index', compact('language', 'languages'));
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
        $old = Language::find($id);
        $old->fill($request->all())->update();
        Helper::flashMessage('تم تعديل اللغة بنجاح');
        return redirect('language');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lang = Language::find($id);
        $lang->delete();
        Helper::flashMessage('تم حذف اللغة بنجاح');
        return redirect('language');
    }
}
