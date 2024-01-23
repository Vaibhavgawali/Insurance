<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

use Auth;
use Validator;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('submitContact');

        $this->middleware(['role:Superadmin'])->only('index','show','update','destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();

        if (Auth::check()) {
            if ($contacts) {
                dd($contacts);
                // return view('dashboard.admin.contacts.index', ['contacts' => $contacts]);
            }
            return Response(['message' => "Contacts not found "], 404);
        }
        return Response(['data' => 'Unauthorized'], 401);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Auth::check()) {
            $contact = Contact::find($id);

            if ($contact) {
                dd($contact);
                // return view('dashboard.admin.contacts.show', ['contact' => $contact]);
            } 
        }
        return Response(['data' => 'Unauthorized'], 401);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function submitContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'nullable|string|max:100',
            'message' => 'nullable|string|max:250',
        ]);

        if ($validator->fails()) {
            return Response(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];
        
        if ($request->has('subject')) {
            $data['subject'] = $request->subject;
        }

        if ($request->has('message')) {
            $data['message'] = $request->message;
        }

        $is_added = Contact::create($data);

        if($is_added){
            return Response(['status' => true, 'message' => "Contact Form submitted successfully !"], 200);
        }
        return Response(['status' => false, 'message' => "Something went wrong !"], 500);
    }
}
