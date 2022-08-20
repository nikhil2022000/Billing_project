<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="{{'design/img/fav.png'}}">

		<!-- Title -->
		<title>Billing Project</title>


		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="{{'design/css/bootstrap.min.css'}}">
		
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="{{'design/fonts/style.css'}}">

		<!-- Main css -->
		<link rel="stylesheet" href="{{'design/css/main.css'}}">


		<!-- *************
			************ Vendor Css Files *************
		************ -->

		<!-- Mega Menu -->
		<link rel="stylesheet" href="{{'design/vendor/megamenu/css/megamenu.css'}}">

		<!-- Search Filter JS -->
		<link rel="stylesheet" href="{{'design/vendor/search-filter/search-filter.css'}}">
		<link rel="stylesheet" href="{{'design/vendor/search-filter/custom-search-filter.css'}}">
		  <!-- Data Tables -->
		  <link rel="stylesheet" href="{{'design/vendor/datatables/dataTables.bs4.css'}}" />
		<link rel="stylesheet" href="{{'design/vendor/datatables/dataTables.bs4-custom.css'}}" />
		<link rel="stylesheet" href="{{'design/vendor/datatables/buttons.bs.css'}}" />

		
	</head>
	<body>

		<!-- Loading wrapper start -->
		<div id="loading-wrapper">
			<div class="spinner-border"></div>
			Loading...
		</div>
		<div class="page-wrapper">
			
		
			<!-- *************
				************ Main container start *************
			************* -->
			<div class="main-container" style="padding: 0 0 0 0px;">

				<!-- Page header starts -->
				<div class="page-header">
					
					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-9">

							<!-- Search container start -->
							<div class="search-container">

								<!-- Toggle sidebar start -->
								<div class="toggle-sidebar" id="toggle-sidebar">
									<i class="icon-menu"></i>
								</div>
								<!-- Toggle sidebar end -->

								<!-- Mega Menu Start -->
								<div class="cd-dropdown-wrapper">
									<a class="cd-dropdown-trigger" href="#0"><i class="icon-menu menu-icon"></i><span class="menu-text">Megamenu</span></a>
									<nav class="cd-dropdown">

										<ul class="cd-dropdown-content">
											<li class="ha"><a href="home">Dashboard</a></li>
											<li class="has-children">
												<a href="#">Add New Number</a>
												<ul class="cd-secondary-dropdown is-hidden">
													
													<li class="has-children"  style="width: 351px;">
														<a href="#">Adding Billing Details</a>
														<ul class="is-hidden">
															<li>
																<a href="index">Create New Billing Id</a>
															</li>
															<li>
																<a href="mini_master">Add New Nubmer to Existing Billing ID</a>
															</li>
														</ul>
													</li>
													
												</ul>
											</li>

											<li class="has-children">
												<a href="#">Dropdowns</a>

												<ul class="cd-secondary-dropdown is-hidden" style="width: 251px;">
													<li class="has-children">
														<a href="#">Form Layouts</a>
														<ul class="is-hidden">
															<li>
																<a href="bill_categories">Categories</a>
															</li>
															<li>
																<a href="Opratores_set">Operator</a>
															</li>
															<li>
																<a href="payment_units">Payment Units</a>
															</li>
															<li>
																<a href="relation_set">Relationship Nummber</a>
															</li>
															<li>
																<a href="emp">Users</a>
															</li>
															<li>
																<a href="branch">Branches</a>
															</li>
														</ul>
													</li>

													
												</ul>
											</li>

											<li class="has-children">
												<a href="#">View Nubmers List</a>

												<ul class="cd-secondary-dropdown is-hidden" style="width: 251px;">

													<li class="has-children">
														<a href="#">Show Details</a>
														<ul class="is-hidden">
															<li>
																<a href="show">Billing ID Wise</a>
															</li>
															<li>
																<a href="show_number_details">Mobile number Wise</a>
															</li>
															<li>
																<a href="full_details">full list number show</a>
															</li>
															<li>
																<a href="monthly_table_show">Monthly list number</a>
															</li>
														</ul>
													</li>

													
												</ul>
											</li>

											

												
											
										</ul>
										
									</nav>
								</div>
								<!-- Mega Menu End -->

								<!-- Search input group start -->
								<div class="ui fluid category search">
									<div class="ui icon input">
										<input class="prompt" type="text" placeholder="Search">
										<i class="search icon icon-search1"></i>
									</div>
									<div class="results"></div>
								</div>
								<!-- Search input group end -->

							</div>
							<!-- Search container end -->

						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-3">

							<!-- Header actions start -->
							<ul class="header-actions">

								<li class="dropdown">
									<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
										<span class="avatar">
											<img src="{{'design/img/user.svg'}}" alt="User Avatar">
											<span class="status busy"></span>
										</span>
									</a>
									<div class="dropdown-menu dropdown-menu-end md" aria-labelledby="userSettings" style="width: 0rem;">
										<div class="header-profile-actions">
										<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
										</div>
									</div>
								</li>
							</ul>
							<!-- Header actions end -->

						</div>
					</div>
					<!-- Row end -->					

				</div>
				<!-- Page header ends -->