/**
 * @file
 * Basic js features for the template.
 */

(function ($, window, document, undefined) {

  if (typeof window.console == 'object') {
    // console.log("Script's in: template.js");
  }

  var thisLink,
      prevLink,
      nextLink,
      linkParent,
      targetFrame = '';

  var setLinkActive = function(link) {
    $('.main-menu a').removeClass('active');
    link.addClass('active');
    link.focus();
  }

  $('.main-menu a').click(function(event) {
    event.preventDefault();
    thisLink = $(this);
    targetFrameId = '#' + thisLink.attr('data-target-frame');

    $('.frame').hide();
    $(targetFrameId).show();

    setLinkActive(thisLink);
  });

  $('.main-menu a').keydown(function(event) {
    event.keyCode ? event.keyCode : event.charCode;
    linkParent = $(this).closest('li');
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

  $('.main-menu .active').focus();

  window.setTimeout(function() {
    $('.main-menu a').each(function() {
      $(this).addClass('transition');
    });
  }, 200);

})(jQuery, this, this.document);
