@extends('layouts.admin')
@section('title', 'إدارة الكتب')
@section('content')
    @include('includes.leading-title', ['title' => 'إضافة كتب'])
    {!! Form::open(['url' => 'book', 'files' => true]) !!}
    @include('admin.book.form', ['button' => 'إضافة'])
    {!! Form::close() !!}
@stop