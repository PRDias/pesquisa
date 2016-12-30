/**
 * Created by paulo on 20/05/2016.
 */

$.fn.rating.defaults = {
    theme: '',
    language: 'en',
    stars: 5,
    filledStar: '<i class="glyphicon glyphicon-star"></i>',
    emptyStar: '<i class="glyphicon glyphicon-star-empty"></i>',
    containerClass: '',
    size: 'md',
    animate: true,
    displayOnly: false,
    rtl: false,
    showClear: true,
    showCaption: true,
    starCaptionClasses: {
        0.5: 'label label-danger',
        1: 'label label-danger',
        1.5: 'label label-warning',
        2: 'label label-warning',
        2.5: 'label label-info',
        3: 'label label-info',
        3.5: 'label label-primary',
        4: 'label label-primary',
        4.5: 'label label-success',
        5: 'label label-success'
    },
    clearButton: '<i class="glyphicon glyphicon-minus-sign"></i>',
    clearButtonBaseClass: 'clear-rating',
    clearButtonActiveClass: 'clear-rating-active',
    clearCaptionClass: 'label label-default',
    clearValue: null,
    captionElement: null,
    clearElement: null,
    hoverEnabled: true,
    hoverChangeCaption: true,
    hoverChangeStars: true,
    hoverOnClear: true
};

$.fn.ratingLocales.en = {
    defaultCaption: '{rating} Stars',
    starCaptions: {
        0.5: 'Half Star',
        1: 'One Star',
        1.5: 'One & Half Star',
        2: 'Two Stars',
        2.5: 'Two & Half Stars',
        3: 'Three Stars',
        3.5: 'Three & Half Stars',
        4: 'Four Stars',
        4.5: 'Four & Half Stars',
        5: 'Five Stars'
    },
    clearButtonTitle: 'Clear',
    clearCaption: 'Not Rated'
};

$.fn.rating.Constructor = Rating;

/**
 * Convert automatically inputs with class 'rating' into Krajee's star rating control.
 */
$(document).ready(function () {
    var $input = $('input.rating');
    if ($input.length) {
        $input.removeClass('rating-loading').addClass('rating-loading').rating();
    }
});
