@component('mail::header', ['url' => config('app.url')])
    {{ config('app.name') }}
@endcomponent
@component('mail::message')

    # Transaction Details <br><br>

{{-- <p>Hello <b style="font-weight: bolder;color: #0c0c0c">{{ $user->name }}</b>,</p><br>
<p>Thank you for choosing {{ config('app.name') }}.Your subscription is created and  transaction was processed successfully.We will send you a confirmation email once your subscription is approved.See transaction details below:</p>
<section>
    <article>
<table align="center">
    <tr>
        <td align="center">Ref#</td>
        <td align="center">Service</td>
        <td align="center">Amount</td>
    </tr>
    <tr>
        <td align="center">{{$ref}}</td>
        <td align="center">Subscription purchase</td>
        <td align="center">GHS {{$amount}}</td>
    </tr>
</table>
    </article>
</section>    <br> --}}
{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
