function isElementInViewport(macbook){var $macbook=$(macbook);var scrollElem=((navigator.userAgent.toLowerCase().indexOf('webkit')!=-1)?'body':'html');var viewportTop=$(scrollElem).scrollTop();var viewportBottom=viewportTop+$(window).height();var elemTop=Math.round($macbook.offset().top)+150;var elemBottom=elemTop+$macbook.height();return((elemTop<viewportBottom)&&(elemBottom>viewportTop));}function checkAnimation(){var $macbook=$('.js-macbook');if(isElementInViewport($macbook)){$macbook.addClass('macbook--shown macbook--display-open macbook--show-program');}else{$macbook.removeClass('macbook--shown macbook--display-open macbook--show-program');}}$(window).scroll(function(){checkAnimation();});