<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $page->title !!}</p>
</div>

<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    <p>{!! $page->content !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('lang', 'Language:') !!}
    <p>{!! $page->lang !!}</p>
</div>