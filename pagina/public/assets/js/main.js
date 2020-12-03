(function($){
    "use strict";
    
    //cart
    $(document).on('click', '.add-to-cart', function(e){
        e.preventDefault();
        var button = $(this);
		var code = $(this).attr('data-code');
        var qty = 1;
        addToCart(code, qty, button);
    });

    $(document).on('change', '.update_to_cart_input', function(e){
		e.preventDefault();

		var qty = parseInt($(this).val());
		var code = $(this).attr("data-code");
	
		updateToCart(code, qty);
    });

    $(document).on('click', '.remove_from_cart', function(e){
        e.preventDefault();
		var code = $(this).attr("data-row");
        removeFromCart(code);
    });

    $(document).on('click', '.add_to_cart_detail',function (e) {
		e.preventDefault();
		var button = $(this);
		var code = $(this).attr("data-code");
		var qty = parseInt(button.parent().find("#qty").val());
        addToCart(code, qty, button);
	});

    //Add to cart
	function addToCart(code, qty, button){
		var spinnerLoading = button.parent().find(".spinner-loading");
		//ajax
		$.ajax({
			type: "GET",
			url: `${APP_URL}/cart/add-to-cart`,
			dataType: "html",
            cache: false,
			data: { code: code, qty: qty },
			beforeSend: function(){
					spinnerLoading.addClass('d-block');
					button.addClass('d-none');
			},
			success: function(response){
				var response = JSON.parse(response);
				if(response.status == 'success')
				{
					setTimeout(function(){
						spinnerLoading.removeClass('d-block');
						button.removeClass('d-none');
					}, 1000);
				}
			}
		});
    };
    
    //Update to cart
    function updateToCart(code,qty){
		//ajax
		$.ajax({
			type: "GET",
			url: `${APP_URL}/cart/update-to-cart`,
			dataType: "html",
			data: {code: code, qty: qty},
			beforeSend: function(){
			},
			success: function(response){
				var response = JSON.parse(response);
				if(response.status == 'success')
				{	
					ListDetailCart();
				}
			}
  		});
    };
    
    //Remove to cart
    function removeFromCart(code){

		//ajax
		$.ajax({
			type: "GET",
			url: `${APP_URL}/cart/remove-from-cart`,
			dataType: 'json',
			data: { code: code},
			beforeSend: function(){
			},
			success: function(response){
				ListDetailCart();
			}
		});
	};

	function ListDetailCart() {
        
		var _url = APP_URL+'/cart/detail-cart';
	
		$.ajax({
			data:  null,
			url:   _url,
			type:  'GET',
			beforeSend: function () {
			},
			success:  function (data) {
				$('#block_detail_cart').html(data);
				SumaryCart();
			}
		});	
	};

	function SumaryCart() {
        
		var _url = APP_URL+'/cart/sumary-cart';
	
		$.ajax({
			data:  null,
			url:   _url,
			type:  'GET',
			dataType: 'json',
			beforeSend: function () {
			},
			success:  function (data) {
				$('#subtotal').html(data.result.subtotal);
				$('#discount').html(data.result.discount);
				$('#total').html(data.result.total);
			}
		});	
	};

	//form contact
    $('#FormContacto').on('submit', function (e) {
		e.preventDefault();
          var url = APP_URL+"/contactenos";
          var btn = document.getElementById("btn-contact");
            $.ajax({
                type: "POST",
                url: url,
                dataType:"html",
				cache: false,
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: $(this).serialize(),
                beforeSend: function(){
				  btn.disabled = true;
				  $("#spinnerc").removeClass("d-none");
                },
                success: function (response)
                {
                  response = JSON.parse(response);
                  if(response.state == "success")
                  {
                    //toast
                    $("#FormContacto").trigger('reset');
                    btn.disabled = false;
                    $("#spinnerc").addClass("d-none");
                  }else
                  {
                    //toast
                  }
                  btn.disabled = false;
                  $("#spinnerc").addClass("d-none");
                }
            });
	});
	
	//acoordion faq
	$("#accordionfaq").on("hide.bs.collapse show.bs.collapse", function(e) {
		$(e.target)
		  .prev()
		  .find("i:last-child")
		  .toggleClass("fa-minus fa-plus");
	});

	//acoordion pinfo
	$("#accordionpinfo").on("hide.bs.collapse show.bs.collapse", function(e) {
		$(e.target)
		  .prev()
		  .find("div.plus-minus-toggle")
		  .toggleClass("accordion-item-expanded");
		$(e.target)
		  .prev()
		  .find("div.toggle-message")
		  .toggleText("Ver Menos", "Ver Más");
	});

	//function toggleText
	$.fn.toggleText = function(t1, t2){
		if (this.text() == t1) this.text(t2);
		else                   this.text(t1);
		return this;
	};

	/*---canvas menu activation---*/
    $('.canvas_open').on('click', function(){
        $('.Offcanvas_menu_wrapper,.off_canvars_overlay').addClass('active')
    });
    
    $('.canvas_close,.off_canvars_overlay').on('click', function(){
        $('.Offcanvas_menu_wrapper,.off_canvars_overlay').removeClass('active')
	});
	
	/*---Off Canvas Menu---*/
    var $offcanvasNav = $('.offcanvas_main_menu'),
        $offcanvasNavSubMenu = $offcanvasNav.find('.sub-menu');
    $offcanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i class="fa fa-angle-down"></i></span>');
    
    $offcanvasNavSubMenu.slideUp();
    
    $offcanvasNav.on('click', 'li a, li .menu-expand', function(e) {
        var $this = $(this);
        if ( ($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand')) ) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length){
                $this.siblings('ul').slideUp('slow');
            }else {
                $this.closest('li').siblings('li').find('ul:visible').slideUp('slow');
                $this.siblings('ul').slideDown('slow');
            }
        }
        if( $this.is('a') || $this.is('span') || $this.attr('clas').match(/\b(menu-expand)\b/) ){
        	$this.parent().toggleClass('menu-open');
        }else if( $this.is('li') && $this.attr('class').match(/\b('menu-item-has-children')\b/) ){
        	$this.toggleClass('menu-open');
        }
    });

  
})(jQuery);