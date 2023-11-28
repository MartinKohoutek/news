<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                    <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                </div>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#"> <i class='bx bx-search'></i>
                        </a>
                    </li>
                   
                    @php
                        $reviewCount = Auth::user()->unreadNotifications()->count();
                    @endphp
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                            @if ($reviewCount > 0)
                            <span class="alert-count" id="notificationCount">{{ $reviewCount }}</span>
                            @endif
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- <a href="javascript:;"> -->
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <p class="msg-header-clear ms-auto"><a href="{{ route('mark-all-as-read') }}">Marks all as read</a></p>
                                </div>
                            <!-- </a> -->
                            <div class="header-notifications-list">
                                @php
                                    $user = Auth::user();
                                @endphp
                                @forelse ($user->notifications as $notification)
                                @if (is_null($notification->read_at) && $notification->type == 'App\Notifications\ReviewNotification')
                                <a class="dropdown-item" href="{{ route('pending.review') }}" onclick="markNotificationAsRead('{{ $notification->id }}')">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">New Comment<span class="msg-time float-end">{{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span></h6>
                                            <p class="msg-info">{{ $notification->data['message'] }}</p>
                                        </div>
                                    </div>
                                </a> 
                                @endif
                                @if (is_null($notification->read_at) && $notification->type == 'App\Notifications\RegisterNotification')
                                <a class="dropdown-item" href="{{ route('pending.review') }}" onclick="markNotificationAsRead('{{ $notification->id }}')">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">New User<span class="msg-time float-end">{{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span></h6>
                                            <p class="msg-info">{{ $notification->data['message'] }}</p>
                                        </div>
                                    </div>
                                </a> 
                                @endif
                                @empty
                                    
                                @endforelse
                                
                            </div>
                            <!-- <a href="javascript:;">
                                <div class="text-center msg-footer">View All Notifications</div>
                            </a> -->
                        </div>
                    </li>
                   
                </ul>
            </div>
            @php
                $user = \App\Models\User::find(Auth::user()->id);
            @endphp
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ (!empty($user->photo)) ? url('upload/admin_images/'.$user->photo) : url('upload/no_image.jpg') }}" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{ $user->name }}</p>
                        <p class="designattion mb-0">{{ $user->username }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="bx bx-user"></i><span>Profile</span></a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('admin.change.password') }}"><i class="bx bx-cog"></i><span>Change Password</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('admin.logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<script>
    function markNotificationAsRead(notificationId) {
        fetch('/mark-notification-as-read/' + notificationId, {
            method: 'post',
            headers: {
                'Content-Type' : 'application/json',
                'X-CSRF-TOKEN' : '{{ csrf_token() }}',
            },
            body: JSON.stringify({}),
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('notificationCount').textContent = data.count;
        })
        .catch (error => {
            console.log('Error: ', error);
        });
    }
</script>