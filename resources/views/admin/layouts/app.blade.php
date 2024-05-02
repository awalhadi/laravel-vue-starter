<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('admin.layouts.partials.meta')

    @include('admin.layouts.partials.styles')



    <!-- Scripts -->
    @vite('resources/sass/app.scss')
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

</head>

<body data-sidebar="dark">
    <div id="app">

        @include('admin.layouts.partials.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layouts.partials.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    @include('admin.layouts.partials.breadcrumb')
                    <!-- end page title -->

                    <div id="loadingState" class="site_loader">
                        <div class="spinner-border text-info" role="status">
                            <span class="visually-hidden">{{ __('Loading...') }}</span>
                        </div>
                    </div>
                    <!-- Start Your Main Content Here-->
                    @if (!empty($slot) && !$slot->isEmpty())
                        {{ $slot }}
                    @endif

                    @isset($content)
                        @yield('content')
                    @endisset

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <x-admin.partials.footer />
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
    </div>



    @yield('modal')
    <!-- JAVASCRIPT -->
    @include('admin.layouts.partials.scripts')
</body>

</html>
