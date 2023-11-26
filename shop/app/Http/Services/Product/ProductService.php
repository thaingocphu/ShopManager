<?php

namespace App\Http\Services\Product;

use App\Models\product;
use App\Models\menu;
use Illuminate\Support\Facades\Session;



class ProductService{
    //get values from model Menu
    public function getMenu()
    {
        return Menu::where('active', 1)->where('parent_id','<>', 0)->get();
    }

    //add values to model product 
    public function insert($request){
        if( $request->input('price_sale') >= $request->input('price')){
            Session::flash('error','original price must be higher than discount price');
            return  false;
        }else{
            try{
                
                $thumb_path = 'image'.'-'.date("Y-m-d").'-'.$request->image->getClientOriginalName();
    
                $request->image->move(public_path('Storage/uploads'), $thumb_path );
    
                
                product::create([
                    'name' => (string) $request->input('name'),
                    'description' => (string) $request->input('description'),
                    'content' => (string) $request->input('content'),
                    'thumb' => $thumb_path,
                    'menu_id' => (integer) $request->input('menu_id'),
                    'price' => (integer) $request->input('price'),
                    'price_sale' => (integer) $request->input('price_sale'),
                    'active' => (integer) $request->input('active'),
                ]);
             Session::flash('success','add a product successful');
    
            }catch(\Exception $e){
                Session::flash('error', $e->getMessage());
                return false;
            }
    
            return true;
        }
    }
    //get values from db
    public function get(){
        return Product::with('menu')
        ->orderByDesc('id')->paginate('15');
    }

    //update values from db by form edit
    public function update($request, $product){
        //get image name
        $thumb_path = 'image'.'-'.date("Y-m-d").'-'.$request->image->getClientOriginalName();
    
        $request->image->move(public_path('Storage/uploads'), $thumb_path );

        //update table
        $product->name = (string) $request->input('name');
        $product->description = (string) $request->input('description');
        $product->content = (string) $request->input('content');
        $product->thumb = $thumb_path;
        $product->menu_id = (integer) $request->input('menu_id');
        $product->price = (integer) $request->input('price');
        $product->price_sale = (integer) $request->input('price_price');
        $product->active = (integer) $request->input('active');

        $product->save();

        Session::flash('success','update section successful');

        return true;
    }


    public function destroy($request){
        $id = $request->input('id');

        $product = product::where('id', $request->input('id'))->first();
        //deleting relate section if parent section is deleted
        if($product){
            return product::where('id', $id)->delete();
        }
    }
    
}