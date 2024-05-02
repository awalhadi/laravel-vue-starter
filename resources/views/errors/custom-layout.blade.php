<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | {{ config('site_title') ?? config(('app.name')) }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Mentors" name="description">
    <meta content="Mentors" name="author">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="contributors" content="@awlhadi, @zahidhassanshaikot">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ getStorageImage(config('settings.site_favicon'), false, 'favicon') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">

</head>

<body>

<div class="authentication-bg d-flex align-items-center pb-0 vh-100">
    <div class="content-center w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-4 ms-auto">
                                    <div class="ex-page-content">
                                        <h1 class="text-dark display-1 mt-4">@yield('code')!</h1>
                                        <h4 class="mb-4">@yield('message')</h4>
                                        <p class="mb-5"></p>
                                        <p class="mb-5"></p>
                                        <a class="btn btn-primary mb-5 waves-effect waves-light" href="{{ route('dashboard') }}"><i class="mdi mdi-home"></i> Back to Dashboard</a>
                                    </div>

                                </div>
                                <div class="col-lg-5 mx-auto">
                                    <img src="
                                    @if(View::getSection('code') == '503')
                                       {{asset('images/default/maintenance.png')}}
                                    @else
                                       {{asset('images/default/error.png')}}
                                    @endif"
                                     alt="" class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!--end row-->
        </div>
        <!-- end container -->
    </div>

</div>

<!-- JAVASCRIPT -->
<script src="/libs/jquery/jquery.min.js"></script>
<script src="/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/libs/metismenu/metisMenu.min.js"></script>
<script src="/libs/simplebar/simplebar.min.js"></script>
<script src="/libs/node-waves/waves.min.js"></script>

{{--<script defer src="/js/app.js"></script>--}}

</body>
</html>
