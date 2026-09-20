$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
})

var BaseRecord={

ocenkinb:function(course){
   var ajaxSetting={
      method: 'get',
      url: '/pass-nb',
      data: {
         course:course
      },
      success: function(data){
        // alert(data.table);
       $('.table-nb').html(data.table);
      },
   };
   $.ajax(ajaxSetting); 
},

};