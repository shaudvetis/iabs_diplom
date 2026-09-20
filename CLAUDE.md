# Кабінет інтерна/викладача/керівника — довідка для Claude

Система обліку інтернатури для медичного університету (ДДМУ, кафедра хірургії). Laravel 11 + Vue 3 (частково), Tailwind (CDN на більшості сторінок), Docker.

## Оточення

- Робоча директорія: `laravel-vue` (у контейнері `/var/www`)
- Контейнери: `app_laravel-vue` (PHP/Laravel), `db_laravel-vue` (MySQL), `webserver_laravel-vue` (nginx), `laravel-vue-phpmyadmin-1`
- Команди Laravel/composer виконуються через `docker exec app_laravel-vue php artisan ...` / `docker exec app_laravel-vue composer ...`
- Фронтенд (Vite) збирається **на хості**, не в контейнері: `npx vite build` — після будь-якої зміни в `resources/js/**/*.vue` чи `*.js`, підключеного через `@vite()`
- Лінт PHP: `docker exec app_laravel-vue php -l <file>` після кожної зміни
- Кеш view: `docker exec app_laravel-vue php artisan view:clear` після зміни blade-файлів (інколи кешується стара версія)
- Тестування без реального браузера: через `php artisan tinker`, підняти `Illuminate\Http\Request::create(...)` і прогнати через `app()->handle($request)` — дає справжній HTTP-рендер (статус, HTML) без відкриття браузера. Для POST з CSRF - явно стартувати сесію і підставити `_token` (steps: `app('session.store')->start()`, взяти `$session->token()`)

## Ролі й кабінети

`App\Enums\Role`: `INTERN=1`, `TEACHER=2`, `PROFESSOR=3`, `ADMIN=4`. `Role::dashboardRouteName()` — єдине джерело "роль → дашборд" (`intern.dashboard` / `teacher.dashboard` / `professor.dashboard` для PROFESSOR і ADMIN однаково).

- **Кабінет інтерна** (`resources/views/intern/**`) — самостійні (не `@extends`) blade-файли, кожен зі своєю `<style>`, у "молодіжному" анімованому стилі (CSS-змінні `--accentColor1/2`, `.header/.hero/.panel`, курсив Caveat у підзаголовку, `.bottom-nav` знизу, бургер-меню "Ще" з розкривними групами).
- **Кабінет викладача** (`resources/views/teacher/**`) — теж самостійні файли, але Tailwind-дизайн (не CDN-класи молодіжного стилю), кожна сторінка дублює власний сайдбар (копія в кожному файлі, не спільний компонент!) — при зміні пункту меню **треба правити в усіх файлах** (зараз їх 11: `directions`, `testing`, `krok-exam`, `entry-control`, `module-control`, `skill-assessments`, `practical-skill-references`, `site-presence`, `curations`, `night-duty`, `dashboard`).
- **Кабінет керівника** (`resources/views/professor/**`) — `@extends('layouts.professor')`, спільний сайдбар `components/professor/sidebar.blade.php` і хедер `components/professor/header.blade.php` (тут правити один раз, не дублюється).

## Ключові конвенції

- FK: `user_id` → `users.id` для самостійних записів ІНТЕРНА (Curation, NightDutyShift, LiteratureReading, PracticeSkill); `user_profile_id` для оцінок, які ставить ВИКЛАДАЧ (SubtopicGrade); `teacher_id`/`kafedra_id` — хто редагував/до якої кафедри.
- Усі нові "адмінські" довідники (SettingsBal, PracticalSkillReference, RecommendedLiterature) — `SoftDeletes` + фільтр "Показати видалені" + кнопка "Відновити".
- Патерн CRUD-сторінки в кабінеті керівника: картки-список + drawer-форма праворуч + fetch (не звичайний form submit) + тост "Йде запис..." → "Збережено ✓".
- Патерн фільтрів у кабінеті викладача (Курс/Десяток/Напрямок/...): **явна кнопка "Пошук"** (лупа), НЕ auto-submit при кожній зміні select — auto-submit на кількох полях одночасно призводив до гонки (зміна одного скидала інше). Виняток: якщо лишилось РІВНО одне select-поле (наприклад, тільки "Напрямок"), можна `onchange="submit()"`.
- Rich-text поля (питання/література/рекомендована література) — `resources/js/rich-editor.js` (`initRichEditor(fieldId)`, Quill "snow"), textarea лишається джерелом правди (`.value` = HTML).
- **Vite-пастка, яка вже двічі траплялась**: файл є в `resources/js/professor/*.js`, підключений через `@vite([...])` у blade, але забутий у `vite.config.js` → `input: [...]`. Наслідок: "Unable to locate file in Vite manifest" на проді, і 500-ка на сторінці. Завжди звіряй `grep "@vite(" resources/views/professor/**` з масивом `input` у `vite.config.js`.
- Мова інтерфейсу — українська. `APP_LOCALE=uk` в `.env`. Стандартні Laravel-рядки (валідація, password-broker, notification-листи) перекладені через `lang/uk/*.php` (масив-стиль, для `trans('passwords.sent')` тощо) і `lang/uk.json` (JSON, ключ = точний англійський рядок — для `Lang::get('Reset Password Notification')` і подібних викликів усередині `Illuminate\Auth\Notifications\ResetPassword`/`MailMessage`).
- Спілкування з користувачем — переважно російською (сам користувач пише мішанкою рос./укр.), відповідай так само; UI-текст і коментарі в коді — українською.

