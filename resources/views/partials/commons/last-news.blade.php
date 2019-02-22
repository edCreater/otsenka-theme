<section class="last-news">
  <div class="last-news__heading">
    <h2 class="last-news__title">НОВОСТИ КОМПАНИИ</h2>
    <p class="last-news__descr">Жизнь компании "АРГЕНТ БИЗНЕС" каждый день насыщена новыми, высокими достижениями, нестандартными проектами и уникальным опытом оценки сложнейших объектов местного, регионального и федерального уровня. Наиболее интересные выкладываем на сайте.</p>
  </div>
  <div class="last-news__items">

    @php foreach ( $news_items as $news ) : @endphp
      <div class="last-news__item">
        {!! $news !!}
      </div>
    @php endforeach; @endphp

  </div>
  <div class="last-news__buttons">
    <a href="#" class="last-news__btn-more btn btn--transparent">Посмотреть все новости</a>
    <a href="#" class="btn btn--primary">Попасть в новости</a>
  </div>
</section>