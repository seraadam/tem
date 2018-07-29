<?php

namespace App\Http\Controllers;

use App\Correction;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CorrectionCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $correction = new Correction($request->all());

        if(Input::has('image')){
            $file = Input::file('image');
            $filename = time(). '.' .$file->getClientOriginalExtension();
            $file->move('admin/images/correction', $filename);
            $correction->image = $filename;
        }

        $correction->save();
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
        $correction = Correction::find($id);
        return view('admin.correction.edit', compact('correction'));
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
        $old = Correction::find($id);
        $new = $request->all();

        if(Input::has('image')){
            $file = Input::file('image');
            $filename = time(). '.' .$file->getClientOriginalExtension();
            $file->move('admin/images/correction', $filename);
            $new['image'] = $filename;
            Helper::deleteFile('admin/images/correction/' . $old->image);
        }

        $old->fill($new)->save();
        Helper::flashMessage('تم التعديل');
        return redirect('exercise/'.$old->exercise->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $correction = Correction::find($id);
        $correction->delete();
        Helper::deleteFile('admin/images/correction/' . $correction->image);
        Helper::flashMessage('تم الحذف');
        return redirect()->back();
    }
}
