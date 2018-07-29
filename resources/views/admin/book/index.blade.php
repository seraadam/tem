@extends('layouts.admin')
@section('title', 'إدارة الكتب')
@section('content')
    <div class="row">
        <div class="col-md-8">
            @include('includes.leading-title', ['title' => 'إدارة الكتب'])
        </div>
        <div class="col-md-4 text-left">
            <div class="">
                <a href="{{ url('book/create') }}" class="btn btn-success btn-lg">
                    <i class="fas fa-plus"></i>
                    كتاب جديد
                </a>
            </div>
        </div>
    </div>
    <hr>

    @if($books->count() > 0)
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>إسم الكتاب</th>
                <th>عدد الصفحات</th>
                <th>السعر</th>
                <th>سعر الاشتراك</th>
                <th>سعر الكتاب</th>
                <th>التصنيف العام</th>
                <th>اللغة</th>
                <th>الحالة</th>
                <th>الجهة</th>
                <th>التاريخ</th>
                <th>العمليات</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td><a href="{{ url('book', $book->id) }}">{{ str_limit($book->name, 10) }}</a></td>
                    <td>{{ $book->pages }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->subscription_price }}</td>
                    <td>{{ $book->book_price }}</td>
                    <td>{{ str_limit($book->group->group, 10) }}</td>
                    <td>{{ str_limit($book->language->language, 10) }}</td>
                    <td>{{ Helper::convertBoolValue($book->is_active) }}</td>
                    <td>{{ str_limit($book->organization->organization, 10) }}</td>
                    <td>{{ $book->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ url('book/'. $book->id .'/edit')}}" class="btn btn-primary">
                                    تعديل
                                </a>
                            </div>
                            <div class="col-md-4">
                                {!! Form::open(['method' => 'DELETE', 'url' => ['book', $book->id]]) !!}
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
@stop