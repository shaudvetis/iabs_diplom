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


Route::get('/memoris', 'MemorisController@Surgeryindex');

//Практические навыки
Route::get('/skills', 'SkillsController@Surgeryindex');

//Оперативные навыки
Route::get('/operational', 'OperationalController@Planoperindex');

//Положення по заочній частині 
Route::get('/memorisplan', 'MemorisplanController@Planoperindex');
//Проверить зачем??
Route::post('/memorisplan', 'MemorisplanController@postAction');

//Навчальний план
Route::get('/navchalniy_plan', 'Zagalni\NavchalniyplanController@planIndex');

//Положення по очній частині
Route::get('/skillsplan', 'SkillsplanController@Planoperindex');

//Теми практичних та семінарських занять на заочних циклах
Route::get('/topclasses', 'TopclassesController@Mainindex');





//Лекции очная часть
Route::get('/lectures', 'Ochno\LecturesController@getLectures');
//Route::post('/lectures', 'LecturesController@updateLectures');



Route::get('/inputforms', 'InputformsController@Formindex')->name('inputforms');
Route::post('/inputforms', 'InputformsController@postAction')->name('akademiya');

Route::get('/inputformsday', 'InputformsdayController@Formindex')->name('inputformsday');
Route::post('/inputformsday', 'InputformsdayController@postAction')->name('inputformsday');
Route::get('/archive_inputday', 'InputformsdayController@getInputDay');


Route::get('/formssurgery', 'FormssurgeryController@Formssurgery')->name('formssurgery');
Route::post('/formssurgery', 'FormssurgeryController@postsurgery')->name('formssurgery');
Route::get('/archive_surgery', 'FormssurgeryController@archiveSurgery');

Route::get('/formssurgeryday', 'FormssurgerydayController@Formindex')->name('formssurgeryday');
Route::post('/formssurgeryday', 'FormssurgerydayController@postAction')->name('formssurgeryday');
Route::get('/archive_surgeryday', 'FormssurgerydayController@archiveSargeryday');

Route::get('/formspractice', 'FormspracticeController@Practicegetsurgery')->name('formspractice');
Route::post('/formspractice', 'FormspracticeController@Practicesurgery')->name('formspractice');
Route::get('/archiv_practice', 'FormspracticeController@archivPractice');


Route::get('/formspracticeday', 'FormspracticedayController@Practicegetsurgery')->name('formspractice');
Route::post('/formspracticeday', 'FormspracticedayController@Practicesurgery')->name('formspractice');
Route::get('/archiva_practiceday', 'FormspracticedayController@practiceday');

Route::get('/nightworkday', 'FormsdayController@Getsurgery')->name('nightworkday');
Route::post('/nightworkday', 'FormsdayController@Postsurgery')->name('nightworkday');
Route::get('/archive_nightday', 'FormsdayController@archiveNightday');
Route::post('/nightpractic', 'FormsdayController@getPractic');
Route::get('/archive_nightpractice', 'FormsdayController@archiveNightpract');


Route::get('/nightwork', 'FormsnightController@Nightsurgery')->name('nightwork');
Route::post('/nightwork', 'FormsnightController@Worksurgery')->name('nightwork');
Route::get('/archiv_nightwork', 'FormsnightController@archivNight');

Route::get('/students', 'StudentsController@indexAction');


Route::post('/students/diagnoz', 'StudentsController@studentAction');
Route::get('/archive', 'ArchiveController@ArchiveAction');


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
Route::get('/studentsextr', 'StudentsextrController@studentextrdIndex')->name('studentsextr');

Route::get('/atestat_profile', 'AtestatController@getAtestat')->name('atestat_profile');
Route::post('/atestat_profile', 'AtestatController@updateAtestat')->name('atestat_profile');
Route::get('/intern.read_literatyre', 'intern\ReadController@getLiteratyre');
Route::post('/intern.read_literatyre', 'intern\ReadController@postLiteratyre');
Route::get('/intern.archiv_literatyre', 'intern\ReadController@getArchiv');

