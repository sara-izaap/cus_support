$(function() 
{
	$('.chosen-select').chosen();

    $('.chosen-select-deselect').chosen({
        allow_single_deselect: true,
        search_contains: true
    });
});

$("input[name='check_cus_state']").on("click", function() 
{

    var cus_type = $(this).val();

    if (cus_type == "EC") 
    {
        $(".exist_user_info").css('visibility', 'visible');
        $("#new_user_info").hide("slow");
    } 
    else 
    {
        $(".exist_user_info").css('visibility', 'hidden');
        $("#new_user_info").show("slow");
    }
});

$(".submit_ticket").on("click", function() 
{
    var cus_type = $("input[name='check_cus_state']").is(":checked"),
        
        subject = $("input[name='subject']").val(),
        
        comment = $("#comments").val(),
        
        emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        
        error = '';

    if (!cus_type) 
    {
        error += "Please Select User Type!\n";
    } 
    else 
    {
    	var cus_type = $("input[name='check_cus_state']:checked").val();

        if (cus_type == "NC") 
        {
		    var first_name = $("input[name='first_name']").val(),
		        last_name = $("input[name='last_name']").val(),
		        email = $("input[name='email']").val(),
		        mobile = $("input[name='phone']").val(),
		        address = $("#address").val();

		    if(first_name == '')
		      error += "Please Enter Your First Name!\n";
		    if(last_name == '')
		      error += "Please Enter Your Last Name!\n";
		    if(email == '' || !emailReg.test(email))
		      error += "Please Enter Valid Email!\n";
		    if(mobile == '')
		      error += "Please Enter Your Phone!\n";
		    if(address == '')
		      error += "Please Enter Your Address!\n";
        } 
        else 
        {
           var user_id = $("#userid").val();

           if (user_id == '') 
           {
             error += "Please Select your Name/Email!\n";
           }
        }
    }

    if (subject == '')
      error += "Please Select Subject!\n";

    if (comment == '')
      error += "Please Enter Your Comments!";

    if(error) 
    {
        alert(error);
    } 
    else 
    {

        $.ajax({

            url: base_url+'index.php/support/add',

            type: 'POST',

            dataType: 'json',

            data: $("#add_ticket_form").serialize(),

            success: function(data)

            {
                alert(data.msg);
                if(data.status="success")
                {
                	location.reload();

                }
            }
        });

    }


});