(function($){
  $(document).ready(function(){

    /*
      Initializes scrollbar
    */
    var strips = $(".strips-container");

    function initialiseStripsScroll(){
      strips.mCustomScrollbar({
          axis: 'x',
          advanced: {
            updateOnContentResize: true,
          }
      });
    }

    /*
      Controls the responsiveness on the strips
    */
    function updateStrips(){
      var vw = $(window).innerWidth();
      if(vw < 700){
        
        if(strips.hasClass('mCustomScrollbar')){
          strips.mCustomScrollbar('destroy');
        }

      } else {

        if(!strips.hasClass('mCustomScrollbar')){
          initialiseStripsScroll();
        }

        setTimeout(function(){
          strips.mCustomScrollbar('scrollTo', 0);
          strips.mCustomScrollbar('update');
        }, 100);

      }
    }
    updateStrips();
    $(window).on('resize', function(){
      vw = $(window).innerWidth();
      updateStrips();
    });


    /*
      Filter these cuties
    */
    function GraduatesFilter(el){
      var _this = $(this);
      _this.filterButtons = $(el).find('.menu-item');
      _this.graduates = $('.single-grad');

      _this.showGraduatesOfClass = function(filterClass){
        if(filterClass == 'all'){
          _this.graduates.addClass('active')
          return _this;
        }
        _this.graduates.removeClass('active');
        _this.graduates.css('opacity', 0);
        setTimeout(function(){
          _this.graduates.filter('.' + filterClass).each(function(){
            $(this).addClass('active');
            $(this).prependTo( $(this).parents('.strip') );
          });
        },400);
        setTimeout(function(){
          _this.graduates.css('opacity', 1);
        }, 600);
        return _this;
      }

      _this.setActiveFilter = function(el){
        _this.filterButtons.filter('.active').removeClass('active');
        $(el).addClass('active');
        return _this;
      }

      _this.filterButtons.click(function(e){
        if(!$(this).hasClass('active')){
          _this.setActiveFilter(this).showGraduatesOfClass( $(this).data('filter-class') );
          strips.mCustomScrollbar('scrollTo', 0);
        }
      });

    }
    var gradFilter = new GraduatesFilter('.graduate-filters');



  });
})(jQuery);
