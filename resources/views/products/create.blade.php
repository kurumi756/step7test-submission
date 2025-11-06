<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品登録画面</title>
    <style>
        body { background-color: #f9f9f9; font-family: sans-serif; }
        .container { width: 400px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
        h1 { text-align: center; margin-bottom: 20px; }
        label { display: block; margin-top: 15px; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; border-radius: 4px; border: 1px solid #ccc; }
        button { margin-top: 20px; width: 100%; padding: 10px; background-color: #ff9800; border: none; color: white; font-weight: bold; border-radius: 4px; cursor: pointer; }
        button:hover { opacity: 0.9; }
    </style>
</head>
<body>
    <div class="container">
        <h1>商品登録画面</h1>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/products" enctype="multipart/form-data">
            @csrf
            <label>商品画像</label>
            <input type="file" name="image">

            <label>商品名</label>
            <input type="text" name="name" required>

            <label>価格</label>
            <input type="number" name="price" required>

            <label>在庫数</label>
            <input type="number" name="stock" required>

            <label>メーカー名</label>
            <select name="company_id" required>
                <option value="">選択してください</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>

            <button type="submit">登録</button>
        </form>
    </div>
</body>
</html>