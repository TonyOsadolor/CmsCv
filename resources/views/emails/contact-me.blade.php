<x-mail::message>
# Hello {{ $receiver['othernames']}}!

You got a new message from: {{ $data['names'] }}.

Subject: {{ $data['subject'] }}

Here is what he wrote:
{{ $data['message'] }}

You can reply directly to: {{ $data['sender'] }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
