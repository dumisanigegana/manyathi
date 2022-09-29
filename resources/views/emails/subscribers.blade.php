@component('mail::message')
# Welcome to the first Newsletter

Dear {{$subscriber->user->fullname}},

You have created an account on our site system_name.com.

To activate your account and finalize your registration please confirm your email address by clicking on the link below:

@component('mail::button', ['url' => 'enter your desired url'])
I activate my account
@endcomponent


Thank you for using our service.

We look forward to interact more with you. For more information visit our blog.

{{ $message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent