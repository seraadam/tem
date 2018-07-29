@extends('layouts.admin')
@section('title', 'إدارة الجهات')
@section('content')
    @include('includes.leading-title', ['title' => 'أنواع الجهات'])

    <hr>

    <div class="">
        @if($type)
            {!! Form::model($type, ['method' => 'PATCH', 'url' => ['organizationType', $type->id]]) !!}
        @else
            {!! Form::open(['url' => 'organizationType']) !!}
        @endif
        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'النوع', 'required', 'autofocus']) !!}
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::select('is_active', Helper::isActiveChoices(), null, ['class' => 'form-control', 'placeholder' => 'الحالة', 'required', 'autofocus']) !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::submit($type ? 'تعديل' : 'إضافة', ['class' => $type ? 'btn btn-primary' : 'btn btn-success' ]) !!}
                </div>
            </div>

        </div>
        {!! Form::close() !!}
    </div>

    <div>

        @if(!$type)
            @if($types->count() > 0)
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>النوع</th>
                        <th>عدد الجهات</th>
                        <th>الحالة</th>
                        <th>التاريخ</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->type }}</td>
                            <td>{{ $type->organizations->count() }}</td>
                            <td>{{ Helper::convertBoolValue($type->is_active) }}</td>
                            <td>{{ $type->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{ url('organizationType/'. $type->id .'/edit')}}" class="btn btn-primary">
                                            تعديل
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        {!! Form::open(['method' => 'DELETE', 'url' => ['organizationType', $type->id]]) !!}
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
                @include('includes.leading-title', ['title' => 'لا توجد بيانات'])
            @endif
        @endif

    </div>

@stop