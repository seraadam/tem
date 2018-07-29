@extends('layouts.admin')
@section('title', 'الصلاحيات')
@section('content')

    @include('includes.leading-title', ['title' => 'اضافة صلاحية'])

    <div class="">

        @if($level != null)
            {!! Form::model($level, ['method' => 'PATCH', 'url' => ['level', $level]]) !!}
        @else
            {!! Form::open(['url' => 'level']) !!}
        @endif

        <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::text('level', null, ['class' => 'form-control', 'placeholder' => 'المستوى', 'autofocus', 'required']) !!}
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::number('percentage', null, ['class' => 'form-control', 'placeholder' => 'النسبة', 'required']) !!}
                </div>
            </div>

            <div class="">
                {!! Form::submit($level != null ? 'تعديل' : 'إضافة', ['class' => $level != null ? 'btn btn-primary' : 'btn btn-success']) !!}
            </div>

        </div>
        {!! Form::close() !!}
    </div>

    <hr>

    @if($levels != null)
        @if($levels->count() > 0)
            <div>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>المستوى</th>
                        <th>نسبة الصعوبة</th>
                        <th>عدد التدريبات</th>
                        <th>التاريخ</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($levels as $level)
                        <tr>
                            <td>{{ $level->id }}</td>
                            <td>{{ $level->level }}</td>
                            <td>{{ $level->percentage }}</td>
                            <td>{{ $level->exercises->count() }}</td>
                            <td>{{ $level->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{ url('level/'. $level->id .'/edit')}}" class="btn btn-primary">
                                            <i class="fas fa-pen-square"></i>
                                            تعديل
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        {!! Form::open(['method' => 'DELETE', 'url' => ['level', $level->id]]) !!}
                                        {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        @else
            @include('includes.leading-title', ['title' => 'لا توجد بيانات'])
        @endif
    @endif

@endsection
