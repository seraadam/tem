@extends('layouts.admin')
@section('title', 'عبارات نهاية الاختبار')
@section('content')
    <div class="">
        @include('includes.leading-title', ['title' => 'التصحيح'])
    </div>

    <div class="">
        {!! Form::open(['url' => 'phrase', 'files' => true]) !!}
        {!! Form::hidden('book_id', $book->id) !!}
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
                {!! Form::file('image', ['class' => 'form-control', 'required']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                {!! Form::submit('إضافة', ['class' => 'btn btn-success btn-lg btn-block']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>

    <hr>

    @if($book->phrases->count() > 0)
    <div class="">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>العبارة</th>
                    <th>النسبة</th>
                    <th>الصورة</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                @foreach($book->phrases as $phrase)
                    <tr>
                        <td>{{ $phrase->phrase }}</td>
                        <td>{{ $phrase->percentage }}</td>
                        <td>
                            <img src="{{ url('admin/images/phrase/', $phrase->image) }}" alt="" class="img-size">
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="{{ url('phrase/' . $phrase->id . '/edit') }}" class="btn btn-primary">تعديل</a>
                                </div>
                                <div class="col-md-2">
                                    {!! Form::open(['method' => 'DELETE', 'url' => ['phrase', $phrase->id]]) !!}
                                    {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        </div>

    @else
        @include('includes.leading-title', ['title' => 'لا توجد بيانات'])
    @endif

@stop