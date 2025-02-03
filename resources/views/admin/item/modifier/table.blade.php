<table id="datatable" class="table table-hover dt-responsive align-middle mb-0 nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

    <thead class="bg-prime">
        <tr>
            <th>{{ __('common.code') }}</th>        
            <th>{{ __('common.names') }}</th>                       
            <th>{{ __('common.description') }}</th>
            <th>{{ __('common.status') }}</th>
            <th>{{ __('common.action') }}</th>
        </tr>
    </thead>
    <tbody id="myTable">
        @foreach ($data as $dat)
                <tr>
                    <td> <a href="{{ route('modifier-edit',['id'=>base64_encode(convert_uuencode($dat->id))]) }}">{{ $dat->code }}</a> </td>
                    <td>{{ $dat->name }}</td>
                    <td>{{ Str::of($dat?->description)->limit(25) }}</td>					 
                    <td> @php echo App\Helpers\MasterHelper::status_check($dat->status); @endphp </td>                										 
                    <td>
                    @php echo App\Helpers\MasterHelper::action_header(); @endphp
					@php echo App\Helpers\MasterHelper::action_button('modifier-edit',$dat->id,'common.edit','mdi mdi-pencil-outline font-size-16 align-middle me-2 text-muted'); @endphp                                                           
                    <li> <span class="dropdown-item" onclick="delete_by_url('modifier-delete','{{base64_encode(convert_uuencode($dat->id))}}')" ><i class="mdi mdi-trash-can-outline font-size-16 align-middle me-2 text-muted"></i>  {{ __('common.delete') }} </span></li>                     
                    @php echo App\Helpers\MasterHelper::action_footer(); @endphp
                    </td>                     
                </td>
					
                </tr>
            @endforeach
    </tbody>
</table>
