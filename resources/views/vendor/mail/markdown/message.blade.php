@component('mail::layout')
    {{-- Header --}}
    @slot('header')
{{--        @component('mail::header', ['url' => config('dash')])--}}
{{--            <img src="/images/kokro-yellow.png" alt="{{config('app.name')}}"/>--}}
{{--        @endcomponent--}}
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        @endcomponent
    @endslot
@endcomponent
