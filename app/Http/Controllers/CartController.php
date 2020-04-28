<?php

namespace App\Http\Controllers;

use DB;
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
        $cart = Cart::instance($invoice)->content();
        $created_at = date('Y-m-d H:i:s');
        Cart::instance($invoice)->store($identifier, $request->client,
        $request->invoice, $request->pro_forma, $created_at);

        return redirect()->back();
    }
    public function destroy(){
        
        Cart::destroy();
        
        return redirect()->back();
    }

    public function show_invoices(){
        
        $invoices = DB::select('select * from shoppingcart');

        return view('invoices')->with('invoices', $invoices);

    }

    public function invoice_edit($invoice){
        
        $invoice_edit = DB::table('shoppingcart')
                        ->where('invoice', $invoice)
                        ->first();

        $client = Client::find($invoice_edit->client);
        $cart = Cart::instance($invoice)->content();

        return view('invoice_edit')->with('invoice_edit', $invoice_edit)
                                    ->with('client', $client)
                                    ->with('cart', $cart);
    }
}
