 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>
    .card-body.search-result-box {
        overflow: scroll;
        height: 400px;
        overflow-x: hidden;
    }

    .active .seller {
        font-weight: 700;
    }

    .for-count-value {
        position: absolute;

        right: 0.6875rem;;
        width: 1.25rem;
        height: 1.25rem;
        border-radius: 50%;
        color: {{$web_config['primary_color']}};

        font-size: .75rem;
        font-weight: 500;
        text-align: center;
        line-height: 1.25rem;
    }

    .count-value {
        width: 1.25rem;
        height: 1.25rem;
        border-radius: 50%;
        color: {{$web_config['primary_color']}};

        font-size: .75rem;
        font-weight: 500;
        text-align: center;
        line-height: 1.25rem;
    }

    @media (min-width: 992px) {
        .navbar-sticky.navbar-stuck .navbar-stuck-menu.show {
            display: block;
            height: 55px !important;
        }
    }

    @media (min-width: 768px) {
        .navbar-stuck-menu {
            background-color: {{$web_config['primary_color']}};
            line-height: 15px;
            padding-bottom: 6px;
        }

    }

    @media (max-width: 767px) {
        .search_button {
          
              background-color: #e9eaeb !important;
        }

        .search_button .input-group-text i {
            color: {{$web_config['primary_color']}}!important;
                
        }

        .navbar-expand-md .dropdown-menu > .dropdown > .dropdown-toggle {
            position: relative;
            padding- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 1.95rem;
        }

        .mega-nav1 {
            background: white;
            color: {{$web_config['primary_color']}}                              !important;
            border-radius: 3px;
        }

        .mega-nav1 .nav-link {
            color: {{$web_config['primary_color']}}                              !important;
        }
    }

    @media (max-width: 768px) {
        .tab-logo {
            width: 10rem;
        }
    }

    @media (max-width: 360px) {
        .mobile-head {
            padding: 3px;
        }
    }

    @media (max-width: 471px) {
        .navbar-brand img {

        }

        .mega-nav1 {
            background: white;
            color: {{$web_config['primary_color']}}                              !important;
            border-radius: 3px;
        }

        .mega-nav1 .nav-link {
            color: {{$web_config['primary_color']}} !important;
        }
    }
    #anouncement {
        width: 100%;
        padding: 2px 0;
        text-align: center;
        color:white;
    }
</style>
@php($announcement=\App\CPU\Helpers::get_business_settings('announcement'))
@if (isset($announcement) && $announcement['status']==1)
    <div class="d-flex justify-content-between align-items-center" id="anouncement" style="background-color: {{ $announcement['color'] }};color:{{$announcement['text_color']}}">
        <span></span>
        <span style="text-align:center; font-size: 15px;">{{ $announcement['announcement'] }} </span>
        <span class="ml-3 mr-3" style="font-size: 12px;cursor: pointer;color: darkred"  onclick="myFunction()">X</span>
    </div>
