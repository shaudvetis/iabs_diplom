<style>
/*table{ если менять ширину то сдвигается и таблица с предметами
  width: 10% 
}
*/ .aside1{  /* right:5px; селектор блока, который будет оставаться на месте */
/* width: 800px;*/
width: 62%;
height: 65%;
position: fixed;
right: 1px;
z-index: 1000;
float: left;

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

thead {
  position: sticky;
  top: 0;
  background: #6c7ae0;
  text-align: left;
  font-weight: normal;
  font-size: 1.1rem;
  color: white;
  float: left;
}
td { /* border: 1px solid #dee2e6;*/
border: 1px solid #dee2e6;
text-align:left;

}
.layer {
overflow: scroll; /* Добавляем полосы прокрутки */
}
/* Это для того чтоб таблицу с npp подтянуть в верхний угол*/
.maket {
position: relative;
top: +30px;
}
</style>