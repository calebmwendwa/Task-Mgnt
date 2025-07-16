
<div class="topbar no-print">
    <div class="mobile-logo">
        <img src="{{ asset('img/pictures/logo.jpg') }}" alt="logo" width="140px">
    </div>
    <button id="menu-btn" style="display: none;">
        Menu
    </button>


    <div class="welcome-message">

    </div>


    <div class="top-right">

        <div class="options">

            <button class="item notification__icon__wrapper load_notifications" onclick="notificationOpen()" id="show_unread_notifications">
                <img src="{{ asset('img/icons/notification.svg') }}" alt="">
                <div class="notification__count"></div>
            </button>

            <button class="item" onclick="toggleMenu()">
                <img src="{{ asset('img/icons/user-profile.png') }}" alt="" width="35px">
            </button>

            <button class="item display-mobile-only" id="menuBtn">
                <img src="{{ asset('img/icons/menu-flex.svg') }}" alt="">
            </button>


        </div>

        <!-- Sub Menu -->
        <div class="topbar-sub-menu-wrap" id="subMenu">
            <div class="topbar-sub-menu">
{{--                <a href="#" class="sub-menu-link">--}}
{{--                    <img src="{{ asset('img/icons/profile-icon.svg') }}" alt="">--}}
{{--                    <span>@lang('lang_v1.profile')</span>--}}
{{--                </a>--}}

                <a href="{{ route('logout') }}" class="sub-menu-link">
                    <img src="{{ asset('img/icons/log-out-04.svg') }}" alt="" width="14px">
                    <span>@lang('Sign Out')</span>
                </a>

            </div>
        </div>
        <!-- End of Submenu -->

        {{--        @include('layouts.partials.header-notifications')--}}

    </div>

</div>
