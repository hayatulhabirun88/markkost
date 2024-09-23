<!DOCTYPE html>
<html lang="en" class=" ">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cari | Mark Kost</title>
    <meta content="Mark Kost Mobile App" name="description" />
    <meta content="themepassion" name="author" />


    <!-- App Icons -->
    <link rel="apple-touch-icon" sizes="57x57"
        href="{{ asset('/') }}mobile/assets/images/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60"
        href="{{ asset('/') }}mobile/assets/images/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72"
        href="{{ asset('/') }}mobile/assets/images/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ asset('/') }}mobile/assets/images/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
        href="{{ asset('/') }}mobile/assets/images/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="{{ asset('/') }}mobile/assets/images/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
        href="{{ asset('/') }}mobile/assets/images/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="{{ asset('/') }}mobile/assets/images/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('/') }}mobile/assets/images/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('/') }}mobile/assets/images/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512"
        href="{{ asset('/') }}mobile/assets/images/icons/android-icon-512x512.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('/') }}mobile/assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
        href="{{ asset('/') }}mobile/assets/images/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('/') }}mobile/assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('/') }}mobile/assets/images/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('/') }}mobile/assets/images/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- CORE CSS FRAMEWORK - START -->
    <link href="{{ asset('/') }}mobile/assets/css/preloader.css" type="text/css" rel="stylesheet" media="screen" />

    <link href="{{ asset('/') }}mobile/modules/materialize/materialize.min.css" type="text/css" rel="stylesheet"
        media="screen" />
    <link href="{{ asset('/') }}mobile/modules/fonts/mdi/appicon/appicon.css" type="text/css" rel="stylesheet"
        media="screen" />
    <link href="{{ asset('/') }}mobile/modules/fonts/mdi/materialdesignicons.min.css" type="text/css"
        rel="stylesheet" media="screen" />
    <link href="{{ asset('/') }}mobile/modules/perfect-scrollbar/perfect-scrollbar.css" type="text/css"
        rel="stylesheet" media="screen" />


    <!-- CORE CSS FRAMEWORK - END -->

    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
    <link href="{{ asset('/') }}mobile/modules/fancybox/jquery.fancybox.min.css" rel="stylesheet" type="text/css"
        media="screen" />
    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

    <!-- CORE CSS TEMPLATE - START -->


    <link href="{{ asset('/') }}mobile/assets/css/style.css" type="text/css" rel="stylesheet" media="screen"
        id="main-style" />
    <!-- CORE CSS TEMPLATE - END -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <style>
        .footer-menu.circular {
            display: flex;
            justify-content: center;
            /* Center the ul horizontally */
            align-items: center;
            /* Center the ul vertically */
            height: 100px;
            /* Adjust height as needed */
            background-color: #f8f8f8;
            /* Background color for the footer menu */
        }

        .footer-menu.circular ul {
            display: flex;
            list-style-type: none;
            /* Remove bullet points from list */
            padding: 0;
            margin: 0;
        }

        .footer-menu.circular ul li {
            margin: 0 20px;
            /* Adjust margin between list items as needed */
        }

        .footer-menu.circular ul li a {
            text-decoration: none;
            color: #333;
            /* Text color for the links */
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 14px;
            /* Adjust font size as needed */
        }

        .footer-menu.circular ul li a i {
            font-size: 24px;
            /* Adjust icon size as needed */
            margin-bottom: 5px;
            /* Space between icon and text */
        }
    </style>



</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->


