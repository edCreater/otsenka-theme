<div class="widget widget-product">
  <div class="widget-product__title">{!! $title !!}</div>
  <div class="widget-product__date">{{ $date }}</div>
  <div class="widget-product__image">
    <a href="{{ $url }}">
      {!! $thumb !!}
    </a>
  </div>
  <div class="widget-product__content">
    {!! $description !!}
  </div>
</div>