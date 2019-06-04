<?php

namespace App\Http\Controllers;

use App\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contacts::all();

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'phone' => 'nullable'
        ]);

        $contact = new Contacts([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);
        $contact->save();
    
        return redirect('contacts')
                    ->with('success','Contact ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contacts)
    {
        // pourrait être utilité pour afficher une page avec des détails plus spécifiques pour chaque contact
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contacts::find($id);
        
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $request->validate([
            'nom'=>'required',
            'prenom'=> 'required',
            'email' => 'required|string',
            'phone' => 'nullable',
          ]);
    
          $contact = Contacts::find($id);
          $contact->nom = $request->get('nom');
          $contact->prenom = $request->get('prenom');
          $contact->email = $request->get('email');
          $contact->phone = $request->get('phone');
          $contact->save();
    
          return redirect('/contacts')->with('success', 'Contact ajouté avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contacts::find($id);
        $contact->delete();

        return redirect('contacts')->with('success', 'Le contact a bien été éffacé.');
    }
}
