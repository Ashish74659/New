
 
<div class="offcanvas offcanvas-end" tabindex="-1" id="View-contact-modal" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header bg">
        <h5 class="mb-0">{{ __('common.edit-' . $mod . '') }} </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">


            <div class="mb-3">
                <div class="text-end">
               <a title="Edit" class="cursor"> <span class="edit-btn enable_edit"> <i class="mdi mdi mdi-square-edit-outline text-secondary font-size-20"></i></span></a>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="mb-2">{{ __('common.' . $mod . '-name') }}</label>
                <div class=" filled w-100 d-flex flex-column">
                    <i data-acorn-icon="user"></i>
                    <input type="hidden" class="form-control"
                        id="master_id_edit" />
                    <input class="form-control" placeholder="{{ __('common.' . $mod . '-name') }}"
                        id="master_name_edit" disabled="" />
                </div>
            </div>

            @if ($mod == 'Site' || $mod == 'Currency' || $mod == 'RatingCriteria')
                <div class="mb-3">
                    <label for="" class="mb-2">{{ __('common.' . $mod . '-code') }}</label>
                    <div class=" filled w-100 d-flex flex-column">
                        <i data-acorn-icon="user"></i>
                        <input class="form-control form-enable" placeholder="{{ __('common.' . $mod . '-code') }}"
                            id="master_code_edit" disabled="" />
                    </div>
                </div>
            @endif    

            @if($mod == 'Currency')
                <div class="mb-3">
                    <label for="" class="mb-2">{{ __('common.' . $mod . '-symbol') }}</label>
                    <div class=" filled w-100 d-flex flex-column">
                        <i data-acorn-icon="user"></i>
                        <input class="form-control form-enable"  id="master_symbol_edit" disabled="" />
                    </div>
                </div>
            @endif    
            
            @if ($mod == 'Checklist')
            <div class="mb-3">
                <label for="" class="mb-2">{{ __('common.' . $mod . '-apply-on') }}</label>                                 
            </div>
            @endif

            <div class="mb-3">
                <label for="" class="mb-2">{{ __('common.description') }}</label>
                <div class=" filled w-100 d-flex flex-column">
                    <i data-acorn-icon="info-circle"></i>
                    <textarea id="master_description_edit" class="form-control form-enable" cols="30" rows="3"
                        placeholder="{{ __('common.description') }}" disabled="" /></textarea>
                </div>
            </div>
            
        </div>
       <div class="offcanvas-footer pb-4 ps-3 pe-3">
        <div class="text-end">

                <button type="reset" class="btn btn-secondary btn-sm waves-effect" data-bs-dismiss="offcanvas">
                    {{ __('common.close') }} </button>
                <button type="submit" class="btn btn-primary btn-sm waves-effect  master_update">
                    {{ __('common.update') }}
                </button>

        </div>

    </div>
</div>




 


<div class="offcanvas offcanvas-end" tabindex="-1" id="Add-contact-modal" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header bg">
        <h5 class="mb-0">{{ __('common.add-' . $mod . '') }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">


        <div class="mb-3">
            <label for="" class="mb-2">{{ __('common.' . $mod . '-name') }}</label>
            <div class=" filled w-100 d-flex flex-column">
                <i data-acorn-icon="user"></i>
                <input class="form-control" id="master_name" onkeypress="return $.alpha_num_space_period();" />
            </div>
        </div>

        @if ($mod == 'Site' || $mod == 'Currency' || $mod == 'RatingCriteria')
            <div class="mb-3">
                <label for="" class="mb-2">{{ __('common.' . $mod . '-code') }}</label>
                <div class=" filled w-100 d-flex flex-column">
                    <input class="form-control" id="master_code" onkeypress="return $.alpha_num_space_period();" />
                </div>
            </div>
        @endif

        @if($mod == 'Currency')
        <div class="mb-3">
            <label for="" class="mb-2">{{ __('common.' . $mod . '-symbol') }}</label>
            <div class=" filled w-100 d-flex flex-column">
                <i data-acorn-icon="user"></i>
                <input class="form-control form-enable" id="master_symbol">
            </div>
        </div>
        @endif 
 

        <div class="mb-3">
            <label for="" class="mb-2">{{ __('common.description') }}</label>
            <div class=" filled w-100 d-flex flex-column">
                <i data-acorn-icon="info-circle"></i>
                <textarea id="master_description" class="form-control" cols="30" rows="5"
                    onkeypress="return $.alpha_num_space_period();"></textarea>
            </div>
        </div>

    </div>

    <div class="offcanvas-footer pb-4 ps-3 pe-3">
        <div class="text-end">

            <button type="button" class="btn btn-secondary btn-sm waves-effect" data-bs-dismiss="offcanvas"
                aria-label="Close">{{ __('common.close') }}</button>
				 <button class="btn btn-primary btn-sm waves-effect master_add" type="button">
                <span>{{ __('common.add') }}</span></button>

        </div>
    </div>
</div>
