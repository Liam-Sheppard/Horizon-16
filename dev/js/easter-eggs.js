(function($){

  $(document).ready(function(){

    var egg = new Egg();
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

      console.log('Easter Egg Code: v o v o');
  });

})(jQuery);
