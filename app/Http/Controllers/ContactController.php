<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContact;
use App\Jobs\SendEmail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        $search = request('search');

        if($search){
            $contacts = Contact::where([
                ['first_name', 'like', $search.'%'],
            ])->groupBy('first_name')->orderBy('first_name', 'ASC')->get();
        } else {
            $contacts = DB::table('contacts')->orderBy('first_name', 'ASC')->get();
        }

        return view('contacts.index', ['contacts' => $contacts, 'search' => $search]);
    }

    public function create(){
        return view('contacts.create.create');
    }

    public function store(StoreContact $request){

        $this->validated();

        $contact = Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'cep' => $request->cep,
            'road' => $request->road,
            'district' => $request->district,
            'city' => $request->city,
            'uf' => $request->uf,
            'ibge' => $request->ibge
        ]);

        SendEmail::dispatch($contact);

        dd($contact);

        return redirect()->route('contacts.index');;
    }

    public function edit(Contact $contact){
        return view('contacts.edit.edit', ['contact' => $contact]);
    }

    public function update(Request $request, Contact $contact) {

        $contact->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'cep' => $request->cep,
            'road' => $request->road,
            'district' => $request->district,
            'city' => $request->city,
            'uf' => $request->uf,
            'ibge' => $request->ibge
        ]);

        Mail::send('contacts.email.email', $contact->toArray(), function($message) {
            $message->to('gustavo.dsantosmelo@gmail.com', 'Gustavo Melo')->subject('Contato adicionado com sucesso!');
        });

        return redirect()->route('contacts.index');
    }

    public function destroy(Contact $contact){
        $contact->delete();

        return redirect()->route('contacts.index');
    }
}
