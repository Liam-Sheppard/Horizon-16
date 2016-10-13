(function($){

  $(document).ready(function(){

    var egg = new Egg();

    var nyanTrack = new Audio(siteData.themeUri + '/assets/sounds/eggs/nyan.mp3');


    egg
      .addCode("v,o,v,o", function() {
        $('body').prepend('<div class="ryan"></div>');
        setTimeout(function(){
          $('.ryan').remove();
        }, 5000);
      })
      .addHook(function(){
        // console.log("Hook called for: " + this.activeEgg.keys);
        // console.log(this.activeEgg.metadata);
      }).listen();

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
