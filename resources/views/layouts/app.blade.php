<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- CSS files -->
    <link href="{{ asset('dist/css/tabler.min.css') }}?1692870487" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-flags.min.css') }}?1692870487" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-payments.min.css') }}?1692870487" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-vendors.min.css') }}?1692870487" rel="stylesheet" />
    <link href="{{ asset('dist/css/demo.min.css') }}?1692870487" rel="stylesheet" />

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>

    @livewireStyles

</head>

<body>
    <script src="{{ asset('dist/js/demo-theme.min.js') }}?1692870487"></script>
    <div class="page">

        <!-- Navbar -->
        @include('layouts.partials.navbar')
        <div class="page-wrapper">\

            <!-- Header -->
            @include('layouts.partials.header')

            <!-- Body -->
            <div class="page-body">
                <div class="container-xl">
                    {{ $slot }}
                </div>
            </div>

            <!-- Footer -->
            @include('layouts.partials.footer')

        </div>
    </div>


    <!-- Libs JS -->
    <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}?1692870487" defer></script>
    <script src="{{ asset('dist/libs/jsvectormap/dist/js/jsvectormap.min.js') }}?1692870487" defer></script>
    <script src="{{ asset('dist/libs/jsvectormap/dist/maps/world.js') }}?1692870487" defer></script>
    <script src="{{ asset('dist/libs/jsvectormap/dist/maps/world-merc.js') }}?1692870487" defer></script>
    <!-- Tabler Core -->

    <script src="{{ asset('dist/js/tabler.min.js') }}?1692870487" defer></script>
    <script src="{{ asset('dist/js/demo.min.js') }}?1692870487" defer></script>

    <script>
        document.addEventListener('livewire:navigated', () => {
          console.log('Navigated. Navbar tetap tidak reload.');
        });
    </script>


    @livewireScripts
    <livewire:components.modal.std />
    @stack('script')
    <script>
        window.addEventListener('modal-hide', event => {
            $('#' + event.detail.modal).modal('hide');
        })
        window.addEventListener('modal-show', event => {
            $('#' + event.detail.modal).modal('show');

            // tinymce.init({
            //     selector: '#description',
            //     plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            //     toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            // });

        })
        @if (session()->has('success'))
            Swal.fire({
                icon: 'success',
                title: 'BERHASIL!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            })
        @elseif (session()->has('error'))
            Swal.fire({
                icon: 'error',
                text: 'GAGAL!',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 3000
            })
        @endif
    </script>
</body>

</html>
