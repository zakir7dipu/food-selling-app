$(function () {
    $.ajax({
        type: "Get",
        url: '/app-banner-img',
        success: function (data) {
            // console.log(data);
            var banner_img_main = data['data'][0][0].image;
            var banner_meta_keyword_first_main = data['data'][0][0].meta_keyword_first;
            var banner_meta_keyword_second_main = data['data'][0][0].meta_keyword_second;
            var banner_img_second = data['data'][1][0].image;
            var banner_meta_keyword_first_second = data['data'][1][0].meta_keyword_first;
            var banner_meta_keyword_second_second = data['data'][1][0].meta_keyword_second;

            $(".banner-area").on({
                mouseenter: function(){
                    $(this).css("background-image", "url('/upload/images/banners/"+ banner_img_main +"')");
                },
            });
            $(".reservation-area").on({
                mouseenter: function(){
                    $(this).css("background-image", "url('/upload/images/banners/"+ banner_img_second +"')");
                },
            });

            $('#banner_title').val(banner_meta_keyword_first_main);
            $(tinymce.get('banner_slogan').getBody()).html(banner_meta_keyword_second_main);
            $('#banner_title2').val(banner_meta_keyword_first_second);
            $(tinymce.get('banner_slogan2').getBody()).html(banner_meta_keyword_second_second);
        }
    });
});
$(function () {
    $.ajax({
        type: "Get",
        url: '/app-menu-banner-img',
        success: function (data) {
            // console.log(data);
            var banner_img_main = data['data'][0].image;
            // console.log(banner_img_main);
            $(".banner-area2").on({
                mouseenter: function(){
                    $(this).css("background-image", "url('/upload/images/banners/"+ banner_img_main +"')");
                },
            });
        }
    });
});
$(function () {
    $.ajax({
        type: "Get",
        url: '/welcome-about-get',
        success: function (data) {
            // console.log(data);
            var welcome_title = data['data'][0][0].title;
            $(tinymce.get('welcome_area_title').getBody()).html(welcome_title);
            var welcome_description = data['data'][0][0].description;
            $(tinymce.get('welcome_area_description').getBody()).html(welcome_description);

            var food_title = data['data'][1][0].title;
            $(tinymce.get('food_area_title').getBody()).html(food_title);
            var food_description = data['data'][1][0].description;
            $(tinymce.get('food_area_description').getBody()).html(food_description);

            var deshes_title = data['data'][2][0].title;
            $(tinymce.get('deshes_area_title').getBody()).html(deshes_title);
            var deshes_description = data['data'][2][0].description;
            $(tinymce.get('deshes_area_description').getBody()).html(deshes_description);

            var footer_description = data['data'][3][0].description;
            $(tinymce.get('footer_area_description').getBody()).html(footer_description);

        }
    })
});
$(function () {
    $.ajax({
        type: "Get",
        url: '/contact',
        success: function (data) {
            // console.log(data);
            var contat_address = data['data'][0].address;
            var contat_phone = data['data'][0].phone;
            var contat_email = data['data'][0].email;
            var contat_facebook = data['data'][0].facebook;
            var contat_instagram = data['data'][0].instagram;
            var contat_twitter = data['data'][0].twitter;
            var contat_youtube = data['data'][0].youtube;
            var contat_whatsapp = data['data'][0].whatsapp;

            $('#address').val(contat_address);
            $('#phone').val(contat_phone);
            $('#email').val(contat_email);
            $('#facebook').val(contat_facebook);
            $('#instagram').val(contat_instagram);
            $('#twitter').val(contat_twitter);
            $('#youtube').val(contat_youtube);
            $('#whatsapp').val(contat_whatsapp);

        }
    })
})
// wysiwyg show
$(function () {
    tinymce.init({
        selector: '#banner_slogan',
        plugins: "code lists preview emoticons",
        menubar: 'edit',
        toolbar: 'bold italic underline | forecolor emoticons | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code preview'
    });
    tinymce.init({
        selector: '#welcome_area_title',
        plugins: "code lists preview emoticons",
        menubar: 'edit',
        toolbar: 'bold italic underline | forecolor emoticons | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code preview'
    });
    tinymce.init({
        selector: '#welcome_area_description',
        plugins: "code lists preview emoticons",
        menubar: 'edit',
        toolbar: 'bold italic underline | forecolor emoticons | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code preview'
    });
    tinymce.init({
        selector: '#food_area_title',
        plugins: "code lists preview emoticons",
        menubar: 'edit',
        toolbar: 'bold italic underline | forecolor emoticons | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code preview'
    });
    tinymce.init({
        selector: '#food_area_description',
        plugins: "code lists preview emoticons",
        menubar: 'edit',
        toolbar: 'bold italic underline | forecolor emoticons | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code preview'
    });
    tinymce.init({
        selector: '#banner_slogan2',
        plugins: "code lists preview emoticons",
        menubar: 'edit',
        toolbar: 'bold italic underline | forecolor emoticons | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code preview'
    });
    tinymce.init({
        selector: '#deshes_area_title',
        plugins: "code lists preview emoticons",
        menubar: 'edit',
        toolbar: 'bold italic underline | forecolor emoticons | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code preview'
    });
    tinymce.init({
        selector: '#deshes_area_description',
        plugins: "code lists preview emoticons",
        menubar: 'edit',
        toolbar: 'bold italic underline | forecolor emoticons | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code preview'
    });
    tinymce.init({
        selector: '#footer_area_description',
        plugins: "code lists preview emoticons",
        menubar: 'edit',
        toolbar: 'bold italic underline | forecolor emoticons | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code preview'
    });
});
// Model Show
$(function () {
    $('.logo_edit_dtn').on('click',function () {
        $('#logoModal').modal('show');
    });

    $('.banner-area_edit_dtn').on('click',function () {
        $('#bannerAreaModalfirst').modal('show');
    });

    $('.banner-area2_edit_dtn').on('click',function () {
        $('#menuBannerAreaModal').modal('show');
    });

    $('.welcome-area_img_edit_dtn').on('click',function () {
        $('#welcomeAreaImgModal').modal('show');
    });

    $('.welcome-area_edit_dtn').on('click',function () {
        $('#welcomeAreaModal').modal('show');
    });

    $('.food-area_edit_dtn').on('click',function () {
        $('#foodAreaModal').modal('show');
    });

    $('.reservation-area_edit_dtn').on('click',function () {
        $('#bannerAreaModalsecond').modal('show');
    });

    $('.deshes-area_edit_dtn').on('click',function () {
        $('#deshesAreaModal').modal('show');
    });

    $('.footer_first_edit_dtn').on('click',function () {
        $('#footerAreaModal').modal('show');
    });

    $('.footer_second_edit_dtn').on('click',function () {
        $('#contactUsModal').modal('show');
    });

    $('.product-quick-view').on('click',function () {
        var id = $(this).attr('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'Post',
            url: '/quick-view',
            data: {
                'id': id,
            },
            success: function (data) {
                // console.log(data);
                var product_slag = data['data'][0].slag;
                var product_image = data['data'][0].image;
                var product_sku = data['data'][0].sku;
                var product_name = data['data'][0].name;
                var product_price = data['data'][0].price;
                var product_description = data['data'][0].description;

                $('#product_slag').val(product_slag);
                $('.quick_view_product_image').attr('src','/upload/images/product-images/'+product_image);
                $('.quick_view_product_sku').html(product_sku);
                $('.quick_view_product_name').html(product_name);
                $('.quick_view_product_price').html(product_price+"৳");
                $('.quick_view_product_description').html(product_description);

            }
        });

        $('.bd-product-quick-view-modal-lg').modal('show');
    });
});
$(function ()
{
    // animated scroll
    $('#about_us_btn').on('click',function ()
    {
        $('html, body').animate(
            {
                scrollTop: $("#about_us").offset().top
            },
            1500);
        return false;
    });
    $('#contact_us_btn').on('click',function ()
    {
        $('html, body').animate(
            {
                scrollTop: $("#contact_us").offset().top
            },
            2500);
        return false;
    });
    $('.scroll_to_top').on('click',function ()
    {
        $('html, body').animate(
            {
                scrollTop: '0px'
            },
            3500);
        return false;
    });

    // image uploader
    $('.input-logo').imageUploader({
        imagesInputName: 'logo',
        maxFiles: 1
    });
    $('.input-banner1').imageUploader({
        imagesInputName: 'banner',
        maxFiles: 1
    });
    $('.input-welcomeAreaImg').imageUploader({
        imagesInputName: 'welcomeAreaImg',
        maxFiles: 1
    });
    $('.input-banner2').imageUploader({
        imagesInputName: 'banner',
        maxFiles: 1
    });
    $('.input-footer-logo').imageUploader({
        imagesInputName: 'footer_logo',
        maxFiles: 1
    });
    $('.menu-banner').imageUploader({
        imagesInputName: 'menu_banner',
        maxFiles: 1
    });
});
// Product Order
$(function () {
    $('.quick_view_buy_now_btn').on('click',function () {
        var order_sku = $('.quick_view_product_sku').html();
        var order_qty = $('#quick_view_product_qty').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var order_sku = $('.quick_view_product_sku').html();
        var order_qty = $('#quick_view_product_qty').val();
        $.ajax({
            type: 'Post',
            url: '/make-order',
            data: {
                'sku': order_sku,
                'qty': order_qty,
            },
            success: function (data) {
                // console.log(data);
                window.location.replace('/order-prosid')
            }
        });



    });
});
