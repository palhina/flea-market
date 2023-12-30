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
            @else
            <ul class="header-nav__list">
                <li class="header-nav__item"><a class="nav__item" href ="/login">ログイン</a></li>
                <li class="header-nav__item"><a class="nav__item" href="/register">会員登録</a></li>
                <li class="header-nav__item"><a class="nav__item-sell" href="/sell">出品</a></li>
            </ul>
            @endif
        </nav>
    </div>      
</div>
