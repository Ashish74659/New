 
<div class="offcanvas offcanvas-end" tabindex="-1" id="Add-contact-modal" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header bg">
        <h5 class="mb-0">{{ __('common.add-' . $mod . '') }} </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">


        @if($mod == "Warehouse")
            <div class="mb-3">
                <label for="" class="mb-2">{{ __('common.code') }}</label>
                <div class=" filled w-100 d-flex flex-column">                
                    <input class="form-control" placeholder="{{ __('common.code') }}" id="master_code" onkeypress="return $.alpha_num_space_period();" />
                </div>
            </div> 
        @endif

        <div class="mb-3">
            <label for="" class="mb-2">{{ __('common.' . $mod . '-name') }}</label>
            <div class=" filled w-100 d-flex flex-column">                
                <input class="form-control" placeholder="{{ __('common.' . $mod . '-name') }}" id="master_name"
                    onkeypress="return $.alpha_num_space_period();" />
            </div>
        </div> 
 

        <div class="mb-3">
            <label for="" class="mb-2">{{ __('common.' . $parent . '-name') }}</label>
        <div class=" filled w-100 d-flex flex-column"> 
                <select id="parent_id" class="form-control">
                    <option value="">{{ __('common.chooseoption') }}</option>
                    @foreach ($parentdata as $prnt)
                        <option class="form-control" value="{{ $prnt->id }}">{{ $prnt->name }}</option>
                    @endforeach
                </select>
            </div>
        </div> 

       

        <div class="mb-3">
            <label for="" class="mb-2">{{ __('common.description') }}</label>
            <div class=" filled w-100 d-flex flex-column">
                <i data-acorn-icon="info-circle"></i>
                <textarea id="master_description" class="form-control" cols="30" rows="3"
                    placeholder="{{ __('common.description') }}" onkeypress="return $.alpha_num_space_period();"></textarea>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer pb-4 ps-3 pe-3">
        <div class="text-end">

            <button type="reset" class="btn btn-secondary btn-sm waves-effect" data-bs-dismiss="offcanvas">
                {{ __('common.close') }} </button>
            <button type="submit" class="btn btn-primary btn-sm waves-effect  master_add">
                {{ __('common.add') }}
            </button>

        </div>

    </div>
</div>

 

<div class="offcanvas offcanvas-end" tabindex="-1" id="View-contact-modal" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header bg">
        <h5 class="mb-0">{{ __('common.edit-' . $mod . '') }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">

        <div class="mb-3">
            <div class="text-end">
                <a title="Edit" class="cursor"> <span class="edit-btn enable_edit"> <i class="mdi mdi mdi-square-edit-outline text-primary font-size-20"></i></span></a>
            </div>
        </div>

        @if($mod == "Warehouse")
            <div class="mb-3">
                <label for="" class="mb-2">{{ __('common.code') }}</label>
                <div class=" filled w-100 d-flex flex-column">                
                    <input class="form-control" placeholder="{{ __('common.code') }}" id="master_code_edit" disabled="" onkeypress="return $.alpha_num_space_period();" />
                </div>
            </div> 
        @endif

        <div class="mb-3">
            <label for="" class="mb-2">{{ __('common.' . $mod . '-name') }}</label>
            <div class=" filled w-100 d-flex flex-column"> 
                <input type="hidden" class="form-control" placeholder="" id="master_id_edit" />
                <input class="form-control" placeholder="{{ __('common.' . $mod . '-name') }}" id="master_name_edit" disabled="" onkeypress="return $.alpha_num_space_period();" />
            </div>
        </div>
 

        <div class="mb-3">
            <label for="" class="mb-2">{{ __('common.' . $parent . '-name') }}</label>
        <div class=" filled w-100 d-flex flex-column"> 
                <select id="parent_id_edit" class="form-control" disabled="">
                    <option value="">{{ __('common.chooseoption') }}</option>
                    @foreach ($parentdata as $prnt)
                        <option class="form-control" value="{{ $prnt->id }}">{{ $prnt->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="" class="mb-2">{{ __('common.description') }}</label>
            <div class=" filled w-100 d-flex flex-column">
                <i data-acorn-icon="info-circle"></i>
                <textarea id="master_description_edit" class="form-control form-enable" cols="30" rows="3"
                    placeholder="{{ __('common.description') }}" disabled="" onkeypress="return $.alpha_num_space_period();" /></textarea>
            </div>
        </div>

         

    </div>
    <div class="offcanvas-footer pb-4 ps-3 pe-3">
        <div class="text-end">

            <button type="reset" class="btn btn-secondary btn-sm waves-effect" data-bs-dismiss="offcanvas">
                {{ __('common.close') }} </button>
            <button type="submit" class="btn btn-primary btn-sm waves-effect  master_update">
                {{ __('common.add') }}
            </button>

        </div>

    </div>
</div>
 