@extends('frontEnd.layouts.master')
@section('title','new-collection')
@push('css')
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/jquery-ui.css')}}" />
@endpush
@section('content')
    <section class="product-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="category-breadcrumb d-flex align-items-center">
                        <a href="{{ route('home') }}">Home</a>
                        <span>/</span>
                        <strong>New Collections</strong>
                    </div>
                </div>
            <div class="row">
                <div class="col-sm-12">
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
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="custom_paginate">
{{--                        {{$products->links('pagination::bootstrap-4')}}--}}

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@push('script')
    <script>
        $(".sort").change(function(){
            $('#loading').show();
            $(".sort-form").submit();
        })
    </script>
@endpush