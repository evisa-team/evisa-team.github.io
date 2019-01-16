@extends('layouts.website')

@section('content')
<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class=" nobottommargin">
                <div id="job-apply" class="heading-block highlight-me">
                    <h2>{{ trans('website.apply_now') }}</h2>
                </div>

                <div class="contact-widget" data-alert-type="inline">

                    <div class="contact-form-result"></div>

                    <form action="" id="template-jobform" name="template-jobform" method="post" role="form" enctype="multipart/form-data">
                        <div class="form-process"></div>

                        <div class="col_half">
                            <label>{{ trans('website.full_name') }}</label>
                            <input type="text" name="full_name" value="" class="sm-form-control required" />
                        </div>
                        <div class="col_half col_last">
                            <label>{{ trans('website.date_of_travel') }}</label>
                            <input type="text" name="travel_date" value="" class="sm-form-control tleft date_picker default required" placeholder="YYYY-MM-DD">
                        </div>

                        <div class="clear"></div>

                        <div class="col_half">
                            <label>{{ trans('website.contact_number') }}</label>
                            <input type="text" name="contact_number" value="" class="sm-form-control required" />
                        </div>
                        <div class="col_half col_last">
                            <label>{{ trans('website.religion') }}</label>
                            <select name="religion" id="template-jobform-position" class="sm-form-control required">
                                <option value="">-- {{ trans('website.select') . ' ' . trans('website.religion') }} --</option>
                                <option value="0">{{ trans('website.religion_0') }}</option>
                                <option value="1">{{ trans('website.religion_1') }}</option>
                                <option value="2">{{ trans('website.religion_2') }}</option>
                                <option value="3">{{ trans('website.religion_3') }}</option>
                                <option value="4">{{ trans('website.religion_4') }}</option>
                                <option value="5">{{ trans('website.religion_5') }}</option>
                                <option value="6">{{ trans('website.religion_6') }}</option>
                                <option value="7">{{ trans('website.religion_7') }}</option>
                                <option value="8">{{ trans('website.religion_8') }}</option>
                                <option value="9">{{ trans('website.religion_9') }}</option>
                            </select>
                        </div>

                        <div class="clear"></div>

                        <div class="col_half">
                            <label>{{ trans('website.faith') }}</label>
                            <input type="text" name="faith" value="" class="sm-form-control required" />
                        </div>
                        <div class="col_half col_last">
                            <label>{{ trans('website.email_address') }}</label>
                            <input type="email" name="email" value="" class="required email sm-form-control" />
                        </div>

                        <div class="clear"></div>
                        
                        <div class="col_half">
                            <label>{{ trans('website.contact_address') }}</label>
                            <input type="text" name="contact_address" value="" class="sm-form-control required" />
                        </div>
                        <div class="col_half col_last">
                            <label>{{ trans('website.job_title') }}</label>
                            <input type="text" name="job_title" value="" class="required sm-form-control" />
                        </div>

                        <div class="clear"></div>

                        <div class="col_half">
                            <label>{{ trans('website.martial_status') }}</label>
                            <select name="marital_status" class="sm-form-control required">
                                <option value="">-- {{ trans('website.select') . ' ' . trans('website.martial_status') }} --</option>
                                <option value="0">{{ trans('website.martial_status_0') }}</option>
                                <option value="1">{{ trans('website.martial_status_1') }}</option>
                                <option value="2">{{ trans('website.martial_status_2') }}</option>
                                <option value="3">{{ trans('website.martial_status_3') }}</option>
                                <option value="4">{{ trans('website.martial_status_4') }}</option>
                                <option value="5">{{ trans('website.martial_status_5') }}</option>
                                <option value="6">{{ trans('website.martial_status_6') }}</option>
                            </select>
                        </div>
                        <div class="col_half col_last">
                            <label>{{ trans('website.name_of_mother') }}</label>
                            <input type="text" name="mother_name" value="" class="sm-form-control required" />
                        </div>

                        <div class="clear"></div>

                        <div class="col_half">
                            <label>{{ trans('website.passport_number') }}</label>
                            <input type="text" name="passport_number" value="" class="sm-form-control required" />
                        </div>
                        <div class="col_half col_last">
                            <label>{{ trans('website.passport_expiry_date') }}</label>
                            <input type="text" name="passport_expiry_date" value="" class="sm-form-control tleft date_picker default required" placeholder="YYYY-MM-DD">
                        </div>

                        <div class="clear"></div>

                        <div class="col_half">
                            <label>{{ trans('website.residency_issue_date') }}</label>
                            <input type="text" name="residency_issue_date" value="" class="sm-form-control tleft date_picker past required" placeholder="YYYY-MM-DD">
                        </div>
                        <div class="col_half col_last">
                            <label>{{ trans('website.residency_expiry_date') }}</label>
                            <input type="text" name="residency_expire_date" value="" class="sm-form-control tleft date_picker default required" placeholder="YYYY-MM-DD">
                        </div>

                        <div class="clear"></div>

                        <div class="col_half">
                            <label>{{ trans('website.city_of_arrival') }}</label>
                            <input type="text" name="arrival_city" value="" class="sm-form-control required" />
                        </div>
                        <div class="col_half col_last">
                            <label>{{ trans('website.port_of_arrival') }}</label>
                            <input type="text" name="arrival_port" value="" class="required sm-form-control" />
                        </div>

                        <div class="clear"></div>

                        <div class="col_half">
                            <label>{{ trans('website.passport_img') }}</label>
                            {!! Form::file('passport_img', ['class' => 'sm-form-control required']) !!}
                        </div>
                        <div class="col_half col_last">
                            <label>{{ trans('website.picture') }}</label>
                            {!! Form::file('picture', ['class' => 'sm-form-control required']) !!}
                        </div>

                        <div class="clear"></div>

                        <div class="col_half">
                            <label>{{ trans('website.residence_img') }}</label>
                            {!! Form::file('residence_img', ['class' => 'sm-form-control']) !!}
                        </div>
                        <div class="col_half col_last">
                            <label>{{ trans('website.other_documents') }}</label>
                            <div class="col-lg-12 bottommargin">
								<input id="input-6" name="other_documents[]" type="file" multiple class="file-loading" data-show-preview="false">
							</div>
                        </div>

                        <div class="clear"></div>

                        <div class="col_full">
                            <button class="button button-3d button-large btn-block nomargin btn btn-success" type="submit" value="apply">{{ trans('website.send_application') }}</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
<link rel="stylesheet" href="{{ url('site_assets') }}/css/components/datepicker.css" type="text/css" />
<link rel="stylesheet" href="{{ url('site_assets') }}/css/components/bs-filestyle.css" type="text/css" />
@endsection

@section('scripts')
<script src="{{ url('site_assets') }}/js/components/datepicker.js"></script>
<script src="{{ url('site_assets') }}/js/components/bs-filestyle.js"></script>
<script>
    $(function() {
        $.fn.datepicker.dates['ar'] = {
            days: ["الأحد", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
            daysShort: ["أحد", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            daysMin: ["أح", "إث", "ثل", "أر", "خم", "جم", "سب", "أح"],
            months: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
            monthsShort: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
            today: "اليوم",
            clear: "مسح"
        };

        $('.date_picker.default').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            startDate: "today"
            @if($lang == 'ar')
                ,rtl: true
                ,language: 'ar'
            @endif
        });

        $('.date_picker.past').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            endDate: "0"
            @if($lang == 'ar')
                ,rtl: true
                ,language: 'ar'
            @endif
        });

        $("#input-6").fileinput({
            showUpload: false,
            maxFileCount: 3,
            mainClass: "input-group-lg",
            showCaption: true
        });
    });
</script>
@endsection