@extends('layouts.admin')
@section('title', 'إدارة الكتب')
@section('content')
    @include('includes.leading-title', ['title' => 'تعديل جهة'])
    <div class="">
        {!! Form::model($organization, ['method' => 'PATCH', 'url' => ['organization', $organization->id], 'files' => true]) !!}

        @include('admin.organization.form', ['button' => 'تعديل'])

        {!! Form::close() !!}
    </div>
@stop