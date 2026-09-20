<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="{{asset('start/img/favicon.png')}}" type="image/png" />
    <title>Кафедра Хірургії</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
     <link rel="stylesheet" href="{{asset('start/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('start/css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('start/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('start/vendors/owl-carousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('start/vendors/nice-select/css/nice-select.css')}}" />
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('start/css/style.css')}}" />
    </head>
@yield('main')
  <body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
      <div class="main_menu">
        
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="row" style="margin-left: 2px;background-color:white;">
            <!-- Brand and toggle get grouped for better mobile display -->
           <img src="{{asset('start/img/logo.jpg')}}"  alt=""
            />
            <button  class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false"  aria-label="Toggle navigation">
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div  class="collapse navbar-collapse offset" id="navbarSupportedContent">
              <ul class="nav navbar-nav menu_nav ml-auto" >
               <li class="nav-item active" style="margin-left: 5px;">
                  <a class="nav-link" href="#" ><h5 style="color:orange">Завідувач кафедри 050-361-71-51 </h5>  </a> <br>  
                  <h4 style="color:darkblue;"><i>Руслан Вікторович </i></h4>
               </li>
               <li class="nav-item active" >
                <a class="nav-link" href="#" ><h5 style="color:orange">Куратор інтернів 099-942-10-66 </h5>  </a> <br> 
                  <h4 style="color:darkblue;"><i> Костянтин Сергійович  </i></h4>
               </li>
               <li class="nav-item active" >
                <a class="nav-link" href="#" ><h5 style="color:orange">Support 066-500-86-57 </h5></a> 
               </li>
               <li class="nav-item active">

                   <a  class="primary-btn2" href="{{ route('register') }}" >Реєстрація</a>
                   <a class="primary-btn2" href="{{ route('login') }}" >Увійти</a>
                </li>
                 <li class="nav-item active">
                  <a class="nav-link" href="{{route('contact')}}" ><h5><img src="{{asset('images/loc.png')}}" width="45px"></h5></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area">
      <div class="banner_inner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="banner_content text-center" style="margin-top: 250px;">
               
                <h2 class="text-uppercase mt-4 mb-2" >
                  Дніпровський Державний <br> Медичний Університет
                    
                </h2>
                 <p class="text-uppercase">
                  інформаційна система по управлінню роботи з інтернами
                </p>
                <div>
                  <a  href="#part1" class="primary-btn2 mb-3 mb-sm-0">Дізнатись більше</a>
            
                 <a href="{{ route('login') }}" class="primary-btn ml-sm-3 ml-0">Увійти</a>
         
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Feature Area =================-->
    <section class="feature_area section_gap_top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3" id="part1" ><a  href="#">Що це таке?</a></h2>
              <p>
                Цей портал розроблено спеціально для інтернів та викладачів, щоб мати можливість слідкувати за тим як ви вчетесь та мати швидкий доступ до навчальної інформації
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="single_feature">
              <div class="icon"><span class="flaticon-student"></span></div>
              <div class="desc">
                <h4 class="mt-3 mb-2">Щоденники курацій</h4>
                <p>Ви маете можливість заповнювати щоденники курацій в зручний для вас час! Кабінет доступний з любого гаджета! </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single_feature">
              <div class="icon"><span class="flaticon-book"></span></div>
              <div class="desc">
                <h4 class="mt-3 mb-2">Розклад</h4>
                <p>
                  Дізнавайся про свій розклад в будь-який момент.
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single_feature">
              <div class="icon"><span class="flaticon-earth"></span></div>
              <div class="desc">
                <h4 class="mt-3 mb-2">Успішність</h4>
                <p>Заходь та слідкуй за оцінками, друкуй щоденники, дізнавайся цікавє!
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Feature Area =================-->

<!--================ Start Popular Courses Area =================-->
    <div class="popular_courses">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Наші дружні викладачі</h2>
              <p>
              Експерти вищого класу! Люди з великим серцем, знаннями, досвідом і бажанням вчити і вдосконалюватися!
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single course -->
          <div class="col-lg-12">
            <div class="owl-carousel active_course">

              <div class="single_course">
                <div class="course_content">
                  <span class="tag mb-4 d-inline-block">Напрямок Хірургія</span>
                  <div class="authr_meta">
                      <img src="{{asset('start/img/courses/Bereznitskiy.jpg')}}" alt="" />
                  </div>
                  <h4 class="mb-3">
                    <a href="#">Березницький Яків Соломонович</a>
                  </h4>
                  <p>
                    Доктор мед. наук, професор
