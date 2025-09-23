@extends('frontEnd.layouts.master') @section('title', 'Home') @push('seo')
    <meta name="app-url" content=""/>
    <meta name="robots" content="index, follow"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>

    <!-- Open Graph data -->
    <meta property="og:title" content=""/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content="{{ asset($generalsetting->white_logo) }}"/>
    <meta property="og:description" content=""/>
@endpush @push('css')
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/owl.theme.default.min.css') }}"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" rel="stylesheet"/>

    <style>
        .pro-title
        {
            font-weight: 500;
            /*line-height: 1.2px;*/
            font-size: 1rem;
            letter-spacing: 0.6px;
        }

        .pro-old-price
        {
            text-decoration-color: red;
            opacity: .7;
        }

    /*  Image */
        /* Image styling with transition for zoom effect */
        .pro_img .pro-img
        {
            width: 100%;
            transition: transform 0.3s ease; /* Smooth transition */
        }

        /* Hover effect to zoom the image */
        .pro_img .pro-img:hover
        {
            cursor: pointer;
            transform: scale(1.1); /* Scale up the image */
        }


        @media only screen and (min-width:800px) and (max-width:1920px)
        {
            .product-container
            {
                padding: 15px 8rem 36px 8rem !important;
            }

            .category-container
            {
                padding: 36px 8rem 36px 8rem !important;
            }
        }



    </style>
