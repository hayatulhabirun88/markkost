<!DOCTYPE html>
<html lang="en" class=" ">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registrasi | Mark Kost</title>
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
                <h5 class="pagetitle">REGISTRASI </h5>
            </div>
        </div>
        <div class="container over">
            <div class="section">
                <div class="row ">
                    <div class="col s12 pad-0">
                        <h5 class="bot-20 sec-tit  ">Registrasi</h5>
                        <form action="{{ route('mobile.registrasi.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card gray darken-1">
                                <div class="card-content">

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" placeholder="Masukan Email"
                                            class="form-control" value="{{ old('email') }}">
                                        @error('email')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" placeholder="Masukan password"
                                            class="form-control">
                                        @error('password')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" name="nama" placeholder="Masukan Nama"
                                            class="form-control" id="nama" value="{{ old('nama') }}">
                                        @error('nama')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_tlp" class="form-label">No Telp
                                            Tujuan</label>
                                        <input type="text" name="no_tlp" placeholder="Masukan Nomor Telepon"
                                            class="form-control" id="no_tlp" value="{{ old('no_tlp') }}">
                                        @error('no_tlp')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="dok_ktp" class="form-label">Dokumen KTP</label><br>
                                        <input type="file" name="dok_ktp" class="form-control" id="dok_ktp"
                                            value="{{ old('dok_ktp') }}">
                                        @error('dok_ktp')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="level" class="form-label">Masuk Sebagai</label>
                                        <select class="form-control" name="level" id="level">
                                            <option value="">--Pilih--</option>
                                            <option value="pemilik_kost"
                                                {{ old('level') == 'pemilik_kost' ? 'selected' : '' }}>Pemilik Kost
                                            </option>
                                            <option value="penyewa" {{ old('level') == 'penyewa' ? 'selected' : '' }}>
                                                Penyewa</option>
                                        </select>
                                        @error('level')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="card-action">
                                    <input type="submit" value="Registrasi" class="btn btn-primary">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

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




        <div class="backtotop">
            <a class="btn-floating btn primary-bg">
                <i class="mdi mdi-chevron-up"></i>
            </a>
        </div>



    </div>

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

</body>

</html>
