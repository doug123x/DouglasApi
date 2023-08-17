<?php

namespace App\Http\Controllers;

use App\Models\Column;
use Illuminate\Http\Request;

class ColumnController extends Controller{

    public function index(){

        return response()->json([            
            'data' =>  [Column::all()->toArray()],
            'message' => 'Listing all valid columns for documents'
        ], 200);

    }

    public function store(Request $request){

        try{
            $new_column = Column::create($request->only(['name', 'doctype_id']));
            return response()->json([
                'data' => $new_column,
                'message' => 'New type of column created.'], 200);
        } catch (\Exception $e){            
            return response()->json(['errors' => 'api error'], 500);
        }

    }

    public function update(Request $request, string $id){

        try{
            
            $Column = Column::findOrFail($id);
            $Column->fill($request->only(['name', 'doctype_id']))->update();

            return response()->json([
                'data' => $Column,
                'message' => 'Column updated.'], 200);

        } catch (\Exception $e){
            return response()->json(['errors' => 'api error'], 500);
        }

    }

    public function show(string $id){
        try{
            $Column = Column::findOrFail($id);
            return response()->json([
                'message' => 'Showing Column data',
                'data' => $Column,
            ], 200);        
        } catch (\Exception $e){
            return response()->json(['errors' => 'api error'], 500);
        }
    }

    public function destroy(string $id){

        try{
            $Column = Column::findOrFail($id);
            $Column->delete();
            return response()->json([
                'message' => 'Type deleted',
                'data' => $Column,
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
