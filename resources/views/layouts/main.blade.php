<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!--favicon-->
	<link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/header-colors.css') }}" />
	<title>Admin cPanel - PayPaddi</title>
	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-theme bg-theme9">
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">PayPaddi</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{ route('dashboard') }}">
						<div class="parent-icon"><i class="bx bx-home-alt"></i>
						</div>
						<div class="menu-title">Overview</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Bills</div>
					</a>
					<ul>
						<li> <a href="{{ route('transactions') }}"><i class="bx bx-right-arrow-alt"></i>Transactions</a>
						</li>
						<li> <a href="{{ route('airtimes') }}"><i class="bx bx-right-arrow-alt"></i>Airtime Records</a>
						</li>
						<li> <a href="{{ route('datas') }}"><i class="bx bx-right-arrow-alt"></i>Data Records</a>
						</li>
						<li> <a href="{{ route('bettings') }}"><i class="bx bx-right-arrow-alt"></i>Betting Records</a>
						</li>
						<li> <a href="{{ route('educations') }}"><i class="bx bx-right-arrow-alt"></i>Education Records</a>
						</li>
						<li> <a href="{{ route('electricities') }}"><i class="bx bx-right-arrow-alt"></i>Power Records</a>
						</li>
						<li> <a href="{{ route('cables') }}"><i class="bx bx-right-arrow-alt"></i>Cable Records</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-money"></i>
						</div>
						<div class="menu-title">Money</div>
					</a>
					<ul>
						<li> <a href="{{ route('wallets') }}"><i class="bx bx-right-arrow-alt"></i>Wallets</a>
						</li>
						<li> <a href="{{ route('transfers') }}"><i class="bx bx-right-arrow-alt"></i>Transfer Records</a>
						</li>
						<li> <a href="{{ route('beneficiaries') }}"><i class="bx bx-right-arrow-alt"></i>Beneficiaries</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-credit-card"></i>
						</div>
						<div class="menu-title">Cards</div>
					</a>
					<ul>
						<li> <a href="{{ route('cards') }}"><i class="bx bx-right-arrow-alt"></i>Cards</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-user"></i>
						</div>
						<div class="menu-title">Users</div>
					</a>
					<ul>
						<li> <a href="{{ route('users') }}"><i class="bx bx-right-arrow-alt"></i>Users Records</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-anchor"></i>
						</div>
						<div class="menu-title">Regulations</div>
					</a>
					<ul>
						<li> <a href="{{ route('bvns') }}"><i class="bx bx-right-arrow-alt"></i>BVN Records</a>
						<li> <a href="{{ route('ids') }}"><i class="bx bx-right-arrow-alt"></i>Identity Verification</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-mail-send"></i>
						</div>
						<div class="menu-title">BroadCast</div>
					</a>
					<ul>
						<li> <a href="{{ route('newsletter') }}"><i class="bx bx-right-arrow-alt"></i>Send Newsletter</a>
						<li> <a href="{{ route('notification') }}"><i class="bx bx-right-arrow-alt"></i>Send Notification</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="{{ route('settings') }}">
						<div class="parent-icon"><i class="bx bx-wrench"></i>
						</div>
						<div class="menu-title">Settings</div>
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
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="https://avatars.dicebear.com/api/initials/{{ Auth::user()->firstname." ".Auth::user()->lastname }}.svg" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{ Auth::user()->firstname." ".Auth::user()->lastname }}</p>
								<p class="designattion mb-0">Administrator</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="{{ route('settings') }}"><i class="bx bx-cog"></i><span>Settings</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="{{ route('logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		

        @yield('content')
		
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
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<!-- Bootstrap JS -->
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('assets/js/app.js') }}"></script>
	<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
	</script>
	<script>
		tinymce.init({
		  selector: '#mytextarea'
		});
	</script>
	@stack('scripts')
</body>

</html>