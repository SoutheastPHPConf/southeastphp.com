@component('mail::message')

    <img src="https://southeastphp.com/img/sephp-lg.png">
    <br>
    Dear {{ $speaker->name }},

    We are just letting you know its totally cool to let the world know you are speaking at Southeast PHP this summer!

    Unfortunately, our graphics person had a minor family emergency so while we hoped it would be resolved quickly in order to get our speaker graphics, we don't want to wait or put pressure on them right now.

    We will be tweeting and retweeting our hands off to let the world know, and we hope you will too!

    We are so excited to welcome you to Nashville, and we can't wait for August!

    If you haven't gotten your ticket yet, please use the link below and the code `SPEAKER2018`.

    @component('mail::button', ['url' => 'https://www.eventbrite.com/e/southeast-php-tickets-43007986044?aff=eac2'])
        Tickets
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }} Organizers
@endcomponent
