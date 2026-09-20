 <tr style="background-color:lightgrey">
    <th style="width: 2px;">#</th>
    <th>Назва </th>
    <th>Питання </th>
    <th>К</th>
    <th>Д</th>
</tr>
<?php $dubl=null; ?>
@foreach($seminarse as $key =>$moduls)

<tr>
	<th></th>
	@if($dubl !== $moduls->title)
 <th colspan="2">{!!$moduls->title!!} </th>

  <td><button type="submit" name="create1" value="1"><i class="fa fa-edit"></i></button></td>
  <td><button type="submit" name="delete1"><i class="fa fa-trash"></i></button></td>
<?php  $dubl=$moduls->title;   ?>
@endif
</tr>
<tr>
 <td style="width: 2px;">{!!$moduls->npp!!}</td>
 <td>{!!$moduls->tema!!}</td>
 <td><textarea type="text" name="pract_nav" class="pract_nav" value="{!!$moduls->pract_nav!!}" size="auto">{!!$moduls->pract_nav!!} </textarea></td>
   <td><button type="submit" name="create1" value="1"><i class="fa fa-edit"></i></button></td>
  <td><button type="submit" name="delete1"><i class="fa fa-trash"></i></button></td>
</tr>
 <td>
 	

 @endforeach