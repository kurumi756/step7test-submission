<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品詳細</title>
    <style>
        body {
            font-family: "Hiragino Kaku Gothic ProN", sans-serif;
            background-color: #f5f5f5;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            padding: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        img {
            display: block;
            margin: 0 auto 20px;
            width: 250px;
            border-radius: 5px;
        }

        p {
            font-size: 16px;
            margin: 10px 0;
        }

        .back-btn {
            display: block;
            text-align: center;
            margin-top: 30px;
            padding: 10px;
            background-color: #f39c12;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>商品詳細</h1>

        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像">
        @else
            <p style="text-align:center;">（画像なし）</p>
        @endif

        <p><strong>商品名：</strong> {{ $product->name }}</p>
        <p><strong>価格：</strong> {{ $product->price }}円</p>
        <p><strong>在庫数：</strong> {{ $product->stock }}</p>
        <p><strong>メーカー名：</strong> {{ $product->company->company_name }}</p>

        <a href="/products" class="back-btn">← 一覧に戻る</a>
        <a href="/products/{{ $product->id }}/edit" class="back-btn" style="background-color:#0099cc; color:white;">
✏️ 編集する
</a>
    </div>
</body>
</html>

