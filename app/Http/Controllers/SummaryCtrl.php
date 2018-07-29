<?php

namespace App\Http\Controllers;

use App\Summary;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SummaryCtrl extends Controller
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
        $data = $request->all();
        if(Input::hasFile('attachment')){
            $file = Input::file('attachment');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $data['attachment'] = $filename;
            $file->move('admin/images/attachment', $filename);
        }

        Summary::create($data);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $summary = Summary::find($id);
        if ($summary->delete()){
            Helper::deleteFile('admin/images/attachment/' . $summary->attachment);
        }

        Helper::flashMessage('تم الحذف');
        return redirect()->back();
    }
}
