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
                    {!! Form::label('product_img', 'Product Image', ['class'=>'control-label']) !!}
                    <div>
                        <input name="product_img[]" type="file" name="ssi-upload" multiple id="ssi-upload"/>
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
            </div>
        </div>

        <div class="panel-footer">
            <div class="pull-right">
                {!! Form::submit('Get', ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    </div>
{{Form::close()}}