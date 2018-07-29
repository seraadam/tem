@extends('layouts.admin')
@section('title', 'تعديل تصحيح')
@section('content')

        <div class="">
            @include('includes.leading-title', ['title' => 'التصحيح'])
        </div>

        <div class="">
            {!! Form::model($correction, ['method' => 'PATCH', 'url' => ['correction', $correction->id], 'files' => true]) !!}
            {!! Form::hidden('exercise_id', $correction->exercise->id) !!}
            <div class="row">
                <div class="form-group col-md-12">
                    {!! Form::textarea('correction', null, ['class' => 'form-control', 'placeholder' => 'التصحيح', 'rows' => 3, 'autofocus']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    {!! Form::text('video', null, ['class' => 'form-control', 'placeholder' => 'رابط الفيديو']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    {!! Form::file('image', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    {!! Form::submit('تعديل', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
@stop