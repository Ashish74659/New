@extends('layouts.master')
@section('title')
    {{ __('item.item-add') }}
@endsection
@section('page-title')
@endsection
@section('css')
    @include('layouts.select2css')
@endsection
@section('body')

    <body data-sidebar="colored">
    @endsection
    @section('content')
        @php echo App\Helpers\MasterHelper::header_title_one('item.item-add', 'item-list'); @endphp
        <div class="settings-pg-header"></div>
        <form action="{{ route('item-store') }}" class="custom-validation" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="item_id" @if ($data) value="{{ base64_encode(convert_uuencode($data?->id)) }}" @endif>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-bod">
                        <div class="card-body">
                            <div>
                                <div class="setting-title">
                                    <h4>{{ __('item.gen-details') }}</h4>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('item.pro-code') }}</label>
                                            <input type="text" class="form-control" name="code"
                                                onKeyPress="return $.alpha_num_space_period();" required
                                                value="{{ $data?->code }}"
                                                @if ($data) readonly @endif>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('item.pro-name') }}</label>
                                            <input type="text" class="form-control" name="name"
                                                onKeyPress="return $.alpha_num_space_period();" required
                                                value="{{ $data?->name }}"
                                                @if ($data) readonly @endif>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('item.sku') }}</label>
                                            <input type="text" class="form-control" value="{{ $data?->sku }}"
                                                name="sku" onKeyPress="return $.alpha_num_space_period();" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 error-bottom">
                                            <label class="form-label">{{ __('common.UOM') }}</label>
                                            <select class="form-control select2" name="uom_id" required>
                                                <option value="">{{ __('common.select') }}</option>
                                                @foreach ($uom as $uoms)
                                                    <option value="{{ $uoms->id }}"
                                                        @if ($data?->uom_id == $uoms->id) selected @endif>
                                                        {{ $uoms->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="mb-3 error-bottom">
                                            <label class="form-label">{{ __('common.Category') }}</label>
                                            <select class="form-control select2" name="category_id" id="category"
                                                onchange="$.getsubcategory()" required>
                                                <option value="">{{ __('common.select') }}</option>
                                                @foreach ($category as $ctgs)
                                                    <option value="{{ $ctgs->id }}"
                                                        @if ($data?->category_id == $ctgs->id) selected @endif>
                                                        {{ $ctgs->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('common.SubCategory') }}</label>
                                            <select class="form-control select2" name="subcategory_id" id="subcategory" required> </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('item.barcode') }} </label>
                                            <input type="text" name="barcode" value="{{ $data?->barcode }}"
                                                class="form-control" onKeyPress="return $.alpha_num_space_period();"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('item.addons') }} </label>
                                            <select class="form-control select2" name="modifier_header_id">
                                                <option value="">{{ __('common.select') }}</option>
                                                @foreach ($modifier as $ad_on)
                                                    <option value="{{ $ad_on->id }}"
                                                        @if ($data?->modifier_header_id == $ad_on->id) selected @endif>
                                                        {{ $ad_on->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    


                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label"> </label>
                                            <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                <input class="form-check-input" type="checkbox" name="weight_with_scale"
                                                    value="Yes" @if ($data?->weight_with_scale == 'Yes') checked @endif>
                                                <label class="form-check-label"
                                                    for="weight_with_scale">{{ __('item.weightscale') }} </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label"> </label>
                                            <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                <input class="form-check-input" type="checkbox" name="is_pos"
                                                    value="Yes" @if ($data?->is_pos == 'Yes') checked @endif>
                                                <label class="form-check-label" for="is_pos">{{ __('item.pos') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>                                   

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('common.file') }} </label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" aria-label="file example"
                                                    name="image" onChange="validateFile(this,'image',1);"
                                                    accept="image/*">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('common.status') }} </label>
                                            <select class="form-control select2" name="status">
                                                <option value="">{{ __('common.select') }}</option>                                                 
                                                <option value="Active" @if ($data?->status == "Active") selected @endif> Active</option> 
                                                <option value="Inactive" @if ($data?->status == "Inactive") selected @endif> Inactive</option> 
                                            </select>
                                        </div>
                                    </div>

                                    @if ($data?->image)
                                        <div class="new-logo ms-auto"> <a target="_blank" href="{{document_path($data?->image)}}"> <img src="{{document_path($data?->image)}}" height="50" width="50"> </a> </div>
                                    @endif

                                    <div class="d-flex justify-content-between border-bottom mb-3 pb-3">
                                        <div class="mt-4">
                                            <h6>{{ __('item.prod-qual') }} </h6>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-sm btn-primary"
                                                onclick="$.addRowButton()">
                                                <i class="mdi mdi-plus-circle"></i> {{ __('common.add') }}
                                            </button>
                                        </div>
                                    </div>


                                    <div class="table-responsive">
                                        <table id="datatable"
                                            class="table table-borderless table-centered align-middle table-nowrap mb-0"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
         
                                            <thead class="bg-prime">
                                                <tr>
                                                    <th>{{ __('common.Warehouse') }}</th>
                                                    <th>{{ __('common.Company') }}</th>
                                                    <th>{{ __('item.sell-price') }}</th>
                                                    <th>{{ __('common.Discount') }}</th>
                                                    <th>{{ __('item.product-quantity') }}</th>
                                                    <th>{{ __('item.alert-quantity') }}</th> 
                                                    <th>{{ __('common.Tax') }}</th>
                                                    <th>{{ __('item.selling-price-tax-type') }}</th>
                                                    <th>{{ __('item.not-for-selling') }}</th>
                                                    <th>{{ __('common.action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody id="company_product"> 
                                            @if ($data_line && count($data_line) > 0)
                                            @foreach ($data_line as $line) 
                                            <tr>                                                
                                                <td><select class="form-control" name="warehouse_id[]" required><option value="{{ $line?->warehouse_id }}"> {{ $line?->warehouse?->name }}</option></select></td>
                                                <td><select class="form-control" name="comy_id[]"><option value="{{ $line?->comy_id }}"> {{ $line?->comy?->name }}</option></select></td>
                                                <td><input type="text" class="form-control" value="{{ $line?->selling_price }}" name="selling_price[]" onKeyPress="return $.numeric_period();" required></td>
                                                <td><select class="form-control" name="discount_per[]"><option value="{{ $line?->discount_per }}">@if($line?->discount_per) {{ $line?->discount_per }} @else 0 @endif % </option></select></td>
                                                <td><input type="text" class="form-control" value="{{ $line?->product_quantity }}" name="product_quantity[]" onKeyPress="return $.numeric_period();" required></td>
                                                <td><input type="text" class="form-control" value="{{ $line?->alert_quantity }}" name="alert_quantity[]" onKeyPress="return $.numeric_period();"></td>
                                                <td><select class="form-control" name="tax_per[]"><option value="{{ $line?->tax_per }}"> @if($line?->tax_per) {{ $line?->tax_per }} @else 0 @endif %  </option></select></td>
                                                <td><select class="form-control" name="selling_price_tax_type[]">
                                                    <option value=""></option>
                                                    <option value="Exclusive" @if($line?->selling_price_tax_type == 'Exclusive') selected @endif>Exclusive</option>
                                                    <option value="Inclusive" @if($line?->selling_price_tax_type == 'Inclusive') selected @endif>Inclusive</option>
                                                </select>
                                                </td>
                                                <td><input type="hidden" name="check_box_val[]" value="{{$loop->iteration}}"><div class=" form-switch"> <input class="form-check-input" name="not_for_selling[]" value="{{$loop->iteration}}" @if($line?->not_for_selling == "Yes") checked @endif type="checkbox"> </div> </td>
                                                <td> <i class="mdi mdi-trash-can-outline text-danger font-size-18" onclick="$.delete_company_item(this,{{$line?->id}})"></i></td>
                                            </tr> 
                                            @endforeach
                                        @endif
                                            </tbody>
                                        </table>
                                    </div>
 
                                </div>
                            </div>
                            <hr>
 
                            <div class="col-lg-12 text-end mb-3">
                                <a href="{{ route('item-list') }}"><button type="button" class="btn btn-sm btn-outline-dark">{{ __('common.cancel') }} </button></a>
                                <button type="submit" value="create" name="save" class="btn btn-sm btn-primary">{{ __('common.create') }}</button>
                                <button type="submit" value="create_another" name="save" class="btn btn-sm btn-primary">{{ __('common.create-another') }}</button>
                            </div>                            

                        </div>

                    </div>

                </div>



            </div>
        </form>
    @endsection

    @section('scripts')
        @include('keystroke')
        @include('admin.item.extrajs')
        @include('layouts.select2js')
        @include('layouts.formvalidationjs')
    @endsection
