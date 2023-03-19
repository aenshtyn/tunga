(function($){
"use strict";

    /*------ Related Post ------*/
    $('.related-education-service-active').slick({
      slidesToShow: 3,
      arrows:true,
      dots: false,
      prevArrow: '<div class="btn-prev"><i class="fa fa-angle-left"></i></div>',
      nextArrow: '<div><i class="fa fa-angle-right"></i></div>',
       responsive: [{
          breakpoint: 991,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });

    /*------ Counter Active ------*/
    $('.counter').counterUp({
  		delay: 10,
  		time: 1000
  	});

    /*------ Wow Active ----*/
    new WOW().init();

    /*------ countdown ----*/
     $('[data-countdown]').each(function() {
        var $this = $(this), finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<div class="cdown days"><span class="counting">%-D</span>days</div><div class="cdown hours"><span class="counting">%-H</span>hrs</div><div class="cdown minutes"><span class="counting">%M</span>mins</div><div class="cdown seconds"><span class="counting">%S</span>secs</div>'));
        });
    });
	

})(jQuery);