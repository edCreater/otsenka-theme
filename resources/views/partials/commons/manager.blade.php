<section class="manager">
  <h2 class="manager__title">КОММЕРЧЕСКОЕ ПРЕДЛОЖЕНИЕ ЗА&nbsp;30&nbsp;МИНУТ</h2>
  <div class="manager__columns">
    <div class="manager__column manager__column--1">
      <div class="manager__thumb">
        <img src="{{ THEME_DIR_URI }}/images/callback-offer.jpg" class="consultant-info__thumb img-fluid" />
      </div>
    </div>
    <div class="manager__column manager__column--2">
      <div class="manager__info manager-info">
        <div class="manager-info__heading">
          <p class="manager-info__title">ИВАНОВА ОЛЕСЯ</p>
          <p class="manager-info__subtitle">профессиональный оценщик - консультант</p>
        </div>
        <div class="manager-info__quote">
          <p>"Заполните пожалуйста форму с описанием здания, укажите площадь, дату оценки и для какой цели проводите оценку.</p>
          <p>Я подготовлю для вас предложение и уже менее чем через 30 минут предложение с самыми лучшими условиями будет у вас на почте)))"</p>
        </div>
      </div>
    </div>
    <div class="manager__column manager__column--3">
      <div class="manager__callback manager-callback">
        <form class="manager-callback__form form-labelled form-ajax--js">
          <div class="form-labelled__row">
            <label class="form-labelled__lbl">Email*</label>
            <input class="form-labelled__input" name="email" />
          </div>
          <div class="form-labelled__row">
            <label class="form-labelled__lbl">Имя*</label>
            <input class="form-labelled__input" name="name" />
          </div>
          <div class="form-labelled__row">
            <label class="form-labelled__lbl">Телефон*</label>
            <input class="form-labelled__input" name="phone" />
          </div>
          <div class="form-labelled__row">
            <label class="form-labelled__lbl">Описание объекта</label>
            <textarea class="form-labelled__textarea" name="message"></textarea>
          </div>
          <div class="form-labelled__row-submit">
            <input type="hidden" name="subject" value="Заказ КП" />
            <button class="manager-callback__submit form-labelled__submit btn btn--primary">Отправить</button>
          </div>
          <div class="form__resp request-resp"></div>
        </form>
      </div>

    </div>
  </div>
</section>