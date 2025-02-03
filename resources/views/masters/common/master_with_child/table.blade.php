<table id="datatable" class="table table-hover dt-responsive align-middle mb-0 nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead class="bg-prime">
        <tr>
            <th>{{ __('common.code') }}</th>
            <th>{{ __('common.names') }}</th>
            <th>{{ __('common.' . $parent . '') }}</th>
            <th>{{ __('common.description') }}</th>
            <th>{{ __('common.created_by') }}</th>
            <th>{{ __('common.created_at') }}</th>
            <th>{{ __('common.action') }}</th>
        </tr>
    </thead>
    <tbody id="myTable">
        @foreach ($data as $master_data)
            <tr>
                <td>{{ Str::limit($master_data?->code, 20) }}</td>  
                <td>{{ Str::limit($master_data?->name, 20) }}</td>                 
                <td>{{ Str::limit($master_data?->$parent?->name, 20) }}</td>
                <td>{{ Str::limit($master_data?->description, 20) }}</td>
                <td>{{ $master_data?->creator?->name }}</td>
                <td>{{ $master_data?->created_at }}</td>
                <td class="text-alternate">@php echo App\Helpers\MasterHelper::master_action_button($master_data?->id); @endphp</td>
            </tr>
        @endforeach
    </tbody>
</table>
