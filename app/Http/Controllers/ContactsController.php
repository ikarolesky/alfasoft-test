<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Redirect;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $contacts = Contact::all();

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        $data = $request->validated();

        $contact = Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'contact' => $data['contact']
        ]);

        return Redirect::route('contacts.index')->with('status', 'contact-created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::where('id', $id)->first();
        
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::where('id', $id)->first();

        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, string $id)
    {

        $data = $request->validated();

        Contact::where('id', $id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'contact' => $data['contact']
        ]);

        return Redirect::route('contacts.index')->with('status', 'contact-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return Redirect::route('contacts.index')->with('status', 'contact-deleted');
    }
}
