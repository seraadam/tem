<!DOCTYPE html>
<html lang="en" dir="rtl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />

        <title>Tamaiuz | @yield('title')</title>
        @include('includes.css')
    </head>

    <body class="nav-md">
        @include('includes.nav')

        <div class="container-fluid text-right">
            <br>
            @yield('content')
        </div>
        @include('includes.js')
        @include('includes.footer')
    </body>
</html>
