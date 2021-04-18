<?php

namespace App\Http\Controllers;

use App\Requested;
use App\Profile;
use App\User;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = auth()->user()->contacts;
        echo $contact;
        return view('contact.show')->with(compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Profile::all();
        $requests = Requested::all();
        return view('contact.index')->with(compact('user','requests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('from_id');

        if($request->input('accept'))
        {
            $contact = new Contact;
            $contact->req_from_id = $request->input('from_id');
            $contact->req_to_id = $request->input('accept');
            $contact->name = $request->input('name');
            $contact->save();

            $data = DB::table('requesteds')->where('id','=',$request->input('req_id'))->update(array('status' => 'Accepted'));
        }
        if($request->input('reject'))
        {
            $data = \App\Requested::where('id','=',$request->input('req_id'));
            $data->delete();
        }
        return redirect('/status/'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::all();
        $profile = Profile::all();
        $data = $profile->reject(function($item) {
            return $item['user_id'] == auth()->user()->id;
        });
        
        return view('contact.index')->with(compact('user','profile','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
