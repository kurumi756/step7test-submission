<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品編集</title>
    <style>
        body {
            font-family: "Hiragino Kaku Gothic ProN", sans-serif;
            background-color: #f5f5f5;
            padding: 40px;
        }
        .container {
            width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        h1 { text-align: center; }
        label { display: block; margin-top: 15px; }
        input, select {
            width: 100%; padding: 8px; margin-top: 5px;
            border: 1px solid #ccc; border-radius: 4px;
        }
        button {
            margin-top: 20px; width: 100%; padding: 10px;
            background-color: #f39c12; border: none; color: #fff;
            font-weight: bold; border-radius: 4px; cursor: pointer;
        }
        button:hover { opacity: 0.9; }
        .back-btn {
            display: block; text-align: center; margin-top: 15px;
            text-decoration: none; color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>商品編集画面</h1>

        <form method="POST" action="/products/{{ $product->id }}/update" enctype="multipart/form-data">
            @csrf

            <label>商品名</label>
            <input type="text" name="name" value="{{ $product->name }}" required>

            <label>価格</label>
            <input type="number" name="price" value="{{ $product->price }}" required>

            <label>在庫数</label>
            <input type="number" name="stock" value="{{ $product->stock }}" required>

            <label>メーカー名</label>
            <select name="company_id" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ $product->company_id == $company->id ? 'selected' : '' }}>
                        {{ $company->company_name }}
                    </option>
                @endforeach
            </select>

            <label>商品画像</label>
            @if($product->image)
                <p>現在の画像：</p>
                <img src="{{ asset('storage/' . $product->image) }}" width="100"><br>
            @endif
            <input type="file" name="image">

            <button type="submit">更新</button>
        </form>

        <a href="/products/{{ $product->id }}" class="back-btn">← 戻る</a>
    </div>
</body>
</html>