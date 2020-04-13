<?php

namespace App\Http\Controllers;

use App\Client;
use Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){

        $clients = Client::all();
        return view('cart')->with('clients', $clients);
    }

    public function add_to_cart(){
        //dd(request()->all());
        

        $pdt = Product::find(request()->pdt_id);

        $cartItem = Cart::instance()->add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => request()->qty,
            'price' => $pdt->price,
            'weight' => 0 
        ]);
        
        Cart::associate($cartItem->rowId, 'App\Product');

        return redirect(route('cart'));
    }
    public function cart_delete($rowId){
        
        Cart::remove($rowId);

        return redirect()->back();
    }
    public function incr($rowId, $qty){
        
        Cart::update($rowId, $qty + 1);

        return redirect()->back();

    }

    public function decr($rowId, $qty){
        
        Cart::update($rowId, $qty - 1);

        return redirect()->back();

    }
    public function save(Request $request){


        $identifier = rand().time();
        $invoice = $request->invoice;
        Cart::instance($invoice)->store($identifier, $request->client,
        $request->invoice, $request->pro_forma);

        return redirect()->back();
    }
    public function destroy(){
        
        Cart::destroy();
        
        return redirect()->back();
    }
}
