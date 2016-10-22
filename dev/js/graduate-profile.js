(function($){
  $(document).ready(function(){

    // Initialises js for individual works pages, takes jquery object that is the container for the work content
    function initialiseWorkPage(workContentContainer){
      var _this = this;
      if(!workContentContainer){
        var workContentContainer = $('body');
      }
      this.workContent = $(workContentContainer).find('.work-content');
      this.carousel = workContentContainer.find('.work-carousel').slick({
        infinite: false,
        autoplay: true,
        arrows: false,
        dots: true
        // variableWidth: true,
      });

      this.carousel.find('.work-carousel-item').click(function(e){
        _this.carousel.slick('slickGoTo', $(this).index() );
      });

      $(workContentContainer).find('.close-works').click(function(e){
        e.preventDefault();
        graduateProfile.closeWorks();
      });

      this.workContent.addClass('loaded');
    }


    function graduateProfile(profileIdentifier){

      var _this = this;
      this.profile = $(profileIdentifier);
      this.inTransition = false;
      this.profileContent = $(this.profile).find('.right-panel');
      this.gradImage = $(this.profile).find('.grad-image');
      this.profileScrollPosition = null;
      this.worksContainer = $('.detailed-works');


      this.lockGraduateImage = function(){
        this.gradImage
          .css('height', $('.grad-image').outerHeight())
          .css('width', $('.grad-image').outerWidth());
      }
      this.unlockGraduateImage = function(){
        this.gradImage
          .css('height', 'auto')
          .css('width', '50vw');
      }


      this.hideProfile = function(){
        this.profile.addClass('show-work');
        this.profile.addClass('hide-profile-content');
        setTimeout(function(){
          _this.profileContent.hide();
        }, 400);
      }
      this.unhideProfile = function(){
        this.profileContent.show();
        this.profile.removeClass('show-work');
        setTimeout(function(){
          _this.profile.removeClass('hide-profile-content');
        }, 50);
      }


      this.openWorks = function(workID){
        _this.hideProfile();
        _this.lockGraduateImage();
        // Show works container
        this.worksContainer.show();
        setTimeout(function(){
          _this.profile.removeClass('hide-detailed-works');
        }, 50);
      }
      this.closeWorks = function(){
        // Hide works container
        this.profile.addClass('hide-detailed-works');
        this.hideWorks();

        setTimeout(function(){
          _this.worksContainer.hide();
        }, 600);
        // Unhide profile
        setTimeout(function(){
          _this.unlockGraduateImage();
          _this.unhideProfile();
        }, 300);
      }

      this.showWork = function(workID){
        var thisWork = this.worksContainer.find('.work-' + workID);
        thisWork.show();
        setTimeout(function(){
          thisWork.addClass('view');
        }, 50);
      }
      this.hideWorks = function(){
        var works = this.worksContainer.find('.work-container');
        works.removeClass('view');
        setTimeout(function(){
          works.hide();
        }, 400);
      }

      this.loadWork = function(workID){
        var thisWork = this.worksContainer.find('.work-' + workID);
        // Append container and load the detailed work
        if( thisWork.length == 0 ){
          var workURL = $('a[data-work-id="' + workID + '"]').attr('href');
          var workContent;

          this.worksContainer.append('<div class="work-container work-' + workID +'"></div>');
          thisWork = $('.detailed-works .work-' + workID);
          // Load content into container
          thisWork.load(workURL + ' .work-content', function(){
            _this.showWork(workID);
            initialiseWorkPage(thisWork);
          });
        } else {
          _this.showWork(workID);
        }
      }



      this.goToWork = function(workID){
        this.openWorks();
        this.loadWork(workID);
      }


      // Checks scroll positions and blurs graduate profile if user has scrolled beyond threshold
      this.updateGraduateProfileBlur = function (){
        this.profileScrollPosition = $('body').scrollTop();
        if ( _this.profileScrollPosition <= 50 ) {
          $( '#workJS' ).removeClass( 'work-show' );
          $( '#leftPanelJS' ).removeClass( 'work-show' );
        } else {
          $( '#workJS' ).addClass( 'work-show' );
          $( '#leftPanelJS' ).addClass( 'work-show' );
        }
      }
      $(window).scroll(function(){
        _this.updateGraduateProfileBlur();
      });
      this.updateGraduateProfileBlur();



      $('.author .work-strip').click(function(e){
        e.preventDefault();
        _this.goToWork($(this).data('work-id'));
      });

    }


    // Initialises profile js
    if($('#graduate-profile').length){
      var graduateProfile = new graduateProfile(('#graduate-profile'));
    }

    if($('.single-work').length){
      initialiseWorkPage();
    }


  });
})(jQuery);
