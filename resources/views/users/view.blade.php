@extends('layouts.master')
@section('title')
   {{__('company.user-view')}}
@endsection
@section('page-title')
    <!-- dashboard-->
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection 
@section('content')

    <div id="main-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    @php echo App\Helpers\MasterHelper::header_title_one('company.user-view','user-list'); @endphp
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-body">
                    <h3>{{ __('common.user') }}</h3>                    
                    <div class="container mt-4">
                        <div> {{ __('common.code') }} : {{ $user?->code }} </div>
                        <div> {{ __('company.emp-name') }} : {{ $user?->name }} </div>
                        <div> {{ __('common.email') }} : {{ $user?->email }} </div>                        
                        <div> {{ __('customer.dob') }} : {{ $user?->dob }} </div>                        
                        <div> {{ __('common.status') }} : {{ $user?->status }} </div>                        
                        <div> {{ __('customer.city') }} : {{ $user?->city }} </div>                        
                        <div> {{ __('customer.post-box') }} : {{ $user?->post_box }} </div>                        
                        <div> {{ __('common.Country') }}  : {{ $user?->country?->name }} </div>                        
                        <div> {{ __('common.address') }} : {{ $user?->address }} </div>                        
                         <div> {{ __('common.role') }} : 
                            @foreach ($userRole as $role)
                                {{ $role }} , 
                            @endforeach 
                        </div> 

                        <div> {{ __('common.company') }} : 
                            @foreach($companies as $cmp)
                            <span class="ml-5">{{$cmp?->code}} - {{$cmp?->name}} , </span> 
                            @endforeach
                        </div>
                    </div>



                    @if($user?->profile_img)
                        <div class="new-logo ms-auto"> <a target="_blank" href="{{document_path($user?->profile_img)}}"> <img src="{{document_path($user?->profile_img)}}" height="50" width="50"> </a> </div>
                    @endif

                     <div class="mt-4 float-right">
                    <a href="{{ route('user-edit',['id' => base64_encode(convert_uuencode($user->id))]) }}" class="btn btn-primary btn-sm waves-effect" style="margin-right: 10px;"><i class="mdi mdi-pencil-outline me-2 text-muted"></i> Edit</a>
                    <a href="{{ route('user-list') }}" class="btn btn-primary btn-sm waves-effect cancel" id="back-button">Cancel</a>

                </div>
                </div>
               
            </div>
        </div>
    </div> 
    @endsection 


 