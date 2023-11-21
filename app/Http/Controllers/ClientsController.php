<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Compte;
use Illuminate\Http\Request;
use JeroenDesloovere\VCard\VCard;
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
        // dd(trim($request->prenom," "));

        $client = new Clients();
        $client->nom = $request->nom;
        $client->prenom = $request-> prenom;
        $client->job = $request-> job;
        $client->dateNaiss = $request-> dateNaiss;
        $client->mail = $request-> mail;

        $client->mobil01 = $request-> mobil01;
        $client->mobil02 = $request-> mobil02;
        $client->phone = $request-> phone;
        $client->siteWeb = $request-> siteWeb;
        $client->ville = $request-> ville;
        $client->adress = $request-> adress;
    
        $name = "";

        if(isset($request->avatar)){
           $img = $request->avatar;
           $destination = public_path('avatars\uploaded');
           $ext = pathinfo($img->getClientOriginalName(),PATHINFO_EXTENSION);
           $name = "uploaded_avatar_".$request->prenom."_".$request->nom.'.'.$ext;
           $name = str_replace(' ','',$name);
           $client->avatar = $name;
        };


        // Pour coorder l'appeleation avec le vcf
        $nomcomplet = $client->prenom.'-'.$client->nom;
        $vcf =   strtolower(str_replace(' ','-',$nomcomplet).'.vcf');
        $client->vcf = $vcf;
        
        
        $this->createVcard($client);


        if($client->save()){
            if(isset($img)){
                $img->move($destination,$name);
            }
            return redirect()->route('Clients.index');
        }
        
        // dump($client);die();

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

        $client->mobil01 = $request-> mobil01;
        $client->mobil02 = $request-> mobil02;
        $client->phone = $request-> phone;
        $client->siteWeb = $request-> siteWeb;
        $client->ville = $request-> ville;
        $client->adress = $request-> adress;

        $name = "";

        if (isset($request->avatar)) {
            $destination = public_path("avatars/uploaded");

            if (!empty($client->avatar)) {
               $this->unlink_avatar($client->avatar);
            }
        
            $img = $request->avatar;
            $ext = $img->getClientOriginalExtension();
            $name = "uploaded_avatar_" . $request->prenom . "_" . $request->nom . '.' . $ext;
            
            $img->move($destination, $name);
            
            // Mettez à jour le nom de l'avatar dans votre modèle de client.
            $client->avatar = $name;
        }
        
        
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
        // dd($client);
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

    public function unlink_avatar(string $avatar){
        $client = Clients::where('avatar',$avatar)->get();

        $destination = public_path("avatars/uploaded");
        $oldAvatarPath = $destination . '/' . $avatar;
        if (file_exists($oldAvatarPath)) {
            unlink($oldAvatarPath);
        }
    }

    public function toggle_contact($id, $contact){
        $client = Clients::FindOrFail($id);
        if($client->$contact == 1){ $client->$contact = 0 ;}
        else{ $client->$contact = 1 ;}
        // dd($client);
        $client->save();
        return back();
    }

    public function createVcard(Clients $client){
        $vcard = new VCard();

        $lastname = $client->nom;
        $firstname = $client->prenom;
        $additional = '';
        $prefix = '';
        $suffix = '';
         // add personal data
         $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

         // add work data
        // $vcard->addCompany('Siesqo');
        $vcard->addJobtitle($client->job);
        // $vcard->addRole('Data Protection Officer');
        $vcard->addEmail($client->mail);
        $vcard->addPhoneNumber($client->mobil01, 'Home');
        // $vcard->addPhoneNumber(123456789, 'WORK');
        $vcard->addAddress(null,$client->adress,null,$client->ville);
        $vcard->addURL($client->siteWeb);

        $vcard->setSavePath(public_path('vcfcards'));
        $vcard->save();
    }

}
