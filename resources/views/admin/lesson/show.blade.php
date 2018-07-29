@extends('layouts.admin')
@section('title', $lesson->title)
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                @include('includes.leading-title', ['title' => $lesson->title])
            </div>
            <div class="text-left col-md-2">
                <a href="{{ url('lesson/'. $lesson->id .'/edit')}}" class="btn btn-primary">
                    <i class="fas fa-pen-square"></i>
                    تعديل
                </a>
            </div>
        </div>

        <hr>

        <div class="">
            {!! Form::open(['url' => 'summary', 'files' => true]) !!}
            {!! Form::hidden('lesson_id', $lesson->id) !!}
            <div class="row">
                <div class="form-group col-md-6">
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'المرفق', 'required', 'autofocus']) !!}
                </div>
                <div class="form-group col-md-2">
                    {!! Form::file('attachment', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-2">
                    {!! Form::submit('إضافة', ['class' => 'btn btn-success btn-lg']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        @if($lesson->summaries->count() > 0)
            <hr>
            <div class="">

                <div class="">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>المرفق</th>
                                <th class="text-left">-</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach($lesson->summaries as $summary)
                            <tr class="">
                                <td>
                                    <a href="{{ url('admin/images/attachment', $summary->attachment) }}">
                                        {{ $summary->title }}
                                    </a>
                                </td>
                                <td>


                                </td>
                                <td class="text-left">
                                {!! Form::open(['method' => 'DELETE', 'url' => ['summary', $summary->id]]) !!}
                                {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                </td>
                            </tr>
                            {{--<iframe src="{{ url("http://docs.google.com/gview?url=admin/images/attachment" . $summary->attachment . "&embedded=true") }}"--}}
                                    {{--style="width:600px; height:500px;" frameborder="0"></iframe>--}}
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        @else
            <hr>
            @include('includes.leading-title', ['title' => 'لا توجد بيانات'])
        @endif
        {{--<div class="">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-6">--}}
                    {{--الدرس: {{ $exercise->lesson->title }}--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--المستوى: {{ $exercise->level->level }}--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<hr>--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-6">--}}
                    {{--<img src="{{ url('admin/images/exercise', $exercise->image) }}" alt="" class="img-size">--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--{{ $exercise->video }}a--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<hr>--}}
            {{--<div class="">--}}
                {{--<h3>--}}
                    {{--{{ $exercise->exercise }}--}}
                {{--</h3>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<hr>--}}
        {{--<div class="">--}}
            {{--@include('includes.leading-title', ['title' => 'الإجابات'])--}}

            {{--{!! Form::open(['url' => 'answer']) !!}--}}
            {{--{!! Form::hidden('exercise_id', $exercise->id) !!}--}}
            {{--<div class="row">--}}
                {{--<div class="form-group col-md-8">--}}
                    {{--{!! Form::text('answer', null, ['class' => 'form-control', 'placeholder' => 'الاجابة', 'required', 'autofocus']) !!}--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-2">--}}
                    {{--{!! Form::select('is_correct',Helper::isActiveChoices(), null, ['class' => 'form-control', 'placeholder' => 'التصحيح', 'required', 'autofocus']) !!}--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-2">--}}
                    {{--{!! Form::submit('إضافة', ['class' => 'btn btn-success btn-lg']) !!}--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--{!! Form::close() !!}--}}
        {{--</div>--}}

        {{--@if($exercise->answers->count() > 0)--}}
            {{--<div class="">--}}
                {{--<table class="table table-hover table-striped">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th>الاجابة</th>--}}
                        {{--<th class="text-center">-</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody class="text-white">--}}
                    {{--@foreach($exercise->answers as $answer)--}}
                        {{--<tr class="{{ $answer->is_correct ? 'bg-success' : 'bg-danger' }}">--}}
                            {{--<td>{{ $answer->answer }}</td>--}}
                            {{--<td class="text-left">--}}
                                {{--{!! Form::open(['method' => 'DELETE', 'url' => ['answer', $answer->id]]) !!}--}}
                                {{--{!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}--}}
                                {{--{!! Form::close() !!}--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}

        {{--@else--}}
            {{--@include('includes.leading-title', ['title' => 'لا توجد بيانات'])--}}
        {{--@endif--}}

        {{--<hr>--}}

        {{--<div class="">--}}
            {{--@include('includes.leading-title', ['title' => 'التصحيح'])--}}
        {{--</div>--}}





    </div>
@stop