Лауреат Держ. Премії України, Засл. діяч науки і техніки України. Голова обл. Правління Укр. тов. хірургів; Член Правління Українського товариства хірургів Член Вченої Ради ДМА, ЗМАПО, Вченої Ради ІI міжнародного ф-ту,
Голова Предметної комісії «Хірургія» ДМА
                  </p>
                </div>
              </div>

              <div class="single_course">
                <div class="course_content">
                  <span class="tag mb-4 d-inline-block">Напрямок Хірургія</span>
                  <div class="authr_meta">
                   <img src="{{asset('start/img/courses/Gaponov.jpg')}}" alt="" />
                  </div>
                  <h4 class="mb-3">Гапонов Володимир Васильович</h4>
                  <p>
               Доктор мед. наук, професор, Член Правління Асоціації колопроктологів України; Член Вченої Ради ФПО та ІI міжнародного ф-ту, Головний позаштатний проктолог ГУОЗ обл.держ. адміністрації.
                  </p>
               </div>
              </div>

              <div class="single_course">
                 <div class="course_content">
                  <span class="tag mb-4 d-inline-block">Напрямок Урологія</span>
                  <div class="authr_meta">
                     <img src="{{asset('start/img/courses/Molchanov.jpg')}}" alt="" />
                  </div>
                  <h4 class="mb-3">
                    <a href="course-details.html">Молчанов Роберт Миколайович</a>
                  </h4>
                  <p>
                   д.м.н., професор кафедри, Член асоціації урологів України, Асоціації онкоурологів України,   Европейської асоціації урологів
                  </p>
                </div>
              </div>


              <div class="single_course">
                 <div class="course_content">
                  <span class="tag mb-4 d-inline-block">Напрямок Проктологія</span>
                  <div class="authr_meta">
                     <img src="{{asset('start/img/courses/Sulema.jpg')}}" alt="" />
                  </div>
                  <h4 class="mb-3">
                    <a href="#">Сулима Володимир Пилипович</a>
                  </h4>
                  <p>
                   к.м.н., доцент. Член Нью-Йорської акад.Наук, Член мед.тов. по оптичн. Техніки, Член Вчен. Ради ІI міжнародного ф-ту ДМА, Секретар Предметної комісії ДМА”Хірургія”
                  </p>
                 </div>
              </div>

              <div class="single_course">
                 <div class="course_content">
                  <span class="tag mb-4 d-inline-block">Напрямок Хірургія</span>
                  <div class="authr_meta">
                     <img src="{{asset('start/img/courses/Duka.jpg')}}" alt="" />
                  </div>
                  <h4 class="mb-3">
                    <a href="course-details.html">Дука Руслан Вікторович</a>
                  </h4>
                  <p>
                   Завідувач кафедри, доктор мед. наук. Член Європейської асоціації ендоскопічних хірургів, асоціації хірургів Дніпропетровської області, Європейської асоціації баріатричних хірургів.
                  </p>
                 </div>
              </div>

               <div class="single_course">
                 <div class="course_content">
                  <span class="tag mb-4 d-inline-block">Напрямок Хірургія</span>
                  <div class="authr_meta">
                     <img src="{{asset('start/img/courses/Verkholaz.jpg')}}" alt="" />
                  </div>
                  <h4 class="mb-3">
                    <a href="course-details.html">Верхолаз Ігор Леонідович</a>
                  </h4>
                  <p>
                   к.м.н., асистент
                  </p>
                 </div>
              </div>
            
                 <div class="single_course">
                 <div class="course_content">
                  <span class="tag mb-4 d-inline-block">Напрямок Хірургія</span>
                  <div class="authr_meta">
                     <img src="{{asset('start/img/courses/Malinovsky.jpg')}}" alt="" />
                  </div>
                  <h4 class="mb-3">
                    <a href="course-details.html">Маліновський Сергій Леонідович</a>
                  </h4>
                  <p>
                   к.м.н., асистент
                  </p>
                 </div>
              </div>


                   <div class="single_course">
                 <div class="course_content">
                  <span class="tag mb-4 d-inline-block">Напрямок Хірургія</span>
                  <div class="authr_meta">
                     <img src="{{asset('start/img/courses/Belov.jpg')}}" alt="" />
                  </div>
                  <h4 class="mb-3">
                    <a href="course-details.html">Білов Олексій Володимирович</a>
                  </h4>
                  <p>
                   к.м.н., асистент
                  </p>
                 </div>
              </div>


                   <div class="single_course">
                 <div class="course_content">
                  <span class="tag mb-4 d-inline-block">Напрямок Хірургія</span>
                  <div class="authr_meta">
                     <img src="{{asset('start/img/courses/Jaroshenko.jpg')}}" alt="" />
                  </div>
                  <h4 class="mb-3">
                    <a href="course-details.html">Ярошенко Катерина Олексіївна </a>
                  </h4>
                  <p>
                   к.м.н., асистент
                  </p>
                 </div>
              </div>

                   <div class="single_course">
                 <div class="course_content">
                  <span class="tag mb-4 d-inline-block">Напрямок Хірургія</span>
                  <div class="authr_meta">
                     <img src="{{asset('start/img/courses/Todorova.jpg')}}" alt="" />
                  </div>
                  <h4 class="mb-3">
                    <a href="course-details.html">Тодорова Юлия Георгиевна</a>
                  </h4>
                  <p>
                 лаборант
                  </p>
                 </div>
              </div>


           </div>
          </div>
        </div>
      </div>
    </div>
    <!--================ End Popular Courses Area =================-->


 <!--================ Start Events Area =================-->
    <div class="events_area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3 text-white">Історія Кафедри</h2>
              <p class="text-white">
                Кілька слів про історію і сьогодення
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="single_event position-relative">
              <div class="event_thumb">
                <img src="{{asset('start/img/event/2014.jpg')}}" alt="" />
              </div>
              
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="single_event position-relative" style="color: white">
            <p style="color: white">
              <ul>
                <li> Перша в м. Дніпропетровськ факультетська хірургічна клініка була створена восени 1922 року на базі губернської земської лікарні, завідуючим кафедрою у 1922-30 рр. був професор О.О. Абражанов.
                </li>
                <li> З 1931 по 1941 рік завідуючим кафедрою був професор С.К. Соловйов, а по закінченню другої світової війни у 1945 році кафедру очолив відомий у Радянському Союзі та у світі вчений, професор М.О. Кімбаровський, який завідував кафедрою до своєї смерті у 1966 року.
                </li>
                <li>В 1966-1988 рр. кафедрою факультетської хірургії керував професор Д.А.Дорогань, який з 1963 по 1965 рік працював у Сомалі (Африка). Виконав там 1193 операцій, зібрав матеріал по мадуромікозу для докторської дисертації, яку захистив у 1967 році. <br>
                У 1988-1990 роках працював професором кафедри. Під керівництвом професора Д.А.Дорогань захистили кандидатські дисертації В.В. Гапонов (нині – професор кафедри), В.П. Сулима (нині – доцент кафедри) та інші.
              </li>
              <li> З 1988 року по 1990 рік завідуючим кафедрою був професор Є.В. Колесов, у 1990-1996 рр. кафедрою керував доцент І.В. Перець. </li>
              <li>В 1996 році об’єднану кафедру факультетської хірургії та хірургії інтернів (нині - кафедра хірургії № 1 та хірургії інтернів) очолив доктор медичних наук, професор, Заслужений діяч науки і техніки України, Я.С. Березницький.
              </li>
              <li> Професор Березницький Я.С. є автором понад 200 наукових друкованих праць, в тому числі у Великій медичній енциклопедії, 6 монографій, біля 20 винаходів, підручника «Хірургія» у 3-х томах, який рекомендований Міністерством охорони здоров’я та МОН України для вищих медичних навчальних закладів ІІІ-ІV рівнів акредитації.
              </li>
              <li> З 2020 року кафедру очолив Дука Руслан Вікторович, доктор мед. наук. Член Європейської асоціації ендоскопічних хірургів, асоціації хірургів Дніпропетровської області, Європейської асоціації баріатричних хірургів.
              </li>
               </p>
               
          
      
          </div>

        </div>
      </div>
    </div>
  </div>

    <!--================ End Events Area =================-->
