<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('asset/assets/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('asset/assets/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div>

    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('asset/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>

        <li class="nav-title">Product</li>

        <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('asset/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
                </svg> product list</a></li>

        <li class="nav-item"><a class="nav-link" href="{{ route('products.create') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('asset/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
                </svg> product Create</a></li>



        <li class="nav-divider"></li>
        <li class="nav-title">Extras</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('asset/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
                </svg> Pages</a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="login.html" target="_top">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('asset/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                        </svg> Login</a></li>
                <li class="nav-item"><a class="nav-link" href="register.html" target="_top">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('asset/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                        </svg> Register</a></li>
            </ul>
        </li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
