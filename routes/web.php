<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParentPageController;
use App\Http\Controllers\ChildPageController;
use App\Http\Controllers\ParentContentController;
use App\Http\Controllers\ChildContentController;
use App\Http\Controllers\SliderImageController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Mailcontroller;
use App\Http\Controllers\AdviserController;
use App\Http\Controllers\BoardmemberController;
use App\Http\Controllers\WelcomeImageController;




//for the fortend part
// Route::get('/', function () {

//     return view('frontend.index');
// });

Route::get('/',[FrontendController::class,'sliderschange']);

//Route::get('/page/{id}',[FrontendController::class,'pagestodisplay']);

Route::get('/pages/{id}',[FrontendController::class,'selectPageDetailsFromTable']);
Route::get('/mainpage/{id}',[FrontendController::class,'selectHeadingDetailsFromTable']);
Route::get('/news/{id}',[FrontendController::class,'selectNewsDetailsFromTable']);
Route::get('/branchpage/{id}',[FrontendController::class,'selectBranchDetailsFromTable']);
//Route::get('/branchlisting',[FrontendController::class,'Branchlisting']);


Route::get('/welcomeimage', [WelcomeImageController::class,'welcomeimage']);

    
Route::post('/addwelcomeimage', [WelcomeImageController::class,'addwelcomeimage']);


//baranch listing
Route::get('/branchlisting', function () {

    return view('frontend.Branchlisting');
});

//for the gmail 
Route::get('/sendmail',[Mailcontroller::class,'index']);



// For blog post 
Route::get('/bloglisting', function () {

    return view('frontend.bloglisting');
});



Route::get('/boardmember', function () {

    return view('frontend.boardmember');
});
Route::get('/advisor', function () {

    return view('frontend.advisor');
});


Route::get('/newslisting', function () {

    return view('frontend.newslisting');
});

// Route::get('/blogpage', function () {

//     return view('frontend.blogpage');
// });
Route::get('/blogpage/{id}',[FrontendController::class,'selectBlogdetailFromTable']);




Route::get('/blog', function () {

    return view('frontend.post');
});



Route::get('/contact', function () {

    return view('frontend.contact');
});

Route::get('/mykideny', function () {

    return view('frontend.mykideny');
});


Route::get('/patient-search',[ReportController::class,'selectPatientReport'])->name('patient.search.report');


Route::get('/selectPropertiesToFront',[ReportController::class,'selectPropertiesToFront']);


// Route::get('/visaservice', function () {

