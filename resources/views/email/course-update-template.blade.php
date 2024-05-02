@component('mail::message')
# Course Update

Dear {{ $studentName }},

We are writing to inform you about an update regarding one of your enrolled courses. Please review the details below:

Course: {{ $courseTitle }}
Update: {{ $updateDescription }}

We recommend that you log in to your account to access any additional resources or instructions related to this update.

Thank you for your attention to this matter.

Best regards,

The {{ config('app.name') }} Team
@endcomponent
