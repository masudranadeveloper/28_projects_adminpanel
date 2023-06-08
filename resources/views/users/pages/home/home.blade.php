<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" integrity="sha512-NZ19NrT58XPK5sXqXnnvtf9T5kLXSzGQlVZL9taZWeTBtXoN3xIfTdxbkQh6QSoJfJgpojRqMfhyqBAAEeiXcA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('style\style.css') }}">
</head>
<body>

    <div class="home_header">
        <p class="title">Validity <br> {{ intval(($userData['expired']-time())/86400) }} days</p>
        {{-- <img style="height:5rem; width:5rem" src="{{ asset('.\images\icons\logo.webp') }}" alt=""> --}}
        <div class="content_wrapper18">
            <div>
                <input id="checkbox" type="checkbox" class="checkbox" @if(session() -> has('content18')) value="on" checked @else value="no" @endif>
                <label for="checkbox" class="switch">
                  <span class="switch__circle">
                    <span class="switch__circle-inner"></span>
                  </span>
                  <span class="switch__left">Off</span>
                  <span class="switch__right">On</span>
                </label>
            </div>
        </div>
    </div>

    <div class="container">

          <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($slider as $item)
                    <a href="{{ $item['links'] }}" class="swiper-slide">
                        <img style="height:30vh" src="{{ asset('images/slider/'.$item['img']) }}" alt="">
                    </a>
                @endforeach
            </div>
        </div>

        <div style="background: white; border:1px solid #dddd;" class="card_row">
            <div class="row">
                <input type="text" class="col-12" placeholder="Search your products" id="search_products">
            </div>
            <div id="all_products_wrapper" class="row">
                @foreach ($products as $item)
                    <a href="{{ $item['links'] }}" class="col-4 mt-3">
                        <img class="images" src="{{ asset('images/products/'.$item['pic']) }}" alt="">
                        <h2 class="title">{{ $item['name'] }}</h2>
                    </a>
                @endforeach
            </div>
        </div>

    </div>

    {{-- <div class="container">
        <p>{{ $_SERVER['HTTP_USER_AGENT'] }}</p>
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const urls = {
            'content18' : '{{ route('users_home_content18_api') }}',
            'expired_time' : '{{ route('users_home_getexpired_time_api') }}',
            'search' : '{{ route('users_home_search_api') }}',
            'url' : '{{ url("/") }}',
        }
    </script>
    <script src="{{ asset('script\users\home.js') }}"></script>
</body>
</html>
