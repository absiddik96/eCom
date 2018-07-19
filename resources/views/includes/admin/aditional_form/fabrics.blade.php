{{Form::open(['route'=>'product.store','method'=>'post', 'enctype' => 'multipart/form-data'])}}
    <div class="panel panel-default">
        <div class="panel-body">
            @include('errors.error')

            {{-- left part --}}
            <div class="col-md-8">
                <div class="form-group">
                    {!! Form::label('title', 'Title', ['class'=>'control-label']) !!}
                    <div>
                        {!! Form::text('title', null, ['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description', ['class'=>'control-label']) !!}
                    <div>
                        {!! Form::textarea('description', null, ['class'=>'form-control summernote','size'=> '5x3']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('key_features', 'Key Features', ['class'=>'control-label']) !!}
                    <div>
                        {!! Form::textarea('key_features', null, ['class'=>'form-control summernote','size'=> '5x3']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('product_image', 'Product Image', ['class'=>'control-label']) !!}
                    <div>
                        <input name="product_image[]" type="file" multiple class="file" data-preview-file-type="any"/>
                    </div>
                </div>
            </div>

            {{-- right part --}}
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('size', 'Size', ['class'=>'control-label']) !!}
                    <div>
                        <select name="size[]" class="form-control select" data-live-search="ture" multiple>
                            @foreach ($sizes as $s)
                                <option value="{{ $s->id }}">{{ $s->size }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('color', 'Color', ['class'=>'control-label']) !!}
                    <div>
                        <select name="color[]" class="form-control select" data-live-search="ture" multiple>
                            @foreach ($colors as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('category', 'Category', ['class'=>'control-label']) !!}
                    <div>
                        <select id="category" name="category" class="form-control select" data-live-search="ture" onChange="get_sub_category(this.value);">
                            <option value="">Choose</option>
                            @foreach ($categories as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('sub_category', 'Sub Category', ['class'=>'control-label']) !!}
                    <div>
                        <select id="sub_category" name="sub_category" class="form-control">
                            <option value="">Choose</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('brand', 'brand', ['class'=>'control-label']) !!}
                    <div>
                        <select id="brand" name="brand" class="form-control select" data-live-search="ture">
                            <option value="">Choose</option>
                            @foreach ($brands as $b)
                                <option value="{{ $b->id }}">{{ $b->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('barcode', 'Barcode', ['class'=>'control-label']) !!}
                    <div>
                        {!! Form::text('barcode', null, ['class'=>'form-control','id'=>'barcode']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Price (BDT)', ['class'=>'control-label']) !!}
                    <div>
                        <div class="input-group">
                            <input name="price" type="number" class="form-control"/>
                            <span class="input-group-addon">৳</span>
                        </div>
                    </div>
                </div>

                {{-- hidden input --}}
                    <input type="hidden" name="type_id" value="{{ $type->id }}">
                    <input type="hidden" name="type_slug" value="{{ $type->slug }}">
                {{-- hidden input --}}
            </div>
        </div>

        <div class="panel-footer">
            <div class="pull-right">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    </div>
{{Form::close()}}