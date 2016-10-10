$(document).ready( function() {


  function timeLeft(endtime) {
    var t = Date.parse(eventDate) - Date.parse(new Date());
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
      'total': t,
      'days': days,
      'hours': hours,
      'minutes': minutes,
      'seconds': seconds
    };
  }

  function startCountdown(id, endtime) {
    var clock = $('#countdown');
    var daysSpan = $('#countdownDays');
    var hoursSpan = $('#countdownHours');
    var minutesSpan = $('#countdownMinutes');
    var secondsSpan = $('#countdownSeconds');

    function updateCountdown() {
      var t = timeLeft(eventDate);

      daysSpan.text(t.days);
      hoursSpan.text(('0' + t.hours).slice(-2));
      minutesSpan.text(('0' + t.minutes).slice(-2));
      secondsSpan.text(('0' + t.seconds).slice(-2));

      if (t.total <= 0) {
        clearInterval(timeinterval);
      }
    }

    updateCountdown();
    var timeinterval = setInterval(updateCountdown, 1000);
  }

  var eventDate = 'November 09 2016 18:00:00 GMT+1000';

  var t = Date.parse(eventDate) - Date.parse(new Date());

  startCountdown('countdown', eventDate);


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

  $('body').addClass('loaded');


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
    }
  }
  hideVideoOnMobile();

  function checkIfSeen($collection){
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

  var $scrollBasedAnimates = $('.panel-bridge, .horizon-rule, h2');
  checkIfSeen($scrollBasedAnimates);
  $(window).scroll(function(){
    checkIfSeen($scrollBasedAnimates);
  });

    // Homepage Graduates
    var $famID = $('#homepageFamJS'),
        imagePath = '/wp-content/themes/Horizon-16/horizon16/images/graduate-images-600x400/',
        prevGrads,
        gradUnique,
        newGrad,
        i = 0,
        numberOfGrads = 24;
    $.ajax({
      type: 'GET',
      dataType: "json",
      url: '/wp-content/themes/Horizon-16/horizon16/data/temp-grads.json',
      success: function(objJSON) {
        var currentGrads = [];
        for (i; i < 6; i++) {
          gradUnique = false;
          while (!gradUnique) {
            newGrad = gradRandom(0, numberOfGrads - 1);
            gradUnique = checkDupes(newGrad, currentGrads);
          }
          currentGrads[i] = newGrad;
          var grad = objJSON[currentGrads[i]];
          $famID.append("<li class='single-grad'><a href='javascript:void(0)' class='grad-container'><img src='" + imagePath + grad.photoLink + ".png'></img><span class='grad-name'>" + grad.name + "</span></a></li>");
          prevGrads = currentGrads;
        }
      }
    });

    // Reshuffle Graduates
    $('#fam-reshuffle').click(function() {
      $('.grad-container img').fadeTo(300, 0);
      $('.grad-container .grad-name').fadeTo(300, 0).promise().done(function() {
        $.ajax({
          type: 'GET',
          dataType: "json",
          url: '/wp-content/themes/Horizon-16/horizon16/data/temp-grads.json',
          success: function(objJSON) {
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

              var grad = objJSON[currentGrads[i]];
              $('#homepageFamJS').children(".single-grad:nth-of-type(" + ( i + 1 ) + ")").children().html("<img src='" + imagePath + grad.photoLink + ".png'></img><span class='grad-name'>" + grad.name + "</span>");
            }
            console.log(currentGrads);
            prevGrads = currentGrads;
          }
        });
      });
    });

    function gradRandom(min, max){
      return Math.floor((Math.random() * max) + min);
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
          console.log('conflict');
          return false;
        }
      }
      return true;
    }
});
