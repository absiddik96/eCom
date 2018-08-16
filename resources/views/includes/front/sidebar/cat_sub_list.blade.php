@if (!empty($type) && $type->categories->count())
<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">Categories</h3>
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">
            @foreach ($type->categories as $cat)
                <li>
                    <a href="{{ route('product_list.cat',[$cat->type->slug,$cat->slug]) }}">{{ $cat->name }} <span class="badge pull-right">{{ $cat->products->count() }}</span></a>
                    <ul>
                        @if ($cat->subCategories->count())
                            @foreach ($cat->subCategories as $sub_cat)
                                <li><a href="{{ route('product_list.sub_cat',[$sub_cat->type->slug,$sub_cat->category->slug,$sub_cat->slug]) }}">{{ $sub_cat->name }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endif


