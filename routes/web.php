<?php

/*Route::get('/', 'Frontend\FrontController@indexAction')→name('frontend-main');
 
Route::get('/reports', 'Frontend\ReportsController@indexAction')>name('frontend-reports'); 
Route::get('/admin', 'Backend\MainController@indexAction')→name('backendmain');
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// //  Таких страниц нет! Проверить нет такой страницы
// Route::get('/surgery', 'SurgeryController@Surgeryindex');

// //Направления тестовая черевна порожнина для отправки даты

//Памятка

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();


Route::group (['namespace'=>'Intern', 'middleware'=>['auth']], function(){
Route::name('students')->get('intern.students', 'StudentsController@indexAction');
Route::post('/intern.students', 'StudentsController@postMail');
Route::name('docatest')->get('/docatest', 'StudentsController@docatest');
});


Route::get('fullcalender', 'FullCalenderController@index');
Route::post('fullcalenderAjax', 'FullCalenderController@ajax');

Route::get('/contact', 'FirstController@contact')->name('contact');

Route::get('/home', 'HomeController@index')->name('home');

//Памятка
Route::get('/memoris', 'MemorisController@Surgeryindex');

//Практические навыки
Route::get('/skills', 'SkillsController@Surgeryindex');

//Оперативные навыки
Route::get('/operational', 'OperationalController@Planoperindex');

//Навчальний план
Route::get('/navchalniy_plan', 'Zagalni\NavchalniyplanController@planIndex');

//Положення по очній частині
Route::get('/skillsplan', 'SkillsplanController@Planoperindex');

//Теми практичних та семінарських занять на заочних циклах
Route::get('/topclasses', 'TopclassesController@Mainindex');

//Лекции очная часть
Route::get('/lectures', 'Ochno\LecturesController@getLectures');
//Route::post('/lectures', 'LecturesController@updateLectures');


//Курация больных проверено
Route::name('inputformsday')->get('/inputformsday', 'Intern\InputformsdayController@Formindex');

//Курация больных отправка данных проверенно
Route::name('kuraciyapost')->post('/inputformsday', 'Intern\InputformsdayController@postAction');

//Архив отображение

Route::get('/archive_inputday', 'Intern\InputformsdayController@getInputDay');

//Архив курации запись данных по дате конца курации и корректировка диагноза
Route::post('/archive_inputday', 'Intern\InputformsdayController@postArchivinput');

Route::get('inputformsdaymkb', 'Intern\InputformsdayController@modalmkb');



Route::get('/formssurgery', 'FormssurgeryController@Formssurgery')->name('formssurgery');
Route::post('/formssurgery', 'FormssurgeryController@postsurgery')->name('formssurgery');
Route::get('/archive_surgery', 'FormssurgeryController@archiveSurgery');
//Было участиве в операциях форма заполнения теперь Контроль учбових елементів та модулів
Route::get('/formssurgeryday', 'FormssurgerydayController@Formindex')->name('formssurgeryday');
Route::post('/formssurgeryday', 'FormssurgerydayController@postAction')->name('formssurgeryday');
Route::get('/archive_surgeryday', 'FormssurgerydayController@archiveSargeryday');

Route::get('/formspractice', 'FormspracticeController@Practicegetsurgery')->name('formspractice');
Route::post('/formspractice', 'FormspracticeController@Practicesurgery')->name('formspractice');
Route::get('/archiv_practice', 'FormspracticeController@archivPractice');


Route::get('/formspracticeday', 'FormspracticedayController@Practicegetsurgery')->name('formspractice');
Route::post('/formspracticeday', 'FormspracticedayController@Practicesurgery')->name('formspractice');
Route::get('/archiva_practiceday', 'FormspracticedayController@practiceday');
//Інформація про нічні чергування у відділенні
Route::get('/nightworkday', 'FormsdayController@Getsurgery')->name('nightworkday');
//Запись в базу данніе стационар и приемное отделение
Route::post('/nightworkday', 'FormsdayController@Postsurgery')->name('nightworkday');

//Архив ночніе дежурства отображение 
Route::get('/archive_nightday', 'FormsdayController@archiveNightday');
//Печать дневника интерна по ночнім дежурствам
Route::get('/archive_nightday_print', 'FormsdayController@getnightprint');

//Вхідний контроль
Route::get('/enteronecourse', 'EnteronecourseController@indexenter');




Route::name('litera')->get('/litera', 'Intern\StudentsController@litera');

Route::get('/user_profile', 'ProfileController@profileAction');
Route::post('/user_profile', 'ProfileController@userAction')->name('user_profile');

Route::get('/user_profile_edit', 'EditController@indexEdit');
Route::post('/user_profile_edit', 'EditController@updateEdit');

Route::post('/user_profile_update/{userprofile}', 'ProfileController@userUpdate')->name('user_profile_update');
//Єтот роут связвает админа и студента с обновлением

Route::get('/profile_print', 'PrintController@printProfile');
//роут печати данных
//Route::post('/user_profile_update/{userprofile}', 'ProfileController@internUpdate')->name('user_profile_update');

Route::get('/download_profile', 'DownloadController@downloadAction');
Route::post('/download_profile', 'DownloadController@downloadIndex')->name('download_profile');
Route::post('/add_string', 'DownloadController@add_string');
//Выяснить что это?
Route::get('/studentsextr', 'StudentsextrController@studentextrdIndex')->name('studentsextr');

Route::get('/atestat_profile', 'AtestatController@getAtestat')->name('atestat_profile');
Route::post('/atestat_profile', 'AtestatController@updateAtestat')->name('atestat_profile');
Route::get('/intern.read_literatyre', 'intern\ReadController@getLiteratyre');
Route::post('/intern.read_literatyre', 'intern\ReadController@postLiteratyre');
Route::get('/intern.archiv_literatyre', 'intern\ReadController@getArchiv');

Route::get('/view_rozklad', 'ViewRozkladController@getrozklad');

Route::name('rozkladzaochno')->get('/rozkladzaochno', 'Admink\Teacher\RozkladzController@rozkladzint');
//Route::post('/user_upload', 'UploadoneController@getDetails')->name('user_upload');
//Route::post('/upload_profile', 'UploadoneController@setDetails')->name('upload_profile');

//Route::get('/student', 'StudentController@showAction');
//Route::get('/teacher', 'MainController@teacherAction');
//Route::get('/manager', 'MainController@managerAction');


//Роуті для админа

Route::group (['namespace'=>'Admink', 'middleware'=>['auth']], function(){
Route::get('/admink.dashboard', 'DashboardController@dashboard')->name('admink.index');
//Роуты для преподавателя с 1 курс
Route::get('/admink.onecourse', 'OnecourseController@getCourse');
//Перевод на  следующий курс
Route::post('/admink.onecourse', 'OnecourseController@postCourse');
//Роуты для преподавателя с 2 курс
Route::get('/admink.twocourse', 'TwocourseController@gettwoCourse');
//Роуты для преподавателя с 3 курс
Route::get('/admink.threecourse', 'ThreecourseController@threeCourse');
//Route::get('/admink.onecourse', 'OnecourseController@getCourse')->name('admink.index');
Route::get('/admink.user_details/{details}', 'DetailsoneController@getDetails')->name('admink.user_details');

Route::get('/admink.atestat_profiles', 'DetailsoneController@getDiplom');

Route::get('/admink.user_print/{details}', 'DetailsoneController@getDetailsPrint')->name('admink.user_print');

Route::get('/admink.user_download', 'DownloadoneController@getadmink')->name('admink.user_download');

Route::post('/user_profile_update/{userprofile}', 'ProfileController@userUpdate')->name('user_profile_update');

Route::get('/admink.timetableone', 'TimeController@getTime');


Route::get('/admink.reportoneochno', 'ReportoneController@getReport')->name('admink.reportoneochno');

Route::get('/last_online', 'LastOnlineController@getonline');

// Контроллер общий для оценок
Route::name('ocenki')->get('/ocenki/{id?}/{course?}/{decatki?}', 'OcenkiController@getocenki');

// Контроллер общий для оценок запись в базу
Route::name('postocenki')->post('/postocenki/{id?}', 'OcenkiController@postocenki');
//В форму с темами и оценками преаодавателя вывод оценок общих 
Route::name('summaseminar')->post('/summaseminar', 'OcenkiController@summaseminar');

//В форму с темами практ навычек
Route::name('practtema')->get('/practtema/{id?}', 'OcenkiController@practtema');

// Контроллер общий для печати оценок по предмету
Route::name('printbal')->get('/printbal.printbal/{id}/{course?}/{decatki?}/{courses?}/{ordinator?}', 'PrintbalController@printbal');

Route::name('pass-nb')->get('/pass-nb', 'ZvitNZController@getzvit');

Route::resource('/test', 'TestController');
//Крок 3
Route::resource('/kroksurgery', 'KroksurgeryController');

});

Route::group (['namespace'=>'Admink\ClinichniObs', 'middleware'=>['auth']], function(){
// Контроллер общий для 9 оценок практичні навички all
Route::name('practnavuchka')->get('/practnavuchka/{id?}', 'PractController@getpractnav');
// Контроллер общий для 9 оценок практичні навички post
Route::name('practnavpost')->post('/practnavpost/{id?}', 'PractController@postpractnav');
});

//Контроль модуля вывод итого введение в хирургию
Route::name('control_modyl')->get('/admink.controlmodyl.control_modyl/{id}', 'Admink\ControlModyl\ControlModelController@modylballstart');

Route::post('/control_modyls', 'Admink\ControlModyl\ControlModelController@postmodylball');

//Страница руководителя показывает итого заполненных кураций черевна порожнина
Route::get('/admink.controlmodyl.model_cherevna', 'Admink\ControlModyl\ControlModelController@modylcherevna');
//Страница уководителя показывает итого заполненных кураций проктология
Route::get('/admink.controlmodyl.model_proctologia', 'Admink\ControlModyl\ControlModelController@modylproctologia');
//Страница уководителя показывает итого заполненных кураций гнойная
Route::get('/admink.controlmodyl.model_gnoynaya', 'Admink\ControlModyl\ControlModelController@modylgnoynaya');
//Страница уководителя показывает итого заполненных кураций урология
Route::get('/admink.controlmodyl.model_urologiya', 'Admink\ControlModyl\ControlModelController@modylurologiya');
//Страница уководителя показывает итого заполненных кураций сосудистая хирургия
Route::get('/admink.controlmodyl.model_vascular', 'Admink\ControlModyl\ControlModelController@modylvascular');
//Страница уководителя показывает итого заполненных кураций грудная хирургия
Route::get('/admink.controlmodyl.model_grudna', 'Admink\ControlModyl\ControlModelController@modylgrudna');
//Страница уководителя показывает итого заполненных кураций кардио хирургия
Route::get('/admink.controlmodyl.model_kardio', 'Admink\ControlModyl\ControlModelController@modylkardio');
//Страница уководителя показывает итого заполненных кураций опики хирургия
Route::get('/admink.controlmodyl.model_opiku', 'Admink\ControlModyl\ControlModelController@modylopiku');

//Страница Кабінет Керівника
Route::get('/admink.teacher.teacher', 'Admink\Teacher\TeacherController@Teacherindex');

//Страница новая руководителя показывает отчет заполненных кураций
Route::get('/firstgrade', 'FirstController@Firstindex');

//Страница новая для руководителя показывает пустой отчет
Route::get('/firstcoursen', 'FirstController@Firstcoursen');

//Страница новая руководителя показывает отчет участия в операциях
Route::get('/surgerycoursen', 'FirstController@Surgerycoursen');

Route::get('/admink.kyraciya.cherevna', 'Admink\Kyraciya\CherevnaController@kyraciyacherevna');
Route::post('/admink.kyraciya.cherevna', 'Admink\Kyraciya\CherevnaController@kyraciyapost');


Route::get('/admink.kyraciya.nightpracticeday', 'Admink\Kyraciya\CherevnaController@kyracianight');
Route::post('/admink.kyraciya.nightpracticeday', 'Admink\Kyraciya\CherevnaController@nightsurgerypost');

//Direction on Kerivnuk

Route::group (['namespace'=>'Admink\Kyraciya', 'middleware'=>['auth']], function(){
Route::resource('/admink.kyraciya.cherevnaoch.kyraciya', 'KuraciyaController');

});

//Кабінет керівника
Route::get('/admink.kerivnuk.lectures', 'Ochno\LecturesController@kerivnukLectures');
//Памятка
Route::get('/admink.kerivnuk.memoris', 'MemorisController@kerivnukmemoris');
//Навчальний план
Route::get('/admink.kerivnuk.navchalniy_plan', 'Zagalni\NavchalniyplanController@kerivnukplan');

//Практические навыки
Route::get('/admink.kerivnuk.skills', 'SkillsController@kerivnukskills');

//Оперативные навыки
Route::get('/admink.kerivnuk.operational', 'OperationalController@kerivnukoper');

//Положення по очній частині
Route::get('/admink.kerivnuk.skillsplan', 'SkillsplanController@skillsplankerivnuk');



Route::group (['namespace'=>'Admink\Teacher', 'middleware'=>['auth']], function(){

//Вхідний контроль
Route::get('/admink.kerivnuk.input_control', 'Input_contController@getinput');
Route::post('/admink.kerivnuk.input_control', 'Input_contController@postinput');
// Віробничий календар скрила бо нащо він
// Route::resource('/rozklad', 'SeminarTemaController');
Route::resource('/students_course', 'StudentsCourseController');
Route::resource('/sprav_hoursandfio', 'HoursandFioController');
Route::resource('/sprav_hoursandfio', 'HoursandFioController');
Route::resource('/sprav_teacher', 'TeacherandWorkController');
Route::resource('/sprav_modul', 'DirectionandRozkladController');

Route::resource('/sprav_rozklad', 'SprRozkladController');
//View rozklad ajax
Route::get('/ajaxcalendar', 'AjaxrozController@calendarget');

Route::resource('/sprav_rozklad', 'SprRozkladController');

//Rozklad zaochno
Route::name('rozkladz')->get('/admink.kerivnuk.rozkladz', 'RozkladzController@getindex');

Route::name('editrozkladz')->get('/admink.kerivnuk.rozkladz/{id?}', 'RozkladzController@editrozkladz');


Route::name('rozkladzp')->post('/admink.kerivnuk.rozkladz', 'RozkladzController@postrozkladz');

Route::get('/planrozklad', 'TeacherController@planrozklad');
Route::post('/planrozklad', 'TeacherController@planrozkladpost');
Route::name('printplanroz')->get('/printplanroz', 'TeacherController@printplanroz');


// Два роута для работі со справочником тем
Route::get('/admink.kerivnuk.name_seminar', 'SeminarNameController@getname');
Route::post('/admink.kerivnuk.name_seminar', 'SeminarNameController@postname');

Route::resource('/createuser', 'RegistrController');

Route::resource('/cherguvannya', 'ChergController');

//Звіт про 3 курс оцінки перед єкзаменом
Route::name('zvitthreecourse')->get('/zvitthreecourse', 'TeacherController@zvitthreecourse');
//Звіт про 3 курс оцінки перед єкзаменом
Route::name('pass-allball')->get('/pass-allball', 'TeacherController@passallball');

Route::name('reportmarks')->get('/reportmarks', 'TeacherController@reportmarks');


});
// //Теми практичних та семінарських занять на заочних циклах
// Route::get('/topclasses', 'TopclassesController@Mainindex');


// //Положення по заочній частині 
// Route::get('/memorisplan', 'MemorisplanController@Planoperindex');
// //Проверить зачем??
// Route::post('/memorisplan', 'MemorisplanController@postAction');




