<?php

namespace App\Http\Controllers;

use App\OrganizationType;
use Helper;
use Illuminate\Http\Request;

class OrganizationTypeCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = OrganizationType::latest()->get();
        $type = null;
        return view('admin.organizationType.index', compact('type', 'types'));
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
        OrganizationType::create($request->all());
        Helper::flashMessage();
        return redirect('organizationType');
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
        $types = null;
        $type = OrganizationType::find($id);
        return view('admin.organizationType.index', compact('type', 'types'));
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
        $type = OrganizationType::find($id);
        $type->fill($request->all())->update();
        Helper::flashMessage('تم التعديل بنجاح');
        return redirect('organizationType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = OrganizationType::find($id);
        $type->delete();
        Helper::flashMessage('تم الحذف بنجاح');
        return redirect('organizationType');
    }
}
