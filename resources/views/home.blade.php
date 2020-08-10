@extends('layouts.app')

@section('content')

<!-- Header starts -->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <form role="search" class="sr-input-func">
                                    <input type="text" placeholder="Search..." class="search-int form-control">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="{{route('home')}}">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Dashboard</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header Ends -->

</div><!-- dont delete this -->

<div class="income-order-visit-user-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="income-dashone-total reso-mg-b-30">
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-edu-rate">
                                <h3><span><i class="fa fa-product-hunt"></i> </span> <span class="counter"> {{ $getProductCount }}</span></h3>
                            </div>
                        </div>
                        <div class="income-range">
                            <p>Total Products</p>
                            <span class="income-percentange bg-green"><span class="counter">95</span>% <i class="fa fa-bolt"></i>
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="income-dashone-total">
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-edu-rate">
                                <h3><span><i class="fa fa-glass"></i></span> <span class="counter">{{ $getBrandCount }}</span></h3>
                            </div>
                        </div>
                        <div class="income-range order-cl">
                            <p>Total Brands</p>
                            <span class="income-percentange bg-red"><span class="counter">65</span>% <i class="fa fa-level-up"></i>
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="income-dashone-total res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-edu-rate">
                                <h3><span><i class="fa fa-cutlery"></i></span> <span class="counter">{{ $getCategoryCount }}</span></h3>
                            </div>
                        </div>
                        <div class="income-range visitor-cl">
                            <p>Total Categories</p>
                            <span class="income-percentange bg-blue"><span class="counter">75</span>% <i class="fa fa-level-up"></i>
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="income-dashone-total res-mg-t-30 dk-res-t-pro-30">
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-edu-rate">
                                <h3><span><i class="fa fa-user-plus"></i></span> <span class="counter">{{ $getSupplierCount }}</span></h3>
                            </div>
                        </div>
                        <div class="income-range low-value-cl">
                            <p>Total Suppliers</p>
                            <span class="income-percentange bg-purple"><span class="counter">35</span>% <i class="fa fa-level-down"></i>
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(Auth::user()->isMasterAdmin())
<div class="income-order-visit-user-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="income-dashone-total">
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-edu-rate">
                                <h3><span><i class="fa fa-user-circle-o"></i></span> <span class="counter">{{ $getEmployeeCount }}</span></h3>
                            </div>
                        </div>
                        <div class="income-range order-cl">
                            <p>Total Employees</p>
                            <span class="income-percentange bg-red"><span class="counter">65</span>% <i class="fa fa-level-up"></i>
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="income-dashone-total res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-edu-rate">
                                <h3><span><i class="fa fa-users"></i></span> <span class="counter">{{ $getUserCount }}</span></h3>
                            </div>
                        </div>
                        <div class="income-range visitor-cl">
                            <p>Total Users</p>
                            <span class="income-percentange bg-blue"><span class="counter">75</span>% <i class="fa fa-level-up"></i>
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            </div>
        </div>
    </div>
</div>
@endif

