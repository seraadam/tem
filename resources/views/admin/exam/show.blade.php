@extends('layouts.admin')
@section('title', $exam->exam)
@section('content')

    <div class="row">
        <div class="col-md-10">
            @include('includes.leading-title', ['title' => $exam->exam . ' (' .  count($exam->examExercises) . ')'])
        </div>
        <div class="col-md-2 text-xl-left">
            <a href="{{ url('book', $exam->category->book->id) }}" class="btn btn-warning">
                <i class="fas fa-arrow-right"></i>
                العودة للكتاب
            </a>
        </div>
    </div>

    <div class="">
        {!! Form::open(['url' => 'exam-exercise']) !!}
        {!! Form::hidden('exam_id', $exam->id) !!}

        <div class="form-group">

            <select name="exercise_id" class="form-control">
                <option value="" selected disabled>اختر التدربيات</option>
                @foreach($exam->category->lessons as $lesson)
                    {{--@if($category->lessons->count() > 0)--}}
                        <optgroup label="{{ $lesson->title }}">
                            @foreach($lesson->exercises as $exercise)
                                @if(count($exercise->examExercise) <= 0)
                                    <option value="{{ $exercise->id }}">{{ $exercise->exercise }} - {{ count($exercise->examExercise) }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    {{--@endif--}}
                @endforeach
            </select>

        </div>

        <div class="form-group">
            {!! Form::submit('ادراج', ['class' => 'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}
    </div>


    <div class="">

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>التدريب</th>
                <th>-</th>
            </tr>
            </thead>

            <tbody>

            @foreach($exam->examExercises as $examExercise)
                <tr>
                    <td>{{ $examExercise->id }}</td>
                    <td>{{ $examExercise->exercise->exercise }}</td>
                    <td>
                        @include('includes.edit-delete', ['model' => 'exam-exercise', 'id' => $examExercise->id])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
