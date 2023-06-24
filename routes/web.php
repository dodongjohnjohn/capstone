<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CertificateGeneratorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountConfirmationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserProfileController;
use App\Models\Event;
use Symfony\Component\Finder\Iterator\CustomFilterIterator;

/*s
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function () {
    return view('main');
});


    //report
    Route::get('report', [ReportController::class, 'index'])->name('reports');



    //register
Route::controller(RegisterController::class)->group(function(){
    Route::get('registration', [ RegisterController::class,'registration'])->name('register');
    Route::post('data_insert',[RegisterController::class, 'insert']);
});

// Account Confirmation
Route::controller(AccountConfirmationController::class)->group(function () {
   Route::get('admindash.confirm_account', [AccountConfirmationController::class, 'confirm_account'])->name('confirm.account');
   Route::put('changeRole/{id}', [AccountConfirmationController::class, 'changeRole'])->name('changeRole');
   Route::put('toggleAccountConfirmation', [AccountConfirmationController::class, 'toggleAccountConfirmation'])->name('toggleAccountConfirmation');
   Route::get('search', [AccountConfirmationController::class, 'search'])->name('members.search');
});

//login
Route::controller(CustomAuthController::class)->group(function(){
  // Route::get('/',  [CustomAuthController::class,'index'])->name('login');
   Route::get('login',  [CustomAuthController::class,'index'])->name('loginform');
  // Route::get('registration', [CustomAuthController::class,'register'])->name('register');
   Route::post('dashboard', [CustomAuthController::class,'login'])->name('login');
   Route::post('main.user', [CustomAuthController::class,'user_ogin'])->name('user.login');
   Route::get('logout', 'logout')->name('logout');
   Route::get('forgot_password', [CustomAuthController::class, 'forgotPassword'])->name('password.request');
   Route::post('password/email', [CustomAuthController::class, 'sendResetLinkEmail'])->name('password.reset');

//forget password 

  // Route::post('validate_registration', 'validate_registration')->name('this.validate_registration');
  // Route::post('validate_login', [CustomAuthController::class,'validate_login'])->name('this.validate_login');
 

});
//profile
Route::get('admindash.profile', [ProfileController::class, 'profile'])->name('profile');

Route::get('main_user', [UserProfileController::class, 'user_profile'])->name('user.profile');
//QR CODE DOWNLOAD 
Route::get('/qr-code/download', [ProfileController::class, 'downloadQR'])->name('qr-code.download');

//member
Route::controller(MembersController::class)->group(function(){
   Route::get('admindash.membersfolder.members', [MembersController::class,'member'])->name('members');
   Route::get('admindash.admin.view_members', [MembersController::class, 'viewMembers'])->name('viewMembers');
   Route::get('admindash.membersfolder/{id}/edit', [MembersController::class, 'editMember'])->name('members.edit');
   Route::put('members/{id}/update', [MembersController::class, 'updateMember'])->name('members.update');
   Route::delete('members/{id}', [MembersController::class, 'deleteMember'])->name('members.delete');
   
   


   });
  
//event
Route::controller(EventController::class)->group(function(){
  Route::get('event', [EventController::class,'index'])->name('event'); 
  Route::get('admindash.admin.create', [EventController::class, 'create_event'])->name('create');
  Route::post('event', [EventController::class, 'store'])->name('save_event');
  Route::get('events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
  Route::put('events/{id}/event', [EventController::class, 'update'])->name('events.update');
  Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');
  Route::get('/event/search', [EventController::class, 'search'])->name('event.search');

});

//dashboard
Route::controller(DashboardController::class)->group(function(){
   Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

//donation
Route::controller(DonationController::class)->group(function(){
   Route::get('donation', [DonationController::class, 'index'])->name('donation.index');
   Route::get('create_donation', [DonationController::class, 'create'])->name('create.donation');
   Route::post('donation', [DonationController::class, 'store'])->name('donation.store');
   Route::get('donation/{id}/edit', [DonationController::class, 'edit'])->name('donation.edit');
   Route::put('donation/{id}', [DonationController::class, 'update'])->name('donation.update');
   Route::delete('/donations/{id}', [DonationController::class, 'destroy'])->name('donation.destroy');
   


});

//attendance
Route::controller(AttendanceController::class)->group(function(){
  
   Route::get('attandance', [AttendanceController::class,'attendance'])->name('attendance');
   Route::get('show_record', [AttendanceController::class,'attendance_record'])->name('show.record');
  Route::get('add_attendance{eventId}', [AttendanceController::class, 'add_attendance'])->name('add.attendance');
   Route::get('view_attendance{eventId}', [AttendanceController::class,'view_attendance'])->name('view.attendance');
   //Route::post('attandance', [AttendanceController::class,'time_in'])->name('time_in');
   Route::post('attendance', [AttendanceController::class, 'store'])->name('attendance.store');
   Route::get('/attendance/search', [AttendanceController::class, 'search'])->name('attendance.search');
   Route::get('/attendance/view/{eventId}/search', [AttendanceController::class, 'viewSearch'])->name('attendance.viewsearch');
   Route::delete('/attendance/{id}', [AttendanceController::class, 'destroy'])->name('attendance.destroy');

   Route::get('qr-scan/{eventId}', [AttendanceController::class, 'qrScan'])->name('qr.scan');
   Route::match(['get', 'post'], 'attendance', [AttendanceController::class, 'scanQR'])->name('attendance.scanQR');

   Route::get('/attendance/{attendanceId}/generate-certificate', [AttendanceController::class, 'generateCertificate']);
   Route::get('/attendance/{eventId}/print', [AttendanceController::class, 'printAttendanceRecords'])->name('attendance.print');

   


   



});


  
//group
Route::controller(GroupController::class)->group(function(){
   Route::get('group', [ GroupController::class,'group'])->name('group');
   Route::get('admindash.groupfolder.create',[GroupController::class,'create'])->name('create.group');
   Route::post('group',[GroupController::class, 'store'])->name('submit.group');
   Route::get('view_group{id}', [GroupController::class, 'show'])->name('show.group');
   Route::put('view_group/{id}', [GroupController::class, 'update'])->name('groups.update');
   Route::get ('add_member{id}',[GroupController::class, 'add_member'])->name('add.member');
   Route::post('group{id}', [GroupController::class, 'store_member'])->name('store.member');
   Route::delete('/group/{id}', [GroupController::class, 'destroy'])->name('delete.group');
 
  
});



  // Route::get('report', [ CustomAuthController::class,'report'])->name('report');
  


   //member
   
   Route::get('user_event', [UserController::class,'user_event'])->name('userevent');
   Route::get('user_donation', [UserController::class,'user_donation'])->name('userdonate');
   Route::get('user_group', [ UserController::class,'user_group'])->name('usergroup');
   Route::get('user_certificate', [ CustomAuthController::class,'user_certificate'])->name('usercertificate');
  // Route::get('user_report', [ CustomAuthController::class,'user_report'])->name('userreport');
   Route::get('userdash.user_profile', [UserController::class, 'profile'])->name('userprofile');
   Route::get('user/downloadqr', [UserController::class, 'downloadQR'])->name('userdownloadqr');
   


//evemt comtroller
Route::controller(EventController::class)->group(function(){
  Route::get('admindash.eventfolder.event',[EventController::class,'create_event'])->name('create');
  Route::post('/admindash.eventfolder.event', [EventController::class,'saveEvent'] )->name('saveEvent');
  
});

Route::get('certificate', [ CertificateGeneratorController::class,'certificate'])->name('certificate');
Route::get('/generate-certificate/{eventId}/{attendanceId}', [CertificateGeneratorController::class, 'generateCertificate'])
   ->name('generate.certificate');
    Route::get('/event/{eventId}/certificate/{attendanceId}', [CertificateGeneratorController::class, 'generateCertificate'])->name('certificate.generate');

    




      

