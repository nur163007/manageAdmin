<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    public function sidebar(){
        $sidebar = Module::where('active',1)->where('parent',null)->get();
        $submenu = Module::where('parent','!=',null)->get();

        return response()->json(
            ['msg' =>'Data found', 'sidebar'=>$sidebar,'submenu' =>$submenu]
            );
    }

    public function viewNavigation(){
        return view('admin.module.all_navigation');
    }

    public function allNavigation(){
        $module = Module::get();
        return response()->json([
            'module' => $module
        ]);
    }

}
