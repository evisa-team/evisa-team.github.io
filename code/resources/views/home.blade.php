@extends('layouts.website')

@section('content')
<section id="slider" class="slider-element slider-parallax swiper_wrapper clearfix">
    <div class="slider-parallax-inner">
        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                @foreach ($slider as $slide)
                <div class="swiper-slide dark" style="background-image: url('{{ url('images/' . $slide->url) }}');">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-animate="fadeInUp">{{ $slide->text }}</h2>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
            <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
            <div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div>
        </div>
    </div>
</section>

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="promo promo-light promo-full bottommargin-lg header-stick notopborder">
            <div class="container clearfix">
                {!! Form::open(['url' => 'application/step2']) !!}
                <div class="col_two_fifth nobottommargin">
                    <label>{{ trans('website.choose_nationality') }}</label>
                    {!! Form::select('nationality', $countries, null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                </div>
                <div class="col_two_fifth nobottommargin">
                    <label>{{ trans('website.residence_country') }}</label>
                    {!! Form::select('residence_country', $countries, null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                </div>
                <br>
                <input type="submit" class="button button-dark button-rounded" value="{{ trans('website.go') }}" />
                {!! Form::close() !!}
            </div>
        </div>
        <div class="container clearfix">
            <div class="container clearfix">
                <div class="fancy-title title-dotted-border">
                    <h3>{{ trans('website.processing_steps') }}</h3>
                </div>
                <div class="col_one_fourth">
                    <div class="feature-box fbox-center fbox-bg fbox-outline fbox-dark fbox-effect">
                        <div class="fbox-icon">
                            <a href="#"><i class="i-alt">1</i></a>
                        </div>
                        <h3>{{ trans('website.apply_online') }}<span class="subtitle">{{ trans('website.step') }} 1</span></h3>
                    </div>
                </div>
                <div class="col_one_fourth">
                    <div class="feature-box fbox-center fbox-bg fbox-outline fbox-dark fbox-effect">
                        <div class="fbox-icon">
                            <a href="#"><i>2</i></a>
                        </div>
                        <h3>{{ trans('website.pay_via_visa') }}<span class="subtitle">{{ trans('website.step') }} 2</span></h3>
                    </div>
                </div>
                <div class="col_one_fourth">
                    <div class="feature-box fbox-center fbox-bg fbox-outline fbox-dark fbox-effect">
                        <div class="fbox-icon">
                            <a href="#"><i class="i-alt">3</i></a>
                        </div>
                        <h3>{{ trans('website.visa_processing') }}<span class="subtitle">{{ trans('website.step') }} 3</span></h3>
                    </div>
                </div>
                <div class="col_one_fourth col_last">
                    <div class="feature-box fbox-center fbox-bg fbox-outline fbox-dark fbox-effect">
                        <div class="fbox-icon">
                            <a href="#"><i class="i-alt">4</i></a>
                        </div>
                        <h3>{{ trans('website.print_your_visa') }}<span class="subtitle">{{ trans('website.step') }} 4</span></h3>
                    </div>
                </div>

                <div class="clear"></div>

                <div class="fancy-title title-dotted-border">
                    <h3>{{ trans('website.visa_types') }}</h3>
                </div>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</section><!-- #content end -->
@endsection
