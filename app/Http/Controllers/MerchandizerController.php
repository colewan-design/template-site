<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Models\{Merchandizers,FileUpload};
use File;

class MerchandizerController extends Controller
{

    public function index(Request $request) {
        $merchandizers =  DB::table('merchandizers')
        ->leftjoin('file_uploads', 'file_uploads.reference_id', '=', 'merchandizers.id')
        ->orderByRaw('merchandizers.updated_at DESC NULLS LAST')
        ->orderByRaw('merchandizers.created_at DESC NULLS LAST') 
        ->whereNull('merchandizers.deleted_at')
        ->get([
            'merchandizers.id',
            'merchandizers.name', 
            'merchandizers.registered_name',    
            'merchandizers.address',
            'merchandizers.email', 
            'merchandizers.contact',        
            'merchandizers.tin',
            'merchandizers.isEnabled',
            'merchandizers.created_at',    
            'file_uploads.reference_id',   
            'file_uploads.name',  
            'file_uploads.path', 
        ]);   ;

        $chunks_merchandizers = collect($merchandizers)->chunk(100);
        foreach($chunks_merchandizers as $chunks_merchandizer){
            return $chunks_merchandizer;
        }
       
    }

    public function store(Request $request)
    {
        $merchandizers = new Merchandizers();
        columnSetter($merchandizers, $request);
        $merchandizers->save();

        $path = public_path('upload/merchandizers');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }   
        $fileUpload = new FileUpload;
        if($request->file) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path =$request->file('file')->storeAs('upload/merchandizers', $file_name, 'public');
            $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
            $fileUpload->path =  $file_path;
            $fileUpload->reference_id = $merchandizers->id;
            $request->file->move($path,$file_name);
            $fileUpload->save();
        }
        
        return response()->json([
            'data' => $merchandizers
        ], 200);
    }

    public function update(Request $req, $id)
    {
        $merchandizers = Merchandizers::find($id);
        columnSetter($merchandizers, $req);
        $merchandizers->save();

        $path = public_path('upload/merchandizers');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }   
        $fileUpload = FileUpload::where('reference_id',$id)->first();

        if($fileUpload == null) {
            $fileUpload = new FileUpload;
        }

        if($req->file) {
            $file_name = time().'_'.$req->file->getClientOriginalName();
            $file_path =$req->file('file')->storeAs('upload/merchandizers', $file_name, 'public');
            $fileUpload->name = time().'_'.$req->file->getClientOriginalName();
            $fileUpload->path =  $file_path;
            $fileUpload->reference_id = $merchandizers->id;
            $req->file->move($path,$file_name);
            $fileUpload->save();
        }
        
        return response()->json([
            'data' => $merchandizers
        ], 200);
    }

    public function destroy($id)
    { 
        $merchandizers = Merchandizers::find($id);
        $merchandizers->delete();
        $fileUpload = FileUpload::where('reference_id',$id)->first();
        $fileUpload ->delete();
        return $merchandizers;
       
    }

    public function search(Request $request){
     $searchWord = $request->get('s');
        $merchandizers = Merchandizers::select(['merchandizers.*'])
        ->where(function($query) use ($searchWord){
            $query->where('name', 'ILIKE', "%$searchWord%");
        })->get();

        return response()->json([
            'data' => $merchandizers
        ], 200);
    }

}
