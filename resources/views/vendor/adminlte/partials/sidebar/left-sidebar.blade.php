<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    <div class="sidebar sidebar-prime-dental-stack">
        <nav class="pt-2 sidebar-prime-dental-nav">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')
            </ul>
        </nav>

        @auth
            @php($logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout'))
            @if (config('adminlte.use_route_url', false))
                @php($logout_url = $logout_url ? route($logout_url) : '')
            @else
                @php($logout_url = $logout_url ? url($logout_url) : '')
            @endif

            <div class="sidebar-logout-dock">
                <div class="sidebar-user-line text-truncate">
                    <div class="sidebar-user-name">{{ 'Correo: ' . Auth::user()->email }}</div>
                    <div class="sidebar-user-role">{{ 'Rol: ' . Auth::user()->rol }}</div>
                </div>
                <form method="POST" action="{{ $logout_url }}" class="sidebar-logout-form">
                    @csrf
                    @if(config('adminlte.logout_method'))
                        {{ method_field(config('adminlte.logout_method')) }}
                    @endif
                    <button type="submit" class="sidebar-logout-btn nav-link">
                        <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                        <p class="m-0">{{ __('adminlte::adminlte.log_out') }}</p>
                    </button>
                </form>
            </div>
        @endauth
    </div>

</aside>
