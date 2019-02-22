<div class="promo">
  @php if ($description) : @endphp
  <div class="promo__description">{{ $description }}</div>
  @php endif; @endphp
  <div class="promo__wrap">
    <div class="promo__image promo__image--desctop">
      <img src="{!! $thumb !!}" class="img-fluid" />
    </div>
    <div class="promo__image promo__image--mobile">
      <img src="{!! $thumb_mobile !!}" class="img-fluid" />
    </div>
    <div class="promo__heading">
      <h2 class="promo__title">{!! $title !!}</h2>
      <p class="promo__subtitle">{!! $subtitle !!}</p>
    </div>
    <div class="promo__content promo-content">
      <p class="promo-content__title">{!! $content_title !!}</p>
      <p class="promo-content__subtitle">{!! $content_subtitle !!}</p>
      <div class="promo-content__description">
        {!! apply_filters('the_content', $content) !!}
      </div>
      <div class="promo-content__price">
        <p class="promo-content__price-lbl">{!! $price_lbl !!}</p>
        <p class="promo-content__price-val">{!! $price_val !!}</p>
        <a href="images/solutions/solution-3.pdf" class="promo-content__price-thumb" target="_blank">
          <img src="{!! \App\asset_path('images/ico-pdf.png') !!}" class="promo-content__price-ico" />
        </a>
      </div>
      @php if ( $buy ) : @endphp
      <div class="promo__buy">
        <a class="promo__buy-btn btn btn--primary" href="javascript:;" data-fancybox data-src="#modal-request">Заказать отчет</a>
      </div>
      @php endif; @endphp
    </div>

  </div>

</div>