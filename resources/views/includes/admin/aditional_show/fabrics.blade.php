<div class="panel panel-default">
    <div class="panel-body">
        <table class="table no-border">
            <tr>
                <td colspan="3">
                    <h3 class="text-center">{{ $product->title }}</h3>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    @foreach ($product->images as $image)
                        <img class="img-thumbnail" src="{{ $image->image }}">
                    @endforeach
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <h3>Product Deatials</h3>
                    <hr>
                </td>
            </tr>
            <tr>
                <td width="10%">Type</td>
                <td width="1%">:</td>
                <td>{{ $product->type->type }}</td>
            </tr>
            <tr>
                <td width="10%">Category</td>
                <td width="1%">:</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            <tr>
                <td width="10%">Sub Category</td>
                <td width="1%">:</td>
                <td>{{ $product->subCategory->name }}</td>
            </tr>
            <tr>
                <td width="10%">Brand</td>
                <td width="1%">:</td>
                <td><img width="20" src="{{ $product->brand->icon }}"> {{ $product->brand->name }}</td>
            </tr>
            <tr>
                <td width="10%">Size</td>
                <td width="1%">:</td>
                <td>
                    @foreach ($product->sizes as $size)
                        {{ $size->size->size }}, 
                    @endforeach
                </td>
            </tr>

            <tr>
                <td width="10%">Color</td>
                <td width="1%">:</td>
                <td>
                    @foreach ($product->colors as $color)
                        <span style="border:1px solid black; background-color: {{ $color->color->color }};padding: 3px 11px 3px 11px;"></span> &nbsp;&nbsp;{{ $color->color->name }},&nbsp;&nbsp; 
                    @endforeach
                </td>
            </tr>
            <tr>
                <td width="10%">Barcode</td>
                <td width="1%">:</td>
                <td>
                    {{ $product->barcode }}
                </td>
            </tr>
            <tr>
                <td width="10%">Price (BDT)</td>
                <td width="1%">:</td>
                <td>
                    {{ $product->price }} TK
                </td>
            </tr>
            <tr>
                <td width="10%">Description</td>
                <td width="1%">:</td>
                <td>
                    {!! $product->description !!}
                </td>
            </tr>
            <tr>
                <td width="10%">Key Features</td>
                <td width="1%">:</td>
                <td>
                    {!! $product->key_features !!}
                </td>
            </tr>
        </table>
    </div>
</div>
