<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザーログイン画面</title>
    <style>
        body {
            font-family: "Hiragino Kaku Gothic ProN", sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
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

        .btn-login {
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
    <div class="login-container">
        <h1>ユーザーログイン画面</h1>

        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label>パスワード</label>
            <input type="password" name="password" required>

            <label>アドレス</label>
            <input type="email" name="email" required>


            <div class="btn-container">
                <button type="button" class="btn btn-register" onclick="location.href='/register'">新規登録</button>
                <button type="submit" class="btn btn-login">ログイン</button>
            </div>
        </form>
    </div>
</body>
</html>