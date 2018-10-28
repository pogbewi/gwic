@if (session()->has('flash_message'))
    <script type="text/javascript">
        notifier.notify(
                "{{ session('flash_message.message') }}",
                "{{ session('flash_message.title') }}"
                );
    </script>
@endif