//Направления страница введення в хірургію очно
Route::get('/napravlenia.startsurgery', 'Napravlenia\StartController@indexSurgery')->name('startsurgery');
//Направления  черевна порожнина очно
Route::get('/napravlenia.cherevnaocho', 'Napravlenia\CherevnaochoController@getCherevna');
Route::post('/cherevnaocho', 'Napravlenia\CherevnaochoController@postCherevna');

//Направления грудна клітина очно
Route::get('/napravlenia.grudna_klituna', 'Napravlenia\GrydnaController@indexGrudnaya')->name('grudna_klituna');
//Направления  проктологія очно
Route::get('/napravlenia.proctologia', 'Napravlenia\ProctologController@indexProctologia')->name('proctologia');

//Направления урологія очно
Route::get('/napravlenia.urologia', 'Napravlenia\UrologiaController@indexUrologia')->name('urologia');

//Направления судинна хірургія очно
Route::get('/napravlenia.vascular', 'Napravlenia\VascularController@indexVascular')->name('vascular');
//Направления гнойная хирургия очно
Route::get('/napravlenia.gnoynaya', 'Napravlenia\GnoynayaController@indexGnoynaya')->name('gnoynaya');

//Направления кардио хирургия очно
Route::get('/napravlenia.kardio', 'Napravlenia\KardioController@indexKardio')->name('kardio');


//Направления опікі та відмороження очно
Route::get('/napravlenia.opiku', 'Napravlenia\OpikuController@indexOpiku')->name('opiku');

//Route::post('/user_upload', 'UploadoneController@getDetails')->name('user_upload');
//Route::post('/upload_profile', 'UploadoneController@setDetails')->name('upload_profile');

//Route::get('/student', 'StudentController@showAction');
//Route::get('/teacher', 'MainController@teacherAction');
//Route::get('/manager', 'MainController@managerAction');


//Роуті для админа

Route::group (['namespace'=>'Admink', 'middleware'=>['auth']], function(){
Route::get('/admink', 'DashboardController@dashboard')->name('admink.index');

Route::get('/admink/course/{course}/{form}', 'OnecourseController@getCourse');

//Route::get('/admink.onecourse', 'OnecourseController@getCourse')->name('admink.index');
Route::get('/admink.user_details/{details}', 'DetailsoneController@getDetails')->name('admink.user_details');

Route::get('/admink.atestat_profiles', 'DetailsoneController@getDiplom');

Route::get('/admink.user_print/{details}', 'DetailsoneController@getDetailsPrint')->name('admink.user_print');

Route::get('/admink.user_download', 'DownloadoneController@getadmink')->name('admink.user_download');

Route::post('/user_profile_update/{userprofile}', 'ProfileController@userUpdate')->name('user_profile_update');

Route::get('/admink.timetableone', 'TimeController@getTime');


//Route::get('/admink.user_download', 'DownloadoneController@getDetails')->name('admink.user_download');


Route::get('/admink.reportoneochno', 'ReportoneController@getReport')->name('admink.reportoneochno');

//Оценки в журнале
Route::get('/admink.ball_start', 'BallstartController@getStart');
Route::get('/admink.ballerr_starts', 'BallstartController@getStarts');
Route::post('/admink.ball_start', 'BallstartController@getStartpost');


});

Route::resource('modal', 'ModalController');
//Страница новая руководителя показывает отчет заполненных кураций
Route::get('/teacher', 'TeacherController@Teacherindex');

//Страница новая руководителя показывает отчет заполненных кураций
Route::get('/firstgrade', 'FirstController@Firstindex');

//Страница новая для руководителя показывает пустой отчет
Route::get('/firstcoursen', 'FirstController@Firstcoursen');

//Страница новая руководителя показывает отчет участия в операциях
Route::get('/surgerycoursen', 'FirstController@Surgerycoursen');