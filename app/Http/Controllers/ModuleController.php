<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use App\Models\LookUp;
use App\Models\PaymentHistory;
use App\Models\Privilege;
use App\Models\Registration;
use App\Models\UserPackage;
use App\Models\UserWorkGroup;
use App\Models\WorkGroup;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    public function sidebar($role)
    {
        $sidebar = DB::table('modules as m')
            ->join('privileges as p', 'm.id', '=', 'p.moduleid')
            ->select('m.*', 'p.roleid', 'p.moduleid', 'p.read', 'p.write', 'p.create', 'p.delete')
            ->where([['m.active', 1], ['m.display', 1], ['m.parent', null], ['p.roleid', $role]])->orderBy('m.id')->get();

        $submenu = DB::table('modules as m')
            ->join('privileges as p', 'm.id', '=', 'p.moduleid')
            ->select('m.*', 'p.roleid', 'p.moduleid', 'p.read', 'p.write', 'p.create', 'p.delete')
            ->where([['m.active', 1], ['m.display', 1], ['m.parent', '!=', null], ['p.roleid', $role]])->orderBy('m.id')->get();

//        $sidebar = Module::where('active',1)->where('display',1)->where('parent',null)->get();
//        $submenu = Module::where('parent','!=',null)->where('display',1)->get();

        return response()->json(
            ['msg' => 'Data found', 'sidebar' => $sidebar, 'submenu' => $submenu]
        );
    }

    public function viewNavigation()
    {
        return view('admin.module.all_navigation');
    }

    public function parentNav()
    {

        $parentNav = Module::where('active', 1)->where('url', null)->get();

        return response()->json($parentNav, 200);
    }

    public function addNavigation(Request $request)
    {
        $navid = $request->hiddenNavId;
        if ($request->display == 'on') {
            $display = 1;
        } else {
            $display = 0;
        }
        if ($navid == 0) {
            $module = Module::create([
                'name' => $request->name,
                'url' => $request->url,
                'icon' => $request->icon,
                'parent' => $request->parent,
                'display' => $display,
                'active' => 1,
            ]);

            $insert = DB::INSERT("INSERT INTO `privileges`(`roleid`, `moduleid`) VALUES(1, $module->id);");

            return response()->json([
                'msg' => 'Navigation stored successfully',
                'user' => $module,
                'success' => true,
            ], 200);
        } else {
            $module = Module::findOrFail($navid);
            $module->name = $request->name;
            $module->url = $request->url;
            $module->icon = $request->icon;
            $module->parent = $request->parent;
            $module->display = $display;
            $module->update();

            return response()->json([
                'msg' => 'Navigation updated successfully',
                'user' => $module,
                'success' => true,
            ], 200);
        }

    }

    public function allNavigation()
    {
//        $module = Module::get();
        $module = DB::table('modules as m1')
            ->leftJoin('modules as m2', 'm1.parent', '=', 'm2.id')
            ->select('m1.*', 'm2.name as parentname')->get();
        return response()->json(['data' => $module], 200);
    }

    public function editNavigation($id)
    {
        $module = Module::findOrFail($id);
        return response()->json($module, 200);
    }

    public function deleteNavigation($id)
    {
        $module = Module::findOrFail($id);

        $delete = DB::DELETE("DELETE FROM `privileges` WHERE `moduleid` = $id;");
        $module->delete();

        return response()->json([
            'msg' => 'Navigation deleted',
            'success' => true
        ], 200);
    }

