@extends('layouts.website')

@section('content')
<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class=" nobottommargin">
                <div id="side-navigation">
                    <div class="col_one_third nobottommargin">
                        <ul class="sidenav">
                            @foreach ($visaTypes as $k => $visaType)
                                @if($lang == 'ar')
                                    <li @if($k == 0)class="ui-tabs-active"@endif><a href="#snav-content{{ $k+1 }}"><i class="icon-double-angle-left"></i>{{ $visaType->title }}<i class="icon-chevron-left float-left"></i></a></li>
                                @else
                                    <li @if($k == 0)class="ui-tabs-active"@endif><a href="#snav-content{{ $k+1 }}"><i class="icon-double-angle-right"></i>{{ $visaType->title }}<i class="icon-chevron-right"></i></a></li>
                                @endif
                            @endforeach
                        </ul>

                        <div class="card">
                            <div class="card-header"><strong>{{ trans('website.required_documents') }}</strong></div>
                            <div class="card-body">
                                {!! $requiredDocuments->content !!}
                            </div>
                        </div>
                    </div>

                    <div class="col_two_third col_last nobottommargin">
                        @foreach ($visaTypes as $k => $visaType)
                        <div id="snav-content{{ $k+1 }}">
                            <div class="heading-block">
                                <h4>{{ $visaType->title }}</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table cart">
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="notopborder cart-product-name">
                                                <strong>{{ trans('website.visa_type') }}</strong>
                                            </td>

                                            <td class="notopborder cart-product-name">
                                                <span class="amount">{{ $visaType->type }}</span>
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="cart-product-name">
                                                <strong>{{ trans('website.visa_validity') }}</strong>
                                            </td>

                                            <td class="cart-product-name">
                                                <span class="amount">{{ $visaType->validity }}</span>
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="cart-product-name">
                                                <strong>{{ trans('website.stay_validity') }}</strong>
                                            </td>

                                            <td class="cart-product-name">
                                                <span class="amount">{{ $visaType->stay_validity }}</span>
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="cart-product-name">
                                                <strong>{{ trans('website.processing_time') }}</strong>
                                            </td>

                                            <td class="cart-product-name">
                                                <span class="amount">{{ $visaType->processing_time }}</span>
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="cart-product-name">
                                                <strong>{{ trans('website.total_cost') }}</strong>
                                            </td>

                                            <td class="cart-product-name">
                                                <span class="amount">AED {{ $visaType->cost }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <a href="{{ url('application/step3/' . $visaType->id) }}" class="btn btn-success">{{ trans('website.apply_now') }}</a>
                                                <a href="{{ url('/') }}" class="btn btn-secondary">{{ trans('website.cancel') }}</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
<link rel="stylesheet" href="{{ url('site_assets') }}/css/components/datepicker.css" type="text/css" />
<style>
    .card-header {
        background-color: #8E1E26;
        color: #fff;
    }
</style>
@endsection
