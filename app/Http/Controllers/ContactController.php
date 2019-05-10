<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\StoreContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request, Contact $contact)
    {
        if ($request->has('busca')){
            $contacts = $contact->where('contactName', 'LIKE', '%' . $request->busca . '%')->get();
        } else {
            $contacts = Contact::all();
        }

        return response()->json($contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreContact $request)
    {
        $validated = $request->validated();

        $contact = Contact::create($validated);
        return response()->json($contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return response()->json($contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContact $request, Contact $contact)
    {

        $validated = $request->validated();

        $contact->update($validated);

        return response()->json([
            'message' => 'Great sucess! contact updated@!!',
            'contact' => $validated
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json([
            'message' => 'Sucessefully deleted task!'
        ]);
    }
}
