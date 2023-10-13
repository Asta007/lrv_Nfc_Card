<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Compte;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function showinfo($id){
        $client = Clients::FindOrFail($id);
        $comptes = Compte::Where('client_id',$id)->get();
        // dd($comptes);
        return view('Front.InfoClient',compact('client','comptes'));
    }
}
