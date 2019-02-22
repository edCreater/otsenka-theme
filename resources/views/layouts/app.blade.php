<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>

    <div class="wrapper" role="document">
      <div class="wrapper__content">
        <div class="container">

          @php do_action('get_header') @endphp
          @include('partials.header')

          <main class="main">
            @yield('content')
          </main>

        </div>
      </div>

      @php do_action('get_footer') @endphp
      @include('partials.footer')
      @php wp_footer() @endphp

    </div>

    <div class="modals">
      <div id="modal-request" class="modal-request">
        <div class="modal-request__inner">
          <div class="modal-request__heading">
            <h2 class="modal-request__title">ОТПРАВИТЬ ЗАПРОС</h2>
            <div class="modal-request__columns">
              <div class="modal-request__column modal-request__column--1">
                <div class="modal-request__info modal-request-info">
                  <img src="{{THEME_DIR_URI}}/images/modal-request-image.jpg" class="modal-request-info__image" />
                  <p class="modal-request-info__phone">+7 (495) 665-92-28</p>
                  <a href="mailto://argentrussia@gmail.com" class="modal-request-info__email">argentrussia@gmail.com</a>
                </div>
              </div>
              <div class="modal-request__column modal-request__column--2">
                <p class="modal-request__name">Олеся Иванова</p>
                <p class="modal-request__position">Профессиональный оценщик-консультант. Член СРО</p>
                <p class="modal-request__quote">"Заполните форму, я перезвоню вам через 3 минуты или через 30 минут вышлю КП на указанную почту"</p>
                <form class="modal-request__form modal-request-form form-ajax--js">
                  <div class="form__row">
                    <div class="form__column form__column--24">
                      <textarea class="form__textarea modal-request-form__textarea" name="message" placeholder="Описание объекта оценки: площадь, количество, кадастровый номер, местоположение и т.д."></textarea>
                    </div>
                  </div>
                  <div class="form__row">
                    <div class="form__column form__column--12">
                      <input class="form__input" name="name" placeholder="Ваше имя" />
                    </div>
                    <div class="form__column form__column--12">
                      <input class="form__input" name="phone" placeholder="Ваш телефон" />
                    </div>
                  </div>

                  <div class="form__row">
                    <div class="form__column form__column--12">
                      <input class="form__input" name="email" placeholder="Почта для отправки КП" />
                    </div>
                    <div class="form__column form__column--12">
                      <input type="hidden" name="subject" value="Заказ с всплывающей формы" />
                      <button class="consultant-callback__submit form__submit btn btn--primary">Задать вопрос</button>
                    </div>
                  </div>
                  <div class="form__resp request-resp"></div>
                </form>
              </div>
            </div>
            <p style="text-align: right;"><a href="#" class="modal-request__policy-link">Политика конфиденциальности</a></p>
          </div>
        </div>
      </div>
    </div>

    <!— Yandex.Metrika counter —>
    <script type="text/javascript" >
      (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
      (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

      ym(51880094, "init", {
        id:51880094,
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
      });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/51880094" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!— /Yandex.Metrika counter —>

  </body>
</html>
