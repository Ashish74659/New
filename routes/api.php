<?php
/*
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DynamicPageController;
use App\Http\Controllers\Api_next\GRNController;
use App\Http\Controllers\Api_next\RFIController;
use App\Http\Controllers\EmailTrackingController;
use App\Http\Controllers\Api_next\QueryController;
use App\Http\Controllers\Api_next\TenderController;
use App\Http\Controllers\Api_next\AuctionController;
use App\Http\Controllers\Api_next\InvoiceController;
use App\Http\Controllers\Api_next\QuotationController;
use App\Http\Controllers\Api_next\Admin\MasterController;
use App\Http\Controllers\Api_next\PurchaseOrderController;
use App\Http\Controllers\Api_next\VendorOperationController;
use App\Http\Controllers\API\PRController;
use App\Http\Controllers\API\POController;
use App\Http\Controllers\Api_next\AuthController as ApiAuthController;
 
 
    Route::middleware('auth:api')->prefix('purchase-request')->controller(PRController::class)->group(function () {
        Route::post('store','store');
    });
 
    Route::middleware('auth:api')->prefix('purchase-order')->controller(POController::class)->group(function () {
        Route::post('store','store');
    });
 
Route::post('/createData', [DynamicPageController::class, 'createData']);
Route::post('/showData/{data}/{part}', [DynamicPageController::class, 'DynamicContentManagement']);


Route::get('email_test',[EmailTrackingController::class,'sendEmail']);
Route::controller(ApiAuthController::class)->group(function () {
    Route::post('otpRequest', 'otpRequest');
    Route::post('login', 'login');
    Route::post('register', 'store');
    Route::get('resend/{id}', 'sendOTP');
    Route::post('verifyotp', 'verifyOTP');
    Route::post('logout', 'logout');
    Route::get('company_list', 'companyList');
    Route::post('forgotPassword','forgotPassword');
    Route::post('updatePassword','updatePassword');
});
Route::controller(AuthController::class)->group(function () {


    Route::post('refresh', 'refresh');

});

Route::middleware('auth:api')->controller(ApiAuthController::class)->group(function () {
    Route::get('loginTimeList', 'loginTimeList');
});

Route::prefix('published')->controller(TenderController::class)->group(function () {
    Route::post('tender-list', 'PublishedTenderList');
    Route::get('tender-view','PublishedTenderView');
});

Route::prefix('published')->controller(AuctionController::class)->group(function () {
    Route::post('auction-list', 'PublishedAuctionList');
    Route::post('auction-view','PublishedAuctionView');
});

Route::prefix('published')->controller(RFIController::class)->group(function () {
    Route::post('rfi-list', 'PublishedRFI_list');
    Route::post('rfi-view','PublishedRFI_view');
    Route::post('project-department','ProjectDepartment');
    Route::post('file','filetest');

});

Route::middleware('auth:api')->prefix('Query')->controller(QueryController::class)->group(function () {
    Route::post('store','StoreQuery');
    Route::post('query-list','Doclist');
    Route::post('query-delete','QueryDelete');
});

Route::middleware('auth:api')->controller(RFIController::class)->group(function () {
    Route::get('Payment/list','PaymentList');
    Route::get('Dashboard','VendorDashboard');
});

Route::middleware('auth:api')->prefix('auction')->controller(AuctionController::class)->group(function () {
    Route::post('view','AuctionDetails');
    Route::post('payment','AuctionPayment');
    Route::post('place','PlaceBid');
    Route::post('buy-now','BuyNow');
    Route::post('highest-bid','HighestBid');
    Route::post('bidding-history','BiddingHistory');
    Route::post('add-autobidding','AutoBidding');
    Route::post('remove-autobidding','RemoveAutoBidding');
    Route::post('forfeit','Forfeit');
    Route::get('list','auctionList');
    Route::post('addInterest','AddAuctioninterest');
    Route::post('manual-payment','manualPayment');
});

Route::middleware('auth:api')->prefix('tender')->controller(TenderController::class)->group(function () {
    Route::get('list','TenderList');
    Route::post('view','TenderView');
    Route::post('payment','TenderPayment');
    Route::post('addInterest','AddTenderinterest');
    Route::Post('add-pbg','TenderPBG');
    Route::post('delete-pbg','DeleteTenderPBG');
    Route::post('submission','TenderSubmission');
    Route::post('bid_doc','BidRequiredDoc');
});

Route::middleware('auth:api')->prefix('rfi')->controller(RFIController::class)->group(function () {
    Route::get('list','RFIList');
    Route::post('view','RFIView');
    Route::post('addInterest','AddRFIinterest');
    Route::post('submission','RFISubmission');
    Route::post('bid_doc','BidRequiredDoc');
});

Route::middleware('auth:api')->prefix('quotation')->controller(QuotationController::class)->group(function () {
    Route::get('list','QuotationList');
    Route::post('view','QuotationView');
    Route::post('update-status','changeStatus');
    Route::post('save','saveQuotation');
    Route::post('submit','submitQuotation');
    Route::post('line-delete','DeleteQuotationLine');
});

Route::middleware('auth:api')->prefix('purchase-order')->controller(PurchaseOrderController::class)->group(function () {
    Route::get('list','POList');
    Route::post('view','POView');
    Route::post('update-status','POAcceptReject');
});

Route::middleware('auth:api')->prefix('GRN')->controller(GRNController::class)->group(function () {
    Route::post('store','AddGRN');
    Route::post('view','ViewGRN');
    Route::post('create','CreateGRN');
    Route::post('list','ListGRN');
    Route::post('submit','GRNSubmit');
    Route::get('all-list','AllGRNList');
    Route::post('line','GRNLine');
});

Route::middleware('auth:api')->prefix('Invoice')->controller(InvoiceController::class)->group(function () {
    Route::post('save','AddInvoice');
    Route::post('Invoiceview','Invoiceview');
    Route::post('create','CreateInvoice');
    Route::Post('findGrn','findGRN');
    Route::post('list','listInvoice');
    Route::post('grn-line','LineGRN');
     Route::get('all-list','AllInvoiceList');
     Route::post('line','InvoiceLine');
     Route::post('submit','InvoiceSubmit');
     Route::post('line-delete','DeleteInvoiceLine');
});

Route::get('/{model_name}-list', [MasterController::class,'index_new']);

Route::middleware('auth:api')->prefix('master')->controller(MasterController::class)->group(function () {
    Route::any('/{model_name}-list', 'index');
});

Route::middleware('auth:api')->prefix('vendor')->controller(VendorOperationController::class)->group(function () {
    Route::post('general_info','vendor_profile');
    Route::get('profile_data','prefixedData');
    Route::post('company_detail','vendorcompanyStore');
    Route::post('tax_billing','vendorTaxBilling');
    Route::post('account_detail','accountDetail');
    Route::post('question_naire','questionNaire');
    Route::post('vendor_attachements','vendorAttachements_single');
    Route::post('other_details','otherDetails');
    Route::post('verify-data','checkAllVendorData');
    Route::post('approval-request','assignToWorkFlow');
    Route::post('profile-image','profileImage');
    Route::post('delete-attachement','deleteAttachement');
    Route::get('getvendor_info','getvendor_general_info');
    Route::get('getvendor_info_doc','getvendor_general_info_doc');

});
 */