@endpush @section('content')
    <section class="slider-section mt-3">
        <div class="container">
            <div class="row">

                {{--  Category Sidebar--}}
                <div class="col-sm-3 hidetosm">
{{--                    <div class="rounded-top text-center d-none d-lg-block" style="background-color:#fcb800fc;">--}}
{{--                        <h5 class="py-2 text-dark" style="font-weight: 500; font-size: 1.3rem;">Shop By Category</h5>--}}
{{--                    </div>--}}
                    <div class="sidebar-menu pt-2">
                        <ul class="hideshow">
                            @foreach ($menucategories as $key => $category)
                                <li>
                                    <a href="{{ route('category', $category->slug) }}">
                                        <img src="{{ asset($category->image) }}" alt=""/>
                                        {{ $category->name }}

                                        <span class=" @if($key == 0) cat-label cat-label-hot pin-bottom @endif @if($key == 1) cat-label cat-label-new pin-bottom @endif">@if($key == 0) HOT @endif @if($key == 1) New @endif</span>

                                    </a>

                                    <ul class="sidebar-submenu">
                                        @foreach ($category->subcategories as $key => $subcategory)
                                            <li>
                                                <a href="{{ route('subcategory', $subcategory->slug) }}">
                                                    {{ $subcategory->subcategoryName }} <i
                                                            class="fa-solid fa-chevron-right"></i> </a>
                                                <ul class="sidebar-childmenu">
                                                    @foreach ($subcategory->childcategories as $key => $childcat)
                                                        <li>
                                                            <a href="{{ route('products', $childcat->slug) }}">
                                                                {{ $childcat->childcategoryName }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>

                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                {{--   Slider--}}
                <div class="col-sm-9">
                    <div class="home-slider-container">
                        <div class="main_slider owl-carousel">
                            @foreach ($sliders as $key => $value)
                                <div class="slider-item">
                                   <a href="{{ $value->link }}"> <img src="{{ asset($value->image) }}" alt=""/></a>
                                </div>
                                <!-- slider item -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider end -->


    {{--Top Categories Start--}}
    @if(count($frontcategories)>0)
    <section class="homeproduct">
        <div class="container">
            <div class="row">


                <div class="col-12 category-container">
                    <div class="topcategory">

                        @foreach ($frontcategories->take(12) as $key => $value)
                        <a href="{{ route('category', $value->slug) }}">
                            <div class="cat_item text-center shadow-sm fade-effect"  fade-direction="left" fade-time="1">
                                <div class="cat_img">

                                    <i class="fa-solid {{$value->category_icon}} category-svg"></i>

                                </div>

                                <div class="cat_name">

                                        <h3 class="cat-icon-text-title">{{ Str::limit($value->name, 15) }}</h3>

                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
    @else
    @endif
    {{--Top Categories End--}}

{{-- Best Selling Start   --}}
    <section class="homeproduct">
        <div class="container product-container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="sec_title">
                        <h3 class="section-title-header">
                            <div class="timer_inner">
                                <div class="">
                                    <span class="section-title-name"> Best Selling</span>
                                </div>

                                <div class="">
{{--                                    <div class="offer_timer" id="simple_timer"></div>--}}
                                </div>
                            </div>
                        </h3>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="row" style="column-gap: 0;
                row-gap: 5rem;">
                        @foreach ($hotdeal_top->take(8) as $key => $value)
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 fade-effect"   fade-direction="left" fade-time="1">
                                <a href="{{route('product',$value->slug)}}">
                                <div class="pro_img">

                                    @if(count($value->images) > 1)
                                    <img class="pro-slider-img{{$value->id}}" src="{{asset($value->images->get(1)->image)}}" hidden="">
                                    @endif
                                    <img class="pro-img pro-img{{$value->id}}" onmouseout="reset_img({{$value->id}})" onmouseover="pro_img({{$value->id}})" src="{{ asset($value->image->image) }}" alt=""/>
                                </div>

                                <div class="pro_content">
                                    <p class="text-center my-2 pro-title">{{ $value->name }}</p>
                                    <p class="text-center my-2 d-flex justify-content-center align-items-center gap-2">
                                        <span class="text-decoration-line-through pro-old-price">{{$value->old_price}}Tk</span>
                                        <span class="pro-title">{{ $value->new_price }}Tk</span>
                                    </p>
                                </div>

                                </a>

                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-12 text-center mt-5 px-4">
                <a href="{{ route('bestselling') }}" class="btn btn-md btn-success text-light" >View More</a>
                </div>
            </div>
        </div>
    </section>
{{-- Best Selling End   --}}

    <!--Ad Banner Start-->
    @if(isset($adBanner))
        <section class="homeproduct">
            <div class="container product-container">
                <div class="row">
                    <div class="col-12">
                        <a href="{{$adBanner->link}}">
                        <img src="{{$adBanner->image}}" style=""/>
                      </a>
                    </div>
                </div>
            </div>

        </section>
        @endif
    <!--Ad Banner End-->

    {{-- Feature Product Start   --}}
    <section class="homeproduct">
        <div class="container product-container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="sec_title">
                        <h3 class="section-title-header">
                            <div class="timer_inner">
                                <div class="">
                                    <span class="section-title-name"> Featured Collection</span>
                                </div>

                                <div class="">
{{--                                    <div class="offer_timer" id="simple_timer"></div>--}}
                                </div>
                            </div>
                        </h3>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="row" style="column-gap: 0;
                row-gap: 5rem;">
                        @foreach ($featureproducts->take(8) as $key => $value)
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 fade-effect"   fade-direction="left" fade-time="1">
                                <a href="{{route('product',$value->slug)}}">
                                <div class="pro_img">

                                    @if(count($value->images) > 1)
                                    <img class="pro-slider-img{{$value->id}}" src="{{asset($value->images->get(1)->image)}}" hidden="">
                                    @endif
                                    <img class="pro-img pro-img{{$value->id}}" onmouseout="reset_img({{$value->id}})" onmouseover="pro_img({{$value->id}})" src="{{ asset($value->image->image) }}" alt=""/>
                                </div>

                                <div class="pro_content">
                                    <p class="text-center my-2 pro-title">{{ $value->name }}</p>
                                    <p class="text-center my-2 d-flex justify-content-center align-items-center gap-2">
                                        <span class="text-decoration-line-through pro-old-price">{{$value->old_price}}Tk</span>
                                        <span class="pro-title">{{ $value->new_price }}Tk</span>
                                    </p>
                                </div>

                                </a>

                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-12 text-center mt-5 px-4">
                <a href="{{ route('featureproducts') }}" class="btn btn-md btn-success text-light" >View More</a>
                </div>
            </div>
        </div>
    </section>
{{-- Feature Product End   --}}

    {{-- Featured Collection Category Start   --}}
    <section class="homeproduct">
        <div class="container product-container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="sec_title">
                        <h3 class="section-title-header">
                            <div class="timer_inner">
                                <div class="">
                                    <span class="section-title-name">Featured Collection Category</span>
                                </div>

                                <div class="">
                                    {{--                                    <div class="offer_timer" id="simple_timer"></div>--}}
                                </div>
                            </div>
                        </h3>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="row" style="column-gap: 0;
                row-gap: 5rem;">
                        @foreach ($featuredCategories->take(8) as $key => $value)
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 fade-effect"   fade-direction="left" fade-time="1">
                                <a href="{{route('category',$value->slug)}}">
                                    <div class="pro_img">
                                        <img class="pro-img" src="{{ asset($value->image) }}" alt=""/>
                                    </div>

                                    <div class="pro_content">
                                        <p class="text-center my-2 pro-title">{{ $value->name }}</p>
{{--                                        <p class="text-center my-2 d-flex justify-content-center align-items-center gap-2">--}}
{{--                                            <span class="text-decoration-line-through pro-old-price">{{$value->old_price}}Tk</span>--}}
{{--                                            <span class="pro-title">{{ $value->new_price }}Tk</span>--}}
{{--                                        </p>--}}
                                    </div>

                                </a>

                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-12 text-center mt-5 px-4">
                    <a href="{{ route('featuredcollection') }}" class="btn btn-md btn-success text-light" >View More</a>
                </div>
            </div>
        </div>
    </section>
    {{-- Featured Collection Category End   --}}

    {{-- Offer Products Start   --}}
    <section class="homeproduct">
        <div class="container product-container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="sec_title">
                        <h3 class="section-title-header">
                            <div class="timer_inner">
                                <div class="">
                                    <span class="section-title-name"> Offer Items</span>
                                </div>

                                <div class="">
                                    {{--                                    <div class="offer_timer" id="simple_timer"></div>--}}
                                </div>
                            </div>
                        </h3>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="row" style="column-gap: 0;
                row-gap: 5rem;">
                        @foreach ($offerProducts->take(8) as $key => $value)
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 fade-effect" fade-direction="left" fade-time="1" >
                                <a href="{{route('product',$value->slug)}}">
                                    <div class="pro_img">

                                        @if(count($value->images) > 1)
                                            <img class="pro-slider-img{{$value->id}}" src="{{asset($value->images->get(1)->image)}}" hidden="">
                                        @endif
                                        <img class="pro-img pro-img{{$value->id}}" onmouseout="reset_img({{$value->id}})" onmouseover="pro_img({{$value->id}})" src="{{ asset($value->image->image) }}" alt=""/>
                                    </div>

                                    <div class="pro_content">
                                        <p class="text-center my-2 pro-title">{{ $value->name }}</p>
                                        <p class="text-center my-2 d-flex justify-content-center align-items-center gap-2">
                                            <span class="text-decoration-line-through pro-old-price">{{$value->old_price}}Tk</span>
                                            <span class="pro-title">{{ $value->new_price }}Tk</span>
                                        </p>
                                    </div>

                                </a>

                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-12 text-center mt-5 px-4">
                    <a href="{{ route('offeritems') }}" class="btn btn-md btn-success text-light" >View More</a>
                </div>
            </div>
        </div>
    </section>
    {{-- Offer Products End   --}}


    {{-- New Collection Category Start   --}}
    <section class="homeproduct">
        <div class="container product-container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="sec_title">
                        <h3 class="section-title-header">
                            <div class="timer_inner">
                                <div class="">
                                    <span class="section-title-name">New Category Collection</span>
                                </div>

                                <div class="">
                                    {{--                                    <div class="offer_timer" id="simple_timer"></div>--}}
                                </div>
                            </div>
                        </h3>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="row" style="column-gap: 0;
                row-gap: 5rem;">
                        @foreach ($newCategories->take(8) as $key => $value)
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 fade-effect" fade-direction="left" fade-time="1">
                                <a href="{{route('category',$value->slug)}}">
                                    <div class="pro_img">
                                        <img class="pro-img" src="{{ asset($value->image) }}" alt=""/>
                                    </div>

                                    <div class="pro_content">
                                        <p class="text-center my-2 pro-title">{{ $value->name }}</p>
                                        {{--                                        <p class="text-center my-2 d-flex justify-content-center align-items-center gap-2">--}}
                                        {{--                                            <span class="text-decoration-line-through pro-old-price">{{$value->old_price}}Tk</span>--}}
                                        {{--                                            <span class="pro-title">{{ $value->new_price }}Tk</span>--}}
                                        {{--                                        </p>--}}
                                    </div>

                                </a>

                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-12 text-center mt-5 px-4">
                    <a href="{{ route('newcollection') }}" class="btn btn-md btn-success text-light" >View More</a>
                </div>
            </div>
        </div>
    </section>
    {{-- New Collection Category End   --}}
@endsection @push('script')
    <script src="{{ asset('public/frontEnd/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/frontEnd/js/jquery.syotimer.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".main_slider").owlCarousel({
                items: 1,
                loop: true,
                dots: false,
                autoplay: true,
                nav: true,
                autoplayHoverPause: false,
                margin: 0,
                mouseDrag: true,
                smartSpeed: 1500,
                autoplayTimeout: 3000,

                navText: ["<i class='fa-solid fa-angle-left'></i>",
                    "<i class='fa-solid fa-angle-right'></i>"
                ],
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".hotdeals-slider").owlCarousel({
                margin: 15,
                loop: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 3,
                        nav: true,
                    },
                    600: {
                        items: 3,
                        nav: false,
                    },
                    1000: {
                        items: 6,
                        nav: true,
                        loop: false,
                    },
                },
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".category-slider").owlCarousel({
                margin: 15,
                loop: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 5,
                        nav: true,
                    },
                    600: {
                        items: 3,
                        nav: false,
                    },
                    1000: {
                        items: 8,
                        nav: true,
                        loop: false,
                    },
                },
            });

            $(".product_slider").owlCarousel({
                margin: 15,
                items: 6,
                loop: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2,
                        nav: false,
                    },
                    600: {
                        items: 5,
                        nav: false,
                    },
                    1000: {
                        items: 6,
                        nav: false,
                    },
                },
            });
        });
    </script>
    <script>
        $("#simple_timer").syotimer({
            date: new Date(2015, 0, 1),
            layout: "hms",
            doubleNumbers: false,
            effectType: "opacity",

            periodUnit: "d",
            periodic: true,
            periodInterval: 1,
        });
    </script>


@endpush
