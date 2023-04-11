@havePermission('read-employments', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-square-inc-cash"></i>
        <span> {{getEmployeeServiceValue(App\Enum\EmployeeService::getEmployment())}}</span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.employments.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-employments', 'web')
            <li><a
                    href="{{ route('dashboard.employments.create') }}">{{ __('site.add') }} {{getEmployeeServiceValue(App\Enum\EmployeeService::getEmployment())}}</a>
            </li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-advances', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cash-multiple"></i> <span>
        {{getEmployeeServiceValue(App\Enum\EmployeeService::getAdvance())}} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.advances.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-advances', 'web')
            <li><a href="{{ route('dashboard.advances.create') }}">{{ __('site.add') }}   {{getEmployeeServiceValue(App\Enum\EmployeeService::getAdvance())}}</a>
            </li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-vacations', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-airplane-takeoff"></i>
        <span>   {{getEmployeeServiceValue(App\Enum\EmployeeService::getVacation())}} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.vacations.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-vacations', 'web')
            <li><a href="{{ route('dashboard.vacations.create') }}">{{ __('site.add') }} {{getEmployeeServiceValue(App\Enum\EmployeeService::getVacation())}}</a>
            </li>
        @endhavePermission
    </ul>
</li>
@endhavePermission

@havePermission('read-revisions', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-ios-book"></i> <span>
        {{getEmployeeServiceValue(App\Enum\EmployeeService::gettRevision())}} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.revisions.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-revisions', 'web')
            <li><a href="{{ route('dashboard.revisions.create') }}">{{ __('site.add') }} {{getEmployeeServiceValue(App\Enum\EmployeeService::gettRevision())}}</a>
            </li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-transfers', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="fab fa-fly"></i> <span>
        {{getEmployeeServiceValue(App\Enum\EmployeeService::getTransfer())}}</span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.transfers.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-transfers', 'web')
            <li><a href="{{ route('dashboard.transfers.create') }}">{{ __('site.add') }} {{getEmployeeServiceValue(App\Enum\EmployeeService::getTransfer())}}</a>
            </li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-complaints', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-message-draw"></i>
        <span> {{getEmployeeServiceValue(App\Enum\EmployeeService::getComplaint())}} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.complaints.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-complaints', 'web')
            <li><a
                    href="{{ route('dashboard.complaints.create') }}">{{ __('site.add') }} {{getEmployeeServiceValue(App\Enum\EmployeeService::getComplaint())}} </a>
            </li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-treatments', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-hospital"></i> <span>
        {{getEmployeeServiceValue(App\Enum\EmployeeService::getTreatment())}} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.treatments.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-treatments', 'web')
            <li><a
                    href="{{ route('dashboard.treatments.create') }}">{{ __('site.add') }}  {{getEmployeeServiceValue(App\Enum\EmployeeService::getTreatment())}}</a>
            </li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-resignations', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cancel"></i> <span>
        {{getEmployeeServiceValue(App\Enum\EmployeeService::getResignation())}}  </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.resignations.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-resignations', 'web')
            <li><a
                    href="{{ route('dashboard.resignations.create') }}">{{ __('site.add') }}  {{getEmployeeServiceValue(App\Enum\EmployeeService::getResignation())}} </a>
            </li>
        @endhavePermission
    </ul>
</li>
@endhavePermission

@havePermission('read-suggestions', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-keyboard"></i> <span>
        {{getEmployeeServiceValue(App\Enum\EmployeeService::getSuggestion())}}  </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.suggestions.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-suggestions', 'web')
            <li><a
                    href="{{ route('dashboard.suggestions.create') }}">{{ __('site.add') }} {{getEmployeeServiceValue(App\Enum\EmployeeService::getSuggestion())}} </a>
            </li>
        @endhavePermission
    </ul>
</li>
@endhavePermission