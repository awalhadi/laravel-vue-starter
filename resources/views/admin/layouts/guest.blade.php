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

</head>

<body data-sidebar="dark">
    <div id="app" class="account-pages my-5 pt-5">
        <div class="container">
          @if (!empty($slot) && !$slot->isEmpty())
              {{ $slot }}
          @endif

          @isset($content)
              @yield('content')
          @endisset
        </div>
    </div>



    @yield('modal')
    <!-- JAVASCRIPT -->
    @include('admin.layouts.partials.scripts')

@include('common.toggle-status-update')

</body>

</html>
