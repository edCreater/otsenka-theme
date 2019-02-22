<section class="service-info">
  <div class="service-info__items">

    @php foreach ($info_items as $info_item) : @endphp
    <div class="service-info__item service-info__item--small">
      <div class="service-info__item-inner">
        <h2 class="service-info__title">{{ $info_item['title'] }}</h2>
        <div class="service-info__content content">
          {!! apply_filters( 'the_content', $info_item['content'] ) !!}
        </div>
      </div>
    </div>
    @php endforeach; @endphp

  </div>
</section>
