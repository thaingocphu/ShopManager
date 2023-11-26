<?php

namespace App\Http\Services\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Menu;


class MenuService {

    //get Parent_id
    public function getParent(){
        return Menu::where('parent_id', 0)->get();
    }

    //get values from db
    public function getAll(){
        return Menu::orderby('id')->paginate(20);
    }

    //destroy values from db
    public function destroy($request){
        $id = $request->input('id');

        $menu = Menu::where('id', $request->input('id'))->first();
        //deleting relate section if parent section is deleted
        if($menu){
            return Menu::where('id', $id)->orwhere('parent_id', $id)->delete();
        }
    }

    //insert into db
    public function create($request){
        try{
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (integer) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (integer) $request->input('active'),

            ]);

        Session::flash('success','creating section successful');

        }catch(\Exception $e){
            Session::flash('error', $e->getMessage());
            return false;
        }

        return true;
    }

    //update data from db by form
    public function update($request, $menu){
        
        if( $request->input('parent_id') != $menu->id ){
            $menu->parent_id = (integer) $request->input('parent_id');
        }
        $menu->name = (string) $request->input('name');
        $menu->description = (string) $request->input('description');
        $menu->content = (string) $request->input('content');
        $menu->active = (integer) $request->input('active');

        $menu->save();

        Session::flash('success','update section successful');

        return true;
    }
}