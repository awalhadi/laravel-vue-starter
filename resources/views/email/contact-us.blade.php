@component('mail::message')
    {{-- # Welcome to {{ config('app.name') }} --}}

    Hello {{ config('settings.site_title') }},

    {{$message ?? ''}}

    Best regards,
    {{ $first_name ?? '' }} {{$last_name ?? ''}}
    {{ $phone_number ?? '' }}
@endcomponent