@endif
 <div class="wrapper">
        <div class="top-bar-outer">
            <div class="container text-center top-bar-inner">
                <div class="row align-items-start">
                    <div class="col-12 col-lg-8">
                        <ul class="top-addressing-left d-lg-flex align-items-center p-0 m-0 ">
                            <li class="me-3">
                                <img class="me-3" src="{{asset('public/assets/front-end/img/home/call.png')}}">
                                <p class="mb-0">{{$web_config['phone']->value}}</p>
                            </li>
                            <li class="me-3">
                                <img class="me-3" src="{{asset('public/assets/front-end/img/home/mail.png')}}">
                                <p class="mb-0">{{$web_config['email']->value}}</p>
                            </li>
                           <li class="me-3 consultdctr">
                             <img class="me-3" src="{{asset('public/assets/front-end/img/home/consultdctr.png')}}"> 
                               <a href="">Consult Our Doctor</a>
                               </li> 
                        </ul>
                    </div>
                    <div class="col-12 col-lg-4">
                        <ul class="top-addressing-right  d-flex align-items-center justify-content-end  p-0 m-0 ">
                            @if(auth('customer')->check())
                            <li class="me-2">
                                <small>{{\App\CPU\translate('hello')}}, {{auth('customer')->user()->f_name}}</small>
                                    {{\App\CPU\translate('dashboard')}}
                            </li>
                            <li class="me-2">
                               <a href="{{route('customer.auth.logout')}}">{{ \App\CPU\translate('logout')}}</a>
                            </li>
                            @else
                            <li class="me-2">
                                <img class="me-3" src="{{asset('public/assets/front-end/img/home/sign-in.png')}}">
                                <a href="{{route('customer.auth.login')}}">Sign In</a>
                            </li>
                            <li class="me-2">
                                <img class="me-3" src="{{asset('public/assets/front-end/img/home/sign-up.png')}}">
                                <a href="{{route('customer.auth.sign-up')}}">Sign up</a>
                            </li>
                            @endif
                            <li>
                                <img class="me-2" src="{{asset('public/assets/front-end/img/home/wishlist.png')}}"><span class="countWishlist">{{session()->has('wish_list')?count(session('wish_list')):0}}</span>
                                <a href="{{route('wishlists')}}">Wishlist  </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>






        <header>
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container">
                   <a class="navbar-brand d-none d-sm-block {{Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'}} flex-shrink-0"
                   href="{{route('home')}}"
                   style="min-width: 7rem;">
                    <img style="width:auto;"
                         src="{{asset("storage/app/public/company")."/".$web_config['web_logo']->value}}"
                         onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                         alt="{{$web_config['name']->value}}"/>
                </a>
                <a class="navbar-brand d-sm-none {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"
                   href="{{route('home')}}">
                    <img style="width:auto;" class="mobile-logo-img"
                         src="{{asset("storage/app/public/company")."/".$web_config['mob_logo']->value}}"
                         onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                         alt="{{$web_config['name']->value}}"/>
                </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav" style="{{Session::get('direction') === "rtl" ? 'padding-right: 0px' : ''}}">
                        <li class="nav-item dropdown {{request()->is('/')?'active':''}}">
                            <a class="nav-link" href="{{route('home')}}">{{ \App\CPU\translate('Home')}}</a>
                        </li>
                        <li class="nav-item dropdown {{request()->is('/')?'active':''}}">
                            <a class="nav-link" href="{{route('about-us')}}">{{ \App\CPU\translate('About Us')}}</a>
                        </li>
                        <li class="nav-item dropdown {{request()->is('/')?'active':''}}">
                            <a class="nav-link" href="{{route('products')}}">{{ \App\CPU\translate('Products')}}</a>
                        </li>
                       <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"
                               data-toggle="dropdown">{{ \App\CPU\translate('brand') }}</a>
                            <ul class="dropdown-menu dropdown-menu-{{Session::get('direction') === "rtl" ? 'right' : 'left'}} scroll-bar"
                                style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                @foreach(\App\CPU\BrandManager::get_brands() as $brand)
                                    <li style="border-bottom: 1px solid #e3e9ef; display:flex; justify-content:space-between; ">
                                        <div>
                                            <a class="dropdown-item"
                                               href="{{route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])}}">
                                                {{$brand['name']}}
                                            </a>
                                        </div>
                                        <div class="align-baseline">
                                            @if($brand['brand_products_count'] > 0 )
                                                <span class="count-value px-2">( {{ $brand['brand_products_count'] }} )</span>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                                <li style="border-bottom: 1px solid #e3e9ef; display:flex; justify-content:center;">
                                    <div>
                                        <a class="dropdown-item" href="{{route('brands')}}"
                                        style="color: {{$web_config['primary_color']}} !important;">
                                            {{ \App\CPU\translate('View_more') }}
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>-->
                       <!-- @php($discount_product = App\Model\Product::with(['reviews'])->active()->where('discount', '!=', 0)->count())
                        @if ($discount_product>0)
                            <li class="nav-item dropdown {{request()->is('/')?'active':''}}">
                                <a class="nav-link text-capitalize" href="{{route('products',['data_from'=>'discounted','page'=>1])}}">{{ \App\CPU\translate('discounted_products')}}</a>
                            </li>
                        @endif-->

                        <!--@php($business_mode=\App\CPU\Helpers::get_business_settings('business_mode'))
                        @if ($business_mode == 'multi')
                            <li class="nav-item dropdown {{request()->is('/')?'active':''}}">
                                <a class="nav-link" href="{{route('sellers')}}">{{ \App\CPU\translate('Sellers')}}</a>
                            </li>

                            @php($seller_registration=\App\Model\BusinessSetting::where(['type'=>'seller_registration'])->first()->value)
                            @if($seller_registration)
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                style="color: white;margin-top: 5px; padding-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 0">
                                            {{ \App\CPU\translate('Seller')}}  {{ \App\CPU\translate('zone')}}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                            style="min-width: 165px !important; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                            <a class="dropdown-item" href="{{route('shop.apply')}}">
                                                {{ \App\CPU\translate('Become a')}} {{ \App\CPU\translate('Seller')}}
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('seller.auth.login')}}">
                                                {{ \App\CPU\translate('Seller')}}  {{ \App\CPU\translate('login')}}
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endif-->
                         <li class="nav-item dropdown {{request()->is('/')?'active':''}}">
                            <a class="nav-link" href="{{route('r&d')}}">{{ \App\CPU\translate('R&D')}}</a>
                        </li>
                        <li class="nav-item dropdown {{request()->is('/')?'active':''}}">
                            <a class="nav-link" href="{{route('contacts')}}">{{ \App\CPU\translate('Contact Us')}}</a>
                        </li>
                    </ul>
                        <div class="input-group-overlay d-none d-md-block mx-4"
                     style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}}">
                    <form action="{{route('products')}}" type="submit" class="search_form">
                        <input class="me-2 form-control appended-form-control search-bar-input" type="text"
                               autocomplete="off"
                               placeholder="{{\App\CPU\translate('search')}}"
                               name="name">
                        <button class="input-group-append-overlay search_button" type="submit">
                                <span class="input-group-text" style="font-size: 20px;">
                                   <img class="me-3" src="{{asset('public/assets/front-end/img/home/search-icon.png')}}">
                                </span>
                        </button>
                        <input name="data_from" value="search" hidden>
                        <input name="page" value="1" hidden>
                        <diV class="card search-card"
                             style="position: absolute;background: white;z-index: 999;width: 100%;display: none">
                            <div class="card-body search-result-box"
                                 style="overflow:scroll; height:400px;overflow-x: hidden"></div>
                        </diV>
                    </form>
                </div>
                        <div id="mySidepanel1" class="sidepanel1">
                            <a href="javascript:void(0)" class="closebtn1" onclick="closeNav1()">×</a>
                            <div class="sidepanel-content pe-4 ps-4">
                                <a class="sidebar-brand pb-4 mb-4 " href="#"><img src="{{asset('public/assets/front-end/img/home/logo-side-bar.png')}}"></a>
                                <ul class="sidepanel-address p-0">
                                    <li class="mb-4">
                                        <h5 class="text-white">Office Address</h5>
                                        <p class="text-white">Plot no. - 434, first floor , industrial area , phase 1, Panchkula ,Haryana , India, chandigarh (UT)</p>
                                    </li>
                                    <li class="mb-4">
                                        <h5 class="text-white">Phone Number</h5>
                                        <p class="text-white">+91-9877179420, +91-7009876534</p>
                                    </li>
                                    <li class="mb-4">
                                        <h5 class="text-white">Email Address</h5>
                                        <p class="text-white">Biohamllin@gmail.com</p>
                                    </li>

                                </ul>
                                <ul class="sidepanel-gallery p-0">
                                    <li class="mb-1"><img src="{{asset('public/assets/front-end/img/home/side0img.png')}}"> </li>
                                    <li class="mb-1"><img src="{{asset('public/assets/front-end/img/home/side0img.png')}}"></li>
                                    <li class="mb-1"><img src="{{asset('public/assets/front-end/img/home/side0img.png')}}"></li>
                                    <li class="mb-1"><img src="{{asset('public/assets/front-end/img/home/side0img.png')}}"> </li>
                                    <li class="mb-1"><img src="{{asset('public/assets/front-end/img/home/side0img.png')}}"></li>
                                    <li class="mb-1"><img src="{{asset('public/assets/front-end/img/home/side0img.png')}}"></li>
                                </ul>
                                <ul class="sidepanel-social p-0 d-md-flex">
                                    <li>
                                        <a class="p-1" href=""><img src="{{asset('public/assets/front-end/img/home/Facebook-1.png')}}"></a>
                                    </li>
                                    <li>
                                        <a class="p-1" href=""><img src="{{asset('public/assets/front-end/img/home/Instagram-2.png')}}"></a>
                                    </li>
                                    <li>
                                        <a class="p-1" href=""><img src="{{asset('public/assets/front-end/img/home/Twitter-4.png')}}"></a>
                                    </li>
                                    <li>
                                        <a class="p-1" href=""><img src="{{asset('public/assets/front-end/img/home/YouTube-5.png')}}"></a>
                                    </li>
                                    <li>
                                        <a class="p-1" href=""><img src="{{asset('public/assets/front-end/img/home/LinkedIn-3.png')}}"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <button class="openbtn me-4" onclick="openNav()">☰</button>

                         <div id="cart_items" class="cartbtn">
                        @include('layouts.front-end.partials.cart')
                    </div>


                    </div>
                </div>
            </nav>
        </header>



<script>
function myFunction() {
  $('#anouncement').addClass('d-none').removeClass('d-flex')
}
</script>
 <script>
        function openNav() {
            document.getElementById("mySidepanel1").style.width = "320px";
        }

        function closeNav1() {
            document.getElementById("mySidepanel1").style.width = "0";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3 " crossorigin="anonymous "></script>
