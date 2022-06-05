<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index(){
        $filter = request('filter');

        $github = Http::get('https://api.github.com/users/defunkt');

        if($filter){
            $contacts = Contact::where([
                ['name', 'like','%'.$filter.'%']
            ])->orderBy('name', 'ASC')->get();
        } else {
            $contacts = DB::table('contacts')->orderBy('name', 'ASC')->get();
        }

        return view('contacts.index', ['contacts' => $contacts, 'github' => $github->json(), 'filter' => $filter]);
    }

    public function listContacts(){
        return view('contacts.list');
    }

    public function about(){
        return view('contacts.about.about');
    }

    public function create(){
        $addresses = Http::get('https://viacep.com.br/ws/49032490/json/');
        dd($addresses->json());

        return view('contacts.create.create', ['addresses' => $addresses]);
    }

    public function store(Request $request, Contact $contact){
        $contact = Contact::create([
            'name' => $request->name,
            'image' => $request->file('image')->store('contacts/', 'public'),
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        Mail::send('contacts.email.email', $contact->toArray(), function($message) {
            $message->to('emilly@gmail.com', 'Emilly Haine')->subject('Contato adicionado com sucesso!');
        });

        return redirect()->route('contacts.index');
    }

    public function edit(Contact $contact){
        return view('contacts.edit.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact){

        $contact->update([
            'name' => $request->name,
            'image' => $request->file('image')->store('contacts/', 'public'),
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('contacts.index');
    }

    public function delete(Contact $contact){
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
