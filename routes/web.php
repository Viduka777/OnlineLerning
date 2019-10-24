<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//testing

/* Route::get('/1234', function(){
    return view('test_admin_homepg_graph');
}); */



//Route::get('/', 'Member\MemberController@showLoginForm');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

//parent
Route::get('/child/add', 'HomeController@addChild')->name('child.add');
Route::post('/child/add/save', 'HomeController@saveChild')->name('child.save');
Route::get('/child/list/view', 'HomeController@listChild')->name('child.list');
Route::get('/child/delete/{id}', 'HomeController@deleteChild')->name('child.delete');

Route::get('/parent/lesson/all', 'HomeController@allParentLessons')->name('allEducatorLessons');
Route::post('/parent/lesson/suggest', 'HomeController@suggestLessons')->name('suggestLessons');

Route::get('/parent/educators/all', 'HomeController@allEducatorsParents')->name('allEducatorsParents');
Route::post('/parent/rate', 'HomeController@rateEducatorByParent')->name('rateEducatorByParent');

Route::get('/parent/requested-lessons', 'HomeController@requestPayLessons')->name('requestPayLessons');

Route::get('/parent/lesson/child/view/papers', 'HomeController@childPapersView')->name('parentChildPapersView');
Route::get('/parent/lesson/child/view/paper/{id}', 'HomeController@childPapersViewSingle')->name('parentChildPapersViewSingle');


//educator
Route::get('/educator/my-lessons/', 'EducatorController@myLessons')->name('educator.mylessons');
Route::get('/educator/lesson/add', 'EducatorController@addLesson')->name('educator.addlesson');
Route::post('/educator/lesson/save', 'EducatorController@saveLesson')->name('lesson.save');
Route::get('/educator/lesson/deactivate/{id}', 'EducatorController@deactive_lession');
Route::get('/educator/lesson/activate/{id}', 'EducatorController@active_lession');
Route::get('/educator/lesson/delete/{id}', 'EducatorController@delete_lession');
Route::get('/educator/lesson/delete/{id}', 'EducatorController@delete_lession');
Route::get('/educator/lesson/test/add', 'EducatorController@addLessionTest')->name('educator.addLessionTest');
Route::post('/admin/lesson/test/save', 'EducatorController@saveLessionTest')->name('saveLessionTest');
Route::get('/educator/lesson/followers', 'EducatorController@childLessonViews')->name('educator.childLessonViews');
Route::get('/educator/lesson/followers/view/{id}', 'EducatorController@lessonFollowersView')->name('educatorLessonFollowersView');
Route::get('/educator/lesson/child/view/papers', 'EducatorController@childPapersView')->name('childPapersView');
Route::get('/educator/lesson/child/view/paper/{id}', 'EducatorController@childPapersViewSingle')->name('childPapersViewSingle');
Route::get('/educator/payments/received', 'EducatorController@archivePayments')->name('archivePaymentsEdu');

//child
Route::get('/child/questions', 'ChildController@questions');
Route::post('/child/question/answer/check', 'ChildController@check_answer');
Route::post('/child/question/answer/save', 'ChildController@save_answer');
Route::get('/child/find-course', 'ChildController@findCourse')->name('findCourse');
Route::get('/child/my-courses', 'ChildController@myCourses')->name('myCourses');
Route::get('/child/my-tests', 'ChildController@myTests')->name('myTests');
Route::get('/child/my-suggest', 'ChildController@mySuggests')->name('mySuggests');
Route::get('/course/view/{id}', 'ChildController@viewCourse');
Route::get('/course/suggest/view/{id}', 'ChildController@viewSuggestCourse');
Route::get('child/games/list', 'ChildController@allGames');
Route::get('/game/view/{id}', 'ChildController@viewGame');
Route::get('/child/find-courses/{fil}/{type}', 'ChildController@filterCourses');
Route::post('/lesson/request/payments', 'ChildController@lessonRequest')->name('lessonRequest');
Route::get('/child/read/noti', 'ChildController@readNotiChild')->name('readNotiChild');
Route::post('/child/rate', 'ChildController@rateEducatorByChild')->name('rateEducatorByChild');
Route::get('/course/view/test/{id}', 'ChildController@Lessonquestions');
Route::post('/child/test/answer/check', 'ChildController@check_answer_test');
Route::post('/child/test/answer/save', 'ChildController@save_answer_test');
Route::get('/course/view/test/{id}/retake', 'ChildController@LessonquestionsRetake');
Route::post('/child/test/answer/retake/save', 'ChildController@save_answer_test_retake');


