<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title') - {{$generalsetting->name}}</title>
        <!-- App favicon -->

        <link rel="shortcut icon" href="{{asset($generalsetting->favicon)}}" alt="Super Ecommerce Favicon" />
        <meta name="author" content="Super Ecommerce" />
        <link rel="canonical" href="" />
        @stack('seo')
        @stack('css')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"
            integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- toastr css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

         <link rel="stylesheet" href="{{asset('public/frontEnd/css/mobile-menu.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/wsit-menu.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/responsive.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/main.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/cart-box.css')}}" />



        @foreach($pixels as $pixel)
        <!-- Facebook Pixel Code -->
        <script>
            !(function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
                    n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = "2.0";
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s);
            })(window, document, "script", "https://connect.facebook.net/en_US/fbevents.js");
            fbq("init", "{{{$pixel->code}}}");
            fbq("track", "PageView");
        </script>
        <noscript>
            <img height="1" width="1" style="display: none;" src="https://www.facebook.com/tr?id={{{$pixel->code}}}&ev=PageView&noscript=1" />
        </noscript>
        <!-- End Facebook Pixel Code -->
        @endforeach

        @foreach($gtm_code as $gtm)
        <!-- Google tag (gtag.js) -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-{{ $gtm->code }}');</script>
        <!-- End Google Tag Manager -->
        @endforeach


    </head>
    <body class="gotop">

        @include('frontEnd.layouts.include.header')
        <div id="content">
            @yield('content')
        </div>
            <!-- content end -->

        @include('frontEnd.layouts.include.footer')
        <html lang="en">

    <style>
        /* Styling for the WhatsApp chat icon */
        #whatsapp-chat-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1;
            cursor: pointer;
            animation: bounce 2s infinite;
        }

        #whatsapp-chat-icon img {
            width: 60px;
            height: 60px;
            margin-bottom: 40px;
            border-radius: 50%;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        #whatsapp-chat-icon img:hover {
            transform: scale(1.1);
            box-shadow: 0px 0px 20px rgba(37, 211, 102, 0.6);
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        /* Styling for the chat box */
        #whatsapp-chat-box {
            position: fixed;
            bottom: 100px;

            right: 20px;
            width: 320px;
            max-height: 500px;
            background-color: #f9f9f9;
            border-radius: 20px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            display: none;
            z-index: 1001;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-y: auto;
            transition: opacity 0.3s ease;
        }

        #whatsapp-chat-box header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        #whatsapp-chat-box header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            border: 2px solid blue;
        }

        #whatsapp-chat-box header .info {
            flex-grow: 1;
        }

        #whatsapp-chat-box header .info h4 {
            margin: 0;
            font-size: 16px;
            color: #333;
        }

        #whatsapp-chat-box header .info p {
            margin: 0;
            font-size: 12px;
            color: #666;
            position: relative;
            padding-left: 20px;
        }

        #whatsapp-chat-box header .info p:before {
            content: '';
            width: 10px;
            height: 10px;
            background-color: blue;
            border-radius: 50%;
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        #whatsapp-chat-box .message {
            display: flex;
            align-items: flex-end;
            margin-bottom: 10px;
            opacity: 0;
            transform: translateX(10px);
            animation: appear 0.5s forwards;
        }

        #whatsapp-chat-box .message.me {
            justify-content: flex-end;
        }

        #whatsapp-chat-box .message p {
            background-color: #e1ffc7;
            color: #333;
            border-radius: 15px;
            padding: 10px;
            max-width: 70%;
            word-break: break-word;
            margin: 0;
            animation: slideIn 0.5s ease;
        }

        #whatsapp-chat-box .message.me p {
            background-color: #25D366;
            color: #fff;
        }

        /* Animation for message appearance */
        @keyframes appear {
            from {
                opacity: 0;
                transform: translateX(10px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(10px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        #whatsapp-chat-box .loading {
            display: none;
            color: #999;
            font-size: 14px;
            text-align: center;
        }

        #whatsapp-chat-box .loading:before {
            content: "•";
            animation: typing 1s infinite;
            font-size: 20px;
        }

        @keyframes typing {
            0% { content: "•"; }
            33% { content: "••"; }
            66% { content: "•••"; }
            100% { content: "•"; }
        }

        #whatsapp-chat-box textarea {
            width: calc(100% - 80px);
            height: 60px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 15px;
            margin-right: 10px;
            font-size: 14px;
            resize: none;
        }

        #whatsapp-chat-box button {
            width: 70px;
            padding: 10px;
            border: none;
            border-radius: 15px;
            background-color: #25D366;
            color: #fff;
            cursor: pointer;
        }

        #whatsapp-chat-box button:hover {
            background-color: #1ebd74;
        }
    </style>



    <div id="whatsapp-chat-icon">
        <a href="https://wa.me/{{ $contact->hotline ?? '' }}?text=">
            <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp Chat">
        </a>

    </div>

    <!-- WhatsApp Chat Box -->
    <div id="whatsapp-chat-box">
        <header>
            <img src="https://img.icons8.com/ios/50/000000/user.png" alt="Profile Picture">
            <div class="info">
                <h4>Admin</h4>
                <p>Online</p>
            </div>
        </header>
        <div id="messages">
            <div class="message">
                <p>Hi there! How can we assist you today?</p>
            </div>
        </div>
        <div class="loading" id="loading"></div>
        <div style="display: flex;">
            <textarea id="message-input" placeholder="Type your message..."></textarea>
            <button id="send-message">Send</button>
        </div>
    </div>

    <script>
        // Function to handle chat box functionality
        function createWhatsAppChat() {
            var chatButton = document.getElementById('whatsapp-chat-icon');
            var chatBox = document.getElementById('whatsapp-chat-box');
            var sendButton = document.getElementById('send-message');
            var messageInput = document.getElementById('message-input');
            var messagesContainer = document.getElementById('messages');
            var loadingIndicator = document.getElementById('loading');

            // Toggle chat box visibility
            chatButton.onclick = function () {
                if (chatBox.style.display === 'none') {
                    chatBox.style.display = 'block';
                    chatBox.style.opacity = 1;
                } else {
                    chatBox.style.opacity = 0;
                    setTimeout(function () {
                        chatBox.style.display = 'none';
                    }, 300); // Delay hiding to allow fade-out transition
                }
            };

            // Handle send button click
            sendButton.onclick = function () {
                var userMessage = messageInput.value.trim();
                if (userMessage) {
                    // Show loading indicator
                    loadingIndicator.style.display = 'block';
                    setTimeout(function () {
                        // Hide loading indicator and append user message
                        loadingIndicator.style.display = 'none';
                        var userMessageDiv = document.createElement('div');
                        userMessageDiv.className = 'message me';
                        userMessageDiv.innerHTML = '<p>' + userMessage + '</p>';
                        messagesContainer.appendChild(userMessageDiv);

                        // Simulate typing indicator
                        var typingIndicator = document.createElement('div');
                        typingIndicator.className = 'loading';
                        typingIndicator.innerHTML = 'Admin is typing...';
                        messagesContainer.appendChild(typingIndicator);

                        // Simulate a reply from the contact after typing
                        setTimeout(function () {
                            messagesContainer.removeChild(typingIndicator);
                            var replyMessageDiv = document.createElement('div');
                            replyMessageDiv.className = 'message';
                            replyMessageDiv.innerHTML = '<p>Thanks for your message! We will get back to you shortly.</p>';
                            messagesContainer.appendChild(replyMessageDiv);

                            messagesContainer.scrollTop = messagesContainer.scrollHeight; // Scroll to the bottom
                        }, 1500); // Simulate typing delay

                        // Open WhatsApp with the user's message
                        var whatsappUrl = 'https://wa.me/+880 1877-779338'+$('#wp_number').val()+'?text=' + encodeURIComponent(userMessage);
                        window.open(whatsappUrl, '_blank'); // Open WhatsApp with the message

                        messageInput.value = ''; // Clear the input field
                    }, 1500); // Simulate loading delay
                } else {
                    alert('Please enter a message before sending.');
                }
            };
        }

        // Initialize chat functionality
        window.onload = function () {
            createWhatsAppChat();
        };
    </script>



        <div id="custom-modal"></div>
        <div id="page-overlay"></div>
        <div id="loading"><div class="custom-loader"></div></div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{asset('public/frontEnd/js/mobile-menu.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/wsit-menu.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/mobile-menu-init.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/wow.min.js')}}"></script>
        <script>
            new WOW().init();
        </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <!-- feather icon -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
        <script>
            feather.replace();
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {!! Toastr::message() !!} @stack('script')

    <script src="{{asset('public/frontEnd/js/fadescroll.min.js')}}"></script>
        <script>
            $(".quick_view").on("click", function () {
                var id = $(this).data("id");
                $("#loading").show();
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('quickview')}}",
                        success: function (data) {
                            if (data) {
                                $("#custom-modal").html(data);
                                $("#custom-modal").show();
                                $("#loading").hide();
                                $("#page-overlay").show();
                            }
                        },
                    });
                }
            });
        </script>
    {{-- Cart Side Menu Start--}}
    <script>
        $(".cart-toggle").on("click", function () {
            $("#page-overlay").show();
            $(".cart-menu").addClass("active");
        });

        $("#page-overlay").on("click", function () {
            $("#page-overlay").hide();
            $(".cart-menu").removeClass("active");
            $(".feature-products").removeClass("active");
        });

        $(".mobile-menu-close").on("click", function () {
            $("#page-overlay").hide();
            $(".cart-menu").removeClass("active");
        });

        $(".mobile-filter-toggle").on("click", function () {
            $("#page-overlay").show();
            $(".feature-products").addClass("active");
        });
    </script>
    {{-- Cart Side Menu End--}}


        <!-- quick view end -->
        <!-- cart js start -->
        <script>
            $(".addcartbutton").on("click", function () {
                var id = $(this).data("id");
                var qty = 1;
                if (id) {
                    $.ajax({
                        cache: "false",
                        type: "GET",
                        url: "{{url('add-to-cart')}}/" + id + "/" + qty,
                        dataType: "json",
                        success: function (data) {
                            if (data) {
                                toastr.success('Success', 'Product add to cart successfully');
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });
            $(".cart_store").on("click", function () {
                var id = $(this).data("id");
                var qty = $(this).parent().find("input").val();
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id, qty: qty ? qty : 1 },
                        url: "{{route('cart.store')}}",
                        success: function (data) {
                            if (data) {
                                toastr.success('Success', 'Product add to cart succfully');
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });

            $(".cart_remove").on("click", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('cart.remove')}}",
                        success: function (data)
                        {
                            if (data) {
                                // $(".cartlist").html(data);
                                // return cart_count() + mobile_cart() + cart_summary();

                                window.location.reload();

                                toastr.success('Success', 'Product remove from cart succfully');
                            }
                        },
                    });
                }
            });

            $(".cart_increment").on("click", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('cart.increment')}}",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });

            $(".cart_decrement").on("click", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('cart.decrement')}}",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });

            function cart_count() {
                $.ajax({
                    type: "GET",
                    url: "{{route('cart.count')}}",
                    success: function (data) {
                        if (data) {
                            $("#cart-qty").html(data);
                        } else {
                            $("#cart-qty").empty();
                        }
                    },
                });
            }
            function mobile_cart() {
                $.ajax({
                    type: "GET",
                    url: "{{route('mobile.cart.count')}}",
                    success: function (data) {
                        if (data) {
                            $(".mobilecart-qty").html(data);
                        } else {
                            $(".mobilecart-qty").empty();
                        }
                    },
                });
            }
            function cart_summary() {
                $.ajax({
                    type: "GET",
                    url: "{{route('shipping.charge')}}",
                    dataType: "html",
                    success: function (response) {
                        $(".cart-summary").html(response);
                    },
                });
            }
        </script>
        <!-- cart js end -->
        <script>
            $(".search_click").on("keyup change", function () {
                var keyword = $(".search_keyword").val();
                $.ajax({
                    type: "GET",
                    data: { keyword: keyword },
                    url: "{{route('livesearch')}}",
                    success: function (products) {
                        if (products) {
                            $(".search_result").html(products);
                        } else {
                            $(".search_result").empty();
                        }
                    },
                });
            });
            $(".msearch_click").on("keyup change", function () {
                var keyword = $(".msearch_keyword").val();
                $.ajax({
                    type: "GET",
                    data: { keyword: keyword },
                    url: "{{route('livesearch')}}",
                    success: function (products) {
                        if (products) {
                            $("#loading").hide();
                            $(".search_result").html(products);
                        } else {
                            $(".search_result").empty();
                        }
                    },
                });
            });
        </script>
        <!-- search js start -->
        <script></script>
        <script></script>
        <script>
            $(".district").on("change", function () {
                var id = $(this).val();
                $.ajax({
                    type: "GET",
                    data: { id: id },
                    url: "{{route('districts')}}",
                    success: function (res) {
                        if (res) {
                            $(".area").empty();
                            $(".area").append('<option value="">Select..</option>');
                            $.each(res, function (key, value) {
                                $(".area").append('<option value="' + key + '" >' + value + "</option>");
                            });
                        } else {
                            $(".area").empty();
                        }
                    },
                });
            });
        </script>
        <script>
            $(".toggle").on("click", function () {
                $("#page-overlay").show();
                $(".mobile-menu").addClass("active");
            });

            $("#page-overlay").on("click", function () {
                $("#page-overlay").hide();
                $(".mobile-menu").removeClass("active");
                $(".feature-products").removeClass("active");
            });

            $(".mobile-menu-close").on("click", function () {
                $("#page-overlay").hide();
                $(".mobile-menu").removeClass("active");
            });

            $(".mobile-filter-toggle").on("click", function () {
                $("#page-overlay").show();
                $(".feature-products").addClass("active");
            });
        </script>
        <script>
            $(document).ready(function () {
                $(".parent-category").each(function () {
                    const menuCatToggle = $(this).find(".menu-category-toggle");
                    const secondNav = $(this).find(".second-nav");

                    menuCatToggle.on("click", function () {
                        menuCatToggle.toggleClass("active");
                        secondNav.slideToggle("fast");
                        $(this).closest(".parent-category").toggleClass("active");
                    });
                });
                $(".parent-subcategory").each(function () {
                    const menuSubcatToggle = $(this).find(".menu-subcategory-toggle");
                    const thirdNav = $(this).find(".third-nav");

                    menuSubcatToggle.on("click", function () {
                        menuSubcatToggle.toggleClass("active");
                        thirdNav.slideToggle("fast");
                        $(this).closest(".parent-subcategory").toggleClass("active");
                    });
                });
            });
        </script>

        <script>
            var menu = new MmenuLight(document.querySelector("#menu"), "all");

            var navigator = menu.navigation({
                selectedClass: "Selected",
                slidingSubmenus: true,
                // theme: 'dark',
                title: "ক্যাটাগরি",
            });

            var drawer = menu.offcanvas({
                // position: 'left'
            });

            //  Open the menu.
            document.querySelector('a[href="#menu"]').addEventListener("click", (evnt) => {
                evnt.preventDefault();
                drawer.open();
            });
        </script>

        <script>


            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $(".scrolltop:hidden").stop(true, true).fadeIn();
                } else {
                    $(".scrolltop").stop(true, true).fadeOut();
                }
            });
            $(function () {
                $(".scroll").click(function () {
                    $("html,body").animate({ scrollTop: $(".gotop").offset().top }, "1000");
                    return false;
                });
            });
        </script>
        <script>
            $(".filter_btn").click(function(){
               $(".filter_sidebar").addClass('active');
               $("body").css("overflow-y", "hidden");
            })
            $(".filter_close").click(function(){
               $(".filter_sidebar").removeClass('active');
               $("body").css("overflow-y", "auto");
            })
        </script>

        <script>

            //Toggle Search Bar Big Screen
            $(document).ready(function () {

                $('#searchToggleIcon').on('click',function ()
                {

                    $('#nav-item').toggle();

                    $('#pro-search-form').toggleClass('d-none');

                });

            });

            //Toggle Search Bar Small Screen
            $(document).ready(function () {

                $('#searchToggleBtnSmall').on('click',function ()
                {

                    $('.mobile-search').toggleClass('d-none');

                });

            });

            //oh hover image Change

        </script>

{{-- on hover image change--}}
    <script>

        // Variable to store the original image source
        let originalSrc = {};

        function pro_img(id) {
            // Store the original src in a variable only if it hasn’t been saved yet
            if (!originalSrc[id]) {
                originalSrc[id] = $('.pro-img' + id).attr('src');
            }

            // Get the new source from the slider image and set it
            let p_img = $('.pro-slider-img' + id).attr('src');
            $('.pro-img' + id).attr('src', p_img);
        }

        function reset_img(id) {
            // Reset the image source to the original one
            if (originalSrc[id]) {
                $('.pro-img' + id).attr('src', originalSrc[id]);
            }
        }


    </script>

    </body>
</html>
