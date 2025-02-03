@extends('layouts.master')
@section('title')
    {{__('common.All-Notifications')}}
@endsection
@section('page-title')
    <!-- dashboard-->
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection
    @include('common-components.pages-heads')
    @section('content')
        @php echo App\Helpers\MasterHelper::header_title_one('common.All-Notifications','dashboard'); @endphp
        @php
            $id=Auth::user()->id;
            $allnotify= App\Models\CustomNotifications::withTrashed()->where('user_id',$id)->latest()->get();
               
        @endphp
        @forelse ($allnotify as $notify)
        <div class="row">
            <div class="col-xl-12">
                <div class="card">

                    <div class="card-body pt-2">
                       <div data-simplebar style="max-height: 230px;" class="m-2">
                        <div class="d-flex">
                            <div class="avatar-xs me-3 ms-3">
                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                    <i class="mdi mdi-bell-ring"></i>
                                </span>
                            </div>
                            <div class="flex-1">
                                <a href="{{$notify?->url}}"><h6 class="mb-1 font-size-16">{{$notify->message}} </h6></a>
                                <div class="font-size-12 text-muted">
                                    <p class="mb-2"><i class="mdi mdi-clock-outline"></i> {{ App\Helpers\Helpers::getTimeAgo($notify?->created_at) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        @endforelse
        <!-- END ROW -->
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        
    @endsection
