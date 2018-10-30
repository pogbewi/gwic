@component('mail::message')
    <h1>Hello Admin!, From {{ setting('site_title', 'GWIC') }}</h1>

    <h2>New Business Investment Request From {{ $title }} ' ' {{ $firstname. ' '. $lastname }}</h2>

    <p> The form data is attached for your view</p>

    @component('mail::subcopy')
        <a href="{{ route('admin.index') }}" class="link">Click to view on Admin Dashboard.</a>
    @endcomponent
@endcomponent
