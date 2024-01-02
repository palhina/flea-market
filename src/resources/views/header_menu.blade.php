<div class="hamburger-menu">
    <input type="checkbox" id="menu-btn-check">
    <label for="menu-btn-check" class="menu-btn"><span></span></label>
    <div class="menu-content">
        <form class="search" action="/search" method="post">
            @csrf
            <div class="search-form">
                <div class="search-form__keyword">
                    <input class="search__key" type="text" name="keyword" placeholder="なにをお探しですか？" >
                </div>
                <div class="search__btn-wrapper">
                    <button class="search__btn" type="submit">検索</button>
                </div>
            </div>
        </form>
        <nav class="header-nav">
            @if (Auth::check())
            <ul class="header-nav__list">
                <li class="header-nav__item"><a class="nav__item" href="/logout">ログアウト</a></li>
                <li class="header-nav__item"><a class="nav__item" href="/mypage">マイページ</a></li>
                <li class="header-nav__item"><a class="nav__item-sell" href="/sell">出品</a></li>
            </ul>
            @elseif(Auth::guard('admins')->check())
            <ul class="header-nav__list">
                <li class="header-nav__item">
                    <form class="form" action="/logout/admin" method="post">
                    @csrf
                        <button class="header-nav__button">ログアウト</button>
                    </form>
                    </li>
                <li class="header-nav__item"><a class="nav__item" href="/menu/admin">管理者メニュー</a></li>
            </ul>
            @elseif(Auth::guard('managers')->check())
            <ul class="header-nav__list">
                <li class="header-nav__item">
                    <form class="form" action="/logout/manager" method="post">
                    @csrf
                        <button class="header-nav__button">ログアウト</button>
                    </form>
                </li>
                <li class="header-nav__item"><a class="nav__item" href="/menu/manager">店舗代表者メニュー</a></li>
            </ul>
            @else
            <ul class="header-nav__list">
                <li class="header-nav__item"><a class="nav__item" href ="/login">ログイン</a></li>
                <li class="header-nav__item"><a class="nav__item" href="/register">会員登録</a></li>
                <li class="header-nav__item"><a class="nav__item-sell" href="/sell">出品</a></li>
                <li class="header-nav__item"><a class="nav__item" href="/login/admin">管理者</a></li>
                <li class="header-nav__item"><a class="nav__item" href="/login/manager">店舗代表者</a></li>
            </ul>
            @endif
        </nav>
    </div>      
</div>
