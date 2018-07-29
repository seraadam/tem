<?php

namespace App\Http\Controllers;

use App\Organization;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class OrganizationCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organization::latest()->get();
        return view('admin.organization.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organization.create');
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
        if(Input::hasFile('avatar')){
            $file = Input::file('avatar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $data['avatar'] = $filename;
            $file->move('admin/images/organization', $filename);
        }

        Organization::create($data);
        Helper::flashMessage();
        return redirect('organization');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organization = Organization::find($id);
        return view('admin.organization.show', compact('organization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $organization = Organization::find($id);
        return view('admin.organization.edit', compact('organization'));
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
        $organization= Organization::find($id);
        $data = $request->all();
        if(Input::hasFile('avatar')){
            Helper::deleteFile('admin/images/organization/'. $organization->avatar);
            $file = Input::file('avatar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $data['avatar'] = $filename;
            $file->move('admin/images/organization', $filename);
        }

        $organization->fill($data)->update();
        Helper::flashMessage('تم التعديل');
        return redirect('organization');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Organization::find($id);
        if ($group->delete()){
            Helper::deleteFile('admin/images/organization/' . $group->avatar);
        }
        Helper::flashMessage('تم الحذف ');
        return redirect('organization');
    }
}
