<style>
 .topFixed{
   position: fixed; 
   background: white; 
   width: 100%; 
   height: 55px; 
  /* border-left: 1px solid black;
   border-top:1px solid black;*/
 }
 .toptable{
  background: white; 
  
 }
 .topFixed:last-child { 
    background: black;
   }
 .aside1{  /* селектор блока, который будет оставаться на месте */
/* width: 800px;*/
width: 40%;
height: 80%;
position: fixed;
right: 1px;
z-index: 1000;

}
.tema{
  width: 600px;
}
.course{  /* right:5px; селектор блока, который будет оставаться на месте */
/* width: 800px;*/
width: 65%;
float: right;

}
.min{  /* right:5px; селектор блока, который будет оставаться на месте */
/* width: 800px;*/
width:310px;
float: left;

}
.smol_input   {
 height: 25px;
 width: 25px;
}
.smol_select   {
  height: 25px;
  width: 40px;
}
.smol_td   {
  height: 25px;
  width: 25px;
}

.aside3{  /* селектор блока, который будет оставаться на месте */
/* width: 800px;*/
position: fixed;
z-index: 1000;
width: 70%;
margin-bottom: 50%; 

}

.layer {
overflow: scroll; /* Добавляем полосы прокрутки */
}
/* Это для того чтоб таблицу с npp подтянуть в верхний угол*/
.maket {
position: relative;
top: +6px;
}
td { /* border: 1px solid #dee2e6;*/
border: 1px solid #dee2e6;
text-align:left;

}
button {
  padding: 0;
    margin: 0;
}
</style>