(function($){
  $(document).ready(function(){

    // Initialises js for individual works pages, takes jquery object that is the container for the work content
    function initialiseWorkPage(workContentContainer){
      this.workContent = $(workContentContainer).find('.work-content');
      workContentContainer.find('.work-carousel').slick({
        infinite: false,
        autoplay: true,
        arrows: false,
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
        this.profile.addClass('hide-profile-content');
        setTimeout(function(){
          _this.profileContent.hide();
        }, 400);
      }
      this.unhideProfile = function(){
        this.profileContent.show();
        setTimeout(function(){
          this.profile.removeClass('hide-profile-content');
        }, 50);
      }

      this.openWorks = function(workID){
        _this.profile.toggleClass('show-work');
        _this.hideProfile();
        _this.lockGraduateImage();

      }

      this.closeWorks = function(){
        _this.profile.toggleClass('show-work');
        _this.unhideProfile();
        _this.unlockGraduateImage();
      }

      this.loadWork = function(workID){
        var workURL = $('a[data-work-id="' + workID + '"]').attr('href');
        var workContent;
        var thisWork = $('.detailed-works .work-' + workID);
        // Append container and load the detailed work
        if( thisWork.length == 0 ){
          this.worksContainer.append('<div class="work-' + workID +'"></div>');
          thisWork = $('.detailed-works .work-' + workID);
          // Load content into container
          thisWork.load(workURL + ' .work-content', function(){
            initialiseWorkPage(thisWork);
          });
        }
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
        _this.openWorks();
        _this.loadWork($(this).data('work-id'));
      });
    }

    // Initialises profile js
    if($('#graduate-profile').length){
      $('#graduate-profile').each(function(){
        new graduateProfile(this);
      });
    }


  });
})(jQuery);
