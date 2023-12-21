@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit_profile.css') }}">
@endsection

@section('header')
    @include('header_menu')
@endsection

@section('content') 
    <div class="register-profile__content">
            <div class="register-profile__group-title">
                <h1>プロフィール設定</h1>
            </div>
            <form class="form" action="" method="post">
                <!-- csrf -->
                <div class="register__profile">
                    <img class="profile__img" id="img" accept="image/*" src="https://tool-engineer.work/wp-content/uploads/2022/06/default.png">
                    <input class="profile__upload-btn" type="file" name="logo" id="form" accept=".jpg, .jpeg, .png, .gif">
                </div>    
                <div class="register__form-content">
                    <div class="form__input">
                        <p class="form__ttl">ユーザー名</p>
                        <div class="form__name">
                            <input type="text" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="form__error">
                            <!-- errors->first('email') -->
                        </div>
                    </div>
                    <div class="form__input">
                        <p class="form__ttl">郵便番号</p>
                        <div class="form__postcode">
                            <input type="text" name="postcode" value="{{ old('postcode') }}" />
                        </div>
                        <div class="form__error">
                            <!-- errors->first('email') -->
                        </div>
                    </div>
                    <div class="form__input">
                        <div class="form__address">
                            <p class="form__ttl">住所</p>
                            <input type="text" name="address" value="{{ old('address') }}"/>
                        </div>
                        <div class="form__error">
                            <!-- error message -->
                        </div>
                    </div>
                    <div class="form__input">
                        <div class="form__building">
                            <p class="form__ttl">建物名</p>
                            <input type="text" name="building" />
                        </div>
                        <div class="form__error">
                            <!-- error message -->
                        </div>
                    </div>
                    <div class="form__button">
                        <button class="form__button-register" type="submit">更新する</button>
                    </div>
                </div>
            </form>
        </div>

    <script>
        ('#form').on('change', function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#img").attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
@endsection