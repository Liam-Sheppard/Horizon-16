
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
