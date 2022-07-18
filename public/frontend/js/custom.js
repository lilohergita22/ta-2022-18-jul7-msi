$(document).ready(function() {

    loadcart();
    loadwishlist();

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    function loadcart()
    {
        $.ajax({
            method: "GET",
            url: "/load-cart-data",
            success: function(response){

                $('.cart-count').html('');
                $('.cart-count').html(response.count);

                // console.log(response.count)
            }
        });
    }


    function loadwishlist()
    {
        $.ajax({
            method: "GET",
            url: "/load-wishlist-count",
            success: function(response){

                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);

                // console.log(response.count)
            }
        });
    }



    $('.addToCartBtn').click(function(e) {
        e.preventDefault();

        let product_id = $(this).closest('.product_data').find('.prod_id').val();
        let product_qty = $(this).closest('.product_data').find('.qty-input').val();

        // alert(product_id);  ===tes
        // alert(product_qty);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function(response) {
                swal(response.status);
                loadcart();
            }
        });
    });

    // 
    // 
    // 
    // 
    // addToWishlist
    $('.addToWishlist').click(function(e){
        e.preventDefault();

        let product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id': product_id,
            },
            success: function(response) {
                swal(response.status);
                loadwishlist();
            }
        });
    });



    // $('.increment-btn').click(function(e) {
        $(document).on('click','.increment-btn', function(e){
        e.preventDefault();

        // let inc_value = $('.qty-input').val();
        
        let inc_value = $(this).closest('.product_data').find('.qty-input').val();
        let value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            // $('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });


    // $('.decrement-btn').click(function(e) {
        $(document).on('click','.decrement-btn', function(e){
        e.preventDefault();

        // let dec_value = $('.qty-input').val();

        let dec_value = $(this).closest('.product_data').find('.qty-input').val();
        let value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            // $('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // $('.delete-cart-item').click(function(e){
        $(document).on('click','.delete-cart-item', function(e){
        // })
        e.preventDefault();

       

        let prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id':prod_id,
            },
            success: function(response){
                // window.location.reload();
                loadcart();
                $('.cartitems').load(location.href + " .cartitems");
                swal("", response.status, "success");
            }
        });
    });


    // remove-wistlist-item
    // $('.remove-wistlist-item').click(function(e){
        $(document).on('click','.remove-wistlist-item', function(e){
        e.preventDefault();

        let prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: "POST",
            url: "delete-wishlist-item",
            data: {
                'prod_id':prod_id,
            },
            success: function(response){
                // window.location.reload();
                loadwishlist();
                $('.wishlistitems').load(location.href + " .wishlistitems");
                swal("", response.status, "success");
            }
        });
    });




    // $('.changeQuantity').click(function(e){
        $(document).on('click','.changeQuantity', function(e){
            
        e.preventDefault();


        let prod_id = $(this).closest('.product_data').find('.prod_id').val();
        let qty = $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'prod_id' : prod_id,
            'prod_qty' : qty,
        }

        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function(response){
                $('.cartitems').load(location.href + " .cartitems");
                // window.location.reload();
            }
        });

    });
});