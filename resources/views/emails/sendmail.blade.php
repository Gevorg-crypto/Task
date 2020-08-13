@component('mail::message')
# Introduction

Thank You!

@component('mail::button', ['url' => ''])
Press Button
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
