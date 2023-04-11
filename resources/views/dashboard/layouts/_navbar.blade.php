  <!-- Top Bar Start -->
  <div class="topbar">

    <div class="topbar-left	d-none d-lg-block">
        <div class="text-center">
      
        </div>
    </div>

    <nav class="navbar-custom">

         <!-- Search input -->
        <!-- <div class="search-wrap" id="search-wrap">-->
        <!--    <div class="search-bar">-->
        <!--        <input class="search-input" type="search" placeholder="Search" />-->
        <!--        <a href="#" class="close-search toggle-search" data-target="#search-wrap">-->
        <!--            <i class="mdi mdi-close-circle"></i>-->
        <!--        </a>-->
        <!--    </div>-->
        <!--</div>-->

        <ul class="list-inline float-right mb-0">
            <!--<li class="list-inline-item dropdown notification-list">-->
            <!--    <a class="nav-link waves-effect toggle-search" href="#"  data-target="#search-wrap">-->
            <!--        <i class="mdi mdi-magnify noti-icon"></i>-->
            <!--    </a>-->
            <!--</li>-->

            <!--<li class="list-inline-item dropdown notification-list">-->
            <!--    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"-->
            <!--    aria-haspopup="false" aria-expanded="false">-->
            <!--        <i class="mdi mdi-bell-outline noti-icon"></i>-->
            <!--        <span class="badge badge-danger badge-pill noti-icon-badge">3</span>-->
            <!--    </a>-->
            <!--    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg dropdown-menu-animated">-->
                    <!-- item-->
            <!--        <div class="dropdown-item noti-title">-->
            <!--            <h5>Notification (3)</h5>-->
            <!--        </div>-->

            <!--        <div class="slimscroll-noti">-->
                        <!-- item-->
            <!--            <a href="javascript:void(0);" class="dropdown-item notify-item active">-->
            <!--                <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>-->
            <!--                <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>-->
            <!--            </a>-->

                        <!-- item-->
            <!--            <a href="javascript:void(0);" class="dropdown-item notify-item">-->
            <!--                <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>-->
            <!--                <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>-->
            <!--            </a>-->

                        <!-- item-->
            <!--            <a href="javascript:void(0);" class="dropdown-item notify-item">-->
            <!--                <div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i></div>-->
            <!--                <p class="notify-details"><b>Your item is shipped</b><span class="text-muted">It is a long established fact that a reader will</span></p>-->
            <!--            </a>-->

                        <!-- item-->
            <!--            <a href="javascript:void(0);" class="dropdown-item notify-item">-->
            <!--                <div class="notify-icon bg-success"><i class="mdi mdi-message-text-outline"></i></div>-->
            <!--                <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>-->
            <!--            </a>-->

                        <!-- item-->
            <!--            <a href="javascript:void(0);" class="dropdown-item notify-item">-->
            <!--                <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>-->
            <!--                <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>-->
            <!--            </a>-->

            <!--        </div>-->
                    

                    <!-- All-->
            <!--        <a href="javascript:void(0);" class="dropdown-item notify-all">-->
            <!--            View All-->
            <!--        </a>-->

            <!--    </div>-->
            <!--</li>-->

         
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                    <i class="fas fa-angle-double-down"></i>
                </a>
           
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg dropdown-menu-animated">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>{{__('site.lang')}}</h5>
                    </div>

                    <div class="slimscroll-noti">
                        <!-- item-->
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" hreflang="{{ $localeCode }}" class="dropdown-item notify-item ">
                            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                            <p class="notify-details"><b>{{ $properties['native'] }}</b></p>
                        </a>
                        @endforeach


                       

                    </div>
                    

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item notify-all">
                        View All
                    </a>

                </div>
            </li>
            
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                    <img src="{{auth()->user()->image_path}}" width="45" height="45" alt="user" class="rounded-circle">
                    <span class="d-none d-md-inline-block ml-1"> <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                
                   
                 
                 
                    
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                    <form style="display: inline-block" action="{{route('dashboard.users.editProfile', auth()->user()->id)}}" method="POST">
                        {{ method_field('Get') }}
                        @csrf
                        <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ auth()->user()->id }}">
                    <button class="dropdown-item" href="{{route('dashboard.users.editProfile',auth()->user()->id)}}" type="submit"><i class="dripicons-user text-muted"></i> Profile</button>

                    </form>
                      @if(auth()->check())
                        <form id="logout-form" action="{{ route('logout','web') }}" method="POST" style="display: none;">
                      @endif        
                            @csrf
                        </form>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="dripicons-exit text-muted"></i> {{__('site.logout')}}</a>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>

        </ul>


    </nav>

</div>
<!-- Top Bar End -->
