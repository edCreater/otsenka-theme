<section class="header">
  <div class="header__inner">
    <div class="header__logo">
      <a href="{{ home_url('/') }}" class="logo" title="{{ get_bloginfo('name', 'display') }}">
        <div class="logo__image">
          <img src="{{ \App\asset_path( 'images/logo-img.png' ) }}" />
        </div>
        <div class="logo__content">
          <p class="logo__text"><span class="logo__primary">ARGENT</span>&nbsp;BUSINESS</p>
          <p class="logo__title">valuation audit company</p>
          <p class="logo__subtitle">оценочно-аудиторская компания</p>
        </div>
      </a>
    </div>
    <div class="header__mobile-toggle">
      <a class="mobile-toggler mobile-toggler--js" href="#">
        <svg width="385" height="221" viewBox="0 0 385 221" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12.03 24.06H372.939C379.58 24.06 384.969 18.67 384.969 12.03C384.969 5.38901 379.579 0 372.939 0H12.03C5.389 0 0 5.39001 0 12.03C0 18.67 5.39 24.06 12.03 24.06Z" fill="black"/>
          <path d="M372.939 98H12.03C5.389 98 0 103.39 0 110.03C0 116.67 5.39 122.06 12.03 122.06H372.939C379.58 122.06 384.969 116.67 384.969 110.03C384.969 103.39 379.58 98 372.939 98Z" fill="black"/>
          <path d="M372.636 196H132.03C125.389 196 120 201.39 120 208.03C120 214.671 125.39 220.06 132.03 220.06H372.636C379.277 220.06 384.666 214.67 384.666 208.03C384.667 201.389 379.277 196 372.636 196Z" fill="black"/>
        </svg>
      </a>
    </div>
    <div class="header__mobile-nav">
      <div class="mobile-nav">
        @if (has_nav_menu('sidebar_navigation'))
          {!! wp_nav_menu(['theme_location' => 'sidebar_navigation', 'menu_class' => 'mobile-menu', 'walker'=>new App\Modules\CS_Mobile_Menu_Walker()]) !!}
        @endif
      </div>
    </div>
    <div class="header__info">
      <a href="#" class="lang-selector">
          <span class="lang-selector__image">
              <svg width="512" height="342" viewBox="0 0 512 342" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="512" height="342" fill="#E5E5E5"/>
                  <path d="M512 0.330994H0V341.668H512V0.330994Z" fill="#F0F0F0"/>
                  <path d="M512 0H0V74H512V0Z" fill="#D80027"/>
                  <path d="M512 134H0V208H512V134Z" fill="#D80027"/>
                  <path d="M512 268H0V342H512V268Z" fill="#D80027"/>
                  <path d="M256 0.330994H0V184.128H256V0.330994Z" fill="#2E52B2"/>
                  <path d="M128.005 100.15L120.447 123.072H96L115.782 137.23L108.224 160.15L128.005 145.991L147.775 160.15L140.218 137.23L160 123.072H135.551L128.005 100.15Z" fill="#F0F0F0"/>
                  <path d="M55.0064 100.15L47.448 123.072H23L42.7824 137.23L35.224 160.15L55.0064 145.991L74.7778 160.15L67.2213 137.23L87 123.072H62.5538L55.0064 100.15Z" fill="#F0F0F0"/>
                  <path d="M128.005 24.15L120.447 47.0719H96L115.782 61.2317L108.224 84.15L128.005 69.9903L147.775 84.15L140.218 61.2317L160 47.0719H135.551L128.005 24.15Z" fill="#F0F0F0"/>
                  <path d="M55.0064 24L47.448 46.9219H23L42.7824 61.0817L35.224 84L55.0064 69.8403L74.7778 84L67.2213 61.0817L87 46.9219H62.5538L55.0064 24Z" fill="#F0F0F0"/>
                  <path d="M200.004 100.15L192.447 123.072H168L187.78 137.23L180.225 160.15L200.004 145.991L219.776 160.15L212.218 137.23L232 123.072H207.553L200.004 100.15Z" fill="#F0F0F0"/>
                  <path d="M200.004 24.15L192.447 47.0719H168L187.78 61.2317L180.225 84.15L200.004 69.9903L219.776 84.15L212.218 61.2317L232 47.0719H207.553L200.004 24.15Z" fill="#F0F0F0"/>
              </svg>
          </span>
        <span class="lang-selector__text">ENGLISH</span>
      </a>

      <p class="address">
        <span class="address__image"><img src="{{ \App\asset_path( 'images/map-ico.png' ) }}" /></span>
        <span class="address__text">{{ \App\cs_get_setting( 'cs_address' ) }}</span>
      </p>

      <p class="work-time">
        <span class="address__image"><img src="{{ \App\asset_path( 'images/work-time.png' ) }}" /></span>
        <span class="address__text">Часы работы: {{ \App\cs_get_setting( 'cs_work_time' ) }}</span>
      </p>

    </div>

    <div class="header__contacts">
      <div class="h-contacts">
        <p class="h-contacts__title">Прямая связь с оценщиками</p>
        <p class="h-contacts__phone">{{ \App\cs_get_setting( 'cs_phone' ) }}</p>
        <a class="h-contacts__callback-btn btn btn--primary" href="javascript:;" data-fancybox data-src="#modal-request">Заказать звонок</a>
      </div>
    </div>

  </div>
</section>