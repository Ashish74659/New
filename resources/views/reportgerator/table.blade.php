<table id="datatable" class="table table-hover nowrap" style="border-collapse: collapse; border-spacing:0;width:100%;">
    <thead class="bg-light">
        <tr>
            <th>{{ __('common.name') }}</th>
            <th>{{ __('common.action') }}</th>


        </tr>
    </thead>
    <tbody >
        @foreach($data as $daata)
        <tr>
            <td>{{$daata->name}}</td>
            <td>
            @canany('Execute Generate Query')
            <a href="{{route('excecute.query',['id'=>base64_encode(convert_uuencode($daata->id))])}}" class="btn btn-primary btn-sm">Excecute</a>
            @endcanany
            @canany('Delete Generate Query')
                <button data-id="{{base64_encode(convert_uuencode($daata->id))}}" class="btn btn-primary btn-sm delete_query">Delete</button>
            @endcanany
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

