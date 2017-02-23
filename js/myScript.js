jQuery(function () {


		$('.close1').on('click', function(c){
				$(this).parent().fadeOut('slow', function(c){
							$(this).parent().remove();
              var prod_id=$(this).parent().attr('id');
              var user_id=$(this).parent().attr('user');
              jQuery.ajax({
                url: "ActionOnShopCart.php",
                method: 'POST',
                data: { product_id:prod_id,
                        user_id: user_id,
                        quantity:1,
                        action : 'delete'
                      }
              }).done(function(data) {
    		      //$(this).addClass( "done" );
    		        alert(data);
    		      }).fail(function(data) {
    		      //$(this).addClass( "fail" );
    		        alert(data);
    		      });
				});
		});

    jQuery('#mytable').css({
        display : 'none'
    });
    jQuery('#btnHist').on('click',function (){
        jQuery('#mytable').css({
            display : 'block'
        });

    });


})
