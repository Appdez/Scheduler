<?php

namespace App\Http\Controllers;

use App\Models\ClientDocument;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.document')->with([
            'documents' => Document::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $document =  $request->validate([
            'name'=> 'required|unique:documents,name,except,id',
        ]);
        try {
            Document::create($document);
            return redirect()->back()->with('success','Documento crado com sucesso');
        } catch (\Throwable $th) {
            return redirect()->back()->with('fail','erro ao adicionar documento');
        }
       
    }

    
       /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientScheduler  $clientScheduler
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('backend.view_document')->with(
            'document',$document
        );
    }

    public function create()
    {
        return view('backend.view_document')->with(
            'document',null
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $documents =  $request->validate([
            'name'=> 'required|unique:documents,name,except,id',
        ]);
        try {
           
            $document->name = $documents['name'];
            $document->save();
            return redirect()->back()->with('success','Documento actualizado com sucesso');
        } catch (\Throwable $th) {
            return redirect()->back()->with('fail','erro ao actualizar documento');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        try {
            if($document->client_documents->count() > 0){
                ClientDocument::where(
                    'document_id' ,$document->id
                )->delete();
            }
            $document->delete();
            return redirect()->back()->with('success','Documento deletado com sucesso');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('fail','erro ao deletar documento');
        }
    }
}
