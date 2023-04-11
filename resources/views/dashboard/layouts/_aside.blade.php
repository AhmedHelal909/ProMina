    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
            <i class="mdi mdi-close"></i>
        </button>

        <div class="left-side-logo d-block d-lg-none">
            <div class="text-center">

                <a href="index.html" class="logo"><img src="{{ asset('assets/images/logo_dark.png') }}" height="20"
                        alt="logo"></a>
            </div>
        </div>

        <div class="sidebar-inner slimscrollleft">

            <div id="sidebar-menu">
                <ul>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-home"></i> <span>
                                {{ __('site.dashboard') }}
                            </span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled" style="display: none;">
                            <li><a href="{{ route('dashboard.home') }}">{{ __('site.index') }}</a></li>
                        </ul>
                    </li>
                    @havePermission('read-roles', 'web')
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-hourglass-half"></i> <span>
                                    {{ __('site.roles') }}
                                </span> <span class="menu-arrow float-right"><i
                                        class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="{{ route('dashboard.roles.index') }}">{{ __('site.index') }}</a></li>
                                @havePermission('create-roles', 'web')
                                    <li><a href="{{ route('dashboard.roles.create') }}">{{ __('site.role.add') }}</a></li>
                                @endhavePermission
                            </ul>
                        </li>
                    @endhavePermission
                    @havePermission('read-users', 'web')
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-users"></i> <span>
                                    {{ __('site.users') }} </span>
                                <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="{{ route('dashboard.users.index') }}">{{ __('site.index') }}</a></li>
                                @havePermission('create-users', 'web')
                                    <li><a href="{{ route('dashboard.users.create') }}">{{ __('site.user.add') }}</a></li>
                                @endhavePermission
                            </ul>
                        </li>
                    @endhavePermission
                    @havePermission('read-albums', 'web')
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-album"></i> <span>
                                    {{ __('site.albums') }} </span>
                                <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="{{ route('dashboard.albums.index') }}">{{ __('site.index') }}</a></li>
                                @havePermission('create-albums', 'web')
                                    <li><a href="{{ route('dashboard.albums.create') }}">{{ __('site.album.add') }}</a></li>
                                @endhavePermission
                            </ul>
                        </li>
                    @endhavePermission
                    @havePermission('read-pictures', 'web')
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="far fa-file-image"></i> <span>
                                    {{ __('site.pictures') }} </span>
                                <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="{{ route('dashboard.pictures.index') }}">{{ __('site.index') }}</a></li>
                                @havePermission('create-pictures', 'web')
                                    <li><a href="{{ route('dashboard.pictures.create') }}">{{ __('site.album.add') }}</a></li>
                                @endhavePermission
                            </ul>
                        </li>
                    @endhavePermission
          


                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- end sidebarinner -->
    </div>
    <!-- Left Sidebar End -->
