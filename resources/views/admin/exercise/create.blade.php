@extends('layouts.admin')
@section('title', 'إدخال تدريب')
@section('content')

    <div class="row">
        <div class="col-md-10">
            @include('includes.leading-title', ['title' => 'إدخال تدريب'])
        </div>
        <div class="col-md-2 text-xl-left">
            <a href="{{ url('book', $book->id) }}" class="btn btn-warning">
                <i class="fas fa-arrow-right"></i>
                العودة للكتاب
            </a>
        </div>
    </div>

    <hr>

    {!! Form::open(['url' => 'exercise', 'files' => true]) !!}

    <div class="row">
        <div class="col-md-6 form-group">
            {!! Form::textarea('exercise', null, ['class' => 'form-control', 'rows' => 8, 'placeholder' => 'التدريب', 'autofocus']) !!}
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <select name="lesson_id" class="form-control">
                    @foreach($book->categories as $category)
                        @if($category->lessons->count() > 0)
                            <optgroup label="{{ $category->category }}">
                                @foreach($category->lessons as $lesson)
                                    <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                                @endforeach
                            </optgroup>
                        @endif
                    @endforeach
                </select>
                {{--{!! Form::select('lesson_id', $lessons->pluck('title', 'id'), null, ['class' => 'form-control', 'placeholder' => 'الدرس']) !!}--}}
            </div>
            <div class="form-group">
                {!! Form::select('level_id', Helper::getLevels()->pluck('level', 'id'), null, ['class' => 'form-control', 'placeholder' => 'المستوى']) !!}
            </div>
            <div class="form-group">
                {!! Form::file('image', ['class' => '']) !!}
            </div>
        </div>
    </div>

    {{--<div class="row">--}}
        {{--<div class="form-group">--}}
            {{--{!! Form::file('image', ['class' => '']) !!}--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="row">
        <div class="form-group col-md-12">
            {!! Form::submit('إضافة', ['class' => 'btn btn-success btn-lg btn-block']) !!}
        </div>
    </div>

    {!! Form::close() !!}

@stop
