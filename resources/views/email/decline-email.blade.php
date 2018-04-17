@component('mail::message')
# Southeast PHP Conference!

### Modern PHP Toolbox

<img src="https://s3.amazonaws.com/southeastphp/logos/SouthEastPHPLogo.png">

Dear {{ $speaker->name }}, 

This is one of the hardest emails we have to write, and we know it's not easy for you to read, either. 

We read over 300 talk submissions and unfortunately we did not choose yours for Southeast PHP this year. But don't despair! There are more amazing conferences taking place this year with time to submit to them, and of course
there are great resources like HelpMeAbstract out there to help refine your talk abstracts! 

We do want to extend a special discount code to Southeast PHP Conference in case you are still hoping to get to Nashville this year! We hope to have an uncon track, so there is room for you to get your talk out there one more time!

Use the code `SoutheastPHP2018` and it will give you a discount on the current price. 

We hope to see you this year, and hope you submit next year!

@component('mail::button', ['url' => 'https://www.eventbrite.com/e/southeast-php-tickets-43007986044?aff=eac2'])
Tickets
@endcomponent

Thanks,<br>
{{ config('app.name') }} Organizers
@endcomponent
