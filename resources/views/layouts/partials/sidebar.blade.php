<aside class="no-print" >
    <div class="top">
        <!-- Business Name -->
        <div class="logo">
                <img src="{{ asset('img/pictures/logo.jpg') }}" alt="logo" width="80px" height="65px">
        </div>

        <button id="close-btn">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.4325 6.90405L6.4325 18.9041" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M6.4325 6.90405L18.4325 18.9041" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    <div class="sidebar">
        <div class="links">
            <a href="{{route('home')}}" class="{{ request()->segment(1) == 'home' ? 'active' : '' }}">
{{--                <img src="{{ asset('img/icons/dashboard.svg') }}" alt="">--}}
                <h3>@lang('Dashboard')</h3>
            </a>
        </div>

        <div class="links">

            <a href="{{ action([\App\Http\Controllers\ToDoController::class, 'index']) }}"
               class="{{ request()->segment(1) == 'tasks' ? 'active' : '' }}">
                <h3>{{ __('Tasks') }}</h3>
            </a>
        </div>
    </div>

</aside>
