<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WELCOME</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('style\style.css') }}?v=1.1.1">
</head>
<body>

    <div class="home_header">
        <p class="title">Username: {{$userData['username']}} <br> @if(intval(($userData['expired']-time())/86400) < 1) Expired Today @else Validity:  {{intval(($userData['expired']-time())/86400)}} days @endif</p>
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

        {{-- <div style="background: white; border:1px solid #dddd;" class="card_row p-2 mb-3">
            
        </div> --}}

        <div style="background: white; border:1px solid #dddd;" class="card_row">

            <div class="row p-3">
                @if (($userData['live_tv'] == "all") || ($userData['live_tv'] == "movie"))
                    <div class="col-6">
                        <a href="{{route("users_home_web")}}" class="btn @if(Route::is("users_home_web")) btn-success @else btn-secondary  @endif" style="width:100%; text-align: center; text-transform:uppercase;">MOVIE series</a>
                    </div>
                @endif
               
                @if (($userData['live_tv'] == "all") || ($userData['live_tv'] == "live"))
                    <div class="col-6">
                        <a href="{{route("users_livetv_web")}}" class="btn @if(Route::is("users_livetv_web")) btn-success @else btn-secondary  @endif" style="width:100%; text-align: center; text-transform:uppercase;">LIVE TV</a>
                    </div>
                @endif
            </div>

            <div class="row">
                <input type="text" class="col-12" placeholder="Search" id="search_products">
            </div>
            <div id="all_products_wrapper" class="row">
                @foreach ($products as $item)
                    @php
                        if(Route::is("users_home_web")){
                            $links = $item['links'];
                        }else{
                            // if($item['expired1'] > time()){
                                $links = $item['links1'];
                            // }else if($item['expired2'] > time()){
                            //     $links = $item['links2'];
                            // }else if($item['expired3'] > time()){
                            //     $links = $item['links3'];
                            // }else if($item['expired4'] > time()){
                            //     $links = $item['links4'];
                            // }else{
                            //     $links = "Sorry all links is expired";
                            // }
                        }
                    @endphp
                    <a href="{{ $links }}" class="col-4 mt-3">
                        <img class="images" src="{{ asset('images/products/'.$item['pic']) }}" alt="">
                        <h2 class="title">{{ $item['name'] }}</h2>
                    </a>
                @endforeach
            </div>
        </div>

    </div>

    
    <input type="hidden" id="where" value="{{$where}}" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
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
