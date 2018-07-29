@extends('layouts.admin')
@section('title', 'اللغات')
@section('content')

    @include('includes.leading-title', ['title' => 'إدارة اللغات'])

    <div class="">

        @if($language)
            {!! Form::model($language, ['method' => 'PATCH', 'url' => ['language', $language->id]]) !!}
        @else
            {!! Form::open(['url' => 'language']) !!}
        @endif
        <div class="row">

            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::text('language', null, ['class' => 'form-control', 'placeholder' => 'اللغة', 'autofocus', 'required']) !!}
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::select('is_active', Helper::isActiveChoices(), null, ['class' => 'form-control', 'placeholder' => 'التفعيل', 'autofocus', 'required']) !!}
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::submit($language ? 'تعديل': 'إضافة', ['class' =>  $language ? 'btn btn-primary': 'btn btn-success']) !!}
                </div>
            </div>

        </div>
        {!! Form::close() !!}
    </div>

    <hr>

    <div>

        @if(!$language)
            @if($languages->count() > 0)
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اللغة</th>
                        <th>عدد الكتب</th>
                        <th>الحالة</th>
                        <th>التاريخ</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($languages as $language)
                        <tr>
                            <td>{{ $language->id }}</td>
                            <td>
                                <a href="{{ url('language', $language->id) }}">
                                    {{ $language->language }}
                                </a>
                            </td>
                            <td>{{ $language->books->count() }}</td>
                            <td>{{ Helper::convertBoolValue($language->is_active) }}</td>
                            <td>{{ $language->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{ url('language/'. $language->id .'/edit')}}" class="btn btn-primary">
                                            تعديل
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        {!! Form::open(['method' => 'DELETE', 'url' => ['language', $language->id]]) !!}
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
        @endif

    </div>

@endsection
