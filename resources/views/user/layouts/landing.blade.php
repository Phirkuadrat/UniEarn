<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>
    @include('partials.apply-confirm-modal')
    @include('partials.delete-confirm-modal')
    @include('partials.notification')


    {{ $slot }}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->any())
                const errors = @json($errors->all());
                showNotificationPopup('error', 'Validation Error!', 'Please review the form fields.', errors);
                showAddPortfolioModal();
            @endif

            @if (session('success'))
                showNotificationPopup('success', 'Success!', "{{ session('success') }}");
            @endif
            @if (session('error') && !$errors->any())
                showNotificationPopup('error', 'Error!', "{{ session('error') }}");
            @endif
            @if (session('info'))
                showNotificationPopup('info', 'Information:', "{{ session('info') }}");
            @endif
            @if (session('warning'))
                showNotificationPopup('warning', 'Warning!', "{{ session('warning') }}");
            @endif
        });
    </script>
</body>

</html>
