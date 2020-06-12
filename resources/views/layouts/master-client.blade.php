<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/client-assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="/client-assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="/client-assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="/client-assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="/client-assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="/client-assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="{{ asset('css/image-uploader.min.css') }}">
    <link rel="stylesheet" href="/client-assets/css/style.css">
    @yield('stylesheet')
</head>
<body>
<!-- Preloader Starts -->
<div class="preloader">
    <div class="spinner"></div>
</div>
<!-- Preloader End -->

<!-- Header Area Starts -->
@include('layouts.client-navbar')
<!-- Header Area End -->

<!-- Content -->
@yield('content')
<!-- Content End -->

<!-- Footer Area Starts -->
<footer class="footer-area">
    <div class="footer-widget section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    @if(auth()->user())
                    <div class="row m-0 p-0">
                        <button class="btn btn-sm btn-warning footer_first_edit_dtn"><i class="fa fa-edit"></i></button>
                    </div>
                    @endif
                    <div class="single-widget single-widget1">
                        @foreach($footer_about as $about_us)
                        <a href="/"><img src="{{ asset('upload/images/logos/'.$about_us->image) }}" alt="Logo"></a>
                        <p class="mt-3">{!! $about_us->description !!}</p>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4" id="contact_us">
                    @if(auth()->user())
                    <div class="row m-0 p-0">
                        <button class="btn btn-sm btn-warning footer_second_edit_dtn"><i class="fa fa-edit"></i></button>
                    </div>
                    @endif
                    <div class="single-widget single-widget2 my-5 my-md-0">
                        <h5 class="mb-4">contact us</h5>
                        @foreach($app_contact as $contact)
                        <div class="d-flex">
                            <div class="into-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="info-text">
                                <p>{{ $contact->address }}</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="into-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="info-text">
                                <p>{!! "+". $contact->phone !!}</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="into-icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="info-text">
                                <p>{{ $contact->email }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-widget single-widget3">
                        <h5 class="mb-4">Our Mobile Apps</h5>
                        <a href="javascript:void(0)"><img src="{{ asset('upload/images/app-imgs/google-play-logo-png-clip-art.png') }}" alt="" style="width: 250px; height: 50px;; border-radius: 15px;" class="img-fluid my-1"><br></a>
                        <a href="javascript:void(0)"><img src="{{ asset('upload/images/app-imgs/images.png') }}" alt="" style="width: 250px; height: 50px;; border-radius: 15px;" class="img-fluid my-1"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                        <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://zakir7dipu.com" target="_blank">zakir7dipu</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="social-icons">
                        <ul>
                            @foreach($app_contact as $contact)
                            <li class="no-margin">Follow Us</li>
                            <li><a href="{{ $contact->facebook }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ $contact->instagram }}"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="{{ $contact->twitter }}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ $contact->youtube }}"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="{{ $contact->whatsapp }}"><i class="fa fa-whatsapp"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->
<div class="scroll_to_top btn btn-warning btn-sm">
    <a href="javascript:void(0)" class="text-dark"><i class="fa fa-arrow-up"></i></a>
</div>
<!-- logo modal ok-->
<div class="modal fade" id="logoModal" tabindex="-1" role="dialog" aria-labelledby="logoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('app-logo') }}"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="input-field">
                        <label class="active">logo*</label>
                        <div class="input-logo" style="padding-top: .5rem;"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- banner-area modal1 ok-->
<div class="modal fade" id="bannerAreaModalfirst" tabindex="-1" role="dialog" aria-labelledby="bannerAreaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('app-banner') }}"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="banner_title">Meta Keyword-1*</label>
                        <input class="form-control" type="text" name="meta_keyword_first" id="banner_title">
                    </div>
                    <div class="form-group">
                        <label for="banner_slogan">Meta Keyword-2*</label>
                        <textarea class="form-control" type="text" rows="2"  name="meta_keyword_second" id="banner_slogan"></textarea>
                    </div>
                    <div class="input-field">
                        <label class="active">Banner*</label>
                        <div class="input-banner1" style="padding-top: .5rem;"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- welcome area Image modal ok-->
<div class="modal fade" id="welcomeAreaImgModal" tabindex="-1" role="dialog" aria-labelledby="welcomeAreaImgModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('app-welcome') }}"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="input-field">
                        <div class="input-welcomeAreaImg" style="padding-top: .5rem;"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- welcome area modal ok-->
<div class="modal fade" id="welcomeAreaModal" tabindex="-1" role="dialog" aria-labelledby="welcomeAreaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('welcome-about') }}">
                @csrf
                <div class="modal-body">
                    <div class="from-gropu">
                        <label for="banner_slogan2">Tilte*</label>
                        <textarea class="form-control" type="text" rows="2" name="title" id="welcome_area_title"></textarea>
                    </div>
                    <div class="from-gropu">
                        <label for="banner_slogan2">Description*</label>
                        <textarea class="form-control" type="text" rows="6" name="description" id="welcome_area_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- banner-area modal2 ok-->
<div class="modal fade" id="bannerAreaModalsecond" tabindex="-1" role="dialog" aria-labelledby="bannerAreaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('app-banner2') }}"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="banner_title2">Meta Keyword-1*</label>
                        <input class="form-control" type="text" name="meta_keyword_first" id="banner_title2">
                    </div>
                    <div class="form-group">
                        <label for="banner_slogan2">Meta Keyword-2*</label>
                        <textarea class="form-control" type="text" rows="2" name="meta_keyword_second" id="banner_slogan2"></textarea>
                    </div>
                    <div class="input-field">
                        <label class="active">Banner*</label>
                        <div class="input-banner2" style="padding-top: .5rem;"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- food area modal ok-->
<div class="modal fade" id="foodAreaModal" tabindex="-1" role="dialog" aria-labelledby="foodAreaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('food-about') }}">
                @csrf
                <div class="modal-body">
                    <div class="from-gropu">
                        <label for="banner_slogan2">Tilte*</label>
                        <textarea class="form-control" type="text" rows="2" name="title" id="food_area_title"></textarea>
                    </div>
                    <div class="from-gropu">
                        <label for="banner_slogan2">Description*</label>
                        <textarea class="form-control" type="text" rows="6" name="description" id="food_area_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- deshes area modal ok-->
<div class="modal fade" id="deshesAreaModal" tabindex="-1" role="dialog" aria-labelledby="deshesAreaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('deshes-about') }}">
                @csrf
                <div class="modal-body">
                    <div class="from-gropu">
                        <label for="banner_slogan2">Tilte*</label>
                        <textarea class="form-control" type="text" rows="2" name="title" id="deshes_area_title"></textarea>
                    </div>
                    <div class="from-gropu">
                        <label for="banner_slogan2">Description*</label>
                        <textarea class="form-control" type="text" rows="6" name="description" id="deshes_area_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- footer area modal ok-->
<div class="modal fade" id="footerAreaModal" tabindex="-1" role="dialog" aria-labelledby="footerAreaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('footer-about') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="from-gropu">
                        <div class="input-field">
                            <label class="active">logo*</label>
                            <div class="input-footer-logo" style="padding-top: .5rem;"></div>
                        </div>
                    </div>
                    <div class="from-gropu">
                        <label for="banner_slogan2">Description*</label>
                        <textarea class="form-control" type="text" rows="6" name="description" id="footer_area_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- contact us modal ok-->
<div class="modal fade" id="contactUsModal" tabindex="-1" role="dialog" aria-labelledby="contactUsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('contact-us') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="address">Business Location* <i class="fa fa-map-marker"></i></label>
                        <input class="form-control" type="text" name="address" id="address">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number* <i class="fa fa-phone"></i></label>
                        <input class="form-control" type="number" name="phone" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail* <i class="fa fa-envelope"></i></label>
                        <input class="form-control" type="email" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook (URL) <i class="fa fa-facebook"></i></label>
                        <input class="form-control" type="text" name="facebook" id="facebook">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram (URL) <i class="fa fa-instagram"></i></label>
                        <input class="form-control" type="text" name="instagram" id="instagram">
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter (URL) <i class="fa fa-twitter"></i></label>
                        <input class="form-control" type="text" name="twitter" id="twitter">
                    </div>
                    <div class="form-group">
                        <label for="youtube">Youtube (URL) <i class="fa fa-youtube"></i></label>
                        <input class="form-control" type="text" name="youtube" id="youtube">
                    </div>
                    <div class="form-group">
                        <label for="whatsapp">Whatsapp (URL) <i class="fa fa-whatsapp"></i></label>
                        <input class="form-control" type="text" name="whatsapp" id="whatsapp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- product Quick View -->
<div class="modal fade bd-product-quick-view-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <section class="blog_area quick-view-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 posts-list">
                            <div class="single-post row">
                                <div class="col-lg-12">
                                    <div class="feature-img">
                                        <img class="img-fluid quick_view_product_image" src="" alt="Product Image">
                                    </div>
                                    <div class="row mt-3 p-4">
                                        <p class="text-dark"><bold>SKU: </bold><span class="quick_view_product_sku"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="blog_right_sidebar">
                                <div class="row">
                                    <h4 class="quick_view_product_name text-black-50"></h4>
                                </div>
                                <div class="row mt-2">
                                    <h4 class="text-warning quick_view_product_price"></h4>
                                </div>
                                <div class="row mt-3">
                                    <p class="quick_view_product_description text-dark h6"></p>
                                </div>
                                <div class="row mt-3">
                                    <label for="quick_view_product_qty">Quantity</label>
                                    <input type="number" class="form-control" name="product_qty" id="quick_view_product_qty" value="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container">
{{--                            <a href="{{ route('order-prosid') }}">--}}
                                <button type="button" class="btn btn-warning btn-block quick_view_buy_now_btn">Buy Now</button>
{{--                            </a>--}}
                            <button type="button" class="btn btn-secondary btn-block mt-1" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- banner-area modal1 ok-->
<div class="modal fade" id="menuBannerAreaModal" tabindex="-1" role="dialog" aria-labelledby="menuBannerAreaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('app-menu-banner') }}"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="input-field">
                        <label class="active">Banner*</label>
                        <div class="menu-banner" style="padding-top: .5rem;"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modals End -->
<!-- Javascript -->
<script src="/client-assets/js/vendor/jquery-2.2.4.min.js" defer></script>
<script src="/client-assets/js/vendor/bootstrap-4.1.3.min.js" defer></script>
<script src="/client-assets/js/vendor/wow.min.js" defer></script>
<script src="/client-assets/js/vendor/owl-carousel.min.js" defer></script>
<script src="/client-assets/js/vendor/jquery.datetimepicker.full.min.js" defer></script>
<script src="/client-assets/js/vendor/jquery.nice-select.min.js" defer></script>
<script src="/client-assets/js/main.js" defer></script>
<script src="{{ asset('js/image-uploader.min.js') }}" defer></script>
<script src="{{ asset('js/tinymce.min.js') }}" defer></script>
<script src="{{ asset('js/custom.js') }}" defer></script>
@yield('script')
</body>
</html>
