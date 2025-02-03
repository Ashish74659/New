<table id="datatable" class="table table-hover dt-responsive align-middle mb-0 nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead class="bg-prime">
        <tr>
            <th>{{ __('common.names') }} </th>
            <th>{{ __('common.email') }} </th> 
            <th>{{ __('common.type') }}</th>
            <th>{{ __('common.role') }}</th>
            <th>{{ __('common.status') }}</th>
            <th>{{ __('common.action') }}</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $user)
            <tr>
                <td>{{ $user?->name }}</td>
                <td>{{ $user?->email }}</td> 
                <td>{{ $user?->type }}</td>
                <td>
                    @foreach ($user?->roles as $role)
                        <span class="btn btn-primary btn-sm waves-effect" style="color:white">{{ $role?->name }}</span>
                    @endforeach
                </td>
                <td>@php echo App\Helpers\MasterHelper::status_check($user->status); @endphp</td>                
                <td>
                    @php echo App\Helpers\MasterHelper::action_header(); @endphp
                    @php echo App\Helpers\MasterHelper::action_button('user-view',$user?->id,'common.view','mdi mdi-eye-outline font-size-16 align-middle me-2 text-muted'); @endphp
                    @php echo App\Helpers\MasterHelper::action_button('user-edit',$user?->id,'common.edit','mdi mdi-pencil-outline font-size-16 align-middle me-2 text-muted'); @endphp
                    @php echo App\Helpers\MasterHelper::action_footer(); @endphp
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
