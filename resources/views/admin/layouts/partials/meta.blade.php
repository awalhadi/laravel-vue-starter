
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
