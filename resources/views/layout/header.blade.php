
<nav style="    background: linear-gradient(90deg, #133363, #4d91d1); /* Gradient */
    padding: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */"
    class="border border-3 navbar navbar-expand-lg  pt-4 bg-white  ">
    <div class="container-fluid" >
        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
            <div class="container-fluid">
                <a class="navbar-brand" style="font-family: 'Droid Sans Mono Dotted'; font-weight: bold;font-size: 25px" href="#">Talant Trade</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNavDropdown ">
                    @if(\Illuminate\Support\Facades\Auth::user()->role === 'employee')
                        <ul class="navbar-nav ">
                            <li class="nav-item fw-bold">
                                <a class="nav-link active fs-5" aria-current="page" href="{{route("jobPosts.index")}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-5" href="{{route("jobPosts.create")}}">Create Post</a>
                            </li>

                        </ul>
                    @elseif (Auth::user()->role === 'candidate')
                        <ul class="navbar-nav ">
                            <li class="nav-item ">
                                <a class="nav-link active fs-5 " aria-current="page" href="{{route("jobPosts.index")}}">Home</a>
                            </li>


                        </ul>

                    @endif
                        </div>

            </div>
        </nav>

        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                   aria-expanded="false" aria-haspopup="true">
                    <i class="fa fa-search"></i>
                </a>
                <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                        <div class="input-group">
                            <input type="text" placeholder="Search ..." class="form-control" />
                        </div>
                    </form>
                </ul>
            </li>
            @php

                $user = \App\Models\User::findOrFail(\Illuminate\Support\Facades\Auth::id());
            @endphp
            <li class="nav-item ">
                <a class="nav-link dropdown-toggle" href="#" id="noti   fDropdown" role="button"
                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    @if($user->unreadNotifications()->count() > 0)
                        <span class="notification">{{$user->notifications()->where("read_at",'=',null)->count()}}</span>
                    @endif                </a>
                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                    <li>
                        <div class="dropdown-title">
                            You have {{$user->unreadNotifications()->count()}} new notification
                        </div>
                    </li>

                    <li>
                        <div class="notif-scroll scrollbar-outer">
                            <div class="notif-center">

                                @forelse($user->notifications as $notification)
                                    @if(isset($notification->data['role']) && $notification->data['role'] === 'candidate')
                                        <div class="d-flex mt-3 ">
                                            <div class="ms-1 me-2">
                                                <img src="{{asset("images/users/".$notification->data['candidate_image'])}}" alt="..."
                                                     class="avatar rounded-circle"  />
                                            </div>
                                            <div class="container-fluid">
                                                @if($notification->read_at === null)
                                                    <a href="{{route('candidate.show',[$notification->data['candidate_id'],'id'=>$notification->id])}}"  class="notif-title text-primary">
                                                        {{$notification->data['candidate_name'],}}  Apply  For Your Jop </a>
                                                @else
                                                    <span class="notif-title"> {{$notification->data['candidate_name']}}  Apply  For Your Jop</span>
                                                @endif
                                                <div>
                                                    <small class="notif-date">{{ $notification->created_at->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @elseif(isset($notification->data['role']) && $notification->data['role'] === 'employee')
                                        <div class="d-flex mt-3 ">
                                            <div class="ms-1 me-2">
                                                <img src="{{asset("images/users/".$notification->data['image'])}}" alt="..."
                                                     class="avatar rounded-circle"  />
                                            </div>
                                            <div class="container-fluid">
                                                @if($notification->read_at === null)
                                                    <a href="{{route('jobPosts.show',[$notification->data['job_id'],'id'=>$notification->id])}}"  class="notif-title text-primary">
                                                        {{$notification->data['name'],}} {{$notification->data['status']}}  Your Apply For Jop </a>
                                                @else
                                                    <span class="notif-title"> {{$notification->data['name'],}} {{$notification->data['status']}}  Your Apply For Jop </span>
                                                @endif
                                                <div>
                                                    <small class="notif-date">{{ $notification->created_at->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @else
                                        <div class="d-flex mt-3 ">
                                            <div class="ms-1 me-2">
                                                <img src="{{asset("default.png")}}" alt="..."
                                                     class="avatar rounded-circle"  />
                                            </div>
                                            <div class="container-fluid">
                                                @if($notification->read_at === null)
                                                    <a href="{{route('jobPosts.show',[$notification->data['job_id'],'id'=>$notification->id])}}"  class="notif-title text-primary"> Admin {{$notification->data['status']}} Your Post For New Jop </a>
                                                @else
                                                    <span class="notif-title">Admin {{$notification->data['status']}} Your Post For New Jop  </span>


                                                @endif
                                                <div>
                                                    <small class="notif-date">{{ $notification->created_at->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif

                                @empty
                                    <a href="#" class="notif" > NO Record</a>
                                @endforelse
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="see-all" href="javascript:void(0);">See all notifications<i
                                class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic me-5" data-bs-toggle="dropdown" href="#"
                       aria-expanded="false">
                        <div class="avatar-sm">
                            @if(\Illuminate\Support\Facades\Auth::user()->github_id)
                                <img src={{Auth::user()->image}} alt="..."
                                     class="avatar-img rounded-circle" />
                            @else
                            <img src={{asset("images/users/".Auth::user()->image)}} alt="..."
                                 class="avatar-img rounded-circle" />
                                @endif
                        </div>
                        <span class="profile-username">
                                <span class="op-7">Hi,</span>
                                <span class="fw-bold">{{ Auth::user()->name }}</span>
                            </span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        @if(\Illuminate\Support\Facades\Auth::user()->github_id)
                                            <img src={{Auth::user()->image}} alt="..."
                                                 class="avatar-img rounded-circle" />
                                        @else
                                            <img src={{asset("images/users/".Auth::user()->image)}} alt="..."
                                                 class="avatar-img rounded-circle" />
                                        @endif
                                    </div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted fs-6">{{ Auth::user()->role }}</p>
                                        @php
                                            $authUser = Auth::id();
                                            $user = App\Models\User::all();
                                            $candidate = App\Models\Candidate::where('user_id', $authUser)->first();
                                            $employee = App\Models\Employee::where('user_id', $authUser)->first();
                                        @endphp
                                        @can("is_candidate",$user)
                                            @if ($authUser == $candidate->user_id )
                                                <a href="{{route('candidate.show',$candidate->id)}}"
                                                   class="btn btn-xs btn-secondary btn-sm mt-2 fw-bold">View Profile</a>
                                            @endif

                                        @endcan
                                        @can("is_employee",$user)
                                            @if ($authUser == $employee->user_id )
                                                <a href="{{route('employee.show',$employee->id)}}"
                                                   class="btn btn-xs btn-secondary btn-sm mt-2 fw-bold">View Profile</a>
                                            @endif

                                        @endcan
                                    </div>
                                </div>
                            </li>
                            <li>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>


                        </div>
                    </ul>
                </li>
        </ul>
        @endguest


    </div>
</nav>

