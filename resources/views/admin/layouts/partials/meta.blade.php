
@php
  $title = (getPageMeta('title') ? getPageMeta('title') . '|' : '');
  $title .= systemSettings('site_title') ?? config('app.name', 'Laravel');
@endphp

<title>@yield('title', $title)</title>
<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keywords')">
<meta name="contributors" content="@awlhadi">
<!-- App favicon -->
<link rel="shortcut icon" href="{{ getStorageImage(config('settings.site_favicon'), false, 'favicon') }}">

{{-- final favicon --}}
<link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">

<link rel="icon" type="image/png" sizes="192x192"  href="images/favicon/android-icon-192x192.png"> 


<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">

<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
<link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="manifest" href="images/favicon/site.webmanifest">
{{-- final favicon --}}
