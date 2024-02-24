<!-- Start Leftbar -->
<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="index.html" class="logo logo-large"><h3>Laravel</h3></a>
            <a href="index.html" class="logo logo-small"><h4>Lara</h4></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="ion ion-ios-desktop"></i><span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="ri-user-6-fill"></i><span>User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}">
                        <i class="ion ion-ios-list"></i><span>Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('courses.index') }}">
                        <i class="ion ion-ios-folder-open"></i><span>Course</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        <i class="ion ion-ios-exit"></i><span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
<!-- End Leftbar -->
<!-- Start Rightbar -->
<div class="rightbar">
    <!-- Start Topbar Mobile -->
    <div class="topbar-mobile">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="mobile-logobar">
                    <a href="index.html" class="mobile-logo"><img src="assets/images/logo.svg" class="img-fluid" alt="logo"></a>
                </div>
                <div class="mobile-togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="topbar-toggle-icon">
                                <a class="topbar-toggle-hamburger" href="javascript:void();">
                                    <i class="ri-more-fill menu-hamburger-horizontal"></i>
                                    <i class="ri-more-2-fill menu-hamburger-vertical"></i>
                                    </a>
                                </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger" href="javascript:void();">
                                    <i class="ri-menu-2-line menu-hamburger-collapse"></i>
                                    <i class="ri-close-line menu-hamburger-close"></i>
                                    </a>
                                </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Topbar -->
    <div class="topbar">
        <!-- Start row -->
        <div class="row align-items-center">
            <!-- Start col -->
            <div class="col-md-12 align-self-center">
                <div class="togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger" href="javascript:void();">
                                    <i class="ri-menu-2-line menu-hamburger-collapse"></i>
                                    <i class="ri-close-line menu-hamburger-close"></i>
                                    </a>
                                </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Topbar -->
