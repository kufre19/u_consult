  <!--start header-->
  <header class="top-header">
      <nav class="navbar navbar-expand justify-content-between align-items-center">
          <div class="btn-toggle">
              <a href="javascript:;"><i class="fa fa-bars" aria-hidden="true"></i>
              </a>
          </div>
          {{-- <div class="search-bar flex-grow-1">
              <div class="position-relative">
                  <input class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="text"
                      placeholder="Search">
                  <span
                      class="material-icons-outlined position-absolute d-lg-block d-none ms-3 translate-middle-y start-0 top-50">search</span>
                  <span
                      class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 search-close">close</span>
                  <div class="search-popup p-3">
                      <div class="card rounded-4 overflow-hidden">
                          <div class="card-header d-lg-none">
                              <div class="position-relative">
                                  <input class="form-control rounded-5 px-5 mobile-search-control" type="text"
                                      placeholder="Search">
                                  <span
                                      class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                                  <span
                                      class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 mobile-search-close">close</span>
                              </div>
                          </div>
                          <div class="card-body search-content">
                              <p class="search-title">Recent Searches</p>
                              <div class="d-flex align-items-start flex-wrap gap-2 kewords-wrapper">
                                  <a href="javascript:;" class="kewords"><span>Angular Template</span><i
                                          class="material-icons-outlined fs-6">search</i></a>
                                  <a href="javascript:;" class="kewords"><span>Dashboard</span><i
                                          class="material-icons-outlined fs-6">search</i></a>
                                  <a href="javascript:;" class="kewords"><span>Admin Template</span><i
                                          class="material-icons-outlined fs-6">search</i></a>
                                  <a href="javascript:;" class="kewords"><span>Bootstrap 5 Admin</span><i
                                          class="material-icons-outlined fs-6">search</i></a>
                                  <a href="javascript:;" class="kewords"><span>Html eCommerce</span><i
                                          class="material-icons-outlined fs-6">search</i></a>
                                  <a href="javascript:;" class="kewords"><span>Sass</span><i
                                          class="material-icons-outlined fs-6">search</i></a>
                                  <a href="javascript:;" class="kewords"><span>laravel 9</span><i
                                          class="material-icons-outlined fs-6">search</i></a>
                              </div>
                              <hr>
                              <p class="search-title">Tutorials</p>
                              <div class="search-list d-flex flex-column gap-2">
                                  <div class="search-list-item d-flex align-items-center gap-3">
                                      <div class="list-icon">
                                          <i class="material-icons-outlined fs-5">play_circle</i>
                                      </div>
                                      <div class="">
                                          <h5 class="mb-0 search-list-title ">Wordpress Tutorials</h5>
                                      </div>
                                  </div>
                                  <div class="search-list-item d-flex align-items-center gap-3">
                                      <div class="list-icon">
                                          <i class="material-icons-outlined fs-5">shopping_basket</i>
                                      </div>
                                      <div class="">
                                          <h5 class="mb-0 search-list-title">eCommerce Website Tutorials</h5>
                                      </div>
                                  </div>

                                  <div class="search-list-item d-flex align-items-center gap-3">
                                      <div class="list-icon">
                                          <i class="material-icons-outlined fs-5">laptop</i>
                                      </div>
                                      <div class="">
                                          <h5 class="mb-0 search-list-title">Responsive Design</h5>
                                      </div>
                                  </div>
                              </div>

                              <hr>
                              <p class="search-title">Members</p>

                              <div class="search-list d-flex flex-column gap-2">
                                  <div class="search-list-item d-flex align-items-center gap-3">
                                      <div class="memmber-img">
                                          <img src="assets/images/avatars/01.png" width="32" height="32"
                                              class="rounded-circle" alt="">
                                      </div>
                                      <div class="">
                                          <h5 class="mb-0 search-list-title ">Andrew Stark</h5>
                                      </div>
                                  </div>

                                  <div class="search-list-item d-flex align-items-center gap-3">
                                      <div class="memmber-img">
                                          <img src="assets/images/avatars/02.png" width="32" height="32"
                                              class="rounded-circle" alt="">
                                      </div>
                                      <div class="">
                                          <h5 class="mb-0 search-list-title ">Snetro Jhonia</h5>
                                      </div>
                                  </div>

                                  <div class="search-list-item d-flex align-items-center gap-3">
                                      <div class="memmber-img">
                                          <img src="assets/images/avatars/03.png" width="32" height="32"
                                              class="rounded-circle" alt="">
                                      </div>
                                      <div class="">
                                          <h5 class="mb-0 search-list-title">Michle Clark</h5>
                                      </div>
                                  </div>

                              </div>
                          </div>
                          <div class="card-footer text-center bg-transparent">
                              <a href="javascript:;" class="btn w-100">See All Search Results</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div> --}}
          <ul class="navbar-nav gap-1 nav-left-links align-items-center">
              {{-- <li class="nav-item d-lg-none mobile-search-btn">
                  <a class="nav-link" href="javascript:;"><i class="material-icons-outlined">search</i></a>
              </li> --}}
            

            
              <li class="nav-item dropdown align-item-left">
                  <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                      data-bs-auto-close="outside" data-bs-toggle="dropdown" href="javascript:;"><i class="fa fa-bell fa-lg" aria-hidden="true"></i>

                      {{-- <span class="badge-notify">5</span> --}}
                  </a>
                  <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
                      <div class="px-3 py-1 d-flex align-items-center justify-content-between border-bottom">
                          <h5 class="notiy-title mb-0">Notifications</h5>
                        
                      </div>
                      <div class="notify-list">
                          {{-- <div>
                              <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                  <div class="d-flex align-items-center gap-3">
                                      <div class="">
                                          <img src="assets/images/avatars/01.png" class="rounded-circle"
                                              width="45" height="45" alt="">
                                      </div>
                                      <div class="">
                                          <h5 class="notify-title">Congratulations Jhon</h5>
                                          <p class="mb-0 notify-desc">Many congtars jhon. You have won the gifts.</p>
                                          <p class="mb-0 notify-time">Today</p>
                                      </div>
                                      <div class="notify-close position-absolute end-0 me-3">
                                          <i class="material-icons-outlined fs-6">close</i>
                                      </div>
                                  </div>
                              </a>
                          </div> --}}
                     
                       
                    
                      </div>
                  </div>
              </li>
             
              <li class="nav-item dropdown">
                  <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                      <img src="{{asset('assets/images/avatars/sample-user.png')}}" class="rounded-circle p-1 border" width="45"
                          height="45" alt="">
                  </a>
                  <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                      
                    
                      <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"> <i class="fa fa-cog"></i> Setting</a>
                    
                      <hr class="dropdown-divider">
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                      <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('logout') }}"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="fa fa-sign-out" aria-hidden="true"></i>
                      Logout</a>
                  </div>
              </li>
          </ul>

      </nav>
  </header>
  <!--end top header-->
