<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="{{route('home')}}"><img class="main-logo" src="{{asset('img/logo/logo.png')}}" alt="Logo Image" /></a>
            <strong><a href="{{route('home')}}"><img src="{{asset('img/logo/logosn.png')}}" alt="Logo Image" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li class="{{Request::is('home') || Request::is('home/*') ? 'active': ''}}">
                        <a class="has-arrow" href="index.html">
                           <span class="educate-icon educate-home icon-wrap"></span>
                           <span class="mini-click-non">Home</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="{{Request::is('home') || Request::is('home/*') ? 'true': ''}}">
                            <li><a title="Home" href="{{route('home')}}"><span class="mini-sub-pro">Deshboard</span></a></li>
                            <!-- <li><a title="Dashboard v.2" href="index-1.html"><span class="mini-sub-pro">Dashboard v.2</span></a></li>
                            <li><a title="Dashboard v.3" href="index-2.html"><span class="mini-sub-pro">Dashboard v.3</span></a></li>
                            <li><a title="Analytics" href="analytics.html"><span class="mini-sub-pro">Analytics</span></a></li>
                            <li><a title="Widgets" href="widgets.html"><span class="mini-sub-pro">Widgets</span></a></li> -->
                        </ul>
                    </li>

                    @if(Auth::user()->isMasterAdmin())
                      <li class="{{Request::is('employee') || Request::is('employee/*') ? 'active': ''}}">
                          <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Employees</span></a>
                          <ul class="submenu-angle" aria-expanded="{{Request::is('employee') || Request::is('employee/*') ? 'true': ''}}">
                              <li><a title="Create Employee" href="{{route('employee.create')}}"><span class="mini-sub-pro">Create Employee</span></a></li>
                              <li><a title="All Employees List" href="{{route('employee.all_employees')}}"><span class="mini-sub-pro">All Employees List</span></a></li>
                          </ul>
                      </li>
                    @endif
                    <li class="{{Request::is('customer') || Request::is('customer/*') ? 'active': ''}}">
                        <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Customers</span></a>
                        <ul class="submenu-angle" aria-expanded="{{Request::is('customer') || Request::is('customer/*') ? 'true': ''}}">
                            <li><a title="Create Customer" href="{{route('customer.create')}}"><span class="mini-sub-pro">Create Customer</span></a></li>
                            <li><a title="All Customer List" href="{{route('customer.all_customers')}}"><span class="mini-sub-pro">All CustomersList</span></a></li>
                        </ul>
                    </li>
                    <li class="{{Request::is('supplier') || Request::is('supplier/*') ? 'active': ''}}">
                        <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Suppliers</span></a>
                        <ul class="submenu-angle" aria-expanded="{{Request::is('supplier') || Request::is('supplier/*') ? 'true': ''}}">
                            <li><a title="Create Supplier" href="{{route('supplier.create')}}"><span class="mini-sub-pro">Create Supplier</span></a></li>
                            <li><a title="All Supplier List" href="{{route('supplier.all_suppliers')}}"><span class="mini-sub-pro">All Suppliers List</span></a></li>
                        </ul>
                    </li>
                    @if(Auth::user()->isMasterAdmin())
                      <li class="{{Request::is('salary') || Request::is('salary/*') ? 'active': ''}}">
                          <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-data-table icon-wrap"></span> <span class="mini-click-non">Salaries</span></a>
                          <ul class="submenu-angle" aria-expanded="{{Request::is('salary') || Request::is('salary/*') ? 'true': ''}}">
                              <li><a title="Create Salary Bill" href="{{route('salary.create')}}"><span class="mini-sub-pro">Create Salary Bill</span></a></li>
                              <li><a title="All Salary Bills List" href="{{route('salary.all_salaries')}}"><span class="mini-sub-pro">All Salary Bills List</span></a></li>
                              <li><a title="Unpaid Salary Bills List" href="{{route('salary.all_salary_unpaid')}}"><span class="mini-sub-pro">Unpaid Salary Bills List</span></a></li>
                              <li><a title="Paid Salary Bills List" href="{{route('salary.all_salary_paid')}}"><span class="mini-sub-pro">Paid Salary Bills List</span></a></li>
                          </ul>
                      </li>
                    @endif
                    <li class="{{Request::is('category') || Request::is('category/*') ? 'active': ''}}">
                        <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-department icon-wrap"></span> <span class="mini-click-non">Categories</span></a>
                        <ul class="submenu-angle" aria-expanded="{{Request::is('category') || Request::is('category/*') ? 'true': ''}}">
                            <li><a title="Add New Category" href="{{route('category.create')}}"><span class="mini-sub-pro">Add New Category</span></a></li>
                            <li><a title="All Categories List" href="{{route('category.all_categories')}}"><span class="mini-sub-pro">All Categories List</span></a></li>
                        </ul>
                    </li>
                    <li class="{{Request::is('brand') || Request::is('brand/*') ? 'active': ''}}">
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-interface icon-wrap"></span> <span class="mini-click-non">Brands</span></a>
                        <ul class="submenu-angle interface-mini-nb-dp" aria-expanded="{{Request::is('brand') || Request::is('brand/*') ? 'true': ''}}">
                            <li><a title="Add New Brand" href="{{route('brand.create')}}"><span class="mini-sub-pro">Add New Brand</span></a></li>
                            <li><a title="All Brands List" href="{{route('brand.all_brands')}}"><span class="mini-sub-pro">All Brands List</span></a></li>
                        </ul>
                    </li>
                    <li class="{{Request::is('product') || Request::is('product/*') ? 'active': ''}}">
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-form icon-wrap"></span> <span class="mini-click-non">Products</span></a>
                        <ul class="submenu-angle form-mini-nb-dp" aria-expanded="{{Request::is('product') || Request::is('product/*') ? 'true': ''}}">
                            <li><a title="Create Product" href="{{route('product.create')}}"><span class="mini-sub-pro">Create Product</span></a></li>
                            <li><a title="All Products List" href="{{route('product.all_products')}}"><span class="mini-sub-pro">All Products List</span></a></li>
                        </ul>
                    </li>
                    <li class="{{Request::is('stock') || Request::is('stock/*') ? 'active': ''}}">
                        <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Stock</span></a>
                        <ul class="submenu-angle" aria-expanded="{{Request::is('stock') || Request::is('stock/*') ? 'true': ''}}">
                            <li><a title="Create Stock" href="{{route('stock.create')}}"><span class="mini-sub-pro">Create Stock</span></a></li>
                            <li><a title="All Stocks List" href="{{route('stock.all_stocks')}}"><span class="mini-sub-pro">All Stocks List</span></a></li>
                        </ul>
                    </li>
                    <li class="{{Request::is('sell') || Request::is('sell/*') ? 'active': ''}}">
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-charts icon-wrap"></span> <span class="mini-click-non">Point Of Sell</span></a>
                        <ul class="submenu-angle chart-mini-nb-dp" aria-expanded="{{Request::is('sell') || Request::is('sell/*') ? 'true': ''}}">
                            <li><a title="Create Cart" href="{{route('sell.create')}}"><span class="mini-sub-pro">Create Cart</span></a></li>
                            <li><a title="Orders List" href="{{route('sell.all_orders')}}"><span class="mini-sub-pro">Orders List</span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>


