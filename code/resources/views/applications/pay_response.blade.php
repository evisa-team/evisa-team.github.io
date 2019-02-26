@extends('layouts.website')

@section('content')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-mini">
    <div class="container clearfix">
        <h1>{{ $page_title }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ trans('website.home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
        </ol>
    </div>
</section><!-- #page-title end -->
<!-- Content
============================================= -->
<section id="content">
    <div class="container topmargin bottommargin">
        @if($status == 1)
            <div class="feature-box fbox-center fbox-light fbox-plain">
                <div class="fbox-icon">
                    <a href="#"><i class="icon-check" style="color: #2ecc71;"></i></a>
                </div>
                <h3 style="color: #2ecc71;">{{ trans('website.payment_success_msg') }}</h3>
            </div>
        @else
            <div class="feature-box fbox-center fbox-light fbox-plain">
                <div class="fbox-icon">
                    <a href="#"><i class="icon-warning-sign"></i></a>
                </div>
                <h3>{{ trans('website.payment_err_msg') }}</h3>
            </div>
        @endif
    </div>
</section>

@endsection
