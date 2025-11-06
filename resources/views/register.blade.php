<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー新規登録画面</title>
    <style>
        body {
            font-family: "Hiragino Kaku Gothic ProN", sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            padding: 40px 50px;
            width: 350px;
            text-align: center;
        }

        h1 {
            font-size: 20px;
            margin-bottom: 30px;
            color: #333;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
        }

        .btn {
            width: 48%;
            padding: 8px 0;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-back {
            background-color: #0099cc; /* 青 */
        }

        .btn-register {
            background-color: #f39c12; /* オレンジ */
        }

        .btn:hover {
            opacity: 0.9;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>ユーザー新規登録画面</h1>

        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
    @csrf
    <label>名前</label>
    <input type="text" name="name" required>

    <label>アドレス</label>
    <input type="email" name="email" required>

    <label>パスワード</label>
    <input type="password" name="password" required>

    <label>パスワード（確認）</label>
    <input type="password" name="password_confirmation" required>

    <div class="btn-container">
        <button type="button" class="btn btn-back" onclick="location.href='/login'">戻る</button>
        <button type="submit" class="btn btn-register">登録</button>
    </div>
</form>
    </div>
</body>
</html>