@php
    $setting = App\Admin\Models\Setting::find(1);
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        @if($setting->logo==null)
            <img src="{{ asset('dist/img/logo1.png')}}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
        @else
            <img src="{{ $setting->logo }}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
        @endif
        <span class="brand-text font-weight-light">{{config('app.name','App Title')}}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/avatar04.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('user.show',['id'=>auth()->user()->id])}}"
                   class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link {{(Request::segment(1)=='home')?'active':''}}">
                        <i class="nav-icon fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('slider.index')}}"
                       class="nav-link {{(Request::segment(1)=='sliders')?'active':''}}">
                        <i class="nav-icon fab fa-canadian-maple-leaf"></i> Slider
                    </a>
                </li>
                <li class="border-bottom border-secondary"></li>
                <li class="nav-item">
                    <a href="{{route('store.index')}}"
                       class="nav-link {{(Request::segment(1)=='stores')?'active':''}}">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Stores
                            @if(\App\Models\Store::all()->count())
                                <span class="badge badge-success right">{{\App\Models\Store::all()->count()}}</span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('service.index')}}"
                       class="nav-link {{(Request::segment(1)=='services')?'active':''}}">
                        <i class="nav-icon fas fa-map-marker-alt"></i>
                        <p>
                            Service Zones
                            @if(\App\Models\ServiceZone::all()->count())
                                <span class="badge badge-success right">{{\App\Models\ServiceZone::all()->count()}}</span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('shippingdiscount.index')}}"
                       class="nav-link {{(Request::segment(1)=='shippingdiscounts')?'active':''}}">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <p>
                            Shipping Discount
                            @if(\App\Models\ShippingDiscount::all()->count())
                                <span class="badge badge-success right">{{\App\Models\ShippingDiscount::all()->count()}}</span>
                            @endif
                        </p>
                    </a>
                </li>

                <li class="border-bottom border-secondary"></li>
                <li class="nav-item">
                    <a href="{{route('brand.index')}}"
                       class="nav-link {{(Request::segment(1)=='brands')?'active':''}}">
                        <i class="nav-icon fas fa-copyright"></i>
                        <p>
                            Brands
                            @if(\App\Models\Brand::all()->count())
                                <span class="badge badge-success right">{{\App\Models\Brand::all()->count()}}</span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('category.index')}}"
                       class="nav-link {{(Request::segment(1)=='categories')?'active':''}}">
                        <i class="nav-icon fas fa-cat"></i>
                        <p>
                            Categories
                            @if(\App\Models\Category::all()->count())
                                <span class="badge badge-success right">{{\App\Models\Category::all()->count()}}</span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('sub_category.index')}}"
                       class="nav-link {{(Request::segment(1)=='sbucategories')?'active':''}}">
                        <i class="nav-icon fas fa-code-branch"></i>
                        <p>
                            SubCategories
                            @if(\App\Models\Subcategory::all()->count())
                                <span class="badge badge-success right">{{\App\Models\Subcategory::all()->count()}}</span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('product.index')}}"
                       class="nav-link {{(Request::segment(1)=='products')?'active':''}}">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p>
                            Products
                            @if(\App\Models\Product::all()->count())
                                <span class="badge badge-success right">{{\App\Models\Product::all()->count()}}</span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="border-bottom border-secondary"></li>
                <li class="nav-item">
                    <a href="{{route('order.index',1)}}"
                       class="nav-link {{(Request::segment(2)=='1')?'active':''}}">
                        <i class="nav-icon fas fa-dolly"></i>
                        <p>
                            Pending Orders
                            @if(\App\Models\Order::where('status_id',1)->get()->count())
                                <span class="badge badge-warning right">{{\App\Models\Order::where('status_id',1)->get()->count()}}</span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('order.index',2)}}"
                       class="nav-link {{(Request::segment(2)=='2')?'active':''}}">
                        <i class="nav-icon fas fa-dolly-flatbed"></i>
                        <p>
                            Processing Orders
                            @if(\App\Models\Order::where('status_id',2)->get()->count())
                                <span class="badge badge-info right">{{\App\Models\Order::where('status_id',2)->get()->count()}}</span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('order.index',3)}}"
                       class="nav-link {{(Request::segment(2)=='3')?'active':''}}">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <p>
                            Delivered Orders
                            @if(\App\Models\Order::where('status_id',3)->get()->count())
                                <span class="badge badge-success right">{{\App\Models\Order::where('status_id',3)->get()->count()}}</span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('order.index',4)}}"
                       class="nav-link {{(Request::segment(2)=='4')?'active':''}}">
                        <i class="nav-icon fas fa-cloud-rain"></i>
                        <p>
                            Canceled Orders
                            @if(\App\Models\Order::where('status_id',4)->get()->count())
                                <span class="badge badge-danger right">{{\App\Models\Order::where('status_id',4)->get()->count()}}</span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('order.index',0)}}"
                       class="nav-link {{(Request::segment(2)=='0')?'active':''}}">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>
                            All Orders
                            @if(\App\Models\Order::all()->count())
                                <span class="badge badge-primary right">{{\App\Models\Order::all()->count()}}</span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="border-bottom border-secondary"></li>
                <li class="nav-item">
                    <a href="{{route('report.query')}}"
                       class="nav-link {{(Request::segment(1)=='report')?'active':''}}">
                        <i class="nav-icon fas fa-print"></i> Reports
                    </a>
                </li>
                <li class="border-bottom border-secondary"></li>
                <li class="nav-item">
                    <a href="{{route('users.index')}}"
                       class="nav-link {{(Request::segment(1)=='users')?'active':''}}">
                        <i class="nav-icon fas fa-feather-alt"></i>
                        <p>
                            All User
                            @if(\App\User::all()->count())
                                <span class="badge badge-success right">{{\App\User::all()->count()}}</span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('setting.index')}}" class="nav-link {{(Request::segment(1)=='settings')?'active':''}}">
                        <i class="nav-icon fas fa-cogs"></i> Settings
                    </a>
                </li>
                <li class="border-bottom border-secondary"></li>
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="post" class="ml-auto">@csrf
                        <button type="submit" class="btn btn-dark text-left" style="width: 100%">
                            <i class="nav-icon fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
