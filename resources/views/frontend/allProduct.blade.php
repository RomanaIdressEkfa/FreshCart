<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from freshcart.codescandy.com/pages/shop-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Aug 2024 14:57:06 GMT -->
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta content="Codescandy" name="author" />
      <title>Shop Grid eCommerce HTML Template - FreshCart</title>
      <link href="{{asset('ui/frontend')}}/assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet" />
      <link href="{{asset('ui/frontend')}}/assets/libs/nouislider/dist/nouislider.min.css" rel="stylesheet" />
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

      @include('frontend.includes.navbar')


      <main>
         <!-- section-->
         <div class="mt-4">
            <div class="container-fluid">
               <!-- row -->
               <div class="row">
                  <!-- col -->
                  <div class="col-12">
                     <!-- breadcrumb -->
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                           <li class="breadcrumb-item"><a href="{{asset('ui/frontend')}}/#!">Home</a></li>
                           <li class="breadcrumb-item"><a href="{{asset('ui/frontend')}}/#!">Shop</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Snacks & Munchies</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
         <!-- section -->
         <div class="mt-8 mb-lg-14 mb-8">
            <!-- container -->
            <div class="container-fluid">
               <!-- row -->
               <div class="row gx-10">
                  <!-- col -->
                  <aside class="col-lg-3 col-md-4 mb-6 mb-md-0">
                     <div class="offcanvas offcanvas-start offcanvas-collapse w-md-50" tabindex="-1" id="offcanvasCategory" aria-labelledby="offcanvasCategoryLabel">
                        <div class="offcanvas-header d-lg-none">
                           <h5 class="offcanvas-title" id="offcanvasCategoryLabel">Filter</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body ps-lg-2 pt-lg-0">
                           <div class="mb-8">
                              <!-- title -->
                              <h5 class="mb-3">Categories</h5>
                              <!-- nav -->
                              <ul class="nav nav-category" id="categoryCollapseMenu">
                                @foreach ($categories as $category)
                                <li class="nav-item border-bottom w-100">
                                    <!-- Use $loop->index to create unique IDs -->
                                    <a href="{{route('allProduct',$category->id)}}" class="nav-link collapsed" data-bs-toggle="collapse"
                                       data-bs-target="#categoryFlush{{$loop->index}}"
                                       aria-expanded="false"
                                       aria-controls="categoryFlush{{$loop->index}}">
                                      {{$category->name}}
                                       <i class="feather-icon icon-chevron-right"></i>
                                    </a>
                                    <!-- accordion collapse -->
                                    <div id="categoryFlush{{$loop->index}}" class="accordion-collapse collapse" data-bs-parent="#categoryCollapseMenu">
                                       <div>
                                          <!-- nav -->
                                          <ul class="nav flex-column ms-3">
                                            @foreach ($category->subcategories as $subcategory)
                                            <!-- nav item -->
                                            <li class="nav-item">
                                                <a href="" class="nav-link">{{$subcategory->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                       </div>
                                    </div>
                                 </li>
                                @endforeach

                              </ul>
                           </div>

                           <div class="mb-8">
                              <h5 class="mb-3">Stores</h5>
                              <div class="my-4">
                                 <!-- input -->
                                 <input type="search" class="form-control" placeholder="Search by store" />
                              </div>
                              <!-- form check -->
                              <div class="form-check mb-2">
                                 <!-- input -->
                                 <input class="form-check-input" type="checkbox" value="" id="eGrocery" checked />
                                 <label class="form-check-label" for="eGrocery">E-Grocery</label>
                              </div>
                              <!-- form check -->
                              <div class="form-check mb-2">
                                 <!-- input -->
                                 <input class="form-check-input" type="checkbox" value="" id="DealShare" />
                                 <label class="form-check-label" for="DealShare">DealShare</label>
                              </div>
                              <!-- form check -->
                              <div class="form-check mb-2">
                                 <!-- input -->
                                 <input class="form-check-input" type="checkbox" value="" id="Dmart" />
                                 <label class="form-check-label" for="Dmart">DMart</label>
                              </div>
                              <!-- form check -->
                              <div class="form-check mb-2">
                                 <!-- input -->
                                 <input class="form-check-input" type="checkbox" value="" id="Blinkit" />
                                 <label class="form-check-label" for="Blinkit">Blinkit</label>
                              </div>
                              <!-- form check -->
                              <div class="form-check mb-2">
                                 <!-- input -->
                                 <input class="form-check-input" type="checkbox" value="" id="BigBasket" />
                                 <label class="form-check-label" for="BigBasket">BigBasket</label>
                              </div>
                              <!-- form check -->
                              <div class="form-check mb-2">
                                 <!-- input -->
                                 <input class="form-check-input" type="checkbox" value="" id="StoreFront" />
                                 <label class="form-check-label" for="StoreFront">StoreFront</label>
                              </div>
                              <!-- form check -->
                              <div class="form-check mb-2">
                                 <!-- input -->
                                 <input class="form-check-input" type="checkbox" value="" id="Spencers" />
                                 <label class="form-check-label" for="Spencers">Spencers</label>
                              </div>
                              <!-- form check -->
                              <div class="form-check mb-2">
                                 <!-- input -->
                                 <input class="form-check-input" type="checkbox" value="" id="onlineGrocery" />
                                 <label class="form-check-label" for="onlineGrocery">Online Grocery</label>
                              </div>
                           </div>
                           <div class="mb-8">
                              <!-- price -->
                              <h5 class="mb-3">Price</h5>
                              <div>
                                 <!-- range -->
                                 <div id="priceRange" class="mb-3"></div>
                                 <small class="text-muted">Price:</small>
                                 <span id="priceRange-value" class="small"></span>
                              </div>
                           </div>
                           <!-- rating -->
                           <div class="mb-8">
                              <h5 class="mb-3">Rating</h5>
                              <div>
                                 <!-- form check -->
                                 <div class="form-check mb-2">
                                    <!-- input -->
                                    <input class="form-check-input" type="checkbox" value="" id="ratingFive" />
                                    <label class="form-check-label" for="ratingFive">
                                       <i class="bi bi-star-fill text-warning"></i>
                                       <i class="bi bi-star-fill text-warning"></i>
                                       <i class="bi bi-star-fill text-warning"></i>
                                       <i class="bi bi-star-fill text-warning"></i>
                                       <i class="bi bi-star-fill text-warning"></i>
                                    </label>
                                 </div>
                                 <!-- form check -->
                                 <div class="form-check mb-2">
                                    <!-- input -->
                                    <input class="form-check-input" type="checkbox" value="" id="ratingFour" checked />
                                    <label class="form-check-label" for="ratingFour">
                                       <i class="bi bi-star-fill text-warning"></i>
                                       <i class="bi bi-star-fill text-warning"></i>
                                       <i class="bi bi-star-fill text-warning"></i>
                                       <i class="bi bi-star-fill text-warning"></i>
                                       <i class="bi bi-star text-warning"></i>
                                    </label>
                                 </div>
                                 <!-- form check -->
                                 <div class="form-check mb-2">
                                    <!-- input -->
                                    <input class="form-check-input" type="checkbox" value="" id="ratingThree" />
                                    <label class="form-check-label" for="ratingThree">
                                       <i class="bi bi-star-fill text-warning"></i>
                                       <i class="bi bi-star-fill text-warning"></i>
                                       <i class="bi bi-star-fill text-warning"></i>
                                       <i class="bi bi-star text-warning"></i>
                                       <i class="bi bi-star text-warning"></i>
                                    </label>
                                 </div>
                                 <!-- form check -->
                                 <div class="form-check mb-2">
                                    <!-- input -->
                                    <input class="form-check-input" type="checkbox" value="" id="ratingTwo" />
                                    <label class="form-check-label" for="ratingTwo">
                                       <i class="bi bi-star-fill text-warning"></i>
                                       <i class="bi bi-star-fill text-warning"></i>
                                       <i class="bi bi-star text-warning"></i>
                                       <i class="bi bi-star text-warning"></i>
                                       <i class="bi bi-star text-warning"></i>
                                    </label>
                                 </div>
                                 <!-- form check -->
                                 <div class="form-check mb-2">
                                    <!-- input -->
                                    <input class="form-check-input" type="checkbox" value="" id="ratingOne" />
                                    <label class="form-check-label" for="ratingOne">
                                       <i class="bi bi-star-fill text-warning"></i>
                                       <i class="bi bi-star text-warning"></i>
                                       <i class="bi bi-star text-warning"></i>
                                       <i class="bi bi-star text-warning"></i>
                                       <i class="bi bi-star text-warning"></i>
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <div class="mb-8 position-relative">
                              <!-- Banner Design -->
                              <!-- Banner Content -->
                              <div class="position-absolute p-5 py-8">
                                 <h3 class="mb-0">Fresh Fruits</h3>
                                 <p>Get Upto 25% Off</p>
                                 <a href="{{asset('ui/frontend')}}/#" class="btn btn-dark">
                                    Shop Now
                                    <i class="feather-icon icon-arrow-right ms-1"></i>
                                 </a>
                              </div>
                              <!-- Banner Content -->
                              <!-- Banner Image -->
                              <!-- img -->
                              <img src="{{asset('ui/frontend')}}/assets/images/banner/assortment-citrus-fruits.png" alt="" class="img-fluid rounded" />
                              <!-- Banner Image -->
                           </div>
                        </div>
                     </div>
                  </aside>


                  <section class="col-lg-9 col-md-12">
                     <!-- card -->
                     <div class="card mb-4 bg-light border-0">
                        <!-- card body -->

                            <div class="card-body p-9">
                                <h2 class="mb-0 fs-1">{{$cat->name}}</h2>
                            </div>

                     </div>
                     <!-- list icon -->
                     <div class="d-lg-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-lg-0">
                           <p class="mb-0">
                              <span class="text-dark">24</span>
                              Products found
                           </p>
                        </div>

                        <!-- icon -->
                        <div class="d-md-flex justify-content-between align-items-center">
                           <div class="d-flex align-items-center justify-content-between">
                              <div>
                                 <a href="{{asset('ui/frontend')}}/shop-list.html" class="text-muted me-3"><i class="bi bi-list-ul"></i></a>
                                 <a href="{{asset('ui/frontend')}}/shop-grid.html" class="me-3 active"><i class="bi bi-grid"></i></a>
                                 <a href="{{asset('ui/frontend')}}/shop-grid-3-column.html" class="me-3 text-muted"><i class="bi bi-grid-3x3-gap"></i></a>
                              </div>
                              <div class="ms-2 d-lg-none">
                                 <a class="btn btn-outline-gray-400 text-muted" data-bs-toggle="offcanvas" href="{{asset('ui/frontend')}}/#offcanvasCategory" role="button" aria-controls="offcanvasCategory">
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
                                       class="feather feather-filter me-2">
                                       <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                    </svg>
                                    Filters
                                 </a>
                              </div>
                           </div>

                           <div class="d-flex mt-2 mt-lg-0">
                              <div class="me-2 flex-grow-1">
                                 <!-- select option -->
                                 <select class="form-select">
                                    <option selected>Show: 50</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                 </select>
                              </div>
                              <div>
                                 <!-- select option -->
                                 <select class="form-select">
                                    <option selected>Sort by: Featured</option>
                                    <option value="Low to High">Price: Low to High</option>
                                    <option value="High to Low">Price: High to Low</option>
                                    <option value="Release Date">Release Date</option>
                                    <option value="Avg. Rating">Avg. Rating</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                        <!-- col -->


@foreach ($products as $product)
<!-- col -->
<div class="col">
    <!-- card -->
    <div class="card card-product">
       <div class="card-body">
          <!-- badge -->
          <div class="text-center position-relative">
             <div class="position-absolute top-0 start-0">
                <span class="badge bg-success">{{$product->discount}}</span>
             </div>

             <a href="{{asset('ui/frontend')}}/shop-single.html">
                <!-- img -->
                <img src="{{asset($product->image)}}" alt="{{$product->name}}" class="mb-3 img-fluid" style="height: 200px;"/>
             </a>
             <!-- action btn -->
             <div class="card-product-action">
                <a href="{{asset('ui/frontend')}}/#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal_{{ $product->id }}">
                   <i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i>
                </a>
                <a href="{{asset('ui/frontend')}}/shop-wishlist.html" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i class="bi bi-heart"></i></a>
                <a href="{{asset('ui/frontend')}}/#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i class="bi bi-arrow-left-right"></i></a>
             </div>
          </div>
          <!-- heading -->
          <div class="text-small mb-1">
             <a href="{{asset('ui/frontend')}}/#!" class="text-decoration-none text-muted"><small>{{$product->name}}</small></a>
          </div>
          <h2 class="fs-6"><a href="{{asset('ui/frontend')}}/shop-single.html" class="text-inherit text-decoration-none">{{$product->name}}</a></h2>
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



                     </div>
                     <div class="row mt-8">
                        <div class="col">
                           <!-- nav -->
                           <nav>
                              <ul class="pagination">
                                 <li class="page-item disabled">
                                    <a class="page-link mx-1" href="{{asset('ui/frontend')}}/#" aria-label="Previous">
                                       <i class="feather-icon icon-chevron-left"></i>
                                    </a>
                                 </li>
                                 <li class="page-item"><a class="page-link mx-1 active" href="{{asset('ui/frontend')}}/#">1</a></li>
                                 <li class="page-item"><a class="page-link mx-1" href="{{asset('ui/frontend')}}/#">2</a></li>

                                 <li class="page-item"><a class="page-link mx-1" href="{{asset('ui/frontend')}}/#">...</a></li>
                                 <li class="page-item"><a class="page-link mx-1" href="{{asset('ui/frontend')}}/#">12</a></li>
                                 <li class="page-item">
                                    <a class="page-link mx-1" href="{{asset('ui/frontend')}}/#" aria-label="Next">
                                       <i class="feather-icon icon-chevron-right"></i>
                                    </a>
                                 </li>
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </section>

               </div>
            </div>
         </div>
      </main>

      <!-- modal -->
      <!-- Modal -->
      <div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-body p-8">
                  <div class="position-absolute top-0 end-0 me-3 mt-3">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <!-- img slide -->
                        <div class="product productModal" id="productModal">
                           <div class="zoom" onmousemove="zoom(event)" style="background-image: url(../assets/images/products/product-single-img-1.jpg)">
                              <!-- img -->
                              <img src="{{asset('ui/frontend')}}/assets/images/products/product-single-img-1.jpg" alt="" />
                           </div>
                           <div>
                              <div class="zoom" onmousemove="zoom(event)" style="background-image: url(../assets/images/products/product-single-img-2.jpg)">
                                 <!-- img -->
                                 <img src="{{asset('ui/frontend')}}/assets/images/products/product-single-img-2.jpg" alt="" />
                              </div>
                           </div>
                           <div>
                              <div class="zoom" onmousemove="zoom(event)" style="background-image: url(../assets/images/products/product-single-img-3.jpg)">
                                 <!-- img -->
                                 <img src="{{asset('ui/frontend')}}/assets/images/products/product-single-img-3.jpg" alt="" />
                              </div>
                           </div>
                           <div>
                              <div class="zoom" onmousemove="zoom(event)" style="background-image: url(../assets/images/products/product-single-img-4.jpg)">
                                 <!-- img -->
                                 <img src="{{asset('ui/frontend')}}/assets/images/products/product-single-img-4.jpg" alt="" />
                              </div>
                           </div>
                        </div>
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
                           <a href="{{asset('ui/frontend')}}/#!" class="mb-4 d-block">Bakery Biscuits</a>
                           <h2 class="mb-1 h1">Napolitanke Ljesnjak</h2>
                           <div class="mb-4">
                              <small class="text-warning">
                                 <i class="bi bi-star-fill"></i>
                                 <i class="bi bi-star-fill"></i>
                                 <i class="bi bi-star-fill"></i>
                                 <i class="bi bi-star-fill"></i>
                                 <i class="bi bi-star-half"></i>
                              </small>
                              <a href="{{asset('ui/frontend')}}/#" class="ms-2">(30 reviews)</a>
                           </div>
                           <div class="fs-4">
                              <span class="fw-bold text-dark">$32</span>
                              <span class="text-decoration-line-through text-muted">$35</span>
                              <span><small class="fs-6 ms-2 text-danger">26% Off</small></span>
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
                                 <button type="button" class="btn btn-primary">
                                    <i class="feather-icon icon-shopping-bag me-2"></i>
                                    Add to cart
                                 </button>
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
      <script src="{{asset('ui/frontend')}}/assets/libs/nouislider/dist/nouislider.min.js"></script>
      <script src="{{asset('ui/frontend')}}/assets/libs/wnumb/wNumb.min.js"></script>
      <!-- Libs JS -->
      <!-- <script src="{{asset('ui/frontend')}}/assets/libs/jquery/dist/jquery.min.js"></script> -->
      <script src="{{asset('ui/frontend')}}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <script src="{{asset('ui/frontend')}}/assets/libs/simplebar/dist/simplebar.min.js"></script>

      <!-- Theme JS -->
      <script src="{{asset('ui/frontend')}}/assets/js/theme.min.js"></script>

      <script src="{{asset('ui/frontend')}}/assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
      <script src="{{asset('ui/frontend')}}/assets/js/vendors/tns-slider.js"></script>
      <script src="{{asset('ui/frontend')}}/assets/js/vendors/zoom.js"></script>

   </body>

</html>
