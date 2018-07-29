<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Helper;
use Illuminate\Support\Facades\Input;

class GroupCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::latest()->get();
        return view('admin.group.index', compact('groups'));
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
        if(Input::hasFile('logo')){
            $file = Input::file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $data['logo'] = $filename;
            $file->move('admin/images/group', $filename);
        }

        Group::create($data);
        Helper::flashMessage('تم إدخال التصنيف بنجاح');
        return redirect('group');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);
        return view('admin.group.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        return view('admin.group.edit', compact('group'));
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
        $old = Group::find($id);
        $new = $request->all();
        if(Input::hasFile('logo')){
            Helper::deleteFile('admin/images/group/' . $old->logo);
            $file = Input::file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $new['logo'] = $filename;
            $file->move('admin/images/group', $filename);
        }
        $old->fill($new)->update();

        Helper::flashMessage('تم تعديل التصنيف بنجاح');
        return redirect('group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        if ($group->delete()){
            Helper::deleteFile('admin/images/group/' . $group->logo);
        }
        Helper::flashMessage('تم حذف التصنيف بنجاح');
        return redirect('group');
    }
}
