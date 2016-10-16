$(document).ready( function() {
  $('body').addClass('loaded');


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
  var $scrollBasedAnimates = $('.panel-bridge, .horizon-rule, h2');
  watchSeen($scrollBasedAnimates);
  $(window).scroll(function(){
    watchSeen($scrollBasedAnimates);
  });

});