## Побудовані фічі (орієнтир "де що шукати")

- **Налаштування балів** (`professor.settings-bal.*`) — шкали відсоток→ECTS по напрямках; `SettingsBal::evaluate(int $totalPoints): array`.
- **Контроль модуля** (`teacher.module-control.*`) — сумує семінари+курацію("Клінічне обстеження хворого")+тест, через `SettingsBal::evaluate()`. Бізнес-правило: якщо бал за курацію < 7 → завжди "Не здано", хоч би що показував відсоток.
- **Довідник практичних навичок** — `PracticalSkillReference` (не плутати з окремим старим `PracticalSkill` — ієрархічний каталог з категоріями/mastery-level, інша сутність, використовується в "Нормативи (форми)"/"Загальні питання").
- **Рекомендована література** — `RecommendedLiterature` (керівник редагує, Quill rich-text), інтерн читає через "Ще" → "Лекції" → "Література" (`Intern\LectureController`), фільтр по kafedra_id/course_year (null = для всіх).
- **Курації / Нічні чергування** (звіти викладача, `teacher.curations.*`, `teacher.night-duty.*`) — курс/десяток/(вид курації або тип чергування)/період-в-днях, кнопка "Показати". `CurationReportController`, `NightDutyReportController`.
- **Присутність на сайті** (`teacher.site-presence.*`) — `users.last_login_at` (оновлюється в `LoginController::sendLoginResponse()`) + останній запис у 4 журналах інтерна, фільтр тільки по курсу.
- **Загальні питання** (інтерн, `intern.general-info.*`) — хаб-хижа з 4 картками (Пам'ятка/Навчальний план/Практичні навички/Хірургічні навички), у бургер-меню розкривається ІНЛАЙН (не окрема сторінка — так швидше).
- **Документ на атестацію** (`intern.documents.attestation`) — статична сторінка-перелік + посилання на Google Docs/Drive зразки.
- **Скидання пароля** — Laravel password broker, стандартні роути `Auth::routes()`. `ForgotPasswordController`/`ResetPasswordController` перевизначають `showLinkRequestForm()`/редирект на роль-специфічний дашборд після зміни пароля. Сторінка `resources/views/auth/passwords/reset.blade.php` — власний стиль (картка teal), не Bootstrap-скаффолд. Пошта зараз через **Gmail SMTP** (`MAIL_MAILER=smtp`, `MAIL_HOST=smtp.gmail.com:587`, обліковка й App Password у `.env` — власник має відкрити 2FA й видати новий App Password, якщо змінить пароль/вимкне доступ). Resend (`RESEND_KEY` у `.env`) лишений про запас — домен `kafedra.garvis.com.ua` НЕ верифікований у Resend, перемкнути можна одним рядком (`MAIL_MAILER=resend`), коли домен підтвердять.
- **Довідковий віджет "?"** — `resources/views/components/help-widget.blade.php` (кнопка+модалка) і `help-filter-diagram.blade.php` (SVG-схема панелі фільтрів). Використаний на **всіх 40 основних сторінках** усіх трьох кабінетів (крім друкованих форм і порожніх заглушок). Важливо: модалка при відкритті переноситься в `document.body` (`appendChild`) — бо на деяких сторінках предок має `backdrop-filter`, який ламає `position:fixed`.
- **Дашборд керівника** (`professor.dashboard`, `Professor\DashboardController`) — раніше був порожній. Тепер: анімована "молекулярна мережа" на `<canvas>` у хедері, 4 KPI (інтерни/викладачі/напрямки/кафедри), ряд "Пульс тижня" (курації/нічні чергування/література за 7 днів по кожному з 3 курсів) і "Швидкий доступ" (11 карток-посилань).

## Відомі прогалини / не зроблено

- **Н/Б (пропуски занять, "не був на занятті")** — немає жодної моделі/таблиці в системі. Просили додати на дашборд керівника — свідомо НЕ придумано число, бо даних нема.
- Сайдбар викладача, група "Звіти": пункти "Звітність по Н.Б", "Оцінки по напрямкам", "Оцінки по семінару" — це `href="#"`-заглушки, реальних сторінок під них немає.
- `teacher/dashboard.blade.php`, вкладка "Аналітика і Отчеты" — статичний макет-мокап (хардкод "Урология"/"Хирургия"/"Кардиология" в select), НЕ підключений до реальних даних. Робочі звіти — окремі пункти в меню "Курації"/"Звіти".
- `resources/views/auth/passwords/email.blade.php`, `verify.blade.php`, `confirm.blade.php` — мертві (недосяжні) стандартні Laravel-скаффолди, залишені як є (аналогічно вже видаленому `register.blade.php` і фактично мертвому `login.blade.php`).

## Стиль роботи, який зайшов добре

- Перед тим як звітувати "готово" — завжди рендер-тест через tinker+`app()->handle()` під реальною роллю (не просто `php -l`).
- Коли роблю однотипну зміну на багатьох файлах (сайдбар на 11 сторінках викладача, help-widget на 40 сторінках) — спершу один файл повністю (лінт+рендер), і тільки переконавшись, що патерн робочий, тиражувати на решту.
- Не вигадувати дані/тексти, яких немає в системі (приклад: Н/Б) — краще чесно сказати, що бракує джерела даних.
- Дрібні реальні баги, знайдені по дорозі (Vite manifest, мертвий дублікат класу в `DashboardController.php`) — фіксити одразу, а не залишати "на потім".
