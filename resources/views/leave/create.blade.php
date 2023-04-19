@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Add Leave
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">

            <div id="input" class="p-5">
                <div class="preview">
                    <form action="{{route('leave.store')}}" method="POST">
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
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class=" col-span-12 lg:col-span-6">
                                    <label for="vehicle-type">Select User</label>
                                    <select name="user_id" id="" data-placeholder="Select User" class="tom-select w-full mt-2" >
                                        <option>Please Select</option>
                                        @foreach ($user as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="intro-y col-span-12 lg:col-span-6">
                                    <label class="form-label">Date</label>
                                    <div class="relative w-100 ">
                                        <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                            <i data-lucide="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" name="date" class="datepicker form-control pl-12" data-single-mode="true">
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Reason</label>
                            <textarea name="reason" id="" class="form-control" ></textarea>
                        </div>
                        <div class="mt-3" id="ifYes" style="display: none;">
                            <label for="regular-form-3" class="form-label">You can select multiple dates.</label>
                            <div class="relative w-100 ">
                                <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                    <i data-lucide="calendar" class="w-4 h-4"></i>
                                </div>
                                <input type="text" name="leave_range" data-daterange="true" class="datepicker  form-control w-56 block " >
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="intro-y col-span-12 lg:col-span-6">
                                        <div class="form-group my-3">
                                            <label class="f-14 text-dark-grey mb-12 w-100" for="usr">Select Duration</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <div class="form-check-inline custom-control custom-radio mt-2 mr-3" onclick="javascript:yesnoCheck();">
                                                    <input type="radio" value="Full Day" class="custom-control-input" id="duration_single" name="duration"
                                                        checked="" autocomplete="off">
                                                    <label class="custom-control-label pt-1 cursor-pointer" for="duration_single">Full Day</label>
                                                </div>
                                                <div class="form-check-inline custom-control custom-radio mt-2 mr-3" onclick="javascript:yesnoCheck();">
                                                    <input type="radio" value="Multiple" class="custom-control-input"  id="duration_multiple" name="duration"
                                                        autocomplete="off">
                                                    <label class="custom-control-label pt-1 cursor-pointer" for="duration_multiple">Multiple</label>
                                                </div>

                                                <div class="form-check-inline custom-control custom-radio mt-2 mr-3" onclick="javascript:yesnoCheck();">
                                                    <input type="radio" value="First Half" class="custom-control-input" id="half_day_first" name="duration"
                                                        autocomplete="off">
                                                    <label class="custom-control-label pt-1 cursor-pointer" for="half_day_first">First Half</label>
                                                </div>
                                                <div class="form-check-inline custom-control custom-radio mt-2 mr-3" onclick="javascript:yesnoCheck();">
                                                    <input type="radio" value="Second Half" class="custom-control-input" id="half_day_second"
                                                        name="duration" autocomplete="off">
                                                    <label class="custom-control-label pt-1 cursor-pointer" for="half_day_second">Second Half</label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="intro-y col-span-12 lg:col-span-6">
                                    <label for="vehicle-type">Leave Status</label>
                                    <select name="status" id="" data-placeholder="Leave Status" class="tom-select w-full mt-2" style="z-index: 100">
                                        <option>Please Select</option>
                                        <option value="0">Pending</option>
                                        <option value="1">Approve</option>
                                    </select>
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
    <script>
        function yesnoCheck() {
            // alert("working");
    if (document.getElementById('duration_multiple').checked) {
        // alert("working");
        document.getElementById('ifYes').style.display = 'block';
    }
    else{
        // alert("working");
     document.getElementById('ifYes').style.display = 'none';
    }

    }
    </script>
