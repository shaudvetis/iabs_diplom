<style>
  table{
    text-align: center;
  }
  .thead-dark{
    background-color: lightgrey;
  }
  .table-container {
  width: 100%;
  overflow: auto;
  -webkit-overflow-scrolling: touch;
}
</style>
<!-- @php
 print_r($cards);
@endphp -->
<div onclick="printit();" class="button_print btn btn-danger">Друкувати</div>

@if (!empty($cards))
<div class="table-container">
<p><h3>Звіт присутності та запізнень інтернів</h3></p>
<table class="table-nb " style="width: 100%;" cellspacing="0">
  <tr class="thead-dark ">
    <th>ФІО</th>
    <th>Введення <br> в хір.</th>
    <th>Абд<br> хір.</th>
    <th>Тор. <br> хір.</th>
    <th>Гнійна <br> хір.</th>
    <th>Судинна <br> хір.</th>
    <th>Урологія </th>
    <th>Опіки</th>
    <th>Єндо</th>
    <th>Прокт.</th>
    <th>Амбул. хір.</th>
    <th>КРОК <br> Хір</th>
    <th>КРОК <br> Анест</th>
    <th>Запізнення</th>

</tr>

  <tr>

    @foreach($cards as $ocenka)
    @if ($ocenka['surname'] != '')

   <td><strong><i>{{$ocenka['surname']}}</i></strong></td>
   @else @continue;
   @endif

   @if (isset($ocenka['nppvx']))
   <td> @foreach($ocenka['nppvx'] as $ocenkas)
      {!!$ocenkas!!}    @endforeach </td>
    @else <td></td>    @endif
   

   @if (isset($ocenka['nppab']))
      <td> @foreach($ocenka['nppab'] as $ocenkas)  {!!$ocenkas!!}  @endforeach</td>
       @else <td></td>    @endif

      @if (isset($ocenka['npptx']))
      <td> @foreach($ocenka['npptx'] as $ocenkas)  {!!$ocenkas!!} @endforeach </td> 
      @else <td></td>    @endif

        @if (isset($ocenka['nppgx']))
      <td> @foreach($ocenka['nppgx'] as $ocenkas)  {!!$ocenkas!!} @endforeach </td> 
      @else <td></td>    @endif

  
    @if (isset($ocenka['nppsx']))
      <td> @foreach($ocenka['nppsx'] as $ocenkas)  {!!$ocenkas!!} @endforeach </td> 
      @else <td></td>    @endif

        @if (isset($ocenka['nppyr']))
      <td> @foreach($ocenka['nppyr'] as $ocenkas)  {!!$ocenkas!!} @endforeach </td> 
      @else <td></td>    @endif

        @if (isset($ocenka['nppop']))
      <td> @foreach($ocenka['nppop'] as $ocenkas)  {!!$ocenkas!!} @endforeach </td> 
      @else <td></td>    @endif

        @if (isset($ocenka['nppkx']))
      <td> @foreach($ocenka['nppkx'] as $ocenkas)  {!!$ocenkas!!} @endforeach </td> 
      @else <td></td>    @endif

        @if (isset($ocenka['npppr']))
      <td> @foreach($ocenka['npppr'] as $ocenkas)  {!!$ocenkas!!} @endforeach </td> 
      @else <td></td>    @endif

   @if (isset($ocenka['nppamb']))
      <td> @foreach($ocenka['nppamb'] as $ocenkas)  {!!$ocenkas!!} @endforeach </td> 
      @else <td></td>    @endif

       @if ($ocenka['surgery'])
      <td> {{$ocenka['surgery']}}  </td> 
      @else <td></td>    @endif

      @if ($ocenka['anest'])
      <td> {{$ocenka['anest']}} </td> 
       @else <td></td>    @endif


    <td><strong><i>{{$ocenka['zap']}}</i></strong></td>

</tr>

@endforeach

</table>

</div>
@endif