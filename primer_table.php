<table border="1">
	
		<tr>
	<th>фио студента</th>
    <th>диагноз </th>
    <th>номер</th>
    <th>дата курации</th>
    <th>дата введения данных</th>
</tr>
<td> {!! $inputform->id_student !!} </td>
 <p>
 <td>	{!! $inputform->diagnoses !!} </td>	

</p>
<p>
<td>{!! $inputform->num_card !!} </td>	
	
</p>
	<p>
<td>	{!! $inputform->apdate !!}	</td>
	
</p>
<p>
<td> published:	{!! $inputform->created_at !!}	</td>

</p>
