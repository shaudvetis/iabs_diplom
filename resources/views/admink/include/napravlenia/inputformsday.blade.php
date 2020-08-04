@include('admink.include.naprav_settings.course_button')
<!-- Участие в операциях -->

 <!-- Подключаются кнопки курсов и десятков -->

<!-- Подключаются кнопки курсов и десятков -->
    <input type="submit"  name="x1"  value="Курація хворого">
    <!-- <input type="submit"  name="x2" value="Курація хворого">
    <input type="submit"  name="x3" value="Засвоєні навички">
    <input type="submit"  name="x4" value="Засвоєна література"> -->
 @isset($_GET["a1"])
<table class="table-sm">
<tr>
@foreach($result2 as $user_inf)
@if($user_inf['decatki']==1 and $user_inf['course']==2)
@include('admink.include.napravlenia.inputformsday_table')
@endif
 @endforeach
 </tr>
</table>
@endisset


@isset($_GET["a2"])
<table class="table-sm">
<tr>
@foreach($result2 as $user_inf)
@if($user_inf['decatki']==2 and $user_inf['course']==2)
@include('admink.include.napravlenia.inputformsday_table')
@endif
 @endforeach
 </tr>
</table>
@endisset