<div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="product-sales-chart">
                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="caption pro-sl-hd">
                                    <span class="caption-subject"><b>University Earnings</b></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="actions graph-rp graph-rp-dl">
                                    <p>All Earnings are in million $</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline cus-product-sl-rp">
                        <li>
                            <h5><i class="fa fa-circle" style="color: #006DF0;"></i>CSE</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle" style="color: #933EC5;"></i>Accounting</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle" style="color: #65b12d;"></i>Electrical</h5>
                        </li>
                    </ul>
                    <div id="extra-area-chart" style="height: 356px;"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                    <h3 class="box-title">Total Visit</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div id="sparklinedash"></div>
                        </li>
                        <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success">1500</span></li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                    <h3 class="box-title">Page Views</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div id="sparklinedash2"></div>
                        </li>
                        <li class="text-right graph-two-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-purple">3000</span></li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                    <h3 class="box-title">Unique Visitor</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div id="sparklinedash3"></div>
                        </li>
                        <li class="text-right graph-three-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-info">5000</span></li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                    <h3 class="box-title">Bounce Rate</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div id="sparklinedash4"></div>
                        </li>
                        <li class="text-right graph-four-ctn"><i class="fa fa-level-down" aria-hidden="true"></i> <span class="text-danger"><span class="counter">18</span>%</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="traffic-analysis-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="social-media-edu">
                    <i class="fa fa-facebook"></i>
                    <div class="social-edu-ctn">
                        <h3>50k Likes</h3>
                        <p>You main list growing</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="social-media-edu twitter-cl res-mg-t-30 table-mg-t-pro-n">
                    <i class="fa fa-twitter"></i>
                    <div class="social-edu-ctn">
                        <h3>30k followers</h3>
                        <p>You main list growing</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="social-media-edu linkedin-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <i class="fa fa-linkedin"></i>
                    <div class="social-edu-ctn">
                        <h3>7k Connections</h3>
                        <p>You main list growing</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="social-media-edu youtube-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <i class="fa fa-youtube"></i>
                    <div class="social-edu-ctn">
                        <h3>50k Subscribers</h3>
                        <p>You main list growing</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="library-book-area mg-t-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="single-cards-item">
                    <div class="single-product-image">
                        <a href="#"><img src="img/product/profile-bg.jpg" alt=""></a>
                    </div>
                    <div class="single-product-text">
                        <img src="img/product/pro4.jpg" alt="">
                        <h4><a class="cards-hd-dn" href="#">Angela Dominic</a></h4>
                        <h5>Web Designer & Developer</h5>
                        <p class="ctn-cards">Lorem ipsum dolor sit amet, this is a consectetur adipisicing elit</p>
                        <a class="follow-cards" href="#">Follow</a>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="cards-dtn">
                                    <h3><span class="counter">199</span></h3>
                                    <p>Articles</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="cards-dtn">
                                    <h3><span class="counter">599</span></h3>
                                    <p>Like</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="cards-dtn">
                                    <h3><span class="counter">399</span></h3>
                                    <p>Comment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="single-review-st-item res-mg-t-30 table-mg-t-pro-n">
                    <div class="single-review-st-hd">
                        <h2>Reviews</h2>
                    </div>
                    <div class="single-review-st-text">
                        <img src="img/notification/1.jpg" alt="">
                        <div class="review-ctn-hf">
                            <h3>Sarah Graves</h3>
                            <p>Highly recommend</p>
                        </div>
                        <div class="review-item-rating">
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star-half"></i>
                        </div>
                    </div>
                    <div class="single-review-st-text">
                        <img src="img/notification/2.jpg" alt="">
                        <div class="review-ctn-hf">
                            <h3>Garbease sha</h3>
                            <p>Awesome Pro</p>
                        </div>
                        <div class="review-item-rating">
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star-half"></i>
                        </div>
                    </div>
                    <div class="single-review-st-text">
                        <img src="img/notification/3.jpg" alt="">
                        <div class="review-ctn-hf">
                            <h3>Gobetro pro</h3>
                            <p>Great Website</p>
                        </div>
                        <div class="review-item-rating">
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star-half"></i>
                        </div>
                    </div>
                    <div class="single-review-st-text">
                        <img src="img/notification/4.jpg" alt="">
                        <div class="review-ctn-hf">
                            <h3>Siam Graves</h3>
                            <p>That's Good</p>
                        </div>
                        <div class="review-item-rating">
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star-half"></i>
                        </div>
                    </div>
                    <div class="single-review-st-text">
                        <img src="img/notification/5.jpg" alt="">
                        <div class="review-ctn-hf">
                            <h3>Sarah Graves</h3>
                            <p>Highly recommend</p>
                        </div>
                        <div class="review-item-rating">
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star-half"></i>
                        </div>
                    </div>
                    <div class="single-review-st-text">
                        <img src="img/notification/6.jpg" alt="">
                        <div class="review-ctn-hf">
                            <h3>Julsha Grav</h3>
                            <p>Sei Hoise bro</p>
                        </div>
                        <div class="review-item-rating">
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star"></i>
                            <i class="educate-icon educate-star-half"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="single-product-item res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                    <div class="single-product-image">
                        <a href="#"><img src="img/product/book-4.jpg" alt=""></a>
                    </div>
                    <div class="single-product-text edu-pro-tx">
                        <h4><a href="#">Title Demo Here</a></h4>
                        <h5>Lorem ipsum dolor sit amet, this is a consec tetur adipisicing elit</h5>
                        <div class="product-price">
                            <h3>$45</h3>
                            <div class="single-item-rating">
                                <i class="educate-icon educate-star"></i>
                                <i class="educate-icon educate-star"></i>
                                <i class="educate-icon educate-star"></i>
                                <i class="educate-icon educate-star"></i>
                                <i class="educate-icon educate-star-half"></i>
                            </div>
                        </div>
                        <div class="product-buttons">
                            <button type="button" class="button-default cart-btn">Read More</button>
                            <button type="button" class="button-default"><i class="fa fa-heart"></i></button>
                            <button type="button" class="button-default"><i class="fa fa-share"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="product-sales-chart">
                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="caption pro-sl-hd">
                                    <span class="caption-subject"><b>Adminsion Statistic</b></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="actions graph-rp actions-graph-rp">
                                    <a href="#" class="btn btn-dark btn-circle active tip-top" data-toggle="tooltip" title="Refresh">
                  <i class="fa fa-reply" aria-hidden="true"></i>
                </a>
                                    <a href="#" class="btn btn-blue-grey btn-circle active tip-top" data-toggle="tooltip" title="Delete">
                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline cus-product-sl-rp">
                        <li>
                            <h5><i class="fa fa-circle" style="color: #006DF0;"></i>Python</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle" style="color: #933EC5;"></i>PHP</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle" style="color: #65b12d;"></i>Java</h5>
                        </li>
                    </ul>
                    <div id="morris-area-chart"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="analysis-progrebar res-mg-t-30 mg-ub-10 res-mg-b-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                    <div class="analysis-progrebar-content">
                        <h5>Usage</h5>
                        <h2 class="storage-right"><span class="counter">90</span>%</h2>
                        <div class="progress progress-mini ug-1">
                            <div style="width: 68%;" class="progress-bar"></div>
                        </div>
                        <div class="m-t-sm small">
                            <p>Server down since 1:32 pm.</p>
                        </div>
                    </div>
                </div>
                <div class="analysis-progrebar reso-mg-b-30 res-mg-b-30 mg-ub-10 tb-sm-res-d-n dk-res-t-d-n">
                    <div class="analysis-progrebar-content">
                        <h5>Memory</h5>
                        <h2 class="storage-right"><span class="counter">70</span>%</h2>
                        <div class="progress progress-mini ug-2">
                            <div style="width: 78%;" class="progress-bar"></div>
                        </div>
                        <div class="m-t-sm small">
                            <p>Server down since 12:32 pm.</p>
                        </div>
                    </div>
                </div>
                <div class="analysis-progrebar reso-mg-b-30 res-mg-b-30 res-mg-t-30 mg-ub-10 tb-sm-res-d-n dk-res-t-d-n">
                    <div class="analysis-progrebar-content">
                        <h5>Data</h5>
                        <h2 class="storage-right"><span class="counter">50</span>%</h2>
                        <div class="progress progress-mini ug-3">
                            <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                        </div>
                        <div class="m-t-sm small">
                            <p>Server down since 8:32 pm.</p>
                        </div>
                    </div>
                </div>
                <div class="analysis-progrebar res-mg-t-30 table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                    <div class="analysis-progrebar-content">
                        <h5>Space</h5>
                        <h2 class="storage-right"><span class="counter">40</span>%</h2>
                        <div class="progress progress-mini ug-4">
                            <div style="width: 28%;" class="progress-bar progress-bar-danger"></div>
                        </div>
                        <div class="m-t-sm small">
                            <p>Server down since 5:32 pm.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
