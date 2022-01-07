<?php

namespace App\Http\Controllers;

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
            return redirect()->back()->with('error','erro ao adicionar documento');
        }
       
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
            return redirect()->back()->with('error','erro ao actualizar documento');
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
            $document->client_documents()->sync([]);
            $document->delete();
            return redirect()->back()->with('success','Documento deletado com sucesso');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','erro ao deletar documento');
        }
    }
}
