<style>
    .footer-logo
    {
        width: 200px;
        height: auto;
    }
    .footer-title
    {
        font-size: 18px;
        letter-spacing: 0;
        font-weight: 600;
    }
    .footer-text
    {
        opacity: 0.6;
        margin-top: 1.5rem;
        font-size: 1.1rem;
        letter-spacing: 0.5px;
        font-weight: 400;
    }
    .footer-info
    {
        /*opacity: 0.6;*/
        margin-top: 2rem;
        letter-spacing: 0.5px;
        font-weight: 400;
        font-size: 1.5rem;
        margin-bottom:1rem;
    }
    .page-title
    {
        padding-bottom: 0.6rem;
        opacity: 0.6;
        letter-spacing: 0.5px;
        font-weight: 400;
        font-size: 0.9rem;
    }
    .underline-hover-effect:hover
    {
        text-decoration: underline;
    }

    /*  Image */
    /* Image styling with transition for zoom effect */
    .pro-img {
        width: 100%;
        transition: transform 0.3s ease; /* Smooth transition */
    }

    /* Hover effect to zoom the image */
     .pro-img:hover {
        cursor: pointer;
        transform: scale(1.05); /* Scale up the image */
    }


.mobile{
    display: none;
}


@media (max-width: 768px) {
.desktop{
    display: none;
}
.mobile{
    display: block;
}
}





</style>


{{-- Team Section Starts--}}
<div class="row text-center justify-content-center pt-4 column-gap-3 mb-3">

    @forelse($teams as $team)
    <div class="col-2">
        <div class="d-flex justify-content-center mb-4">
            <img src="{{asset($team->team_image) ?? 'public/frontEnd/assets/images/no-image.png'}}"
                 class="rounded-circle shadow-1-strong pro-img" width="150" height="150" />
        </div>
        <h5 class="mb-1 testi-name">{{$team->team_name ?? ''}}</h5>
        <h6 class="text-success mb-1 testi-designation">{{$team->team_designation ?? ''}}</h6>

    </div>
    @empty
    @endforelse

</div>
{{-- Team Section Ends--}}


<footer class ="fade-effect desktop" fade-direction="left" fade-time="1" style="background-color: rgb(247, 255, 255); padding-top: 60px;">

    <div class="container product-container d-flex flex-column gap-4 px-3">


{{--    Logo Section Starts    --}}
    <div class="row product-container justify-content-between">
        <div class="col-md-4">
{{--            @dd($generalsetting)--}}
            <div class="footer-logo mb-4">
                <img src="{{ request()->root() }}/{{$generalsetting->dark_logo}}" class="img-fluid" alt="Responsive image"
                style="width:250px">
            </div>

            <h2 class="footer-title">AN ONLINE SHOPPING MALL</h2>

            <div>
                <p class="footer-text">All kinds of online items are sold wholesale and retail here</p>
            </div>


            <ul class="social_link mt-2" style="text-align: start;" >
                @foreach($socialicons as $value)
                    <li class="social_list">
                        <a class="mobile-social-link" href="{{$value->link}}"><i class="{{$value->icon}}"></i></a>
                    </li>
                @endforeach
            </ul>

        </div>
        <div class="col-md-2 col-6 ">
              <h2 class="footer-info">Information</h2>
            <ul class="d-flex flex-column">
                @foreach($pages as $page)
                    <li class="page-title"><a class="underline-hover-effect" href="{{route('page',['slug'=>$page->slug])}}">{{$page->name}}</a></li>
                @endforeach
            </ul>
        </div>
         <div class="col-md-2 col-6">
              <h2 class="footer-info">Categories</h2>
            <ul class="d-flex flex-column">
                @foreach($menucategories->take(5) as $page)
                    <li class="page-title"><a class="underline-hover-effect" href="{{route('category',$page->slug)}}">{{$page->name}}</a></li>
                @endforeach
            </ul>
        </div>
         <div class="col-md-2 col-6 mx-auto" style="margin-bottom: 80px;">
           <h2 class="footer-info">Contact Us</h2>
            <ul class="d-flex flex-column">

                    <li class="page-title">
                        <span class="fw-bold">Call:</span>
                        <span>{{$contact->phone}}</span>
                    </li>
                <li class="page-title">
                    <span class="fw-bold">Open:</span>
                    <span>10:00am - 8:00pm</span>
                </li>
                <li class="page-title">
                    <span class="fw-bold">Address:</span>
                    <span>{{$contact->address}}</span>
                </li>

            </ul>
        </div>
    </div>

{{--    Logo Section Ends    --}}

<!--{{--   Information Start  --}}-->
<!--        <div class="row">-->
<!--            <h2 class="footer-info">Information</h2>-->
<!--            <ul class="d-flex flex-column">-->
<!--                @foreach($pages as $page)-->
<!--                    <li class="page-title"><a class="underline-hover-effect" href="{{route('page',['slug'=>$page->slug])}}">{{$page->name}}</a></li>-->
<!--                @endforeach-->
<!--            </ul>-->
<!--        </div>-->
<!--{{--   Information End  --}}-->

