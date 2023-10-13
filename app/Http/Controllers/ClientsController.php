<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Compte;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::all();
        return view('back.Clients.list',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.Clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Clients();
        $client->nom = $request->nom;
        $client->prenom = $request-> prenom;
        $client->job = $request-> job;
        $client->dateNaiss = $request-> dateNaiss;
        $client->mail = $request-> mail;
        $client->avatar = $request-> avatar;
        $client->mobil01 = $request-> mobil01;
        $client->mobil02 = $request-> mobil02;
        $client->phone = $request-> phone;
        $client->siteWeb = $request-> siteWeb;
        $client->ville = $request-> ville;
        $client->adress = $request-> adress;
        
        if($client->save()){
            return redirect()->route('Clients.index');
        }
        
        dump($client);die();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients, $id)
    {
        $client = Clients::findOrFail($id);
        $comptes = Compte::where('client_id',$id)->get();
        // dd($comptes);
        return view('back.Clients.show',compact('client','comptes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $clients,$id)
    {
        $client = Clients::FindOrFail($id);
        return view('back.Clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $clients, $id)
    {
        $client = Clients::FindOrFail($id);
        
        $client->nom = $request->nom;
        $client->prenom = $request-> prenom;
        $client->job = $request-> job;
        $client->dateNaiss = $request-> dateNaiss;
        $client->mail = $request-> mail;
        $client->avatar = $request-> avatar;
        $client->mobil01 = $request-> mobil01;
        $client->mobil02 = $request-> mobil02;
        $client->phone = $request-> phone;
        $client->siteWeb = $request-> siteWeb;
        $client->ville = $request-> ville;
        $client->adress = $request-> adress;
        
        if($client->save()){
            return redirect()->route('Clients.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients,$id)
    {
        $client = Clients::FindOrFail($id);
        if($client->delete()){
            return back();
        }
    }

    public function toggle($id){
        $client = Clients::FindOrFail($id);

        if($client->etat == 0){
            $client->etat = 1;
        }
        else{
            $client->etat = 0;
        }

        $client->save();
        return back();
    }
}
