<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品一覧</title>
    <style>
        body {
            font-family: "Hiragino Kaku Gothic ProN", sans-serif;
            background-color: #f5f5f5;
            padding: 40px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f39c12;
            color: white;
        }

        img {
            width: 80px;
            height: auto;
            border-radius: 4px;
        }

        .add-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            text-align: center;
            padding: 10px;
            background-color: #0099cc;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <h1>商品一覧</h1>
    <div style="text-align:center; margin-bottom:20px;">
    <form action="/products/search" method="GET" style="display:inline-block;">
        <input type="text" name="keyword" value="{{ $keyword ?? '' }}" placeholder="商品名で検索" style="padding:5px; width:200px;">

        <select name="company_id" style="padding:5px;">
            <option value="">メーカー選択</option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}" {{ (isset($selectedCompany) && $selectedCompany == $company->id) ? 'selected' : '' }}>
                    {{ $company->company_name }}
                </option>
            @endforeach
        </select>

        <button type="submit" style="padding:5px 10px; background-color:#0099cc; color:white; border:none; border-radius:4px; cursor:pointer;">
            検索
        </button>
    </form>
</div>

    @if (session('success'))
        <p style="text-align:center; color:green;">{{ session('success') }}</p>
    @endif

    <a href="/products/create" class="add-btn">＋ 新規登録</a>

    <table>
        <tr>
            <th>商品画像</th>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>メーカー名</th>
            <th>削除</th>

        </tr>
        @foreach ($products as $product)
            <tr>
                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像">
                    @else
                        （なし）
                    @endif
                </td>
                <td>
                    <a href="/products/{{ $product->id }}">
                      {{ $product->name }}
                    </a>
                </td>
                <td>{{ $product->price }}円</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->company->company_name }}</td>

                <td>
                    <form action="/products/{{ $product->id }}/delete" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                        @csrf
                      <button type="submit" style="background-color:#e74c3c; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">
                         削除
                       </button>
                 </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>