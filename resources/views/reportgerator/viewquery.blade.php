@extends('layouts.master')
@section('title')
{{ __('common.report-generator') }}
@endsection
@section('page-title')
@endsection
@section('body')

<body data-sidebar="colored">
    @endsection
    @section('content')
    <div class="container">
        <h4>{{ __('common.report-view') }}</h4>
        <table class="table table-striped" id="datatable-buttons">
            <thead class="bg-light">
                <tr class=" table table-striped">
                    @foreach($child as $chi)
                        <th>
                            {{ $chi->tbl_header }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @php
                    $i =0;
                @endphp 
                @foreach($result as $res )
                    <tr>
                        @foreach($child as $chi)
                            @if($chi?->relation)
                                <td> {{ $res?->{$chi?->colums_name}?->{$chi?->relation} }}</td>
                            @else
                            <td>
                                {{ isset($res) && isset($chi) ? $res->{$chi->colums_name} : 'N/A' }}
                            </td>

                            @endif
                        @endforeach
                    </tr>
                @endforeach
                 
            </tbody>
        </table>

    </div>

    @endsection
    @section('scripts')


    @endsection
