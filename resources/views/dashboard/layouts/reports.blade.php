@havePermission('read-hrs', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="typcn typcn-coffee"></i> <span>
            {{getReportValue(App\Enum\ReportEnum::getHR()) }} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.hrs.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-hrs', 'web')
            <li><a href="{{ route('dashboard.hrs.create') }}">{{ __('site.add') }}  {{getReportValue(App\Enum\ReportEnum::getHR()) }} </a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-polarizations', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cancel"></i> <span>
        {{getReportValue(App\Enum\ReportEnum::getPolarization()) }} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.polarizations.index') }}">{{ __('site.index') }}</a>
        </li>
        @havePermission('create-polarizations', 'web')
            <li><a href="{{ route('dashboard.polarizations.create') }}">{{ __('site.add') }}
                {{getReportValue(App\Enum\ReportEnum::getPolarization()) }}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-its', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-turtle"></i> <span>
        {{getReportValue(App\Enum\ReportEnum::getIT()) }} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.its.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-its', 'web')
            <li><a href="{{ route('dashboard.its.create') }}">{{ __('site.add') }}
                {{getReportValue(App\Enum\ReportEnum::getIT()) }}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-legals', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-postage-stamp"></i> <span>
        {{getReportValue(App\Enum\ReportEnum::getLegal()) }} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.legals.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-legals', 'web')
            <li><a href="{{ route('dashboard.legals.create') }}">{{ __('site.add') }}
                {{getReportValue(App\Enum\ReportEnum::getLegal()) }}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-marketingmanagements', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-file-search-outline"></i> <span>
        {{getReportValue(App\Enum\ReportEnum::getMarketingManagement()) }}</span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.marketingmanagements.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-marketingmanagements', 'web')
            <li><a href="{{ route('dashboard.marketingmanagements.create') }}">{{ __('site.add') }}
                {{getReportValue(App\Enum\ReportEnum::getMarketingManagement()) }}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-sites', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-arrow-up-outline"></i> <span>
           {{getReportValue(App\Enum\ReportEnum::getSite()) }} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.sites.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-sites', 'web')
            <li><a href="{{ route('dashboard.sites.create') }}">{{ __('site.add') }}
                   {{getReportValue(App\Enum\ReportEnum::getSite()) }}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-finances', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-code-equal"></i> <span>
            {{getReportValue(App\Enum\ReportEnum::getFinance()) }} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.finances.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-finances', 'web')
            <li><a href="{{ route('dashboard.finances.create') }}">{{ __('site.add') }}
                    {{getReportValue(App\Enum\ReportEnum::getFinance()) }}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-marketings', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-database"></i> <span>
            {{getReportValue(App\Enum\ReportEnum::getMarketing()) }} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.marketings.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-marketings', 'web')
            <li><a href="{{ route('dashboard.marketings.create') }}">{{ __('site.add') }}
                    {{getReportValue(App\Enum\ReportEnum::getMarketing()) }}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-operatingmanagements', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-monitor"></i> <span>
              {{getReportValue(App\Enum\ReportEnum::getOperatingMarketing()) }} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.operatingmanagements.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-operatingmanagements', 'web')
            <li><a href="{{ route('dashboard.operatingmanagements.create') }}">{{ __('site.add') }}
                      {{getReportValue(App\Enum\ReportEnum::getOperatingMarketing()) }}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-investments', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-monitor"></i> <span>
              {{getReportValue(App\Enum\ReportEnum::getInvestment()) }} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.investments.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-investments', 'web')
            <li><a href="{{ route('dashboard.investments.create') }}">{{ __('site.add') }}
                      {{getReportValue(App\Enum\ReportEnum::getInvestment()) }}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission