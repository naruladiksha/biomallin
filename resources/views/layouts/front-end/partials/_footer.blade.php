<!-- Footer -->
<style>
    .social-media :hover {
        color: {{$web_config['secondary_color']}} !important;
    }
    .widget-list-link{
        color: white !important;
    }

    .widget-list-link:hover{
        color: #999898 !important;
    }
    .subscribe-border{
        border-radius: 5px;
    }
    .subscribe-button{
        background: #1B7FED;
        position: absolute;
        top: 0;
        color: white;
        padding: 11px;
        padding-left: 15px;
        padding-right: 15px;
        text-transform: capitalize;
        border: none;
    }
    .start_address{
        display: flex;
        justify-content: space-between;
    }
    .start_address_under_line{
        {{Session::get('direction') === "rtl" ? 'width: 344px;' : 'width: 331px;'}}
    }
    .address_under_line{
        width: 299px;
    }
    .end-footer{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    @media only screen and (max-width: 500px) {
        .start_address {
            display: block;
        }
        .footer-web-logo {
            justify-content: center !important;
            padding-bottom: 25px;
        }
        .footer-padding-bottom {
            padding-bottom: 15px;
        }
        .mobile-view-center-align {
            justify-content: center !important;
            padding-bottom: 15px;
        }
        .last-footer-content-align {
            display: flex !important;
            justify-content: center !important;
            padding-bottom: 10px;
        }
    }
    @media only screen and (max-width: 800px) {
        .end-footer{
            
            display: block;
            
            align-items: center;
        }
    }
    @media only screen and (max-width: 1200px) {
        .start_address_under_line {
            display: none;
        }
        .address_under_line{
            display: none;
        }
    }
</style>
    <!--<div class="d-flex justify-content-center text-center {{Session::get('direction') === "rtl" ? 'text-md-right' : 'text-md-left'}} mt-3"
            style="background: {{$web_config['primary_color']}}10;padding:20px;">
            {{-- <div class="col-md-1">
    
            </div> --}}
        <div class="col-md-3 d-flex justify-content-center">
            <div >
                <a href="{{route('about-us')}}">
                    <div style="text-align: center;">
                        <img style="height: 60px;width:60px;" src="{{asset("public/assets/front-end/png/about company.png")}}"
                                alt="">
                    </div>
                    <div style="text-align: center;">
                        
                            <p>
                                {{ \App\CPU\translate('About Company')}}
                            </p>
                        
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 d-flex justify-content-center">
            <div >
                <a href="{{route('contacts')}}">
                    <div style="text-align: center;">
                        <img style="height: 60px;width:60px;" src="{{asset("public/assets/front-end/png/contact us.png")}}"
                                 alt="">
                    </div>
                    <div style="text-align: center;">
                        <p>
                        {{ \App\CPU\translate('Contact Us')}}
                    </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 d-flex justify-content-center">
            <div >
                <a href="{{route('helpTopic')}}">
                    <div style="text-align: center;">
                        <img style="height: 60px;width:60px;" src="{{asset("public/assets/front-end/png/faq.png")}}"
                                 alt="">
                    </div>
                    <div style="text-align: center;">
                        <p>
                        {{ \App\CPU\translate('FAQ')}}
                    </p>
                    </div>
                </a>
            </div>
        </div>
        {{-- <div class="col-md-1">
    
        </div> --}}
    </div>
-->

<footer class="page-footer font-small mdb-colorrtl">
    <!-- Footer Links -->
    <div style="background:#f4f9ee;padding-top:30px;">
        <div class="container text-center" style="padding-bottom: 13px;">

            <!-- Footer links -->
            <div
                class="row text-center  mt-3 pb-3 ">
                <!-- Grid column -->
                <div class="col-md-3 d-flex text-md-left justify-content-start footer-web-logo" >
                   <!-- <a class="d-inline-block mt-n1" href="{{route('home')}}">
                        <img style="height: 46px!important; width: 180px;"
                             src="{{asset("storage/app/public/company/")}}/{{ $web_config['footer_logo']->value }}"
                             onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                             alt="{{ $web_config['name']->value }}"/>
                    </a>-->
                    <div class="col-md-12">
                   <h6 class="text-uppercase mb-4 font-weight-bold footer-heder">About Company</h6>
                   <p> We have a team of qualified and skilled professionals, which helps us in sourcing a quality assured range of pharmaceutical products.</p>
                     <div class="sociall">
                         @php($social_media = \App\Model\SocialMedia::where('active_status', 1)->get())
                    @if(isset($social_media))
                        @foreach ($social_media as $item)
                            <span class="social-media ">
                                    <a class="social-btn sb-light sb-{{$item->name}} {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} mb-2"
                                       target="_blank" href="{{$item->link}}" style="color: white!important;">
                                        <i class="{{$item->icon}}" aria-hidden="true"></i>
                                    </a>
                                </span>
                        @endforeach
                    @endif
                     </div>
                     </div>
                </div>
                <div class="col-md-9" >
                    <div class="row">
                        
                        <div class="col-md-3 footer-padding-bottom" >
                            <h6 class="text-uppercase mb-4 font-weight-bold footer-heder">Find It Fast</h6>
                            <ul class="widget-list" style="padding-bottom: 10px">
                                @php($flash_deals=\App\Model\FlashDeal::where(['status'=>1,'deal_type'=>'flash_deal'])->whereDate('start_date','<=',date('Y-m-d'))->whereDate('end_date','>=',date('Y-m-d'))->first())
                                @if(isset($flash_deals))
                                    <li class="widget-list-item">
                                        <a class="widget-list-link"
                                        href="{{route('flash-deals',[$flash_deals['id']])}}">
                                            {{\App\CPU\translate('flash_deal')}}
                                        </a>
                                    </li>
                                @endif
                                <li class="widget-list-item"><a class="widget-list-link"
                                                                href="{{route('products',['data_from'=>'featured','page'=>1])}}">{{\App\CPU\translate('featured_products')}}</a>
                                </li>
                                <li class="widget-list-item"><a class="widget-list-link"
                                                                href="{{route('products',['data_from'=>'latest','page'=>1])}}">{{\App\CPU\translate('latest_products')}}</a>
                                </li>
                                <li class="widget-list-item"><a class="widget-list-link"
                                                                href="{{route('products',['data_from'=>'best-selling','page'=>1])}}">{{\App\CPU\translate('best_selling_product')}}</a>
                                </li>
                                <li class="widget-list-item"><a class="widget-list-link"
                                                                href="{{route('products',['data_from'=>'top-rated','page'=>1])}}">{{\App\CPU\translate('top_rated_product')}}</a>
                                </li>
    
                            </ul>
                        </div>
                        <div class="col-md-2 footer-padding-bottom" style="{{Session::get('direction') === "rtl" ? 'padding-right:20px;' : ''}}">
                            <h6 class="text-uppercase mb-4 font-weight-bold footer-heder">Useful Links</h6>
                            @if(auth('customer')->check())
                                <ul class="widget-list" style="padding-bottom: 10px">
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="{{route('user-account')}}">{{\App\CPU\translate('profile_info')}}</a>
                                    </li>
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="{{route('wishlists')}}">{{\App\CPU\translate('wish_list')}}</a>
                                    </li>
                                    
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="{{route('track-order.index')}}">{{\App\CPU\translate('track_order')}}</a>
                                    </li>
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="{{ route('account-address') }}">{{\App\CPU\translate('address')}}</a>
                                    </li>
                                    
                                </ul>
                            @else
                                <ul class="widget-list" style="padding-bottom: 10px">
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="{{route('customer.auth.login')}}">{{\App\CPU\translate('profile_info')}}</a>
                                    </li>
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="{{route('customer.auth.login')}}">{{\App\CPU\translate('wish_list')}}</a>
                                    </li>
                                    
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="{{route('track-order.index')}}">{{\App\CPU\translate('track_order')}}</a>
                                    </li>
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="{{route('customer.auth.login')}}">{{\App\CPU\translate('address')}}</a>
                                    </li>
                                    
                                    
                                </ul>
                            @endif
                        </div>
                        <div class="col-md-4 footer-padding-bottom ps-4" >
                             <h6 class="text-uppercase font-weight-bold footer-heder align-items-center">
                                          Contact Us
                                        </h6>
                                   
                                
                             <div class="col-11 start_address ">
                                    <div style="color:" class="">
                                        <a class="widget-list-link" href="tel: {{$web_config['phone']->value}}">
                                            <span ><i class="fa fa-phone m-2"></i>{{\App\CPU\Helpers::get_business_settings('company_phone')}} </span>
                                        </a>
                                        
                                    </div>
                                    <div style=""class="">
                                        <a class="widget-list-link" href="email:">
                                            <span ><i class="fa fa-envelope m-2"></i> {{\App\CPU\Helpers::get_business_settings('company_email')}} </span>
                                        </a>
                                    </div>
                                    <div style="" class="">
                                        @if(auth('customer')->check())
                                            <a class="widget-list-link" href="{{route('account-tickets')}}">
                                                <span ><i class="fa fa-user-o m-2"></i> {{ \App\CPU\translate('Support Ticket')}} </span>
                                            </a>
                                        @else
                                            <a class="widget-list-link" href="{{route('customer.auth.login')}}">
                                                <span ><i class="fa fa-user-o m-2"></i> {{ \App\CPU\translate('Support Ticket')}} </span>
                                            </a>
                                        @endif
                                    </div>
                                    <div style=""class="">
                                        <a class="widget-list-link">
                                            <span ><i class="fa fa-map-marker m-2"></i> {{ \App\CPU\Helpers::get_business_settings('shop_address')}} </span>
                                        </a>
                                    </div>
                                    
                                </div>
                               </div>
                        
                        
                        <div class="col-md-3 footer-padding-bottom" >
                             @php($ios = \App\CPU\Helpers::get_business_settings('download_app_apple_stroe'))
                                @php($android = \App\CPU\Helpers::get_business_settings('download_app_google_stroe'))
            
                                @if($ios['status'] || $android['status'])
                                   
                                        <h6 class="text-uppercase font-weight-bold footer-heder align-items-center">
                                            {{\App\CPU\translate('download_our_app')}}
                                        </h6>
                                   
                                @endif
                             
                               
           
            
                                <div class="store-contents d-flex justify-content-center" >
                                    @if($ios['status'])
                                        <div class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} mb-2">
                                            <a class="" href="{{ $ios['link'] }}" role="button"><img
                                                    src="{{asset("public/assets/front-end/png/apple_app.png")}}"
                                                    alt="" style="object-fit: contain;height: 51px!important;">
                                            </a>
                                        </div>
                                    @endif
            
                                    @if($android['status'])
                                        <div class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} mb-2">
                                            <a href="{{ $android['link'] }}" role="button">
                                                <img src="{{asset("public/assets/front-end/png/google_app.png")}}"
                                                     alt="" style="object-fit: contain;height: 51px!important;">
                                            </a>
                                        </div>
                                    @endif
                                    
                                    
                                </div>
                                
                        </div>
                    </div>
                    
                </div>
                
    
                
                <!-- Grid column -->
            </div>
            <!-- Footer links -->
        </div>
    </div>

    
    <!-- Grid row -->
    <div class="copyrightt" style="background: {{$web_config['primary_color']}}10;">
        <div class="container">
            <div class="row end-footer footer-end last-footer-content-align">
                <div class=" mt-3">
                    <p class="{{Session::get('direction') === "rtl" ? 'text-right ' : 'text-left'}}" style="font-size: 16px;">{{ $web_config['copyright_text']->value }} Developed By <a style="text-decoration:none;" href="https://www.webhopers.com" target="_blank"><b style="color: #126cdc;">Web</b><b style="color: #ff7713;">Hopers</b></a></p>
                </div>
               
               
            </div>
        </div>
        <!-- Grid row -->
    </div>
    <!-- Footer Links -->
</footer>

