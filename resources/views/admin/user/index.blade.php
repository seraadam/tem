@extends('layouts.admin')
@section('title', 'ادارة المستخدمين')
@section('content')

    @include('includes.leading-title', ['title' => 'إدارة المستخدمين'])
    <div class="">
        <a href="{{ url('user/create') }}" class="btn btn-success btn-lg">
            <i class="fas fa-user-plus"></i>
            مستخدم جديد
        </a>
    </div>
    <hr>
    <div>

        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                  <td>#</td>
                  <td>الإسم</td>
                  <td>الجوال</td>
                  <td>البريد الالكتروني</td>
                  <td>الصورة الشخصية</td>
                  <td>الحالة</td>
                  <td>المنصب</td>
                  <td>العمليات</td>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                  <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ str_limit($user->name, 12) }}</td>
                      <td>{{ $user->mobile }}</td>
                      <td>{{ $user->email }}</td>
                      <td class="text-center"><img src="{{ url('admin/staff', $user->avatar) }}" height="40px" width="40px" /></td>
                      <td>{{ $user->is_active }}</td>
                      <td><span style="padding: 5px" class="badge badge-{{ $user->role_id == 1 ? 'danger' : 'primary'}}">{{ $user->role->role }}</span></td>
                      <td>
                         <div class="row">
                           <div class="col-md-4">
                             <a href="{{ url('user/'. $user->id .'/edit')}}" class="btn btn-primary">
                               {{-- <i class="fas fa-pen-square"></i> --}}
                               تعديل
                             </a>
                           </div>
                           <div class="col-md-4">
                               {{-- @if ($user->role_id != 1) --}}
                                 {!! Form::open(['method' => 'DELETE', 'url' => ['user', $user->id]]) !!}
                                 {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                                 {!! Form::close() !!}
                               {{-- @endif --}}
                           </div>
                         </div>
                      </td>
                  </tr>
                @endforeach

            </tbody>
        </table>

    </div>

    <div class="">
        <div class="" dir="ltr">
            <ul class="pagination">
                {{-- <li class="page-item disabled">
                <a class="page-link" href="#">&laquo;</a>
                </li> --}}
                <li class="page-item active">
                <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                <a class="page-link" href="#">4</a>
                </li>
                <li class="page-item">
                <a class="page-link" href="#">5</a>
                </li>
                {{-- <li class="page-item">
                <a class="page-link" href="#">&raquo;</a>
                </li> --}}
            </ul>
        </div>
    </div>
@stop
