<div class="">
    <div class="row">
        <div class="form-group col-md-6">
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'العنوان', 'required', 'autofocus']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::text('video', null, ['class' => 'form-control', 'placeholder' => 'رابط الفيديو', 'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            {!! Form::select('category_id', $categories->pluck('category', 'id'), null, ['class' => 'form-control', 'placeholder' => 'التصنيف', 'required']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::select('is_active',Helper::isActiveChoices(), null, ['class' => 'form-control', 'placeholder' => 'الحالة', 'required']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::file('image', ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            {!! Form::textarea('desc', null, ['class' => 'form-control', 'placeholder' => 'الوصف', 'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            {!! Form::submit($title, ['class' => $title == 'تعديل' ? 'btn btn-primary btn-lg btn-block' : 'btn btn-success btn-lg btn-block']) !!}
        </div>
    </div>
</div>