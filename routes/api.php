<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Frontend\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->middleware(['lang'])->group(function(){
    /*-------------authentication routes----------------*/
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('forgetPassword',[AuthController::class,'forgetPassword']);
    Route::post('verifiedToken',[AuthController::class,'verifiedToken']);
    Route::post('resetPassword',[AuthController::class,'resetPassword']);
    
    Route::post('registerOrder',[AuthController::class,'joinOrder'])->name('registerOrder');

    Route::resource('sliders', '\App\Http\Controllers\Api\SliderController');

    
    
    
    /*-------------logined------------------------------*/
    // Route::prefix('customer')->middleware(['auth_customer'])->group(function() {
    Route::prefix('employee')->name('employee.')->group(function() {
    // Route::prefix('customer')->group(function() {
        Route::middleware('auth_employee')->group(function(){

            Route::resource('advances', '\App\Http\Controllers\Api\AdvanceController');
            Route::resource('vacations', '\App\Http\Controllers\Api\VacationController');
            Route::resource('employments', '\App\Http\Controllers\Api\EmploymentController');
            Route::resource('revisions', '\App\Http\Controllers\Api\RevisionController');
            Route::resource('transfers', '\App\Http\Controllers\Api\TransferController');
            Route::resource('complaints', '\App\Http\Controllers\Api\ComplaintController');
            Route::resource('treatments', '\App\Http\Controllers\Api\TreatmentController');
            Route::resource('resignations', '\App\Http\Controllers\Api\ResignationController');
            Route::resource('suggestions', '\App\Http\Controllers\Api\SuggestionController');
            Route::resource('financials', '\App\Http\Controllers\Api\FinancialController');
            Route::resource('operatings', '\App\Http\Controllers\Api\OperatingController');
            Route::resource('research', '\App\Http\Controllers\Api\ResearchController');
            
            Route::get('profiles', [ProfileController::class,'index']);
            Route::get('getUserService', [ServiceController::class,'getUserService']);
            Route::post('updateProfile',[ProfileController::class,'updateProfile'])->name('updateProfile');
            Route::resource('contacts','\App\Http\Controllers\FrontEnd\ContactController');

    
    
            Route::resource('its', '\App\Http\Controllers\Api\ITController');
            Route::resource('hrs', '\App\Http\Controllers\Api\HrController');
            Route::resource('polarizations', '\App\Http\Controllers\Api\PolarizationController');
            Route::resource('legals', '\App\Http\Controllers\Api\LegalController');
            Route::resource('sites', '\App\Http\Controllers\Api\SiteController');
            Route::resource('operating_management', '\App\Http\Controllers\Api\OperatingManagementController');
            Route::resource('marketing_managements', '\App\Http\Controllers\Api\MarketingManagementController');
            Route::resource('finances', '\App\Http\Controllers\Api\FinanceController');
            Route::resource('marketings', '\App\Http\Controllers\Api\MarketingController');
            Route::resource('notifications', '\App\Http\Controllers\Api\NotificationController');
            Route::resource('investments', '\App\Http\Controllers\Api\InvestmentController');
        });
        Route::resource('services', '\App\Http\Controllers\Api\ServiceController');

        
});
    Route::prefix('customer')->name('customer.')->group(function() {
        Route::resource('services', '\App\Http\Controllers\Api\ServiceController');

        Route::middleware('auth_customer')->group(function(){


            Route::resource('industries', '\App\Http\Controllers\Api\IndustryController');
            Route::resource('civils', '\App\Http\Controllers\Api\CivilController');
            Route::resource('complaints', '\App\Http\Controllers\Api\ComplaintController');
            Route::resource('equipment', '\App\Http\Controllers\Api\EquipmentController');
            Route::resource('raws', '\App\Http\Controllers\Api\RawController');
            Route::resource('governates', '\App\Http\Controllers\Api\GovernateController');
            
            Route::resource('investments', '\App\Http\Controllers\Api\InvestmentController');
            Route::resource('feasibilities', '\App\Http\Controllers\Api\FeasibilityController');
            Route::resource('fundings', '\App\Http\Controllers\Api\FundingController');
            Route::resource('sliders', '\App\Http\Controllers\Api\SliderController');
            Route::resource('hrsupplies', '\App\Http\Controllers\Api\HRSupplyController');
            Route::resource('industrySupplies', '\App\Http\Controllers\Api\IndustrySupplyController');
            Route::resource('hroperatings', '\App\Http\Controllers\Api\HROpeatingController');
            Route::resource('researchmarketing', '\App\Http\Controllers\Api\ResearchMarketingController');
            Route::resource('fundingsell', '\App\Http\Controllers\Api\FundingSellController');

            Route::resource('contacts','\App\Http\Controllers\FrontEnd\ContactController');

    
            Route::resource('its', '\App\Http\Controllers\Api\ITController');
            Route::resource('hrs', '\App\Http\Controllers\Api\HrController');
            Route::resource('polarizations', '\App\Http\Controllers\Api\PolarizationController');
            Route::resource('legals', '\App\Http\Controllers\Api\LegalController');
            Route::resource('sites', '\App\Http\Controllers\Api\SiteController');
            Route::resource('operating_management', '\App\Http\Controllers\Api\OperatingManagementController');
            Route::resource('marketing_managements', '\App\Http\Controllers\Api\MarketingManagementController');
            Route::resource('finances', '\App\Http\Controllers\Api\FinanceController');
            Route::resource('marketings', '\App\Http\Controllers\Api\MarketingController'); 
            
            Route::resource('notifications', '\App\Http\Controllers\Api\NotificationController');
            Route::get('getUserService', [ServiceController::class,'getUserService']);

            Route::resource('suggestions', '\App\Http\Controllers\Api\SuggestionController');

    
            Route::get('profiles', [ProfileController::class,'index']);
            Route::post('updateProfile',[ProfileController::class,'updateProfile'])->name('updateProfile');
        });
        
});
});