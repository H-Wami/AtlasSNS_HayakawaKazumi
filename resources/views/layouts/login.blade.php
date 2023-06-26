<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title>AtlasSNS</title>
    <!-- Bootstrap入れる -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>

<body>
    <header>
        <div id="head">
            <!-- Atlasリンク -->
            <h1 class="head_title"><a href="/top"><img src="images/atlas.png"></a></h1>
            <div id="headContainer">
                <div id="headContent">
                    <!-- ログインユーザー名 -->
                    <p class="login_user">{{ Auth::user()->username }} さん</p>
                    <!-- アコーディオンメニュー ボタン -->
                    <button type="button" class="accordion_btn">
                        <span class="line"></span>
                    </button>
                    <!-- アコーディオンメニューの中身 -->
                    <div class="accordion_content">
                        <ul class="accordion_items">
                            <li class="accordion_text"><a href="/top">HOME</a></li>
                            <li class="accordion_text"><a href="/profile">プロフィール編集</a></li>
                            <li class="accordion_text"><a href="/logout">ログアウト</a></li>
                        </ul>
                    </div>
                    <!-- アイコン画像仮置き -->
                    <div class="head_user_icon">
                        <img src="images/icon1.png" alt="ヘッダーアイコン">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <!-- サイドバー -->
        <div id="sideBar">
            <div class="confirm">
                <!-- ログインユーザー名・フォロー数 -->
                <p>{{ Auth::user()->username }}さんの</p>
                <div class="side_text">
                    <p>フォロー数</p>
                    <p>{{ Auth::user()->follows()->get()->count() }}名 </p>
                </div>
                <!-- フォローリストボタン -->
                <div class="side_btn">
                    <button type="button" class="btn btn-primary btn-sm"><a href="/follow-list" class="btn-text">フォローリスト</a></button>
                </div>
                <!-- フォロワー数 -->
                <div class="side_text">
                    <p>フォロワー数</p>
                    <p>{{ Auth::user()->followers()->get()->count() }}名</p>
                </div>
                <!-- フォロワーリストボタン -->
                <div class="side_btn">
                    <button type="button" class="btn btn-primary btn-sm"><a href="/follower-list" class="btn-text">フォロワーリスト</a></button>
                </div>
            </div>
            <!-- ユーザー検索ボタン -->
            <div class="side_search_btn">
                <button type="button" class="btn btn-primary"><a href="/search" class="btn-text">ユーザー検索</a></button>
            </div>
            <footer>
            </footer>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="./js/script.js"></script>
</body>

</html>
