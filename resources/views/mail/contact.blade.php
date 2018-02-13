@component('mail::message')
# Southeast PHP

<a href="{{ env('APP_URL') }}/img/sephp.png" alt="Southeast PHP Logo"></a>

The body of your message.

@component('mail::button', ['url' => 'login'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
