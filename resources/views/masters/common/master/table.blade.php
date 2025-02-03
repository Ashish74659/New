<table id="datatable" class="table table-hover dt-responsive align-middle mb-0 nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead class="bg-prime">
        <tr>
            @if ($mod == 'Budget' || $mod == 'CostCenter' || $mod == 'BusinessUnit')
                <th>{{ __('common.code') }}</th>
            @else
                @if ($mod == 'Tax' || $mod == 'Discount')
                    <th>{{ __('common.' . $mod . '-name') }}</th>
                @else
                    <th>{{ __('common.names') }}</th>
                @endif
            @endif
            @if ($mod == 'RatingCriteria' || $mod == 'Project' || $mod == 'Currency')
                <th>{{ __('common.' . $mod . '-code') }}</th>
            @endif
            @if ($mod == 'Checklist')
                <th>{{ __('common.' . $mod . '-apply-on') }}</th>
            @endif

            @if ($mod == 'Currency')
                <th>{{ __('common.' . $mod . '-symbol') }}</th>
            @else
                <th>{{ __('common.description') }}</th>
            @endif
            <th>{{ __('common.created_by') }}</th>
            <th>{{ __('common.created_at') }}</th>
            <th>{{ __('common.action') }}</th>
        </tr>
    </thead>
    <tbody id="myTable">
        @foreach ($data as $master_data)
            <tr>
                <td>{{ $master_data?->name }} @if ($mod == 'Tax' || $mod == 'Discount')
                        %
                    @endif
                </td>
                @if ($mod == 'RatingCriteria' || $mod == 'Project' || $mod == 'Currency')
                    <td>{{ $master_data?->code }} @if ($mod == 'RatingCriteria')
                            %
                        @endif
                    </td>
                @endif
                @if ($mod == 'Checklist')
                    <td>{{ $master_data?->apply_on }}</td>
                @endif

                @if ($mod == 'Currency')
                    <td>{{ $master_data?->symbol }}</td>
                @else
                    @if ($mod == 'Question')
                        <td>{{ Str::of($master_data?->description)->limit(90) }}</td>
                    @else
                        <td>{{ Str::of($master_data?->description)->limit(25) }}</td>
                    @endif
                @endif
                <td>{{ $master_data?->creator?->name }}</td>
                <td>{{ $master_data?->created_at }}</td>
                @if ($mod == 'ServiceGroup')
                    <td class="text-alternate">
                        @php echo App\Helpers\MasterHelper::action_button_for_all(['common.view','common.view-service-items','common.delete'],['','service-item-list-by-id',''],$master_data?->id); @endphp</td>
                @else
                    <td class="text-alternate">@php echo App\Helpers\MasterHelper::master_action_button($master_data?->id); @endphp</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
