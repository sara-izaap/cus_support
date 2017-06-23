$(function(){

});	

//to delete selected record from list.
function delete_record(del_url,elm){

	$("#div_service_message").remove();
    
    	retVal = confirm("Are you sure to remove?");

        if( retVal == true ){
   
            $.post(base_url+del_url,{},function(data){           
                
                if(data.status == "success"){
                //success message set.
                service_message(data.status,data.message);
                
                //grid refresh
                refresh_grid();
    
            }
            else if(data.status == "error"){
                 //error message set.
                service_message(data.status,data.message);
            }
            
            },"json");
       }       
      
}

/* refresh grid after ajax submitting form */
function refresh_grid(data_tbl){
     
     data_tbl =(data_tbl)?data_tbl:"data_table";
     var cur_page = $("#base_url").val()+$("#cur_page").val();
     $.fn.init_progress_bar();
     $.fn.display_grid(cur_page,data_tbl);
}

function service_message(err_type,message,div_id){
    
    div_id = (div_id)?div_id:false; 	

    $("#div_service_message").remove();
    
    var str  ='<div id="div_service_message" class="Metronic-alerts alert alert-'+err_type+' fade in">';
        str +='<button class="close" aria-hidden="true" data-dismiss="alert" type="button"><i class="fa-lg fa fa-warning"></i></button>';
	    str +='<strong>'+capitaliseFirstLetter(err_type)+':&nbsp;</strong>';
	    str += message;
        str +='</div>';
        
    if(div_id){
         $("#"+div_id).html(str);
    }
    else
    {
        $(".blue-mat").after(str);
        scroll_to("div_service_message");
    }
            
}

function scroll_to(jump_id){
    //page scroll
    if(jump_id !=""){
       $(window).scrollTop($('#'+jump_id).offset().top); 
    }
}

function capitaliseFirstLetter(string)
{
    return string.charAt(0).toUpperCase() + string.slice(1);
}