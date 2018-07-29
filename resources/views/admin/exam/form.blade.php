<div class="row">
    {!! Form::hidden('category_id', $category->id) !!}
    <div class="form-group col-md-3">
        {!! Form::text('exam', null, ['class' => 'form-control', 'placeholder' => 'الإختبار', 'autofocus', 'required']) !!}
    </div>

    {{--<div class="form-group col-md-3">--}}
        {{--<select name="exercise_id" class="form-control" placeholder="التدريب">--}}
            {{--<option value="" disabled selected>التدريب</option>--}}
            {{--@foreach($book->categories as $category)--}}
                {{--@if($category->lessons->count() > 0)--}}
                    {{--<optgroup label="{{ $category->category }}">--}}
                        {{--@foreach($category->lessons as $lesson)--}}
                            {{--<option value="{{ $lesson->id }}">{{ $lesson->title }}</option>--}}
                        {{--@endforeach--}}
                    {{--</optgroup>--}}
                {{--@endif--}}
            {{--@endforeach--}}
        {{--</select>--}}
    {{--</div>--}}

    <div class="form-group col-md-3">
        {!! Form::submit('إضافة', ['class' => 'btn btn-success']) !!}
    </div>

</div>