@extends('layouts.admin')
@section('title', 'ادارة الدروس')
@section('content')

    <div class="row">
        <div class="col-md-10">
            @include('includes.leading-title', ['title' => 'إدارة الدروس'])
        </div>
        <div class="col-md-2 text-xl-left">
            <a href="{{ url('book', $book_id) }}" class="btn btn-warning">
                <i class="fas fa-arrow-right"></i>
                العودة للكتاب
            </a>
        </div>
    </div>

    <div class="">
        <a href="{{ url('lesson/create', $book_id) }}" class="btn btn-success btn-lg">
            <i class="fas fa-book"></i>
            درس جديد
        </a>
    </div>

    <div>

        @if($categories->count() > 0)
            @foreach($categories as $category)
                <hr>
                @include('includes.leading-title', ['title' => $category->category])
                @if($category->lessons->count() > 0)
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>عنوان الدرس</td>
                            <td>الصورة</td>
                            <td>فيديو</td>
                            <td>التصنيف</td>
                            <td>عدد التدريبات</td>
                            <td>الحالة</td>
                            <td>التاريخ</td>
                            <td>العمليات</td>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($category->lessons as $lesson)
                            <tr>
                                <td>{{ $lesson->id }}</td>
                                <td>
                                    <a href="{{ url('lesson', $lesson->id) }}">
                                        {{ str_limit($lesson->title, 12) }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <img src="{{ url('admin/images/lesson', $lesson->image) }}" height="40px" width="40px" />
                                </td>
                                <td>{{ $lesson->video_title }}</td>
                                <td>{{ $lesson->category->category }}</td>
                                <td>{{ $lesson->exercises->count() }}</td>
                                <td>{{ Helper::convertBoolValue($lesson->is_active) }}</td>
                                <td>{{ $lesson->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="{{ url('lesson/'. $lesson->id .'/edit')}}" class="btn btn-primary">
                                                <i class="fas fa-pen-square"></i>
                                                تعديل
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            {!! Form::open(['method' => 'DELETE', 'url' => ['lesson', $lesson->id]]) !!}
                                            {!! Form::hidden('book_id', $book_id) !!}
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
            @endforeach
        @else
            <hr>
            @include('includes.leading-title', ['title' => 'لا توجد بيانات'])
        @endif

    </div>

    <div class="">
        <div class="" dir="ltr">
            <ul class="pagination">
                {{-- <li class="page-item disabled">
                <a class="page-link" href="#">&laquo;</a>
                </li> --}}
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">4</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">5</a>
                </li>
                {{-- <li class="page-item">
                <a class="page-link" href="#">&raquo;</a>
                </li> --}}
            </ul>
        </div>
    </div>
@stop
