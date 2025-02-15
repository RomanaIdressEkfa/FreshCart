<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from freshcart.codescandy.com/pages/shop-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Aug 2024 14:57:13 GMT -->
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta content="Codescandy" name="author" />
      <title>Shop Checkout eCommerce HTML Template - FreshCart</title>
      <!-- Favicon icon-->
      <link rel="shortcut icon" type="image/x-icon" href="{{asset('ui/frontend')}}/https://freshcart.codescandy.com/assets/images/favicon/favicon.ico" />

      <!-- Libs CSS -->
      <link href="{{asset('ui/frontend')}}/assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet" />
      <link href="{{asset('ui/frontend')}}/assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet" />
      <link href="{{asset('ui/frontend')}}/assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet" />

      <!-- Theme CSS -->
      <link rel="stylesheet" href="{{asset('ui/frontend')}}/assets/css/theme.min.css" />
      <script async src="{{asset('ui/frontend')}}/https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag() {
            dataLayer.push(arguments);
         }
         gtag("js", new Date());

         gtag("config", "G-M8S4MT3EYG");
      </script>
      <script type="text/javascript">
         (function (c, l, a, r, i, t, y) {
            c[a] =
               c[a] ||
               function () {
                  (c[a].q = c[a].q || []).push(arguments);
               };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
         })(window, document, "clarity", "script", "kuc8w5o9nt");
      </script>
   </head>

   <body>
      <!-- navbar -->
      @include('frontend.includes.navbar')
      <!-- Modal -->
      <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
               <div class="modal-header border-0">
                  <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Sign Up</h5>

                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form class="needs-validation" novalidate>
                     <div class="mb-3">
                        <label for="fullName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter Your Name" required />
                        <div class="invalid-feedback">Please enter name.</div>
                     </div>
                     <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email address" required />
                        <div class="invalid-feedback">Please enter email.</div>
                     </div>
                     <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" required />
                        <div class="invalid-feedback">Please enter password.</div>
                        <small class="form-text">
                           By Signup, you agree to our
                           <a href="{{asset('ui/frontend')}}/#!">Terms of Service</a>
                           &
                           <a href="{{asset('ui/frontend')}}/#!">Privacy Policy</a>
                        </small>
                     </div>

                     <button type="submit" class="btn btn-primary" type="submit">Sign Up</button>
                  </form>
               </div>
               <div class="modal-footer border-0 justify-content-center">
                  Already have an account?
                  <a href="{{asset('ui/frontend')}}/#">Sign in</a>
               </div>
            </div>
         </div>
      </div>

      <!-- Shop Cart -->

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
         <div class="offcanvas-header border-bottom">
            <div class="text-start">
               <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Shop Cart</h5>
               <small>Location in 382480</small>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body">
            <div>
               <!-- alert -->
               <div class="alert alert-danger p-2" role="alert">
                  You’ve got FREE delivery. Start
                  <a href="{{asset('ui/frontend')}}/#!" class="alert-link">checkout now!</a>
               </div>
               <ul class="list-group list-group-flush">
                  <!-- list group -->
                  <li class="list-group-item py-3 ps-0 border-top">
                     <!-- row -->
                     <div class="row align-items-center">
                        <div class="col-6 col-md-6 col-lg-7">
                           <div class="d-flex">
                              <img src="{{asset('ui/frontend')}}/assets/images/products/product-img-1.jpg" alt="Ecommerce" class="icon-shape icon-xxl" />
                              <div class="ms-3">
                                 <!-- title -->
                                 <a href="{{asset('ui/frontend')}}/shop-single.html" class="text-inherit">
                                    <h6 class="mb-0">Haldiram's Sev Bhujia</h6>
                                 </a>
                                 <span><small class="text-muted">.98 / lb</small></span>
                                 <!-- text -->
                                 <div class="mt-2 small lh-1">
                                    <a href="{{asset('ui/frontend')}}/#!" class="text-decoration-none text-inherit">
                                       <span class="me-1 align-text-bottom">
                                          <svg
                                             xmlns="http://www.w3.org/2000/svg"
                                             width="14"
                                             height="14"
                                             viewBox="0 0 24 24"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="2"
                                             stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-trash-2 text-success">
                                             <polyline points="3 6 5 6 21 6"></polyline>
                                             <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                             <line x1="10" y1="11" x2="10" y2="17"></line>
                                             <line x1="14" y1="11" x2="14" y2="17"></line>
                                          </svg>
                                       </span>
                                       <span class="text-muted">Remove</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- input group -->
                        <div class="col-4 col-md-3 col-lg-3">
                           <!-- input -->
                           <!-- input -->
                           <div class="input-group input-spinner">
                              <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                              <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
                              <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                           </div>
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                           <span class="fw-bold">$5.00</span>
                        </div>
                     </div>
                  </li>
                  <!-- list group -->
                  <li class="list-group-item py-3 ps-0">
                     <!-- row -->
                     <div class="row align-items-center">
                        <div class="col-6 col-md-6 col-lg-7">
                           <div class="d-flex">
                              <img src="{{asset('ui/frontend')}}/assets/images/products/product-img-2.jpg" alt="Ecommerce" class="icon-shape icon-xxl" />
                              <div class="ms-3">
                                 <a href="{{asset('ui/frontend')}}/shop-single.html" class="text-inherit">
                                    <h6 class="mb-0">NutriChoice Digestive</h6>
                                 </a>
                                 <span><small class="text-muted">250g</small></span>
                                 <!-- text -->
                                 <div class="mt-2 small lh-1">
                                    <a href="{{asset('ui/frontend')}}/#!" class="text-decoration-none text-inherit">
                                       <span class="me-1 align-text-bottom">
                                          <svg
                                             xmlns="http://www.w3.org/2000/svg"
                                             width="14"
                                             height="14"
                                             viewBox="0 0 24 24"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="2"
                                             stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-trash-2 text-success">
                                             <polyline points="3 6 5 6 21 6"></polyline>
                                             <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                             <line x1="10" y1="11" x2="10" y2="17"></line>
                                             <line x1="14" y1="11" x2="14" y2="17"></line>
                                          </svg>
                                       </span>
                                       <span class="text-muted">Remove</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <!-- input group -->
                        <div class="col-4 col-md-3 col-lg-3">
                           <!-- input -->
                           <!-- input -->
                           <div class="input-group input-spinner">
                              <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                              <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
                              <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                           </div>
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                           <span class="fw-bold text-danger">$20.00</span>
                           <div class="text-decoration-line-through text-muted small">$26.00</div>
                        </div>
                     </div>
                  </li>
                  <!-- list group -->
                  <li class="list-group-item py-3 ps-0">
                     <!-- row -->
                     <div class="row align-items-center">
                        <div class="col-6 col-md-6 col-lg-7">
                           <div class="d-flex">
                              <img src="{{asset('ui/frontend')}}/assets/images/products/product-img-3.jpg" alt="Ecommerce" class="icon-shape icon-xxl" />
                              <div class="ms-3">
                                 <!-- title -->
                                 <a href="{{asset('ui/frontend')}}/shop-single.html" class="text-inherit">
                                    <h6 class="mb-0">Cadbury 5 Star Chocolate</h6>
                                 </a>
                                 <span><small class="text-muted">1 kg</small></span>
                                 <!-- text -->
                                 <div class="mt-2 small lh-1">
                                    <a href="{{asset('ui/frontend')}}/#!" class="text-decoration-none text-inherit">
                                       <span class="me-1 align-text-bottom">
                                          <svg
                                             xmlns="http://www.w3.org/2000/svg"
                                             width="14"
                                             height="14"
                                             viewBox="0 0 24 24"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="2"
                                             stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-trash-2 text-success">
                                             <polyline points="3 6 5 6 21 6"></polyline>
                                             <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                             <line x1="10" y1="11" x2="10" y2="17"></line>
                                             <line x1="14" y1="11" x2="14" y2="17"></line>
                                          </svg>
                                       </span>
                                       <span class="text-muted">Remove</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <!-- input group -->
                        <div class="col-4 col-md-3 col-lg-3">
                           <!-- input -->
                           <!-- input -->
                           <div class="input-group input-spinner">
                              <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                              <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
                              <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                           </div>
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                           <span class="fw-bold">$15.00</span>
                           <div class="text-decoration-line-through text-muted small">$20.00</div>
                        </div>
                     </div>
                  </li>
                  <!-- list group -->
                  <li class="list-group-item py-3 ps-0">
                     <!-- row -->
                     <div class="row align-items-center">
                        <div class="col-6 col-md-6 col-lg-7">
                           <div class="d-flex">
                              <img src="{{asset('ui/frontend')}}/assets/images/products/product-img-4.jpg" alt="Ecommerce" class="icon-shape icon-xxl" />
                              <div class="ms-3">
                                 <!-- title -->
                                 <!-- title -->
                                 <a href="{{asset('ui/frontend')}}/shop-single.html" class="text-inherit">
                                    <h6 class="mb-0">Onion Flavour Potato</h6>
                                 </a>
                                 <span><small class="text-muted">250g</small></span>
                                 <!-- text -->
                                 <div class="mt-2 small lh-1">
                                    <a href="{{asset('ui/frontend')}}/#!" class="text-decoration-none text-inherit">
                                       <span class="me-1 align-text-bottom">
                                          <svg
                                             xmlns="http://www.w3.org/2000/svg"
                                             width="14"
                                             height="14"
                                             viewBox="0 0 24 24"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="2"
                                             stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-trash-2 text-success">
                                             <polyline points="3 6 5 6 21 6"></polyline>
                                             <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                             <line x1="10" y1="11" x2="10" y2="17"></line>
                                             <line x1="14" y1="11" x2="14" y2="17"></line>
                                          </svg>
                                       </span>
                                       <span class="text-muted">Remove</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <!-- input group -->
                        <div class="col-4 col-md-3 col-lg-3">
                           <!-- input -->
                           <!-- input -->
                           <div class="input-group input-spinner">
                              <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                              <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
                              <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                           </div>
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                           <span class="fw-bold">$15.00</span>
                           <div class="text-decoration-line-through text-muted small">$20.00</div>
                        </div>
                     </div>
                  </li>
                  <!-- list group -->
                  <li class="list-group-item py-3 ps-0 border-bottom">
                     <!-- row -->
                     <div class="row align-items-center">
                        <div class="col-6 col-md-6 col-lg-7">
                           <div class="d-flex">
                              <img src="{{asset('ui/frontend')}}/assets/images/products/product-img-5.jpg" alt="Ecommerce" class="icon-shape icon-xxl" />
                              <div class="ms-3">
                                 <!-- title -->
                                 <a href="{{asset('ui/frontend')}}/shop-single.html" class="text-inherit">
                                    <h6 class="mb-0">Salted Instant Popcorn</h6>
                                 </a>
                                 <span><small class="text-muted">100g</small></span>
                                 <!-- text -->
                                 <div class="mt-2 small lh-1">
                                    <a href="{{asset('ui/frontend')}}/#!" class="text-decoration-none text-inherit">
                                       <span class="me-1 align-text-bottom">
                                          <svg
                                             xmlns="http://www.w3.org/2000/svg"
                                             width="14"
                                             height="14"
                                             viewBox="0 0 24 24"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="2"
                                             stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-trash-2 text-success">
                                             <polyline points="3 6 5 6 21 6"></polyline>
                                             <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                             <line x1="10" y1="11" x2="10" y2="17"></line>
                                             <line x1="14" y1="11" x2="14" y2="17"></line>
                                          </svg>
                                       </span>
                                       <span class="text-muted">Remove</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <!-- input group -->
                        <div class="col-4 col-md-3 col-lg-3">
                           <!-- input -->
                           <!-- input -->
                           <div class="input-group input-spinner">
                              <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                              <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
                              <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                           </div>
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                           <span class="fw-bold">$15.00</span>
                           <div class="text-decoration-line-through text-muted small">$25.00</div>
                        </div>
                     </div>
                  </li>
               </ul>
               <!-- btn -->
               <div class="d-flex justify-content-between mt-4">
                  <a href="{{asset('ui/frontend')}}/#!" class="btn btn-primary">Continue Shopping</a>
                  <a href="{{asset('ui/frontend')}}/#!" class="btn btn-dark">Update Cart</a>
               </div>
            </div>
         </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-body p-6">
                  <div class="d-flex justify-content-between align-items-start">
                     <div>
                        <h5 class="mb-1" id="locationModalLabel">Choose your Delivery Location</h5>
                        <p class="mb-0 small">Enter your address and we will specify the offer you area.</p>
                     </div>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="my-5">
                     <input type="search" class="form-control" placeholder="Search your area" />
                  </div>
                  <div class="d-flex justify-content-between align-items-center mb-2">
                     <h6 class="mb-0">Select Location</h6>
                     <a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 text-muted btn-sm">Clear All</a>
                  </div>
                  <div>
                     <div data-simplebar style="height: 300px">
                        <div class="list-group list-group-flush">
                           <a href="{{asset('ui/frontend')}}/#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action active">
                              <span>Alabama</span>
                              <span>Min:$20</span>
                           </a>
                           <a href="{{asset('ui/frontend')}}/#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>Alaska</span>
                              <span>Min:$30</span>
                           </a>
                           <a href="{{asset('ui/frontend')}}/#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>Arizona</span>
                              <span>Min:$50</span>
                           </a>
                           <a href="{{asset('ui/frontend')}}/#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>California</span>
                              <span>Min:$29</span>
                           </a>
                           <a href="{{asset('ui/frontend')}}/#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>Colorado</span>
                              <span>Min:$80</span>
                           </a>
                           <a href="{{asset('ui/frontend')}}/#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>Florida</span>
                              <span>Min:$90</span>
                           </a>
                           <a href="{{asset('ui/frontend')}}/#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>Arizona</span>
                              <span>Min:$50</span>
                           </a>
                           <a href="{{asset('ui/frontend')}}/#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>California</span>
                              <span>Min:$29</span>
                           </a>
                           <a href="{{asset('ui/frontend')}}/#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>Colorado</span>
                              <span>Min:$80</span>
                           </a>
                           <a href="{{asset('ui/frontend')}}/#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>Florida</span>
                              <span>Min:$90</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <script src="{{asset('ui/frontend')}}/assets/js/vendors/validation.js"></script>

      <main>
         <!-- section-->
         <div class="mt-4">
            <div class="container">
               <!-- row -->
               <div class="row">
                  <!-- col -->
                  <div class="col-12">
                     <!-- breadcrumb -->
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                           <li class="breadcrumb-item"><a href="{{asset('ui/frontend')}}/#!">Home</a></li>
                           <li class="breadcrumb-item"><a href="{{asset('ui/frontend')}}/#!">Shop</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Shop Checkout</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
         <!-- section -->
         <section class="mb-lg-14 mb-8 mt-8">
            <div class="container">
               <!-- row -->
               <div class="row">
                  <!-- col -->
                  <div class="col-12">
                     <div>
                        <div class="mb-8">
                           <!-- text -->
                           <h1 class="fw-bold mb-0">Checkout</h1>
                           <p class="mb-0">
                              Already have an account? Click here to
                              <a href="{{asset('ui/frontend')}}/#!">Sign in</a>
                              .
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div>
                  <!-- row -->
                  <div class="row">
                     <div class="col-xl-7 col-lg-6 col-md-12">
                        <!-- accordion -->
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                           <!-- accordion item -->
                           <div class="accordion-item py-4">
                              <div class="d-flex justify-content-between align-items-center">
                                 <!-- heading one -->
                                 <a
                                    href="{{asset('ui/frontend')}}/#"
                                    class="fs-5 text-inherit collapsed h4"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne"
                                    aria-expanded="true"
                                    aria-controls="flush-collapseOne">
                                    <i class="feather-icon icon-map-pin me-2 text-muted"></i>
                                    Add delivery address
                                 </a>
                                 <!-- btn -->
                                 <a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addAddressModal">Add a new address</a>
                                 <!-- collapse -->
                              </div>
                              <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                                 <div class="mt-5">
                                    <div class="row">
                                       <div class="col-xl-6 col-lg-12 col-md-6 col-12 mb-4">
                                          <!-- form -->
                                          <div class="card card-body p-6">
                                             <div class="form-check mb-4">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="homeRadio" checked />
                                                <label class="form-check-label text-dark" for="homeRadio">Home</label>
                                             </div>
                                             <!-- address -->
                                             <address>
                                                <strong>Jitu Chauhan</strong>
                                                <br />

                                                4450 North Avenue Oakland,
                                                <br />

                                                Nebraska, United States,
                                                <br />

                                                <abbr title="Phone">P: 402-776-1106</abbr>
                                             </address>
                                             <span class="text-danger">Default address</span>
                                          </div>
                                       </div>
                                       <div class="col-xl-6 col-lg-12 col-md-6 col-12 mb-4">
                                          <!-- input -->
                                          <div class="card card-body p-6">
                                             <div class="form-check mb-4">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="officeRadio" />
                                                <label class="form-check-label text-dark" for="officeRadio">Office</label>
                                             </div>
                                             <address>
                                                <strong>Nitu Chauhan</strong>
                                                <br />
                                                3853 Coal Road,
                                                <br />
                                                Tannersville, Pennsylvania, 18372, USA,
                                                <br />

                                                <abbr title="Phone">P: 402-776-1106</abbr>
                                             </address>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- accordion item -->
                           <div class="accordion-item py-4">
                              <a href="{{asset('ui/frontend')}}/#" class="text-inherit collapsed h5" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                 <i class="feather-icon icon-clock me-2 text-muted"></i>
                                 Delivery time
                              </a>
                              <!-- collapse -->
                              <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                 <!-- nav -->
                                 <ul class="nav nav-pills nav-pills-light mb-3 nav-fill mt-5" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                       <!-- button -->
                                       <button
                                          class="nav-link active"
                                          id="pills-today-tab"
                                          data-bs-toggle="pill"
                                          data-bs-target="#pills-today"
                                          type="button"
                                          role="tab"
                                          aria-controls="pills-today"
                                          aria-selected="true">
                                          Today
                                          <br />
                                          <small>Oct 3</small>
                                       </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <!-- button -->
                                       <button
                                          class="nav-link"
                                          id="pills-monday-tab"
                                          data-bs-toggle="pill"
                                          data-bs-target="#pills-monday"
                                          type="button"
                                          role="tab"
                                          aria-controls="pills-monday"
                                          aria-selected="false">
                                          Mon
                                          <br />
                                          <small>Oct 4</small>
                                       </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <!-- button -->
                                       <button
                                          class="nav-link"
                                          id="pills-Tue-tab"
                                          data-bs-toggle="pill"
                                          data-bs-target="#pills-Tue"
                                          type="button"
                                          role="tab"
                                          aria-controls="pills-Tue"
                                          aria-selected="false">
                                          Tue
                                          <br />
                                          <small>Oct 5</small>
                                       </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <!-- button -->
                                       <button
                                          class="nav-link"
                                          id="pills-Wed-tab"
                                          data-bs-toggle="pill"
                                          data-bs-target="#pills-Wed"
                                          type="button"
                                          role="tab"
                                          aria-controls="pills-Wed"
                                          aria-selected="false">
                                          Wed
                                          <br />
                                          <small>Oct 6</small>
                                       </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <!-- button -->
                                       <button
                                          class="nav-link"
                                          id="pills-Thu-tab"
                                          data-bs-toggle="pill"
                                          data-bs-target="#pills-Thu"
                                          type="button"
                                          role="tab"
                                          aria-controls="pills-Thu"
                                          aria-selected="false">
                                          Thu
                                          <br />
                                          <small>Oct 7</small>
                                       </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <!-- button -->
                                       <button
                                          class="nav-link"
                                          id="pills-Fri-tab"
                                          data-bs-toggle="pill"
                                          data-bs-target="#pills-Fri"
                                          type="button"
                                          role="tab"
                                          aria-controls="pills-Fri"
                                          aria-selected="false">
                                          Fri
                                          <br />
                                          <small>Oct 8</small>
                                       </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <!-- button -->
                                       <button
                                          class="nav-link"
                                          id="pills-Sat-tab"
                                          data-bs-toggle="pill"
                                          data-bs-target="#pills-Sat"
                                          type="button"
                                          role="tab"
                                          aria-controls="pills-Sat"
                                          aria-selected="false">
                                          Sat
                                          <br />
                                          <small>Oct 9</small>
                                       </button>
                                    </li>
                                 </ul>
                                 <!-- tab content -->
                                 <div class="tab-content" id="pills-tabContent">
                                    <!-- tab pane -->
                                    <div class="tab-pane fade show active" id="pills-today" role="tabpanel" aria-labelledby="pills-today-tab" tabindex="0">
                                       <!-- list group -->
                                       <ul class="list-group list-group-flush mt-4">
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault1">
                                                      <span>Within 2 Hours</span>
                                                   </label>
                                                </div>
                                             </div>

                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <!-- badge -->
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault2">
                                                      <span>Within 3 Hours</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault3">
                                                      <span>1pm - 2pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$0.00</div>
                                             <div class="col-3 text-center"><span class="badge bg-success">Free</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault4">
                                                      <span>2pm - 3pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <!-- badge -->
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault5">
                                                      <span>3pm - 4pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <!-- badge -->
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="tab-pane fade" id="pills-monday" role="tabpanel" aria-labelledby="pills-monday-tab" tabindex="0">
                                       <ul class="list-group list-group-flush mt-4">
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault6" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault6">
                                                      <span>Within 2 Hours</span>
                                                   </label>
                                                </div>
                                             </div>

                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault7" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault7">
                                                      <span>Within 2 Hours</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault8" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault8">
                                                      <span>1pm - 2pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$0.00</div>
                                             <div class="col-3 text-center"><span class="badge bg-success">Free</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault9" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault9">
                                                      <span>2pm - 3pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault10" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault10">
                                                      <span>3pm - 4pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="tab-pane fade" id="pills-Tue" role="tabpanel" aria-labelledby="pills-Tue-tab" tabindex="0">
                                       <ul class="list-group list-group-flush mt-4">
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault11" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault11">
                                                      <span>Within 2 Hours</span>
                                                   </label>
                                                </div>
                                             </div>

                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault12" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault12">
                                                      <span>Within 2 Hours</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault13" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault13">
                                                      <span>1pm - 2pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$0.00</div>
                                             <div class="col-3 text-center"><span class="badge bg-success">Free</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault14" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault14">
                                                      <span>2pm - 3pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault15" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault15">
                                                      <span>3pm - 4pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="tab-pane fade" id="pills-Wed" role="tabpanel" aria-labelledby="pills-Wed-tab" tabindex="0">
                                       <ul class="list-group list-group-flush mt-4">
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault16" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault16">
                                                      <span>Within 2 Hours</span>
                                                   </label>
                                                </div>
                                             </div>

                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault17" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault17">
                                                      <span>Within 2 Hours</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault18" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault18">
                                                      <span>1pm - 2pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$0.00</div>
                                             <div class="col-3 text-center"><span class="badge bg-success">Free</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault19" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault19">
                                                      <span>2pm - 3pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault20" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault20">
                                                      <span>3pm - 4pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="tab-pane fade" id="pills-Thu" role="tabpanel" aria-labelledby="pills-Thu-tab" tabindex="0">
                                       <ul class="list-group list-group-flush mt-4">
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault21" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault21">
                                                      <span>Within 2 Hours</span>
                                                   </label>
                                                </div>
                                             </div>

                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault22" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault22">
                                                      <span>Within 2 Hours</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <!-- badge -->
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault23" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault23">
                                                      <span>1pm - 2pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$0.00</div>
                                             <div class="col-3 text-center"><span class="badge bg-success">Free</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault24" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault24">
                                                      <span>2pm - 3pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault25" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault25">
                                                      <span>3pm - 4pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="tab-pane fade" id="pills-Fri" role="tabpanel" aria-labelledby="pills-Fri-tab" tabindex="0">
                                       <ul class="list-group list-group-flush mt-4">
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault26" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault26">
                                                      <span>Within 2 Hours</span>
                                                   </label>
                                                </div>
                                             </div>

                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault27" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault27">
                                                      <span>Within 2 Hours</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault28" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault28">
                                                      <span>1pm - 2pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$0.00</div>
                                             <div class="col-3 text-center"><span class="badge bg-success">Free</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault29" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault29">
                                                      <span>2pm - 3pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault30" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault30">
                                                      <span>3pm - 4pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="tab-pane fade" id="pills-Sat" role="tabpanel" aria-labelledby="pills-Sat-tab" tabindex="0">
                                       <ul class="list-group list-group-flush mt-4">
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault31" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault31">
                                                      <span>Within 2 Hours</span>
                                                   </label>
                                                </div>
                                             </div>

                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault32" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault32">
                                                      <span>Within 2 Hours</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault33" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault33">
                                                      <span>1pm - 2pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$0.00</div>
                                             <div class="col-3 text-center"><span class="badge bg-success">Free</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault34" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault34">
                                                      <span>2pm - 3pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                          <!-- list group item -->
                                          <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                             <!-- col -->
                                             <div class="col-4">
                                                <div class="form-check">
                                                   <!-- form check input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault35" />
                                                   <!-- label -->
                                                   <label class="form-check-label" for="flexRadioDefault35">
                                                      <span>3pm - 4pm</span>
                                                   </label>
                                                </div>
                                             </div>
                                             <!-- price -->
                                             <div class="col-3 text-center">$3.99</div>
                                             <div class="col-3 text-center"><span class="badge bg-danger">Paid</span></div>
                                             <!-- col -->
                                             <div class="col-2 text-end"><a href="{{asset('ui/frontend')}}/#" class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="mt-5 d-flex justify-content-end">
                                    <a
                                       href="{{asset('ui/frontend')}}/#"
                                       class="btn btn-outline-gray-400 text-muted"
                                       data-bs-toggle="collapse"
                                       data-bs-target="#flush-collapseOne"
                                       aria-expanded="false"
                                       aria-controls="flush-collapseOne">
                                       Prev
                                    </a>
                                    <a href="{{asset('ui/frontend')}}/#" class="btn btn-primary ms-2" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                       Next
                                    </a>
                                 </div>
                              </div>
                           </div>
                           <!-- accordion item -->
                           <div class="accordion-item py-4">
                              <a href="{{asset('ui/frontend')}}/#" class="text-inherit h5" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                 <i class="feather-icon icon-shopping-bag me-2 text-muted"></i>
                                 Delivery instructions
                                 <!-- collapse -->
                              </a>
                              <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                 <div class="mt-5">
                                    <label for="DeliveryInstructions" class="form-label sr-only">Delivery instructions</label>
                                    <textarea class="form-control" id="DeliveryInstructions" rows="3" placeholder="Write delivery instructions "></textarea>
                                    <p class="form-text">Add instructions for how you want your order shopped and/or delivered</p>
                                    <div class="mt-5 d-flex justify-content-end">
                                       <a
                                          href="{{asset('ui/frontend')}}/#"
                                          class="btn btn-outline-gray-400 text-muted"
                                          data-bs-toggle="collapse"
                                          data-bs-target="#flush-collapseTwo"
                                          aria-expanded="false"
                                          aria-controls="flush-collapseTwo">
                                          Prev
                                       </a>
                                       <a href="{{asset('ui/frontend')}}/#" class="btn btn-primary ms-2" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                          Next
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- accordion item -->
                           <div class="accordion-item py-4">
                              <a href="{{asset('ui/frontend')}}/#" class="text-inherit h5" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                 <i class="feather-icon icon-credit-card me-2 text-muted"></i>
                                 Payment Method
                                 <!-- collapse -->
                              </a>
                              <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                 <div class="mt-5">
                                    <div>
                                       <div class="card card-bordered shadow-none mb-2">
                                          <!-- card body -->
                                          <div class="card-body p-6">
                                             <div class="d-flex">
                                                <div class="form-check">
                                                   <!-- checkbox -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="paypal" />
                                                   <label class="form-check-label ms-2" for="paypal"></label>
                                                </div>
                                                <div>
                                                   <!-- title -->
                                                   <h5 class="mb-1 h6">Payment with Paypal</h5>
                                                   <p class="mb-0 small">You will be redirected to PayPal website to complete your purchase securely.</p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- card -->
                                       <div class="card card-bordered shadow-none mb-2">
                                          <!-- card body -->
                                          <div class="card-body p-6">
                                             <div class="d-flex mb-4">
                                                <div class="form-check">
                                                   <!-- input -->
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="creditdebitcard" />
                                                   <label class="form-check-label ms-2" for="creditdebitcard"></label>
                                                </div>
                                                <div>
                                                   <h5 class="mb-1 h6">Credit / Debit Card</h5>
                                                   <p class="mb-0 small">Safe money transfer using your bank accou k account. We support Mastercard tercard, Visa, Discover and Stripe.</p>
                                                </div>
                                             </div>
                                             <div class="row g-2">
                                                <div class="col-12">
                                                   <!-- input -->
                                                   <div class="mb-3">
                                                      <label for="card-mask" class="form-label">Card Number</label>
                                                      <input type="text" class="form-control" id="card-mask" placeholder="xxxx-xxxx-xxxx-xxxx" required />
                                                   </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                   <!-- input -->
                                                   <div class="mb-3 mb-lg-0">
                                                      <label class="form-label" for="nameoncard">Name on card</label>
                                                      <input type="text" class="form-control" placeholder="Enter name" id="nameoncard" />
                                                   </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                   <!-- input -->
                                                   <div class="mb-3 mb-lg-0 position-relative">
                                                      <label class="form-label" for="expirydate">Expiry date</label>
                                                      <input type="text" class="form-control" id="expirydate" placeholder="MM/YY" />
                                                   </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                   <!-- input -->
                                                   <div class="mb-3 mb-lg-0">
                                                      <label for="digit-mask" class="form-label">
                                                         CVV Code
                                                         <i
                                                            class="fe fe-help-circle ms-1"
                                                            data-bs-toggle="tooltip"
                                                            data-placement="top"
                                                            title="A 3 - digit number, typically printed on the back of a card."></i>
                                                      </label>
                                                      <input type="password" class="form-control" name="digit-mask" id="digit-mask" placeholder="xxx" maxlength="3" inputmode="numeric" required />
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- card -->
                                       <div class="card card-bordered shadow-none mb-2">
                                          <!-- card body -->
                                          <div class="card-body p-6">
                                             <!-- check input -->
                                             <div class="d-flex">
                                                <div class="form-check">
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="payoneer" />
                                                   <label class="form-check-label ms-2" for="payoneer"></label>
                                                </div>
                                                <div>
                                                   <!-- title -->
                                                   <h5 class="mb-1 h6">Pay with Payoneer</h5>
                                                   <p class="mb-0 small">You will be redirected to Payoneer website to complete your purchase securely.</p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- card -->
                                       <div class="card card-bordered shadow-none">
                                          <div class="card-body p-6">
                                             <!-- check input -->
                                             <div class="d-flex">
                                                <div class="form-check">
                                                   <input class="form-check-input" type="radio" name="flexRadioDefault" id="cashonDelivery" />
                                                   <label class="form-check-label ms-2" for="cashonDelivery"></label>
                                                </div>
                                                <div>
                                                   <!-- title -->
                                                   <h5 class="mb-1 h6">Cash on Delivery</h5>
                                                   <p class="mb-0 small">Pay with cash when your order is delivered.</p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- Button -->
                                       <div class="mt-5 d-flex justify-content-end">
                                          <a
                                             href="{{asset('ui/frontend')}}/#"
                                             class="btn btn-outline-gray-400 text-muted"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#flush-collapseThree"
                                             aria-expanded="false"
                                             aria-controls="flush-collapseThree">
                                             Prev
                                          </a>
                                          <a href="{{asset('ui/frontend')}}/#" class="btn btn-primary ms-2">Place Order</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-12 offset-xl-1 col-xl-4 col-lg-6">
                        <div class="mt-4 mt-lg-0">
                           <div class="card shadow-sm">
                              <h5 class="px-6 py-4 bg-transparent mb-0">Order Details</h5>
                              <ul class="list-group list-group-flush">
                                 <!-- list group item -->
                                 <li class="list-group-item px-4 py-3">
                                    <div class="row align-items-center">
                                       <div class="col-2 col-md-2">
                                          <img src="{{asset('ui/frontend')}}/assets/images/products/product-img-1.jpg" alt="Ecommerce" class="img-fluid" />
                                       </div>
                                       <div class="col-5 col-md-5">
                                          <h6 class="mb-0">Haldiram's Sev Bhujia</h6>
                                          <span><small class="text-muted">.98 / lb</small></span>
                                       </div>
                                       <div class="col-2 col-md-2 text-center text-muted">
                                          <span>1</span>
                                       </div>
                                       <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                          <span class="fw-bold">$5.00</span>
                                       </div>
                                    </div>
                                 </li>
                                 <!-- list group item -->
                                 <li class="list-group-item px-4 py-3">
                                    <div class="row align-items-center">
                                       <div class="col-2 col-md-2">
                                          <img src="{{asset('ui/frontend')}}/assets/images/products/product-img-2.jpg" alt="Ecommerce" class="img-fluid" />
                                       </div>
                                       <div class="col-5 col-md-5">
                                          <h6 class="mb-0">NutriChoice Digestive</h6>
                                          <span><small class="text-muted">250g</small></span>
                                       </div>
                                       <div class="col-2 col-md-2 text-center text-muted">
                                          <span>1</span>
                                       </div>
                                       <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                          <span class="fw-bold">$20.00</span>
                                          <div class="text-decoration-line-through text-muted small">$26.00</div>
                                       </div>
                                    </div>
                                 </li>
                                 <!-- list group item -->
                                 <li class="list-group-item px-4 py-3">
                                    <div class="row align-items-center">
                                       <div class="col-2 col-md-2">
                                          <img src="{{asset('ui/frontend')}}/assets/images/products/product-img-3.jpg" alt="Ecommerce" class="img-fluid" />
                                       </div>
                                       <div class="col-5 col-md-5">
                                          <h6 class="mb-0">Cadbury 5 Star Chocolate</h6>
                                          <span><small class="text-muted">1 kg</small></span>
                                       </div>
                                       <div class="col-2 col-md-2 text-center text-muted">
                                          <span>1</span>
                                       </div>
                                       <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                          <span class="fw-bold">$15.00</span>
                                          <div class="text-decoration-line-through text-muted small">$20.00</div>
                                       </div>
                                    </div>
                                 </li>
                                 <!-- list group item -->
                                 <li class="list-group-item px-4 py-3">
                                    <div class="row align-items-center">
                                       <div class="col-2 col-md-2">
                                          <img src="{{asset('ui/frontend')}}/assets/images/products/product-img-4.jpg" alt="Ecommerce" class="img-fluid" />
                                       </div>
                                       <div class="col-5 col-md-5">
                                          <h6 class="mb-0">Onion Flavour Potato</h6>
                                          <span><small class="text-muted">250g</small></span>
                                       </div>
                                       <div class="col-2 col-md-2 text-center text-muted">
                                          <span>1</span>
                                       </div>
                                       <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                          <span class="fw-bold">$15.00</span>
                                          <div class="text-decoration-line-through text-muted small">$20.00</div>
                                       </div>
                                    </div>
                                 </li>

                                 <!-- list group item -->
                                 <li class="list-group-item px-4 py-3">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                       <div>Item Subtotal</div>
                                       <div class="fw-bold">$70.00</div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                       <div>
                                          Service Fee
                                          <i class="feather-icon icon-info text-muted" data-bs-toggle="tooltip" title="Default tooltip"></i>
                                       </div>
                                       <div class="fw-bold">$3.00</div>
                                    </div>
                                 </li>
                                 <!-- list group item -->
                                 <li class="list-group-item px-4 py-3">
                                    <div class="d-flex align-items-center justify-content-between fw-bold">
                                       <div>Subtotal</div>
                                       <div>$73.00</div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </main>

      <!-- Modal -->
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">Delete address</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <h6>Are you sure you want to delete this address?</h6>
                  <p class="mb-6">
                     Jitu Chauhan
                     <br />

                     4450 North Avenue Oakland,
                     <br />

                     Nebraska, United States,
                     <br />

                     402-776-1106
                  </p>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-outline-gray-400" data-bs-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-danger">Delete</button>
               </div>
            </div>
         </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- modal body -->
               <div class="modal-body p-6">
                  <div class="d-flex justify-content-between mb-5">
                     <!-- heading -->
                     <div>
                        <h5 class="h6 mb-1" id="addAddressModalLabel">New Shipping Address</h5>
                        <p class="small mb-0">Add new shipping address for your order delivery.</p>
                     </div>
                     <div>
                        <!-- button -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                  </div>
                  <!-- row -->
                  <div class="row g-3">
                     <!-- col -->
                     <div class="col-12">
                        <input type="text" class="form-control" placeholder="First name" aria-label="First name" required="" />
                     </div>
                     <!-- col -->
                     <div class="col-12">
                        <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" required="" />
                     </div>
                     <!-- col -->
                     <div class="col-12">
                        <input type="text" class="form-control" placeholder="Address Line 1" />
                     </div>
                     <div class="col-12">
                        <!-- button -->
                        <input type="text" class="form-control" placeholder="Address Line 2" />
                     </div>
                     <div class="col-12">
                        <!-- button -->
                        <input type="text" class="form-control" placeholder="City" />
                     </div>
                     <div class="col-12">
                        <!-- button -->
                        <select class="form-select">
                           <option selected="">India</option>
                           <option value="1">UK</option>
                           <option value="2">USA</option>
                           <option value="3">UAE</option>
                        </select>
                     </div>
                     <div class="col-12">
                        <!-- button -->
                        <select class="form-select">
                           <option selected="">Gujarat</option>
                           <option value="1">Northern Ireland</option>
                           <option value="2">Alaska</option>
                           <option value="3">Abu Dhabi</option>
                        </select>
                     </div>
                     <div class="col-12">
                        <!-- button -->
                        <input type="text" class="form-control" placeholder="Zip Code" />
                     </div>
                     <div class="col-12">
                        <!-- button -->
                        <input type="text" class="form-control" placeholder="Business Name" />
                     </div>
                     <div class="col-12">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                           <!-- label -->
                           <label class="form-check-label" for="flexCheckDefault">Set as Default</label>
                        </div>
                     </div>
                     <!-- button -->
                     <div class="col-12 text-end">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="button">Save Address</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Footer -->
      <!-- footer -->
    @include('frontend.includes.footer')
      <!-- Javascript-->
      <script src="{{asset('ui/frontend')}}/assets/libs/flatpickr/dist/flatpickr.min.js"></script>
      <!-- Libs JS -->
      <!-- <script src="{{asset('ui/frontend')}}/assets/libs/jquery/dist/jquery.min.js"></script> -->
      <script src="{{asset('ui/frontend')}}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <script src="{{asset('ui/frontend')}}/assets/libs/simplebar/dist/simplebar.min.js"></script>

      <!-- Theme JS -->
      <script src="{{asset('ui/frontend')}}/assets/js/theme.min.js"></script>

      <script src="{{asset('ui/frontend')}}/assets/libs/imask/dist/imask.min.js"></script>
      <script src="{{asset('ui/frontend')}}/assets/js/vendors/inputmask.js"></script>
   </body>

<!-- Mirrored from freshcart.codescandy.com/pages/shop-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Aug 2024 14:57:15 GMT -->
</html>
