@extends('layouts.website')

@section('content')
<!-- Content
============================================= -->
<section id="content">
    <div class="container clearfix topmargin-sm">
        <div class="col-md-12 nobottommargin">
            <div id="job-apply" class="heading-block highlight-me bottommargin-sm">
                <h2>{{ trans('website.track_application') }}</h2>
            </div>

            <div class="contact-widget" data-alert-type="inline">
                <div class="section parallax nomargin noborder" style="background-image: url('{{ url('site_assets') }}/images/track_image.jpg');height: 200px"></div>
                <h2 class="col-md-8 offset-md-2 topmargin-sm text-center">{{ trans('website.track_page_desc') }}</h2>
                <div class="contact-form-result"></div>
                <form action="" method="post">
                    <div class="col_half">
                        <label>{{ trans('website.reference_number') }}</label>
                        <input type="text" name="reference_number" value="" class="sm-form-control required" />
                    </div>
                    <div class="clear"></div>

                    <div class="col_half">
                        <button class="button button-3d button-large nomargin btn btn-success" type="submit">{{ trans('website.track') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
<style>
    .table {
        margin-top: 20px;
    }
</style>
@endsection
