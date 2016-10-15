(function($){

  $(document).ready(function(){

    var strips = $(".strips-container").mCustomScrollbar({
        axis: 'x',
        advanced: {
          updateOnContentResize: true,
        }
    });

    $(window).on('resize', function(){
      var vw = this.innerWidth;
      console.log(vw);

      if(vw < 768){
        if(strips.hasClass('mCSB_container')){
          strips.mCustomScrollbar('destroy');
        }
      } else {
        setTimeout(function(){
          strips.mCustomScrollbar('scrollTo', 0);
          strips.mCustomScrollbar('update');
        }, 50);
      }
    });

    function GraduatesFilter(el){
      var _this = $(this);
      _this.filterButtons = $(el).find('.menu-item');
      _this.graduates = $('.single-grad');

      _this.showGraduatesOfClass = function(filterClass){
        if(filterClass == 'all'){
          _this.graduates.addClass('active')
          return _this;
        }
        _this.graduates.removeClass('active')
        _this.graduates.filter('.' + filterClass).addClass('active');
        return _this;
      }

      _this.setActiveFilter = function(el){
        _this.filterButtons.filter('.active').removeClass('active');
        $(el).addClass('active');
        return _this;
      }

      _this.filterButtons.click(function(e){
        if(!$(this).hasClass('active')){
          _this.setActiveFilter(this).showGraduatesOfClass( $(this).data('filter-class') )
        }
      });

    }
    var gradFilter = new GraduatesFilter('.graduate-filters');



  });

})(jQuery);
