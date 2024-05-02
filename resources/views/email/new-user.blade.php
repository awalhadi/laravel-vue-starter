@component('mail::message')
    # Welcome to {{ config('app.name') }}
  
    Hello {{ $content['full_name'] ?? '' }},

    Thank you for joining {{ config('app.name') }}! We are excited to have you as part of our community.

    If you have any questions or need assistance, feel free to reach out to our support team.

    Best regards,
    The {{ config('app.name') }} Team
@endcomponent
