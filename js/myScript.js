jQuery(function () {
  counter=0;
  jQuery('#add-to-cart').on('click',function(e)
  {
    e.preventDefault();
    jQuery('.simpleCart_empty').text('');
    counter++;
    jQuery('#counter-cart').text(counter);
    myAjax = jQuery.ajax(
      {
        url: "ActionOnShopCart.php",
        method: 'POST',
        data: { product_id:""+<?=$product_id?>+"",
                user_id: ""+<?=$user->user_id ?>+"",
                quantity:1,
                action : 'insert'
              }
      }).done(function(data) {
      //$(this).addClass( "done" );
        alert(data);
      }).fail(function(data) {
      //$(this).addClass( "done" );
        alert(data);
      });

  });

		$('.close1').on('click', function(c){
				$(this).parent().fadeOut('slow', function(c){
							$(this).parent().remove();
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
