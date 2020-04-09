<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        
        $products = $product->sortable()->paginate(20);
        return view('admin.products.index')->with('products',$products);
        //return view('admin.products.index')->with('products',Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'image' => 'image',
            'price' => 'required',
            'description' => 'required'
        ]);

        $image = $request->image;

        $image_new_name = time().$image->getClientOriginalName();

        $image->move('uploads/products', $image_new_name);

        $product = Product::create([
            'name' => $request -> name,
            'image' => '/uploads/products/'.$image_new_name,
            'price' => $request -> price,
            'description' => $request -> description,
            'count' => $request -> count,
            'production_date' => $request -> production_date,
            'expiration_date' => $request -> expiration_date
        ]);

        return redirect()->route('products');
    }

    /**
     * Display search results
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchResult = (new Search())
            ->registerModel(Product::class, 'name')
            ->perform($request->input('query'));

        return view('admin.product.search', compact('searhcResults'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if($request->hasFile('featured'))
        {
            $image = $request->image;

            $image_new_name = $time() . $image->getClientOriginalName();

            $image->move('uploads/products', $image_new_name);

            $products->image = $image_new_name;
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->count = $request->count;
        $product->production_date = $request->production_date;
        $product->expiration_date = $request->expiration_date;

        $product->save();

        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->back();
    }
}
