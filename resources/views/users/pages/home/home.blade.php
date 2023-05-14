<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" integrity="sha512-NZ19NrT58XPK5sXqXnnvtf9T5kLXSzGQlVZL9taZWeTBtXoN3xIfTdxbkQh6QSoJfJgpojRqMfhyqBAAEeiXcA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('style\style.css') }}">
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('users_users_logout_api') }}" class="btn btn-danger">Logout</a>

                <div class="content_wrapper18">
                    <div>
                        <input id="checkbox" type="checkbox" class="checkbox" @if(session() -> has('content18')) checked @endif>
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
            <div class="card-body">
                <div class="row">
                    @foreach ($products as $item)
                        <div class="col-4 mt-3">
                            <img class="images" src="{{ asset('images/products/'.$item['pic']) }}" alt="">
                            <h2 class="title">{{ $item['name'] }}</h2>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div id="countdown">
            <div id='tiles'>
                <span>00</span>
                <span>00</span>
                <span>00</span>
                <span>00</span>
            </div>
            <div class="labels">
                <li>Days</li>
                <li>Hours</li>
                <li>Mins</li>
                <li>Secs</li>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const urls = {
            'content18' : '{{ route('users_home_content18_api') }}',
            'expired_time' : '{{ route('users_home_getexpired_time_api') }}'
        }
    </script>
    <script src="{{ asset('script\users\home.js') }}"></script>
</body>
</html>
