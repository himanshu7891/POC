<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    {{-- @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan --}}
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        {{-- manan-start --}}
        @can('team_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.team.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/team") || request()->is("admin/team/*") ? "c-active" : "" }}">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-people-group"></i>
                    Team
                </a>
            </li>
        @endcan
        @can('branch_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.branch.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/branch") || request()->is("admin/branch/*") ? "c-active" : "" }}">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-people-group"></i>
                    Branch
                </a>
            </li>
        @endcan
        @can('application_listing')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.application.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/application") ? "c-active" : "" }}">
                    <i class="c-sidebar-nav-icon fa-regular fa-note-sticky"></i>
                    Application
                </a>
            </li>
        @endcan
        @can('application_create')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/application*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-regular fa-note-sticky c-sidebar-nav-icon">

                    </i>
                    Application
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route("admin.application.create", [0,'application']) }}" class="c-sidebar-nav-link {{ request()->is("admin/application") || request()->is("admin/application/*") ? "c-active" : "" }}">
                            <i class="c-sidebar-nav-icon fa-sharp fa-solid fa-file-pen"></i>
                            Create
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        {{-- manan-end --}}
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>