<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="{{ config('app.name', 'Laravel') }}" />
        <meta name="author" content="{{ config('app.name', 'Laravel') }}" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/x-icon" href="{{asset('landing/assets/favicon.ico')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('landing/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        <!-- Background Video-->
        <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="https://startbootstrap.github.io/startbootstrap-coming-soon/assets/mp4/bg.mp4" type="video/mp4" /></video>
        <!-- Masthead-->
        <div class="masthead">
            <div class="masthead-content text-white">
                <div class="container-fluid px-4 px-lg-0">
                    <h1 class="fst-italic lh-1 mb-4">Admin Dashboard Shamo <br>E-Commerce</h1>
                    <p class="mb-5">
                        Ini adalah halaman khusus Admin Shamo untuk mengatur Produk dan Transaksi.
                        Tidak ada menu atau fitur untuk Customer.
                    </p>
                </div>
            </div>
        </div>
        <!-- Social Icons-->
        <!-- For more icon options, visit https://fontawesome.com/icons?d=gallery&p=2&s=brands-->
        <div class="social-icons">
            <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
                @if (Route::has('login'))
                    @auth
                    <a class="btn btn-dark m-3" href="{{route('admin.dashboard')}}"><i class="fa-solid fa-house"></i></a>
                    <a class="btn btn-dark m-3" href="{{route('admin.product.index')}}"><i class="fa-solid fa-boxes-stacked"></i></a>
                    <a class="btn btn-dark m-3" href="{{route('admin.transaction.index')}}"><i class="fa-solid fa-cart-shopping"></i></a>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit"  class="btn btn-dark m-3"><i class="fa-solid fa-right-to-bracket fa-bounce"></i></button>
                    </form>
                    @else
                    <a class="btn btn-dark m-3" href="{{route('login')}}"><i class="fa-solid fa-right-to-bracket fa-bounce"></i></a>
                    <a class="btn btn-dark m-3" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark m-3" href="#!"><i class="fab fa-instagram"></i></a>
                    @endauth
                @endif
                
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('landing/js/scripts.js') }}"></script>
    </body>
</html>
