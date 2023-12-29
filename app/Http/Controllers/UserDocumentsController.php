<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\UserDocuments;

class UserDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $userId = Auth::user()->user_id;

        $validator=Validator::make($request->all(),[
            "document_title"=> 'string|max:40',
            "document_url"=> 'required|mimes:pdf,doc,docx|max:2048',
        ]);
        // dd($request->all());

        if($validator->fails()){
            return Response(['status'=>false,'errors' => $validator->errors()],422);
        }   

        // Save the image to the storage
        $document=$request->file("document_url");
        $documentName=$document->hashName();
        $documentpath= Storage::disk('local')->put('public/documents', $document);

        if ($documentpath) {
            $user_id=Auth::user()->user_id;

            $user_documents=UserDocuments::create([
                'user_id'=>$user_id,
                'document_title'=>$request->document_title,
                'document_url'=>$documentpath,
            ]);

            if($user_documents){
                return Response(['message' => "User documents added successfully"],200);
            }
        }       
        return Response(['message' => "Something went wrong"],500);   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userId = Auth::user()->user_id; 
        if($userId == $id){
            $user = UserDocuments::where('user_id', $id);
            if($user){
                $userData=$user->get();
                return Response(['user documents'=>$userData],200);
            }
            return Response(['message'=>"User not found"],404);
        }
        return Response(['message'=>'Unauthorized'],401);
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
        $userId = Auth::user()->user_id; 
        if($userId == $id){
            $formMethod = $request->method();
            if($formMethod == "PATCH"){

                $validator=Validator::make($request->all(),[
                    "document_title"=> 'string|max:40',
                    "document_url"=> 'required|mimes:pdf,doc,docx|max:2048',
                ]);

                if($validator->fails()){
                    return Response(['message' => $validator->errors()],401);
                }   

                // Save the image to the storage
                $document=$request->file("document_url");
                $documentName=$document->hashName();
                $documentpath= Storage::disk('local')->put('public/documents', $document);

                $user_document = UserDocuments::where('user_id', $id);

                // Delete the old document
                if($user_document->document_url){
                    $old_document=$user->document_url;
                    Storage::delete($old_document);
                }

                $isUpdated=$user->update([
                    'document_title'=>$request->document_title ? $request->document_title : $user_document->document_title,
                    'document_url'=>$documentpath
                ]);

                if($isUpdated){
                    return Response(['message' => "User documents updated successfully"],200);
                }
                return Response(['message' => "Something went wrong"],500);
            }
            return Response(['message'=>"Invalid form method "],405);
        }
        return Response(['message'=>'Unauthorized'],401);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
