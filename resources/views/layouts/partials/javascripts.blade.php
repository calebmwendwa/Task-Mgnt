<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>

@if(file_exists(public_path('js/lang/' . session()->get('user.language', config('app.locale')) . '.js')))
    <script src="{{ asset('js/lang/' . session()->get('user.language', config('app.locale')) . '.js' ) }}"></script>
@else
    <script src="{{ asset('js/lang/en.js') }}"></script>
@endif
@php
    $business_date_format = session('business.date_format', config('constants.default_date_format'));
    $datepicker_date_format = str_replace('d', 'dd', $business_date_format);
    $datepicker_date_format = str_replace('m', 'mm', $datepicker_date_format);
    $datepicker_date_format = str_replace('Y', 'yyyy', $datepicker_date_format);

    $moment_date_format = str_replace('d', 'DD', $business_date_format);
    $moment_date_format = str_replace('m', 'MM', $moment_date_format);
    $moment_date_format = str_replace('Y', 'YYYY', $moment_date_format);

    $business_time_format = session('business.time_format');
    $moment_time_format = 'HH:mm';
    if($business_time_format == 12){
        $moment_time_format = 'hh:mm A';
    }

    $common_settings = !empty(session('business.common_settings')) ? session('business.common_settings') : [];

    //$default_datatable_page_entries = !empty($common_settings['default_datatable_page_entries']) ? $common_settings['default_datatable_page_entries'] : 25;
    $default_datatable_page_entries = 25;
@endphp

<script>
    base_path = "{{url('/')}}";
    icon_url = "{{ asset('img/icons/') }}";
    Dropzone.autoDiscover = false;
    moment.tz.setDefault('{{ Session::get("business.time_zone") }}');

    $(document).ready(function(){
        // setInterval(function(){
        //      $.ajax({
        //          url: '/redis-init',
        //          dataType: 'json',
        //          type: 'GET'
        //      });
        //  }, 5000);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        @if(config('app.debug') == false)
            $.fn.dataTable.ext.errMode = 'throw';
        @endif
    });

    var financial_year = {
        start: moment('{{ Session::get("financial_year.start") }}'),
        end: moment('{{ Session::get("financial_year.end") }}'),
    }
    @if(file_exists(public_path('AdminLTE/plugins/select2/lang/' . session()->get('user.language', config('app.locale')) . '.js')))
    //Default setting for select2
    $.fn.select2.defaults.set("language", "{{session()->get('user.language', config('app.locale'))}}");
    @endif

    var datepicker_date_format = "{{$datepicker_date_format}}";
    var moment_date_format = "{{$moment_date_format}}";
    var moment_time_format = "{{$moment_time_format}}";

    var app_locale = "{{session()->get('user.language', config('app.locale'))}}";

    {{--var non_utf8_languages = [--}}
    {{--    @foreach(config('constants.non_utf8_languages') as $const)--}}
    {{--    "{{$const}}",--}}
    {{--    @endforeach--}}
    {{--];--}}

    var __default_datatable_page_entries = "{{$default_datatable_page_entries}}";

    var __new_notification_count_interval = "{{config('constants.new_notification_count_interval', 60)}}000";
</script>

@if(file_exists(public_path('js/lang/' . session()->get('user.language', config('app.locale')) . '.js')))
    <script src="{{ asset('js/lang/' . session()->get('user.language', config('app.locale') ) . '.js') }}"></script>
@else
    <script src="{{ asset('js/lang/en.js') }}"></script>
@endif

<script src="{{ asset('js/functions.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/task.js') }}"></script>
<script src="{{ asset('js/help-tour.js') }}"></script>
<script src="{{ asset('js/documents_and_note.js') }}"></script>


<!-- TODO -->
@if(file_exists(public_path('AdminLTE/plugins/select2/lang/' . session()->get('user.language', config('app.locale')) . '.js')))
    <script src="{{ asset('AdminLTE/plugins/select2/lang/' . session()->get('user.language', config('app.locale') ) . '.js?v=' . $asset_v) }}"></script>
@endif
@php
    $validation_lang_file = 'messages_' . session()->get('user.language', config('app.locale') ) . '.js';
@endphp
@if(file_exists(public_path() . '/js/jquery-validation-1.16.0/src/localization/' . $validation_lang_file))
    <script src="{{ asset('js/jquery-validation-1.16.0/src/localization/' . $validation_lang_file . '?v=' . $asset_v) }}"></script>
@endif

@if(!empty($__system_settings['additional_js']))
    {!! $__system_settings['additional_js'] !!}
@endif

@yield('javascript')



