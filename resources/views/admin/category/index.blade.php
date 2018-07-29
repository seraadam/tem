@extends('layouts.admin')
@section('title', 'التصنيفات')
@section('content')

    <div class="row">
        <div class="col-md-10">
            @include('includes.leading-title', ['title' => 'إدارة التصنيفات'])
        </div>
        <div class="col-md-2 text-xl-left">
            <a href="{{ url('book', $book_id) }}" class="btn btn-warning">
                <i class="fas fa-arrow-right"></i>
                العودة للكتاب
            </a>
        </div>
    </div>

    <div class="">
        {!! Form::open(['url' => 'category', 'files' => true]) !!}
        {!! Form::hidden('book_id', $book_id) !!}
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
                    {!! Form::file('logo', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-12">
                {!! Form::textarea('desc', null, ['class' => 'form-control', 'placeholder' => 'الوصف', 'rows' => 3, 'required']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                {!! Form::submit('اضافة', ['class' => 'btn btn-success']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>

    <hr>

    <div>

        @if($categories->count() > 0)
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>التصنيف</th>
                    <th>عدد الدروس</th>
                    <th> الشعار</th>
                    <th>الحالة</th>
                    <th>التاريخ</th>
                    <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>
                            <a href="{{ url('category', $category->id) }}">
                                {{ $category->category }}
                            </a>
                        </td>
                        <td>{{ $category->lessons->count() }}</td>
                        <td class="text-center"><img src="{{ url('admin/images/category', $category->logo) }}" alt="" class="img-size" /></td>
                        <td>{{ Helper::convertBoolValue($category->is_active) }}</td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{ url('category/'. $category->id .'/edit')}}" class="btn btn-primary">
                                        <i class="fas fa-pen-square"></i>
                                        تعديل
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    {!! Form::open(['method' => 'DELETE', 'url' => ['category', $category->id]]) !!}
                                    {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            @include('includes.leading-title', ['title' => 'لا توجد بيانات'])
        @endif

    </div>

@endsection
