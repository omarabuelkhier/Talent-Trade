@if (\Illuminate\Support\Facades\Auth::user()->role === "admin")
    <div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <a class="navbar-brand text-white"  style="font-family: 'Droid Sans Mono Dotted'; font-weight: bold;font-size: 25px" href="{{route('Dashboard')}}">Talant Trade</a>


            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#base">
                            <i class="fas fa-layer-group"></i>
                            <p>Category</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route("category.index")}}">
                                        <span class="sub-item">Categories</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route("category.create")}}">
                                        <span class="sub-item">Add Category</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarLayouts">
                            <i class="fas fa-th-list"></i>
                            <p>Technology</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="sidebarLayouts">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route("skills.index")}}">
                                        <span class="sub-item">Technologies</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route("skills.create")}}">
                                        <span class="sub-item">Add Technology</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#forms">
                            <i class="fas fa-user-alt"></i>
                            <p>User</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="forms">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route("users.index")}}">
                                        <span class="sub-item">All User</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route("users.archive")}}">
                                        <span class="sub-item">User Trash</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#tables">
                            <i class="fas fa-table"></i>
                            <p>job Post</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('jobPosts.index')}}">
                                        <span class="sub-item">All Posts</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('pending_posts')}}">
                                        <span class="sub-item">Pending Posts</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#candi">
                            <i class="fas fa-table"></i>
                            <p>Candidate</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="candi">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('candidate.index')}}">
                                        <span class="sub-item">All Candidate</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#emp">
                            <i class="fas fa-table"></i>
                            <p>Employee</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="emp">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('employee.index')}}">
                                        <span class="sub-item">All Employee</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

            </ul>
        </div>
    </div>
</div>
@endif
@if (\Illuminate\Support\Facades\Auth::user()->role === "employee")
    <div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src={{asset("assets/img/kaiadmin/logo_light.svg")}} alt="navbar-brand" class="navbar-brand"
                height="20" />

            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#base">
                            <i class="fas fa-layer-group"></i>
                            <p>Category</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route("category.index")}}">
                                        <span class="sub-item">Categories</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route("category.create")}}">
                                        <span class="sub-item">Add Category</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarLayouts">
                            <i class="fas fa-th-list"></i>
                            <p>Technology</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="sidebarLayouts">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route("skills.index")}}">
                                        <span class="sub-item">Technologies</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route("skills.create")}}">
                                        <span class="sub-item">Add Technology</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#forms">
                            <i class="fas fa-user-alt"></i>
                            <p>User</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="forms">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route("users.index")}}">
                                        <span class="sub-item">All User</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route("users.archive")}}">
                                        <span class="sub-item">User Trash</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#tables">
                            <i class="fas fa-table"></i>
                            <p>job Post</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('jobPosts.index')}}">
                                        <span class="sub-item">All Posts</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

            </ul>
        </div>
    </div>
</div>
@endif
@if (\Illuminate\Support\Facades\Auth::user()->role === "candidate")
    <div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src={{asset("assets/img/kaiadmin/logo_light.svg")}} alt="navbar-brand" class="navbar-brand"
                height="20" />

            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#base">
                            <i class="fas fa-layer-group"></i>
                            <p>Category</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route("category.index")}}">
                                        <span class="sub-item">Categories</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route("category.create")}}">
                                        <span class="sub-item">Add Category</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarLayouts">
                            <i class="fas fa-th-list"></i>
                            <p>Technology</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="sidebarLayouts">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route("skills.index")}}">
                                        <span class="sub-item">Technologies</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route("skills.create")}}">
                                        <span class="sub-item">Add Technology</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#forms">
                            <i class="fas fa-user-alt"></i>
                            <p>User</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="forms">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route("users.index")}}">
                                        <span class="sub-item">All User</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route("users.archive")}}">
                                        <span class="sub-item">User Trash</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#tables">
                            <i class="fas fa-table"></i>
                            <p>job Post</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('jobPosts.index')}}">
                                        <span class="sub-item">All Posts</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

            </ul>
        </div>
    </div>
</div>
@endif
