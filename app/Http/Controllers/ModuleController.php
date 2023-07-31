<?php

namespace App\Http\Controllers;

use App\Models\LookUp;
use App\Models\Registration;
use App\Models\UserWorkGroup;
use App\Models\WorkGroup;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    public function sidebar(){
        $sidebar = Module::where('active',1)->where('display',1)->where('parent',null)->get();
        $submenu = Module::where('parent','!=',null)->where('display',1)->get();

        return response()->json(
            ['msg' =>'Data found', 'sidebar'=>$sidebar,'submenu' =>$submenu]
            );
    }

    public function viewNavigation(){
        return view('admin.module.all_navigation');
    }

    public function parentNav(){

        $parentNav = Module::where('active',1)->where('url',null)->get();

        return response()->json($parentNav,200);
    }

    public function addNavigation(Request $request){
        $navid = $request->hiddenNavId;
        if ($request->display == 'on'){
            $display = 1;
        }else{
            $display = 0;
        }
        if ($navid == 0){
            $module = Module::create([
                'name' => $request->name,
                'url' => $request->url,
                'icon' => $request->icon,
                'parent' => $request->parent,
                'display' => $display,
                'active' => 1,
            ]);

            return response()->json([
                'msg' =>'Navigation stored successfully',
                'user'=>$module,
                'success'=>true,
            ],200);
        }else{
            $module = Module::findOrFail($navid);
            $module->name = $request->name;
            $module->url = $request->url;
            $module->icon =$request->icon;
            $module->parent = $request->parent;
            $module->display = $display;
            $module->update();

            return response()->json([
                'msg' =>'Navigation updated successfully',
                'user'=>$module,
                'success'=>true,
            ],200);
        }

    }

    public function allNavigation(){
//        $module = Module::get();
        $module= DB::table('modules as m1')
                    ->leftJoin('modules as m2','m1.parent','=','m2.id')
                    ->select('m1.*','m2.name as parentname')->get();
        return response()->json(['data'=> $module],200);
    }

    public function editNavigation($id){
        $module = Module::findOrFail($id);
        return response()->json($module,200);
    }

    public function deleteNavigation($id){
        $module = Module::findOrFail($id);
        $module->delete();
        return response()->json([
            'msg'=>'Navigation deleted',
            'success'=>true
          ],200);
    }

//    start workgroup method

   public function workgroupIndex(){
        return view('admin.module.workgroup');
   }

   public function allWorkgroup(){
       $workGroup= DB::table('work_groups as w1')
           ->leftJoin('work_groups as w2','w1.parent','=','w2.id')
           ->select('w1.*','w2.name as parentname')->get();
       return response()->json(['data' => $workGroup],200);
   }

   public function addWorkgroup(Request $request){
       $workid = $request->hiddenWorkgroupId;

       if ($workid == 0){
           $work = WorkGroup::create([
               'name' => $request->name,
               'description' => $request->description,
               'parent' => $request->workgroupparent,
           ]);

           return response()->json([
               'msg' =>'Workgroup stored successfully',
               'user'=>$work,
               'success'=>true,
           ],200);
       }else{
           $work = WorkGroup::findOrFail($workid);
           $work->name = $request->name;
           $work->description = $request->description;
           $work->parent = $request->workgroupparent;
           $work->update();

           return response()->json([
               'msg' =>'Workgroup updated successfully',
               'user'=>$work,
               'success'=>true,
           ],200);
       }
   }

   public function getParent(){
       $parent = WorkGroup::where('parent',null)->get();

       return response()->json($parent,200);
   }

   public function editWorkgroup($id){
       $work = WorkGroup::findOrFail($id);
       return response()->json($work,200);
   }

   public function deleteWorkgroup($id){
       $work = WorkGroup::findOrFail($id);
       $work->delete();
       return response()->json([
           'msg'=>'Workgroup deleted',
           'success'=>true
       ],200);
   }

    // user work group method start
    public function userGroupIndex(){
        return view('admin.module.user-workgroup');
    }

    public function allUserWorkgroup(){
        $userworkGroup= DB::table('user_work_groups as w1')
            ->leftJoin('work_groups as w2','w1.workgroupid','=','w2.id')
            ->leftJoin('users as u','w1.userid','=','u.id')
            ->select('w1.*','w2.name as workgroupname','u.firstname as username')->get();
        return response()->json(['data'=>$userworkGroup],200);
    }

    public function getAllUser(){
        $user = User::where('emailverified',1)->get();
        return response()->json($user,200);
    }

    public function allWorkgroupData(){
        $work = WorkGroup::get();
        return response()->json($work,200);
    }

    public function addUserWorkgroup(Request $request){
        $workid = $request->hiddenUsergroupId;
        if ($request->issupervisor == 'on'){
            $issupervisor = 1;
        }else{
            $issupervisor = 0;
        }
        if ($workid == 0){
            $work = UserWorkGroup::create([
                'userid' => $request->userid,
                'workgroupid' => $request->workgroupid,
                'issupervisor' => $issupervisor,
            ]);

            return response()->json([
                'msg' =>'User workgroup stored successfully',
                'user'=>$work,
                'success'=>true,
            ],200);
        }else{
            $work = UserWorkGroup::findOrFail($workid);
            $work->userid = $request->userid;
            $work->workgroupid = $request->workgroupid;
            $work->issupervisor = $issupervisor;
            $work->update();

            return response()->json([
                'msg' =>'User workgroup updated successfully',
                'user'=>$work,
                'success'=>true,
            ],200);
        }
    }

    public function editUserWorkgroup($id){
        $work = UserWorkGroup::findOrFail($id);
        return response()->json($work,200);
    }

    public function deleteUserWorkgroup($id){
        $work = UserWorkGroup::findOrFail($id);
        $work->delete();
        return response()->json([
            'msg'=>'User workgroup deleted',
            'success'=>true
        ],200);
    }

    // lookup method start
    public function lookupIndex(){
        return view('admin.module.lookup');
    }

    public function allLookup(){
        $lookup= DB::table('look_ups as l1')
            ->leftJoin('look_ups as l2','l1.parent','=','l2.id')
            ->select('l1.*','l2.name as parentname')->get();
        return response()->json(['data'=>$lookup],200);
    }

    public function addLookup(Request $request){
        $lookupid = $request->hiddenLookupId;

        if ($lookupid == 0){
            $lookup = LookUp::create([
                'name' => $request->name,
                'description' => $request->description,
                'parent' => $request->lookupparent,
            ]);

            return response()->json([
                'msg' =>'Lookup stored successfully',
                'user'=>$lookup,
                'success'=>true,
            ],200);
        }else{
            $lookup = LookUp::findOrFail($lookupid);
            $lookup->name = $request->name;
            $lookup->description = $request->description;
            $lookup->parent = $request->lookupparent;
            $lookup->update();

            return response()->json([
                'msg' =>'Lookup updated successfully',
                'user'=>$lookup,
                'success'=>true,
            ],200);
        }
    }

    public function getLookupParent(){
        $lookup = LookUp::where('parent',null)->get();

        return response()->json($lookup,200);
    }

    public function editLookup($id){
        $lookup = LookUp::findOrFail($id);
        return response()->json($lookup,200);
    }

    public function deleteLookup($id){
        $lookup = LookUp::findOrFail($id);
        $lookup->delete();
        return response()->json([
            'msg'=>'Lookup deleted',
            'success'=>true
        ],200);
    }


}
