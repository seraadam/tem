<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\User;
use Helper;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Validator;


class UserCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make(
        //   ['name' => 'Dayle'],
        //   ['name' => 'required|min:5']
        // );

        $user = new User();
        $user->name = $request['name'];
        $user->mobile = $request['mobile'];
        $user->email = $request['email'];
        $user->role_id = $request['role_id'];
        $user->is_active = $request['is_active'];
        $user->password = Hash::make($request['password']);

         if(Input::hasFile('avatar')){
           $file = Input::file('avatar');
//           $filename = $file->store('avatar');
           $filename = time() . '.' . $file->getClientOriginalExtension();
           $file->move('admin/images/staff', $filename);
           $user->avatar = $filename;
         }

         if ($user->save()) {
           Helper::flashMessage('تم إدخال العضو بنجاح', 'success', 2);
           return redirect('user');
         }else {
           Helper::flashMessage('مشكلة في الإدخال', 'success', 2);
           return redirect('user');
         }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
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

      $old = User::find($id);
      $new = $request->all();

      // $user = User::find($id);
      // $user->name = $request['name'];
      // $user->mobile = $request['mobile'];
      // $user->email = $request['email'];
      // $user->role_id = $request['role_id'];
      // $user->is_active = $request['is_active'];
      // $user->password = Hash::make($request['password']);


       if(Input::hasFile('avatar')){
         if ($old->avatar) {
           Helper::deleteFile('admin/images/staff/' . $old->avatar);
         }

         $file = Input::file('avatar');
         $filename = $file->store('avatar');
         $filename = time() . '.' . $file->getClientOriginalExtension();
         $file->move('admin/images/staff', $filename);
         $new['avatar'] = $filename;
       }

       $old->fill($new)->save();

      Helper::flashMessage('تم تعديل العضو بنجاح', 'success', 2);
      return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $user = User::find($id);
      if ($user->delete()) {
        Helper::deleteFile('admin/images/staff/' . $user->avatar);
      }else {
        Helper::flashMessage('لم يتم حذف العضو راجع المبرمج', 'error', 2);
      }
      return redirect('user');
    }
}
