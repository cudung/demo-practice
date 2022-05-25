<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <script src="{{asset('public/js/app.js')}}"></script>
</head>
<body>
    <div class="container col-md-4">
        <form action="/api/login" method="POST">
            <h1>Đăng nhập</h1>
            <div class="row">
                <span>Email</span>
                <input type="text" name="email" placeholder="Email">
            </div>
            <div class="row">
                <span>Password</span>
                <input type="text" name="password" placeholder="Password">
            </div>
        </form>
    </div>
</body>
</html>