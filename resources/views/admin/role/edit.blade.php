@extends('layouts.admin')
@section('title', 'الصلاحيات')
@section('content')
<p class="lead leading-title">اضافة صلاحية</p>
  <div class="">

    {!! Form::model($role, ['method' => 'PATCH', 'url' => ['role', $role->id]]) !!}

    <div class="row">

      <div class="col-md-2">
        <div class="form-group">
          {!! Form::text('role', null, ['class' => 'form-control', 'placeholder' => 'الصلاحية', 'autofocus', 'required']) !!}
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          {!! Form::select('can_show', [0 => 'لا', 1 => 'نعم'], null, ['class' => 'form-control', 'placeholder' => 'امكانية العرض', 'autofocus', 'required']) !!}
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          {!! Form::select('can_insert', [0 => 'لا', 1 => 'نعم'], null, ['class' => 'form-control', 'placeholder' => 'امكانية الادخال', 'autofocus', 'required']) !!}
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          {!! Form::select('can_delete', [0 => 'لا', 1 => 'نعم'], null, ['class' => 'form-control', 'placeholder' => 'امكانية الحذف', 'autofocus', 'required']) !!}
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          {!! Form::select('can_update', [0 => 'لا', 1 => 'نعم'], null, ['class' => 'form-control', 'placeholder' => 'امكانية التعديل', 'autofocus', 'required']) !!}
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          {!! Form::select('is_admin', [0 => 'لا', 1 => 'نعم'], null, ['class' => 'form-control', 'placeholder' => 'مدير موقع', 'autofocus', 'required']) !!}
        </div>
      </div>

    </div>
    <div class="">
      {!! Form::submit('تعديل', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
  </div>

  <hr>



@endsection
