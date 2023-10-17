<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JeroenDesloovere\VCard\VCard;

class TestroomController extends Controller
{
    public function form(){
        return view('testroom');
    }

    public function store(Request $request){
        // $name = $request->nom;
        // dd($name);
        
        $vcard = new VCard();

                // define variables
        $lastname = $request->nom;
        $firstname = $request->prenom;
        $additional = '';
        $prefix = '';
        $suffix = '';

        // add personal data
        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);
        
        // add work data
        // $vcard->addCompany('Siesqo');
        // $vcard->addJobtitle('Web Developer');
        // $vcard->addRole('Data Protection Officer');
        // $vcard->addEmail('info@jeroendesloovere.be');
        $vcard->addPhoneNumber($request->mobil, 'Home');
        // $vcard->addPhoneNumber(123456789, 'WORK');
        $vcard->addAddress(null,$request->adress);
        $vcard->addLabel('street, worktown, workpostcode Belgium');
        $vcard->addURL($request->web);

        $vcard->download();
        // return $vcard->getOutput();
    }
}
