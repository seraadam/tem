@extends('layouts.admin')
@section('title', 'عبارات نهاية الاختبار')
@section('content')
    <div class="">
        @include('includes.leading-title', ['title' => 'التصحيح'])
    </div>

    <div class="">
        {!! Form::model($phrase, ['method' => 'PATCH', 'url' => ['phrase', $phrase->id], 'files' => true]) !!}
        {!! Form::hidden('book_id', $phrase->book->id) !!}
        <div class="row">
            <div class="form-group col-md-12">
                {!! Form::textarea('phrase', null, ['class' => 'form-control', 'placeholder' => 'العبارة', 'rows' => 3, 'required', 'autofocus']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                {!! Form::number('percentage', null, ['class' => 'form-control', 'placeholder' => 'النسبة المئوية', 'required']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::file('image', ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                {!! Form::submit('تعديل', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@stop