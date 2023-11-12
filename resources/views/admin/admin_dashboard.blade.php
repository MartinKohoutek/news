<!doctype html>
<html lang="en" class="semi-dark">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--favicon-->
		<link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png" />
		<!--plugins-->
		<link href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
		<link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
		<link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
		<link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
		<!-- loader-->
		<link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />
		<script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
		<!-- Bootstrap CSS -->
		<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
		<link href="{{ asset('backend/assets/css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
		<!-- Theme Style CSS -->
		<link rel="stylesheet" href="{{ asset('backend/assets/css/dark-theme.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/assets/css/semi-dark.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/assets/css/header-colors.css') }}" />
		<title>Admin Dashboard</title>
	</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Admin Dashboard</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					<ul>
						<li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Default</a>
						</li>
						<li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Alternate</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Application</div>
					</a>
					<ul>
						<li> <a href="app-emailbox.html"><i class="bx bx-right-arrow-alt"></i>Email</a>
						</li>
						<li> <a href="app-chat-box.html"><i class="bx bx-right-arrow-alt"></i>Chat Box</a>
						</li>
						<li> <a href="app-file-manager.html"><i class="bx bx-right-arrow-alt"></i>File Manager</a>
						</li>
						<li> <a href="app-contact-list.html"><i class="bx bx-right-arrow-alt"></i>Contatcs</a>
						</li>
						<li> <a href="app-to-do.html"><i class="bx bx-right-arrow-alt"></i>Todo List</a>
						</li>
						<li> <a href="app-invoice.html"><i class="bx bx-right-arrow-alt"></i>Invoice</a>
						</li>
						<li> <a href="app-fullcalender.html"><i class="bx bx-right-arrow-alt"></i>Calendar</a>
						</li>
					</ul>
				</li>
				<li class="menu-label">UI Elements</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-cookie"></i>
						</div>
						<div class="menu-title">Widgets</div>
					</a>
					<ul>
						<li> <a href="widgets-static.html"><i class="bx bx-right-arrow-alt"></i>Static Widgets</a>
						</li>
						<li> <a href="widgets-data.html"><i class="bx bx-right-arrow-alt"></i>Data Widgets</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">eCommerce</div>
					</a>
					<ul>
						<li> <a href="ecommerce-products.html"><i class="bx bx-right-arrow-alt"></i>Products</a>
						</li>
						<li> <a href="ecommerce-products-details.html"><i class="bx bx-right-arrow-alt"></i>Product Details</a>
						</li>
						<li> <a href="ecommerce-add-new-products.html"><i class="bx bx-right-arrow-alt"></i>Add New Products</a>
						</li>
						<li> <a href="ecommerce-orders.html"><i class="bx bx-right-arrow-alt"></i>Orders</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Components</div>
					</a>
					<ul>
						<li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Alerts</a>
						</li>
						<li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Accordions</a>
						</li>
						<li> <a href="component-badges.html"><i class="bx bx-right-arrow-alt"></i>Badges</a>
						</li>
						<li> <a href="component-buttons.html"><i class="bx bx-right-arrow-alt"></i>Buttons</a>
						</li>
						<li> <a href="component-cards.html"><i class="bx bx-right-arrow-alt"></i>Cards</a>
						</li>
						<li> <a href="component-carousels.html"><i class="bx bx-right-arrow-alt"></i>Carousels</a>
						</li>
						<li> <a href="component-list-groups.html"><i class="bx bx-right-arrow-alt"></i>List Groups</a>
						</li>
						<li> <a href="component-media-object.html"><i class="bx bx-right-arrow-alt"></i>Media Objects</a>
						</li>
						<li> <a href="component-modals.html"><i class="bx bx-right-arrow-alt"></i>Modals</a>
						</li>
						<li> <a href="component-navs-tabs.html"><i class="bx bx-right-arrow-alt"></i>Navs & Tabs</a>
						</li>
						<li> <a href="component-navbar.html"><i class="bx bx-right-arrow-alt"></i>Navbar</a>
						</li>
						<li> <a href="component-paginations.html"><i class="bx bx-right-arrow-alt"></i>Pagination</a>
						</li>
						<li> <a href="component-popovers-tooltips.html"><i class="bx bx-right-arrow-alt"></i>Popovers & Tooltips</a>
						</li>
						<li> <a href="component-progress-bars.html"><i class="bx bx-right-arrow-alt"></i>Progress</a>
						</li>
						<li> <a href="component-spinners.html"><i class="bx bx-right-arrow-alt"></i>Spinners</a>
						</li>
						<li> <a href="component-notifications.html"><i class="bx bx-right-arrow-alt"></i>Notifications</a>
						</li>
						<li> <a href="component-avtars-chips.html"><i class="bx bx-right-arrow-alt"></i>Avatrs & Chips</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-repeat"></i>
						</div>
						<div class="menu-title">Content</div>
					</a>
					<ul>
						<li> <a href="content-grid-system.html"><i class="bx bx-right-arrow-alt"></i>Grid System</a>
						</li>
						<li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Typography</a>
						</li>
						<li> <a href="content-text-utilities.html"><i class="bx bx-right-arrow-alt"></i>Text Utilities</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"> <i class="bx bx-donate-blood"></i>
						</div>
						<div class="menu-title">Icons</div>
					</a>
					<ul>
						<li> <a href="icons-line-icons.html"><i class="bx bx-right-arrow-alt"></i>Line Icons</a>
						</li>
						<li> <a href="icons-boxicons.html"><i class="bx bx-right-arrow-alt"></i>Boxicons</a>
						</li>
						<li> <a href="icons-feather-icons.html"><i class="bx bx-right-arrow-alt"></i>Feather Icons</a>
						</li>
					</ul>
				</li>
				<li class="menu-label">Forms & Tables</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-message-square-edit'></i>
						</div>
						<div class="menu-title">Forms</div>
					</a>
					<ul>
						<li> <a href="form-elements.html"><i class="bx bx-right-arrow-alt"></i>Form Elements</a>
						</li>
						<li> <a href="form-input-group.html"><i class="bx bx-right-arrow-alt"></i>Input Groups</a>
						</li>
						<li> <a href="form-layouts.html"><i class="bx bx-right-arrow-alt"></i>Forms Layouts</a>
						</li>
						<li> <a href="form-validations.html"><i class="bx bx-right-arrow-alt"></i>Form Validation</a>
						</li>
						<li> <a href="form-wizard.html"><i class="bx bx-right-arrow-alt"></i>Form Wizard</a>
						</li>
						<li> <a href="form-text-editor.html"><i class="bx bx-right-arrow-alt"></i>Text Editor</a>
						</li>
						<li> <a href="form-file-upload.html"><i class="bx bx-right-arrow-alt"></i>File Upload</a>
						</li>
						<li> <a href="form-date-time-pickes.html"><i class="bx bx-right-arrow-alt"></i>Date Pickers</a>
						</li>
						<li> <a href="form-select2.html"><i class="bx bx-right-arrow-alt"></i>Select2</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-grid-alt"></i>
						</div>
						<div class="menu-title">Tables</div>
					</a>
					<ul>
						<li> <a href="table-basic-table.html"><i class="bx bx-right-arrow-alt"></i>Basic Table</a>
						</li>
						<li> <a href="table-datatable.html"><i class="bx bx-right-arrow-alt"></i>Data Table</a>
						</li>
					</ul>
				</li>
				<li class="menu-label">Pages</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-lock"></i>
						</div>
						<div class="menu-title">Authentication</div>
					</a>
					<ul>
						<li> <a href="authentication-signin.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign In</a>
						</li>
						<li> <a href="authentication-signup.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign Up</a>
						</li>
						<li> <a href="authentication-signin-with-header-footer.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign In with Header & Footer</a>
						</li>
						<li> <a href="authentication-signup-with-header-footer.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign Up with Header & Footer</a>
						</li>
						<li> <a href="authentication-forgot-password.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Forgot Password</a>
						</li>
						<li> <a href="authentication-reset-password.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Reset Password</a>
						</li>
						<li> <a href="authentication-lock-screen.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Lock Screen</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="user-profile.html">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">User Profile</div>
					</a>
				</li>
				<li>
					<a href="timeline.html">
						<div class="parent-icon"> <i class="bx bx-video-recording"></i>
						</div>
						<div class="menu-title">Timeline</div>
					</a>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-error"></i>
						</div>
						<div class="menu-title">Errors</div>
					</a>
					<ul>
						<li> <a href="errors-404-error.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>404 Error</a>
						</li>
						<li> <a href="errors-500-error.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>500 Error</a>
						</li>
						<li> <a href="errors-coming-soon.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Coming Soon</a>
						</li>
						<li> <a href="error-blank-page.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Blank Page</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="faq.html">
						<div class="parent-icon"><i class="bx bx-help-circle"></i>
						</div>
						<div class="menu-title">FAQ</div>
					</a>
				</li>
				<li>
					<a href="pricing-table.html">
						<div class="parent-icon"><i class="bx bx-diamond"></i>
						</div>
						<div class="menu-title">Pricing</div>
					</a>
				</li>
				<li class="menu-label">Charts & Maps</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-line-chart"></i>
						</div>
						<div class="menu-title">Charts</div>
					</a>
					<ul>
						<li> <a href="charts-apex-chart.html"><i class="bx bx-right-arrow-alt"></i>Apex</a>
						</li>
						<li> <a href="charts-chartjs.html"><i class="bx bx-right-arrow-alt"></i>Chartjs</a>
						</li>
						<li> <a href="charts-highcharts.html"><i class="bx bx-right-arrow-alt"></i>Highcharts</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-map-alt"></i>
						</div>
						<div class="menu-title">Maps</div>
					</a>
					<ul>
						<li> <a href="map-google-maps.html"><i class="bx bx-right-arrow-alt"></i>Google Maps</a>
						</li>
						<li> <a href="map-vector-maps.html"><i class="bx bx-right-arrow-alt"></i>Vector Maps</a>
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
					<a href="javascript:;">
						<div class="parent-icon"><i class="bx bx-folder"></i>
						</div>
						<div class="menu-title">Documentation</div>
					</a>
				</li>
				<li>
					<a href="https://themeforest.net/user/codervent" target="_blank">
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
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
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="row row-cols-3 g-3 p-3">
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
											</div>
											<div class="app-title">Teams</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
											</div>
											<div class="app-title">Projects</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
											</div>
											<div class="app-title">Tasks</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
											</div>
											<div class="app-title">Feeds</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
											</div>
											<div class="app-title">Files</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i>
											</div>
											<div class="app-title">Alerts</div>
										</div>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
												ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
												ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
												ago</span></h6>
													<p class="msg-info">The pdf files generated</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
												ago</span></h6>
													<p class="msg-info">5.1 min avarage time response</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span
												class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-message-detail"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">New customer comments recived</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
												ago</span></h6>
													<p class="msg-info">Successfully shipped your item</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
												ago</span></h6>
													<p class="msg-info">24 new authors joined last week</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
												ago</span></h6>
													<p class="msg-info">45% less alerts last 4 weeks</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
												sec ago</span></h6>
													<p class="msg-info">Many desktop publishing packages</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-3.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
												ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
												min ago</span></h6>
													<p class="msg-info">Making this the first true generator</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-5.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
												ago</span></h6>
													<p class="msg-info">Duis aute irure dolor in reprehenderit</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-6.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">The passage is attributed to an unknown</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-7.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">The point of using Lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
												ago</span></h6>
													<p class="msg-info">It was popularised in the 1960s</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-9.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-10.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
												ago</span></h6>
													<p class="msg-info">If you are going to use a passage</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-11.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
												ago</span></h6>
													<p class="msg-info">All the Lorem Ipsum generators</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{ asset('backend/assets/images/avatars/avatar-2.png') }}" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">Pauline Seitz</p>
								<p class="designattion mb-0">Web Designer</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
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
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
					<div class="col">
					  <div class="card rounded-4 bg-gradient-worldcup">
						 <div class="card-body">
							 <div class="d-flex align-items-center justify-content-between">
								 <div>
									 <p class="mb-0 text-white">Total Orders</p>
									 <h4 class="my-1 text-white">8,643</h4>
									 <p class="mb-0 font-13 text-white">+2.5% from last week</p>
								 </div>
								 <div class="fs-1 text-white"><i class='bx bxs-cart'></i>
								 </div>
							 </div>
						 </div>
					  </div>
					</div>
					<div class="col">
					 <div class="card rounded-4 bg-gradient-rainbow">
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between">
								<div>
									<p class="mb-0 text-white">Customers</p>
									<h4 class="my-1 text-white">28K</h4>
									<p class="mb-0 font-13 text-white">+5.4% from last week</p>
								</div>
								<div class="fs-1 text-white"><i class='bx bxs-group'></i>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				   <div class="col">
					 <div class="card rounded-4 bg-gradient-smile">
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between">
								<div>
									<p class="mb-0 text-white">Revenue</p>
									<h4 class="my-1 text-white">$24.5K</h4>
									<p class="mb-0 font-13 text-white">-4.5% from last week</p>
								</div>
								<div class="fs-1 text-white"><i class='bx bxs-wallet'></i>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				   <div class="col">
					 <div class="card rounded-4 bg-gradient-pinki">
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between">
								<div>
									<p class="mb-0 text-white">Growth</p>
									<h4 class="my-1 text-white">41.86%</h4>
									<p class="mb-0 font-13 text-white">+8.4% from last week</p>
								</div>
								<div class="fs-1 text-white"><i class='bx bxs-bar-chart-alt-2'></i>
								</div>
							</div>
						</div>
					 </div>
				   </div> 
				 </div><!--end row-->

				 <div class="row">
					<div class="col-12 col-lg-8 d-flex">
					   <div class="card rounded-4 w-100">
						   <div class="card-body">
							 <div class="d-flex align-items-cente">
								 <div>
									 <h6 class="mb-0">Sales Overview</h6>
								 </div>
								 <div class="dropdown ms-auto">
									 <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
									 </a>
									 <ul class="dropdown-menu">
										 <li><a class="dropdown-item" href="javascript:;">Action</a>
										 </li>
										 <li><a class="dropdown-item" href="javascript:;">Another action</a>
										 </li>
										 <li>
											 <hr class="dropdown-divider">
										 </li>
										 <li><a class="dropdown-item" href="javascript:;">Something else here</a>
										 </li>
									 </ul>
								 </div>
							 </div>
							 <div id="chart1"></div>
						   </div>
					   </div>
					</div>
					<div class="col-12 col-lg-4 d-flex">
						<div class="card rounded-4 w-100">
							<div class="card-body">
							 <div class="d-flex align-items-center">
								 <div>
									 <h6 class="mb-0">Monthly Orders</h6>
								 </div>
								 <div class="dropdown ms-auto">
									 <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
									 </a>
									 <ul class="dropdown-menu">
										 <li><a class="dropdown-item" href="javascript:;">Action</a>
										 </li>
										 <li><a class="dropdown-item" href="javascript:;">Another action</a>
										 </li>
										 <li>
											 <hr class="dropdown-divider">
										 </li>
										 <li><a class="dropdown-item" href="javascript:;">Something else here</a>
										 </li>
									 </ul>
								 </div>
							 </div>
							 <div id="chart2"></div>
						</div>
					</div>
				  </div>
				 </div><!--end row-->


				 <div class="row">
                    <div class="col-12 col-lg-4 d-flex">
						<div class="card rounded-4 w-100">
							<div class="card-header">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Top Categories</h6>
									</div>
									<div class="dropdown ms-auto">
										<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
										</a>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="javascript:;">Action</a>
											</li>
											<li><a class="dropdown-item" href="javascript:;">Another action</a>
											</li>
											<li>
												<hr class="dropdown-divider">
											</li>
											<li><a class="dropdown-item" href="javascript:;">Something else here</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body">
                                <div class="categories-list">
									<div class="d-flex align-items-center justify-content-between gap-3">
										<div class="">
											<img src="assets/images/products/01.png" class="product-img-2" alt="product img">
										</div>
										<div class="flex-grow-1">
											<p class="mb-2">Mobiles <span class="float-end">75%</span></p>
											<div class="progress" style="height: 4px;">
											   <div class="progress-bar bg-gradient-cosmic" role="progressbar" style="width: 75%"></div>
											</div>
										 </div>
									</div>
									<hr>
									<div class="d-flex align-items-center justify-content-between gap-3">
										<div class="">
											<img src="assets/images/products/02.png" class="product-img-2" alt="product img">
										</div>
										<div class="flex-grow-1">
											<p class="mb-2">Mobiles <span class="float-end">75%</span></p>
											<div class="progress" style="height: 4px;">
											   <div class="progress-bar bg-gradient-ibiza" role="progressbar" style="width: 75%"></div>
											</div>
										 </div>
									</div>
									<hr>
									<div class="d-flex align-items-center justify-content-between gap-3">
										<div class="">
											<img src="assets/images/products/03.png" class="product-img-2" alt="product img">
										</div>
										<div class="flex-grow-1">
											<p class="mb-2">Mobiles <span class="float-end">75%</span></p>
											<div class="progress" style="height: 4px;">
											   <div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 75%"></div>
											</div>
										 </div>
									</div>
									<hr>
									<div class="d-flex align-items-center justify-content-between gap-3">
										<div class="">
											<img src="assets/images/products/04.png" class="product-img-2" alt="product img">
										</div>
										<div class="flex-grow-1">
											<p class="mb-2">Mobiles <span class="float-end">75%</span></p>
											<div class="progress" style="height: 4px;">
											   <div class="progress-bar bg-gradient-kyoto" role="progressbar" style="width: 75%"></div>
											</div>
										 </div>
									</div>
									<hr>
									<div class="d-flex align-items-center justify-content-between gap-3">
										<div class="">
											<img src="assets/images/products/05.png" class="product-img-2" alt="product img">
										</div>
										<div class="flex-grow-1">
											<p class="mb-2">Mobiles <span class="float-end">75%</span></p>
											<div class="progress" style="height: 4px;">
											   <div class="progress-bar bg-gradient-blues" role="progressbar" style="width: 75%"></div>
											</div>
										 </div>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-4 d-flex">
						<div class="card rounded-4 w-100">
							<div class="card-header">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">New Users</h6>
									</div>
									<div class="dropdown ms-auto">
										<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
										</a>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="javascript:;">Action</a>
											</li>
											<li><a class="dropdown-item" href="javascript:;">Another action</a>
											</li>
											<li>
												<hr class="dropdown-divider">
											</li>
											<li><a class="dropdown-item" href="javascript:;">Something else here</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body">
                                <div class="new-users-list">
									<div class="d-flex align-items-center justify-content-between gap-3">
										<div class="">
											<img src="assets/images/avatars/avatar-1.png" class="rounded-circle" width="45" height="45" alt="user img">
										</div>
										<div class="flex-grow-1">
											<h6 class="mb-0">Benji Harper</h6>
											<p class="mb-0 extra-small-font">UI Designer</p>
										 </div>
										 <div class="">
											<button type="button" class="btn btn-gradient-primary btn-sm rounded-4 px-4">Add</button>
										 </div>
									</div>
									<hr>
									<div class="d-flex align-items-center justify-content-between gap-3">
										<div class="">
											<img src="assets/images/avatars/avatar-2.png" class="rounded-circle" width="45" height="45" alt="user img">
										</div>
										<div class="flex-grow-1">
											<h6 class="mb-0">John Michael</h6>
											<p class="mb-0 extra-small-font">Project Manger</p>
										 </div>
										 <div class="">
											<button type="button" class="btn btn-gradient-primary btn-sm rounded-4 px-4">Add</button>
										 </div>
									</div>
									<hr>
									<div class="d-flex align-items-center justify-content-between gap-3">
										<div class="">
											<img src="assets/images/avatars/avatar-3.png" class="rounded-circle" width="45" height="45" alt="user img">
										</div>
										<div class="flex-grow-1">
											<h6 class="mb-0">Justine Myranda</h6>
											<p class="mb-0 extra-small-font">Php Developer</p>
										 </div>
										 <div class="">
											<button type="button" class="btn btn-gradient-primary btn-sm rounded-4 px-4">Add</button>
										 </div>
									</div>
									<hr>
									<div class="d-flex align-items-center justify-content-between gap-3">
										<div class="">
											<img src="assets/images/avatars/avatar-4.png" class="rounded-circle" width="45" height="45" alt="user img">
										</div>
										<div class="flex-grow-1">
											<h6 class="mb-0">Janet Lucas</h6>
											<p class="mb-0 extra-small-font">Team Leader</p>
										 </div>
										 <div class="">
											<button type="button" class="btn btn-gradient-primary btn-sm rounded-4 px-4">Add</button>
										 </div>
									</div>
									<hr>
									<div class="d-flex align-items-center justify-content-between gap-3">
										<div class="">
											<img src="assets/images/avatars/avatar-5.png" class="rounded-circle" width="45" height="45" alt="user img">
										</div>
										<div class="flex-grow-1">
											<h6 class="mb-0">Alex Smith</h6>
											<p class="mb-0 extra-small-font">Graphic Designer</p>
										 </div>
										 <div class="">
											<button type="button" class="btn btn-gradient-primary btn-sm rounded-4 px-4">Add</button>
										 </div>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-4 d-flex">
						<div class="card rounded-4 w-100">
							<div class="card-body">
								<ul class="nav nav-pills nav-fill mb-3">
									<li class="nav-item">
										<a class="nav-link rounded-5" data-bs-toggle="pill" href="#primary-pills-home">Monthly</a>
									</li>
									<li class="nav-item">
										<a class="nav-link active rounded-5" data-bs-toggle="pill" href="#primary-pills-profile">Weekly</a>
									</li>
									<li class="nav-item">
										<a class="nav-link rounded-5" data-bs-toggle="pill" href="#primary-pills-contact">Daily</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade" id="primary-pills-home">
										<div id="chart3"></div>
										<hr>
										<div class="d-flex align-items-center justify-content-center gap-3">
                                            <div>
												<h3 class="mb-0">$ 9845.43</h3>
												<p class="mb-0">+3% Since Last Week</p>
											</div> 
											<div class="fs-1">
												<i class="lni lni-arrow-up"></i>
											</div>
										</div>
									</div>
									<div class="tab-pane fade show active" id="primary-pills-profile">
										<div id="chart4"></div>
										<hr>
										<div class="d-flex align-items-center justify-content-center gap-3">
                                            <div>
												<h3 class="mb-0">$ 45,245.37</h3>
												<p class="mb-0">+4% Since Last Month</p>
											</div> 
											<div class="fs-1">
												<i class="lni lni-arrow-up"></i>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="primary-pills-contact">
										<div id="chart5"></div>
										<hr>
										<div class="d-flex align-items-center justify-content-center gap-3">
                                            <div>
												<h3 class="mb-0">$ 7395.23</h3>
												<p class="mb-0">+4% Since Tomorrow</p>
											</div> 
											<div class="fs-1">
												<i class="lni lni-arrow-up"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!--end row-->

				<div class="row">
                    <div class="col-12 col-lg-4 d-flex">
                       <div class="card rounded-4 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Browser Statistics</h6>
								</div>
								<div class="dropdown ms-auto">
									<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
									</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="javascript:;">Action</a>
										</li>
										<li><a class="dropdown-item" href="javascript:;">Another action</a>
										</li>
										<li>
											<hr class="dropdown-divider">
										</li>
										<li><a class="dropdown-item" href="javascript:;">Something else here</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						  <div class="card-body">
							<div id="chart6"></div>
						  </div>
						  <ul class="list-group list-group-flush">
							<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">Chrome <span class="badge bg-danger rounded-pill">10</span>
							</li>
							<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Opera <span class="badge bg-primary rounded-pill">65</span>
							</li>
							<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Firefox <span class="badge bg-warning text-dark rounded-pill">14</span>
							</li>
						</ul>
					   </div>
					</div>
					<div class="col-12 col-lg-8 d-flex">
						<div class="card rounded-4 w-100">
							<div class="card-header">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Top Selling Countries</h6>
									</div>
									<div class="dropdown ms-auto">
										<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
										</a>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="javascript:;">Action</a>
											</li>
											<li><a class="dropdown-item" href="javascript:;">Another action</a>
											</li>
											<li>
												<hr class="dropdown-divider">
											</li>
											<li><a class="dropdown-item" href="javascript:;">Something else here</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						   <div class="card-body">
							  <div id="geographic-map-2" style="height: 280px;"></div>
						   </div>
						   <table class="table table-borderless align-items-center">
							<tbody>
							  <tr>
							   <td><i class="bx bxs-circle me-2" style="color: #5a52db;"></i> Russia</td>
							   <td>18 %</td>
							   <td><i class="bx bxs-circle me-2" style="color: #f09c15;"></i> Australia</td>
							   <td>14.2 %</td>
							 </tr>
							 <tr>
							   <td><i class="bx bxs-circle me-2" style="color: #b659ff;"></i> India</td>
							   <td>15 %</td>
							   <td><i class="bx bxs-circle me-2" style="color: #2ccc72;"></i> United States</td>
							   <td>11.6 %</td>
							 </tr>
							</tbody>
						  </table>
						</div>
					 </div>

				</div><!--end row-->

				<div class="row">
					<div class="col-12">
                         <div class="card rounded-4">
							<div class="card-header">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Recent Orders</h6>
									</div>
									<div class="dropdown ms-auto">
										<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
										</a>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="javascript:;">Action</a>
											</li>
											<li><a class="dropdown-item" href="javascript:;">Another action</a>
											</li>
											<li>
												<hr class="dropdown-divider">
											</li>
											<li><a class="dropdown-item" href="javascript:;">Something else here</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table align-middle mb-0">
									 <thead class="table-light">
									  <tr>
										<th>Product</th>
										<th>Photo</th>
										<th>Product ID</th>
										<th>Status</th>
										<th>Amount</th>
										<th>Date</th>
										<th>Shipping</th>
									  </tr>
									  </thead>
									  <tbody><tr>
									   <td>Iphone 5</td>
									   <td><img src="assets/images/products/01.png" class="product-img-2" alt="product img"></td>
									   <td>#9405822</td>
									   <td><span class="btn btn-outline-success btn-sm px-4 rounded-5 w-100">Completed</span></td>
									   <td>$1250.00</td>
									   <td>03 Feb 2020</td>
									   <td><div class="progress" style="height: 6px;">
											 <div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div>
										   </div></td>
									  </tr>
				   
									  <tr>
									   <td>Earphone GL</td>
									   <td><img src="assets/images/products/02.png" class="product-img-2" alt="product img"></td>
									   <td>#8304620</td>
									   <td><span class="btn btn-outline-warning btn-sm px-4 rounded-5 w-100">Pending</span></td>
									   <td>$1500.00</td>
									   <td>05 Feb 2020</td>
									   <td><div class="progress" style="height: 6px;">
											 <div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 60%"></div>
										   </div></td>
									  </tr>
				   
									  <tr>
									   <td>HD Hand Camera</td>
									   <td><img src="assets/images/products/03.png" class="product-img-2" alt="product img"></td>
									   <td>#4736890</td>
									   <td><span class="btn btn-outline-danger btn-sm px-4 rounded-5 w-100">Failed</span></td>
									   <td>$1400.00</td>
									   <td>06 Feb 2020</td>
									   <td><div class="progress" style="height: 6px;">
											 <div class="progress-bar bg-gradient-bloody" role="progressbar" style="width: 70%"></div>
										   </div></td>
									  </tr>
				   
									  <tr>
									   <td>Clasic Shoes</td>
									   <td><img src="assets/images/products/04.png" class="product-img-2" alt="product img"></td>
									   <td>#8543765</td>
									   <td><span class="btn btn-outline-success btn-sm px-4 rounded-5 w-100">Paid</span></td>
									   <td>$1200.00</td>
									   <td>14 Feb 2020</td>
									   <td><div class="progress" style="height: 6px;">
											 <div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div>
										   </div></td>
									  </tr>
									  <tr>
									   <td>Sitting Chair</td>
									   <td><img src="assets/images/products/06.png" class="product-img-2" alt="product img"></td>
									   <td>#9629240</td>
									   <td><span class="btn btn-outline-warning btn-sm px-4 rounded-5 w-100">Pending</span></td>
									   <td>$1500.00</td>
									   <td>18 Feb 2020</td>
									   <td><div class="progress" style="height: 6px;">
											 <div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 60%"></div>
										   </div></td>
									  </tr>
									  <tr>
									   <td>Hand Watch</td>
									   <td><img src="assets/images/products/05.png" class="product-img-2" alt="product img"></td>
									   <td>#8506790</td>
									   <td><span class="btn btn-outline-danger btn-sm px-4 rounded-5 w-100">Failed</span></td>
									   <td>$1800.00</td>
									   <td>21 Feb 2020</td>
									   <td><div class="progress" style="height: 6px;">
											 <div class="progress-bar bg-gradient-bloody" role="progressbar" style="width: 40%"></div>
										   </div></td>
									  </tr>
									 </tbody>
								   </table>
								   </div>
							</div>
						 </div>  
					</div>
				</div><!--end row-->


				<div class="row">
					<div class="col-12 col-lg-12 col-xl-12 col-xxl-12 d-flex">
					  <div class="card rounded-4 w-100">
						
						 <div class="card-body">
							<div class="row row-cols-1 row-cols-lg-3 g-3">
								<div class="col">
									<div class="card border shadow-none rounded-4 mb-0">
										<div class="card-body text-center">
											 <div id="chart7"></div>  
											<p class="mb-0">New Visits</p>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card border shadow-none rounded-4 mb-0">
										<div class="card-body text-center">
											 <div id="chart8"></div>  
											<p class="mb-0">Bounce Rate</p>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card border shadow-none rounded-4 mb-0">
										<div class="card-body text-center">
											 <div id="chart9"></div>  
											<p class="mb-0">Server Load</p>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card border shadow-none rounded-4 mb-0">
										<div class="card-body text-center">
											 <div id="chart10"></div>  
											<p class="mb-0">Used RAM</p>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card border shadow-none rounded-4 mb-0">
										<div class="card-body text-center">
											 <div id="chart11"></div>  
											<p class="mb-0">Web Traffic</p>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card border shadow-none rounded-4 mb-0">
										<div class="card-body text-center">
											 <div id="chart12"></div>  
											<p class="mb-0">Page Views</p>
										</div>
									</div>
								</div>
							</div><!--end row-->
						 </div>
					   </div>
					</div>
		   
					<div class="col-12 col-xl-12 col-xxl-12 d-flex">
						<div class="card rounded-4 w-100">
							<div class="card-header bg-transparent">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Traffic Referrals</h6>
									</div>
									<div class="dropdown ms-auto">
										<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
										</a>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="javascript:;">Action</a>
											</li>
											<li><a class="dropdown-item" href="javascript:;">Another action</a>
											</li>
											<li>
												<hr class="dropdown-divider">
											</li>
											<li><a class="dropdown-item" href="javascript:;">Something else here</a>
											</li>
										</ul>
									</div>
								</div>
							   </div>
							   <div class="table-responsive p-3">
								<table class="table align-items-center mb-0">
								  <thead class="table-light">
									<tr>
									  <th>Referral</th>
									  <th>Visitors</th>
									  <th>Unique Users</th>
									  <th>Bounce Rate</th>
									</tr>
								  </thead>
								  <tbody>
									<tr>
									  <td>Facebook</td>
									  <td>8,584</td>
									  <td>263</td>
									  <td>12.5% <i class="bx bx-up-arrow-alt ms-2"></i></td>
									</tr>
									<tr>
									  <td>Twetter</td>
									  <td>7,682</td>
									  <td>563</td>
									  <td>32.2% <i class="bx bx-up-arrow-alt ms-2"></i></td>
									</tr>
									<tr>
									  <td>Instagram</td>
									  <td>5,524</td>
									  <td>274</td>
									  <td>14.7% <i class="bx bx-up-arrow-alt ms-2"></i></td>
									</tr>
									<tr>
									  <td>LinkedIn</td>
									  <td>5,574</td>
									  <td>863</td>
									  <td>14.7% <i class="bx bx-up-arrow-alt ms-2"></i></td>
									</tr>
									<tr>
									  <td>Google</td>
									  <td>9,834</td>
									  <td>963</td>
									  <td>14.7% <i class="bx bx-up-arrow-alt ms-2"></i></td>
									</tr>
									<tr>
									  <td>Dribbble</td>
									  <td>6,572</td>
									  <td>897</td>
									  <td>12.7% <i class="bx bx-up-arrow-alt ms-2"></i></td>
									</tr>
									<tr>
									  <td>Behance</td>
									  <td>7,634</td>
									  <td>863</td>
									  <td>11.3% <i class="bx bx-up-arrow-alt ms-2"></i></td>
									</tr>
								  </tbody>
								</table>
							  </div>
						   </div>
					</div>
				 </div><!--end row-->
				



			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode">
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark" checked>
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
	<script src="{{ asset('backend/assets/js/index2.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('backend/assets/js/app.js') }}"></script>
</body>

</html>