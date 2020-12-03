(function($) {
  'use strict';

  var AppMDCN = (function(){

    function init(){
      customToggleActions();
      customScrollbar();
      formValidation();
    }

    $(window).on('load', function(){
      $('#preloader-wrap').addClass('loaded');
    });

    function customToggleActions(){
      $(".ms-toggler").bind('click', function(){

        var target = $(this).data('target');
        var toggleType = $(this).data('toggle');

        switch(toggleType) {

        //Aside Left
        case 'slideLeft':
          $(target).toggleClass('ms-aside-open');
          $(".ms-aside-overlay.ms-overlay-left").toggleClass('d-block');
          $("body").toggleClass('ms-aside-left-open');
          break;
        // Aside Right
        case 'slideRight':
          $(target).toggleClass('ms-aside-open');
          $(".ms-aside-overlay.ms-overlay-right").toggleClass('d-block');
          break;
        // Navbar Slide down
        case 'slideDown':
          $(target).toggleClass('ms-slide-down');
          break;
        // Quick bar
        case 'hideQuickBar':
          quickBarReset();
          break;
        default:
          return;

        }

      });
    }

    function customScrollbar(){

      if( $('.ms-scrollable').length > 0 ){
        $('.ms-scrollable').each(function(){
          var ps = new PerfectScrollbar($(this)[0], {
            maxScrollbarLength : 700,
            wheelPropagation : true
          });
        });
      }

      if( $('.ms-aside-scrollable').length > 0 ){
        var psAside = new PerfectScrollbar($('.ms-aside-scrollable')[0], {
          maxScrollbarLength : 700,
          wheelPropagation : true,
          wheelSpeed : 0.5
        });

        $(".ms-main-aside").on('click', '.has-chevron', function(){
          psAside.update();
        });
      }

    }

    function formValidation(){
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    }

    return {
      init: init
    }

  })();

  AppMDCN.init();

})(jQuery);
