<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    @if($user->profile->profile_image)
                    <img src="{{ asset('storage/images/') }}/{{$user->profile->profile_image}}" alt="{{$user->profile->profile_image}}" class="img-fluid">
                    @else
                    <img src="/admin-assets/assets/images/profile.jpg" alt="Placeholder Image" class="img-fluid">
                    @endif
                    <!-- <span class="login-status online"></span> -->
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">
                        {{ Illuminate\Support\Str::limit(explode(' ', $user->name)[0], 9, '..') }}
                    </span>
                    <span class="text-secondary text-small">{{$user->roles->first()->name}}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        @if(Auth::user()->hasRole('Superadmin') || Auth::user()->can('view_candidate_list') || Auth::user()->can('view_users_list') )
        <li class="nav-item">
            <a class="nav-link" href="/candidate">
                <span class="menu-title">Candidates</span>
                <i class="mdi mdi-account-card-details menu-icon"></i>
            </a>
        </li>
        @endif

        @hasrole('Superadmin')
        <li class="nav-item">
            <a class="nav-link" href="/insurer">
                <span class="menu-title">Insurer</span>
                <i class="mdi mdi-account-check menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/institute">
                <span class="menu-title">Institute</span>
                <i class="mdi mdi-airplay menu-icon"></i>
            </a>
        </li>
        
        @endhasrole
        @if(Auth::user()->hasRole('Superadmin') || Auth::user()->can('module-1')  )
        <!-- <li class="nav-item">
            <a class="nav-link" href="/module-1">
                <span class="menu-title">Module-1</span>
                <i class="mdi mdi-account-card-details menu-icon"></i>
            </a>
        </li> -->
        @endif

    </ul>
</nav>