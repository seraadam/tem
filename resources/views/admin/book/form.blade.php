<div class="">

    <div class="row">

        <div class="form-group col-md-4">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'إسم الكتاب', 'required', 'autofocus']) !!}
        </div>

        <div class="form-group col-md-2">
            {!! Form::number('pages', null, ['class' => 'form-control', 'placeholder' => 'عدد صفحات الكتاب', 'required']) !!}
        </div>

        <div class="form-group col-md-2">
            {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'سعر الكتاب و الاشتراك', 'required']) !!}
        </div>

        <div class="form-group col-md-2">
            {!! Form::number('subscription_price', null, ['class' => 'form-control', 'placeholder' => 'سعر الاشتراك', 'required']) !!}
        </div>

        <div class="form-group col-md-2">
            {!! Form::number('book_price', null, ['class' => 'form-control', 'placeholder' => 'سعر الكتاب', 'required']) !!}
        </div>

    </div>

    <div class="row">

        <div class="form-group col-md-3">
            {!! Form::select('is_active',Helper::isActiveChoices(), null, ['class' => 'form-control', 'placeholder' => 'الحالة', 'required']) !!}
        </div>

        <div class="form-group col-md-3">
            {!! Form::select('group_id',Helper::getGroupsIds(), null, ['class' => 'form-control', 'placeholder' => 'التصنيف العام', 'required']) !!}
        </div>

        <div class="form-group col-md-3">
            {!! Form::select('organization_id',Helper::getOrganizationsIds(), null, ['class' => 'form-control', 'placeholder' => 'الجهة', 'required']) !!}
        </div>

        <div class="form-group col-md-3">
            {!! Form::select('language_id',Helper::getLanguagesIds(), null, ['class' => 'form-control', 'placeholder' => 'اللعة', 'required']) !!}
        </div>

    </div>

    <div class="row">

        <div class="form-group col-md-3">
            {!! Form::file('cover', ['class' => '']) !!}
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

</div>