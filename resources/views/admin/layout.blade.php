
<!DOCTYPE html>
<!--
Template Name: NobleUI - Admin & Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: You must have a valid license purchased only from above link or https://themeforest.net/user/nobleui/portfolio/ in order to legally use the theme for your project.
-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ App\Models\Setting::find(1)->title }}</title>
	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('admin') }}/vendors/core/core.css">
	<!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('admin') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('admin') }}/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="{{ asset('admin') }}/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->
  <!-- Layout styles -->
	<link rel="stylesheet" href="{{ asset('admin') }}/css/demo_1/style.css">
  <!-- End layout styles -->
  {{-- Summernote --}}
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  {{-- Selectize --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"/>

  {{-- <link rel="shortcut icon" href="{{ asset('admin') }}/images/favicon.png" /> --}}
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          SAMIUL's<span>BLOG</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>

            @can('Dashboard')
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Dashboard</span>
                </a>
            </li>
            @endcan

            @can('Admin')
            <li class="nav-item">
                <a href="{{ route('admins') }}" class="nav-link">
                <i class="link-icon" data-feather="users"></i>
                <span class="link-title">Admins</span>
                </a>
            </li>
            @endcan

            @can('Authors')
            <li class="nav-item">
                <a href="{{ route('authors') }}" class="nav-link">
                <i class="link-icon" data-feather="users"></i>
                <span class="link-title">Authors</span>
                </a>
            </li>
            @endcan

            @can('Register_admin')
            <li class="nav-item">
                <a href="{{ route('admin.new') }}" class="nav-link">
                <i class="link-icon" data-feather="user-plus"></i>
                <span class="link-title">Register new Admin</span>
                </a>
            </li>
            @endcan

            <li class="nav-item nav-category">web controls</li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#category" role="button" aria-expanded="false" aria-controls="category">
                <i class="link-icon" data-feather="list"></i>
                <span class="link-title">Category</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="category">
                <ul class="nav sub-menu">

                    @can('Add_categroy')
                    <li class="nav-item">
                    <a href="{{ route('add.categroy') }}" class="nav-link">Add Category</a>
                    </li>
                    @endcan

                    @can('Categories')
                    <li class="nav-item">
                    <a href="{{ route('categroy') }}" class="nav-link">Categories</a>
                    </li>
                    @endcan

                    @can('Category_trash')
                    <li class="nav-item">
                    <a href="{{ route('categroy.trashed') }}" class="nav-link">Trash</a>
                    </li>
                    @endcan
                </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#subcategory" role="button" aria-expanded="false" aria-controls="subcategory">
                <i class="link-icon" data-feather="git-pull-request"></i>
                <span class="link-title">Sub Categories</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="subcategory">
                <ul class="nav sub-menu">

                    @can('Add_sub_category')
                    <li class="nav-item">
                    <a href="{{ route('add_subcategroy') }}" class="nav-link">Add SubCategory</a>
                    </li>
                    @endcan

                    @can('Sub_category')
                    <li class="nav-item">
                    <a href="{{ route('subcategroy') }}" class="nav-link">SubCategories</a>
                    </li>
                    @endcan
                </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#tag" role="button" aria-expanded="false" aria-controls="tag">
                <i class="link-icon" data-feather="hash"></i>
                <span class="link-title">Tags</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="tag">
                <ul class="nav sub-menu">

                    @can('Add_tags')
                    <li class="nav-item">
                    <a href="{{ route('add.tag') }}" class="nav-link">Add Tag</a>
                    </li>
                    @endcan

                    @can('Tags')
                    <li class="nav-item">
                    <a href="{{ route('tags') }}" class="nav-link">Tags</a>
                    </li>
                    @endcan
                </ul>
                </div>
            </li>

            <li class="nav-item nav-category">Manage blogs</li>

            @can('Review_post')
            <li class="nav-item">
                <a href="{{ route('blog.review') }}" class="nav-link">
                <i class="link-icon" data-feather="eye"></i>
                <span class="link-title">Review post</span>
                </a>
            </li>
            @endcan
            @can('Blogs')
            <li class="nav-item">
                <a href="{{ route('blogs') }}" class="nav-link">
                <i class="link-icon" data-feather="image"></i>
                <span class="link-title">Blogs</span>
                </a>
            </li>
            @endcan

            <li class="nav-item nav-category">Admin post</li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#blog" role="button" aria-expanded="false" aria-controls="blog">
                <i class="link-icon" data-feather="layers"></i>
                <span class="link-title">Blogs</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="blog">
                <ul class="nav sub-menu">

                    @can('Create_blog')
                    <li class="nav-item">
                    <a href="{{ route('blog.create') }}" class="nav-link">Create Blog</a>
                    </li>
                    @endcan

                    @can('Admin_blog')
                    <li class="nav-item">
                    <a href="{{ route('adminblogs') }}" class="nav-link">Admin Blogs</a>
                    </li>
                    @endcan

                    @can('Blog_trash')
                    <li class="nav-item">
                    <a href="{{ route('blog.trash') }}" class="nav-link">Trash</a>
                    </li>
                    @endcan
                </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Communication</li>

            @can('Announcement')
            <li class="nav-item">
                <a href="{{ route('admin.announcement') }}" class="nav-link">
                <i class="link-icon" data-feather="volume-2"></i>
                <span class="link-title">Announcement</span>
                </a>
            </li>
            @endcan

            @can("Author's_message")
            <li class="nav-item">
                <a href="{{ route('admin.view.message') }}" class="nav-link">
                <i class="link-icon" data-feather="mail"></i>
                <span class="link-title">Author's messages <sup class="text-danger">{{ $unread }}</sup></span>
                </a>
            </li>
            @endcan

            <li class="nav-item nav-category">Management</li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#settings" role="button" aria-expanded="false" aria-controls="settings">
                <i class="link-icon" data-feather="tool"></i>
                <span class="link-title">Settings</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="settings">
                <ul class="nav sub-menu">

                    @can('Generel_settings')
                    <li class="nav-item">
                    <a href="{{ route('settings') }}" class="nav-link">Genarel</a>
                    </li>
                    @endcan

                    @can('About')
                    <li class="nav-item">
                    <a href="{{ route('edit.about') }}" class="nav-link">About</a>
                    </li>
                    @endcan
                </ul>
                </div>
            </li>

            @can('Role_manager')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#permission" role="button" aria-expanded="false" aria-controls="permission">
                <i class="link-icon" data-feather="shield"></i>
                <span class="link-title">Role Manager</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="permission">
                <ul class="nav sub-menu">
                    @can('Developer_mode')
                    <li class="nav-item">
                    <a href="{{ route('permission') }}" class="nav-link">Permissions</a>
                    </li>
                    @endcan

                    @can('Roles')
                    <li class="nav-item">
                    <a href="{{ route('role') }}" class="nav-link">Roles</a>
                    </li>
                    @endcan

                    @can('Assignment')
                    <li class="nav-item">
                    <a href="{{ route('assignment') }}" class="nav-link">Assgin Roles</a>
                    </li>
                    @endcan
                </ul>
                </div>
            </li>
            @endcan

        </ul>
      </div>
    </nav>
    <nav class="settings-sidebar">
      <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
          <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted">Sidebar:</h6>
        <div class="form-group border-bottom">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
              Light
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
              Dark
            </label>
          </div>
        </div>
        <div class="theme-wrapper">
          <h6 class="text-muted mb-2">Light Theme:</h6>
          <a class="theme-item active" href="../demo_1/dashboard-one.html">
            <img src="{{ asset('admin') }}/images/screenshots/light.jpg" alt="light theme">
          </a>
          <h6 class="text-muted mb-2">Dark Theme:</h6>
          <a class="theme-item" href="../demo_2/dashboard-one.html">
            <img src="{{ asset('admin') }}/images/screenshots/dark.jpg" alt="light theme">
          </a>
        </div>
      </div>
    </nav>
		<!-- partial -->

		<div class="page-wrapper">
            <nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<ul class="navbar-nav">
                        <li class="nav-item">
                            <h2 class="text-primary m-4">Admin Control panel</h3>
                        </li>
                    </ul>
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="font-weight-medium ml-1 mr-1 d-none d-md-inline-block">English</span>
							</a>
							<div class="dropdown-menu" aria-labelledby="languageDropdown">
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ml-1"> English </span></a>
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ml-1"> French </span></a>
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ml-1"> German </span></a>
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ml-1"> Portuguese </span></a>
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ml-1"> Spanish </span></a>
							</div>
                        </li>
						<li class="nav-item dropdown nav-apps">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="grid"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="appsDropdown">
								<div class="dropdown-header d-flex align-items-center justify-content-between">
									<p class="mb-0 font-weight-medium">My Shortcuts</p>
								</div>
								<div class="dropdown-body">
									<div class="d-flex align-items-center apps">
										<a href="{{ route('blog.create') }}"><i data-feather="plus-circle" class="icon-lg"></i><p>Create</p></a>
										<a href="{{ route('adminblogs') }}"><i data-feather="layers" class="icon-lg"></i><p>My Blogs</p></a>
										<a href="{{ route('blog.trash') }}"><i data-feather="trash-2" class="icon-lg"></i><p>Trash</p></a>
										<a href="{{ route('authors') }}"><i data-feather="users" class="icon-lg"></i><p>Authors</p></a>
										<a href="{{ route('blog.review') }}"><i data-feather="eye" class="icon-lg"></i><p>Review</p></a>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item nav-messages">
							<a class="nav-link" href="{{ route('admin.view.message') }}" id="messageDropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<i data-feather="mail"></i>
                                @if($unread > 0)
                                <div class="indicator">
									<div class="circle"></div>
								</div>
                                @endif
							</a>

						</li>
						<li class="nav-item dropdown nav-notifications">
							<a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="bell"></i>
                                @if($new_register > 0)
								<div class="indicator">
									<div class="circle"></div>
								</div>
                                @endif
							</a>
							<div class="dropdown-menu" aria-labelledby="notificationDropdown">
								<div class="dropdown-header d-flex align-items-center justify-content-between">
									<p class="mb-0 font-weight-medium">Notifications</p>
								</div>
								<div class="dropdown-body">
                                    @if($new_register > 0)
									<a href="{{ route('authors') }}" class="dropdown-item">
										<div class="icon">
											<i data-feather="user-plus"></i>
										</div>
										<div class="content">
											<p>New author registered</p>
										</div>
									</a>
                                    @else
                                    <a href="{{ route('authors') }}" class="dropdown-item">
										<div class="icon">
											<i data-feather="bell-off"></i>
										</div>
										<div class="content">
											<p>No Notifications</p>
										</div>
									</a>
                                    @endif
								</div>
                                @if($new_register > 0)
								<div class="dropdown-footer d-flex align-items-center justify-content-center">
									<a href="javascript:;">View all</a>
								</div>
                                @endif
							</div>
						</li>
						<li class="nav-item dropdown nav-profile">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(Auth::user()->image == null)
								<img src="{{ asset('uploads/profile.jpg') }}" alt="profile">
                                @else
								<img src="{{ asset('uploads/users/'.Auth::user()->image) }}" alt="profile">
                                @endif
							</a>
							<div class="dropdown-menu" aria-labelledby="profileDropdown">
								<div class="dropdown-header d-flex flex-column align-items-center">
									<div class="figure mb-3">
                                    @if(Auth::user()->image == null)
                                    <img src="{{ asset('uploads/profile.jpg') }}" alt="profile">
                                    @else
                                    <img src="{{ asset('uploads/users/'.Auth::user()->image) }}" alt="profile">
                                    @endif
									</div>
									<div class="info text-center">
										<p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
										<p class="email text-muted mb-3">{{ Auth::user()->email }}</p>
									</div>
								</div>
								<div class="dropdown-body">
									<ul class="profile-nav p-0 pt-3">
										<li class="nav-item">
											<a href="{{ route('profile.edit') }}" class="nav-link">
												<i data-feather="edit"></i>
												<span>Edit Profile</span>
											</a>
										</li>
										<li class="nav-item">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                            <button type="submit" class="btn text-danger m-0 p-0">
												<i data-feather="log-out"></i>
												<span class='ml-1 pl-2'>Log Out</span>
											</button>
                                            </form>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>

            <div class="page-content">


                @yield('main')


            </div>
        </div>
	</div>

	<!-- core:js -->
	<script src="{{ asset('admin') }}/vendors/core/core.js"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
  <script src="{{ asset('admin') }}/vendors/chartjs/Chart.min.js"></script>
  <script src="{{ asset('admin') }}/vendors/jquery.flot/jquery.flot.js"></script>
  <script src="{{ asset('admin') }}/vendors/jquery.flot/jquery.flot.resize.js"></script>
  <script src="{{ asset('admin') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="{{ asset('admin') }}/vendors/apexcharts/apexcharts.min.js"></script>
  <script src="{{ asset('admin') }}/vendors/progressbar.js/progressbar.min.js"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{ asset('admin') }}/vendors/feather-icons/feather.min.js"></script>
	<script src="{{ asset('admin') }}/js/template.js"></script>
	<!-- endinject -->
  <!-- custom js for this page -->
  <script src="{{ asset('admin') }}/js/dashboard.js"></script>
  <script src="{{ asset('admin') }}/js/datepicker.js"></script>
	<!-- end custom js for this page -->
    {{-- Summernote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Write your top blogs here!',
            tabsize: 2,
            height: 300
        });
    </script>

    {{-- Selectize --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"></script>
    <script>
        $('#select-tag').selectize({ sortField: 'text' })
    </script>
    <script>
        $('#select-blog').selectize({ sortField: 'text' })
    </script>
    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
    <script>
        Swal.fire({
        position: "center",
        icon: "success",
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 1500
        });
    </script>
    @endif
    @if (session('status'))
    <script>
        Swal.fire({
        position: "center",
        icon: "success",
        title: "{{ session('status') }}",
        showConfirmButton: false,
        timer: 1500
        });
    </script>
    @endif
    @if (session('info'))
    <script>
        Swal.fire({
        position: "center",
        icon: "info",
        title: "{{ session('info') }}",
        showConfirmButton: false,
        timer: 1500
        });
    </script>
    @endif

    @if(Session::has('message'))
    <script>
        Swal.fire({
        position: "center",
        icon: "success",
        title: "{{ Session::has('message') }}",
        showConfirmButton: false,
        timer: 1500
        });
    </script>
    @endif


    @yield('footer')
</body>
</html>
