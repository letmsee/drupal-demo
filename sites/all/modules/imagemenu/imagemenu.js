(function ($) {
/**
 * Chnage image on mouse over if rel attribute is present, preload images for mouse over
 */
Drupal.behaviors.imagemenu_preload = {
  attach: function (context, settings) {
    // discover all mouse over images  
    var images = new Array();

    $('img.imagemenu-image', context).each(function () {
      var mouseover = $(this).attr('onmouseover');
      if (mouseover) {
        var image = (new RegExp("this\.src='([^']*)'", "g")).exec(mouseover.toString());
        if (image[1]) {
          images[images.length] = image[1];
        }
      }
    });

    // preload images for mouse over
    $(images).each(function() {
        $('<img/>')[0].src = this;
    });
  }
};

})(jQuery);
