<nav class="side-nav">
    <ul>
        @if(Auth::check())
        <?php
        // $mperm = App\Models\perm;
        $user = Auth::user();
        $perm = App\Models\perm::where('role_id', $user->role_id)->where('name', "role")->first();
        $permuser = App\Models\perm::where('role_id', $user->role_id)->where('name', "user")->first();
        $permdept = App\Models\perm::where('role_id', $user->role_id)->where('name', "dept")->first();
        $permdesig = App\Models\perm::where('role_id', $user->role_id)->where('name', "desig")->first();
        $permveh = App\Models\perm::where('role_id', $user->role_id)->where('name', "vehicle")->first();
        ?>
        @endif



        <li >
            <a href="{{route('home')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="user-check"></i> </div>
                <div class="side-menu__title">
                    Administrator
                </div>
            </a>
        </li>
        @if ($perm->view == 1 || $perm->create == 1)
        <li>
            <a href="javascript:;" class="side-menu">
                &nbsp; &nbsp;&nbsp; &nbsp;
                <div class="side-menu__icon"> <i data-lucide="trello"></i> </div>
                <div class="side-menu__title">
                    Roles
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                @if ($perm->view == 1)
                <li>
                    <a href="{{route('role.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                        <div class="side-menu__title">View Roles </div>
                    </a>
                </li>
                @endif
                @if ($perm->create == 1)
                <li>
                    <a href="{{route('role.create')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="side-menu__title"> Add Role </div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        @if ($permuser->view == 1 ||  $permuser->create == 1)
        <li>
            <a href="javascript:;" class="side-menu">
                &nbsp; &nbsp;&nbsp; &nbsp;
                <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                <div class="side-menu__title">
                    Users
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                @if ($permuser->view == 1)
                <li>
                    <a href="{{route('user.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                        <div class="side-menu__title"> View User </div>
                    </a>
                </li>
                @endif
                @if ($permuser->create == 1)
                <li>
                    <a href="{{route('user.create')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="side-menu__title"> Add User </div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        @if ($permdept->view == 1 )
        <li>
            <a href="javascript:;" class="side-menu">
                &nbsp; &nbsp;&nbsp; &nbsp;
                <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                <div class="side-menu__title">
                    Department
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                @if ($permdept->view == 1)
                <li>
                    <a href="{{route('dept.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                        <div class="side-menu__title"> View Department </div>
                    </a>
                </li>
                @endif
                @if ($permdept->create == 1)
                <li>
                    <a href="{{route('dept.create')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="side-menu__title"> Add Department </div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        @if ($permdesig->view == 1 )
        <li>
            <a href="javascript:;" class="side-menu">
                &nbsp; &nbsp;&nbsp; &nbsp;
                <div class="side-menu__icon"> <i data-lucide="pocket"></i> </div>
                <div class="side-menu__title">
                    Designation
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                @if ($permdesig->view == 1)
                <li>
                    <a href="{{route('desig.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                        <div class="side-menu__title"> View Designation </div>
                    </a>
                </li>
                @endif
                @if ($permdesig->create == 1)
                <li>
                    <a href="{{route('desig.create')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="side-menu__title"> Add Designation </div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        @if ($permveh->view == 1 )
        <li>
            <a href="javascript:;" class="side-menu">
                &nbsp; &nbsp;&nbsp; &nbsp;
                <div class="side-menu__icon"> <i data-lucide="key"></i> </div>
                <div class="side-menu__title">
                    Vehicle
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                @if ($permveh->view == 1)
                <li>
                    <a href="{{route('vehicle.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                        <div class="side-menu__title"> View Vehicles </div>
                    </a>
                </li>
                @endif
                @if ($permveh->create == 1)
                <li>
                    <a href="{{route('vehicle.create')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="side-menu__title"> Add Vehicle </div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif

    </ul>
</nav>
