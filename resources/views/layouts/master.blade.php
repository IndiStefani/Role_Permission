<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard &mdash; Arfa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/perfect-scrollbar/css/perfect-scrollbar.css') }}">

    <!-- CSS for this page only -->
    @stack('css')
    <!-- End CSS  -->

    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-override.min.css') }}">
    <link rel="stylesheet" id="theme-color" href="{{ asset('assets/css/dark.min.css') }}">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>

<body>
    <div id="app">
        <div class="shadow-header"></div>
        @include('layouts.header')
        @include('layouts.nav')

        @yield('content')

        @include('layouts.footer')
    </div>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>


    <!-- js for this page only -->
    @stack('js')
    <!-- ======= -->
    <script src="{{ asset('assets/js/main.min.js') }}"></script>

    <script>
        // table
        $(document).ready(function() {
            $('#table-id').DataTable({
                paging: true,
                searching: false,
                ordering: true,
                // Add more options as needed
            });
        });

        // date picker
        $('.date').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy/mm/dd'
        }).on('changeDate', function(e) {
            console.log(e.target.value);
        });


        // sidebar
        document.addEventListener('DOMContentLoaded', function() {
            var links = document.querySelectorAll('.link');

            links.forEach(function(link) {
                link.addEventListener('click', function() {
                    var currentRoute = this.getAttribute('data-route');

                    // Hapus kelas active dari semua elemen
                    links.forEach(function(link) {
                        link.parentNode.classList.remove('active');
                    });

                    // Tambahkan kelas active ke elemen yang di-klik
                    this.parentNode.classList.add('active');

                    // Simpan status menu aktif di localStorage
                    localStorage.setItem('activeRoute', currentRoute);
                });
            });

            // Ambil status menu aktif dari localStorage saat halaman dimuat
            var activeRoute = localStorage.getItem('activeRoute');

            // Tambahkan kelas active ke elemen dengan data-route yang sesuai
            if (activeRoute) {
                var activeLink = document.querySelector('.link[data-route="' + activeRoute + '"]');
                if (activeLink) {
                    activeLink.parentNode.classList.add('active');
                }
            }
        });
    </script>
</body>

</html>