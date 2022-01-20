@component('mail::message')
# Reset Password Account
Welcome {{ $data['data']->name }} 

@component('mail::button', [route('').$data['token']])
Click Here To Reset Password
@endcomponent
OR <br>
Copy The Link and Paste in Your Brawser <br>
<a href="{{ 'admin/reset-password/'.$data['token'] }}">{{ 'admin/reset-password/'.$data['token'] }}</a>
Thanks,<br>
{{ config('app.name') }}
@endcomponent