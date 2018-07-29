@extends('layouts.admin')
@section('title', 'الصلاحيات')
@section('content')

  @include('includes.leading-title', ['title' => 'اضافة صلاحية'])

  <div class="">

    {!! Form::open(['url' => 'role']) !!}

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
      {!! Form::submit('اضافة', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}
  </div>

  <hr>

  <div>

      <table class="table table-bordered table-striped table-hover">
          <thead>
              <tr>
                  <th>/</th>
                  <th>الصلاحية</th>
                  <th>عدد المستخدمين</th>
                  <th> العرض</th>
                  <th> الحذف</th>
                  <th> التعديل</th>
                  <th> الادخال</th>
                  <th>مدير موقع</th>
                  <th>التاريخ</th>
                  <th>العمليات</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($roles as $role)
                <tr>
                  <td>{{ $role->id }}</td>
                  <td>{{ $role->role }}</td>
                  <td>{{ $role->users->count() }}</td>
                  <td>{{ Helper::convertBoolValue($role->can_show) }}</td>
                  <td>{{ Helper::convertBoolValue($role->can_delete) }}</td>
                  <td>{{ Helper::convertBoolValue($role->can_update) }}</td>
                  <td>{{ Helper::convertBoolValue($role->can_insert) }}</td>
                  <td>{{ Helper::convertBoolValue($role->is_admin) }}</td>
                  <td>{{ \Carbon\Carbon::parse($role->created_at)->diffForHumans() }}</td>
                  <td>
                     <div class="row">
                       <div class="col-md-4">
                         <a href="{{ url('role/'. $role->id .'/edit')}}" class="btn btn-primary">
                           {{-- <i class="fas fa-pen-square"></i> --}}
                           تعديل
                         </a>
                       </div>
                       <div class="col-md-4">
                         @if (!$role->is_admin)
                           {!! Form::open(['method' => 'DELETE', 'url' => ['role', $role->id]]) !!}
                           {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                           {!! Form::close() !!}
                         @endif
                       </div>
                     </div>
                  </td>
                </tr>
              @endforeach
          </tbody>
      </table>

  </div>

@endsection