//     return view('frontend.visa');
// });
//group middleware 
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard.master');
})->name('dashboard');
Route::middleware(['auth'])->group(function () {
// for parent page
Route::get('/add-parentpage',[ParentPageController::class,'addParentPage'])->name('parentpage');
Route::post('/add-parentpage',[ParentPageController::class,'ParentPageStore'])->name('addparentpage.store');
Route::get('/all-parentpage',[ParentPageController::class,'Parentpages']);
Route::get('/edit-parentpage/{id}',[ParentPageController::class,'editparentpage']);
Route::post('/update-parentpage',[ParentPageController::class,'updateParentpage'])->name('parentpage.update');
Route::get('/delete-parentpage/{id}',[ParentPageController::class,'deleteParentpage']);

//for  child page
 Route::get('/add-childpage',[ChildPageController::class,'addChildPage'])->name('childpage');
 Route::Post('/add-childpage',[ChildPageController::class,'ChildPageStore'])->name('childpage.store');
 Route::get('/all-childpage',[ChildPageController::class,'Childpages']);
 Route::get('/edit-childpage/{id}',[ChildPageController::class,'editchildpage']);
 Route::post('/update-childpage',[ChildPageController::class,'updatechildpage'])->name('childpage.update');
 Route::get('/delete-childpage/{id}',[ChildPageController::class,'deletechildpage']);
 
 // parent content page
 Route::get('/add-parentcontent',[ParentContentController::class,'AddParentContent'])->name('parentcontent');
 Route::Post('/add-parentcontent',[ParentContentController::class,'ParentContentStore'])->name('parentcontent.store');
 Route::get('/all-parentcontent',[ParentContentController::class,'ParentContents']);
 Route::get('/edit-parentcontent/{id}',[ParentContentController::class,'EditParentContent']);
 Route::post('/update-parentcontent',[ParentContentController::class,'UpdateParentContent'])->name('parentcontent.update');
 Route::get('/delete-parenentcontent/{id}',[ParentContentController::class,'DeleleParentContent']);
 //ckeditor  
 Route::post('/uploadCkeditorImg',[ParentContentController::class,'upload'])->name('uploadImgFromCkeditor');
 //image remove
 Route::get('/deleteparentcontentimage/{id}',[ParentContentController::class,'deleteparentcontentimage']);



 // child Content page
 Route::get('/add-childcontent',[ChildContentController::class,'AddChildContent'])->name('childcontent');
 Route::Post('/add-childcontent',[ChildContentController::class,'ChildContentStore'])->name('childcontent.store');
 Route::get('/all-childcontent',[ChildContentController::class,'ChildContents']);
 Route::get('/edit-childcontent/{id}',[ChildContentController::class,'EditChildContent']);
 Route::post('/update-childcontent',[ChildContentController::class,'UpdateChildContent'])->name('childcontent.update');
 Route::get('/delete-childcontent/{id}',[ChildContentController::class,'DeleleChildContent']);
 //image remove 
 Route::get('/deletechildcontentimage/{id}',[ChildContentController::class,'deletechildcontentimage']);



 //ckditor
 //Route::post('editor/image_upload',[ChildContentController::class,'upload'])->name('upload');
 //ckditor upadate

 

 //image
 Route::resource('/Sliderimage', SliderImageController::class);

 //testimonials
 Route::resource('/Testimonial', TestimonialController::class);

 //Branch Name
 Route::get('/add-branch',[BranchController::class,'Addbranch'])->name('branch');
 Route::Post('/add-branch',[BranchController::class,'BranchStore'])->name('branch.store');
 Route::get('/all-branch',[BranchController::class,'branches']);
 Route::get('/edit-branch/{id}',[BranchController::class,'EditBranch']);
 Route::post('/update-branch',[BranchController::class,'UpdateBranch'])->name('branch.update');
 Route::get('/delete-branch/{id}',[BranchController::class,'Delelebranch']);
// ckeditor 
 //uploadbranch

 //Route::post('ckeditor/branch',[BranchController::class,'upload'])->name('uploadBranch');

 //Our Team
 Route::get('/add-team',[TeamController::class,'Addteam'])->name('team');
 Route::Post('/add-team',[TeamController::class,'TeamStore'])->name('team.store');
 Route::get('/all-team',[TeamController::class,'teams']);
 Route::get('/edit-team/{id}',[TeamController::class,'EditTeam']);
 Route::post('/update-team',[TeamController::class,'UpdateTeam'])->name('team.update');
 Route::get('/delete-team/{id}',[TeamController::class,'DeleleTeam']);

 //News post 
 Route::get('/add-post',[PostController::class,'Addpost'])->name('post');
 Route::Post('/add-post',[PostController::class,'PostStore'])->name('post.store');
 Route::get('/all-post',[PostController::class,'posts']);
 Route::get('/edit-post/{id}',[PostController::class,'EditPost']);
 Route::post('/update-post',[PostController::class,'UpdatePost'])->name('post.update');
 Route::get('/delete-post/{id}',[PostController::class,'DelelePost']);

 //uploadpost

 //Route::post('ckeditor/post',[PostController::class,'upload'])->name('uploadPost');


 //Blog post 
 Route::get('/add-blog',[BlogController::class,'Addpost'])->name('blog');
 Route::Post('/add-blog',[BlogController::class,'BlogStore'])->name('blog.store');
 Route::get('/all-blog',[BlogController::class,'blogs']);
 Route::get('/edit-blog/{id}',[BlogController::class,'EditBlog']);
 Route::post('/update-blog',[BlogController::class,'UpdateBlog'])->name('blog.update');
 Route::get('/delete-blog/{id}',[BlogController::class,'DeleteBlog']);

 //upload
 //Route::post('ckeditor/image_upload',[PostController::class,'upload'])->name('upload');

//for Patients
Route::get('/add-patient',[PatientController::class,'Addpatient'])->name('patient');
Route::Post('/add-patient',[PatientController::class,'PatientStore'])->name('patient.store');
Route::get('/all-patient',[PatientController::class,'patients'])->name('patient.search');
Route::get('/edit-patient/{id}',[PatientController::class,'EditPatient']);
Route::post('/update-patient',[PatientController::class,'UpdatePatient'])->name('patient.update');
Route::get('/delete-patient/{id}',[PatientController::class,'DeletePatient']);

//for Patients report
Route::get('/add-report/{id}',[ReportController::class,'Addreport'])->name('report');
Route::Post('/add-report',[ReportController::class,'ReportStore'])->name('report.store');
Route::get('/all-report',[ReportController::class,'reports']);
Route::get('/edit-report/{id}',[ReportController::class,'EditReport']);
Route::post('/update-report',[ReportController::class,'UpdateReport'])->name('report.update');
Route::get('/delete-report/{id}',[ReportController::class,'DeleteReport']);





//advertisement part 
Route::get('/add-advertisement',[AdvertisementController::class,'Addadvertisement'])->name('advertisement');
Route::Post('/add-advertisement',[AdvertisementController::class,'advertisementStore'])->name('advertisement.store');
Route::get('/all-advertisement',[AdvertisementController::class,'advertisements']);
Route::get('/edit-advertisement/{id}',[AdvertisementController::class,'Editadvertisement'])->name('advertisement.edit');
Route::post('/update-advertisement',[AdvertisementController::class,'Updateadvertisement'])->name('advertisement.update');
Route::get('/delete-advertisement/{id}',[AdvertisementController::class,'Deleteadvertisement'])->name('advertisement.delete');



//our adviser
Route::get('/add-adviser',[AdviserController::class,'Addadviser'])->name('adviser');
Route::Post('/add-adviser',[AdviserController::class,'adviserStore'])->name('adviser.store');
Route::get('/all-adviser',[AdviserController::class,'advisers']);
Route::get('/edit-adviser/{id}',[AdviserController::class,'Editadviser']);
Route::post('/update-adviser',[AdviserController::class,'Updateadviser'])->name('adviser.update');
Route::get('/delete-adviser/{id}',[AdviserController::class,'Deleleadviser']);




//our board member
Route::get('/add-boardmember',[BoardmemberController::class,'Addboardmember'])->name('boardmember');
Route::Post('/add-boardmember',[BoardmemberController::class,'boardmemberStore'])->name('boardmember.store');
Route::get('/all-boardmember',[BoardmemberController::class,'boardmembers']);
Route::get('/edit-boardmember/{id}',[BoardmemberController::class,'Editboardmember']);
Route::post('/update-boardmember',[BoardmemberController::class,'Updateboardmember'])->name('boardmember.update');
Route::get('/delete-boardmember/{id}',[BoardmemberController::class,'Deleleboardmember']);



});






















