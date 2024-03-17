<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo text-white ml-2" href="">Soft-Techo</a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg"
                alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{ asset('assets/images/faces/face1.jpg') }}"
                            alt="Hexa's">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">Soft-Techo</h5>
                        <span>Admin</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <!-- Home Page -->
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-Home" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-book-open-page-variant"></i>
                </span>
                <span class="menu-title">Home</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-Home">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/home') ? 'active' : '' }}" href="{!! route('Admin.home') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">Home Page</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- About Page -->
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-About" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-book-open-page-variant"></i>
                </span>
                <span class="menu-title">About</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-About">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/about') ? 'active' : '' }}" href="{!! route('Admin.about') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">About Page</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Service Page -->
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-Service" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-book-open-page-variant"></i>
                </span>
                <span class="menu-title">Service</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-Service">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/service') ? 'active' : '' }}" href="{!! route('Admin.service') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">Service Page</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/project') ? 'active' : '' }}" href="{!! route('Admin.project') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">Project Page</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Product Page -->
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-Product" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-book-open-page-variant"></i>
                </span>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-Product">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/product') ? 'active' : '' }}" href="{!! route('Admin.product') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">Product Page</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Blog Page -->
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-Blog" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-book-open-page-variant"></i>
                </span>
                <span class="menu-title">Blog</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-Blog">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/blog') ? 'active' : '' }}" href="{!! route('Admin.blog') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">Blog Page</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- FAQ Page -->
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-FAQ" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-book-open-page-variant"></i>
                </span>
                <span class="menu-title">FAQ</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-FAQ">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/faq') ? 'active' : '' }}" href="{!! route('Admin.faq') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">FAQ Page</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Setting Page -->
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-Setting" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-book-open-page-variant"></i>
                </span>
                <span class="menu-title">Setting</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-Setting">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/setting') ? 'active' : '' }}" href="{!! route('Admin.setting') !!}">
                            <span class="menu-icon">
                                <i class=" mdi mdi-pencil-lock "></i>
                            </span>
                            <span class="menu-title">Setting Page</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-accounts" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="    mdi mdi-lock-outline  "></i>
                </span>
                <span class="menu-title">Accounts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-accounts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/accounts') ? 'active' : '' }}" href="">
                            <span class="menu-icon">
                                <i class=" mdi mdi-account-multiple  "></i>
                            </span>
                            <span class="menu-title">Admins</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/users/accounts') ? 'active' : '' }}"
                            href="">
                            <span class="menu-icon">
                                <i class="  mdi mdi-account-multiple  "></i>
                            </span>
                            <span class="menu-title">Users</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>
    </ul>
</nav>
