<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFormRequest;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\JsonResponse;
use App\models\menu;


class MenuController extends Controller
{
    //import MenuService
    protected $menuService;
    public function __construct(MenuService $menuService){
        $this->menuService = $menuService;
    }

    public function create(){
        return view('admin.menu.add',[
            'title' => 'Add section',
            'menu' => $this->menuService->getParent()   
        ]);
    }

    public function store( CreateFormRequest $request){
        $request->validated();

        $result = $this->menuService->create($request);

        return redirect()->back();

    }

    public function index() {
        return view('admin.menu.list',[
            'title' => 'list of sections',
            'menu' => $this->menuService->getAll()
        ]);
    }

    public function destroy(Request $request) {
        $result = $this->menuService->destroy($request);

        if($result){
            return response()->json([
                'error' => false,
                'message' => 'deleting successful'
            ]);
        }
        return response()->json([
            'error' => true,
        ]);

    }

    public function show (menu $menu){
        return view('admin.menu.edit',[
            'title' => 'Editing Section',
            'menu' => $menu,
            'menus' => $this->menuService->getParent()   

        ]);
    }

    public function update(menu $menu, CreateFormRequest $request){
        $request->validated();
        $this->menuService->update($request, $menu);

        return redirect('admin/menu/list');
    }
}
