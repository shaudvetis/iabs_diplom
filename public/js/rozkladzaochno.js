//Запуск страницы заочное расписание у руководителя
var BaseRecord={
getbazauser: function(id){
   var ajaxSetting={
      method: 'get',
      url: '/admink.kerivnuk.rozkladz', 
      data: {
         id:id,
         name:'getbazaintern',
      },
      success:function(response){
   // console.log(response);
     $('.panel').html(data.table);
  },
  error: (error) => {
    console.log(JSON.stringify(error));
   },
   };
   $.ajax(ajaxSetting);	
},
getotdeleniya:function(otdeleniya){
   var ajaxSetting={
      method: 'get',
      url: '/admink.kerivnuk.rozkladz', 
      data: {
         otdeleniya:otdeleniya,
         name:'otdeleniya',
      },
      success:function(response){
   //alert(response);
     var data_json=JSON.parse(response);
     var str_json="";
     str_json+="<option>"+"Оберіть..."+"</option>";
     for(var i in data_json) {
     str_json+="<option value='"+data_json[i]['id']+"'>"+data_json[i]['name_otdeleniya']+"</option>";
     }
     $(".selectvid").html(str_json);
     },
   error: (error) => {
    console.log(JSON.stringify(error));
   },
   };
   $.ajax(ajaxSetting);	
},

postrozkladz:function(course, yearstart,user_id,bazainternatyr_id, selectvid, month){
 var ajaxSetting={
      method: 'post',
      url: '/admink.kerivnuk.rozkladz', 
      data: {
         course:course,
         yearstart:yearstart,
         user_id:user_id,
         bazainternatyr_id:bazainternatyr_id,
         selectvid:selectvid,
         month:month,
         name:'new',
         '_token': $('meta[name="csrf-token"]').attr('content'),
      },
      success:function(response){
   alert(response);
 BaseRecord.getrozkladz($('.yearstart').val(),$(".month").val(),$('.user_id').val());
    },
  error: (error) => {
    console.log(JSON.stringify(error));
   },
   };
   $.ajax(ajaxSetting);	
},

getrozkladz: function(yearstart, month,user_id){
   var ajaxSetting={
      method: 'get',
      url: '/admink.kerivnuk.rozkladz', 
      data: {
         yearstart:yearstart,
         month:month,
         user_id:user_id,
         name:'getrozklad',
      },
      success:function(data){
//console.log(data.table);
   $('.getrozkladz').html(data.table);
  },
  error: (error) => {
    console.log(JSON.stringify(error));
   },
   };
   $.ajax(ajaxSetting);	
},
deleteone:function(id){ 
   var ajaxSetting={
     method: 'post',
      url: '/admink.kerivnuk.rozkladz', 
      data: {
         id:id,
         name:'delete',
         '_token': $('meta[name="csrf-token"]').attr('content'),
      },
      success: function(data){
         //alert(data);
          return false;
       $('.listbuttonremove').click(function(){ 
         BaseRecord.deleteone($(this).attr('id'));
          return false;
          BaseRecord.getrozkladz();
         });         
      },
   };
   $.ajax(ajaxSetting); 
},

getrozkladzyear:function(yearstart){ 
   var ajaxSetting={
     method: 'post',
      url: '/admink.kerivnuk.rozkladz', 
      data: {
         yearstart:yearstart,
         name:'rozkladyear',
         '_token': $('meta[name="csrf-token"]').attr('content'),
      },
      success: function(data){
      //console.log(data.table);
     $('.getrozkladyears').html(data.table);
      },
   };
   $.ajax(ajaxSetting); 
},
getrozkladzmonth: function(yearstart, month,user_id){
	//alert(month);
   var ajaxSetting={
      method: 'get',
      url: '/admink.kerivnuk.rozkladz', 
      data: {
         yearstart:yearstart,
         month:month,
         user_id:user_id,
         name:'getrozkladzmonth',
      },
      success:function(data){
      	//console.log(data.table);
   $('.getrozkladzmonth').html(data.table);
  },
  error: (error) => {
    console.log(JSON.stringify(error));
   },
   };
   $.ajax(ajaxSetting);	
},

};

