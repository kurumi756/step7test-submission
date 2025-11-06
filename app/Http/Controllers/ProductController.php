<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('company')->get();
        $companies = \App\Models\Company::all();
        return view('products.index', compact('products', 'companies'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('products.create', compact('companies'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|integer|min:0',
        'stock' => 'required|integer|min:0',
        'company_id' => 'required|exists:companies,id',
        'image' => 'nullable|image|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    }

    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
        'company_id' => $request->company_id,
        'image' => $imagePath,
    ]);

    return redirect('/products')->with('success', '商品を登録しました！');
     }  


public function show($id)
    {
    $product = Product::with('company')->findOrFail($id);
    return view('products.show', compact('product'));
     } 

public function edit($id)
    {
    $product = Product::findOrFail($id);
    $companies = \App\Models\Company::all();
    return view('products.edit', compact('product', 'companies'));
    }

public function update(Request $request, $id)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|integer|min:0',
        'stock' => 'required|integer|min:0',
        'company_id' => 'required|exists:companies,id',
        'image' => 'nullable|image|max:2048',
    ]);

    $product = Product::findOrFail($id);

    $imagePath = $product->image;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    }

    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
        'company_id' => $request->company_id,
        'image' => $imagePath,
    ]);

    return redirect('/products/' . $id)->with('success', '商品情報を更新しました！');
     }


public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect('/products')->with('success', '商品を削除しました！');
}

public function search(Request $request)
{
    $query = Product::with('company');

    if ($request->filled('keyword')) {
        $query->where('name', 'like', '%' . $request->keyword . '%');
    }

    if ($request->filled('company_id')) {
        $query->where('company_id', $request->company_id);
    }

    $products = $query->get();
    $companies = \App\Models\Company::all();

    return view('products.index', compact('products', 'companies'))
        ->with('keyword', $request->keyword)
        ->with('selectedCompany', $request->company_id);
}

}
