@extends('layouts.admin')
@section('title', $book->name)
@section('content')
    <div class="row">
        <div class="col-md-9">
            @include('includes.leading-title', ['title' => $book->name])

            <div class="" dir="ltr" style="border-left: 1px solid lightgray;">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ url('phrase/index', $book->id) }}" class="btn btn-info">عبارات نهاية الاختبار</a>
                    <a href="{{ url('exercise/index', $book->id) }}" class="btn btn-info">التدريبات</a>
                    <a href="{{ url('level') }}" class="btn btn-info">المستويات</a>
                    <a href="{{ url('lesson/index', $book->id) }}" class="btn btn-info">الدروس</a>
                    <a href="{{ url('category/index', $book->id) }}" class="btn btn-info">التصنيفات الرئيسية</a>
                </div>
            </div>
            <hr>

        </div>

        <div class="col-md-3">
            <div class="">
                <div class="row">
                    <div class="col-md-12 text-xl-left">
                        <a href="{{ url('book/'. $book->id .'/edit')}}" class="btn btn-primary">
                            تعديل
                        </a>
                    </div>
                    {{--<div class="text-left col-md-3">--}}
                        {{--{!! Form::open(['method' => 'DELETE', 'url' => ['book', $book->id]]) !!}--}}
                        {{--{!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}--}}
                        {{--{!! Form::close() !!}--}}
                    {{--</div>--}}
                </div>
            </div>

            <hr>

            <div class="row">
                <img src="{{ url('admin/images/book', $book->cover) }}" alt="" height="320" width="320" />
            </div>
            <hr>
            <div class="">
                <p class="lead">
                    إسم الكتاب: {{ $book->name }}
                </p>

                <p class="lead">
                    صفحات الكتاب: {{ $book->pages }}
                </p>

                <p class="lead">
                    اللغة: <a href="{{ url('language', $book->language->id) }}">{{ $book->language->language }}</a>
                </p>

                <p class="lead">
                    الجهة: <a href="{{ url('organization', $book->organization->id) }}">{{ $book->organization->organization }}</a>
                </p>

                <p class="lead">
                    التصنيف العام: <a href="{{ url('group', $book->group->id) }}">{{ $book->group->group }}</a>
                </p>

                <p class="lead">
                    السعر: {{ $book->price }}
                </p>

                <p class="lead">
                    سعرالكتاب: {{ $book->book_price }}
                </p>

                <p class="lead">
                    سعر الاشتراك: {{ $book->subscription_price }}
                </p>

                <hr>

                <p class="">
                    {{ $book->desc }}
                </p>

            </div>
        </div>
    </div>
@stop