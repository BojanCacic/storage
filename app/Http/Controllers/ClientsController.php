<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        return view('admin.clients.index')->with('clients', Client::all());
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        

        $client = Client::create([
            'name' => $request -> name,
            'address' => $request -> address,
            'city' => $request -> city,
            'email' => $request -> email,
            'phone' => $request -> phone,
            'description' => $request -> description,
        ]);

        return redirect()->route('clients');
    }
    public function edit($id)
    {
        $client = Client::find($id);

        return view('admin.clients.edit')->with('client', $client);
    }
    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        $client->name = $request->name;
        $client->address = $request->address;
        $client->city = $request->city;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->description = $request->description;

        $client->save();

        return redirect()->route('clients');
    }
    public function destroy($id)
    {
        $client = Client::find($id);

        $client->delete();

        return redirect()->back();
    }
}
