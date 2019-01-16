<!DOCTYPE html>
<html dir="ltr" lang="en-US">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="E-visa" />
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ url('site_assets') }}/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="{{ url('site_assets') }}/style.css" type="text/css" />
        <link rel="stylesheet" href="{{ url('site_assets') }}/css/swiper.css" type="text/css" />
        <link rel="stylesheet" href="{{ url('site_assets') }}/css/dark.css" type="text/css" />
        <link rel="stylesheet" href="{{ url('site_assets') }}/css/font-icons.css" type="text/css" />
        <link rel="stylesheet" href="{{ url('site_assets') }}/css/animate.css" type="text/css" />
        <link rel="stylesheet" href="{{ url('site_assets') }}/css/responsive.css" type="text/css" />
        <link rel="stylesheet" href="{{ url('site_assets') }}/css/custom.css" type="text/css" />

        @if($lang == 'ar')
            <link rel="stylesheet" href="{{ url('site_assets') }}/css/bootstrap-rtl.css" type="text/css" />
            <link rel="stylesheet" href="{{ url('site_assets') }}/style-rtl.css" type="text/css" />
            <link rel="stylesheet" href="{{ url('site_assets') }}/css/dark-rtl.css" type="text/css" />
            <link rel="stylesheet" href="{{ url('site_assets') }}/css/font-icons-rtl.css" type="text/css" />
            <link rel="stylesheet" href="{{ url('site_assets') }}/css/responsive-rtl.css" type="text/css" />
            <link rel="stylesheet" href="{{ url('site_assets') }}/css/custom-rtl.css" type="text/css" />
        @endif

        @yield('css')
        
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@if(!empty($page_title)){{ $page_title }} | @endif{{ $config->{'title' . $langPrefix} }}</title>
    </head>
    <body class="stretched @if($lang == 'ar')rtl @endif">
        <!-- Document Wrapper
        ============================================= -->
        <div id="wrapper" class="clearfix">
            <!-- Header
            ============================================= -->
            <header id="header" class="full-header">
                <div id="header-wrap">
                    <div class="container clearfix">
                        <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
                        <!-- Logo
                        ============================================= -->
                        <div id="logo">
                            <a href="{{ url('/') }}" class="standard-logo" data-dark-logo="{{ url('site_assets') }}/images/RGB.png"><img src="{{ url('site_assets') }}/images/RGB.png" alt="E-visa Logo"></a>
                            <a href="{{ url('/') }}" class="retina-logo" data-dark-logo="{{ url('site_assets') }}/images/RGB.png"><img src="{{ url('site_assets') }}/images/RGB.png" alt="E-visa Logo"></a>
                        </div><!-- #logo end -->
                        <!-- Primary Navigation
                        ============================================= -->
                        <nav id="primary-menu">
                            <ul>
                                <li class="current"><a href="{{ url('/') }}"><div>{{ trans('website.home') }}</div></a></li>
                                <li><a href="{{ url('pages/about_us') }}"><div>{{ trans('website.about_us') }}</div></a></li>
                                <li><a href="#"><div>{{ trans('website.track_application') }}</div></a></li>
                                <li><a href="#"><div>{{ trans('website.pay_now') }}</div></a></li>
                                <li><a href="#"><div>{{ trans('website.contact') }}</div></a></li>
                                <li><a href="#"><div>{{ trans('website.faq') }}</div></a></li>
                            </ul>
                            <div class="top-links">
                                <ul class="sf-js-enabled clearfix" style="touch-action: pan-y;">
                                    @if($lang == 'en')
                                        <li><a>EN</a>
                                            <ul>
                                                <li><a href="{{ url('setlocale/ar') }}"><img src="{{ url('site_assets') }}/images/icons/flags/arabic.png" alt="Arabic"> AR</a></li>
                                            </ul>
                                        </li>
                                    @else
                                        <li><a>AR</a>
                                            <ul>
                                                <li><a href="{{ url('setlocale/en') }}"><img src="{{ url('site_assets') }}/images/icons/flags/english.png" alt="English"> EN</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </nav><!-- #primary-menu end -->
                    </div>
                </div>
            </header><!-- #header end -->

            @yield('content')

            <!-- Footer
            ============================================= -->
            <footer id="footer" class="dark">
                <div class="container">
                    <!-- Footer Widgets
                    ============================================= -->
                    <div class="footer-widgets-wrap clearfix">
                        <div class="col_one_third">
                            <div class="widget clearfix">
                                <img src="{{ url('site_assets') }}/images/footer-widget-logo.png" alt="" class="footer-logo" width="50%">
                                <div style="background: url('{{ url("site_assets") }}/images/world-map.png') no-repeat center center; background-size: 100%;">
                                    <address>
                                        <strong>{{ trans('website.location') }}:</strong><br>
                                        {{ $config->{'location' . $langPrefix} }}
                                        <br>
                                    </address>
                                    <abbr title="{{ trans('website.phone') }}"><strong>{{ trans('website.phone') }}:</strong></abbr> {{ $config->phone }}<br>
                                    <abbr title="{{ trans('website.fax') }}"><strong>{{ trans('website.fax') }}:</strong></abbr> {{ $config->fax }}<br>
                                    <abbr title="{{ trans('website.email') }}"><strong>{{ trans('website.email') }}:</strong></abbr> {{ $config->email }}
                                </div>
                            </div>
                        </div>
                        <div class="col_one_third">
                            <div class="widget widget_links clearfix">
                                <h4>{{ trans('website.links') }}</h4>
                                <ul>
                                    <li><a href="{{ url('/') }}">{{ trans('website.home') }}</a></li>
                                    <li><a href="{{ url('pages/about_us') }}">{{ trans('website.about_us') }}</a></li>
                                    <li><a href="#">{{ trans('website.track_application') }}</a></li>
                                    <li><a href="#">{{ trans('website.holidays') }}</a></li>
                                    <li><a href="#">{{ trans('website.pay_now') }}</a></li>
                                    <li><a href="#">{{ trans('website.contact') }}</a></li>
                                    <li><a href="#">{{ trans('website.terms_and_conditions') }}</a></li>
                                    <li><a href="#">{{ trans('website.privacy_statement') }}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col_one_third col_last">
                            <div class="widget subscribe-widget clearfix">
                                <h5><strong>{{ trans('website.subscribe') }}</strong> {{ trans('website.subscribe_text') }}:</h5>
                                <div class="widget-subscribe-form-result"></div>
                                <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                                    <div class="input-group divcenter">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="icon-email2"></i></div>
                                        </div>
                                        <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="{{ trans('website.enter_email') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="submit">{{ trans('website.subscribe') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="widget clearfix" style="margin-bottom: -20px;">
                                <div class="row">
                                    <div class="col-lg-6 clearfix bottommargin-sm">
                                        <a href="{{ $config->facebook_url }}" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
                                            <i class="icon-facebook"></i>
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <a href="{{ $config->facebook_url }}"><small style="display: block; margin-top: 3px;"><strong>{{ trans('website.like_us') }}</strong><br>on Facebook</small></a>
                                    </div>
                                    <div class="col-lg-6 clearfix">
                                        <a href="{{ $config->twitter_url }}" class="social-icon si-dark si-colored si-twitter nobottommargin" style="margin-right: 10px;">
                                            <i class="icon-twitter"></i>
                                            <i class="icon-twitter"></i>
                                        </a>
                                        <a href="{{ $config->twitter_url }}"><small style="display: block; margin-top: 3px;"><strong>{{ trans('website.follow_us') }}</strong><br>on Twitter</small></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .footer-widgets-wrap end -->
                </div>

                <!-- Copyrights
                ============================================= -->
                <div id="copyrights">
                    <div class="container clearfix">
                        <div class="col_half">
                            {{ trans('website.copyrights') }}<br>
                        </div>
                        <div class="col_half col_last tright">
                            <i class="icon-envelope2"></i> {{ $config->email }} <span class="middot">&middot;</span> <i class="icon-headphones"></i> {{ $config->phone }}
                        </div>
                    </div>
                </div><!-- #copyrights end -->
            </footer><!-- #footer end -->
        </div><!-- #wrapper end -->

        <!-- Go To Top
        ============================================= -->
        <div id="gotoTop" class="icon-angle-up"></div>

        <!-- External JavaScripts
        ============================================= -->
        <script src="{{ url('site_assets') }}/js/jquery.js"></script>
        <script src="{{ url('site_assets') }}/js/plugins.js"></script>

        <!-- Footer Scripts
        ============================================= -->
        <script src="{{ url('site_assets') }}/js/functions.js"></script>
        <script>
            $(function () {
                $("#side-navigation").tabs({show: {effect: "fade", duration: 400}});
            });
        </script>

        @yield('scripts')
    </body>
</html>