//    start workgroup method

    public function workgroupIndex()
    {
        return view('admin.module.workgroup');
    }

    public function allWorkgroup()
    {
        $workGroup = DB::table('work_groups as w1')
            ->leftJoin('work_groups as w2', 'w1.parent', '=', 'w2.id')
            ->select('w1.*', 'w2.name as parentname')->get();
        return response()->json(['data' => $workGroup], 200);
    }

    public function addWorkgroup(Request $request)
    {
        $workid = $request->hiddenWorkgroupId;

        if ($workid == 0) {
            $work = WorkGroup::create([
                'name' => $request->name,
                'description' => $request->description,
                'parent' => $request->workgroupparent,
            ]);

            return response()->json([
                'msg' => 'Workgroup stored successfully',
                'user' => $work,
                'success' => true,
            ], 200);
        } else {
            $work = WorkGroup::findOrFail($workid);
            $work->name = $request->name;
            $work->description = $request->description;
            $work->parent = $request->workgroupparent;
            $work->update();

            return response()->json([
                'msg' => 'Workgroup updated successfully',
                'user' => $work,
                'success' => true,
            ], 200);
        }
    }

    public function getParent()
    {
        $parent = WorkGroup::where('parent', null)->get();

        return response()->json($parent, 200);
    }

    public function editWorkgroup($id)
    {
        $work = WorkGroup::findOrFail($id);
        return response()->json($work, 200);
    }

    public function deleteWorkgroup($id)
    {
        $work = WorkGroup::findOrFail($id);
        $work->delete();
        return response()->json([
            'msg' => 'Workgroup deleted',
            'success' => true
        ], 200);
    }

    // user work group method start
    public function userGroupIndex()
    {
        return view('admin.module.user-workgroup');
    }

    public function allUserWorkgroup()
    {
        $userworkGroup = DB::table('user_work_groups as w1')
            ->leftJoin('work_groups as w2', 'w1.workgroupid', '=', 'w2.id')
            ->leftJoin('users as u', 'w1.userid', '=', 'u.id')
            ->select('w1.*', 'w2.name as workgroupname', 'u.first_name as username')->get();
        return response()->json(['data' => $userworkGroup], 200);
    }

    public function getAllUser()
    {
        $user = User::where('is_email_verified', 1)->where('id', '!=', 1)->get();
        return response()->json($user, 200);
    }

    public function allWorkgroupData()
    {
        $work = WorkGroup::get();
        return response()->json($work, 200);
    }

    public function addUserWorkgroup(Request $request)
    {
        $workid = $request->hiddenUsergroupId;
        if ($request->issupervisor == 'on') {
            $issupervisor = 1;
        } else {
            $issupervisor = 0;
        }
        if ($workid == 0) {
            $work = UserWorkGroup::create([
                'userid' => $request->userid,
                'workgroupid' => $request->workgroupid,
                'issupervisor' => $issupervisor,
            ]);

            return response()->json([
                'msg' => 'User workgroup stored successfully',
                'user' => $work,
                'success' => true,
            ], 200);
        } else {
            $work = UserWorkGroup::findOrFail($workid);
            $work->userid = $request->userid;
            $work->workgroupid = $request->workgroupid;
            $work->issupervisor = $issupervisor;
            $work->update();

            return response()->json([
                'msg' => 'User workgroup updated successfully',
                'user' => $work,
                'success' => true,
            ], 200);
        }
    }

    public function editUserWorkgroup($id)
    {
        $work = UserWorkGroup::findOrFail($id);
        return response()->json($work, 200);
    }

    public function deleteUserWorkgroup($id)
    {
        $work = UserWorkGroup::findOrFail($id);
        $work->delete();
        return response()->json([
            'msg' => 'User workgroup deleted',
            'success' => true
        ], 200);
    }

    // lookup method start
    public function lookupIndex()
    {
        return view('admin.module.lookup');
    }

    public function allLookup()
    {
        $lookup = DB::table('lookups as l1')
            ->leftJoin('lookups as l2', 'l1.parent', '=', 'l2.id')
            ->select('l1.*', 'l2.name as parentname')->get();
        return response()->json(['data' => $lookup], 200);
    }

    public function addLookup(Request $request)
    {
        $lookupid = $request->hiddenLookupId;

        if ($lookupid == 0) {
            $lookup = LookUp::create([
                'name' => $request->name,
                'description' => $request->description,
                'parent' => $request->lookupparent,
                'is_active' => 1,
            ]);

            return response()->json([
                'msg' => 'Lookup stored successfully',
                'user' => $lookup,
                'success' => true,
            ], 200);
        } else {
            $lookup = LookUp::findOrFail($lookupid);
            $lookup->name = $request->name;
            $lookup->description = $request->description;
            $lookup->parent = $request->lookupparent;
            $lookup->update();

            return response()->json([
                'msg' => 'Lookup updated successfully',
                'user' => $lookup,
                'success' => true,
            ], 200);
        }
    }

    public function getLookupParent()
    {
        $lookup = LookUp::where('parent', null)->get();

        return response()->json($lookup, 200);
    }

    public function editLookup($id)
    {
        $lookup = LookUp::findOrFail($id);
        return response()->json($lookup, 200);
    }

    public function deleteLookup($id)
    {
        $lookup = LookUp::findOrFail($id);
        $lookup->delete();
        return response()->json([
            'msg' => 'Lookup deleted',
            'success' => true
        ], 200);
    }

    public function allUserRequest()
    {
        $dashboard = DB::table('users as u')->select('u.*')
                    ->where('is_authorized','!=',1)
                    ->whereIn('u.role', array(3, 4))->get();
        return response()->json(['data' => $dashboard], 200);
    }

    public function getPaymentNotification()
    {
        $payment = DB::table('payment_history')
            ->join('users', 'payment_history.user_id', '=', 'users.id')
            ->select('payment_history.*', 'users.company')
            ->where('payment_history.admin_confirmation', '=', 0)
            ->get();
        return response()->json(['data' => $payment], 200);
    }

    public function showUserProfile($id)
    {
        return view('admin.user.show-user', compact('id'));
    }

    public function individualProfile($id)
    {

        $profile = DB::select("SELECT u.*,d1.doc_path as front_part,d2.doc_path as back_part from users as u
                                     LEFT JOIN docs as d1 ON u.id = d1.user_id and d1.doc_title ='NID FRONT PART'
                                     LEFT JOIN docs as d2 ON u.id = d2.user_id and d2.doc_title ='NID BACK PART'
                                     WHERE u.id = $id;");
        return response()->json(['data' => $profile], 200);
    }

    public function userAcceptFn($id)
    {
        $profile = User::findOrFail($id);

        $profile->is_authorized = 1;
        $profile->is_doc_rejected = 0;

        $currentDateTime = Carbon::now();
        $newDateTime = Carbon::now()->addDays(1);

        $reg = DB::table('registrations')->where('email', $profile->email)->first();

        if ($reg->request_type == 2) {
            $package = DB::select("SELECT * from user_packages where user_id = $id order by id desc limit 1;");
            $total = 0;
            $package_ref = '';
            foreach ($package as $val) {
                $total += $val->registration_amount;
                $total += $val->support_amount;
                $total += $val->billing_amount;

                $package_ref = $val->package_id;
            }

            $payment = DB::insert("INSERT INTO payment_history (user_id,package_ref,amount,payment_due_date)
                      VALUES($id,$package_ref,$total,'$newDateTime');");
        }

        $reject = DB::update("UPDATE `docs` SET `is_rejected` = 0 WHERE user_id = $id;");

        if ($profile->update()) {
            return response()->json([
                'msg' => 'User data accepted',
                'user' => $profile,
                'success' => true,
            ], 200);
        }
    }

    public function userRejectFn(Request $request)
    {
        $userid = $request->hiddenCustomerId;

        $profile = User::findOrFail($userid);

        $profile->is_authorized = 0;
        $profile->is_doc_rejected = 1;
        $profile->update();

        $reject = DB::update("UPDATE `docs` SET `admin_comments`='$request->admin_comments', `is_rejected` = 1 WHERE user_id = $userid;");

        if ($reject) {
            return response()->json([
                'msg' => 'User data rejected',
                'success' => true,
            ], 200);
        }

    }

    //    dashboard pending list
    public function posDashboardInfo($userid)
    {
//        $pending = DB::table('lookups')
//            ->leftJoin('users', 'lookups.id', '=', 'users.registration_status')
//            ->select('lookups.*', DB::raw("(SELECT registration_status from users where id =$userid limit 1) as registration_status"))
//            ->where('lookups.parent', 1)->get();
        $userInfo = DB::table('users')->select('users.registration_status')->where('id', $userid)->first();
        return response()->json([
            'success' => true,
//            'pending' => $pending,
            'userinfo' => $userInfo,
        ], 200);
    }

    //    dashboard complete list
    public function posCompletePayment($userid)
    {

        $complete = DB::select("SELECT * from payment_history where user_id = $userid order by id desc limit 1;");

        return response()->json([
            'success' => true,
            'data' => $complete,
        ], 200);
    }

    //    partner dashboard count user
    public function countUsers($userid)
    {
        $active = DB::table('users')
            ->where([
                'partner_ref' => $userid,
                'is_doc_rejected' => 0,
            ])->count();
        $suspend = DB::table('users')
            ->where([
                'partner_ref' => $userid,
                'is_doc_rejected' => 1,
            ])->count();

        return response()->json(
            ['msg' => 'Data found', 'activeUser' => $active, 'suspendUser' => $suspend]
        );
    }

    // PRIVILEGE PAGE START
    public function privilegeIndex()
    {
        return view('admin.module.privilege');
    }

    public function showPrivilegeData(Request $request)
    {
//        dd($roleid);
        $roleid = $request->roleid;
        $privilege = DB::select("SELECT m.`id`, m.`name`,  m.`url`,
    	(SELECT COUNT(p.roleid) FROM `privileges` p WHERE p.`moduleid` = m.`id` AND p.`roleid` = $roleid) `access`,
    	(SELECT id FROM `roles`  WHERE `id` = $roleid) `roleid`,
    	(SELECT `name` FROM `roles`  WHERE `id` = $roleid) `rolename`
        FROM `modules` m;");
        return response()->json(['data' => $privilege], 200);
    }

    public function updatePrivilegeData(Request $request)
    {
        $roleid = $request->roleid;
        $moduleid = $request->moduleid;
        $action = $request->action;

        if ($action == 0) {
            $delete = DB::DELETE("DELETE FROM `privileges` WHERE `roleid` = $roleid AND `moduleid` = $moduleid;");
            return response()->json([
                'msg' => 'Updated',
                'success' => true
            ], 200);
        } elseif ($action == 1) {
            $insert = DB::INSERT("INSERT INTO `privileges`(`roleid`, `moduleid`) VALUES($roleid, $moduleid);");
            return response()->json([
                'msg' => 'Updated',
                'success' => true
            ], 200);
        }
    }

//    payment method and confirmation update by pos owner
    public function updatePaymentMethod(Request $request)
    {
        $payment = DB::table('payment_history')
            ->where('user_id', $request->userid)
            ->where('payment_date', '=', null)
            ->orderBy('id', 'DESC')->first();

        $date = Carbon::now()->format('Y-m-d h:i:s');
        if ($payment != null) {
            $createName = Carbon::now()->format('his') + rand(1000, 9999);
            if ($image = $request->file('paymentProve')) {
                $extention = $request->file('paymentProve')->getClientOriginalExtension();
                $imageName = $createName . '.' . $extention;
                $path = public_path('documents/paymentProof/pos');
                $image->move($path, $imageName);

                if (file_exists('documents/paymentProof/pos/' . $payment->ref_image) and !empty($payment->ref_image)) {
                    unlink('documents/paymentProof/pos/' . $payment->ref_image);
                }
                if ($payment != null) {
                    $update = DB::update("UPDATE `payment_history` SET `ref_image`='$imageName',`payment_method`='$request->paymentMethod',`payment_date`='$date' WHERE id = $payment->id;");
                }
            }

            return response()->json(['payment' => $update, 'msg' => 'Payment Update successfully', 'success' => true]);
        } else {
            return response()->json(['msg' => 'Already submit your payment', 'success' => false]);
        }
    }

    public function updatePaymentConfirmation($id)
    {
        $confirm = DB::update("UPDATE payment_history SET `admin_confirmation` = 1 WHERE id = $id;");
        if ($confirm) {
            return response()->json(['msg' => 'Payment Confirmation Complete', 'success' => true]);
        }
    }

    public function getPaymentSlip($id)
    {
        $slip = DB::select("SELECT ref_image from payment_history where id = $id;");

        return response()->json($slip);
    }
}
