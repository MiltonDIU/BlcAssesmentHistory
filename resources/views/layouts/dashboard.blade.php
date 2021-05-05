<!DOCTYPE html>

<html lang="en">
<head>
    <base href="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ trans('panel.site_title') }}</title>
    <link href="{{ url('assets/coreui/css/style.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="{{ url('assets/coreui/vendors/_coreui/chartjs/css/coreui-chartjs.css')}}" rel="stylesheet">
    <style>
        .c-sidebar-brand-full {
            color: white!important;
        }
    </style>
</head>
<body class="c-app c-no-layout-transition">

@include('partials.menu')



<div class="c-wrapper">




    <header class="c-header c-header-fixed px-3">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
            <i class="fas fa-fw fa-bars"></i>
        </button>

        <a class="c-header-brand d-lg-none" href="#">{{ trans('panel.site_title') }}</a>

        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
            <i class="fas fa-fw fa-bars"></i>
        </button>

        <ul class="c-header-nav ml-auto">
            @if(count(config('panel.available_languages', [])) > 1)
                <li class="c-header-nav-item dropdown d-md-down-none">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach(config('panel.available_languages') as $langLocale => $langName)
                            <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                        @endforeach
                    </div>
                </li>
            @endif


        </ul>
    </header>

    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                @if(session('message'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif
                @if($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    @yield('content')
            </div>
        </main>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</div>

<script src="{{url('assets/coreui/vendors/_coreui/coreui-pro/js/coreui.bundle.min.js')}}"></script>
<!--[if IE]><!-->
<script src="{{url('assets/coreui/vendors/_coreui/icons/js/svgxuse.min.js')}}"></script>
<!--<![endif]-->

<script src="{{url('assets/coreui/vendors/_coreui/chartjs/js/coreui-chartjs.bundle.js')}}"></script>
<script src="{{url('assets/coreui/vendors/_coreui/utils/js/coreui-utils.js')}}"></script>
<script src="{{url('assets/coreui/js/charts.js')}}"></script>
<script src="{{url('assets/coreui/js/main.js')}}"></script>
@stack('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        setTimeout(function() {
            document.body.classList.remove('c-no-layout-transition')
        }, 2000);
    });
</script>
</body>
</html>