//admin
Route::get('/admin/question/general/add', 'AdminController@addGeneralQuestion')->name('addGeneralQuestion');
Route::post('/admin/question/general/save', 'AdminController@saveGeneralQuestion')->name('saveGeneralQuestion');
Route::get('/admin/question/general/list', 'AdminController@listGeneralQuestion')->name('listGeneralQuestion');
Route::get('/admin/question/general/deactive/{id}', 'AdminController@deactivateGeneralQuestion');
Route::get('/admin/question/general/active/{id}', 'AdminController@activateGeneralQuestion');
Route::get('/admin/question/general/delete/{id}', 'AdminController@deleteGeneralQuestion');

Route::get('/admin/educator/pending', 'AdminController@listChild')->name('listChild');
Route::get('/admin/educator/all', 'AdminController@allChild')->name('allChild');
Route::get('/admin/educator/active', 'AdminController@activeChild')->name('activeChild');
Route::get('/admin/children/deactive/{id}', 'AdminController@deactivateChild');
Route::get('/admin/children/reject/{id}', 'AdminController@rejectChild');
Route::get('/admin/children/active/{id}', 'AdminController@activateChild');
Route::get('/admin/children/delete/{id}', 'AdminController@deleteChild');

Route::get('/admin/games/add', 'GameController@addGames')->name('addGames');
Route::post('/admin/games/save', 'GameController@saveGames')->name('saveGames');
Route::get('/admin/games/list', 'GameController@listGames')->name('listGames');
Route::get('/admin/game/delete/{id}', 'GameController@deleteGame');

Route::get('/admin/lesson/all', 'AdminController@allLessons')->name('allLessons');
Route::get('/admin/lesson/pending', 'AdminController@pendingLessions')->name('pendingLessions');
Route::post('/admin/lesson/reject', 'AdminController@rejectLession');

Route::get('/admin/lesson/followers/view/{id}', 'AdminController@lessonFollowersView')->name('lessonFollowersView');

Route::get('/admin/payments/all/', 'AdminController@listPayments')->name('listPayments');
Route::get('/admin/payments/archive/', 'AdminController@archivePayments')->name('archivePayments');
Route::get('/admin/payments/pay/{user_id}/{amount}', 'AdminController@payPayments')->name('payPayments');


//payments
Route::post('/payments', 'PaymentController@index')->name('payments_details');
Route::post('/payment/save', 'PaymentController@savePayment')->name('payments_save');
//Route::post('/payments', 'AdminController@deleteChild');


Route::get('/log', function () {
    return view('index');
});
Route::get('/SelectRegUserTypeView', function () {
    return view('SelectRegUserTypeView');
});
Route::get('/ParentRegView', function () {
    return view('ParentRegView');
});
Route::get('/EducatorRegView', function () {
    return view('EducatorRegView');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/ParentHomeView', function () {
    return view('ParentHomeView');
});

Route::get('/ChildRegView', function () {
    return view('ChildRegView');
});
Route::get('/ChildHomeView', function () {
    return view('ChildHomeView');
});

Route::get('/PlanPageTest', function () {
    return view('PlanPageTest');
});
Route::get('/EducatorHomeView', function () {
    return view('EducatorHomeView');
});

Route::get('/EducatorMyLessonView', function () {
    return view('EducatorMyLessonView');
});



Auth::routes();


