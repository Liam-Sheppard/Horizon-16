(function($){
  $(document).ready(function(){

    // Initialises js for individual works pages, takes jquery object that is the container for the work content
    function initialiseWorkPage(workContentContainer){
      var _this = this;

      // Set work content container to be body if we are not on the profile page
      if(!workContentContainer){
        var workContentContainer = $('body');
      }

      // Define the body of work
      this.workContent = $(workContentContainer).find('.work-content');

      // Initialise coursel
      this.carousel = workContentContainer.find('.work-carousel').slick({
        infinite: false,
        autoplay: false,
        arrows: false,
        swipeToSlide: true,
        dots: true,
        nextArrow: '<span class="slick-next">Next</span>',
        prevArrow: '<span class="slick-prev">Prev</span>',
      });

      // Allows clicks on next and previous carousel items to navigate the slider
      this.carousel.find('.work-carousel-item').click(function(e){
        _this.carousel.slick('slickGoTo', $(this).index() );
      });

      // Allows back to profile button to close works
      $(workContentContainer).find('.mt-close-work').click(function(e){
        e.preventDefault();
        window.history.back();
        // history.pushState({work:graduateProfile.currentWork}, graduateProfile.currentWork);
        // graduateProfile.closeWorks();
      });

      // State the work is initialised
      this.workContent.addClass('loaded');
    }


    // Controls interactions with graduate profile
    function graduateProfile(profileIdentifier){
      var _this = this;
      this.profile = $(profileIdentifier);
      this.inTransition = false;
      this.profileContent = this.profile.find('.right-panel');
      this.gradImage = this.profile.find('.grad-image');
      this.profileScrollPosition = null;
      this.workStrips = this.profile.find('.work-strip');
      this.worksContainer = $('.detailed-works');
      this.currentWork = null;


      // Hides profile content so works can be shown
      this.hideProfile = function(){
        this.profile.addClass('show-work');
        this.profile.addClass('hide-profile-content');
        setTimeout(function(){
          _this.profileContent.hide();
        }, 400);
      }
      // Unhides profile content so works can be shown
      this.unhideProfile = function(){
        $("html, body").animate({ scrollTop: 0 });
        this.profileContent.show();
        this.profile.removeClass('show-work');
        setTimeout(function(){
          _this.profile.removeClass('hide-profile-content');
        }, 400);
      }
      // Animates works container to be hidden
      this.closeWorks = function(){
        this.currentWork = null;
        // Hide works container
        this.profile.addClass('hide-detailed-works');
        // Also hide individual works so they are not open when next work is viewed
        this.hideWorks();
        setTimeout(function(){
          _this.worksContainer.hide();
        }, 600);

        // Unhide profile
        setTimeout(function(){
          _this.unhideProfile();
        }, 300);
      }

      this.showWork = function(workID){
        var thisWork = this.worksContainer.find('.work-' + workID);
        var thisWorkCarousel = thisWork.find('.work-carousel');
        this.currentWork = workID;
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







      // Animates works container to show
      this.openWorks = function(){
        _this.hideProfile();
        // Show works container
        this.worksContainer.show();
        setTimeout(function(){
          _this.profile.removeClass('hide-detailed-works');
        }, 50);
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



      this.goToWork = function(workID, shouldPushState){
        $("html, body").animate({ scrollTop: 0 });
        if(workID == null || workID == undefined){
          if(shouldPushState === true){
            history.pushState({work:null}, 'Profile');
          }
          this.closeWorks();
        } else {
          if(shouldPushState === true){
            history.pushState({work:workID}, 'Work ' + workID);
          }
          this.openWorks();
          this.loadWork(workID);
        }
      }



      window.onpopstate = function(event){
        if(event.state){
          _this.goToWork(event.state.work, false);
        } else {
          _this.goToWork(null, false);
        }
      }



      // Checks scroll positions and blurs graduate profile if user has scrolled beyond threshold
      this.updateGraduateProfileBlur = function (){
        this.profileScrollPosition = $(window).scrollTop();
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


      // Open respective work when strip is clicked on
      this.workStrips.click(function(e){
        e.preventDefault();
        _this.goToWork($(this).data('work-id'), true);
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
