<!doctype html>

<html lang="fr" dir="ltr" data-bs-theme="light">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Change the text within the <title> tag to match the webpage's content -->

    <title>@yield('title')</title>



    <link rel="icon" type="image/x-icon" href="{{ asset('kaoural/img/favicon/favicon.ico') }}">

    {{-- <link rel="manifest" href="assets/logo/site.webmanifest"> --}}


    <!-- Stylesheet Libraries for Enhanced User Experience -->

    <!-- AOS: Animate On Scroll Stylesheet -->

    <link rel="stylesheet" href="{{ asset('conn/assets/libraries/aos/aos.css') }}">

    <!-- Main CSS: Compiled Styles Using Bootstrap's SCSS and Custom Modifications -->

    <link rel="stylesheet" href="{{ asset('conn/assets/css/main.min.css') }}">

    <!-- Custom Stylesheet: Additional Styles -->

    <link rel="stylesheet" href="{{ asset('conn/assets/css/style.css') }}">




    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css" />

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js"></script>


</head>

<body>


    <!-- Loader Wrapper -->
    <div
        class="loader-wrapper overflow-hidden d-flex bg-body position-fixed top-0 end-0 bottom-0 start-0 justify-content-center align-items-center transition-all ease-in-out duration-1000 opacity-100 w-100">
        <div class="d-flex flex-column row-gap-7 align-items-center">
            <img src="{{ asset('kaoural/img/logo kaoural.png') }}" height="50" alt="logo">
            <div class="spinner-border text-primary-emphasis p-5" role="status">
                <span class="visually-hidden">en cours...</span>
            </div>
        </div>
    </div>


    <!-- Hero -->
    @yield('suite')



    <!-- JavaScript Libraries for Enhanced Functionality -->

    <!-- Bootstrap JavaScript: Bundle with Popper -->

    <script src="{{ asset('conn/assets/libraries/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- AOS: Animate On Scroll Library -->

    <script src="{{ asset('conn/assets/libraries/aos/aos.js') }}"></script>

    <!-- Custom JavaScript: General Scripts -->

    <script src="{{ asset('conn/assets/js/scripts.js') }}"></script>


    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"version":"2024.11.0","token":"9c2e13fdb29b400ca54e54f2fea6f513","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}'
        crossorigin="anonymous"></script>

</body>

<!-- Mirrored from tigmatemplate.me/vexa/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Dec 2025 17:37:49 GMT -->

</html>
