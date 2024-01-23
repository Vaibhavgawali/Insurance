<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

use Auth;
use Validator;

class ContactController extends Controller
{
    

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
