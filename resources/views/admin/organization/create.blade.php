@extends('layouts.admin')
@section('title', 'إدارة الكتب')
@section('content')
    @include('includes.leading-title', ['title' => 'إضافة جهة'])

    <div class="">
        {!! Form::open(['url' => 'organization', 'files' => true]) !!}

            @include('admin.organization.form', ['button' => 'إضافة'])

        {!! Form::close() !!}
    </div>
@stop