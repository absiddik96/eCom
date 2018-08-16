<script type="text/javascript" >
    $('.add').click(function() {
        var a = $(this).attr('data-min');
        var product_id = $('#product_id_'+a).val();
        var product_code = $('#product_code_'+a).val();
        var product_title = $('#product_title_'+a).val();
        var product_image = $('#product_image_'+a).val();
        var product_slug = $('#product_slug_'+a).val();
        var product_type = $('#product_type_'+a).val();
        var product_category = $('#product_category_'+a).val();
        var product_sub_category = $('#product_sub_category_'+a).val();
        var product_price = $('#product_price_'+a).val();
        var product_qty = $('#qty_'+a).val();
        $.ajax({
            url: "{{ route('shopping-cart.add') }}",
            type: 'POST',
            data: {_token:'{{csrf_token()}}',
            product_id: product_id,
            product_code: product_code,
            product_title: product_title,
            product_image: product_image,
            product_slug: product_slug,
            product_type: product_type,
            product_category: product_category,
            product_sub_category: product_sub_category,
            product_price: product_price,
            product_qty: product_qty},

            success: function(data){

                $('.cart_total_product').html(data);
            }
        });

    });


    $(document).ready(function() {
        var options = {
            minValue: 1,
            step: 1,
            inputWidth: 50,
            start: 1,
            plusClick: function(val) {
                console.log(val);
            },
            minusClick: function(val) {
                console.log(val);
            },
            exceptionFun: function(val) {
                console.log("excep: " + val);
            },
            valueChanged: function(val) {
                console.log('change: ' + val);
            }
        }
        $(".demo").WanSpinner(options).css();
    });
</script>
