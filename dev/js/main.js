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
    console.log(this.a.points);
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

  console.log(siteData.graduates.length);
  console.log(siteData.graduates);

    // Homepage Graduates
    var $famID = $('#homepageFamJS'),
        imagePath = siteData.themeUri + '/assets/images/graduate-images-600x400/',
        prevGrads,
        gradUnique,
        newGrad,
        i = 0,
        numberOfGrads = siteData.graduates.length,
        gradsJSON = siteData.graduates,
        gradRandom = function (min, max){
          return Math.floor((Math.random() * max) + min);
        };



        var currentGrads = [];
        for (i; i < 6; i++) {
          gradUnique = false;
          while (!gradUnique) {
            newGrad = gradRandom(0, numberOfGrads - 1);
            gradUnique = checkDupes(newGrad, currentGrads);
          }
          currentGrads[i] = newGrad;
          var grad = gradsJSON[currentGrads[i]];
          $famID.append('<li class="single-grad active"><a href="javascript:void(0)" class="grad-container"><img src="' + siteData.themeUri + '/assets/images/graduate-images-600x400/graduate-' + grad.ID + '.png"><span class="grad-name"><span class="board"></span><span class="name">' + grad.full_name + '</span></span></a></li>');
          prevGrads = currentGrads;
        }



    // Reshuffle Graduates
    function shuffleFam(){
      $('.grad-container img').fadeTo(300, 0);
      $('.grad-container .grad-name').fadeTo(300, 0).promise().done(function() {
        var currentGrads = [];
        var gradNew;
        i = 0;
        for (i; i < 6; i++) {
          var loop = true;
          gradUnique = false;
          gradNew = false;

          while ( loop ) {
            newGrad = gradRandom(0, numberOfGrads - 1);
            gradUnique = checkDupes(newGrad, currentGrads);
            gradNew = checkDupes(newGrad, prevGrads);
            if ( gradUnique && gradNew ) {
              loop = false;
            }
          }
          currentGrads[i] = newGrad;

          var grad = siteData.graduates[currentGrads[i]];
          $('#homepageFamJS').children(".single-grad:nth-of-type(" + ( i + 1 ) + ")").children().html("<img src='" + siteData.themeUri + "/assets/images/graduate-images-600x400/graduate-" + grad.ID + ".png'><span class='grad-name'><span class='board'></span><span class='name'>" + grad.full_name + "</span></span>");
        }
        prevGrads = currentGrads;
      });
    }
    if($('#homepageFamJS').length){
      setInterval(shuffleFam, 5000);
    }


    /**
    Ensures that no graduate gets displayed twice.
    Returns false if grad is repeated.
    Returns true if grad is unique.
    */
    function checkDupes(n, currentGrads){
      var i = 0;
      for ( i; i < currentGrads.length; i++ ) {
        if ( currentGrads[i] == n ) {
          // console.log('conflict');
          return false;
        }
      }
      return true;
    }
});
