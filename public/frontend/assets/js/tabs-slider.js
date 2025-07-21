"use strict";

/*Activate default tab contents*/
var $magicLine, defaultActive;

defaultActive = $('.alzatheme-tabs-menu li.active a').attr('href');
$(defaultActive).show();

$('.alzatheme-tabs-menu').append("<li id='magic-line'></li>");
$magicLine = $('#magic-line');
$magicLine.width($('.active').width())

$('.alzatheme-tabs-menu li a').on("click", function() {
    var $this, tabId, leftVal, $tabContent;
    $this = $(this);
    $tabContent = $('.tabContent');
    $this.parent().addClass('active').siblings().removeClass('active');
    tabId = $this.attr('href');

    leftVal = $($tabContent).index($(tabId)) * $tabContent.width() * -1;
    $('.alzatheme-tabs-wrapper').stop().animate({ left: leftVal });

    $magicLine
        .data('origLeft', $this.position().left)
        .data('origWidth', $this.width() + 40);
    return false;
});
