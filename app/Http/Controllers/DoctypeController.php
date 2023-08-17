<?php

namespace App\Http\Controllers;

use App\Models\Doctype;
use Illuminate\Http\Request;

class DoctypeController extends Controller{

    public function index(){

        return response()->json([            
            'data' =>  [Doctype::all()->toArray()],
            'message' => 'Listing all valid types for documents'
        ], 200);

    }

    public function store(Request $request){

        try{
            $new_type = Doctype::create($request->only(['name', 'template']));
            return response()->json([
                'data' => $new_type,
                'message' => 'New type of document created.'], 200);
        } catch (\Exception $e){            
            return response()->json(['errors' => 'api error'], 500);
        }

    }

    public function update(Request $request, string $id){

        try{
            
            $type = Doctype::findOrFail($id);
            $type->fill($request->only(['name', 'template']))->update();

            return response()->json([
                'data' => $type,
                'message' => 'Doc type updated.'], 200);

        } catch (\Exception $e){
            return response()->json(['errors' => 'api error'], 500);
        }

    }

    public function show(string $id){
        try{
            $type = Doctype::findOrFail($id);
            return response()->json([
                'message' => 'Showing type data',
                'data' => $type,
            ], 200);        
        } catch (\Exception $e){
            return response()->json(['errors' => 'api error'], 500);
        }
    }

    public function destroy(string $id){

        try{
            $model = Doctype::findOrFail($id);
            $model->delete();
            return response()->json([
                'message' => 'Type deleted',
                'data' => $model,
            ], 200);
        } catch (\Exception $e){
            return response()->json(['errors' => 'api error'], 500);
        }

    }

    public function create(){
        return response()->json('Function not applicable', 404);
    }

    public function edit(){
        return response()->json('Function not applicable', 404);
    }
    
}
