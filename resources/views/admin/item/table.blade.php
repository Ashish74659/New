<table id="datatable" class="table table-hover dt-responsive align-middle mb-0 nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

    <thead class="bg-prime">
        <tr>
            <th>{{ __('item.item-code') }}</th>
            <th>{{ __('common.name') }}</th>
            <th>{{ __('common.Category') }}</th>
            <th>{{ __('common.SubCategory') }}</th>
            <th>{{ __('common.UOM') }}</th> 
            <th>{{ __('common.status') }}</th>
            <th>{{ __('common.action') }}</th>
        </tr>
    </thead>
    <tbody id="myTable">
        @foreach ($data as $dat)
            <tr>
                <td> <a href="{{ route('item-edit', ['id' => base64_encode(convert_uuencode($dat->id))]) }}">{{ $dat->code }}</a> </td>
                <td>{{ $dat->name }}</td>
                <td>{{ $dat?->category?->name }}</td>
                <td>{{ $dat?->subcategory?->name }}</td>
                <td>{{ $dat?->uom?->name }}</td>                  
                <td>@php echo App\Helpers\MasterHelper::status_check($dat->status); @endphp</td>
                <td>
                    @php echo App\Helpers\MasterHelper::action_header(); @endphp
                    @php echo App\Helpers\MasterHelper::action_button('item-edit',$dat->id,'common.edit','mdi mdi-pencil-outline font-size-16 align-middle me-2 text-muted'); @endphp
                    @php echo App\Helpers\MasterHelper::action_footer(); @endphp
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