<!-- Mobile Menu start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    <!-- <li><a href="index-1.html">Dashboard v.2</a></li>
                                    <li><a href="index-3.html">Dashboard v.3</a></li>
                                    <li><a href="analytics.html">Analytics</a></li>
                                    <li><a href="widgets.html">Widgets</a></li> -->
                                </ul>
                            </li>
                            @if(Auth::user()->isMasterAdmin())
                              <li><a data-toggle="collapse" data-target="#demoevent" href="#">Employees <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                  <ul id="demoevent" class="collapse dropdown-header-top">
                                      <li>
                                        <a href="{{route('employee.create')}}">Create Employee</a>
                                      </li>
                                      <li>
                                        <a href="{{route('employee.all_employees')}}">All Employees List</a>
                                      </li>
                                  </ul>
                              </li>
                            @endif
                            <li>
                              <a data-toggle="collapse" data-target="#demopro" href="#">Customers <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="demopro" class="collapse dropdown-header-top">
                                    <li>
                                      <a href="{{route('customer.create')}}">Create Customer</a>
                                    </li>
                                    <li>
                                      <a href="{{route('customer.all_customers')}}">All Customers List</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                              <a data-toggle="collapse" data-target="#democrou" href="#">Suppliers <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="democrou" class="collapse dropdown-header-top">
                                    <li>
                                      <a href="{{route('supplier.create')}}">Create Supplier</a>
                                    </li>
                                    <li>
                                      <a href="{{route('supplier.all_suppliers')}}">All Suppliers List</a>
                                    </li>
                                </ul>
                            </li>
                            @if(Auth::user()->isMasterAdmin())
                              <li>
                                <a data-toggle="collapse" data-target="#Tablesmob" href="#">Salaries <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                  <ul id="Tablesmob" class="collapse dropdown-header-top">
                                      <li>
                                        <a href="{{route('salary.create')}}">Create Salary Bill</a>
                                      </li>
                                      <li>
                                        <a href="{{route('salary.all_salaries')}}">All Salary Bills List</a>
                                      </li>
                                      <li>
                                        <a href="{{route('salary.all_salary_unpaid')}}">Unpaid Salary Bills List</a>
                                      </li>
                                      <li>
                                        <a href="{{route('salary.all_salary_paid')}}">Paid Salary Bills List</a>
                                      </li>
                                  </ul>
                              </li>
                            @endif
                            <li>
                              <a data-toggle="collapse" data-target="#demodepart" href="#">Categories <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="demodepart" class="collapse dropdown-header-top">
                                    <li><a href="{{route('category.create')}}">Add New Category</a>
                                    </li>
                                    <li><a href="{{route('category.all_categories')}}">All Categories List</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Brands <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                  <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                      <li>
                                        <a href="{{route('brand.create')}}">Add New Brand</a>
                                      </li>
                                      <li>
                                        <a href="{{route('brand.all_brands')}}">All Brands List</a>
                                      </li>
                                  </ul>
                              </li>
                              <li>
                                <a data-toggle="collapse" data-target="#formsmob" href="#">Products <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                  <ul id="formsmob" class="collapse dropdown-header-top">
                                      <li>
                                        <a href="{{route('product.create')}}">Create Product</a>
                                      </li>
                                      <li>
                                        <a href="{{route('product.all_products')}}">All Products List</a>
                                      </li>
                                  </ul>
                              </li>
                            <li>
                              <a data-toggle="collapse" data-target="#demolibra" href="#">Stock <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="demolibra" class="collapse dropdown-header-top">
                                    <li>
                                      <a href="{{route('stock.create')}}">Create Stock</a>
                                    </li>
                                    <li>
                                      <a href="{{route('stock.all_stocks')}}">All Stocks List</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                              <a data-toggle="collapse" data-target="#Chartsmob" href="#">Point Of Sell (POS) <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="Chartsmob" class="collapse dropdown-header-top">
                                    <li>
                                      <a href="{{route('sell.create')}}">Create Cart</a>
                                    </li>
                                    <li>
                                      <a href="{{route('sell.all_orders')}}">Orders List</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->
