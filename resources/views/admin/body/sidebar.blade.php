@php
    $user = \App\Models\User::find(Auth::user()->id);
@endphp

<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Dashboard</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"> <i class="bx bx-home-circle"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        @if ($user->status == 'active')
        <li class="menu-label">Menu</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-cookie"></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.category') }}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
                </li>
                <li> <a href="{{ route('add.category') }}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-cookie"></i>
                </div>
                <div class="menu-title">SubCategory</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>All SubCategory</a>
                </li>
                <li> <a href="{{ route('add.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>Add SubCategory</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">News Posts</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.news.post') }}"><i class="bx bx-right-arrow-alt"></i>All News Posts</a>
                </li>
                <li> <a href="{{ route('add.news.post') }}"><i class="bx bx-right-arrow-alt"></i>Add News Post</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Banners</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.banners') }}"><i class="bx bx-right-arrow-alt"></i>Banner Settings</a>
                </li>
                <li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Accordions</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Gallery</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.photo.gallery') }}"><i class="bx bx-right-arrow-alt"></i>Photo Gallery Settings</a>
                </li>
                <li> <a href="{{ route('all.video.gallery') }}"><i class="bx bx-right-arrow-alt"></i>Video Gallery Settings</a>
                </li>
                <li> <a href="{{ route('update.live.tv') }}"><i class="bx bx-right-arrow-alt"></i>Live TV Settings</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Roles & Permissions</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Permissions</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.permission') }}"><i class="bx bx-right-arrow-alt"></i>All Permissions</a>
                </li>
                <li> <a href="{{ route('all.roles') }}"><i class="bx bx-right-arrow-alt"></i>All Roles</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-grid-alt"></i>
                </div>
                <div class="menu-title">Settings</div>
            </a>
            <ul>
                <li> <a href="{{ route('seo.setting') }}"><i class="bx bx-right-arrow-alt"></i>SEO Settings</a>
                </li>
                <li> <a href="table-datatable.html"><i class="bx bx-right-arrow-alt"></i>Data Table</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Settings</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Admin Users</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.admin') }}"><i class="bx bx-right-arrow-alt"></i>All Admin Users</a>
                </li>
                <li> <a href="{{ route('add.admin') }}"><i class="bx bx-right-arrow-alt"></i>Add Admin</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-grid-alt"></i>
                </div>
                <div class="menu-title">Settings</div>
            </a>
            <ul>
                <li> <a href="{{ route('seo.setting') }}"><i class="bx bx-right-arrow-alt"></i>SEO Settings</a>
                </li>
                <li> <a href="table-datatable.html"><i class="bx bx-right-arrow-alt"></i>Data Table</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Comments</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-lock"></i>
                </div>
                <div class="menu-title">Comments</div>
            </a>
            <ul>
                <li> <a href="{{ route('pending.review') }}"><i class="bx bx-right-arrow-alt"></i>Pending Reviews</a>
                </li>
                <li> <a href="{{ route('approved.review') }}"><i class="bx bx-right-arrow-alt"></i>Approved Reviews</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Others</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-menu"></i>
                </div>
                <div class="menu-title">Menu Levels</div>
            </a>
            <ul>
                <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level One</a>
                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level Two</a>
                            <ul>
                                <li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level Three</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
        @endif
    </ul>
    <!--end navigation-->
</div>