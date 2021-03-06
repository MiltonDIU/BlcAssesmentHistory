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
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                        @can('audit_log_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                    <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.auditLog.title') }}
                                </a>
                            </li>
                        @endcan
                </ul>
            </li>
        @endcan

        @can('faculty_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.faculties.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faculties") || request()->is("admin/faculties/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.faculty.title') }}
                </a>
            </li>
        @endcan
        @can('department_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.departments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.department.title') }}
                </a>
            </li>
        @endcan
        @can('program_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.programs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/programs") || request()->is("admin/programs/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.program.title') }}
                </a>
            </li>
        @endcan
        @can('profile_edit')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("profile.my-profile.edit") }}" class="c-sidebar-nav-link {{ request()->is("profile/my-profile") || request()->is("profile/my-profile/*") ? "c-active" : "" }}">
                    <i class="far fa-id-card c-sidebar-nav-icon">

                    </i>
                    {{ trans('global.my_profile') }}
                </a>
            </li>
        @endcan
        @if(Gate::check('setting_access'))
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.settings.edit") }}" class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-wrench c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.setting.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endif

        @can('semester_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.semesters.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/semesters") || request()->is("admin/semesters/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.semester.title') }}
                </a>
            </li>
        @endcan

        @can('exam_type_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.exam-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/exam-types") || request()->is("admin/exam-types/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.examType.title') }}
                </a>
            </li>
        @endcan

        @can('assessment_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.assessments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/assessments") || request()->is("admin/assessments/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.assessment.title') }}
                </a>
            </li>
        @endcan
           @can('assessment_my_course')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.assessments.course-list") }}" class="c-sidebar-nav-link {{ request()->is("admin/assessments") || request()->is("admin/assessments/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                   Teacher Course List Semester Wise
                </a>
            </li>
        @endcan
        @can('assessment_list_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.assessment-lists.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/assessment-lists") || request()->is("admin/assessment-lists/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.assessmentList.title') }}
                </a>
            </li>
        @endcan
    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
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
