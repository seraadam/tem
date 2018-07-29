@extends('layouts.admin')
@section('title', 'التصنيف العام')
@section('content')

        @include('includes.leading-title', ['title' => $group->group . ' ( ' . $group->books->count() . ' )'])

        @if($group->books->count() > 0)
            <div class="row">
                @foreach($group->books->chunk(4) as $books)
                    @foreach($books as $book)
                        <div class="col-md-3">
                            <div class="card card-default border-secondary mb-3" style="max-width: 20rem;">
                                {{--<div class="card-header">--}}
                                {{--<a href="{{ url('book', $book->id) }}">--}}
                                {{--{{ str_limit($book->name, 20) }}--}}
                                {{--</a>--}}
                                {{--</div>--}}
                                <div class="card-body" style="padding: 0%">
                                    <img src="{{ url('admin/images/book', $book->cover) }}" height="100%" width="100%" />
                                </div>
                                <div class="card-footer text-left">
                                    <div class="text-right">
                                        <a href="{{ url('book', $book->id) }}">
                                            {{ str_limit($book->name, 20) }}
                                        </a>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-3 text-left">
                                            <a href="{{ url('book/'. $book->id .'/edit')}}" class="btn btn-primary">
                                                تعديل
                                            </a>
                                        </div>
                                        <div class="col-md-2 text-left">
                                            {!! Form::open(['method' => 'DELETE', 'url' => ['book', $book->id]]) !!}
                                            {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        @else
            @include('includes.leading-title', ['title' => 'لا توجد بيانات'])
        @endif

@stop
