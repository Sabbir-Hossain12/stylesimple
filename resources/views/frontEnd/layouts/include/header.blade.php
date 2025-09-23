<style>

    .nav-link
    {
        font-size: 16px;
    }
</style>



@php $subtotal = Cart::instance('shopping')->subtotal(); @endphp
<div class="mobile-menu">
    <div class="mobile-menu-logo">
        <div class="logo-image">
            <img src="{{asset($generalsetting->white_logo)}}" alt="" />
        </div>
        <div class="mobile-menu-close">
            <i class="fa fa-times"></i>
        </div>
    </div>
    <ul class="first-nav">
        @foreach($menucategories as $scategory)
            <li class="parent-category">
                <a href="{{url('category/'.$scategory->slug)}}" class="menu-category-name">
                    <img src="{{asset($scategory->image)}}" alt="" class="side_cat_img" />
                    {{$scategory->name}}
                </a>
                @if($scategory->subcategories->count() > 0)
                    <span class="menu-category-toggle">
                            <i class="fa fa-chevron-down"></i>
                        </span>
                @endif
                <ul class="second-nav" style="display: none;">
                    @foreach($scategory->subcategories as $subcategory)
                        <li class="parent-subcategory">
                            <a href="{{url('subcategory/'.$subcategory->slug)}}" class="menu-subcategory-name">{{$subcategory->subcategoryName}}</a>
                            @if($subcategory->childcategories->count() > 0)
                                <span class="menu-subcategory-toggle"><i class="fa fa-chevron-down"></i></span>
                            @endif
                            <ul class="third-nav" style="display: none;">
                                @foreach($subcategory->childcategories as $childcat)
                                    <li class="childcategory"><a href="{{url('products/'.$childcat->slug)}}" class="menu-childcategory-name">{{$childcat->childcategoryName}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>
<header id="navbar_top">
{{--    Marquee Text--}}
    <div class="top-barhead animate-dropdown" style="background-color: #033903" id="d-sm-none">
        <div class="header-top-inner">


            <div class="d-lg-block" id="lgmar">
                <marquee behavior="" direction="" style="color:#fff;margin-top: 2px;font-size: 22px;" scrolldelay="10" scrollamount="5" >


                     {!! $generalsetting->marquee_text !!}


                 <!--     <div style="display: flex; ">-->
                 <!--   <h6 class="p-2">১০০% শিউর হয়ে অর্ডার করুন, অহেতুক অর্ডার করবেন না। <span style="color: #016938">*******************</span></h6>-->

                 <!--   <h6 class="p-2">একসাথে তিনটি প্রো</span>ডাক্ট কিনলেই ফ্রি ডেলিভারি! <span style="color: #016938">*******************</span></h6>-->
                 <!--   <h6 class="p-2">Super Fast Cash On Delivery <span style="color: #016938">*******************</span></h6>-->
                 <!--   <h6 class="p-2">100% original product <span style="color: #016938">*******************</span></h6>-->
                 <!--   <h6 class="p-2">লাখো মানুষের আস্থা ও ভরসার অনলাইন বাজার Hazza Mart - An online shopping mall <span style="color: #016938">*******************</span></h6>-->

                 <!--</div>-->
                </marquee>
            </div>

            <!-- /.cnt-cart -->
            <div class="clearfix"></div>
        </div>
        <!-- /.container -->
    </div>

    <div class="mobile-header sticky">
        <div class="mobile-logo">
            <div class="menu-bar">
                <a class="toggle">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </div>
            <div class="menu-logo">
                <a href="{{route('home')}}"><img src="{{asset($generalsetting->white_logo)}}" alt="" /></a>
            </div>
            <div class="menu-bag d-flex gap-2 align-items-center">


                <a id="searchToggleBtnSmall" href="javascript:void(0);"><i class="fa-solid fa-magnifying-glass"></i></a>

{{--                <p class="margin-shopping">--}}
{{--                    <i class="fa-solid fa-bag-shopping"></i>--}}
{{--                    <span class="mobilecart-qty">{{Cart::instance('shopping')->count()}}</span>--}}
{{--                </p>--}}

                <p class="margin-shopping cart-toggle" id="shoppingIcon">
                    <svg class="icon icon-cart" style="height: 40px ; width: 40px" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" fill="none">
                        <path fill="currentColor" fill-rule="evenodd" d="M20.5 6.5a4.75 4.75 0 00-4.75 4.75v.56h-3.16l-.77 11.6a5 5 0 004.99 5.34h7.38a5 5 0 004.99-5.33l-.77-11.6h-3.16v-.57A4.75 4.75 0 0020.5 6.5zm3.75 5.31v-.56a3.75 3.75 0 10-7.5 0v.56h7.5zm-7.5 1h7.5v.56a3.75 3.75 0 11-7.5 0v-.56zm-1 0v.56a4.75 4.75 0 109.5 0v-.56h2.22l.71 10.67a4 4 0 01-3.99 4.27h-7.38a4 4 0 01-4-4.27l.72-10.67h2.22z"></path>
                    </svg>
{{--                    <span>0</span>--}}
                </p>

                <a href="{{isset($fb->link) ? 'https://www.facebook.com/' : ''}}"><i class="fa-brands fa-facebook"></i></a>



            </div>
        </div>
    </div>

    <div class="mobile-search d-none">
        <form action="{{route('search')}}">
            <input type="text" placeholder="Search Product ... " value="" class="msearch_keyword msearch_click" name="keyword" />
            <button><i data-feather="search"></i></button>
        </form>
        <div class="search_result"></div>
    </div>



    <div class="main-header" id="mainHeader">
        <!-- header to end -->
        <div class="logo-area">
            <div class="container" style="padding: 0 6rem 0 6rem">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="logo-header">
                            <div class="main-logo" style="height:fit-content; margin-top: -7px;">
                                <a href="{{route('home')}}"><img src="{{asset($generalsetting->white_logo)}}" alt="" style="width:250px" /></a>
                            </div>
                            <div class="main-search" id="nav-item">
                                <nav class="navbar navbar-expand-lg">
                                    <div class="container-fluid">

                                        <div class="collapse navbar-collapse" id="navbarNav">
                                            <ul class="navbar-nav gap-2">

                                                <li class="nav-item">
                                                    <a class="nav-link underline-hover-effect  @if(Request::is('/')) active text-decoration-underline  @endif" aria-current="page" href="{{route('home')}}">Home</a>
                                                </li>


                                                <li class="nav-item dropdown">
                                                    <a class="nav-link underline-hover-effect dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Products
                                                    </a>
                                                    <div class="dropdown-menu w-100 mt-0 p-3" aria-labelledby="navbarDropdown" style="

                                                            right: 800px!important;
                                                            width: 800px!important;
                                                            border-top-left-radius: 0;
                                                            border-top-right-radius: 0;">
                                                        <div class="container">
                                                            <div class="row my-4">

                                                                @forelse($menucategories->take(4) as $key => $category)
                                                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                                                    <div class="list-group list-group-flush">
                                                                        <a href="{{route('category', $category->slug)}}" class="list-group-item list-group-item-action fw-semibold">{{$category->name}}</a>
                                                                        @forelse($category->subcategories->take(6) as $subcategory)
                                                                        <a href="{{route('subcategory', $subcategory->slug)}}" class="list-group-item list-group-item-action">{{$subcategory->subcategoryName}}</a>

                                                                        @empty
                                                                        @endforelse

                                                                    </div>
                                                                </div>
                                                                @empty
                                                                @endforelse

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>


                                                <li class="nav-item">
                                                    <a class="nav-link underline-hover-effect @if(Request::is('page/contact')) active text-decoration-underline  @endif" href="{{route('page','contact')}}">Contact</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link underline-hover-effect @if(Request::is('page/about')) active text-decoration-underline  @endif" href="{{route('page','about-us')}}">About</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link underline-hover-effect @if(Request::is('best-selling')) active text-decoration-underline  @endif" href="{{route('bestselling')}}">Best Selling</a>
                                                </li>





                                            </ul>
                                        </div>
                                    </div>
                                </nav>

                            </div>

                            <div class="main-search d-none" id="pro-search-form">
                                <form action="{{route('search')}}">
                                    <input type="text" placeholder="Search Product..." class="search_keyword search_click" name="keyword" />
                                    <button>
                                        <i data-feather="search"></i>
                                    </button>
                                </form>
                                <div class="search_result"></div>
                            </div>
                            <div class="header-list-items">
                                <ul>
                                    <li class="track_btn">
                                        <a href="javascript:void(0)" class="nav-link" id="searchToggleIcon"> <i class="fa fa-magnifying-glass"></i></a>
                                    </li>

                                    <li class="cart-dialog cart-toggle cursor-pointer" id="cart-qty">
                                        <p class="margin-shopping" id="shoppingIcon">
                                            <svg class="icon icon-cart" style="height: 40px ; width: 40px" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" fill="none">
                                                <path fill="currentColor" fill-rule="evenodd" d="M20.5 6.5a4.75 4.75 0 00-4.75 4.75v.56h-3.16l-.77 11.6a5 5 0 004.99 5.34h7.38a5 5 0 004.99-5.33l-.77-11.6h-3.16v-.57A4.75 4.75 0 0020.5 6.5zm3.75 5.31v-.56a3.75 3.75 0 10-7.5 0v.56h7.5zm-7.5 1h7.5v.56a3.75 3.75 0 11-7.5 0v-.56zm-1 0v.56a4.75 4.75 0 109.5 0v-.56h2.22l.71 10.67a4 4 0 01-3.99 4.27h-7.38a4 4 0 01-4-4.27l.72-10.67h2.22z"></path>
                                            </svg>
                                          <span>{{Cart::instance('shopping')->count()}}</span>
                                          </p>
                                    </li>

{{--                                    @if(Auth::guard('customer')->user())--}}
{{--                                        <li class="for_order">--}}
{{--                                            <p>--}}
{{--                                                <a href="{{route('customer.account')}}">--}}
{{--                                                    <i class="fa-regular fa-user"></i>--}}

{{--                                                    {{Str::limit(Auth::guard('customer')->user()->name,14)}}--}}
{{--                                                </a>--}}
{{--                                            </p>--}}
{{--                                        </li>--}}
{{--                                    @else--}}
{{--                                        <li class="for_order">--}}
{{--                                            <p>--}}
{{--                                                <a href="{{route('customer.login')}}">--}}
{{--                                                    <i class="fa-regular fa-user"></i>--}}

{{--                                                </a>--}}
{{--                                            </p>--}}
{{--                                        </li>--}}
{{--                                    @endif--}}
{{--                                    --}}

{{--                                    <li class="cart-dialog" id="cart-qty">--}}
{{--                                        <a href="{{route('customer.checkout')}}">--}}
{{--                                            <p class="margin-shopping">--}}
{{--                                                <i class="fa-solid fa-cart-shopping"></i>--}}
{{--                                                <span>{{Cart::instance('shopping')->count()}}</span>--}}
{{--                                            </p>--}}
{{--                                        </a>--}}
{{--                                        <div class="cshort-summary">--}}
{{--                                            <ul>--}}
{{--                                                @foreach(Cart::instance('shopping')->content() as $key=>$value)--}}
{{--                                                    <li>--}}
{{--                                                        <a href=""><img src="{{asset($value->options->image)}}" alt="" /></a>--}}
{{--                                                    </li>--}}
{{--                                                    <li><a href="">{{Str::limit($value->name, 30)}}</a></li>--}}
{{--                                                    <li>Qty: {{$value->qty}}</li>--}}
{{--                                                    <li>--}}
{{--                                                        <p>৳{{$value->price}}</p>--}}
{{--                                                        <button class="remove-cart cart_remove" data-id="{{$value->rowId}}"><i data-feather="x"></i></button>--}}
{{--                                                    </li>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}
{{--                                            <p><strong>সর্বমোট : ৳{{$subtotal}}</strong></p>--}}
{{--                                            <a href="{{route('customer.checkout')}}" class="go_cart"> অর্ডার করুন </a>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}

@php
$socialMedia = App\Models\SocialMedia::where('title', 'Facebook')->first();
@endphp

                                    <li class="track_btn">
                                        <a href="{{$socialMedia->link}}" target="_blank" class="nav-link" id="searchToggleIcon"> <i class="fa-brands fa-facebook"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <!-- main-header end -->
</header>

{{--Cart Box--}}

<div class="cart-menu  shadow-sm" style="background:white">
    <div class="mobile-menu-logo">

        <div class="logo-image">
            {{--            <img src="{{asset($generalsetting->dark_logo)}}" alt="" />--}}
            <h3 class="card-title">Shopping Cart ({{Cart::instance('shopping')->count()}})</h3>
        </div>

        <div class="mobile-menu-close">
            <i class="fa fa-times" style="font-size:18px"></i>
        </div>

    </div>


    <div class="cart-item-list">

        @if(Cart::instance('shopping')->content()->count() == 0)
            <div class="text-center p-3">
            <h3 class="cart__empty-text">Your Cart is Empty</h3>
            <button class="btn btn-success mt-4 continue-shop-btn">Continue Shopping</button>
            <p class="cart__login-title h4 text-center mt-3">Have an account?</p>

            <p class="cart__login-paragraph text-center h5">
                <a href="{{route('customer.login')}}" class="text-decoration-underline">Log in</a> to check out faster.
            </p>
            </div>



        @else
        @forelse(Cart::instance('shopping')->content() as $key=>$value)
            <div class="cart-item-details my-2 d-flex justify-content-between align-items-center gap-3">
                <div class="cart-item-description">
                    <img class="mx-2" src="{{asset($value->options->image)}}" height="70px" width="70px" alt="">
                    <div class="cart-item-title" >
                        <h2 style="font-size: 13px;
                                    color: black;
                            line-height: 24px; font-weight: bold;">{{$value->name}}</h2>
                        <p>{{$value->qty}} X  <span>৳{{$value->price}}</span></p>
                    </div>
                </div>
                {{--            <i class="fa-solid fa-x"></i>--}}
                <button class="remove-cart cart_remove" data-id="{{$value->rowId}}"><i data-feather="x"></i></button>
            </div>
            <hr>
        @empty
        @endforelse
        @endif

    </div>

    @if(Cart::instance('shopping')->content()->count() == 0)
    @else
    <div class="cart-buttons">
        <div class="cart-price">
            <p>{{Cart::instance('shopping')->count()}} Product</p>
            <span>{{$subtotal}}</span>
        </div>

        <div class="text-center">
            <a href="{{route('customer.checkout')}}" class="btns default_btn mb-2 f-w d-block btn btn-danger">Checkout</a>
        </div>
    </div>
    @endif
</div>

<script>
    let lastScrollTop = 0; // Track the last scroll position
    document.addEventListener('scroll', function()
    {
        const topBar = document.querySelector('.top-barhead');
        const currentScroll = window.scrollY; // Current scroll position

        if (currentScroll > lastScrollTop)
        {
            // Scrolling down
            topBar.style.display = 'none';
        }
        else
        {
            // Scrolling up
            topBar.style.display = 'block';
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    });





</script>
