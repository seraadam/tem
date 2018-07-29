@extends('layouts.admin')
@section('title', 'إدارة الكتب')
@section('content')
    @include('includes.leading-title', ['title' => 'تعديل كتب'])
    {!! Form::model($book, ['method'=> 'PATCH', 'url' => ['book', $book->id], 'files' => true]) !!}
    @include('admin.book.form', ['button' => 'تعديل'])
    {!! Form::close() !!}
@stop