<form class="search" action="" method="post">
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
        <button class="header-nav__btn">出品</button>
    </ul>
    @else
    <ul class="header-nav__list">
        <li class="header-nav__item"><a class="nav__item" href ="/login">ログイン</a></li>
        <li class="header-nav__item"><a class="nav__item" href="/register">会員登録</a></li>
        <button class="header-nav__btn">出品</button>
    </ul>
    @endif
</nav>