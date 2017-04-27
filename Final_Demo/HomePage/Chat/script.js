$(document).ready(function(){

    $('.chat_head').click(function(){
        $('.chat_body').slideToggle('slow');
    });
	
	$('.user').click(function(){
		$('.msg_wrap').show();
		$('.msg_box').show();
	});
	
	$('textarea').keypress(
    function(e){
        if (e.keyCode == 13) {
            e.preventDefault();
            var msg = $(this).val();
			$(this).val('');

			var userName = this.id.substr(0, this.id.indexOf("_"))

			if(msg!=''){
                $.post( "chat.php", { ajax_action: 'send', text: msg, to_user: userName },
					function( data ) {
						console.log(data);
                	}// end ajax function
				);
			}

			$('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
        }
    });
	
});