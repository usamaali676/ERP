@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Leave Detail
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">

            <div id="input" class="p-5">
                <div class="preview">
                    <b>User:</b> &nbsp;{{$leave->user->name}}
                    <br>
                    <br>
                    <b>Date:</b> &nbsp;{{$leave->date}}
                    <br>
                    <br>
                    <b>Leave Duration:</b> &nbsp;{{$leave->duration}}
                    <br>
                    <br>
                    <b>Status:</b> &nbsp;@if ($leave->status == 0)
                    Pending
                    @else
                    Approve
                    @endif
                    <br>
                    <br>
                    <b>Reason:</b> &nbsp;{{$leave->reason}}
                </div>
            </div>
            <!-- END: Input -->
        </div>
        <!-- END: Content -->
    @endsection
