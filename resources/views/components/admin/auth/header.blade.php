@props(['title' => "Sign"])

<div class="bg-primary">
  <div class="text-primary text-center p-4">
      <h5 class="text-white font-size-20">{{ __('Welcome Back !')}}</h5>
      <p class="text-white-50"> {{ $title }} {{ __('in to continue to')}} {{ config('settings.site_title', env('APP_NAME')) }}.</p>
      <a href="{{ url('/') }}" class="logo logo-admin">
          <img src="{{ getStorageImage(config('settings.site_logo'),false,'logo') }}" height="24" alt="{{ config('settings.site_title', env('APP_NAME')) }}">
      </a>
  </div>
</div>