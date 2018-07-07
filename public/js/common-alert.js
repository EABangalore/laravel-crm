
$(document).ready(function(){

  var baseUrlMain = $('#allTheBaseUrl999987').val();

 // alert(baseUrl+'/show-customer/');

 // baseUrl = baseUrl+'/show-customer/';   

    $.ajax({
      url:baseUrlMain+'/all-notifications',//{{URL::to('/all-notifications')}},
      type:'GET',
      data:{'':''},
      dataType:'json',
      success:function(data){
           
           console.log('all alerts',data);

           $('#navbar-menu .bg-danger').text(data.count);

           var li = '';

            $.each(data.data,function(i,v){

             baseUrl = baseUrlMain+'/show-customer/'+v.id;

               li += '<li><a href="'+baseUrl+'" class="notification-item"><span class="dot bg-warning"></span>'+v.contact_name+'</a></li>';
              
              baseUrl = '';
               
            })

            console.log(li);  

           $('#navbar-menu .dropdown-menu.notifications').append(li);

          // alert('imhere');
      }
    });


});

    
