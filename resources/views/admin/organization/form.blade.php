<div>
    <p class="lead">
        معلومات شخصية
    </p>
</div>
<div class="row">
    <div class="form-group col-md-3">
        {!! Form::text('organization', null, ['class' => 'form-control', 'placeholder' => 'الجهة', 'required', 'autofocus']) !!}
    </div>

    <div class="form-group col-md-2">
        {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'الجوال', 'required']) !!}
    </div>

    <div class="form-group col-md-3">
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'البريد الالكتروني', 'required']) !!}
    </div>

    <div class="form-group col-md-2">
        {!! Form::select('organization_type_id', Helper::getOrganizationTypes(), null, ['class' => 'form-control','placeholder' => 'النوع', 'required']) !!}
    </div>

    <div class="form-group col-md-2">
        {!! Form::file('avatar', ['class' => 'form-control-file']) !!}
    </div>

</div>

<div>
    <p class="lead">
        معلومات التواصل
    </p>
</div>

<div class="row">
    <div class="form-group col-md-3">
        {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'الموقع', 'required', 'autofocus']) !!}
    </div>

    <div class="form-group col-md-2">
        {!! Form::text('twitter', null, ['class' => 'form-control', 'placeholder' => 'تويتر', 'required']) !!}
    </div>

    <div class="form-group col-md-2">
        {!! Form::text('instagram', null, ['class' => 'form-control', 'placeholder' => 'انستقرام', 'required']) !!}
    </div>

    <div class="form-group col-md-2">
        {!! Form::text('snapchat', null, ['class' => 'form-control', 'placeholder' => 'سناب شات', 'required']) !!}
    </div>

    <div class="form-group col-md-3">
        {!! Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => 'فيس بوك', 'required']) !!}
    </div>

</div>


<div class="row">
    <div class="form-group col-md-12">
        {!! Form::textarea('desc', null, ['class' => 'form-control', 'placeholder' => 'الوصف', 'required']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12">
        {!! Form::submit($button, ['class' => $button == 'تعديل' ? 'btn btn-primary btn-lg btn-block' : 'btn btn-success btn-lg btn-block']) !!}
    </div>
</div>