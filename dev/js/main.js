$(document).ready( function() {
  $('body').addClass('loaded');


  /*
  Mobile Menu Toggle
  */
  var navInTransition = false;
  function openMobileMenu(){
    if(!navInTransition){
      navInTransition = !navInTransition;
      $('#primary-navigation-menu').show();
      setTimeout(function(){
        $('body').addClass('show-mobile-menu');
        navInTransition = !navInTransition;
      },50);
    }
  }
  function closeMobileMenu(){
    if(!navInTransition){
      navInTransition = !navInTransition;
      $('body').removeClass('show-mobile-menu');
      setTimeout(function(){
        $('#primary-navigation-menu').hide();
        navInTransition = !navInTransition;
      },400);
    }
  }
  $('.toggle-mobile-menu').click(function(e){
      if(!$('body').hasClass('show-mobile-menu')){
        openMobileMenu();
      } else {
        closeMobileMenu();
      }
  });
  $('#primary-navigation-menu').click(function(e){
    if($(window).innerWidth() < 700 && e.target == this){
      console.log('yeh');
      closeMobileMenu();
    }
  });




  function Polygon(svg){
    this.arm = {
      node: svg.find('polyline.a'),
      points: [],
    };
    this.reflection = {
      node: svg.find('polyline.b'),
      points: [],
    };
    this.a.points = svg.find('polyline.a').attr('points').split(' ');
    this.b.points = svg.find('polyline.b').attr('points').split(' ');
  }

  // Parallax
  var scene = $('.scene').parallax();
  function updateDepths(){
    var w = $(document).innerWidth();
    var lastState;
    if(w > 768){
      if(lastState != 'desktop'){
        lastState = 'desktop';
        $('.layer').each(function(){
          $(this).attr('data-depth', $(this).data('desktop-depth'));
          scene.parallax('scalar', 2, 0);
          scene.parallax('updateLayers');
        });
      }
    } else {
      if(lastState != 'mobile'){
        lastState = 'mobile';
        $('.layer').each(function(){
          $(this).attr('data-depth', $(this).data('mobile-depth'));
          scene.parallax('scalar', 20, 0);
          scene.parallax('updateLayers');
        });
      }
    }
  }
  updateDepths();
  $(window).resize(updateDepths);

  // Hide vide on mobile
  function hideVideoOnMobile(){
    var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    if(iOS){
      $('video').hide();
      $('body').addClass('iOs');
    }
  }
  hideVideoOnMobile();

  // Checks if the elements in question are currently within the viewport
  function watchSeen($collection){
    var scroll = $(document).scrollTop();
    var wh = $(window).innerHeight();
    $.each($collection, function(){
      var $this = $(this);
      var elTop = $this.offset().top;
      var elBottom = elTop + $this.outerHeight();
      if( (elTop >= scroll && elTop <= scroll + wh ) || (elBottom >= scroll && elBottom <= scroll + wh) ){
        $this.addClass('seen');
      }
    });
    return $collection;

  }

  // The elements we are going to check to see when they are seen
  var $scrollBasedAnimates = $('.panel-bridge, .horizon-rule, h2, .next-graduate');
  watchSeen($scrollBasedAnimates);
  $(window).scroll(function(){
    watchSeen($scrollBasedAnimates);
  });



    // Homepage Graduates
    // var $famID = $('#homepageFamJS'),
    //     imagePath = siteData.themeUri + '/assets/images/graduate-images-600x400/',
    //     prevGrads,
    //     gradUnique,
    //     newGrad,
    //     i = 0,
    //     numberOfGrads = siteData.graduates.length,
    //     gradsJSON = siteData.graduates;
    //
    // function gradRandom(min, max) {
    //   return Math.floor((Math.random() * max) + min);
    // }
    //
    // var currentGrads = [];
    // for (i; i < 6; i++) {
    //   gradUnique = false;
    //   while (!gradUnique) {
    //     newGrad = gradRandom(0, numberOfGrads - 1);
    //     gradUnique = checkDupes(newGrad, currentGrads);
    //   }
    //   currentGrads[i] = newGrad;
    //   var grad = gradsJSON[currentGrads[i]];
    //   console.log('test' + i);
    //   $famID.append('<li class="single-grad active" attr="' + i + '"><div class="grad-container"><img src="' + siteData.themeUri + '/assets/images/graduate-images-600x400/graduate-' + grad.ID + '.png"><span class="grad-name"><span class="board"></span><span class="name">' + grad.full_name + '</span></span></div></li>');
    //   prevGrads = currentGrads;
    // }


    /**
    Ensures that no graduate gets displayed twice.
    Returns false if grad is repeated.
    Returns true if grad is unique.
    */
    // function checkDupes(n, currentGrads){
    //   var i = 0;
    //   for ( i; i < currentGrads.length; i++ ) {
    //     if ( currentGrads[i] == n ) {
    //       // console.log('conflict');
    //       return false;
    //     }
    //   }
    //   return true;
    // }

    
});
