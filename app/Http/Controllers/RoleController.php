<?php

namespace App\Http\Controllers;

// use App\Models\Permission;
// use App\Models\Role;

use App\Models\perm;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        $srno = 1;
        return view('role.index', compact('role', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|unique:roles,name,'
        ]);
       $role = Role::create(['name' => $request->role_name,]);
       perm::create([
            'name' =>  "role",
            'role_id' => $role->id,
            'create' => $request->role_create,
            'view' => $request->role_view,
            'edit' => $request->role_edit,
            'update' => $request->role_update,
            'delete' => $request->role_delete,
       ]);
       perm::create([
            'name' => "user",
            'role_id' => $role->id,
            'create' => $request->user_create,
            'view' => $request->user_view,
            'edit' => $request->user_edit,
            'update' => $request->user_update,
            'delete' => $request->user_delete,
       ]);
       perm::create([
            'name' => "dept",
            'role_id' => $role->id,
            'create' => $request->dept_create,
            'view' => $request->dept_view,
            'edit' => $request->dept_edit,
            'update' => $request->dept_update,
            'delete' => $request->dept_delete,
       ]);
       perm::create([
            'name' => "desig",
            'role_id' => $role->id,
            'create' => $request->desig_create,
            'view' => $request->desig_view,
            'edit' => $request->desig_edit,
            'update' => $request->desig_update,
            'delete' => $request->desig_delete,
       ]);
       perm::create([
            'name' => "vehicle",
            'role_id' => $role->id,
            'create' => $request->veh_create,
            'view' => $request->veh_view,
            'edit' => $request->veh_edit,
            'update' => $request->veh_update,
            'delete' => $request->veh_delete,
       ]);

        Alert::Success('Success' , "Role Added Successfully");
        return redirect()->route('role.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $permission =  $role->permissions;
        $perm = perm::all();
        return view('role.detail', compact('role', 'permission', 'perm'));
    }
    public function delete($id)
    {
        $role = Role::find($id);
        $permission =  $role->permissions;
        return view('role.delete', compact('role', 'permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $role = Role::find($id);
        if($role->id == 1){
            Alert::error('Error',"Role Not Can't be Edit");
            return redirect()->route('role.index');
        }
        $perm_role = perm::where('role_id', $role->id)->where('name', "role")->first();
        $perm_user = perm::where('role_id', $role->id)->where('name', "user")->first();
        $perm_dept = perm::where('role_id', $role->id)->where('name', "dept")->first();
        $perm_desig = perm::where('role_id', $role->id)->where('name', "desig")->first();
        $perm_veh = perm::where('role_id', $role->id)->where('name', "vehicle")->first();
        return view('role.edit', compact('role','perm_role','perm_user','perm_dept','perm_desig','perm_veh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'role_name' => 'unique:roles,name,'.$id,
        ]);

        $role = Role::where('id',$request->id)->first();
        $role->update([
            'name'=>$request->role_name,
        ]);
        $perm_role = perm::where('role_id', $role->id)->where('name', "role")->first();
        if($perm_role != null) {
            $perm_role->update([
                'create' => $request->role_create,
                'view' => $request->role_view,
                'edit' => $request->role_edit,
                'update' => $request->role_update,
                'delete' => $request->role_delete
            ]);
        }
        else
        {
            perm::create([
                'name' => "role",
                'role_id' => $role->id,
                'create' => $request->role_create,
                'view' => $request->role_view,
                'edit' => $request->role_edit,
                'update' => $request->role_update,
                'delete' => $request->role_delete
            ]);
        }
        $perm_user = perm::where('role_id', $role->id)->where('name', "user")->first();
        if($perm_user != null) {
            $perm_user->update([
                'create' => $request->user_create,
                'view' => $request->user_view,
                'edit' => $request->user_edit,
                'update' => $request->user_update,
                'delete' => $request->user_delete
            ]);
        }
        else
        {
            perm::create([
                'name' => "user",
                'role_id' => $role->id,
                'create' => $request->user_create,
                'view' => $request->user_view,
                'edit' => $request->user_edit,
                'update' => $request->user_update,
                'delete' => $request->user_delete
            ]);
        }


        $perm_dept = perm::where('role_id', $role->id)->where('name', "dept")->first();
        if($perm_dept != null) {
        $perm_dept->update([
            'create' => $request->dept_create,
            'view' => $request->dept_view,
            'edit' => $request->dept_edit,
            'update' => $request->dept_update,
            'delete' => $request->dept_delete
        ]);
    }
    else
    {
        perm::create([
            'name' => "dept",
            'role_id' => $role->id,
            'create' => $request->dept_create,
            'view' => $request->dept_view,
            'edit' => $request->dept_edit,
            'update' => $request->dept_update,
            'delete' => $request->dept_delete
        ]);
    }
        $perm_desig = perm::where('role_id', $role->id)->where('name', "desig")->first();
        if($perm_desig != null){
        $perm_desig->update([
            'create' => $request->desig_create,
            'view' => $request->desig_view,
            'edit' => $request->desig_edit,
            'update' => $request->desig_update,
            'delete' => $request->desig_delete,
        ]);
    }
    else
    {
        perm::create([
            'name' => "desig",
            'role_id' => $role->id,
            'create' => $request->desig_create,
            'view' => $request->desig_view,
            'edit' => $request->desig_edit,
            'update' => $request->desig_update,
            'delete' => $request->desig_delete,
        ]);
    }
        $perm_veh = perm::where('role_id', $role->id)->where('name', "vehicle")->first();
        if($perm_veh != null){
        $perm_veh->update([
            'create' => $request->veh_create,
            'view' => $request->veh_view,
            'edit' => $request->veh_edit,
            'update' => $request->veh_update,
            'delete' => $request->veh_delete,
        ]);
    }
    else
    {
        perm::create([
            'name' => "vehicle",
            'role_id' => $role->id,
            'create' => $request->veh_create,
            'view' => $request->veh_view,
            'edit' => $request->veh_edit,
            'update' => $request->veh_update,
            'delete' => $request->veh_delete,
        ]);
    }

        Alert::success('Success', 'Role Updated Successfully');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $deleteRole = Role::find($id);
        // $deleteRole->delete();
        // return redirect()->route('role.index');
        $userData = User::where('role_id',$deleteRole->id)->get();
        // dd($userData);
        if($userData->count()>0)
        {
            // dd(true);
            Alert::error('opps!', 'Please Delete child Object First ');
            return redirect()->route('role.index');
        }
        //dd($deleteRole);

        else {
            $role = Role::all();
            if ($role->count()==1) {
                Alert::error('Opps!','This Action Can not Perform! Minimun 1 Role Required');
                return redirect()->back();
            }
            else{
                    if($id == 1){
                        Alert::error('Opps', "You Can't Delete this Role");
                        return redirect()->route('role.index');
                    }
                    else {
                        $perm = perm::where('role_id', $id)->get();
                        foreach ($perm as $value) {
                            $value->delete();
                        }
                        Role::where('id',$id)->delete();
                        Alert::success('Success', 'Role Deleted Successfully');
                        return  redirect()->route('role.index');
                    }
                }
            }
    }
}
