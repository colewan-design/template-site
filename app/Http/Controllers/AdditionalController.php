<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{lib_additionals,FileUpload};
use File;

class AdditionalController extends Controller
{
    public function index(Request $request) {

        $user_id = 1;

        if($user_id = 1){
            $lib_additionals =  DB::table('lib_additionals')
                                ->leftjoin('file_uploads', 'file_uploads.reference_id', '=', 'lib_additionals.id')
                                ->orderByRaw('lib_additionals.updated_at DESC NULLS LAST')
                                ->orderByRaw('lib_additionals.created_at DESC NULLS LAST') 
                                ->whereNull('lib_additionals.deleted_at')
                                ->get([
                                    'lib_additionals.id',
                                    'lib_additionals.category',
                                    'lib_additionals.additional_name',
                                    'lib_additionals.additional_description',
                                    'lib_additionals.additional_amount',
                                    'lib_additionals.sku',
                                    'lib_additionals.created_at',
                                    'file_uploads.reference_id',   
                                    'file_uploads.name',  
                                    'file_uploads.path', 
                                    ]);
        }else{
            $lib_additionals =  DB::table('lib_additionals')
            ->leftjoin('file_uploads', 'file_uploads.reference_id', '=', 'lib_additionals.id')
            ->orderByRaw('lib_additionals.updated_at DESC NULLS LAST')
            ->orderByRaw('lib_additionals.created_at DESC NULLS LAST') 
            ->whereNull('lib_additionals.deleted_at')
            ->where('lib_baskets.user_id' ,'=',$user_id)
            ->get([
                    'lib_additionals.id',
                    'lib_additionals.category',
                    'lib_additionals.additional_name',
                    'lib_additionals.additional_description',
                    'lib_additionals.additional_amount',
                    'lib_additionals.sku',
                    'lib_additionals.created_at',
                    'file_uploads.reference_id',   
                    'file_uploads.name',  
                    'file_uploads.path', 
            ]);
        }


        $chunks_lib_additionals= collect($lib_additionals)->chunk(100);
        foreach($chunks_lib_additionals as $chunk_lib_additional){
            return $chunk_lib_additional;
        }
        
    }

    public function store(Request $request)
    {
        $lib_additionals = new lib_additionals();
        columnSetter($lib_additionals, $request);
        $lib_additionals->additional_code = GenerateBasketCode();
        $lib_additionals->sku = GenerateBasketCode();
        $lib_additionals->save();

        $path = public_path('upload/additionals');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }   
        $fileUpload = new FileUpload;
        if($request->file) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path =$request->file('file')->storeAs('upload/additionals', $file_name, 'public');
            $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
            $fileUpload->path =  $file_path;
            $fileUpload->reference_id = $lib_additionals->id;
            $request->file->move($path,$file_name);
            $fileUpload->save();
        }
        return response()->json([
            'data' => $lib_additionals
        ], 200);
    }

    public function update(Request $req, $id)
    {
        $lib_additionals = lib_additionals::find($id);
        columnSetter($lib_additionals, $req);
        $lib_additionals->save();

        $path = public_path('upload/additionals');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }   
        $fileUpload = FileUpload::where('reference_id',$id)->first();
     
        if($fileUpload == null) {
            $fileUpload = new FileUpload;
        }

        if($req->file) {
            $file_name = time().'_'.$req->file->getClientOriginalName();
            $file_path =$req->file('file')->storeAs('upload/additionals', $file_name, 'public');
            $fileUpload->name = time().'_'.$req->file->getClientOriginalName();
            $fileUpload->path =  $file_path;
            $fileUpload->reference_id = $lib_additionals->id;
            $req->file->move($path,$file_name);
            $fileUpload->save();
        }
        
        return response()->json([
            'data' => $lib_additionals
        ], 200);
    }

    public function destroy($id)
    {
        $lib_additionals = lib_additionals::find($id);
        $lib_additionals->delete();
        $fileUpload = FileUpload::where('reference_id',$id)->first();
        $fileUpload ->delete();
        return $lib_additionals;
    }

    public function getItems(Request $request) {
       $lib_basket_items_array =  [];
       $lib_basket_items = DB::table('lib_basket_items')->whereNull('deleted_at')->get(['basket_item_name']);
       foreach ($lib_basket_items as $value){
          array_push($lib_basket_items_array,$value->basket_item_name);
       }

        return $lib_basket_items_array;
    }

    public function search(Request $request){
        $searchWord = $request->get('s');
        $lib_additionals = lib_additionals::select(['lib_additionals.*'])
        ->where(function($query) use ($searchWord){
            $query->where('additional_name', 'ILIKE', "%$searchWord%");
        })->get();


        return response()->json([
            'data' => $lib_additionals
        ], 200);
    }

}
