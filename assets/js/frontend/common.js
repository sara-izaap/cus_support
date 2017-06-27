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
        $(".exist_user_info").css('height', '40px');
        $("#new_user_info").hide();
    } 
    else 
    {
        $(".exist_user_info").css('visibility', 'hidden');
        $(".exist_user_info").css('height', '0');
        $("#new_user_info").show();
    }
});

