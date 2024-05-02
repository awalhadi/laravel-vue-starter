@component('mail::message')
# You have requested to reset your password

We cannot simply send you your old password. A unique link to reset your password has been generated for you. To reset your password, click the following link and follow the instructions.

@component('mail::button', ['url' => $content['rest_password_link']])
Reset Password
@endcomponent

If you did not request a password reset, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent