<table id="datatable" class="table table-hover dt-responsive align-middle mb-0 nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

    <thead class="bg-prime">
            <tr>
                <th>{{ __('common.code') }}</th>
                <th>{{ __('company.company-name') }}</th>
				 <th>{{ __('company.company-type') }}</th>
				  <th>{{ __('common.Currency') }}</th>
                 <th>{{ __('common.status') }}</th>
                <th>{{ __('common.action') }}</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($campany as $data)
                <tr>
                    <td> <a href="{{ route('company-edit',['id'=>base64_encode(convert_uuencode($data->id))]) }}">{{ $data->code }}</a> </td>
                    <td>{{ $data->name }}</td>
                    <td>@php echo App\Helpers\MasterHelper::status_check($data->pos_type?->name); @endphp</td>                    				                                                          
                    <td>{{ $data->currency?->symbol }}</td>
                    <td>  
                        @php echo App\Helpers\MasterHelper::status_check($data->status); @endphp
                    </td>                										
					 <td>
                    @php echo App\Helpers\MasterHelper::action_header(); @endphp
					@php echo App\Helpers\MasterHelper::action_button('company-edit',$data->id,'common.edit','mdi mdi-pencil-outline font-size-16 align-middle me-2 text-muted'); @endphp                                                           
                    <li> <span class="dropdown-item" onclick="delete_by_url('company-delete','{{base64_encode(convert_uuencode($data->id))}}')" ><i class="mdi mdi-trash-can-outline font-size-16 align-middle me-2 text-muted"></i>  {{ __('common.delete') }} </span></li>                     
                    @php echo App\Helpers\MasterHelper::action_footer(); @endphp
                     
                </td>
					
                </tr>
            @endforeach
        </tbody>
    </table>
