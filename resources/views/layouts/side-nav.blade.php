   <!--start sidebar-->
   <aside class="sidebar-wrapper" data-simplebar="true">
       <div class="sidebar-header">
           <div class="logo-icon">
               <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-img" alt="">
           </div>
           <div class="logo-name flex-grow-1">
               <h5 class="mb-0">{{ env('APP_NAME') }}</h5>
           </div>
           <div class="sidebar-close">
               <span class="material-icons-outlined">close</span>
           </div>
       </div>
       <div class="sidebar-nav">
           <!--navigation-->
           <ul class="metismenu" id="sidenav">
               <li>
                   <a href="{{route('dashboard')}}">
                       <div class="parent-icon"><i class="material-icons-outlined">home</i>
                       </div>
                       <div class="menu-title">Dashboard</div>
                   </a>

               </li>


               <li class="menu-label">Invoice</li>


               <li>
                   <a href="{{route('invoices.list')}}">
                       <div class="parent-icon"><i class="material-icons-outlined">shopping_bag</i>
                       </div>
                       <div class="menu-title">My Invoices</div>
                   </a>

               </li>
               <li class="menu-label">Transactions</li>

               <li>
                   <a href="{{route('transactions.list')}}">
                       <div class="parent-icon"><i class="material-icons-outlined">receipt_long</i>
                       </div>
                       <div class="menu-title">Transactions Hisory</div>
                   </a>

               </li>

               <li class="menu-label">Clients</li>

               <li>
                   <a href="javascript:;">
                       <div class="parent-icon"><i class="material-icons-outlined">group_add</i>
                       </div>
                       <div class="menu-title">Add Client</div>
                   </a>

               </li>

               <li>
                   <a href="javascript:;">
                       <div class="parent-icon"><i class="material-icons-outlined">group</i>
                       </div>
                       <div class="menu-title">My Clients</div>
                   </a>

               </li>






           </ul>
           <!--end navigation-->
       </div>
   </aside>
   <!--end sidebar-->
