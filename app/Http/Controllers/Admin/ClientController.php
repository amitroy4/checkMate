<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.client.client',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_designation' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:255',
            'whatsapp_number' => 'required|string|max:255',
            'email' => 'required|email|unique:clients',
        ]);

        Client::create($request->all());
        return redirect()->back()->with('success', 'Client added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_designation' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:255',
            'whatsapp_number' => 'required|string|max:255',
            'email' => 'required|email|unique:clients',
        ]);

        $client = Client::findOrFail($id);
        $client->client_name = $request->client_name;
        $client->client_designation = $request->client_designation;
        $client->company_name = $request->company_name;
        $client->mobile_number = $request->mobile_number;
        $client->whatsapp_number = $request->whatsapp_number;
        $client->email = $request->email;
        $client->status = $request->status;
        $client->save();

        session()->flash('success', 'Client updated successfully!');


        return response()->json(['success' => 'Client updated successfully!'], 200);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Client::destroy($id);
        return redirect()->back()->with('success', 'Client deleted successfully.');
    }


    public function status($id)
    {

        $client = Client::findOrFail($id);
        $client->status = $client->status === 1 ? 0 : 1 ;
        $client->save();

        return redirect()->back()->with('success','Client Status updated successfully!');
    }
}
