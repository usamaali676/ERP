@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Edit Role
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">

            <div id="input" class="p-5">
                <div class="preview">
                    <form action="{{route('role.update',$role->id)}}" method="POST">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Name</label>
                            <input id="regular-form-3" name="role_name" type="text" class="form-control" placeholder="Role Name" value="{{$role->name}}">
                            <div class="form-help">Role Name Must be Unique</div>
                        </div>
                        <div class="mt-3">
                            <P>Permissions</P>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Role</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="role_create">
                                    <input id="checkbox-switch-1" class="form-check-input" type="checkbox" value="1" name="role_create" @if (isset($perm_role) && $perm_role->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-1">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="role_view">
                                    <input id="checkbox-switch-2" class="form-check-input" type="checkbox" value="1" name="role_view" @if (isset($perm_role) && $perm_role->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-2">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="role_edit">
                                    <input id="checkbox-switch-3" class="form-check-input" type="checkbox" value="1" name="role_edit" @if (isset($perm_role) && $perm_role->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-3">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="role_update">
                                    <input id="checkbox-switch-4" class="form-check-input" type="checkbox" value="1" name="role_update" @if (isset($perm_role) && $perm_role->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-4">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="role_delete">
                                    <input id="checkbox-switch-5" class="form-check-input" type="checkbox" value="1" name="role_delete" @if (isset($perm_role) && $perm_role->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-5">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">User</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="user_create">
                                    <input id="checkbox-switch-6" class="form-check-input" type="checkbox" value="1" name="user_create" @if (isset($perm_user) && $perm_user->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-6">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="user_view">
                                    <input id="checkbox-switch-7" class="form-check-input" type="checkbox" value="1" name="user_view" @if ( isset($perm_user) && $perm_user->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-7">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="user_edit">
                                    <input id="checkbox-switch-8" class="form-check-input" type="checkbox" value="1" name="user_edit" @if ( isset($perm_user) && $perm_user->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-8">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="user_update">
                                    <input id="checkbox-switch-9" class="form-check-input" type="checkbox" value="1" name="user_update" @if (isset($perm_user) && $perm_user->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-9">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="user_delete">
                                    <input id="checkbox-switch-10" class="form-check-input" type="checkbox" value="1" name="user_delete" @if (isset($perm_user) && $perm_user->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-10">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Department</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="dept_create">
                                    <input id="checkbox-switch-11" class="form-check-input" type="checkbox" value="1" name="dept_create" @if (isset($perm_dept) && $perm_dept->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-11">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="dept_view">
                                    <input id="checkbox-switch-12" class="form-check-input" type="checkbox" value="1" name="dept_view" @if (isset($perm_dept) && $perm_dept->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-12">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="dept_edit">
                                    <input id="checkbox-switch-13" class="form-check-input" type="checkbox" value="1" name="dept_edit" @if (isset($perm_dept) && $perm_dept->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-13">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="dept_update">
                                    <input id="checkbox-switch-14" class="form-check-input" type="checkbox" value="1" name="dept_update" @if (isset($perm_dept) && $perm_dept->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-14">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="dept_delete">
                                    <input id="checkbox-switch-15" class="form-check-input" type="checkbox" value="1" name="dept_delete" @if (isset($perm_dept) && $perm_dept->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-15">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Designation</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="desig_create">
                                    <input id="checkbox-switch-21" class="form-check-input" type="checkbox" value="1" name="desig_create" @if (isset($perm_desig) && $perm_desig->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-21">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="desig_view">
                                    <input id="checkbox-switch-22" class="form-check-input" type="checkbox" value="1" name="desig_view" @if (isset($perm_desig) && $perm_desig->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-22">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="desig_edit">
                                    <input id="checkbox-switch-23" class="form-check-input" type="checkbox" value="1" name="desig_edit" @if (isset($perm_desig) && $perm_desig->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-23">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="desig_update">
                                    <input id="checkbox-switch-24" class="form-check-input" type="checkbox" value="1" name="desig_update" @if (isset($perm_desig) && $perm_desig->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-24">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="desig_delete">
                                    <input id="checkbox-switch-25" class="form-check-input" type="checkbox" value="1" name="desig_delete" @if (isset($perm_desig) && $perm_desig->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-25">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Vehicle</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="veh_create">
                                    <input id="checkbox-switch-21" class="form-check-input" type="checkbox" value="1" name="veh_create" @if (isset($perm_veh) && $perm_veh->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-21">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="veh_view">
                                    <input id="checkbox-switch-22" class="form-check-input" type="checkbox" value="1" name="veh_view" @if (isset($perm_veh) && $perm_veh->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-22">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="veh_edit">
                                    <input id="checkbox-switch-23" class="form-check-input" type="checkbox" value="1" name="veh_edit" @if (isset($perm_veh) && $perm_veh->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-23">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="veh_update">
                                    <input id="checkbox-switch-24" class="form-check-input" type="checkbox" value="1" name="veh_update" @if (isset($perm_veh) && $perm_veh->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-24">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="veh_delete">
                                    <input id="checkbox-switch-25" class="form-check-input" type="checkbox" value="1" name="veh_delete" @if (isset($perm_veh) && $perm_veh->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-25">Delete</label>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </form>
                </div>
            </div>
            <!-- END: Input -->
        </div>
        <!-- END: Content -->
    @endsection
