<div id="upload_vendor_tender_document" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    data-bs-scroll="true"> 
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">{{ __('common.documents') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                
                <div class="row ">
                    <div class="col-lg-12 col-md-12">
                        <div class="mb-3">
                            <label for="" class="form-label font-size-13 text-muted">{{ __('common.add-document') }}</label> 
                            <input type="file" multiple id="documenttfiles" class="form-control disabled" onChange="validateFile(this,'image_document',2);">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="mb-3">
                            <label for="" class="form-label font-size-13 text-muted">{{ __('common.description') }}</label>
                            <textarea name="" class="form-control" id="description" cols="30" rows="3" onkeypress="return $.alpha_num_space_period();"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 mb-3">
                        <div class="text-end"> 
                            <button type="button" id="submit_document" class="btn btn-primary waves-effect waves-light" onclick="$.upload_doc();">{{ __('common.upload') }}</button>
                        </div>
                    </div>
                </div> 


                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="table-responsive" style="height:250px;">
                            <table class="table table-hover dt-responsive align-middle mb-0 nowrap">
                                 <thead class="bg-light">
                                    <tr>
                                        <th>{{ __('common.sl-no') }}</th>
                                        <th>{{ __('common.doc-name') }}</th>
                                        <th>{{ __('common.description') }}</th>
                                        <th>{{ __('common.uploaded-on') }}</th>
                                        <th>{{ __('common.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="documents_datas">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="admin_vendor_tender_document" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    data-bs-scroll="true"> 
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">{{ __('common.documents') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="table-responsive" style="height:400px;">
                            <table class="table table-hover dt-responsive align-middle mb-0 nowrap">
                                 <thead class="bg-light">
                                    <tr>
                                        <th>{{ __('common.sl-no') }}</th>
                                        <th>{{ __('rfi.doc-type') }}</th>
                                        <th>{{ __('common.doc-name') }}</th>
                                        <th>{{ __('common.description') }}</th>
                                        <th>{{ __('common.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="admin_displayDocs">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>