<br>
 <section class="section stretch-section">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4">Чому нас обирають</h2>
            <p class="mb-0 lead">Колектив кафедри представлений трьома професорами, докторами медичних наук, двома доцентами та  кандидатами медичних наук, викладачами, асистентами найвищого рівня підготовки.</p>
          </div>
        </div>
        <div class="row align-items-center">
          
          <div class="col-md-6 stretch-left-1 element-animate" data-animate-effect="fadeInLeft">
            <a href="#" class="video"><img src="{{asset('start/ho/img/images1.jpg')}}" alt="" style="width: 600px;height: 600px;" class="img-fluid"></a>
          </div>
          <div class="col-md-6 stretch-left-1-offset pl-md-5 pl-0 " data-animate-effect="fadeInLeft">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="media d-block media-feature text-center">
                  <span class="flaticon-hospital"></span>
                  <div class="media-body">
                    <img src="{{asset('start\img\hosp.png')}}">
                    <h3 class="mt-0 text-black">Зручності</h3>
                    <p>Кафедра обладнана навчальними кімнатами.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="media d-block media-feature text-center">
                  <span class="icon flaticon-microscope"></span>
                  <div class="media-body">
                    <img src="{{asset('start\img\mic.png')}}">
                    <h3 class="mt-0 text-black">Новаторство</h3>
                    <p>Маємо лабораторію новітніх інформаційних технологій.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="media d-block media-feature text-center">
                  <span class="icon flaticon-hospital-bed"></span>
                  <div class="media-body">
                    <img src="{{asset('start\img\med.png')}}">
                    <h3 class="mt-0 text-black">Практика</h3>
                    <p>Кафедра облаштована двома тренажерними класами з медичними імітаторами.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="media d-block media-feature text-center">

                  <span class="icon flaticon-heart-rate"></span>
                  <div class="media-body">
                    <img src="{{asset('start\img\comp.png')}}">
                    <h3 class="mt-0 text-black">Технології</h3>
                    <p>У нас є комп’ютерній клас на 10 комп’ютерів.</p>
                  </div>
                </div>
              </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="media d-block media-feature text-center">
                  <span class="icon flaticon-hospital-bed"></span>
                  <div class="media-body">
                    <img src="{{asset('start\img\doc.png')}}">
                    <h3 class="mt-0 text-black">Лікарі-експерти</h3>
                    <p>Працівники кафедри займаються наукою.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="media d-block media-feature text-center">

                  <span class="icon flaticon-heart-rate"></span>
                  <div class="media-body">
                    <img src="{{asset('start\img\yxo.png')}}">
                    <h3 class="mt-0 text-black">Знання</h3>
                    <p>Щорічні науково-практичні конференції:.</p>
                  </div>
                </div>
              </div>



            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

 <!--================ Start Testimonial Area =================-->
    <div class="testimonial_area section_gap">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Практика </h2>
              <p>
              Студенти кафедри мають можливість проходити навчання на кафедрі топових лікарень області.
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="testi_slider owl-carousel">
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="{{asset('start/img/hosp.png')}}">
                  <span class="icon flaticon-hospital"></span>
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h4>Дніпро</h4>
                    <p>
                      КЗ «МКЛ №6» ДМР   ( 6 МКЛ)
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="{{asset('start/img/hosp.png')}}">
                  <span class="icon flaticon-hospital"></span>
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                   
                    <h4>Дніпро</h4>
                    <p>
                      КЗ «МКЛ №16» ДМР
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="{{asset('start/img/hosp.png')}}">
                    <span class="icon flaticon-hospital"></span>
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    
                    <h4>Дніпро</h4>
                    <p>
                      КЗ «ОКЛ ім..Мечникова»
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="{{asset('start/img/hosp.png')}}">
                  <span class="icon flaticon-hospital"></span>
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    
                    <h4>Дніпро</h4>
                    <p>
                      КЗ «ДОШМД» ДМР
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="{{asset('start/img/hosp.png')}}">
                  <span class="icon flaticon-hospital"></span>
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    
                    <h4>Дніпро</h4>
                    <p>
                      КЗ «МКЛ №2» ДМР
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                   <img src="{{asset('start/img/hosp.png')}}">
                  <span class="icon flaticon-hospital"></span>
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                   
                    <h4>Дніпро</h4>
                    <p>
                      Онкологічний диспансер
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="{{asset('start/img/hosp.png')}}">
                  <span class="icon flaticon-hospital"></span>
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    
                    <h4>Новомосковськ</h4>
                    <p>
                     КЗ «Новомосковська ЦРБ» ДОР
                    </p>
                  </div>
                </div>
              </div>
            </div>
                  <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="{{asset('start/img/hosp.png')}}">
                  <span class="icon flaticon-hospital"></span>
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    
                    <h4>Кам’янське</h4>
                    <p>
                      КЗ «ДЛШМД» ДОР
                    </p>
s                  </div>
                </div>
              </div>
            </div>
           <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="{{asset('start/img/hosp.png')}}">
                  <span class="icon flaticon-hospital"></span>
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                   
                    <h4>Дніпро</h4>
                    <p>
                      Кардіоцентр
                  </p>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
    <!--================ End Testimonial Area =================-->



    <!--================ Start footer Area  =================-->
    <footer class="footer-area section_gap">
     
      
          <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<script>document.write(new Date().getFullYear());</script> | З любовью | Та турботою <i class="ti-heart" aria-hidden="true"></i> Кафедра Хірургії №1
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>

        </footer>
    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('start/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('start/js/popper.js')}}"></script>
    <script src="{{asset('start/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('start/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('start/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('start/js/owl-carousel-thumb.min.js')}}"></script>
    <script src="{{asset('start/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('start/js/mail-script.js')}}"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE')}}"></script>
    <script src="{{asset('start/js/gmaps.min.js')}}"></script>
    <script src="{{asset('start/js/theme.js')}}"></script>
     @yield('js')
  </body>
</html>
