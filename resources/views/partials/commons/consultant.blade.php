@php $consultant_thumb = \App\cs_get_setting( 'cs_consultant_thumb' ) @endphp
<section class="consultant">
  <h2 class="consultant__title">ВЫ МОЖЕТЕ ЗАДАТЬ ВОПРОС ОДНОМУ ИЗ ЛУЧШИХ СПЕЦИАЛИСТОВ КОМПАНИИ ПО ОЦЕНКЕ НЕДВИЖИМОСТИ</h2>
  <div class="consultant__columns">
    <div class="consultant__column consultant__column--1">
      <div class="consultant-info">
        <img src="{{ $consultant_thumb['url'] }}" class="consultant-info__thumb" />
        <p class="consultant-info__name">{{ \App\cs_get_setting( 'cs_consultant_name' ) }}</p>
        <p class="consultant-info__position">{{ \App\cs_get_setting( 'cs_consultant_position' ) }}</p>
        <p class="consultant-info__phone">тел.: {{ \App\cs_get_setting( 'cs_consultant_phone' ) }}</p>
        <p class="consultant-info__email">e-mail: <a href="{{ \App\cs_get_setting( 'cs_consultant_email' ) }}">{{ \App\cs_get_setting( 'cs_consultant_email' ) }}</a></p>
      </div>
    </div>
    <div class="consultant__column consultant__column--2">
      <div class="consultant-descr">
        {!! apply_filters('the_content', \App\cs_get_setting( 'cs_consultant_content' )) !!}
      </div>
    </div>
    <div class="consultant__column consultant__column--3">
      <div class="consultant__callback consultant-callback">
        <p class="consultant-callback__title">ЗАДАЙТЕ ВОПРОС ОЦЕНЩИКУ И ПОЛУЧИТЕ<br> ПОДРОБНУЮ КОНСУЛЬТАЦИЮ УЖЕ ЧЕРЕЗ 15 МИНУТ</p>
        <form class="consultant-callback__form form form-ajax--js" action="send_mail">
          <div class="form__row">
            <div class="form__column form__column--12">
              <input class="form__input" name="name" placeholder="Имя" />
            </div>
          </div>
          <div class="form__row">
            <div class="form__column form__column--12">
              <input class="form__input" name="phone" placeholder="Телефон" />
            </div>
          </div>
          <div class="form__row">
            <div class="form__column form__column--24">
              <textarea class="form__textarea" name="message" placeholder="Вопрос"></textarea>
            </div>
          </div>
          <div class="form__row">
            <div class="form__column form__column--12">
              <div class="inputfile__wrap">
                <input type="file" name="docs[]" id="docs" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple />
                <label for="docs">Прикрепить документы</label>
              </div>
            </div>
            <div class="form__column form__column--12">
              <input type="hidden" name="subject" value="Заказ консультации" />
              <button class="consultant-callback__submit form__submit btn btn--primary">Задать вопрос</button>
            </div>
          </div>
          <div class="form__resp request-resp"></div>
        </form>
      </div>

    </div>
  </div>
</section>
