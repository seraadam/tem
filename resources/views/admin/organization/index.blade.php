@extends('layouts.admin')
@section('title', 'إدارة الجهات')
@section('content')
    <div class="row">
        <div class="col-md-8">
            @include('includes.leading-title', ['title' => 'إدارة الجهات'])
        </div>
        <div class="col-md-4 text-left">
            <a href="{{ url('organization/create') }}" class="btn btn-success btn-lg">
                <i class="fas fa-plus"></i>
                إضافة جهة
            </a>
            |
            <a href="{{ url('organizationType') }}" class="btn btn-success btn-lg">
                <i class="fas fa-align-justify"></i>
                أنواع الجهات
            </a>
        </div>
    </div>

    <hr>

    @if($organizations->count() > 0)
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>الجهة</th>
                <th>عدد الكتب</th>
                <th>النوع</th>
                <th>الجوال</th>
                <th>البريد الالكتروني</th>
                <th>تويتر</th>
                <th>سناب شات</th>
                <th>انستقرام</th>
                <th>فيس بوك</th>
                <th>الموقع الخاص</th>
                <th>التاريخ</th>
                <th>العمليات</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($organizations as $organization)
                <tr>
                    <td>{{ $organization->id }}</td>
                    <td>{{ str_limit($organization->organization, 10) }}</td>
                    <td>{{ $organization->books->count() }}</td>
                    <td>{{ $organization->organizationType->type }}</td>
                    <td>{{ $organization->mobile }}</td>
                    <td>{{ str_limit($organization->email, 10) }}</td>
                    <td>{{ str_limit($organization->twitter, 10) }}</td>
                    <td>{{ str_limit($organization->snapchat, 10) }}</td>
                    <td>{{ str_limit($organization->instagram, 10) }}</td>
                    <td>{{ str_limit($organization->facebook, 10) }}</td>
                    <td>{{ str_limit($organization->website, 10) }}</td>
                    <td>{{ $organization->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ url('organization/'. $organization->id .'/edit')}}" class="btn btn-primary">
                                    تعديل
                                </a>
                            </div>
                            <div class="col-md-4">
                                {!! Form::open(['method' => 'DELETE', 'url' => ['organization', $organization->id]]) !!}
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