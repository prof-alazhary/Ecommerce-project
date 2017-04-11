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
		flag_to_show=0;
    jQuery('#btnHist').on('click',function (){
				if (flag_to_show==1) {
					jQuery('#mytable').css({
							display : 'none'
					});
					flag_to_show=0;
				}else {
					jQuery('#mytable').css({
							display : 'block'
					});
						flag_to_show=1;
				}
    });
		var user_id=$('.close1').parent().parent().attr('user');
		jQuery('#Produced_To_Buy').on('click',function (e) {
				e.preventDefault();
				jQuery.ajax({
					url: "ActionOnShopCart.php",
					method: 'POST',
					data: {	user_id:user_id ,
									action : 'update'
								}
				}).done(function(data) {
					jQuery('#mytable').css({
							display : 'none'
					});
					alert(data);
				}).fail(function(data) {
				//$(this).addClass( "fail" );
					alert(data);
				});
		})
		$('#counter-cart').text()

})
