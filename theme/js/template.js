/**
 * @file
 * Basic js features for the template.
 */

(function ($, window, document, undefined) {

  var thisLink,
      prevLink,
      nextLink,
      linkParent,
      activeFrameLink,
      targetFrameId = '';

  var setLinkActive = function(link) {
    $('.frame-nav a').removeClass('active');
    link.addClass('active');
    link.focus();
    activeFrameLink = link; // Memorizing which one got active now.
  }

  $('.frame-nav a').click(function(event) {
    event.preventDefault();
    thisLink = $(this);
    targetFrameId = '#' + thisLink.attr('data-target-frame');

    $('.frame').hide();
    $(targetFrameId).show();

    setLinkActive(thisLink);
  });

  $(document).keydown(function(event) {
    event.keyCode ? event.keyCode : event.charCode;
    linkParent = activeFrameLink.closest('li');
    // Left key.
    if (event.keyCode == 37) {
      if (linkParent.prev('li').length > 0) {
        linkParent.prev().find('a').click();
      }
    }
    // Right key.
    else if (event.keyCode == 39) {
      if (linkParent.next('li').length > 0) {
        linkParent.next().find('a').click();
      }
    }
  });

  activeFrameLink = $('.frame-nav .active');

  window.setTimeout(function() {
    $('.menu a').each(function() {
      $(this).addClass('transition');
    });
  }, 200);

})(jQuery, this, this.document);
