(function($){

  $(document).ready(function(){

    var egg = new Egg();

    var thuglife = new Audio(siteData.themeUri + '/assets/sounds/eggs/thug-life.mp3');

    egg
      .addCode("v,o,v,o", function() {
        $('body').prepend('<div class="ryan"></div>');
        thuglife.play();
        setTimeout(function(){
          $('.ryan').remove();
          thugLife.pause();
          thugLife.currentTime = 0;
        }, 10000);
      })
      .addHook(function(){
        // console.log("Hook called for: " + this.activeEgg.keys);
        // console.log(this.activeEgg.metadata);
      }).listen();

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
        // console.log("Hook called for: " + this.activeEgg.keys);
        // console.log(this.activeEgg.metadata);
      }).listen();

      console.log('Easter Egg Code: v o v o');
      console.log('Easter Egg Code: m e o w');
  });

})(jQuery);
