<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta content="RomanaIdressEkfa" name="author" />
      <title>FreshCart</title>
      <link href="{{asset('ui/frontend')}}/assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet" />
      <link href="{{asset('ui/frontend')}}/assets/libs/slick-carousel/slick/slick.css" rel="stylesheet" />
      <link href="{{asset('ui/frontend')}}/assets/libs/slick-carousel/slick/slick-theme.css" rel="stylesheet" />
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
      <!-- navigation -->
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
                  <form>
                     <div class="mb-3">
                        <label for="fullName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter Your Name" required="" />
                     </div>
                     <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email address" required="" />
                     </div>

                     <div class="mb-5">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" required="" />
                        <small class="form-text">
                           By Signup, you agree to our
                           <a href="">Terms of Service</a>
                           &
                           <a href="">Privacy Policy</a>
                        </small>
                     </div>

                     <button type="submit" class="btn btn-primary">Sign Up</button>
                  </form>
               </div>
               <div class="modal-footer border-0 justify-content-center">
                  Already have an account?
                  <a href="">Sign in</a>
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


               @php $total = 0 @endphp
               @if(session('cart'))
                   @foreach(session('cart') as $id => $details)
                       @php $total += $details['sale_price'] * $details['quantity'] @endphp

               <ul class="list-group list-group-flush">

                  <!-- list group -->
                  <li class="list-group-item py-3 ps-0">
                     <!-- row -->
                     <div class="row align-items-center">
                        <div class="col-6 col-md-6 col-lg-7">
                           <div class="d-flex">
                              <img src="{{ asset($details['image']) }}" alt="Ecommerce" class="icon-shape icon-xxl" />
                              <div class="ms-3">
                                 <a href="{{asset('ui/frontend')}}/shop-single.html" class="text-inherit">
                                    <h6 class="mb-0">{{ $details['name'] }}</h6>
                                 </a>
                                 <span><small class="text-muted">{{$details['sale_price'] }} ৳</small></span>
                                 <!-- text -->
                                 <div class="mt-2 small lh-1">
                                    <a href="" class="text-decoration-none text-inherit cart_remove">
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
                                       <span class="text-muted cart_remove">Remove</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>

                       <!-- Quantity input group -->
<div class="col-4 col-md-3 col-lg-3">
    <div class="input-group input-spinner">
        <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
        <input type="number" step="1" max="10" value="{{ $details['quantity'] }}" name="quantity" class="quantity-field form-control-sm form-input cart_update" />
        <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
    </div>
</div>
<!-- Price -->
<div class="col-2 text-lg-end text-start text-md-end col-md-2">
    <span data-th="Subtotal" class="fw-bold text-danger subtotal">
        ${{ $details['sale_price'] * $details['quantity'] }} ৳
    </span>
</div>

