<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{url('/')}}" class="logo logo-large"><img src="{{\Illuminate\Support\Facades\Storage::url(setting()->logo)}}" class="img-fluid" alt="logo"></a>
            <a href="{{url('/')}}" class="logo logo-small"><img src="{{\Illuminate\Support\Facades\Storage::url(setting()->logo)}}" class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="{{url(aurl('/'))}}">
                        <i class="ri-user-6-fill"></i><span>{{trans('admin.Dashboard')}}</span>
                    </a>
                </li>
                <li class="vertical-header"></li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-user-2-fill"></i><span>{{trans('admin.Admins')}}</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url(aurl('admins'))}}">{{trans('admin.Admins')}}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-user-add-fill"></i><span>{{trans('admin.Users')}}</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url(aurl('users'))}}">{{trans('admin.Users')}}</a></li>
                        <li><a href="{{url(aurl('users'))}}?member_type=silver">{{trans('admin.silver')}}</a></li>
                        <li><a href="{{url(aurl('users'))}}?member_type=gold">{{trans('admin.gold')}}</a></li>
                        <li><a href="{{url(aurl('users'))}}?member_type=Platinum">{{trans('admin.Platinum')}}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                      <i class="ri-settings-2-fill"></i><span>{{trans('admin.Setting')}}</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url(aurl('setting'))}}">{{trans('admin.Setting')}}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-ruler-2-fill"></i><span>{{trans('admin.Regulations')}}</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url(aurl('regulations'))}}">{{trans('admin.Regulations')}}</a></li>
                        <li><a href="{{url(aurl('related/regulations'))}}">{{trans('admin.Linked Regulations')}}</a></li>
                        <li><a href="{{url(aurl(''))}}">{{trans('admin.Linked Questions')}}</a></li>
                        <li><a href="{{url(aurl(''))}}">{{trans('admin.Linked Perimits')}}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javaScript:void();">
                        <i class="ri-ruler-2-fill"></i><span>{{trans('admin.Permits')}}</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url(aurl('permits'))}}">{{trans('admin.Permits')}}</a></li>
                        <li><a href="{{url(aurl('related/permits'))}}">{{trans('admin.Linked Permits')}}</a></li>
                        <li><a href="{{url(aurl(''))}}">{{trans('admin.Linked Questions')}}</a></li>
                        <li><a href="{{url(aurl(''))}}">{{trans('admin.Linked Regulations')}}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-pie-chart-line"></i><span>{{trans('admin.assessment_question')}}</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url(aurl('question'))}}">{{trans('admin.assessment_question')}}</a></li>
                        <li><a href="{{url(aurl())}}">{{trans('admin.Linked Regulations')}}</a></li>
                        <li><a href="{{url(aurl())}}">{{trans('admin.Linked Permits')}}</a></li>
                        <li><a href="{{url(aurl('related/question'))}}">{{trans('admin.Linked Questions')}}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-service-line"></i><span>Icons</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url('/icon-svg')}}">SVG</a></li>
                        <li><a href="{{url('/icon-dripicons')}}">Dripicons</a></li>
                        <li><a href="{{url('/icon-feather')}}">Feather</a></li>
                        <li><a href="{{url('/icon-flag')}}">Flag</a></li>
                        <li><a href="{{url('/icon-font-awesome')}}">Font Awesome</a></li>
                        <li><a href="{{url('/icon-ionicons')}}">Ion</a></li>
                        <li><a href="{{url('/icon-line-awesome')}}">Line Awesome</a></li>
                        <li><a href="{{url('/icon-material-design')}}">Material Design</a></li>
                        <li><a href="{{url('/icon-remixicon')}}">Remixicon</a></li>
                        <li><a href="{{url('/icon-simple-line')}}">Simple Line</a></li>
                        <li><a href="{{url('/icon-socicon')}}">Socicon</a></li>
                        <li><a href="{{url('/icon-themify')}}">Themify</a></li>
                        <li><a href="{{url('/icon-typicons')}}">Typicons</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-table-line"></i><span>Tables</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url('/table-bootstrap')}}">Bootstrap</a></li>
                        <li><a href="{{url('/table-datatable')}}">Datatable</a></li>
                        <li><a href="{{url('/table-editable')}}">Editable</a></li>
                        <li><a href="{{url('/table-footable')}}">Foo</a></li>
                        <li><a href="{{url('/table-rwdtable')}}">RWD</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-map-pin-line"></i><span>Maps</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url('/map-google')}}">Google</a></li>
                        <li><a href="{{url('/map-vector')}}">Vector</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                      <i class="ri-pages-line"></i><span>Pages</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="javaScript:void();">Basic<i class="ri-arrow-right-s-line"></i></a>
                            <ul class="vertical-submenu">
                                <li><a href="{{url('/page-starter')}}">Starter</a></li>
                                <li><a href="{{url('/page-blog')}}">Blog</a></li>
                                <li><a href="{{url('/page-faq')}}">FAQ</a></li>
                                <li><a href="{{url('/page-gallery')}}">Gallery</a></li>
                                <li><a href="{{url('/page-invoice')}}">Invoice</a></li>
                                <li><a href="{{url('/page-pricing')}}">Pricing</a></li>
                                <li><a href="{{url('/page-timeline')}}">Timeline</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">Store<i class="ri-arrow-right-s-line"></i></a>
                            <ul class="vertical-submenu">
                                <li><a href="{{url('/ecommerce-product-list')}}">Product List</a></li>
                                <li><a href="{{url('/ecommerce-product-detail')}}">Product Detail</a></li>
                                <li><a href="{{url('/ecommerce-order-list')}}">Order List</a></li>
                                <li><a href="{{url('/ecommerce-order-detail')}}">Order Detail</a></li>
                                <li><a href="{{url('/ecommerce-shop')}}">Shop</a></li>
                                <li><a href="{{url('/ecommerce-single-product')}}">Single Product</a></li>
                                <li><a href="{{url('/ecommerce-cart')}}">Cart</a></li>
                                <li><a href="{{url('/ecommerce-checkout')}}">Checkout</a></li>
                                <li><a href="{{url('/ecommerce-thankyou')}}">Thank You</a></li>
                                <li><a href="{{url('/ecommerce-myaccount')}}">My Account</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">Authentication<i class="ri-arrow-right-s-line"></i></a>
                            <ul class="vertical-submenu">
                                <li><a href="{{url('/user-login')}}">Login</a></li>
                                <li><a href="{{url('/user-register')}}">Register</a></li>
                                <li><a href="{{url('/user-forgotpsw')}}">Forgot Password</a></li>
                                <li><a href="{{url('/user-lock-screen')}}">Lock Screen</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">Error<i class="ri-arrow-right-s-line"></i></a>
                            <ul class="vertical-submenu">
                                <li><a href="{{url('/error-comingsoon')}}">Coming Soon</a></li>
                                <li><a href="{{url('/error-maintenance')}}">Maintenance</a></li>
                                <li><a href="{{url('/error-404')}}">Error 404</a></li>
                                <li><a href="{{url('/error-500')}}">Error 500</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('/widgets')}}">
                        <i class="ri-palette-line"></i><span>Widgets</span><span class="new-icon"></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
