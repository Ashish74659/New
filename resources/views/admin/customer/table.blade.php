<table id="datatable" class="table table-hover dt-responsive align-middle mb-0 nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

    <thead class="bg-prime">
        <tr>
            <th>{{ __('common.code') }}</th>
            <th>{{ __('common.name') }}</th>
            <th>{{ __('common.address') }}</th>
            <th>{{ __('customer.phone-no') }}</th>
            <th>{{ __('common.email') }}</th>
            <th>{{ __('customer.customer-type') }}</th>

            <th>{{ __('common.status') }}</th>
            <th>{{ __('common.action') }}</th>
        </tr>
    </thead>
    <tbody id="myTable">
        @foreach ($data as $dat)
            <tr>
                <td> <a href="{{ route('customer-edit', ['id' => base64_encode(convert_uuencode($dat->id))]) }}">{{ $dat->code }}</a> </td>
                <td>{{ $dat->name }}</td>
                <td>{{ Str::of($dat?->address)->limit(25) }}</td>	                
                <td>{{ $dat?->phone_no }}</td>
                <td>{{ $dat?->email }}</td>
                <td><span class="badge badge-outline-warning">{{ $dat?->customer_type }}</span></td>
                <td>@php echo App\Helpers\MasterHelper::status_check($dat->status); @endphp</td>
                <td>
                    @php echo App\Helpers\MasterHelper::action_header(); @endphp
                    @php echo App\Helpers\MasterHelper::action_button('customer-edit',$dat->id,'common.edit','mdi mdi-pencil-outline font-size-16 align-middle me-2 text-muted'); @endphp
                    @php echo App\Helpers\MasterHelper::action_footer(); @endphp
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
