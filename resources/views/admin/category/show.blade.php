@extends('layouts.admin')
@section('title', $category->category)
@section('content')

    <div class="row">
        <div class="col-md-10">
            @include('includes.leading-title', ['title' => $category->category])
        </div>
        <div class="col-md-2 text-xl-left">
            <a href="{{ url('book', $category->book->id) }}" class="btn btn-warning">
                <i class="fas fa-arrow-right"></i>
                العودة للكتاب
            </a>
        </div>
    </div>

    <hr>

    {{--<div class="row">--}}
    {{--<div class="col-md-2">--}}
    {{--<a href="{{ url('exam/create') }}" class="btn btn-warning">--}}
    {{--<i class="fas fa-plus-circle"></i>--}}
    {{--إنشئ إختبار--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}


    <div class="row">
        <div class="col-md-10">
            @include('includes.leading-title', ['title' => 'أنشئ إختبار'])
        </div>
        <div class="col-md-2 text-xl-left">

        </div>
    </div>

    <div class="">
        {!! Form::open(['url' => 'exam']) !!}
        @include('admin.exam.form', ['categories' => $category])
        {!! Form::close() !!}
    </div>

    <table class="table table-hover table-striped table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>الاختبار</th>
            <th>العمليات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($category->exams as $exam)
            <tr>
                <td>{{ $exam->id }}</td>
                <td>
                    <a href="{{ url('exam', $exam->id) }}">
                        {{ $exam->exam }}
                    </a>
                </td>
                <td>
                    @include('includes.edit-delete', ['model' => 'exam', 'id' => $exam->id])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
