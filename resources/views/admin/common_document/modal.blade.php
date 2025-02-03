<div id="addcommondocumentmodal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    data-bs-scroll="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">{{__('common.documents')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('document-add') }}" method="post" id ="subform" enctype="multipart/form-data">
                    <div class="row div-hidee">
                        <div class="col-lg-12 col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label font-size-13 text-muted">{{__('common.add-document')}}</label>
                                <input type="file" name="file" accept=".pdf" id="documenttfile"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label font-size-13 text-muted">{{__('common.description')}}</label>
                                <textarea name="" class="form-control" id="descri" class="description" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">{{__('common.upload')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">

                                <thead class="bg-light">
                                    <tr>
                                        <th>{{__('common.sr.no')}}</th>
                                        <th>{{ __('rfi.document-name') }}</th>
                                        <th>{{ __('common.description') }}</th>
                                        <th>{{ __('common.created_on') }}</th>
                                        <th>{{ __('common.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="documents_data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
