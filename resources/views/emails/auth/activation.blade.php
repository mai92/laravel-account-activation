@component('mail::message')
# Introduction

Halo {{ $user->name }}, silakan aktifkan akunmu

@component('mail::button', ['url' => route('auth.activate', [
    'email' => $user->email,
    'token' => $user->activation_token
])])
Aktifasi
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
