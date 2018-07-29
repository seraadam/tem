@extends('layouts.admin')
@section('title', 'التصنيفات')
@section('content')
    @include('includes.leading-title', ['title' => 'تعديل تصنيف'])
    <div class="">

        {!! Form::model($group, ['method' => 'PATCH', 'url' => ['group', $group->id], 'files' => true]) !!}

        <div class="row">

            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::text('group', null, ['class' => 'form-control', 'placeholder' => 'الصنيف', 'autofocus', 'required']) !!}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::select('is_active', Helper::isActiveChoices(), null, ['class' => 'form-control', 'placeholder' => 'التفعيل', 'required']) !!}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::file('logo', ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::textarea('desc', null, ['class' => 'form-control', 'rows' => 6, 'placeholder' => 'الوصف', 'required']) !!}
                    </div>
                </div>
            </div>

        </div>


        <div class="col-md-12">
            {!! Form::submit('إضافة', ['class' => 'btn btn-success btn-block']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <hr>

@stop