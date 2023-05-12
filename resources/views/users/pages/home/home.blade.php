<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" integrity="sha512-NZ19NrT58XPK5sXqXnnvtf9T5kLXSzGQlVZL9taZWeTBtXoN3xIfTdxbkQh6QSoJfJgpojRqMfhyqBAAEeiXcA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('users_users_logout_api') }}" class="btn btn-danger">Logout</a>
            </div>
            <div class="card-body">
                <p class="card-text">FLOW BOTTOM LINKS</p>
                <a href="{{  $data['links'] }}" class="btn btn-primary">GO LIVE</a>
            </div>
        </div>
    </div>

</body>
</html>
