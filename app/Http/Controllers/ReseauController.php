<?php

namespace App\Http\Controllers;

use App\Models\Reseau;
use Illuminate\Http\Request;

class ReseauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reseaux = Reseau::all();
        return view('back.Reseau.list',compact('reseaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.Reseau.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = $request->icon;
        $destination = public_path('icons\uploaded');
        $ext = pathinfo($img->getClientOriginalName(),PATHINFO_EXTENSION);
        $name = "uploaded_icon_".$request->ref.'.'.$ext;

        $reseau = new Reseau();
        $reseau->ref = $request->ref;
        $reseau->libelle = $request->libelle;
        $reseau->icon = $name;

        if($reseau->save()){
            $img->move($destination,$name);
            return redirect()->route('Reseau.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reseau  $reseau
     * @return \Illuminate\Http\Response
     */
    public function show(Reseau $reseau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reseau  $reseau
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reseau = Reseau::FindOrFail($id);
        // dd($reseau);
        return view('back.Reseau.edit',compact('reseau'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reseau  $reseau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reseau = Reseau::FindOrFail($id);
        $reseau->ref = $request->ref;
        $reseau->libelle = $request->libelle;

        // dd($reseau);

        if(isset($request->icon)){
            $img = $request->icon;
            $destination = public_path('icons\uploaded');
            $ext = pathinfo($img->getClientOriginalName(),PATHINFO_EXTENSION);
            $name = "uploaded_icon_".$request->ref.'.'.$ext;
            
            if(!empty($reseau->icon)){
                $oldIconPath = $destination . '/' . $reseau->icon;
                unlink($oldIconPath);
            }
            
            $reseau->icon = $name;
        }
       
        

        if($reseau->save()){
            if(isset($request->icon)){
                $img->move($destination,$name);
            }
            return redirect()->route('Reseau.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reseau  $reseau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reseau $reseau,$id)
    {
        $reseau = Reseau::FindOrFail($id);
        if($reseau->delete()){
            return back();
        }
    }

    public function toggle($id){
        $reseau = Reseau::FindOrFail($id);

        if($reseau->etat == 0){
            $reseau->etat = 1;
        }
        else{
            $reseau->etat = 0;
        }

        $reseau->save();
        return back();
    }
}
