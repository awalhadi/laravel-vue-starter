@component('mail::message')
### One-Time Password (OTP) Code

Dear User,

Your One-Time Password (OTP) code for authentication is:

**{{$otp}}**

This code is valid for a limited time. Do not share this code with anyone for security reasons. If you did not request this code, please disregard this message.

Thank you,

{{ config('app.name') }}

@endcomponent
