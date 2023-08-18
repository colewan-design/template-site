<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\lib_baskets;
use App\Models\FileUpload;
use File;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function index(Request $request) {
        $user_id = 1;

        if($user_id = 1){
            $lib_baskets =  DB::table('lib_baskets')
                            ->leftjoin('file_uploads', 'file_uploads.reference_id', '=', 'lib_baskets.id')
                            ->orderByRaw('lib_baskets.updated_at DESC NULLS LAST')
                            ->orderByRaw('lib_baskets.created_at DESC NULLS LAST') 
                            ->whereNull('lib_baskets.deleted_at')
                            ->get([
                                    'lib_baskets.id',
                                    'lib_baskets.basket_code', 
                                    'lib_baskets.basket_size',    
                                    'lib_baskets.basket_item',  
                                    'lib_baskets.basket_amount',
                                    'lib_baskets.from',
                                    'lib_baskets.to',
                                    'lib_baskets.sku',
                                    'lib_baskets.user_id',
                                    'lib_baskets.created_at',
                                    'file_uploads.reference_id',   
                                    'file_uploads.name',  
                                    'file_uploads.path', 
                                ]);

        }else{
            $lib_baskets =  DB::table('lib_baskets')
            ->leftjoin('file_uploads', 'file_uploads.reference_id', '=', 'lib_baskets.id')
            ->orderByRaw('lib_baskets.updated_at DESC NULLS LAST')
            ->orderByRaw('lib_baskets.created_at DESC NULLS LAST') 
            ->whereNull('lib_baskets.deleted_at')
            ->where('lib_baskets.user_id' ,'=',$user_id)
            ->get([
                    'lib_baskets.id',
                    'lib_baskets.basket_code', 
                    'lib_baskets.basket_size',    
                    'lib_baskets.basket_item',  
                    'lib_baskets.basket_amount',
                    'lib_baskets.from',
                    'lib_baskets.to',
                    'lib_baskets.sku',
                    'lib_baskets.user_id',
                    'lib_baskets.created_at',
                    'file_uploads.reference_id',   
                    'file_uploads.name',  
                    'file_uploads.path', 
                ]);          
        }


        $chunks_lib_baskets= collect($lib_baskets)->chunk(100);
        foreach($chunks_lib_baskets as $chunk_lib_basket){
            return $chunk_lib_basket;
        }
    }

    public function store(Request $request)
    {
        $lib_baskets = new lib_baskets();
        columnSetter($lib_baskets, $request);
        $lib_baskets->basket_code = GenerateBasketCode();
        $lib_baskets->sku = GenerateBasketCode();
        $lib_baskets->basket_item = json_encode($request->basket_item);
        $lib_baskets->save();

        $path = public_path('upload/baskets');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }   
        $fileUpload = new FileUpload;
        if($request->file) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path =$request->file('file')->storeAs('upload/baskets', $file_name, 'public');
            $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
            $fileUpload->path =  $file_path;
            $fileUpload->reference_id = $lib_baskets->id;
            $request->file->move($path,$file_name);
            $fileUpload->save();
        }
        
        return response()->json([
            'data' => $lib_baskets
        ], 200);
    }

    public function update(Request $req, $id)
    {
        $lib_baskets = lib_baskets::find($id);
        columnSetter($lib_baskets, $req);
        $lib_baskets->basket_item = json_encode($req->basket_item);
        $lib_baskets->save();

        $path = public_path('upload/baskets');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }   
        $fileUpload = FileUpload::where('reference_id',$id)->first();

        if($fileUpload == null) {
            $fileUpload = new FileUpload;
        }

        if($req->file) {
            $file_name = time().'_'.$req->file->getClientOriginalName();
            $file_path =$req->file('file')->storeAs('upload/baskets', $file_name, 'public');
            $fileUpload->name = time().'_'.$req->file->getClientOriginalName();
            $fileUpload->path =  $file_path;
            $fileUpload->reference_id = $lib_baskets->id;
            $req->file->move($path,$file_name);
            $fileUpload->save();
        }
        
        return response()->json([
            'data' => $lib_baskets
        ], 200);
    }

    public function destroy($id)
    {
        $lib_baskets = lib_baskets::find($id);
        $lib_baskets->delete();
        $fileUpload = FileUpload::where('reference_id',$id)->first();
        $fileUpload ->delete();
        return $lib_baskets;
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
        $lib_baskets = lib_baskets::select(['lib_baskets.*'])
        ->where(function($query) use ($searchWord){
            $query->where('basket_code', 'ILIKE', "%$searchWord%");
        })->get();

        return response()->json([
            'data' => $lib_baskets
        ], 200);
    }

}
