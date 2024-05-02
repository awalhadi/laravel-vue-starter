@component('mail::message')
    # Welcome to {{ config('app.name') }}

    {{-- Hello {{ $user->name ?? 'user' }}, --}}
    Hello,

    Thank you for joining our website! We are excited to have you as part of our community.

    If you have any questions or need assistance, feel free to reach out to our support team.

    Best regards,
    The {{ config('app.name') }} Team
@endcomponent