<!--{{--   Category Start    --}}-->
<!--        <div class="row">-->
<!--            <h2 class="footer-info">Categories</h2>-->
<!--            <ul class="d-flex flex-column">-->
<!--                @foreach($menucategories->take(5) as $page)-->
<!--                    <li class="page-title"><a class="underline-hover-effect" href="{{route('category',$page->slug)}}">{{$page->name}}</a></li>-->
<!--                @endforeach-->
<!--            </ul>-->
<!--        </div>-->
<!-- {{--   Category End    --}}-->

<!-- {{--   Contact Start    --}}-->
<!--        <div class="row">-->
<!--            <h2 class="footer-info">Contact Us</h2>-->
<!--            <ul class="d-flex flex-column">-->

<!--                    <li class="page-title">-->
<!--                        <span class="fw-bold">Call:</span>-->
<!--                        <span>{{$contact->phone}}</span>-->
<!--                    </li>-->
<!--                <li class="page-title">-->
<!--                    <span class="fw-bold">Open:</span>-->
<!--                    <span>10:00am - 8:00pm</span>-->
<!--                </li>-->
<!--                <li class="page-title">-->
<!--                    <span class="fw-bold">Address:</span>-->
<!--                    <span>{{$contact->address}}</span>-->
<!--                </li>-->

<!--            </ul>-->
<!--        </div>-->
<!-- {{--   Contact End    --}}    -->
    </div>
    <div class="" style="background-color: #033903;">
        <p class="p-2 text-white text-center">Copyright © {{ date('Y') }} {{ $generalsetting->name }} || Developed by
            <a href="https://danpite.tech/" class="text-white text-decoration-underline" target="_blank">DANPITE.TECH</a>
        </p>
    </div>

</footer>


{{-- mobile view --}}

<footer  class="bg-light mobile" >
    <div class="container text-center">
        <div class="col-lg-12 ">
        <img src="{{ asset($generalsetting->dark_logo)}}" class="img-fluid" alt="Responsive image"
            style="width:150px; margin-top:30px">
        </div>

        <h2 class="footer-title mt-3">AN ONLINE SHOPPING MALL</h2>

        <div>
            <p class="footer-text text-center">All kinds of online items are sold wholesale and retail here</p>
        </div>


        <ul class="social_link mt-2 text-center" style="text-align: start;" >
            @foreach($socialicons as $value)
                <li class="social_list">
                    <a class="mobile-social-link" href="{{$value->link}}"><i class="{{$value->icon}}"></i></a>
                </li>
            @endforeach
         </ul>
       </div>

       <div class="col-lg-12 text-center">
        <h2 class="footer-info">Information</h2>
        <ul class="d-flex flex-column">
            @foreach($pages as $page)
                <li class="page-title"><a class="underline-hover-effect" href="{{route('page',['slug'=>$page->slug])}}">{{$page->name}}</a></li>
            @endforeach
        </ul>
       </div>

       <div class="col-lg-12 text-center">
        <h2 class="footer-info">Categories</h2>
        <ul class="d-flex flex-column">
            @foreach($menucategories->take(5) as $page)
                <li class="page-title"><a class="underline-hover-effect" href="{{route('category',$page->slug)}}">{{$page->name}}</a></li>
            @endforeach
        </ul>
    </div>

        <div class="col-lg-12 text-center ">
            <h2 class="footer-info">Contact Us</h2>
            <ul class="d-flex flex-column ">

                    <li class="page-title">
                        <span class="fw-bold">Call:</span>
                        <span>{{$contact->phone}}</span>
                    </li>
                <li class="page-title">
                    <span class="fw-bold">Open:</span>
                    <span>10:00am - 8:00pm</span>
                </li>
                <li class="page-title">
                    <span class="fw-bold">Address:</span>
                    <span>{{$contact->address}}</span>
                </li>

            </ul>
        </div>

    </div>
    <div class="bg-success"> <p class="p-2 text-white text-center">Copyright © {{ date('Y') }} {{ $generalsetting->name }} || Developed by <a href="https://danpite.tech/" class="text-white text-decoration-underline" target="_blank">DANPITE.TECH</a></p> </div> <br><br><br>
</footer>







<div class="footer_nav">
    <ul>
        <li>
            <a class="toggle">
                <span>
                    <i class="fa-solid fa-bars"></i>
                </span>
            </a>
        </li>

        <li>
            <a href="https://wa.me/{{$contact->hotline}}">
                        <span>
                            <i class="fa-solid fa-message"></i>
                        </span>
            </a>
        </li>

        <li class="mobile_home">
            <a href="{{route('home')}}">
                <span><i class="fa-solid fa-home"></i></span> <span>Home</span>
            </a>
        </li>

        <li>
            <a href="{{route('customer.checkout')}}">
                        <span>
                            <i class="fa-solid fa-cart-shopping"></i>
                        </span>
            </a>
        </li>

        @if(Auth::guard('customer')->user())

            <li>
                <a href="{{route('customer.account')}}">
                        <span>
                            <i class="fa-solid fa-user"></i>
                        </span>

                </a>
            </li>
        @else
            <li>
                <a href="{{route('customer.login')}}">
                        <span>
                            <i class="fa-solid fa-user"></i>
                        </span>

                </a>
            </li>
        @endif
    </ul>
</div>





