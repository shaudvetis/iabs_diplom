<style>

/*@media screen and (max-width: 1280px) { div.contentblock {width: 1200px;} } @media screen and (max-width: 1140px) { div.contentblock {width: 1024px;} } @media screen and (max-width: 992px) { div. contentblock {width: 970px;} } */
@media only screen and (max-height :720px) {
table{
  width: 100%;
  margin-bottom: 10px;
}
.aside1{  /* селектор блока, который будет оставаться на месте */
width: auto;
height: 600px;
margin-right: 1px;
height: 90%;
position: fixed;
right: 5px;
z-index: 1000;
overflow: scroll;
}
table{
  width: 100%;
  overflow: scroll;
}
}

@media (min-height: 725px) {  /* для разрешения экрана от 470 до 930 пикселей */
 .aside1{  /* селектор блока, который будет оставаться на месте */
width: 900px;
margin-right: 1px;
height: 80%;
position: fixed;
right: 5px;
z-index: 1000;
overflow: scroll;

}
table{
  width: 100%;
  margin-bottom: 10px;
}
.tema{
  width: 30%;
}
#panel{
  width: 500px;
 }
label{
 font-size:10pt;
}
.toptable{
  background: white; 
  width: 100%;
  
 }
 .otpravit{
  float: right;
  margin-left: 500px;
 }
}
 .topFixed{
   position: fixed; 
   background: white; 
   width: auto; 
   height: 55px; 
  /* border-left: 1px solid black;
   border-top:1px solid black;*/
 }
 .toptable{
  background: white; 
  
 }
 .topFixed:last-child { 
    background: black;
    color: blue;
   }
 .aside1{  /* селектор блока, который будет оставаться на месте */
width: auto;
margin-right: 1px;
height: 70%;
position: fixed;
right: 5px;
z-index: 1000;
overflow: scroll;
}
.tema{
  width: 35%;
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
  width: 35px;
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