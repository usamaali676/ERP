@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Create User
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">

            <div id="input" class="p-5">
                <div class="preview">
                    <form action="{{ route('user.store') }}" method="POST">
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
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Name</label>
                                    <input id="regular-form-3" name="name" type="text" class="form-control"
                                        placeholder="User Name">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label>Role</label>
                                    <div class="mt-2">
                                        <select data-placeholder="Select Role" class="tom-select w-full" name="role_id">
                                            @foreach ($role as $item)
                                            <option>Please Select</option>
                                            @if ($item->id != 1)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label>Designation</label>
                                    <div class="mt-2">
                                        <select data-placeholder="Select Designation" class="tom-select w-full" name="desig_id">
                                            @foreach ($designation as $item)
                                            <option >Please Select</option>
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label>Department</label>
                                    <div class="mt-2">
                                        <select data-placeholder="Select Department" class="tom-select w-full" name="dept_id">
                                            @foreach ($department as $item)
                                            <option >Please Select</option>
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Father Name</label>
                                    <input id="regular-form-3" name="fatherName" type="text" class="form-control"
                                        placeholder="Father Name">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">CNIC Number</label>
                                    <input id="regular-form-3" name="cnic" type="text" class="form-control"
                                        placeholder="CNIC Number">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Phone</label>
                                    <input id="regular-form-3" name="phone" type="text" class="form-control"
                                        placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Officle Email</label>
                                    <input id="regular-form-3" name="offEmail" type="text" class="form-control"
                                        placeholder="Officle Email">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Personal Email</label>
                                    <input id="regular-form-3" name="perEmail" type="text" class="form-control"
                                        placeholder="Personal Email">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Current Address</label>
                                    <input id="regular-form-3" name="currAddress" type="text" class="form-control"
                                        placeholder="Current Address">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Permenent Address</label>
                                    <input id="regular-form-3" name="perAddress" type="text" class="form-control"
                                        placeholder="Permenent Address">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Vehicle</label>
                                    <select data-placeholder="Select Vehicle" class="tom-select w-full" name="vehicle_id">
                                        @foreach ($vehicle as $item)
                                        <option >Please Select</option>
                                        <option value="{{ $item->id }}">{{ $item->vehicle_number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Joining Date</label>
                                    <div class="relative w-100 ">
                                        <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                            <i data-lucide="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" name="joindate" class="datepicker form-control pl-12" data-single-mode="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Date of Birth</label>
                                    <div class="relative w-100 ">
                                        <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                            <i data-lucide="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" name="dob" class="datepicker form-control pl-12" data-single-mode="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Last Degree</label>
                                    <input id="regular-form-3" name="lastDegree" type="text" class="form-control"
                                        placeholder="Last Degree">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Running Degree</label>
                                    <input id="regular-form-3" name="currDegree" type="text" class="form-control"
                                        placeholder="Running Degree">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Emergency Contact Name</label>
                                    <input id="regular-form-3" name="emgContactName" type="text" class="form-control"
                                        placeholder="Emergency Contact Name">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Emergency Contact Number</label>
                                    <input id="regular-form-3" name="emgContactNumber" type="text" class="form-control"
                                        placeholder="Emergency Contact Number">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Emergency Contact Relation</label>
                                    <input id="regular-form-3" name="emgContactRelation" type="text" class="form-control"
                                        placeholder="Emergency Contact Relation">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                {{-- <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Emergency Contact Number</label>
                                    <input id="regular-form-3" name="emgContactNumber" type="text" class="form-control"
                                        placeholder="Emergency Contact Number">
                                </div> --}}
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Email</label>
                                    <input id="regular-form-3" name="email" type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Password</label>
                                    <input id="regular-form-3" name="password" type="Password" class="form-control"
                                        placeholder="Password" required>
                                </div>
                            </div>

                        </div>
                        {{-- <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">User is Agent</label>
                                    <div class="form-check mr-2">
                                        <input class="form-check-input" type="hidden" value="0" name="is_agent">
                                        <input id="checkbox-switch-16" class="form-check-input" type="checkbox" value="1" name="is_agent" >
                                        <label class="form-check-label" for="checkbox-switch-16">Agent</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">User is Closer</label>
                                    <div class="form-check mr-2">
                                        <input class="form-check-input" type="hidden" value="0" name="is_closer">
                                        <input id="checkbox-switch-17" class="form-check-input" type="checkbox" value="1" name="is_closer" >
                                        <label class="form-check-label" for="checkbox-switch-17">Closer</label>
                                    </div>
                                </div>
                            </div>

                        </div> --}}
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
            <!-- END: Input -->
        </div>
        <!-- END: Content -->
    @endsection
