@havePermission('read-governates', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="fab fa-servicestack"></i> <span>
        {{getCustomerServiceValue(App\Enum\ServiceEnum::getgovernateHead())}} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.governates.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-governates', 'web')
            <li><a
                    href="{{ route('dashboard.governates.create') }}">{{ __('site.add') }} {{getCustomerServiceValue(App\Enum\ServiceEnum::getgovernateHead())}}</a>
            </li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-researchmarketings', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cancel"></i> <span>
        {{getCustomerServiceValue(App\Enum\ServiceEnum::getresearchmarketingHead())}} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a
                href="{{ route('dashboard.researchmarketings.index') }}">{{ __('site.index') }}</a>
        </li>
        @havePermission('create-researchmarketings', 'web')
            <li><a href="{{ route('dashboard.researchmarketings.create') }}">{{ __('site.add') }}
                {{getCustomerServiceValue(App\Enum\ServiceEnum::getresearchmarketingHead())}}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-equipment', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-screwdriver"></i> <span>
        {{getCustomerServiceValue(App\Enum\ServiceEnum::getequipmentHead())}}  </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.equipment.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-equipment', 'web')
            <li><a
                    href="{{ route('dashboard.equipment.create') }}">{{ __('site.add') }}  {{getCustomerServiceValue(App\Enum\ServiceEnum::getequipmentHead())}} </a>
            </li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-civils', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="far fa-building"></i> <span>
        {{getCustomerServiceValue(App\Enum\ServiceEnum::getcivilHead())}} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.civils.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-civils', 'web')
            <li><a href="{{ route('dashboard.civils.create') }}">{{ __('site.add') }} {{getCustomerServiceValue(App\Enum\ServiceEnum::getcivilHead())}}</a>
            </li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-feasibilities', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-md-briefcase"></i>
        <span>  {{getCustomerServiceValue(App\Enum\ServiceEnum::getfeasibilityHead())}} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.feasibilities.index') }}">{{ __('site.index') }}</a>
        </li>
        @havePermission('create-feasibilities', 'web')
            <li><a
                    href="{{ route('dashboard.feasibilities.create') }}">{{ __('site.add') }}  {{getCustomerServiceValue(App\Enum\ServiceEnum::getfeasibilityHead())}}</a>
            </li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-industries', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-robot-industrial"></i>
        <span>{{getCustomerServiceValue(App\Enum\ServiceEnum::getindustryHead())}} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.industries.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-industries', 'web')
            <li><a
                    href="{{ route('dashboard.industries.create') }}">{{ __('site.add') }} {{getCustomerServiceValue(App\Enum\ServiceEnum::getindustryHead())}} </a>
            </li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-fundings', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-bank"></i> <span>
        {{getCustomerServiceValue(App\Enum\ServiceEnum::getfundingHead())}} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.fundings.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-fundings', 'web')
            <li><a href="{{ route('dashboard.fundings.create') }}">{{ __('site.add') }}  {{getCustomerServiceValue(App\Enum\ServiceEnum::getfundingHead())}} </a>
            </li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-raws', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-ship-wheel"></i> <span>
        {{getCustomerServiceValue(App\Enum\ServiceEnum::getrawHead())}}</span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.raws.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-raws', 'web')
            <li><a href="{{ route('dashboard.raws.create') }}">{{ __('site.add') }}   {{getCustomerServiceValue(App\Enum\ServiceEnum::getrawHead())}}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-fundingsells', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cancel"></i> <span>
        {{getCustomerServiceValue(App\Enum\ServiceEnum::getfundingsellHead())}}</span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.fundingsells.index') }}">{{ __('site.index') }}</a>
        </li>
        @havePermission('create-fundingsells', 'web')
            <li><a href="{{ route('dashboard.fundingsells.create') }}">{{ __('site.add') }}
                {{getCustomerServiceValue(App\Enum\ServiceEnum::getfundingsellHead())}}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-hroperatings', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cancel"></i> <span>
            {{getCustomerServiceValue(App\Enum\ServiceEnum::gethroperatingHead())}} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.hroperatings.index') }}">{{ __('site.index') }}</a>
        </li>
        @havePermission('create-hroperatings', 'web')
            <li><a href="{{ route('dashboard.hroperatings.create') }}">{{ __('site.add') }}
                    {{getCustomerServiceValue(App\Enum\ServiceEnum::gethroperatingHead())}}</a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-hrsupplies', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cancel"></i> <span>
           {{getCustomerServiceValue(App\Enum\ServiceEnum::gethr_supplyHead())}}  </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a href="{{ route('dashboard.hrsupplies.index') }}">{{ __('site.index') }}</a></li>
        @havePermission('create-hrsupplies', 'web')
            <li><a href="{{ route('dashboard.hrsupplies.create') }}">{{ __('site.add') }}
                   {{getCustomerServiceValue(App\Enum\ServiceEnum::gethr_supplyHead())}} </a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission
@havePermission('read-industrysupplies', 'web')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cancel"></i> <span>
        {{getCustomerServiceValue(App\Enum\ServiceEnum::getindustry_supplyHead())}} </span>
        <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled" style="display: none;">
        <li><a
                href="{{ route('dashboard.industrysupplies.index') }}">{{ __('site.index') }}</a>
        </li>
        @havePermission('create-industrysupplies', 'web')
            <li><a href="{{ route('dashboard.industrysupplies.create') }}">{{ __('site.add') }}
                {{getCustomerServiceValue(App\Enum\ServiceEnum::getindustry_supplyHead())}} </a></li>
        @endhavePermission
    </ul>
</li>
@endhavePermission