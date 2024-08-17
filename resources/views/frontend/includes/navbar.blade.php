<nav class="navbar py-lg-4 py-3 px-0 border-bottom navbar-menu third-bg" >
    <div class="container-fluid">
       <div class="row w-100 align-items-center g-0 gx-lg-3">
          <div class="col-xxl-9 col-lg-8">
             <div class="d-flex align-items-center">
                <button class="navbar-toggler collapsed d-none d-lg-block" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar-default2" aria-controls="navbar-default2">
                   <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-text-indent-right text-primary" viewBox="0 0 16 16">
                      <path
                         d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm10.646 2.146a.5.5 0 0 1 .708.708L11.707 8l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zM2 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                   </svg>
                </button>
                <a class="navbar-brand d-none d-lg-block ms-4" href="{{url('/')}}">
                   <img src="{{asset('ui/frontend')}}/assets/images/logo/freshcart-logo.svg" alt="eCommerce" />
                </a>
                <div class="d-flex w-100 ms-4">
                   <form action="#" class="w-100 d-none d-lg-block">
                      <div class="input-group">
                         <input class="form-control rounded" type="search" placeholder="Search for products" />
                         <span class="input-group-append">
                            <button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end" type="button">
                               <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="16"
                                  height="16"
                                  viewBox="0 0 24 24"
                                  fill="none"
                                  stroke="currentColor"
                                  stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  class="feather feather-search">
                                  <circle cx="11" cy="11" r="8"></circle>
                                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                               </svg>
                            </button>
                         </span>
                      </div>
                   </form>
                </div>
             </div>
             <div class="d-flex justify-content-between w-100 d-lg-none align-items-center">
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar-default2" aria-controls="navbar-default2">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-text-indent-left text-primary" viewBox="0 0 16 16">
                      <path
                         d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                   </svg>
                </button>
                <a class="navbar-brand" href="{{asset('ui/frontend')}}/https://freshcart.codescandy.com/index.html">
                   <img src="{{asset('ui/frontend')}}/https://freshcart.codescandy.com/assets/images/logo/freshcart-logo.svg" alt="eCommerce HTML Template" />
                </a>
                <div class="d-flex align-items-center lh-1">
                   <div class="list-inline me-2">
                      <div class="list-inline-item">
                         <a href="{{asset('ui/frontend')}}/#!" class="text-muted" data-bs-toggle="modal" data-bs-target="#userModal">
                            <svg
                               xmlns="http://www.w3.org/2000/svg"
                               width="20"
                               height="20"
                               viewBox="0 0 24 24"
                               fill="none"
                               stroke="currentColor"
                               stroke-width="2"
                               stroke-linecap="round"
                               stroke-linejoin="round"
                               class="feather feather-user">
                               <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                               <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                         </a>
                      </div>
                      <div class="list-inline-item">
                         <a class="text-muted position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" href="{{asset('ui/frontend')}}/#offcanvasExample" role="button" aria-controls="offcanvasRight">
                            <svg
                               xmlns="http://www.w3.org/2000/svg"
                               width="20"
                               height="20"
                               viewBox="0 0 24 24"
                               fill="none"
                               stroke="currentColor"
                               stroke-width="2"
                               stroke-linecap="round"
                               stroke-linejoin="round"
                               class="feather feather-shopping-bag">
                               <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                               <line x1="3" y1="6" x2="21" y2="6"></line>
                               <path d="M16 10a4 4 0 0 1-8 0"></path>
                            </svg>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                               1
                               <span class="visually-hidden">unread messages</span>
                            </span>
                         </a>
                      </div>
                   </div>
                   <!-- Button -->
                </div>
             </div>
          </div>

          <div class="col-xxl-3 col-lg-4 d-flex align-items-center justify-content-end">
             <!-- Button trigger modal -->
             <div class="list-inline d-lg-block d-none">
                <div class="list-inline-item me-5">
                   <a href="{{route('wishlist')}}" class="text-reset position-relative">
                      <svg
                         xmlns="http://www.w3.org/2000/svg"
                         width="20"
                         height="20"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         class="feather feather-heart">
                         <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                      </svg>
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                         5
                         <span class="visually-hidden">unread messages</span>
                      </span>
                   </a>
                </div>

                <div class="list-inline-item me-5">
                   <a href="{{asset('ui/frontend')}}/#" class="text-reset" data-bs-toggle="modal" data-bs-target="#locationModal">
                      <svg
                         xmlns="http://www.w3.org/2000/svg"
                         width="20"
                         height="20"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         class="feather feather-map-pin">
                         <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                         <circle cx="12" cy="10" r="3"></circle>
                      </svg>
                   </a>
                </div>
                <div class="list-inline-item me-5">
                   <a href="{{asset('ui/frontend')}}/#!" class="text-reset" data-bs-toggle="modal" data-bs-target="#userModal">
                      <svg
                         xmlns="http://www.w3.org/2000/svg"
                         width="20"
                         height="20"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         class="feather feather-user">
                         <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                         <circle cx="12" cy="7" r="4"></circle>
                      </svg>
                   </a>
                </div>
                <div class="list-inline-item">
                   <a class="text-reset position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" href="{{asset('ui/frontend')}}/#offcanvasExample" role="button" aria-controls="offcanvasRight">
                      <svg
                         xmlns="http://www.w3.org/2000/svg"
                         width="20"
                         height="20"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         class="feather feather-shopping-bag">
                         <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                         <line x1="3" y1="6" x2="21" y2="6"></line>
                         <path d="M16 10a4 4 0 0 1-8 0"></path>
                      </svg>
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                        {{ count((array) session('cart')) }}
                         <span class="visually-hidden">unread messages</span>
                      </span>
                      {{-- <div class="row total-header-section">
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div> --}}
                   </a>
                </div>
             </div>
          </div>
       </div>
       <div class="offcanvas offcanvas-start p-4 w-xxl-20 w-lg-30" id="navbar-default2">
          <div class="d-flex justify-content-between align-items-center mb-2">
             <a href="{{url('/')}}"><img src="{{asset('ui/frontend')}}/assets/images/logo/freshcart-logo.svg" alt="eCommerce" /></a>
             <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="my-4">
             <form action="#">
                <div class="input-group">
                   <input class="form-control rounded" type="search" placeholder="Search for products" />
                   <span class="input-group-append">
                      <button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end" type="button">
                         <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                         </svg>
                      </button>
                   </span>
                </div>
             </form>
             <div class="mt-2">
                <button type="button" class="btn btn-outline-gray-400 text-muted w-100" data-bs-toggle="modal" data-bs-target="#locationModal">
                   <i class="feather-icon icon-map-pin me-2"></i>
                   Pick Location
                </button>
             </div>
          </div>
          <div class="mb-4">
             <a
                class="btn btn-primary w-100 d-flex justify-content-center align-items-center"
                data-bs-toggle="collapse"
                href="{{asset('ui/frontend')}}/#collapseExample"
                role="button"
                aria-expanded="false"
                aria-controls="collapseExample">
                <span class="me-2">
                   <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      class="feather feather-grid">
                      <rect x="3" y="3" width="7" height="7"></rect>
                      <rect x="14" y="3" width="7" height="7"></rect>
                      <rect x="14" y="14" width="7" height="7"></rect>
                      <rect x="3" y="14" width="7" height="7"></rect>
                   </svg>
                </span>
                All Departments
             </a>
             <div class="collapse mt-2" id="collapseExample">
                <div class="card card-body">
                   <ul class="mb-0 list-unstyled">
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Dairy, Bread & Eggs</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Snacks & Munchies</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Fruits & Vegetables</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Cold Drinks & Juices</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Breakfast & Instant Food</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Bakery & Biscuits</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Chicken, Meat & Fish</a></li>
                   </ul>
                </div>
             </div>
          </div>
          <div class="h-100" data-simplebar="">
             <ul class="navbar-nav navbar-nav-offcanvac">
                <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="{{asset('ui/frontend')}}/#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Home</a>
                   <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/https://freshcart.codescandy.com/index.html">Home 1</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/index-2.html">Home 2</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/index-3.html">Home 3</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/index-4.html">Home 4</a></li>
                      <li>
                         <a class="dropdown-item" href="{{asset('ui/frontend')}}/index-5.html">Home 5</a>
                      </li>
                   </ul>
                </li>
                <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="{{asset('ui/frontend')}}/#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                   <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Shop Grid - Filter</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid-3-column.html">Shop Grid - 3 column</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-list.html">Shop List - Filter</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-filter.html">Shop - Filter</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-fullwidth.html">Shop Wide</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-single.html">Shop Single</a></li>
                      <li>
                         <a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-single-2.html">Shop Single v2</a>
                      </li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-wishlist.html">Shop Wishlist</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-cart.html">Shop Cart</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-checkout.html">Shop Checkout</a></li>
                   </ul>
                </li>
                <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="{{asset('ui/frontend')}}/#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Stores</a>
                   <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/store-list.html">Store List</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/store-grid.html">Store Grid</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/store-single.html">Store Single</a></li>
                   </ul>
                </li>

                <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="{{asset('ui/frontend')}}/#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mega Menu</a>
                   <ul class="dropdown-menu">
                      <li class="dropdown-submenu">
                         <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="{{asset('ui/frontend')}}/#">Dairy, Bread & Eggs</a>
                         <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Milk Drinks</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Curd & Yogurt</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Eggs</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Buns & Bakery</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Cheese</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Condensed Milk</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Dairy Products</a></li>
                         </ul>
                      </li>
                      <li class="dropdown-submenu">
                         <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="{{asset('ui/frontend')}}/#">Vegetables & Fruits</a>
                         <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Vegetables</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Fruits</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Exotics & Premium</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Fresh Sprouts</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Frozen Veg</a></li>
                         </ul>
                      </li>
                      <li class="dropdown-submenu">
                         <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="{{asset('ui/frontend')}}/#">Cold Drinks & Juices</a>
                         <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Soft Drinks</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Fruit Juices</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Coldpress</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Soda & Mixers</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Milk Drinks</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Health Drinks</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/shop-grid.html">Herbal Drinks</a></li>
                         </ul>
                      </li>
                   </ul>
                </li>
                <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="{{asset('ui/frontend')}}/#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                   <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/blog.html">Blog</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/blog-single.html">Blog Single</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/blog-category.html">Blog Category</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/about.html">About us</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/404error.html">404 Error</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/contact.html">Contact</a></li>
                   </ul>
                </li>
                <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="{{asset('ui/frontend')}}/#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
                   <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/signin.html">Sign in</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/signup.html">Signup</a></li>
                      <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/forgot-password.html">Forgot Password</a></li>
                      <li class="dropdown-submenu dropend">
                         <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="{{asset('ui/frontend')}}/#">My Account</a>
                         <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/account-orders.html">Orders</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/account-settings.html">Settings</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/account-address.html">Address</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/account-payment-method.html">Payment Method</a></li>
                            <li><a class="dropdown-item" href="{{asset('ui/frontend')}}/account-notification.html">Notification</a></li>
                         </ul>
                      </li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{asset('ui/frontend')}}/https://freshcart.codescandy.com/dashboard/index.html">Dashboard</a>
                </li>
                <li class="nav-item dropdown dropdown-flyout">
                   <a class="nav-link" href="{{asset('ui/frontend')}}/#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Docs</a>
                   <div class="dropdown-menu dropdown-menu-lg" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item align-items-start" href="{{asset('ui/frontend')}}/https://freshcart.codescandy.com/docs/index.html">
                         <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-file-text text-primary" viewBox="0 0 16 16">
                               <path
                                  d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                               <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                            </svg>
                         </div>
                         <div class="ms-3 lh-1">
                            <h6 class="mb-1">Documentations</h6>
                            <p class="mb-0 small">Browse the all documentation</p>
                         </div>
                      </a>
                      <a class="dropdown-item align-items-start" href="{{asset('ui/frontend')}}/https://freshcart.codescandy.com/docs/changelog.html">
                         <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-layers text-primary" viewBox="0 0 16 16">
                               <path
                                  d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882l-7.5-4zm3.515 7.008L14.438 10 8 13.433 1.562 10 4.25 8.567l3.515 1.874a.5.5 0 0 0 .47 0l3.515-1.874zM8 9.433 1.562 6 8 2.567 14.438 6 8 9.433z" />
                            </svg>
                         </div>
                         <div class="ms-3 lh-1">
                            <h6 class="mb-1">
                               Changelog
                               <span class="text-primary ms-1">v1.3.0</span>
                            </h6>
                            <p class="mb-0 small">See what's new</p>
                         </div>
                      </a>
                   </div>
                </li>
             </ul>
          </div>
       </div>
    </div>
 </nav>
