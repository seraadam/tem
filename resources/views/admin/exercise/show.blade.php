@extends('layouts.admin')
@section('title', $exercise->exercise)
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                @include('includes.leading-title', ['title' => 'عرض تدريب'])
            </div>
            <div class="text-left col-md-2">
                <a href="{{ url('exercise/'. $exercise->id .'/edit')}}" class="btn btn-primary">
                    <i class="fas fa-pen-square"></i>
                    تعديل
                </a>
            </div>
        </div>

        <hr>

        <div class="">
            <div class="row">
                <div class="col-md-6">
                    الدرس: {{ $exercise->lesson->title }}
                </div>
                <div class="col-md-6">
                    المستوى: {{ $exercise->level->level }}
                </div>
            </div>
            <hr>
            <div class="row text-center">
                <div class="col-md-12">
                    <img src="{{ url('admin/images/exercise', $exercise->image) }}" alt="" class="img-size">
                </div>
            </div>
            <hr>
            <div class="">
                <h3>
                    {{ $exercise->exercise }}
                </h3>
            </div>
        </div>
        <hr>
        <div class="">
            @include('includes.leading-title', ['title' => 'الإجابات'])

            {!! Form::open(['url' => 'answer']) !!}
                {!! Form::hidden('exercise_id', $exercise->id) !!}
                <div class="row">
                    <div class="form-group col-md-8">
                        {!! Form::text('answer', null, ['class' => 'form-control', 'placeholder' => 'الاجابة', 'required', 'autofocus']) !!}
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::select('is_correct',Helper::isActiveChoices(), null, ['class' => 'form-control', 'placeholder' => 'التصحيح', 'required', 'autofocus']) !!}
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::submit('إضافة', ['class' => 'btn btn-success btn-lg']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>

        @if($exercise->answers->count() > 0)
            <div class="">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>الاجابة</th>
                        <th class="text-center">-</th>
                    </tr>
                    </thead>
                    <tbody class="text-white">
                    @foreach($exercise->answers as $answer)
                        <tr class="{{ $answer->is_correct ? 'bg-success' : 'bg-danger' }}">
                            <td>{{ $answer->answer }}</td>
                            <td class="text-left">
                                {!! Form::open(['method' => 'DELETE', 'url' => ['answer', $answer->id]]) !!}
                                {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        @else
            @include('includes.leading-title', ['title' => 'لا توجد بيانات'])
        @endif

        <hr>

        <div class="">
            @include('includes.leading-title', ['title' => 'التصحيح'])
        </div>

        <div class="">
            {!! Form::open(['url' => 'correction', 'files' => true]) !!}
            {!! Form::hidden('exercise_id', $exercise->id) !!}
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
                    {!! Form::submit('إضافة', ['class' => 'btn btn-success btn-lg btn-block']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        @if($exercise->corrections->count() > 0)
            <div class="">

                @foreach($exercise->corrections as $correction)
                        <div class="">
                            <div class="row">
                                <div class="col-md-6">
                                    <iframe width="400"
                                            height="200"
                                            src="{{ $correction->video }}"
                                            frameborder="0" allow="autoplay; encrypted-media"
                                            allowfullscreen></iframe>
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ url('admin/images/correction/', $correction->image) }}" alt="" class="img-size">
                                </div>
                            </div>
                            <h4 class="bg-info text-white text-center text-justify">{{ $correction->correction }}</h4>
                        </div>
                        <div class="text-left">
                            <div class="row text-left">
                                <div class="col-md-10">
                                    <a class="btn btn-primary" href="{{ url('correction/' . $correction->id . '/edit') }}">تعديل</a>
                                </div>
                                <div class="col-md-2 text-right">
                                    {!! Form::open(['method' => 'DELETE', 'url' => ['correction', $correction->id]]) !!}
                                    {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    <hr>
                @endforeach

            </div>

        @else
            @include('includes.leading-title', ['title' => 'لا توجد بيانات'])
        @endif

    </div>
@stop