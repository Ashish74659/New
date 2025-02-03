<div class="modal fade redeem" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> {{ __('pos.loyality-redeem') }}  </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
  
                <div class="row">
                    <div class="col-md-6 mb-3 d-flex justify-content-between align-items-center">
                        <h6>{{ __('pos.loyalty-points') }} :</h6> 
                        <h6>{{$order?->customer?->loyality_point}}</h6>
                    </div>

                    <div class="col-md-6 mb-3 d-flex justify-content-between align-items-center">
                        <h6>{{ __('pos.loyalty-value') }} :</h6>
                        <h6>{{$order?->company?->loyalty_value}}</h6>
                    </div>

                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">{{ __('pos.redeem-points') }} : </h6>
                        <input id="redeem_points" onblur="$.maxvalue_value({{$order?->customer?->loyality_point}},this)" onKeyPress="return $.numeric();" type="text" class="form-control form-control-sm" style="width: 60%;">                        
                    </div>

                    <div class="col-md-12 text-end mt-3">
                        <button type="button" onclick="$.reedem_now()" class="btn btn-primary btn-sm">{{ __('pos.redeem') }}</button>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>