<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品一覧</title>
</head>
<body>
    <h1>商品一覧ページ</h1>

    <p>{{ Auth::user()->name }} さん、ようこそ！</p>

    <p>ここに商品一覧を表示します。</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">ログアウト</button>
    </form>
</body>
</html>