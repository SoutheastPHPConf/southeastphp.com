@component('mail::message')
# Southeast PHP

<a href="{{ env('APP_URL') }}/img/sephp.png" alt="Southeast PHP Logo"></a>

There was a new message sent from {{ $contact->first_name }} {{ $contact->last_name }}

* Email: {{ $contact->email }}
* Message: {{ $contact->message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
