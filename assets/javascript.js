/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Required Field
$(function () {
    $('.required-icon').tooltip({
        placement: 'left',
        title: 'Required field'
    });
});

//on Location change
$("#locations").change(function () {
    // alert(this.value);

    var uluru;
    switch (this.value) {
        case '1': // Caesar chavez, 
            uluru = {lat: 37.7224371, lng: -122.4785310};
            break;
        case '2'://Thorton, 
            uluru = {lat: 37.723721, lng: -122.476971};
            break;
        case '3'://humanities 
            uluru = {lat: 37.722443, lng: -122.480927};
            break;
        case '4': //library,
            uluru = {lat: 37.721409, lng: -122.477893};
            break;
        default:
            uluru = {lat: 37.722558, lng: -122.4780799}; //default
            break;
    }
    
    //TODO: change markers to array, then delete markers instead of insantiating an new map every call
            deleteMarkers();
       // map.setZoom(18);
        map.panTo(uluru);
        //setMapOnAll(null);
        //marker.setMap(null)
        //markers = [];

addMarker(uluru);


//    marker = new google.maps.Marker({
//        position: uluru,
//        map: map
//    });

});

jQuery(function ($) {
    $("#phone").mask("(999) 999-9999", {placeholder: " "});
});

// Instantiate the Bootstrap carousel
$('.multi-item-carousel').carousel({
    interval: 2500
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
$('.multi-item-carousel .item').each(function () {
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    if (next.next().length > 0) {
        next.next().children(':first-child').clone().appendTo($(this));
    } else {
        $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
    }
});