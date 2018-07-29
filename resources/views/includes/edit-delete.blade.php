<div class="row">
    <div class="col-md-4">
        <a href="{{ url($model . '/'. $id .'/edit')}}" class="btn btn-primary">
            <i class="fas fa-pen-square"></i>
            تعديل
        </a>
    </div>
    <div class="col-md-4">
        {!! Form::open(['method' => 'DELETE', 'url' => [$model, $id]]) !!}
        {{--                                    {!! Form::hidden('book_id', $book_id) !!}--}}
        {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>