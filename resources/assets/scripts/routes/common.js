// Import Swiper
import WebFont from 'webfontloader';
import Swiper from 'swiper';

export default {
  init() {

    /*
    By Osvaldas Valutis, www.osvaldas.info
    Available for use under the MIT License
    */
    'use strict';

    if (sessionStorage.fonts) {
      console.log('Fonts installed.');
      document.documentElement.classList.add('wf-active');
    } else {
      console.log('No fonts installed.');
    }

    WebFont.load({
      google: {
        families: [
          'PT Sans:300,300i,400,400i,700,700:latin,cyrillic',
          'Open Sans Condensed:300,700:latin,cyrillic',
        ],
      },
      active: function() {
        sessionStorage.fonts = true;
      },
    });

    (function ($) {
      $(document).ready(function () {

        $('.mobile-toggler--js').on('click', function (e) {
          e.preventDefault();
          $('.mobile-nav').toggleClass('active');
        });

        $('.mobile-menu-item.menu-item-has-children>a').on('click', function (e) {
          e.preventDefault();

          $(this).parent().toggleClass('active');
        });

        $('.inputfile').each(function () {
          var $input = $(this),
            $label = $input.next('label'),
            labelVal = $label.html();

          $input.on('change', function (e) {
            var fileName = '';

            if (this.files && this.files.length > 1)
              fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
            else if (e.target.value)
              fileName = e.target.value.split('\\').pop();

            if (fileName)
              $label.html(fileName);
            else
              $label.html(labelVal);
          });

          // Firefox bug fix
          $input
            .on('focus', function () {
              $input.addClass('has-focus');
            })
            .on('blur', function () {
              $input.removeClass('has-focus');
            });
        });

        $('.diagram').each(function () {
          let current = $(this).data('current');
          let max = $(this).data('max');

          let width = current / max * 100;

          $('.diagram__val', this).css({'width': width + '%'});
        });

        $('input, textarea').on('focus', function () {
          $(this).removeClass('error');
        });

        $('.form-ajax--js').on('submit', function (e) {
          e.preventDefault();

          var form = $(this);
          var error = false;
          var msg = new FormData(this);
          msg.append('action', 'send_mail');

          $('.required', this).each(function () {
            if (!check(this, reg_no_empty)) {
              error = true;
            }
          });

          if (error) {
            return false;
          }
          $.ajax({
            type: 'POST',
            url: mainObject.ajax_url,
            data: msg,
            processData: false,
            contentType: false,
            success: function (result) {
              if (result == 'false') {
                $('.request-resp', form).html('<h2 class="resp">Попробуйте позже!</h2>');
              } else if (result == 'true') {
                $('.request-resp', form).html('<h2 class="resp">Спасибо что оставили заявку!</h2>');
              } else {
                $('.request-resp', form).html('<h2 class="resp">Получено сообщение об ошибке!</h2>');
              }
            },
            error: function (xhr) {
              alert('Возникла ошибка: ' + xhr.responseCode);
            },
          });

        })

      });

      $(window).resize(function () {

        showVisible();

      });

      $(window).load(function () {

        new Swiper('.solutions-slider', {
          slidesPerView: 6,
          spaceBetween: 20,
          loop: true,
          navigation: {
            nextEl: '.solutions-slider__next',
            prevEl: '.solutions-slider__prev',
          },
          breakpoints: {
            992: {
              slidesPerView: 4,
            },
            768: {
              slidesPerView: 3,
            },
            640: {
              slidesPerView: 2,
            },
            320: {
              slidesPerView: 1,
            },
          },
        });

        showVisible();

      });

    })(jQuery);

    /* Ajax */
    var reg_no_empty = /^[\s\S]{5,500}$/i;

    function check(selector, reg) { //функция проверки полей, принимает значение id поля и регулярное выражение для него
      var value = $(selector).val();
      if (reg.test(value)) {
        $(selector).removeClass('error'); //если все верно — фон зеленый
        return true;
      } else {
        $(selector).addClass('error'); //если нет — фон красный
        return false;
      }
    }

    /* Lazy load */
    function getCoords(elem) {
      var box = elem.getBoundingClientRect();
      var body = document.body;
      var docElem = document.documentElement;
      var scrollTop = window.pageYOffset || docElem.scrollTop || body.scrollTop;
      var scrollLeft = window.pageXOffset || docElem.scrollLeft || body.scrollLeft;
      var clientTop = docElem.clientTop || body.clientTop || 0;
      var clientLeft = docElem.clientLeft || body.clientLeft || 0;
      var top = box.top + scrollTop - clientTop;
      var left = box.left + scrollLeft - clientLeft;
      return {top: Math.round(top), left: Math.round(left)}
    }

    function isVisible(elem) {
      var coords = getCoords(elem);
      var windowTop = window.pageYOffset || document.documentElement.scrollTop;
      var windowBottom = windowTop + document.documentElement.clientHeight;
      coords.bottom = coords.top + elem.offsetHeight;
      var topVisible = coords.top > windowTop && coords.top < windowBottom;
      var bottomVisible = coords.bottom < windowBottom && coords.bottom > windowTop;
      return topVisible || bottomVisible
    }

    function showVisible() {
      var imgs = document.getElementsByClassName('lazy-image');
      for (var i = 0; i < imgs.length; i++) {
        var img = imgs[i];
        var name = img.getAttribute('data-src');
        if (!name) continue;
        if (isVisible(img) && !img.getAttribute('src')) {
          img.setAttribute('src', name);
          img.src = name;
          img.setAttribute('data-src', '');
          img.removeAttribute('data-src')
        }
      }
    }

    window.onscroll = showVisible;

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
