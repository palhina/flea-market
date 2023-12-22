<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coachtech-market</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header-ttl">
            <img class="header-ttl-logo" src="/images/icon/logo_img.svg">
            <a href="/" class="header-ttl-link">
                <img class="header-ttl-img" src="/images/icon/coachtech_img.png" alt="coachtech">
            </a>
        </div>
        @yield('header')
    </header>

    <main class="main">
        @yield('content')
    </main>

</body>
</html>    
