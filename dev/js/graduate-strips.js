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
          if(strips.hasClass('mCustomScrollbar')){
            strips.mCustomScrollbar('scrollTo', 0);
            strips.mCustomScrollbar('update');
          }
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
      _this.mobileFilterButton = $(el).find('.toggle-graduate-filters.button');
      _this.gradFilters = $(el).find('.graduate-filters');
      _this.gradFiltersWrapper = $(el).find('.graduate-filters-wrapper');
      _this.filterButtons = $(el).find('.menu-item');
      _this.graduates = $('.single-grad');

      _this.showGraduatesOfClass = function(filterClass){
        if(filterClass == 'all'){
          _this.graduates.addClass('active')
          return _this;
        }
        _this.graduates.removeClass('active');
        _this.graduates.addClass('hide');
        setTimeout(function(){
          _this.graduates.filter('.' + filterClass).each(function(){
            $(this).addClass('active');
            $(this).prependTo( $(this).parents('.strip') );
          });
        },400);
        setTimeout(function(){
          _this.graduates.removeClass('hide');
        }, 600);
        return _this;
      }

      _this.setActiveFilter = function(el){
        _this.filterButtons.filter('.active').removeClass('active');
        $(el).addClass('active');
        return _this;
      }

      /*
       * Opens the filter menu on mobile
       */
      _this.openMobileFilters = function(){
        _this.gradFiltersWrapper.show();
        $('body').addClass('hide-header').addClass('hide-overflow');
        setTimeout(function(){
          _this.gradFiltersWrapper.addClass('visible');
        },50);
      }

      /*
       * Closes the filter menu on mobile
       */
      _this.closeMobileFilters = function(){
        $('body').removeClass('hide-header').removeClass('hide-overflow');
        _this.gradFiltersWrapper.removeClass('visible');
        setTimeout(function(){
          _this.gradFiltersWrapper.hide();
        },400);
      }

      /*
       * Handles the mobile filter button toggle event to open and close
       */
      _this.mobileFilterButton.click(function(e){
        if(!_this.gradFiltersWrapper.hasClass('visible')){
          _this.openMobileFilters();
        } else {
          _this.closeMobileFilters();
        }
      });

      /*
       * Handles what happens when filter buttons are clicked, both on desktop and on mobile
       */
      _this.filterButtons.click(function(e){
        if(!$(this).hasClass('active')){
          _this.setActiveFilter(this).showGraduatesOfClass( $(this).data('filter-class') );
          _this.mobileFilterButton.html('Filter: ' + $(this).text());
          if(strips.hasClass('mCustomScrollbar')){
            strips.mCustomScrollbar('scrollTo', 0);
          }
        }
        // If is mobile filter, then close the filters
        if($(this).parents('.graduate-filters-wrapper').hasClass('visible')){
          _this.closeMobileFilters();
        }
      });

      _this.gradFiltersWrapper.click(function(e){
        if($(e.target).hasClass('visible')){
          _this.closeMobileFilters();
        }
      });

    }
    var gradFilter = new GraduatesFilter('.graduate-filters-container');



  });
})(jQuery);
