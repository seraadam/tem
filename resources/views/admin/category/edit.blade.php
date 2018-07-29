@extends('layouts.admin')
@section('title', 'التصنيفات')
@section('content')

    @include('includes.leading-title', ['title' => 'إدارة التصنيفات'])

    <div class="">
        {!! Form::model($category, ['method' => 'PATCH', 'url' => ['category', $category->id], 'files' => true]) !!}
        {!! Form::hidden('book_id', null) !!}
        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::text('category', null, ['class' => 'form-control', 'placeholder' => 'التصنيف', 'autofocus', 'required']) !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::select('is_active', Helper::isActiveChoices(), null, ['class' => 'form-control', 'placeholder' => 'الحالة', 'required']) !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::file('logo', ['class' => '']) !!}
                </div>
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-12">
                {!! Form::textarea('desc', null, ['class' => 'form-control', 'placeholder' => 'الوصف', 'autofocus', 'required']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                {!! Form::submit('تعديل', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>

    <hr>



@endsection
