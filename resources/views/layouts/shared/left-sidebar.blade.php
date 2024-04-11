<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="" class="logo logo-light">
        <span class="logo-lg">
            <img src="/images/logo.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="" class="logo logo-dark">
        <span class="logo-lg">
            <img src="/images/logo-dark.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="">
                <img src="/images/users/avatar-1.jpg" alt="user-image" height="42" class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">Tosha Minner</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Navigation</li>

            <li class="side-nav-item">
                <a href="{{ route('notifications.index') }}" class="side-nav-link">
                    <i class="ri-checkbox-blank-circle-line align-middle"></i>
                    <span> Notifications </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('categories.index') }}" class="side-nav-link">
                <i class="ri-list-check-3"></i>
                    <span> Categorias </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('channels.index') }}" class="side-nav-link">
                <i class="ri-layout-line"></i>
                    <span> Channels </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('users.index') }}" class="side-nav-link">
                    <i class="ri-shield-user-line"></i>
                    <span> Usuarios </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{route("logout")}}" class="side-nav-link">
                <i class="ri-error-warning-line"></i>
                    <span> Cerrar Sesión</span>
                </a>
            </li>

        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->