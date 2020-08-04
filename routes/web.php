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


//Курация больных
Route::get('/inputformsday', 'InputformsdayController@Formindex')->name('inputformsday');

//Курация больных отправка данных
Route::post('/inputformsday', 'InputformsdayController@postAction')->name('inputformsday');

//Архив отображение
Route::get('/archive_inputday', 'InputformsdayController@getInputDay');

//Архив курации запись данных по дате конца курации и корректировка диагноза
Route::post('/archive_inputday', 'InputformsdayController@postArchivinput');

//Печать дневника интерна по курации очно и заочно
Route::get('/archive_input_print', 'InputformsdayController@getInputprint');

Route::get('modal', 'InputformsdayController@modalget');

Route::get('api/modal/mkb', 'InputformsdayController@modalmkb');



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


Route::get('/students', 'StudentsController@indexAction');
Route::post('/students', 'StudentsController@postMail');

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


//Route::get('/admink.user_download', 'DownloadoneController@getDetails')->name('admink.user_download');


Route::get('/admink.reportoneochno', 'ReportoneController@getReport')->name('admink.reportoneochno');

//Оценки модуль введение в хирургию
Route::get('/admink.ball_start', 'BallstartController@getStart');
//Route::get('/admink.ball_starts', 'BallstartController@getStarts');
Route::post('/admink.ball_start', 'BallstartController@getStartpost');
//Оценки модуль проктология
Route::resource('/proctologia', 'ProctologiaController');
//Оценки модуль гнойная
Route::resource('/gnoynay', 'GnoynayController');
//Оценки модуль урология
Route::resource('/urologiya', 'UrologiyaController');
//Оценки модуль черевна порожнина
Route::resource('/cherevna', 'CherevnaController');
//Клиничне обстеження хворого 9 оценок черевна порожнина
Route::resource('/allcherevna', 'AllcherevnaController');
//Оценки модуль судинна хірургія
Route::resource('/vascular', 'VascularController');
//Оценки модуль грудна клsnbyf
Route::resource('/grudna_klituna', 'GrudnaController');
//Оценки модуль кардио
Route::resource('/kardio', 'KardioController');
//Оценки модуль опики
Route::resource('/opiku', 'OpikuController');
//Тестирование интернов по каждому модулю
Route::resource('/test', 'TestController');
//Крок 3
Route::resource('/kroksurgery', 'KroksurgeryController');
//Военная подготовка
Route::resource('/military', 'MilitaryController')->only([
    'index', 'store'
]);;
Route::get('/last_online', 'LastOnlineController@getonline');
});

Route::group (['namespace'=>'Admink\ClinichniObs', 'middleware'=>['auth']], function(){
//Клиничне обстеження хворого 9 оценок введение в хирургию
Route::resource('/ball_startcont', 'BallStartclinController');
//Клиничне обстеження хворого 9 оценок проктология
Route::resource('/proctologiaclinobs', 'ProctologiaclinController');
//Клиничне обстеження хворого 9 оценок гнойная
Route::resource('/gnoynayaclinobs', 'GnoynayclinController');
//Клиничне обстеження хворого 9 оценок урология
Route::resource('/urologiyaclinobs', 'UrologiyaclinController');
//Клиничне обстеження хворого 9 оценок сосудистая хирургия
Route::resource('/vascularclinobs', 'VascularclinController');
//Клиничне обстеження хворого 9 оценок грудна 
Route::resource('/grudnaclinobs', 'GrudnaclinController');
//Клиничне обстеження хворого 9 оценок кардио 
Route::resource('/kardioclinobs', 'KardioclinController');
//Клиничне обстеження хворого 9 оценок опики 
Route::resource('/opikuclinobs', 'OpikuclinController');
});

//Контроль модуля вывод итого введение в хирургию
Route::get('/admink.controlmodyl.control_modyl', 'Admink\ControlModyl\ControlModelController@modylballstart');

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
// Route::group (['namespace'=>'Admink\Kuraciya', 'middleware'=>['auth']], function(){
// //Клиничне обстеження хворого 9 оценок введение в хирургию
// Route::get('/kuraciyaball_startcont', 'BallStartclinController');

// });




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

Route::resource('/rozklad', 'SeminarTemaController');
Route::resource('/students_course', 'StudentsCourseController');
Route::resource('/sprav_hoursandfio', 'HoursandFioController');
Route::resource('/sprav_hoursandfio', 'HoursandFioController');
Route::resource('/sprav_teacher', 'TeacherandWorkController');
Route::resource('/sprav_modul', 'DirectionandRozkladController');
Route::resource('/sprav_rozklad', 'SprRozkladController');

});
// //Теми практичних та семінарських занять на заочних циклах
// Route::get('/topclasses', 'TopclassesController@Mainindex');


// //Положення по заочній частині 
// Route::get('/memorisplan', 'MemorisplanController@Planoperindex');
// //Проверить зачем??
// Route::post('/memorisplan', 'MemorisplanController@postAction');




