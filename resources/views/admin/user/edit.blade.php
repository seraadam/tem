@extends('layouts.admin')
@section('title', 'متسخدم جديد')
@section('content')
  @include('includes.leading-title', ['title' => 'إنشاء عضو جديد'])

  <div class="">
    {!! Form::model($user, ['method' => 'PATCH', 'url' => ['user', $user->id], 'files' => true])!!}
    <div class="row">

      <div class="col-md-4">
        <div class="form-group">
          {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'الاسم', 'required', 'autofocus']) !!}
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'البريد الالكتروني', 'required']) !!}
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'الجوال', 'required']) !!}
        </div>
      </div>

    </div>

    <div class="row">
{{--
      <div class="col-md-3">
        <div class="form-group">
          {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'كلمة المرور', 'required']) !!}
        </div>
      </div> --}}

      <div class="col-md-4">
        <div class="form-group">
          {!! Form::select('is_active',[0 => 'غير مفعل', 1 => 'مفعل'], null, ['class' => 'form-control', 'placeholder' => 'الحالة', 'required',]) !!}
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          {!! Form::select('role_id',Helper::getRoles()->pluck('role', 'id'), null, ['class' => 'form-control', 'placeholder' => 'المنصب', 'required']) !!}
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          {!! Form::file('avatar', ['class' => 'form-control']) !!}
        </div>
      </div>

    </div>

    <div class="row">

    </div>

    <div class="">
      <div class="">
        <div class="form-group">
          {!! Form::submit('إضافة', ['class' => 'btn btn-success btn-block']) !!}
        </div>
      </div>
    </div>
    {!! Form::close()!!}
  </div>
@stop
