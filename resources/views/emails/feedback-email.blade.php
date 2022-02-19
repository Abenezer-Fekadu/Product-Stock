@component('mail::message')
# Review

Feedback About The Site
Sender Name: $data->name.
Message: $data->message
Email: $data->email
Phone: $data->phone

Thanks,<br>
{{ config('app.name') }}
@endcomponent
