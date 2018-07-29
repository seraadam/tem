@extends('layouts.admin')
@section('title', 'ادارة التدريبات')
@section('content')

    <div class="row">
        <div class="col-md-10">
            @include('includes.leading-title', ['title' => 'إدارة التدريبات'])
        </div>
        <div class="col-md-2 text-xl-left">
            <a href="{{ url('book', $book->id) }}" class="btn btn-warning">
                <i class="fas fa-arrow-right"></i>
                العودة للكتاب
            </a>
        </div>
    </div>

    <div class="">
        <a href="{{ url('exercise/create', $book->id) }}" class="btn btn-success btn-lg">
            <i class="fas fa-book"></i>
            إضافة تدريب
        </a>
    </div>
    <div>

        @if($exercises->count() > 0)
            <hr>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <td>#</td>
                    <td>التدريب</td>
                    <td>الصورة</td>
                    <td>فيديو</td>
                    <td>المستوى</td>
                    <td>الدرس</td>
                    <td>التاريخ</td>
                    <td>العمليات</td>
                </tr>
                </thead>
                <tbody>

                @foreach ($exercises as $exercise)
                    <tr>
                        <td>{{ $exercise->id }}</td>
                        <td>
                            <a href="{{ url('exercise', $exercise->id) }}">
                                {{ str_limit($exercise->exercise) }}
                            </a>
                        </td>
                        <td class="text-center">
                            <img src="{{ url('admin/images/exercise', $exercise->image) }}" height="40px" width="40px" />
                        </td>
                        <td>{{ $exercise->video }}</td>
                        <td>{{ $exercise->level->level}}</td>
                        <td>{{ $exercise->lesson->title }}</td>
                        <td>{{ $exercise->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{ url('exercise/'. $exercise->id .'/edit')}}" class="btn btn-primary">
                                        <i class="fas fa-pen-square"></i>
                                        تعديل
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    {!! Form::open(['method' => 'DELETE', 'url' => ['exercise', $exercise->id]]) !!}
{{--                                    {!! Form::hidden('book_id', $book_id) !!}--}}
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
            <hr>
            @include('includes.leading-title', ['title' => 'لا توجد بيانات'])
        @endif

    </div>


@stop
