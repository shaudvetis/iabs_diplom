  <option selected >1</option>
     @foreach($napr as $naprs)
     <option  value="{!!$naprs->id!!} "> 
@php 
if ($naprs->in_days >=  $naprs->days) {

}    
else {
  echo "$naprs->name_napravlenie  - $naprs->min";
}
   
 
   @endphp
  </option>

     @endforeach