<!-- Lang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lang', 'Language:') !!}
    {{ Form::select('lang', ['ar' => 'Arabic', 'en' => 'English'], null, ['class' => 'form-control', 'placeholder' => 'Choose language']) }}
</div>

<!-- Sort Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sort', 'Sort:') !!}
    @if(!empty($sort))
        {!! Form::number('sort', $sort, ['class' => 'form-control']) !!}
    @else
        {!! Form::number('sort', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Question Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('question', 'Question:') !!}
    {!! Form::text('question', null, ['class' => 'form-control']) !!}
</div>

<!-- Answer Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('answer', 'Answer:') !!}
    {!! Form::textarea('answer', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}&nbsp;
    <label class="float-left">
        {!! Form::hidden('status', false) !!}
        {!! Form::checkbox('status', '1', null) !!}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.faqs.index') !!}" class="btn btn-default">Cancel</a>
</div>
