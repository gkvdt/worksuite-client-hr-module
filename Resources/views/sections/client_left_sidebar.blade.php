<li><a href="{{ route('client.employees.index') }}" class="waves-effect
        {{ request()->is('client/employee*') ? 'active' : '' }}
        "><i class="ti-user fa-fw"></i> <span class="hide-menu"> @lang('app.menu.hr') <span class="fa arrow"></span>
        </span></a>
    <ul class="nav nav-second-level {{ request()->is('admin/leave*') ? 'collapse in' : '' }}">
            <li><a href="{{ route('client.employees.index') }}">@lang('app.menu.employeeList')</a></li>
            <li><a href="{{ route('client.teams.index') }}">@lang('app.department')</a></li>
            <li><a href="{{ route('client.designations.index') }}">@lang('app.menu.designation')</a></li>
            <li><a href="{{ route('client.attendances.summary') }}"
                    class="waves-effect">@lang('app.menu.attendance')</a> </li>
            <li><a href="{{ route('client.holidays.index') }}" class="waves-effect">@lang('app.menu.holiday')</a>
            </li>
            <li><a href="{{ route('client.leaves.pending') }}"
                    class="waves-effect  {{ request()->is('client/leave*') ? 'active' : '' }}">@lang('app.menu.leaves')</a>
            </li>
    </ul>
</li>
