@component('mail::message')

<img src="https://southeastphp.com/img/sephp-lg.png">
<br>
Dear {{ $speaker->name }}, 

Congratulations! As we reviewed all the submissions we received, we came upon <b>"{{ $speaker->session_name }}"</b> and we knew we had to accept it. Were excited to see you this August!

We ask two quick things: 

1. Please confirm you can still attend and present at Southeast PHP, August 16th and 17th, 2018. 

2. If you confirm, please wait till we let you know to announce your talk. We want to make sure we let everyone not selected first so that way they don't find out via twitter. 

The organizers of Southeast PHP will be reaching out soon to get any travel details we need from you. If you can take a moment, please use the code `SPEAKER2018` and register for the conference and make sure
you mark any dietary preferences you may have/need.

We are so excited to welcome you to Nashville, and we can't wait for August!

@component('mail::button', ['url' => 'https://www.eventbrite.com/e/southeast-php-tickets-43007986044?aff=eac2'])
Tickets
@endcomponent

Thanks,<br>
{{ config('app.name') }} Organizers
@endcomponent
