<table id="datatable" class="table table-hover dt-responsive align-middle mb-0 nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead class="bg-prime">
        <tr>
            <th>{{ __('common.EmailMaster') }}</th>
            <th>{{ __('email.subject') }}</th>
            <th>{{ __('common.created_by') }}</th>
            <th>{{ __('common.created_at') }}</th>
            <th>{{ __('common.action') }}</th>
        </tr>
    </thead>
    <tbody id="myTable">
        @foreach ($data as $datas)
            <tr>
                <td>{{ $datas?->email_master?->name }}</td>
                <td>{{ Str::of($datas?->subject)->limit(25) }}</td>
                <td>{{ $datas?->creator?->name }}</td>
                <td>{{ $datas?->created_at }}</td>
                <td>
                    @php echo App\Helpers\MasterHelper::action_header(); @endphp
                    @php echo App\Helpers\MasterHelper::action_button('email-template-add',$datas->id,'common.edit','mdi mdi-pencil-outline font-size-16 align-middle me-2 text-muted'); @endphp
                    @php echo App\Helpers\MasterHelper::action_footer(); @endphp
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