<body class=" menu-full header-image html" data-header="light" data-footer="light" data-header_align="app"
    data-menu_type="left" data-menu="light" data-menu_icons="on" data-footer_type="left" data-site_mode="light"
    data-footer_menu="show" data-footer_menu_style="light">
    <div class="preloader-background">
        <div class="preloader-wrapper">
            <div class="loader">
            </div>
        </div>
    </div>

    <!-- START navigation -->
    <nav class="fix_topscroll logo_on_fixed  topbar navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="/" class=" brand-logo ">Markkost</a>
            <a href="#" data-target=""
                class="waves-effect waves-circle navicon back-button htmlmode show-on-large "><i
                    class="mdi mdi-chevron-left" data-page=""></i></a>

        </div>
    </nav>
    <ul id="slide-nav" class="sidenav sidemenu">
        <li class="user-wrap">
            <div class="user-view row">

                <div class="col s3 imgarea">
                    <a href="#user" class="status available"><img class="circle"
                            src="{{ asset('/') }}mobile/assets/images/menu-user.jpg" alt="menu user"></a>
                </div>
                <div class="col s9 infoarea">
                    <a href="ui-app-profile.html"><span class="name">Emma Bailey</span></a>
                    <a href="ui-app-profile.html"><span class="email">emma.bailey@gmail.com</span></a>
                </div>
            </div>
            <div class="center">
                <a href="ui-app-profile.html" class='waves-light btn'> Profile </a>
            </div>

            <div class="connections">
                <a href='#!' class="count">
                    <div class="no">776</div>
                    <div class="tag">Friends</div>
                </a>
                <a href='#!' class="count">
                    <div class="no">811</div>
                    <div class="tag">Followers</div>
                </a>
                <a href='#!' class="count">
                    <div class="no">619</div>
                    <div class="tag">Following</div>
                </a>
            </div>



        </li>

        <li class="menu-social">
            <ul class="social-wrap social-colored">
                <li class="social">
                    <a class="" href="#!"><i class="mdi mdi-facebook"></i></a><a class=""
                        href="#!"><i class="mdi  mdi-twitter"></i></a><a class="" href="#!"><i
                            class="mdi  mdi-google-plus"></i></a><a class="" href="#!"><i
                            class="mdi  mdi-instagram"></i></a><a class="" href="#!"><i
                            class="mdi  mdi-linkedin"></i></a>
                </li>
            </ul>
        </li>

        <li class="copy-spacer"></li>
        <li class="copy-wrap">
            <div class="copyright">&copy; Copyright @ themepassion</div>

    </ul>
    <!-- END navigation -->

    <div class="menu-close"><i class="mdi mdi-close"></i></div>

    <div class="content-area">

        <div class="pagehead-bg   primary-bg">
        </div>

        <div class="container has-pagehead is-pagetitle">
            <div class="section">
                <h5 class="pagetitle">{{ $datakost->nama_kost }}</h5>
            </div>
        </div>

        <div class="carousel carousel-fullscreen carousel-slider home_carousel carousel-dashboard-home">
            <a class="carousel-item" href="#carousel-slide-0">
                <div class="bg"
                    style="background-image: url('{{ asset('/') }}{{ env('ASSET_UPLOAD') }}gambarkost/{{ $datakost->gambar }}')">
                </div>
                <div class="item-content center-align white-text">
                    <div class="spacer-large"></div>
                </div>
            </a>
            @php
                $href = 1;
                $gambardetail = \App\Models\GambarDetailKost::where('datakost_id', $datakost->id)->get();
            @endphp
            @foreach ($gambardetail as $gmbr)
                <a class="carousel-item" href="#carousel-slide-{{ $href }}!">
                    <div class="bg"
                        style="background-image: url('{{ asset('/') }}{{ env('ASSET_UPLOAD') }}gambar_detail/{{ $gmbr->gambar }}')">
                    </div>
                    <div class="item-content center-align white-text">
                        <div class="spacer-large"></div>
                    </div>
                </a>
                @php $href++; @endphp
            @endforeach
        </div>

        <div class="container">
            <div class="section pb0">
                <div class="spacer"></div>
                <div class="row mb0">
                    <div class="col s12 pad-0">
                        <!--   Icon Section   -->
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="icon-block block-small circle">
                                    <table>
                                        <tbody>
                                            <form id="bookingForm" method="get">
                                                <input type="hidden" name="id_kost" value="{{ $datakost->id }}">
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="text-center">
                                                            <button type="button" id="bookingButton"
                                                                class="btn btn-primary">Booking</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select name="kategori" id="kategori"
                                                            style="text-align: left;">
                                                            <option value="harian">Harian
                                                            </option>
                                                            <option value="mingguan">Mingguan
                                                            </option>
                                                            <option value="bulanan">Bulanan
                                                            </option>
                                                            <option value="tahunan">Tahunan
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </form>
                                            <tr>
                                                <td colspan="2">
                                                    <div id="harga"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <svg style="font-size:25px;color:green;"
                                                        xmlns="http://www.w3.org/2000/svg" width="1em"
                                                        height="1em" viewBox="0 0 36 36">
                                                        <path fill="currentColor"
                                                            d="M18 6.72a5.73 5.73 0 1 0 5.73 5.73A5.73 5.73 0 0 0 18 6.72m0 9.46a3.73 3.73 0 1 1 3.73-3.73A3.73 3.73 0 0 1 18 16.17Z"
                                                            class="clr-i-outline clr-i-outline-path-1" />
                                                        <path fill="currentColor"
                                                            d="M18 2A11.79 11.79 0 0 0 6.22 13.73c0 4.67 2.62 8.58 4.54 11.43l.35.52a100 100 0 0 0 6.14 8l.76.89l.76-.89a100 100 0 0 0 6.14-8l.35-.53c1.91-2.85 4.53-6.75 4.53-11.42A11.79 11.79 0 0 0 18 2m5.59 22l-.36.53c-1.72 2.58-4 5.47-5.23 6.9c-1.18-1.43-3.51-4.32-5.23-6.9l-.35-.53c-1.77-2.64-4.2-6.25-4.2-10.31a9.78 9.78 0 1 1 19.56 0c0 4.1-2.42 7.71-4.19 10.31"
                                                            class="clr-i-outline clr-i-outline-path-2" />
                                                        <path fill="none" d="M0 0h36v36H0z" />
                                                    </svg> {{ $datakost->alamat }} <br>
                                                    <svg style="font-size:20px;color:green;"
                                                        xmlns="http://www.w3.org/2000/svg" width="1em"
                                                        height="1em" viewBox="0 0 36 36">
                                                        <path fill="currentColor"
                                                            d="M27.73 35.44a4.7 4.7 0 0 1-1-.11a33.9 33.9 0 0 1-16.62-8.75a32.7 32.7 0 0 1-9-16.25a4.58 4.58 0 0 1 1.35-4.28l4-3.85A2 2 0 0 1 8 1.66a2 2 0 0 1 1.45.87l5 7.39a1.6 1.6 0 0 1-.11 1.9l-2.51 3A18.9 18.9 0 0 0 16 20.71a19.3 19.3 0 0 0 6.07 4.09l3.11-2.47a1.64 1.64 0 0 1 1.86-.12l7.55 4.88A2 2 0 0 1 35 30.2l-3.9 3.86a4.74 4.74 0 0 1-3.37 1.38M7.84 3.64l-4 3.85a2.54 2.54 0 0 0-.75 2.4a30.7 30.7 0 0 0 8.41 15.26a31.9 31.9 0 0 0 15.64 8.23a2.75 2.75 0 0 0 2.5-.74l3.9-3.86l-7.29-4.71l-3.34 2.66a1 1 0 0 1-.92.17a20.1 20.1 0 0 1-7.36-4.75a19.5 19.5 0 0 1-4.87-7.2A1 1 0 0 1 10 14l2.7-3.23Z"
                                                            class="clr-i-outline clr-i-outline-path-1" />
                                                        <path fill="none" d="M0 0h36v36H0z" />
                                                    </svg> &nbsp;{{ $datakost->no_telp }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><svg style="font-size:20px;color:green;"
                                                        xmlns="http://www.w3.org/2000/svg" width="1em"
                                                        height="1em" viewBox="0 0 36 36">
                                                        <path fill="currentColor"
                                                            d="M33 19a1 1 0 0 1-.71-.29L18 4.41L3.71 18.71A1 1 0 0 1 2.3 17.3l15-15a1 1 0 0 1 1.41 0l15 15A1 1 0 0 1 33 19"
                                                            class="clr-i-solid clr-i-solid-path-1" />
                                                        <path fill="currentColor"
                                                            d="M18 7.79L6 19.83V32a2 2 0 0 0 2 2h7V24h6v10h7a2 2 0 0 0 2-2V19.76Z"
                                                            class="clr-i-solid clr-i-solid-path-2" />
                                                        <path fill="none" d="M0 0h36v36H0z" />
                                                    </svg> &nbsp;{{ $datakost->fasilitas }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><iframe width="100%" height="315"
                                                        src="{{ $datakost->video }}" title="YouTube video player"
                                                        frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                        referrerpolicy="strict-origin-when-cross-origin"
                                                        allowfullscreen></iframe>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mb0">
                    <div class="col s12 pad-0">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <h4>Deskripsi:</h4> <br>{{ $datakost->keterangan }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="map" style="height:300px;"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div><br>


        <footer class="page-footer center social-colored ">
            <div class="container footer-content">
                <div class="row">
                    <div class="">
                        <h5 class="logo">Mark Kost</h5>
                    </div>
                    <div class="link-wrap">

                        <ul class="link-ul">
                            <li><a class="" href="#!"><i class="mdi mdi-phone"></i> +62 812-4460-3518</a>
                            </li>
                            <li><a class="" href="#!"><i class="mdi mdi-email"></i> cs@markkost.my.id</a>
                            </li>
                            <li><a class="" href="#!"><i class="mdi mdi-map-marker"></i> Unidayan</a></li>
                        </ul>
                        <ul class="social-wrap">
                            <li class="social">
                                <a class="" href="#!"><i class="mdi mdi-facebook"></i></a>
                                <a class="" href="#!"><i class="mdi mdi-twitter"></i></a>
                                <a class="" href="#!"><i class="mdi mdi-dribbble"></i></a>
                                <a class="" href="#!"><i class="mdi mdi-google-plus"></i></a>
                                <a class="" href="#!"><i class="mdi mdi-linkedin"></i></a>

                            </li>
                        </ul>
                    </div>
                </div>


            </div>


            <div class="footer-copyright">
                <div class="container">
                    &copy; Copyright <a class="" href="#">Najwa</a>. All rights
                    reserved.
                </div>
            </div>
        </footer>


    </div><!--.content-area-->

    <div class="footer-menu circular">
        <div class="text-center">
            @include('mobile.template.sidebar')
        </div>

    </div>

    <script src="{{ asset('/') }}mobile/assets/js/pwa.js"></script>

    <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

    <!-- CORE JS FRAMEWORK - START -->
    <script src="{{ asset('/') }}mobile/modules/jquery/jquery-2.2.4.min.js"></script>
    <script src="{{ asset('/') }}mobile/modules/materialize/materialize.js"></script>
    <script src="{{ asset('/') }}mobile/modules/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('/') }}mobile/assets/js/variables.js"></script>
    <!-- CORE JS FRAMEWORK - END -->


    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
    <script src="{{ asset('/') }}mobile/modules/fancybox/jquery.fancybox.min.js"></script>
    <script src="{{ asset('/') }}mobile/assets/js/common.js"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


    <!-- CORE TEMPLATE JS - START -->
    <script src="{{ asset('/') }}mobile/modules/app/init.js"></script>
    <script src="{{ asset('/') }}mobile/modules/app/settings.js"></script>

    <script src="{{ asset('/') }}mobile/modules/app/scripts.js"></script>

    <!-- END CORE TEMPLATE JS - END -->


    <script src="{{ asset('/') }}mobile/assets/js/preloader.js"></script>

    <script>
        $(document).ready(function() {
            const map = L.map('map').setView([{{ $datakost->maps }}], 13);


            const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://markkost.my.id">Mark Kost</a>'
            }).addTo(map);

            const popup = L.popup()
                .setLatLng([{{ $datakost->maps }}])
                .setContent('{{ $datakost->nama_kost }}')
                .openOn(map);


        });
    </script>

    <script>
        $(document).ready(function() {
            let harga_harian = `{{ $datakost->harga_harian }}`;
            let harga_mingguan = `{{ $datakost->harga_mingguan }}`;
            let harga_bulanan = `{{ $datakost->harga_bulanan }}`;
            let harga_tahunan = `{{ $datakost->harga_tahunan }}`;

            $("#harga").html(`
                        <div style="display: flex; justify-content: center;">
                            <div class="btn btn-info"
                                style="background-color:rgb(98, 200, 255); font-size:15px;">
                                Rp. ${harga_harian} / hari
                            </div>
                        </div>
                    `);

            $("#kategori").change(function(e) {
                e.preventDefault();
                let kategori = $("#kategori").val();

                if (kategori == "harian") {
                    $("#harga").html(`
                        <div style="display: flex; justify-content: center;">
                            <div class="btn btn-info"
                                style="background-color:rgb(98, 200, 255); font-size:15px;">
                                Rp. ${harga_harian} / harian
                            </div>
                        </div>
                    `);
                } else if (kategori == "mingguan") {
                    $("#harga").html(`
                        <div style="display: flex; justify-content: center;">
                            <div class="btn btn-info"
                                style="background-color:rgb(98, 200, 255); font-size:15px;">
                                Rp. ${harga_mingguan} / minggu
                            </div>
                        </div>
                    `);
                } else if (kategori == "bulanan") {
                    $("#harga").html(`
                        <div style="display: flex; justify-content: center;">
                            <div class="btn btn-info"
                                style="background-color:rgb(98, 200, 255); font-size:15px;">
                                Rp. ${harga_bulanan} / bulan
                            </div>
                        </div>
                    `);
                } else {
                    $("#harga").html(`
                        <div style="display: flex; justify-content: center;">
                            <div class="btn btn-info"
                                style="background-color:rgb(98, 200, 255); font-size:15px;">
                                Rp. ${harga_tahunan} / tahun
                            </div>
                        </div>
                    `);
                }

            });


            $('#bookingButton').click(function() {
                // Ambil nilai id_kost
                var id = $('input[name="id_kost"]').val();

                // Ambil harga berdasarkan kategori yang dipilih
                var harga = $('#kategori').val();

                // Redirect ke URL yang sesuai
                window.location.href = `/mobile/booking/${id}/${harga}`;
            });
        });
    </script>
</body>

</html>
