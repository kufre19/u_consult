<!DOCTYPE html>
<html lang="en">

  
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{env('APP_NAME')}}</title>

    <!-- Meta -->


    <!-- *************
			************ CSS Files *************
		************* -->
    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="assets/fonts/icomoon/style.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/main.min.css" />

    <!-- *************
			************ Vendor Css Files *************
		************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css" />
  </head>

  <body>

    <!-- Page wrapper start -->
    <div class="page-wrapper">

      <!-- App container starts -->
      <div class="app-container">

        <!-- App header starts -->
        <div class="app-header d-flex align-items-center">

          <!-- Container starts -->
          <div class="container">

            <!-- Row starts -->
            <div class="row">
              <div class="col-md-3 col-2">

                <!-- App brand starts -->
                <div class="app-brand">
                  <a href="index.html" class="d-lg-block d-none">
                    <img src="assets/images/logo.svg" class="logo" alt="Bootstrap Gallery" />
                  </a>
                  <a href="index.html" class="d-lg-none d-md-block">
                    <img src="assets/images/logo-sm.svg" class="logo" alt="Bootstrap Gallery" />
                  </a>
                </div>
                <!-- App brand ends -->

              </div>

              <div class="col-md-9 col-10">
                <!-- App header actions start -->
                <div class="header-actions d-flex align-items-center justify-content-end">

                  <!-- Search container start -->
                  <div class="search-container d-none d-lg-block">
                    <input type="text" class="form-control" placeholder="Search" id="searchAny" />
                    <i class="icon-search"></i>
                  </div>
                  <!-- Search container end -->

                  <div class="dropdown">
                    <a class="dropdown-toggle d-flex p-2 position-relative" href="#!" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="assets/images/flags/1x1/br.svg" class="flag-img" alt="Brazil" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-mini">
                      <div class="country-container">
                        <a href="index.html" class="py-2">
                          <img src="assets/images/flags/1x1/us.svg" alt="Admin Template" />
                        </a>
                        <a href="index.html" class="py-2">
                          <img src="assets/images/flags/1x1/in.svg" alt="Admin Template" />
                        </a>
                        <a href="index.html" class="py-2">
                          <img src="assets/images/flags/1x1/tr.svg" alt="Admin Template" />
                        </a>
                        <a href="index.html" class="py-2">
                          <img src="assets/images/flags/1x1/gb.svg" alt="Admin Dashboard" />
                        </a>
                        <a href="index.html" class="py-2">
                          <img src="assets/images/flags/1x1/id.svg" alt="Admin Dashboard" />
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="dropdown d-sm-block d-none">
                    <a class="dropdown-toggle d-flex p-3 position-relative" href="#!" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="icon-mail fs-4 lh-1"></i>
                      <span class="count rounded-circle bg-danger">9</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-md shadow-sm">
                      <h5 class="fw-semibold px-3 py-2 m-0">Messages</h5>
                      <div class="scroll300">
                        <div class="d-grid gap-3 p-3">
                          <a href="javascript:void(0)">
                            <div class="d-flex align-items-start">
                              <div class="icons-box md bg-danger rounded-circle me-3">
                                MS
                              </div>
                              <div class="m-0">
                                <h6>Bridgett Alvarado</h6>
                                <p class="mb-1">Membership has been ended. Please check your mail.</p>
                                <p class="m-0 opacity-50">3 mins ago</p>
                              </div>
                            </div>
                          </a>
                          <a href="javascript:void(0)">
                            <div class="d-flex align-items-start">
                              <div class="icons-box md bg-info rounded-circle me-3">
                                KY
                              </div>
                              <div class="m-0">
                                <h6>Miranda Pollard</h6>
                                <p class="mb-1">Apex application is down, need support.</p>
                                <p class="m-0 opacity-50">5 mins ago</p>
                              </div>
                            </div>
                          </a>
                          <a href="javascript:void(0)">
                            <div class="d-flex align-items-start">
                              <div class="icons-box md bg-success rounded-circle me-3">
                                SB
                              </div>
                              <div class="m-0">
                                <h6>Srinu Basava</h6>
                                <p class="mb-1">Purchased a NotePad, working perfect.</p>
                                <p class="m-0 opacity-50">7 mins ago</p>
                              </div>
                            </div>
                          </a>
                          <a href="javascript:void(0)">
                            <div class="d-flex align-items-start">
                              <div class="icons-box md bg-danger rounded-circle me-3">
                                SB
                              </div>
                              <div class="m-0">
                                <h6>Murray Patrick</h6>
                                <p class="mb-1">Created a new App and launching soon.</p>
                                <p class="m-0 opacity-50">9 mins ago</p>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="d-grid p-3 border-top">
                        <a href="javascript:void(0)" class="btn btn-outline-primary">View all</a>
                      </div>
                    </div>
                  </div>
                  <div class="dropdown d-sm-block d-none">
                    <a class="dropdown-toggle d-flex p-3 position-relative" href="#!" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="icon-twitch fs-4 lh-1"></i>
                      <span class="count rounded-circle bg-danger">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-md shadow-sm">
                      <h5 class="fw-semibold px-3 py-2 m-0">Notifications</h5>
                      <div class="scroll300">
                        <div class="d-grid gap-3 p-3">
                          <a href="javascript:void(0)">
                            <div class="d-flex align-items-start py-2">
                              <img src="assets/images/user.png" class="img-3x me-3 rounded-3"
                                alt="Bootstrap Admin Template" />
                              <div class="m-0">
                                <h6>Hyman Mayer</h6>
                                <p class="mb-1">Membership has been ended.</p>
                                <p class="m-0 opacity-50">Today, 07:30pm</p>
                              </div>
                            </div>
                          </a>
                          <a href="javascript:void(0)">
                            <div class="d-flex align-items-start py-2">
                              <img src="assets/images/user2.png" class="img-3x me-3 rounded-3"
                                alt="Dark Admin Template" />
                              <div class="m-0">
                                <h6>Vernon Osborn</h6>
                                <p class="mb-1">Congratulate, James for new job.</p>
                                <p class="m-0 opacity-50">Today, 08:00pm</p>
                              </div>
                            </div>
                          </a>
                          <a href="javascript:void(0)">
                            <div class="d-flex align-items-start py-2">
                              <img src="assets/images/user1.png" class="img-3x me-3 rounded-3"
                                alt="Dark Admin Template" />
                              <div class="m-0">
                                <h6>Jackie Greer</h6>
                                <p class="mb-1">Lewis added new schedule release.</p>
                                <p class="m-0 opacity-50">Today, 09:30pm</p>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="d-grid p-3 border-top">
                        <a href="javascript:void(0)" class="btn btn-outline-primary">View all</a>
                      </div>
                    </div>
                  </div>
                  <div class="dropdown ms-2">
                    <a class="dropdown-toggle d-flex align-items-center user-settings" href="#!" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <span class="d-none d-md-block">Kasey Petersen</span>
                      <img src="assets/images/user5.png" class="img-3x m-2 me-0 rounded-5" alt="Bootstrap Gallery" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-sm shadow-sm gap-3">
                      <a class="dropdown-item d-flex align-items-center py-2" href="agent-profile.html"><i
                          class="icon-smile fs-4 me-3"></i>User Profile</a>
                      <a class="dropdown-item d-flex align-items-center py-2" href="account-settings.html"><i
                          class="icon-settings fs-4 me-3"></i>Account
                        Settings</a>
                      <a class="dropdown-item d-flex align-items-center py-2" href="login.html"><i
                          class="icon-log-out fs-4 me-3"></i>Logout</a>
                    </div>
                  </div>

                  <!-- Toggle Menu starts -->
                  <button class="btn btn-success btn-sm ms-3 d-lg-none d-md-block" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#MobileMenu">
                    <i class="icon-menu"></i>
                  </button>
                  <!-- Toggle Menu ends -->

                </div>
                <!-- App header actions end -->

              </div>
            </div>
            <!-- Row ends -->

          </div>
          <!-- Container ends -->

        </div>
        <!-- App header ends -->

        <!-- App navbar starts -->
        <nav class="navbar navbar-expand-lg p-0">
          <div class="container">
            <div class="offcanvas offcanvas-end" id="MobileMenu">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title semibold">Navigation</h5>
                <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="offcanvas">
                  <i class="icon-clear"></i>
                </button>
              </div>
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown active-link">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Dashboards
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item current-page" href="index.html">
                        <span>Analytics</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="reports.html">
                        <span>Reports</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Tickets
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="all-tickets.html">
                        <span>All Tickets</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="open-tickets.html"><span>Open Tickets</span></a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="pending-tickets.html"><span>Pending Tickets</span></a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="closed-tickets.html"><span>Closed Tickets</span></a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="solved-tickets.html"><span>Solved Tickets</span></a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="clients.html"> Clients </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="agents.html"> Agents </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Pages
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="agent-profile.html">
                        <span>Agent Profile</span></a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="starter-page.html">
                        <span>Starter Page</span></a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="client-list.html">
                        <span>Client List</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="create-invoice.html">
                        <span>Create Invoice</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="invoice.html">
                        <span>Invoice Details</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="invoice-list.html">
                        <span>Invoice List</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="faq.html">
                        <span>FAQ</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="contact-us.html">
                        <span>Contact Us</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="notifications.html">
                        <span>Notifications</span></a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="subscribers.html">
                        <span>Subscribers</span></a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="placeholder.html">
                        <span>Placeholder</span></a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="account-settings.html">
                        <span>Account Settings</span></a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    UI Elements
                  </a>
                  <ul class="dropdown-menu mega-menu">
                    <li>
                      <a class="dropdown-item" href="accordions.html">
                        <span>Accordions</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="alerts.html">
                        <span>Alerts</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="buttons.html">
                        <span>Buttons</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="badges.html">
                        <span>Badges</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="cards.html">
                        <span>Cards</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="custom-cards.html">
                        <span>Custom Cards</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="carousel.html">
                        <span>Carousel</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="icons.html">
                        <span>Icons</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="list-items.html">
                        <span>List Items</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="modals.html">
                        <span>Modals</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="progress.html">
                        <span>Progress Bars</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="popovers.html">
                        <span>Popovers</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="tables.html">
                        <span>Tables</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="tabs.html">
                        <span>Tabs</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="tooltips.html">
                        <span>Tooltips</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="typography.html">
                        <span>Typography</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Forms
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="form-inputs.html"><span>Basic Inputs</span></a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="form-checkbox-radio.html"><span>Checkbox &amp; Radio</span></a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="form-file-input.html"><span>File Input</span></a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="form-validations.html"><span>Validations</span></a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="form-layouts.html">Form Layouts</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Plugins
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="apex.html"><span>Apex Graphs</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="morris.html"><span>Morris Graphs</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="editor.html"><span>Editor</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="calendar.html"><span>Calendar Daygrid View</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="calendar-external-draggable.html"><span>Calendar External
                          Draggable</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="calendar-google.html"><span>Calendar Google</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="calendar-list-view.html"><span>Calendar List View</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="calendar-selectable.html"><span>Calendar Selectable</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="date-time-pickers.html"><span>Date Time Pickers</span></a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="datatables.html"><span>Data Tables</span></a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="maps.html"><span>Maps</span></a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Login
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="login.html">
                        <span>Login</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="signup.html">
                        <span>Signup</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="forgot-password.html">
                        <span>Forgot Password</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="page-not-found.html">
                        <span>Page Not Found</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="maintenance.html">
                        <span>Maintenance</span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- App Navbar ends -->

        <!-- App body starts -->
        <div class="app-body">

          <!-- Container starts -->
          <div class="container">

            <!-- Row start -->
            <div class="row">
              <div class="col-12 col-xl-6">

                <!-- Breadcrumb start -->
                <ol class="breadcrumb mb-3">
                  <li class="breadcrumb-item">
                    <i class="icon-house_siding lh-1"></i>
                    <a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item">Dashboards</li>
                  <li class="breadcrumb-item">Analytics</li>
                </ol>
                <!-- Breadcrumb end -->
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="row gx-2">
              <div class="col-xl-6 col-12">
                <!-- Row start -->
                <div class="row gx-2">
                  <div class="col-12">
                    <div class="card mb-2">
                      <div class="card-header">
                        <h5 class="card-title">Tickets</h5>
                      </div>
                      <div class="card-body">
                        <div id="ticketsData"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-12">
                    <div class="card mb-2">
                      <div class="card-header">
                        <h5 class="card-title">Today's Tickets</h5>
                      </div>
                      <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                          <span>Completed</span>
                          <span class="fw-bold">75%</span>
                        </div>
                        <div class="progress small">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-12">
                    <div class="card mb-2">
                      <div class="card-header">
                        <h5 class="card-title">New Tickets</h5>
                      </div>
                      <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                          <span>Assigned</span>
                          <span class="fw-bold">5</span>
                        </div>
                        <div class="progress small">
                          <div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Row end -->
              </div>
              <div class="col-xl-6 col-12">
                <div class="row gx-2">
                  <div class="col-sm-4 col-6">
                    <div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
                      <div class="position-relative shape-block">
                        <img src="assets/images/shape1.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
                        <i class="icon-book-open text-white"></i>
                      </div>
                      <div class="ms-2">
                        <h3 class="m-0 fw-semibold">27</h3>
                        <h6 class="m-0 text-light">Active</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4 col-6">
                    <div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
                      <div class="position-relative shape-block">
                        <img src="assets/images/shape2.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
                        <i class="icon-check-circle text-white"></i>
                      </div>
                      <div class="ms-2">
                        <h3 class="m-0 fw-semibold">18</h3>
                        <h6 class="m-0 text-light">Solved</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4 col-6">
                    <div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
                      <div class="position-relative shape-block">
                        <img src="assets/images/shape3.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
                        <i class="icon-x-circle text-white"></i>
                      </div>
                      <div class="ms-2">
                        <h3 class="m-0 fw-semibold">12</h3>
                        <h6 class="m-0 text-light">Closed</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4 col-6">
                    <div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
                      <div class="position-relative shape-block">
                        <img src="assets/images/shape4.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
                        <i class="icon-add_task text-white"></i>
                      </div>
                      <div class="ms-2">
                        <h3 class="m-0 fw-semibold">3</h3>
                        <h6 class="m-0 text-light">Open</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4 col-6">
                    <div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
                      <div class="position-relative shape-block">
                        <img src="assets/images/shape5.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
                        <i class="icon-alert-triangle text-white"></i>
                      </div>
                      <div class="ms-2">
                        <h3 class="m-0 fw-semibold">5</h3>
                        <h6 class="m-0 text-light">Critical</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4 col-6">
                    <div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
                      <div class="position-relative shape-block">
                        <img src="assets/images/shape6.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
                        <i class="icon-access_time text-white"></i>
                      </div>
                      <div class="ms-2">
                        <h3 class="m-0 fw-semibold">7</h3>
                        <h6 class="m-0 text-light">High</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card mb-2">
                      <div class="card-header">
                        <h5 class="card-title">Avg. Response Time</h5>
                      </div>
                      <div class="card-body">
                        <div id="avgTimeData"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="row gx-2">
              <div class="col-xl-4 col-md-6 col-sm-12 col-12">
                <div class="card mb-2">
                  <div class="card-header">
                    <h5 class="card-title">Live Calls</h5>
                  </div>
                  <div class="card-body">
                    <div id="liveCallsData"></div>

                    <div class="d-flex justify-content-center gap-4 my-4">
                      <div class="d-flex align-items-center">
                        <i class="icon-phone-incoming me-3"></i> Incoming
                        <span class="badge rounded-pill bg-primary ms-2">15</span>
                      </div>
                      <div class="d-flex align-items-center">
                        <i class="icon-phone-outgoing me-3"></i> Outgoing
                        <span class="badge rounded-pill bg-secondary ms-2">18</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6 col-sm-12 col-12">
                <div class="card mb-2">
                  <div class="card-header">
                    <h5 class="card-title">Agents Online</h5>
                  </div>
                  <div class="card-body">
                    <div id="agentsLiveData"></div>

                    <div class="d-flex justify-content-center gap-4 my-4">
                      <div class="d-flex align-items-center">
                        Busy
                        <span class="badge rounded-pill bg-primary ms-2">15</span>
                      </div>
                      <div class="d-flex align-items-center">
                        Online
                        <span class="badge rounded-pill bg-secondary ms-2">18</span>
                      </div>
                      <div class="d-flex align-items-center">
                        Offline
                        <span class="badge rounded-pill bg-dark ms-2">13</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-sm-12 col-12">
                <div class="card mb-2">
                  <div class="card-header">
                    <h5 class="card-title">Tickets by Priority</h5>
                  </div>
                  <div class="card-body">
                    <div id="lticketsPriorityData"></div>

                    <div class="d-flex justify-content-center gap-4 my-4">
                      <div class="d-flex align-items-center">
                        High
                        <span class="badge rounded-pill bg-primary ms-2">15</span>
                      </div>
                      <div class="d-flex align-items-center">
                        Medium
                        <span class="badge rounded-pill bg-secondary ms-2">18</span>
                      </div>
                      <div class="d-flex align-items-center">
                        Low
                        <span class="badge rounded-pill bg-dark ms-2">13</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="row gx-2">
              <div class="col-xl-6 col-lg-12 col-12">
                <div class="card mb-2">
                  <div class="card-header">
                    <h5 class="card-title">Top 5 Agents</h5>
                  </div>
                  <div class="card-body">
                    <div class="table-outer">
                      <div class="table-responsive">
                        <table class="table align-middle m-0">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Agent</th>
                              <th>Tickets</th>
                              <th>Time Spent</th>
                              <th>Feedback</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>
                                <div class="fw-semibold">Elisa Shah</div>
                              </td>
                              <td>
                                <span class="badge bg-primary">54</span>
                              </td>
                              <td>
                                <span class="badge border">2 Hrs 30 Mins</span>
                              </td>
                              <td>
                                <div class="starReadOnly1 rating-stars my-2"></div>
                              </td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>
                                <div class="fw-semibold">Ladonna Jones</div>
                              </td>
                              <td>
                                <span class="badge bg-primary">49</span>
                              </td>
                              <td>
                                <span class="badge border">2 Hrs 21 Mins</span>
                              </td>
                              <td>
                                <div class="starReadOnly2 rating-stars my-2"></div>
                              </td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>
                                <div class="fw-semibold">Jewel Alexander</div>
                              </td>
                              <td>
                                <span class="badge bg-primary">45</span>
                              </td>
                              <td>
                                <span class="badge border">2 Hrs 15 Mins</span>
                              </td>
                              <td>
                                <div class="starReadOnly1 rating-stars my-2"></div>
                              </td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>
                                <div class="fw-semibold">Rich Spears</div>
                              </td>
                              <td>
                                <span class="badge bg-primary">42</span>
                              </td>
                              <td>
                                <span class="badge border">2 Hrs 10 Mins</span>
                              </td>
                              <td>
                                <div class="starReadOnly1 rating-stars my-2"></div>
                              </td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>
                                <div class="fw-semibold">Shelly Daniel</div>
                              </td>
                              <td>
                                <span class="badge bg-primary">38</span>
                              </td>
                              <td>
                                <span class="badge border">2Hrs 05Mins</span>
                              </td>
                              <td>
                                <div class="starReadOnly1 rating-stars my-2"></div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-12">
                <div class="card mb-2">
                  <div class="card-header">
                    <h5 class="card-title">Feedback</h5>
                  </div>
                  <div class="card-body">
                    <div class="scroll300">
                      <div class="my-2">
                        <div class="d-flex align-items-start">
                          <div class="media-box me-3 bg-primary rounded-5">
                            <i class="icon-thumbs-up"></i>
                          </div>
                          <div class="mb-4">
                            <h5>Christian Ochoa</h5>
                            <p class="mb-1">Amazing</p>
                            <p class="m-0 text-light">3 mins ago</p>
                          </div>
                        </div>
                        <div class="d-flex align-items-start">
                          <div class="media-box me-3 bg-primary rounded-5">
                            <i class="icon-thumbs-up"></i>
                          </div>
                          <div class="mb-4">
                            <h5>Marci Aguirre</h5>
                            <p class="mb-1">
                              Great as always. All sorted with in a short time.
                            </p>
                            <p class="m-0 text-light">5 mins ago</p>
                          </div>
                        </div>
                        <div class="d-flex align-items-start">
                          <div class="media-box me-3 bg-primary rounded-5">
                            <i class="icon-thumbs-up"></i>
                          </div>
                          <div class="mb-4">
                            <h5>Rico Barry</h5>
                            <p class="mb-1">All sorted with in a short time.</p>
                            <p class="m-0 text-light">5 mins ago</p>
                          </div>
                        </div>
                        <div class="d-flex align-items-start">
                          <div class="media-box me-3 bg-primary rounded-5">
                            <i class="icon-thumbs-up"></i>
                          </div>
                          <div class="mb-4">
                            <h5>Dawn Shepherd</h5>
                            <p class="mb-1">Great support guys</p>
                            <p class="m-0 text-light">6 mins ago</p>
                          </div>
                        </div>
                        <div class="d-flex align-items-start">
                          <div class="media-box me-3 bg-danger rounded-5">
                            <i class="icon-thumbs-down"></i>
                          </div>
                          <div class="mb-4">
                            <h5>Heidi Ali</h5>
                            <p class="mb-1">Sorry guys</p>
                            <p class="m-0 text-light">6 mins ago</p>
                          </div>
                        </div>
                        <div class="d-flex align-items-start">
                          <div class="media-box me-3 bg-primary rounded-5">
                            <i class="icon-thumbs-up"></i>
                          </div>
                          <div class="mb-4">
                            <h5>Julio Olson</h5>
                            <p class="mb-1">Awesome support</p>
                            <p class="m-0 text-light">9 mins ago</p>
                          </div>
                        </div>
                        <div class="d-flex align-items-start">
                          <div class="media-box me-3 bg-primary rounded-5">
                            <i class="icon-thumbs-up"></i>
                          </div>
                          <div class="mb-4">
                            <h5>Lily Lyons</h5>
                            <p class="mb-1">Thanks</p>
                            <p class="m-0 text-light">9 mins ago</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-12">
                <div class="card mb-2">
                  <div class="card-header">
                    <h5 class="card-title">New & Closed</h5>
                  </div>
                  <div class="card-body">
                    <div id="newClosedGraph"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row end -->

          </div>
          <!-- Container ends -->

        </div>
        <!-- App body ends -->

        <!-- App footer start -->
        <div class="app-footer">
          <div class="container">
            <span>© Bootstrap Gallery 2024</span>
          </div>
        </div>
        <!-- App footer end -->

      </div>
      <!-- App container ends -->

    </div>
    <!-- Page wrapper end -->

    <!-- *************
			************ JavaScript Files *************
		************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <!-- *************
			************ Vendor Js Files *************
		************* -->

    <!-- Overlay Scroll JS -->
    <script src="{{asset('assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('assets/vendor/overlay-scroll/custom-scrollbar.js')}}"></script>


    <!-- Custom JS files -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
  </body>


</html>