<!-- Total -->
{{-- <div id="total" class="total-price fw-bold text-danger">
    ${{ $total }} ৳
</div> --}}
                     </div>
                  </li>

               </ul>
               @endforeach
               @endif
               <!-- btn -->
               <div class="d-flex justify-content-between mt-4">
                  <a href="{{route('wishlist')}}" class="btn btn-primary">Continue Shopping</a>
                  <a href="{{route('checkout')}}" class="btn btn-dark">Update Cart</a>
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

      <main>
         <!-- section -->
         <section class="mt-8 p-10">
            <div class="container-fluid m-auto">
               <!-- row -->
               <div class="row">
                  <div class="col-xxl-8 col-xl-7">
                     <!-- hero slider -->
                     <div class="hero-slider">
                        <div style="background: url({{asset('ui/frontend')}}/assets/images/slider/slider-image-1.jpg) no-repeat; background-size: cover; border-radius: 0.5rem">
                           <div class="ps-lg-12 py-lg-16 col-xxl-7 col-lg-9 py-14 px-8 text-xs-center">
                              <!-- badge -->
                              <div class="d-flex align-items-center mb-4">
                                 <span>Exclusive Offer</span>
                                 <span class="badge bg-danger ms-2">15%</span>
                              </div>
                              <!-- title -->
                              <h2 class="text-dark display-5 fw-bold mb-3">Best Online Deals, Free Stuff</h2>
                              <p class="fs-5 text-dark">Only on this week... Don’t miss</p>
                              <!-- price -->
                              <div class="mb-4 mt-4">
                                 <span class="text-dark">
                                    Start from
                                    <span class="fs-4 text-danger ms-1">$5.99</span>
                                 </span>
                              </div>
                              <!-- btn -->
                              <a href="{{asset('ui/frontend')}}/#!" class="btn btn-primary">
                                 Get Best Deal
                                 <i class="feather-icon icon-arrow-right ms-1"></i>
                              </a>
                           </div>
                        </div>
                        <!-- img -->
                        <div style="background: url({{asset('ui/frontend')}}/assets/images/slider/slider-image-2.jpg) no-repeat; background-size: cover; border-radius: 0.5rem">
                           <div class="ps-lg-12 py-lg-16 col-xxl-7 col-lg-9 py-14 ps-8 text-xs-center">
                              <!-- badge -->
                              <div class="d-flex align-items-center mb-4">
                                 <span>Exclusive Offer</span>
                                 <span class="badge bg-danger ms-2">35%</span>
                              </div>

                              <!-- title -->
                              <h2 class="text-dark display-5 fw-bold mb-3">Chocozay wafer-rolls Deals</h2>
                              <!-- para -->
                              <p class="fs-5 text-dark">Only on this week... Don’t miss</p>
                              <div class="mb-4 mt-4">
                                 <span class="text-dark">
                                    Start from
                                    <span class="fs-4 text-danger ms-1">$34.99</span>
                                 </span>
                              </div>
                              <!-- btn -->
                              <a href="{{asset('ui/frontend')}}/#!" class="btn btn-primary">
                                 Shop Deals Now
                                 <i class="feather-icon icon-arrow-right ms-1"></i>
                              </a>
                           </div>
                        </div>
                        <!-- img -->
                        <div style="background: url({{asset('ui/frontend')}}/assets/images/slider/slider-image-3.jpg) no-repeat; background-size: cover; border-radius: 0.5rem">
                           <div class="ps-lg-12 py-lg-16 col-xxl-7 col-lg-9 py-14 ps-8 text-xs-center">
                              <!-- badge -->
                              <div class="d-flex align-items-center mb-4">
                                 <span>Exclusive Offer</span>
                                 <span class="badge bg-danger ms-2">20%</span>
                              </div>
                              <!-- title -->
                              <h2 class="text-dark display-5 fw-bold mb-3">Cokoladni Kolutici Lasta</h2>
                              <!-- para -->
                              <p class="fs-5 text-dark">Only on this week... Don’t miss</p>
                              <div class="mb-4 mt-4">
                                 <span class="text-dark">
                                    Start from
                                    <span class="fs-4 text-primary ms-1">$5.99</span>
                                 </span>
                              </div>
                              <!-- btn -->
                              <a href="{{asset('ui/frontend')}}/#!" class="btn btn-primary">
                                 Shop This Week Offer
                                 <i class="feather-icon icon-arrow-right ms-1"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-4 col-xl-5 col-12 d-lg-flex d-xl-block gap-3 gap-xl-0">
                     <div class="flex-fill px-8 py-9 mb-6 rounded" style="background: url({{asset('ui/frontend')}}/assets/images/banner/ad-banner-1.jpg) no-repeat; background-size: cover">
                        <div>
                           <h3 class="mb-0 fw-bold">
                              10% cashback on
                              <br />
                              personal care
                           </h3>
                           <div class="mt-4 mb-5 fs-5">
                              <p class="mb-0">Max cashback: $12</p>
                              <span>
                                 Code:
                                 <span class="fw-bold text-dark">CARE12</span>
                              </span>
                           </div>
                           <a href="{{asset('ui/frontend')}}/#" class="btn btn-dark">Shop Now</a>
                        </div>
                     </div>

                     <div class="flex-fill px-8 py-8 rounded" style="background: url({{asset('ui/frontend')}}/assets/images/banner/ad-banner-2.jpg) no-repeat; background-size: cover">
                        <!-- Banner Content -->
                        <div>
                           <!-- Banner Content -->
                           <h3 class="fw-bold mb-3">
                              Say yes to
                              <br />
                              season’s fresh
                           </h3>
                           <div class="mt-4 mb-5 fs-5">
                              <p class="fs-5 mb-0">
                                 Refresh your day
                                 <br />
                                 the fruity way
                              </p>
                           </div>

                           <a href="{{asset('ui/frontend')}}/#" class="btn btn-dark">Shop Now</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>


         <!--============ Shop by Categories==================
          =================================================== -->
         <!-- section category -->
         <section class="my-8">
            <div class="container-fluid">
               <div class="row align-items-center mb-6">
                  <div class="col-10">
                     <div>
                        <!-- heading    -->
                        <h3 class="align-items-center d-flex mb-0 h4">
                           <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              class="feather feather-layers text-primary">
                              <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                              <polyline points="2 17 12 22 22 17"></polyline>
                              <polyline points="2 12 12 17 22 12"></polyline>
                           </svg>
                           <span class="ms-3 ">Shop by Categories</span>
                        </h3>
                     </div>
                  </div>
                  <div class="col-2">
                     <div class="slider-arrow slider-8-columns-arrow" id="slider-8-columns-arrows"></div>
                  </div>
               </div>
               <div class="row g-6">
                  <div class="col-12">
                     <div class="position-relative">
                        <div class="slider-8-columns" id="slider-8-columns">
                           <!-- item -->
                           @foreach ($categories as $category)
                           <div class="item">
                            <!-- item -->
                            <a href="{{route('allProduct',$category->id)}}" class="text-decoration-none text-inherit">
                               <!-- card -->
                               <div class="card mb-3 card-lift">
                                  <div class="card-body text-center py-6">
                                     <div class="my-5">
                                        @if (strpos($category->image, '<svg') !== false)
                                                {!! $category->image !!}
                                            @else
                                                <img style="width: 56px; height: 56px;" src="{{ asset($category->image) }}" alt="{{ $category->name }}">
                                        @endif
                                     </div>
                                     <!-- text -->
                                     <div>{{$category->name}}</div>
                                  </div>
                               </div>
                            </a>
                         </div>
                           @endforeach

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
   <!--====================== Shop by Categories End===============
    =============================================================-->


    <section>
      <div class="container-fluid">
         <div class="row">
            <div class="col-12 col-md-4 mb-3 mb-lg-0">
               <div>
                  <div class="py-10 px-8 rounded" style="background: url({{asset('ui/frontend')}}/assets/images/banner/grocery-banner.png) no-repeat; background-size: cover; background-position: center">
                     <div>
                        <h3 class="fw-bold mb-1">Fruits & Vegetables</h3>
                        <p class="mb-4">
                           Get Upto
                           <span class="fw-bold">30%</span>
                           Off
                        </p>
                        <a href="{{asset('ui/frontend')}}/#!" class="btn btn-dark">Shop Now</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-4">
               <div>
                  <div class="py-10 px-8 rounded" style="background: url({{asset('ui/frontend')}}/assets/images/banner/menu-banner.jpg) no-repeat; background-size: cover; background-position: center">
                     <div>
                        <h3 class="fw-bold mb-1">Freshly Baked Buns</h3>
                        <p class="mb-4">
                           Get Upto
                           <span class="fw-bold">25%</span>
                           Off
                        </p>
                        <a href="{{asset('ui/frontend')}}/#!" class="btn btn-dark">Shop Now</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-4">
               <div>
                  <div class="py-10 px-8 rounded" style="background: url({{asset('ui/frontend')}}/assets/images/banner/ad-banner-2.jpg) no-repeat; background-size: cover; background-position: center">
                     <div>
                        <h3 class="fw-bold mb-1">Freshly Baked Buns</h3>
                        <p class="mb-4">
                           Get Upto
                           <span class="fw-bold">25%</span>
                           Off
                        </p>
                        <a href="{{asset('ui/frontend')}}/#!" class="btn btn-dark">Shop Now</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>




         <!--====================== FreshCart Fruits Product====================== -->

         <!-- section product-->
         <section class=" my-8 ">
            <div class="container-fluid">
               <!-- row -->
               <div class="row align-items-center mb-6">
                  <div class="col-lg-10 col-10">
                     <!-- heading -->
                     <h3 class="align-items-center d-flex mb-0 h4">
                        <svg
                           xmlns="http://www.w3.org/2000/svg"
                           width="24"
                           height="24"
                           viewBox="0 0 24 24"
                           fill="none"
                           stroke="currentColor"
                           stroke-width="2"
                           stroke-linecap="round"
                           stroke-linejoin="round"
                           class="feather feather-star text-primary">
                           <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        <span class="ms-3 ">FreshCart Fruits Product</span>
                     </h3>
                  </div>
                  <div class="col-lg-2 col-2">
                     <div class="slider-arrow" id="slider-second-arrows"></div>
                  </div>
               </div>
               <!-- slider -->
               <div class="product-slider-second" id="slider-second">
                  <!-- item -->
                  @foreach ($fruitProducts as $category)
                  @foreach ($category->products as $product)
                  <div class="item">
                    <!-- item -->
                    <div class="card card-product mb-lg-4">
                       <div class="card-body">
                          <!-- badge -->
                          <div class="text-center position-relative">
                             <div class="position-absolute top-0 start-0">
                                <span class="badge bg-danger">{{$product->discount}}</span>
                             </div>
                             <!-- img -->
                             <!-- img -->
                             <a href="">
                                <img src="{{asset($product->image)}}" alt="{{asset($product->image)}}" class="mb-3 img-fluid" style="height: 227px;"/></a>
                             <!-- action btn -->
                             <!-- action btn -->
                             <div class="card-product-action">
                                <a href="{{asset('ui/frontend')}}/#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal_{{ $product->id }}">
                                   <i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i>
                                </a>
                                <a href="{{asset('ui/frontend')}}/shop-wishlist.html" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i class="bi bi-heart"></i></a>
                                <a href="{{asset('ui/frontend')}}/#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                             </div>
                          </div>
                          <!-- title -->
                          <div class="text-small mb-1">
                             <a href="{{asset('ui/frontend')}}/#!" class="text-decoration-none text-muted"><small>Fruits & Vegetables</small></a>
                          </div>
                          <h2 class="fs-6"><a href="{{asset('ui/frontend')}}/#!" class="text-inherit text-decoration-none">Fresh Apple</a></h2>
                          <div>
                            <!-- rating -->
                            <small class="text-warning">
                                @php
                                    $rating = $product->rating ?? 0; // Assuming $product->rating contains the rating value
                                    $fullStars = floor($rating);
                                    $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
                                    $emptyStars = 5 - ($fullStars + $halfStar);
                                @endphp

                                <!-- Display full stars -->
                                @for ($i = 0; $i < $fullStars; $i++)
                                    <i class="bi bi-star-fill"></i>
                                @endfor

                                <!-- Display half star if needed -->
                                @if ($halfStar)
                                    <i class="bi bi-star-half"></i>
                                @endif

                                <!-- Display empty stars -->
                                @for ($i = 0; $i < $emptyStars; $i++)
                                    <i class="bi bi-star"></i>
                                @endfor
                            </small>
                            <span class="text-muted small">{{ number_format($rating, 1) }} ({{ $product->reviews ?? 0 }})</span>
                        </div>
                          <!-- price -->
                          <div class="d-flex justify-content-between align-items-center mt-3">
                             <div>
                                <span class="text-dark">{{$product->sale_price}}৳</span>
                                @if(!empty($product->regular_price))
                                    <span class="text-decoration-line-through text-muted">{{ $product->regular_price }}৳</span>
                                @endif
                             </div>
                             <!-- btn -->
                             <div>
                                <a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary btn-sm">
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
                                      class="feather feather-plus">
                                      <line x1="12" y1="5" x2="12" y2="19"></line>
                                      <line x1="5" y1="12" x2="19" y2="12"></line>
                                   </svg>
                                   Add
                                </a>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                 @endforeach
                  @endforeach

               </div>
            </div>
         </section>
         <!--============================== FreshCart Latest Products End============================-->


   <style>
 .align-center {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
         .linear-wipe {
         text-align: center;

         background: linear-gradient(to right, #FFF 0%, #FF0 40%, #FF0 60%, #FFF 80%);
         background-size: 200% auto;

         color: #000;
         background-clip: text;
         text-fill-color: transparent;
         -webkit-background-clip: text;
         -webkit-text-fill-color: transparent;

         animation: shine 1s linear infinite;
         @keyframes shine {
            to {
               background-position: 200% center;
            }
         }
         }
   </style>

           <!--============================ Popular Products Start============================-->
           <section class=" my-8 p-5 secondary-bg" >
            <!-- style="background-color: #899590;" -->
            <div class="container-fluid">
               <div class="row">
                  <div class="col-12 mb-6 ">
                     <h3 class="align-items-center d-flex mb-0 h4">
                        <svg
                           xmlns="http://www.w3.org/2000/svg"
                           width="24"
                           height="24"
                           viewBox="0 0 24 24"
                           fill="none"
                           stroke="currentColor"
                           stroke-width="2"
                           stroke-linecap="round"
                           stroke-linejoin="round"
                           class="feather feather-star text-primary">
                           <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        <span class="ms-3 text-white bold linear-wipe align-center">FreshCart Popular Products</span>
                     </h3>
                  </div>
               </div>

               <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">
                @foreach ($products as $product)
                <div class="col">
                    <div class="card card-product">
                       <div class="card-body">
                          <div class="text-center position-relative">
                             <div class="position-absolute top-0 start-0">
                                <span class="badge bg-danger">{{$product->discount}}</span>
                             </div>
                             <a href="">
                                <img src="{{asset($product->image)}}" alt="{{asset($product->image)}}" class="mb-3 img-fluid" style="height: 212px;" /></a>

                             <div class="card-product-action">
                                <a href="{{asset('ui/frontend')}}/#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal_{{ $product->id }}">
                                   <i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i>
                                </a>
                                <a href="{{asset('ui/frontend')}}/#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i class="bi bi-heart"></i></a>
                                <a href="{{asset('ui/frontend')}}/#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                             </div>
                          </div>
                          <div class="text-small mb-1">
                             <a href="{{asset('ui/frontend')}}/#!" class="text-decoration-none text-muted"><small>{{$product->name}}</small></a>
                          </div>
                          <h2 class="fs-6"><a href="{{asset('ui/frontend')}}/pages/shop-single.html" class="text-inherit text-decoration-none">{{$product->name}}</a></h2>
                          <div>
                            <!-- rating -->
                            <small class="text-warning">
                                @php
                                    $rating = $product->rating ?? 0; // Assuming $product->rating contains the rating value
                                    $fullStars = floor($rating);
                                    $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
                                    $emptyStars = 5 - ($fullStars + $halfStar);
                                @endphp

                                <!-- Display full stars -->
                                @for ($i = 0; $i < $fullStars; $i++)
                                    <i class="bi bi-star-fill"></i>
                                @endfor

                                <!-- Display half star if needed -->
                                @if ($halfStar)
                                    <i class="bi bi-star-half"></i>
                                @endif

                                <!-- Display empty stars -->
                                @for ($i = 0; $i < $emptyStars; $i++)
                                    <i class="bi bi-star"></i>
                                @endfor
                            </small>
                            <span class="text-muted small">{{ number_format($rating, 1) }} ({{ $product->reviews ?? 0 }})</span>
                        </div>
                          <div class="d-flex justify-content-between align-items-center mt-3">
                             <div>
                                <span class="text-dark">{{$product->sale_price}} ৳</span>
                                @if (!empty($product->regular_price))
                                <span class="text-decoration-line-through text-muted">{{$product->regular_price}} ৳</span>
                                @endif

                             </div>
                             <div>
                                <a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary btn-sm">
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
                                      class="feather feather-plus">
                                      <line x1="12" y1="5" x2="12" y2="19"></line>
                                      <line x1="5" y1="12" x2="19" y2="12"></line>
                                   </svg>
                                   Add
                                </a>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                @endforeach

               </div>
            </div>
         </section>
         <!-- ============================Popular Products End============================-->


         <!-- ============================Image Grid Start============================-->
         <style>
            .clss.products .slick-list {
                padding-bottom: 20px !important;
            }

            .hc img {
                margin-bottom: 22px;
                padding: 0 !important;
            }

            /* Shine Effect CSS */
            .hover14 figure {
                position: relative;
                width: 100%;
                height: 100%; /* Ensure full height */
                margin: 0; /* Remove any default margin */
                padding: 0; /* Remove any default padding */
                overflow: hidden;
            }

            .hover14 img {
                width: 100%;
                height: 100%; /* Ensure the image fills the figure */
                object-fit: cover; /* Maintain aspect ratio and fill the figure */
            }

            .hover14 figure::before {
                position: absolute;
                top: 0;
                left: -75%;
                z-index: 2;
                display: block;
                content: '';
                width: 50%;
                height: 100%;
                background: -webkit-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,.3) 100%);
                background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,.3) 100%);
                -webkit-transform: skewX(-25deg);
                transform: skewX(-25deg);
            }

            .hover14 figure:hover::before {
                -webkit-animation: shine .75s;
                animation: shine .75s;
            }

            @-webkit-keyframes shine {
                100% {
                    left: 125%;
                }
            }

            @keyframes shine {
                100% {
                    left: 125%;
                }
            }
        </style>

        <section class="hero-2 hc mt-10  py-7 mb-5">
         <div class="">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-3">
                         <div class="hover14 column">
                             <a href="{{asset('ui/frontend')}}/assets/images/products/still-life-colorful-gummy-bears_23-2149870770.avif">
                                 <figure>
                                     <img width="100%"
                                         src="{{asset('ui/frontend')}}/assets/images/products/still-life-colorful-gummy-bears_23-2149870770.avif"
                                         alt="">
                                 </figure>
                             </a>
                         </div>
                         <div class="hover14 column">
                             <a href="{{asset('ui/frontend')}}/assets/images/products/shopping-cart-with-fruits-vegetables-it_1340-37259.avif">
                                 <figure>
                                     <img width="100%"
                                         src="{{asset('ui/frontend')}}/assets/images/products/shopping-cart-with-fruits-vegetables-it_1340-37259.avif"
                                         alt="" style="height: 210px;">
                                 </figure>
                             </a>
                         </div>
                     </div>
                     <div class="col-md-6">
                        <div class="hover14 column" style="height: 92%;">
                            <a href="{{asset('ui/frontend')}}/assets/images/products/flat-lay-blackboard-with-fruit-vegetables-reusable-bags_23-2148493508.avif">
                                <figure>
                                    <img width="100%"
                                        src="{{asset('ui/frontend')}}/assets/images/products/flat-lay-blackboard-with-fruit-vegetables-reusable-bags_23-2148493508.avif"
                                        alt="">
                                </figure>
                            </a>
                        </div>
                    </div>

                     <div class="col-md-3">
                         <div class="hover14 column">
                             <a href="{{asset('ui/frontend')}}/assets/images/products/top-close-up-view-persimmons-three-persimmons-persimmon-grey-basket-notebook_140725-123639.avif">
                                 <figure>
                                     <img width="100%"
                                         src="{{asset('ui/frontend')}}/assets/images/products/top-close-up-view-persimmons-three-persimmons-persimmon-grey-basket-notebook_140725-123639.avif"
                                         alt="">
                                 </figure>
                             </a>
                         </div>
                         <div class="hover14 column">
                             <a href="{{asset('ui/frontend')}}/assets/images/products/3d-rendering-cartoon-shopping-cart_23-2151680635.avif">
                                 <figure>
                                     <img width="100%"
                                         src="{{asset('ui/frontend')}}/assets/images/products/3d-rendering-cartoon-shopping-cart_23-2151680635.avif"
                                         alt="" style="height: 210px;">
                                 </figure>
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
         <!-- ============================Image Grid End============================-->



    <!-- ============================New Products Start============================-->

         <section class="mb-lg-14 mb-8">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="mb-6 d-xl-flex justify-content-between align-items-center">
                            <!-- heading -->
                            <div class="mb-5 mb-xl-0">
                                <h3 class="mb-0">Vegetable Products</h3>
                                <p class="mb-0">New products with updated stocks</p>
                            </div>

                            <div>
                                <!-- nav -->
                                <nav>
                                    <ul class="nav nav-pills nav-scroll border-bottom-0 gap-1" id="nav-tab" role="tablist">
                                        <!-- "All" nav item -->
                                        <li class="nav-item">
                                            <!-- nav link -->
                                            <a
                                               href="#nav-all"
                                               class="nav-link active"
                                               id="nav-all-tab"
                                               data-bs-toggle="tab"
                                               data-bs-target="#nav-all"
                                               role="tab"
                                               aria-controls="nav-all"
                                               aria-selected="true">
                                               All
                                            </a>
                                        </li>

                                        <!-- Dynamic nav items based on categories -->
                                        @foreach ($vegetableProducts as $category)
                                        @foreach ($category->subCategories as $subCategory)
                                        <li class="nav-item">
                                            <!-- nav link -->
                                            <a
                                               href="#nav-{{ $subCategory->id }}"
                                               class="nav-link"
                                               id="nav-{{ $subCategory->id }}-tab"
                                               data-bs-toggle="tab"
                                               data-bs-target="#nav-{{ $subCategory->id }}"
                                               role="tab"
                                               aria-controls="nav-{{ $subCategory->id }}"
                                               aria-selected="false">
                                               {{ $subCategory->name }}
                                            </a>
                                        </li>
                                        @endforeach
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <!-- tab -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- "All" tab pane -->
                            <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab" tabindex="0">
                                <!-- row -->
                                <div class="row row-cols-2 row-cols-xl-5 row-cols-md-3 g-4">
                                    @foreach ($allProducts as $product)
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product-v2 h-100">
                                            <div class="card-body position-relative">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    @if($product->is_on_sale)
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    @endif
                                                    <!-- img -->
                                                    <a href="#!"><img src="{{ $product->image }}" alt="{{ $product->name }}" class="mb-3 img-fluid" style="height: 220px;"/></a>
                                                    <!-- action btn -->
                                                    <div class="product-action-btn">
                                                        <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal_{{ $product->id }}"><i class="bi bi-eye"></i></a>
                                                        <a href="shop-wishlist.html" class="btn-action mb-1" data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i class="bi bi-heart"></i></a>
                                                        <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- title -->
                                                <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">{{ $product->name }}</a></h2>
                                                <div>
                                                    <!-- rating -->
                                                    <small class="text-warning">
                                                        @php
                                                            $rating = $product->rating ?? 0; // Assuming $product->rating contains the rating value
                                                            $fullStars = floor($rating);
                                                            $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
                                                            $emptyStars = 5 - ($fullStars + $halfStar);
                                                        @endphp

                                                        <!-- Display full stars -->
                                                        @for ($i = 0; $i < $fullStars; $i++)
                                                            <i class="bi bi-star-fill"></i>
                                                        @endfor

                                                        <!-- Display half star if needed -->
                                                        @if ($halfStar)
                                                            <i class="bi bi-star-half"></i>
                                                        @endif

                                                        <!-- Display empty stars -->
                                                        @for ($i = 0; $i < $emptyStars; $i++)
                                                            <i class="bi bi-star"></i>
                                                        @endfor
                                                    </small>
                                                    <span class="text-muted small">{{ number_format($rating, 1) }} ({{ $product->reviews ?? 0 }})</span>
                                                </div>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-danger">{{ $product->sale_price }} ৳</span>
                                                        @if (!empty($product->regular_price))
                                                        <span class="text-decoration-line-through text-muted">{{ $product->regular_price }} ৳</span>
                                                        @endif
                                                    </div>
                                                    <div><span class="text-uppercase small text-primary">{{ $product->stock_status }}</span></div>
                                                </div>
                                                <!-- btn -->
                                                <div class="product-fade-block">
                                                    <div class="d-grid mt-4">
                                                        <a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary rounded-pill">Add to Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- hidden class for hover -->
                                            <div class="product-content-fade border-info" style="margin-bottom: -60px"></div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Dynamic tab panes based on categories -->
                            @foreach ($categories as $category)
                            @foreach ($category->subCategories as $subCategory)
                            <div class="tab-pane fade" id="nav-{{ $subCategory->id }}" role="tabpanel" aria-labelledby="nav-{{ $subCategory->id }}-tab" tabindex="0">
                                <!-- row -->
                                <div class="row row-cols-2 row-cols-xl-5 row-cols-md-3 g-4">
                                    @foreach ($subCategory->products as $product)
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product-v2 h-100">
                                            <div class="card-body position-relative">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    @if($product->is_on_sale)
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    @endif
                                                    <!-- img -->
                                                    <a href="#!"><img src="{{ $product->image }}" alt="{{ $product->name }}" class="mb-3 img-fluid" style="height: 220px;"/></a>
                                                    <!-- action btn -->
                                                    <div class="product-action-btn">
                                                        <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal_{{ $product->id }}"><i class="bi bi-eye"></i></a>
                                                        <a href="shop-wishlist.html" class="btn-action mb-1" data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i class="bi bi-heart"></i></a>
                                                        <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- title -->
                                                <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">{{ $product->name }}</a></h2>
                                                <div>
                                                    <!-- rating -->
                                                    <small class="text-warning">
                                                        @php
                                                            $rating = $product->rating ?? 0; // Assuming $product->rating contains the rating value
                                                            $fullStars = floor($rating);
                                                            $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
                                                            $emptyStars = 5 - ($fullStars + $halfStar);
                                                        @endphp

                                                        <!-- Display full stars -->
                                                        @for ($i = 0; $i < $fullStars; $i++)
                                                            <i class="bi bi-star-fill"></i>
                                                        @endfor

                                                        <!-- Display half star if needed -->
                                                        @if ($halfStar)
                                                            <i class="bi bi-star-half"></i>
                                                        @endif

                                                        <!-- Display empty stars -->
                                                        @for ($i = 0; $i < $emptyStars; $i++)
                                                            <i class="bi bi-star"></i>
                                                        @endfor
                                                    </small>
                                                    <span class="text-muted small">{{ number_format($rating, 1) }} ({{ $product->reviews ?? 0 }})</span>
                                                </div>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-danger">{{ $product->sale_price }} ৳</span>
                                                        @if (!empty($product->regular_price))
                                                        <span class="text-decoration-line-through text-muted">{{ $product->regular_price }} ৳</span>
                                                        @endif
                                                    </div>
                                                    <div><span class="text-uppercase small text-primary">{{ $product->stock_status }}</span></div>
                                                </div>
                                                <!-- btn -->
                                                <div class="product-fade-block">
                                                    <div class="d-grid mt-4">
                                                        <a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary rounded-pill">Add to Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- hidden class for hover -->
                                            <div class="product-content-fade border-info" style="margin-bottom: -60px"></div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- ============================New Products End============================-->



  <!-- ============================Daily Best Sells============================ -->
  <section>
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12 mb-6">
            <h3 class="mb-0">Daily Best Sells</h3>
         </div>
      </div>
      <div class="table-responsive-lg pb-6">
         <div class="row row-cols-lg-5 row-cols-1 row-cols-md-2 g-4 flex-nowrap">
            <div class="col">
               <div class="pt-8 px-6 px-xl-8 rounded" style="background: url({{asset('ui/frontend')}}/assets/images/banner/banner-deal.jpg) no-repeat; background-size: cover; height: 405px">
                  <div>
                     <h3 class="fw-bold text-white">100% Organic Coffee Beans.</h3>
                     <p class="text-white">Get the best deal before close.</p>
                     <a href="{{asset('ui/frontend')}}/#!" class="btn btn-primary">
                        Shop Now
                        <i class="feather-icon icon-arrow-right ms-1"></i>
                     </a>
                  </div>
               </div>
            </div>

            @foreach ($bestSellingProducts as $product)
            <div class="col">
               <div class="card card-product">
                  <div class="card-body">
                     <div class="text-center position-relative">
                        <a href="{{ route('product.show', $product->id) }}">
                           <img src="{{ $product->image }}" alt="{{ $product->name }}" class="mb-3 img-fluid" style="height: 220px;"/>
                        </a>
                        <div class="card-product-action">
                           <a href="#" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal_{{ $product->id }}">
                              <i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i>
                           </a>
                           <a href="#" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist">
                              <i class="bi bi-heart"></i>
                           </a>
                           <a href="#" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare">
                              <i class="bi bi-arrow-left-right"></i>
                           </a>
                        </div>
                     </div>
                     <div class="text-small mb-1">
                        <a href="#" class="text-decoration-none text-muted">
                           <small>{{ $product->category->name }}</small>
                        </a>
                     </div>
                     <h2 class="fs-6">
                        <a href="{{ route('product.show', $product->id) }}" class="text-inherit text-decoration-none">
                           {{ $product->name }}
                        </a>
                     </h2>
                     <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                           <span class="text-dark">{{ $product->sale_price }} ৳</span>
                           @if (!empty($product->regular_price))
                           <span class="text-decoration-line-through text-muted">{{ $product->regular_price }} ৳</span>
                           @endif

                        </div>
                        <div>
                           <small class="text-warning">
                              @php
                                  $rating = $product->rating ?? 0;
                                  $fullStars = floor($rating);
                                  $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
                                  $emptyStars = 5 - ($fullStars + $halfStar);
                              @endphp

                              <!-- Full stars -->
                              @for ($i = 0; $i < $fullStars; $i++)
                                  <i class="bi bi-star-fill"></i>
                              @endfor

                              <!-- Half star -->
                              @if ($halfStar)
                                  <i class="bi bi-star-half"></i>
                              @endif

                              <!-- Empty stars -->
                              @for ($i = 0; $i < $emptyStars; $i++)
                                  <i class="bi bi-star"></i>
                              @endfor
                           </small>
                           <span><small>{{ number_format($rating, 1) }}</small></span>
                        </div>
                     </div>
                     <div class="d-grid mt-2">
                        <a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                              <path d="M8 0a.5.5 0 0 1 .5.5V3h3v2h-3v2.5a.5.5 0 0 1-1 0V5H4V3h3V.5A.5.5 0 0 1 8 0z"/>
                              <path d="M2.5 2.5A1.5 1.5 0 1 0 1 4v11h12V4a1.5 1.5 0 1 0-3 0h-.548l.486-1.946A1.5 1.5 0 0 0 7.915.65L6.585 4H1.5a.5.5 0 0 0-.495.57l1 6A.5.5 0 0 0 2.5 11h10a.5.5 0 0 0 .495-.57l-1-6A.5.5 0 0 0 11.5 4H9.58l1.214-4.857a1.5 1.5 0 0 0-.91-1.83A1.5 1.5 0 0 0 8 1.5V.5a.5.5 0 0 1 .5-.5h.5z"/>
                           </svg>
                           Add to cart
                        </a>
                     </div>
                     <div class="d-flex justify-content-start text-center mt-3">
                        <div class="deals-countdown w-100" data-countdown="{{ $product->sale_end_date }}"></div>
                     </div>
                  </div>
               </div>
            </div>
        @endforeach
         </div>
      </div>
   </div>
