/**
 * Mosquito theme: JavaScript utilities.
 */

/**
 * Parse media query selected stylesheet links for browsers that do not support them.
 *
 * Shameless rip from geenstijl.nl
 */
Drupal.fixMediaQuery = function () {
    // Get a decent version number
    v = this.browserVersionToFloat($.browser.version);

    // Stupid iPad, always claiming it's in portrait mode.
    if ($.browser.webkit && /iPad/.test(navigator.userAgent)) {
        $("link[href*='medium.css']").attr('media', 'all and (orientation:portrait)');
        $("link[href*='desktop.css']").attr('media', 'all and (orientation:landscape)');
        return true;
    }
    else if ($.browser.webkit && /iPhone OS /.test(navigator.userAgent)) {
        // Fuck you iphone, you can't handle my 1337 coding skills.
        $("link[media^='all']").each(function () {
            var href = $(this).attr('href');
            if (href.indexOf('small.css') > 0) {
                $(this).attr('media', '');
            }
            else {
                $(this).remove();
            }
        });
        return true;
    }

    // if it's a browser known to understand media queries, die right here.
    if (($.browser.mozilla && v >= 1.91)
     ||(($.browser.webkit && v > 530) && !/iPhone OS 3/.test(navigator.userAgent))
     || ($.browser.msie && v >= 9)
     || ($.browser.opera && v >= 9.5)) {
        return true;
    }

    // A browser that is scared by media selectors and would show NO additional css files
    // needs assertion by removing the media attribute
    var browsersNeedsAssertion = ($.browser.msie || /iPhone/.test(navigator.userAgent));

    var w = this.getViewportSize('Width');
    var h = this.getViewportSize('Height');
    $("link[media^='all']").each(function() {
        var mediaMinWidth = $(this).attr('media').match(/min-width: ?([0-9]+)px/i);
        mediaMinWidth = (mediaMinWidth !== null && mediaMinWidth.length > 1) ? mediaMinWidth[1] : null;

        var mediaMaxWidth = $(this).attr('media').match(/max-width: ?([0-9]+)px/i);
        mediaMaxWidth = (mediaMaxWidth !== null && mediaMaxWidth.length > 1) ? mediaMaxWidth[1] : null;

        if ((mediaMinWidth !== null && w < mediaMinWidth)
         || (mediaMaxWidth !== null && w > mediaMaxWidth)) {
            // does not apply
            $(this).remove();
        }
        else if (browsersNeedsAssertion) {
            // does apply and needs assertion
            $(this).attr('media', '');
        }
    });
};

/**
 * Parse a version string to a floating point version number.
 *
 * Shameless rip from geenstijl.nl
 *
 * @param version
 *     The version string.
 */
Drupal.browserVersionToFloat = function (version) {
    var dt = version.indexOf('.');
    var v = version;

    if (dt !== -1) {
        v = version.substr(0, dt) + '.';
        v += version.substr(dt + 1).replace(/\./g, '');
    }

    return parseFloat(v);
};

/**
 * Get the size of the browser window viewport.
 *
 * Shameless rip from geenstijl.nl
 *
 * @param suffix
 *     The suffix to use for the labels.
 */
Drupal.getViewportSize = function (suffix) {
    if (typeof window.innerWidth != 'undefined') {
        return window["inner" + suffix];
    }
    else if (typeof document.documentElement != 'undefined'
          && typeof document.documentElement.clientWidth != 'undefined'
          && document.documentElement.clientWidth !== 0) {
        return document.documentElement["client" + suffix];
    }
};

/**
 * Attach behavior to initialize theme functionality.
 */
Drupal.behaviors.mosquitoInit = function () {
    this.fixMediaQuery();
};