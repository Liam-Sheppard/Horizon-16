(function($){

  $(document).ready(function(){

    var egg = new Egg();

    var thugLife = new Audio(siteData.themeUri + '/assets/sounds/eggs/thug-life.mp3');
    egg
      .addCode("v,o,v,o", function() {
        $('body').prepend('<div class="ryan"></div>');
        thugLife.play();
        setTimeout(function(){
          $('.ryan').remove();
          thugLife.pause();
          thugLife.currentTime = 0;
        }, 10000);
      })
      .addHook(function(){
      }).listen();
      console.log('Easter Egg Code: v o v o');


    var nyanTrack = new Audio(siteData.themeUri + '/assets/sounds/eggs/nyan.mp3');
    egg
      .addCode("m,e,o,w", function() {
        $('body').prepend('<div class="holly"></div>');
        nyanTrack.play();
        setTimeout(function(){
          $('.holly').fadeOut();
        }, 5500);
        setTimeout(function(){
          $('.holly').remove();
          nyanTrack.pause();
          nyanTrack.currentTime = 0;
        }, 7500);
      })
      .addHook(function(){
      }).listen();
      console.log('Easter Egg Code: m e o w');


    var notLikeThis = new Audio(siteData.themeUri + '/assets/sounds/eggs/not-like-this.mp3');
    var alreadyRip = false;
    egg
      .addCode("r,i,p", function() {
        if(!alreadyRip){
          alreadyRip = true;
          notLikeThis.play();
          setTimeout(function(){
            $('body').css('font-family', '"Comic Sans MS", cursive, sans-serif');
          }, 6000);
        }
      })
      .addHook(function(){
      }).listen();
      console.log('Easter Egg Code: r i p');

    egg
      .addCode("h,e,l,l", function() {
        $('body').addClass('break-everything');
        $('body').append('<div class="internetexplorer"></div>');
        // setTimeout(function(){
        //   $('.internetexplorer').fadeOut();
        // }, 5500);
        // setTimeout(function(){
        //   $('body').removeClass('break-everything');
        //   $('.internetexplorer').remove();
        // }, 7500);
      })
      .addHook(function(){
      }).listen();
      console.log('Easter Egg Code: h e l l');



    egg
      .addCode("n,o,d", function() {
        var heroVideo = $('#heroVideo');
        if(heroVideo.length){
          heroVideo.find('source[type="video/webm"]').attr('src', siteData.themeUri + '/assets/video/nod.webm');
          heroVideo.find('source[type="video/mp4"]').attr('src', siteData.themeUri + '/assets/video/nod.mp4');
          heroVideo.load();
        }
      })
      .addHook(function(){
      }).listen();
      console.log('Easter Egg Code: n o d');


    var rolling = new Audio(siteData.themeUri + '/assets/sounds/eggs/rolling.mp3');

    egg
      .addCode("r,o,l,l", function() {

        $('body').prepend('<div class="datboi"></div>');
        rolling.play();
        setTimeout(function(){
          $('.datboi').remove();
          rolling.pause();
          rolling.currentTime = 0;
        }, 14000);
      })
      .addHook(function(){
      }).listen();
      console.log('Easter Egg Code: r o l l');


    egg
      .addCode("t,h,a,n,k,s", function(){
        if($('body').find('.balloon-egg').length == 0){
          $('body').prepend(`
            <div class="balloon-egg container">
              <div class="balloon">
                <div><span>T</span></div>
                <div><span>H</span></div>
                <div><span>A</span></div>
                <div><span>N</span></div>
                <div><span>K</span></div>
                <div><span>S</span></div>
                <div><span>!</span></div>
                <h1>Thanks for your Support!</h1>
                <p>The Horizon16 Graduate Exhbition would not have been possible without your contribution, so from all of the 2016 QUT IVD Graduates... THANKS!</p>
              </div>
            </div>`);
            $('.balloon-egg').click(function(e){
              $(this).remove();
            })
        }

      })
      .addHook(function(){
      }).listen();



  });

})(jQuery);
