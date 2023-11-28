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
        @if (Auth::user()->can('category.menu') || Auth::user()->can('subcategory.menu') || Auth::user()->can('news.menu') 
            || Auth::user()->can('photo.menu') || Auth::user()->can('video.menu') || Auth::user()->can('live.menu'))
        <li class="menu-label">Menu</li>
        @endif
        @if (Auth::user()->can('category.menu'))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-cookie"></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                @if (Auth::user()->can('category.list'))
                <li> <a href="{{ route('all.category') }}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
                </li>
                @endif
                @if (Auth::user()->can('category.add'))
                <li> <a href="{{ route('add.category') }}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        @if (Auth::user()->can('subcategory.menu'))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">SubCategory</div>
            </a>
            <ul>
                @if (Auth::user()->can('subcategory.list'))
                <li> <a href="{{ route('all.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>All SubCategory</a>
                </li>
                @endif
                @if (Auth::user()->can('subcategory.add'))
                <li> <a href="{{ route('add.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>Add SubCategory</a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        @if (Auth::user()->can('news.menu'))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-news'></i>
                </div>
                <div class="menu-title">News Posts</div>
            </a>
            <ul>
                @if (Auth::user()->can('news.list'))
                <li> <a href="{{ route('all.news.post') }}"><i class="bx bx-right-arrow-alt"></i>All News Posts</a>
                </li>
                @endif
                @if (Auth::user()->can('news.add'))
                <li> <a href="{{ route('add.news.post') }}"><i class="bx bx-right-arrow-alt"></i>Add News Post</a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        @if (Auth::user()->can('banner.menu'))
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bxs-discount'></i>
                </div>
                <div class="menu-title">Banners</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.banners') }}"><i class="bx bx-right-arrow-alt"></i>Banner Settings</a>
                </li>
            </ul>
        </li>
        @endif
        @if (Auth::user()->can('photo.menu') || Auth::user()->can('video.menu') || Auth::user()->can('live.menu'))
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-photo-album'></i>
                </div>
                <div class="menu-title">Galleries</div>
            </a>
            <ul>
                @if (Auth::user()->can('photo.menu'))
                <li> <a href="{{ route('all.photo.gallery') }}"><i class="bx bx-right-arrow-alt"></i>Photo Gallery Settings</a>
                </li>
                @endif
                @if (Auth::user()->can('video.menu'))
                <li> <a href="{{ route('all.video.gallery') }}"><i class="bx bx-right-arrow-alt"></i>Video Gallery Settings</a>
                </li>
                @endif
                @if (Auth::user()->can('live.menu'))
                <li> <a href="{{ route('update.live.tv') }}"><i class="bx bx-right-arrow-alt"></i>Live TV Settings</a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        @if (Auth::user()->can('review.menu'))
        <li class="menu-label">Comments</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-dots' ></i>
                </div>
                <div class="menu-title">Comments</div>
            </a>
            <ul>
                <li> <a href="{{ route('pending.review') }}"><i class="bx bx-right-arrow-alt"></i>Pending Comments</a>
                </li>
                <li> <a href="{{ route('approved.review') }}"><i class="bx bx-right-arrow-alt"></i>Approved Comments</a>
                </li>
            </ul>
        </li>
        @endif
        @if (Auth::user()->can('role.menu') || Auth::user()->can('seo.menu'))
        <li class="menu-label">Settings</li>
        @endif
        @if (Auth::user()->can('role.menu'))
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Roles & Permissions</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.permission') }}"><i class="bx bx-right-arrow-alt"></i>All Permissions</a>
                </li>
                <li> <a href="{{ route('all.roles') }}"><i class="bx bx-right-arrow-alt"></i>All Roles</a>
                </li>
                <li> <a href="{{ route('all.roles.permission') }}"><i class="bx bx-right-arrow-alt"></i>All Roles in Permission</a>
                </li>
            </ul>
            @endif
        </li>
        @if (Auth::user()->can('seo.menu'))
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-cog"></i>
                </div>
                <div class="menu-title">SEO Settings</div>
            </a>
            <ul>
                <li> <a href="{{ route('seo.setting') }}"><i class="bx bx-right-arrow-alt"></i>SEO Settings</a>
                </li>
            </ul>
        </li>
        @endif
        
        @if (Auth::user()->can('setting.menu'))
        <li class="menu-label">Employees</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bxs-user-detail' ></i>
                </div>
                <div class="menu-title">Employees</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.admin') }}"><i class="bx bx-right-arrow-alt"></i>All Employees</a>
                </li>
                <li> <a href="{{ route('add.admin') }}"><i class="bx bx-right-arrow-alt"></i>Add Employee</a>
                </li>
            </ul>
        </li>
        @endif
        @endif
    </ul>
    <!--end navigation-->
</div>