</section>
<!-- ============================Daily Best Sells End ============================-->


         <!-- section cta -->
         <section class="bg-dark" style="background: url(https://freshcart.codescandy.com/assets/images/svg-graphics/pattern.svg) no-repeat; background-size: cover; background-position: center">
            <div class="container">
               <!-- row -->
               <div class="row">
                  <div class="offset-lg-1 col-lg-10">
                     <div class="row align-items-center">
                        <!-- col -->
                        <div class="col-md-6">
                           <div class="text-white mt-8 mt-lg-0">
                              <span>$30 discount for your first order</span>
                              <h2 class="h2 text-white my-4">Get top deals, latest trends, and more.</h2>
                              <p class="text-white-50">Join our email subscription now to get updates on promotions and coupons.</p>
                              <!-- form -->
                              <form class="row g-3 needs-validation" novalidate>
                                 <div class="col-6">
                                    <!-- input -->
                                    <label for="emailAddress" class="form-label visually-hidden">Email Address</label>
                                    <input type="email" class="form-control" id="emailAddress" placeholder="Enter Email Address" required />
                                    <div class="invalid-feedback">Please enter email.</div>
                                 </div>
                                 <!-- btn -->
                                 <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3">Sign Up</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <!-- col -->
                        <div class="col-md-6">
                           <div class="text-center">
                              <!-- img -->
                              <img src="{{asset('ui/frontend')}}/assets/images/png/girl-email.png" alt="" class="img-fluid" />
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </main>


      <!-- modal -->
      <!-- Modal -->
      @foreach ($products as $product)

      <div class="modal fade" id="quickViewModal_{{ $product->id }}" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-body p-8">
                  <div class="position-absolute top-0 end-0 me-3 mt-3">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <!-- img slide -->
                        {{-- <div class="product productModal" id="productModal">
                           <div class="zoom" onmousemove="zoom(event)" style="background-image: url('{{ asset($product->image) }}');">
                              <!-- img -->
                              <img src="{{asset($product->image)}}" alt="" />
                           </div>
                           <div>
                              <div class="zoom" onmousemove="zoom(event)" style="background-image: url({{asset('ui/frontend')}}/assets/images/products/product-single-img-2.jpg)">
                                 <!-- img -->
                                 <img src="{{asset('ui/frontend')}}/assets/images/products/product-single-img-2.jpg" alt="" />
                              </div>
                           </div>
                           <div>
                              <div class="zoom" onmousemove="zoom(event)" style="background-image: url({{asset('ui/frontend')}}/assets/images/products/product-single-img-3.jpg)">
                                 <!-- img -->
                                 <img src="{{asset('ui/frontend')}}/assets/images/products/product-single-img-3.jpg" alt="" />
                              </div>
                           </div>
                           <div>
                              <div class="zoom" onmousemove="zoom(event)" style="background-image: url({{asset('ui/frontend')}}/assets/images/products/product-single-img-4.jpg)">
                                 <!-- img -->
                                 <img src="{{asset('ui/frontend')}}/assets/images/products/product-single-img-4.jpg" alt="" />
                              </div>
                           </div>
                        </div> --}}
                        <!-- product tools -->
                        <div class="product-tools">
                           <div class="thumbnails row g-3" id="productModalThumbnails">
                              <div class="col-3" class="tns-nav-active">
                                 <div class="thumbnails-img">
                                    <!-- img -->
                                    <img src="{{asset('ui/frontend')}}/assets/images/products/product-single-img-1.jpg" alt="" />
                                 </div>
                              </div>
                              <div class="col-3">
                                 <div class="thumbnails-img">
                                    <!-- img -->
                                    <img src="{{asset('ui/frontend')}}/assets/images/products/product-single-img-2.jpg" alt="" />
                                 </div>
                              </div>
                              <div class="col-3">
                                 <div class="thumbnails-img">
                                    <!-- img -->
                                    <img src="{{asset('ui/frontend')}}/assets/images/products/product-single-img-3.jpg" alt="" />
                                 </div>
                              </div>
                              <div class="col-3">
                                 <div class="thumbnails-img">
                                    <!-- img -->
                                    <img src="{{asset('ui/frontend')}}/assets/images/products/product-single-img-4.jpg" alt="" />
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>


                     <div class="col-lg-6">
                        <div class="ps-lg-8 mt-6 mt-lg-0">
                           <a href="{{asset('ui/frontend')}}/#!" class="mb-4 d-block">{{$product->name}}</a>
                           <h2 class="mb-1 h1">{{$product->name}}</h2>
                           <div>
                            <small class="text-warning">
                               @php
                                   $rating = $product->rating ?? 0;
                                   $fullStars = floor($rating);
                                   $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
                                   $emptyStars = 5 - ($fullStars + $halfStar);
                               @endphp

                               <!-- Full stars -->
                               @for ($i = 0; $i < $fullStars; $i++)
                                   <i class="bi bi-star-fill"></i>
                               @endfor

                               <!-- Half star -->
                               @if ($halfStar)
                                   <i class="bi bi-star-half"></i>
                               @endif

                               <!-- Empty stars -->
                               @for ($i = 0; $i < $emptyStars; $i++)
                                   <i class="bi bi-star"></i>
                               @endfor
                            </small>
                            <span><small>{{ number_format($rating, 1) }}</small></span>
                         </div>
                           <div class="fs-4">
                              <span class="fw-bold text-dark">{{$product->sale_price}} ৳</span>
                              @if (!empty($product->regular_price))
                              <span class="text-decoration-line-through text-muted">{{$product->regular_price}} ৳</span>
                              @endif

                              <span><small class="fs-6 ms-2 text-danger">{{$product->discount}}</small></span>
                           </div>
                           <hr class="my-6" />
                           <div class="mb-4">
                              <button type="button" class="btn btn-outline-secondary">250g</button>
                              <button type="button" class="btn btn-outline-secondary">500g</button>
                              <button type="button" class="btn btn-outline-secondary">1kg</button>
                           </div>
                           <div>
                              <!-- input -->
                              <!-- input -->
                              <div class="input-group input-spinner">
                                 <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                                 <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
                                 <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                              </div>
                           </div>
                           <div class="mt-3 row justify-content-start g-2 align-items-center">
                              <div class="col-lg-4 col-md-5 col-6 d-grid">
                                 <!-- button -->
                                 <!-- btn -->
                                 <a href="{{ route('add_to_cart', $product->id) }}" type="button" class="btn btn-primary">
                                    <i class="feather-icon icon-shopping-bag me-2"></i>
                                    Add to cart
                                 </a>
                              </div>
                              <div class="col-md-4 col-5">
                                 <!-- btn -->
                                 <a class="btn btn-light" href="{{asset('ui/frontend')}}/#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare"><i class="bi bi-arrow-left-right"></i></a>
                                 <a class="btn btn-light" href="{{asset('ui/frontend')}}/#!" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Wishlist"><i class="feather-icon icon-heart"></i></a>
                              </div>
                           </div>
                           <hr class="my-6" />
                           <div>
                              <table class="table table-borderless">
                                 <tbody>
                                    <tr>
                                       <td>Product Code:</td>
                                       <td>FBB00255</td>
                                    </tr>
                                    <tr>
                                       <td>Availability:</td>
                                       <td>In Stock</td>
                                    </tr>
                                    <tr>
                                       <td>Type:</td>
                                       <td>Fruits</td>
                                    </tr>
                                    <tr>
                                       <td>Shipping:</td>
                                       <td>
                                          <small>
                                             01 day shipping.
                                             <span class="text-muted">( Free pickup today)</span>
                                          </small>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endforeach
      <!-- Footer -->
      <!-- footer -->
     @include('frontend.includes.footer')
      <!-- Javascript-->
      <!-- Libs JS -->

      <script src="{{asset('ui/frontend')}}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <script src="{{asset('ui/frontend')}}/assets/libs/simplebar/dist/simplebar.min.js"></script>

      <!-- Theme JS -->
      <script src="{{asset('ui/frontend')}}/assets/js/theme.min.js"></script>

      <script src="{{asset('ui/frontend')}}/assets/js/vendors/jquery.min.js"></script>
      <script src="{{asset('ui/frontend')}}/assets/libs/slick-carousel/slick/slick.min.js"></script>
      <script src="{{asset('ui/frontend')}}/assets/js/vendors/slick-slider.js"></script>
      <script src="{{asset('ui/frontend')}}/assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
      <script src="{{asset('ui/frontend')}}/assets/js/vendors/tns-slider.js"></script>
      <script src="{{asset('ui/frontend')}}/assets/js/vendors/zoom.js"></script>
      <script src="{{asset('ui/frontend')}}/assets/js/vendors/validation.js"></script>



      <script type="text/javascript">
         $(".cart_update").change(function (e) {
        e.preventDefault();

        var ele = $(this);
        var quantity = ele.parents("tr").find(".cart_update").val();
        var id = ele.parents("tr").attr("data-id");

        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                quantity: quantity
            },
            success: function (response) {
                // Update the subtotal
                ele.parents("tr").find('.subtotal').text(response.subtotal + ' ৳');

                // Update the total
                $('#total').text(response.total + ' ৳');
            }
        });
    });

        $(".cart_remove").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>

   </body>

</html>
