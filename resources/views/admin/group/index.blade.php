@extends('layouts.admin')
@section('title', 'التصنيفات')
@section('content')
    @include('includes.leading-title', ['title' => 'إدارة التصنيفات'])
    <div class="">

        {!! Form::open(['url' => 'group', 'files' => true]) !!}

        <div class="row">

            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::text('group', null, ['class' => 'form-control', 'placeholder' => 'الصنيف', 'autofocus', 'required']) !!}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::select('is_active', Helper::isActiveChoices(), null, ['class' => 'form-control', 'placeholder' => 'التفعيل', 'required']) !!}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::file('logo', ['class' => 'form-control', 'required']) !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::textarea('desc', null, ['class' => 'form-control', 'rows' => 6, 'placeholder' => 'الوصف', 'required']) !!}
                    </div>
                </div>
            </div>

        </div>


        <div class="col-md-12">
            {!! Form::submit('إضافة', ['class' => 'btn btn-success btn-block']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <hr>


    <div>


            @if($groups->count() > 0)
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>التصنيف</th>
                            <th>عدد الكتب</th>
                            <th>الحالة</th>
                            <th>التاريخ</th>
                            <th>الشعار</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                            <tr>
                                <td>{{ $group->id }}</td>
                                <td>{{ $group->group }}</td>
                                <td>{{ $group->books->count() }}</td>
                                <td>{{ Helper::convertBoolValue($group->is_active) }}</td>
                                <td>{{ $group->created_at->diffForHumans() }}</td>
                                <td><img src="{{ url('admin/images/group/'. $group->logo) }}" alt="" height="40px" width="40px"></td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="{{ url('group/'. $group->id .'/edit')}}" class="btn btn-primary">
                                                {{-- <i class="fas fa-pen-square"></i> --}}
                                                تعديل
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            {!! Form::open(['method' => 'DELETE', 'url' => ['group', $group->id]]) !!}
                                            {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="row text-center">
                    @include('includes.leading-title', ['title' => 'لا توجد بيانات'])
                </div>
            @endif



    </div>
@stop