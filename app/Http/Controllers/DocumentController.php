<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ColumnDocument;
use App\Models\Doctype;
use App\Models\Document;
use \PDF;

class DocumentController extends Controller{

    protected $default_pdf_view = 'default-pdf-form';

    public function index(){

        return response()->json([
            'message' => 'Listing all valid documents',
            'data' => Document::all()->toArray(),
        ], 200);

    }

    public function store(Request $request){

        try{            
            $document = Document::create($request->only(['title', 'doctype_id'])); 
            
            if( $request->has('fields') && is_array($request->fields) ){

                foreach($request->fields as $fields){   
                    $documentFields[$fields['column_id']] = ['text' => $fields['text']];
                }

                $document->columns()->sync($documentFields);
            }

            return response()->json([
                'message' => 'New Document created.',
                'data' => $document,
            ], 200);

        }catch (\Exception $e){
            return response()->json(['errors' => 'api error'], 500);
        }

    }

    public function update(Request $request, string $id){

        try{

            $document = Document::findOrFail($id);
            $document->fill( $request->only(['title', 'doctype_id']) )->update();
            
            if ($request->has('fields') && is_array($request->fields)){
                foreach($request->fields as $fields){
                    $documentFields[$fields['column_id']] = ['text' => $fields['text']];
                }
                $document->columns()->sync($documentFields);
            }

            return response()->json([
                'message' => 'Document updated.',
                'data' => $document,
            ], 200);

        } catch (\Exception $e){
            return response()->json(['errors' => 'api error'], 500);
        }

    }

    public function destroy(string $id){

        try{
            $document = Document::findOrFail($id);
            $document->columns()->detach();
            $document->delete();
            return response()->json([
                'message' => 'Document deleted.',
                'data' => $document,
            ], 200);
        } catch (\Exception $e){
            return response()->json(['errors' => 'api error'], 500);
        }

    }

    public function show(string $id){

        try{
            $document = Document::findOrFail($id);
            return response()->json([
                'message' => 'Showing document data.',
                'data' => $document,
            ], 200);
        } catch (\Exception $e){
            return response()->json(['errors' => 'api error'], 500);
        }

    }

    public function download($id){

        try{
            $doc = [
                'doc_data' => Document::findOrFail($id)
            ];
            
            $type_doc = Doctype::findOrFail($doc['doc_data']->doctype_id);

            $view = $this->default_pdf_view; // default PDF
            
            if( view()->exists( $type_doc->template ) ){ // custom view for doctype ...
                $view = $type_doc->template;
            }

            $pdf = PDF::loadView( $view , $doc );
            return $pdf->download("{$view}.pdf");
        } catch (\Exception $e){
            //return response()->json(['errors' => 'server error, try again'], 500);
        }
        
    }
    
    public function create(){
        return response()->json('Function not applicable', 404);
    }

    public function edit(){
        return response()->json('Function not applicable', 404);
    }
}
