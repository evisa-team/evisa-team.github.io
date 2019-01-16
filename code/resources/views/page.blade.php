@extends('layouts.website')

@section('content')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-mini">
    <div class="container clearfix">
        <h1>{{ $page->title }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ trans('website.home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
        </ol>
    </div>
</section><!-- #page-title end -->
<!-- Content
============================================= -->
<section id="content">
    {!! $page->content !!}
</section>

@endsection
