<div class="tabbed">
    @php
        $p = Request::segment(2);
        $product_id = Request::segment(3);
    @endphp
    <ul>
        <a href="{!! route('product-image.create', $product_id) !!}"><li {!! $p=='product-image'? 'class="active"' : '' !!}>Image</li></a>
        <a href="{!! route('product-weight.create', $product_id) !!}"><li {!! $p=='product-weight'? 'class="active"' : '' !!}>Weight</li></a>
        <a href="{!! route('product-color.create', $product_id) !!}"><li {!! $p=='product-color'? 'class="active"' : '' !!}>Color</li></a>
        <a href="{!! route('product-size.create', $product_id) !!}"><li {!! $p=='product-size'? 'class="active"' : '' !!}>Size</li></a>
        <a href="{!! route('product-price.create', $product_id) !!}"><li {!! $p=='product-price'? 'class="active"' : '' !!}>Price</li></a>
        <a href="{!! route('product.details.create', $product_id) !!}"><li {!! $p=='product-details'? 'class="active"' : '' !!}>Add Product</li></a>
    </ul>
</div>
