@extends('layouts.admin')
@section('title', 'تعديل درس')
@section('content')

    <div class="row">
        <div class="col-md-10">
            @include('includes.leading-title', ['title' => 'تعديل درس'])
        </div>
        <div class="col-md-2 text-xl-left">
            <a href="{{ url('book', $book_id) }}" class="btn btn-warning">
                <i class="fas fa-arrow-right"></i>
                العودة للكتاب
            </a>
        </div>

    </div>

    {!! Form::model($lesson, ['method' => 'PATCH', 'url' => ['lesson', $lesson], 'files' => true]) !!}
    {!! Form::hidden('book_id', $book_id) !!}
    @include('admin.lesson.form', ['title' => 'تعديل'])
    {!! Form::close() !!}

@stop
