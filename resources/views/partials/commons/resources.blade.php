<section class="resources">
  <div class="resources__columns">
    <div class="resources__column resources__column--1">
      <div class="documents">
        <div class="documents__heading">
          <h2 class="documents__title">ДОКУМЕНТЫ СПЕЦИАЛИСТОВ И КОМПАНИИ</h2>
          <p class="documents__subtitle">Ниже представлены документы специалистов компании <strong>(страховые свидетельства, свидетельства СРО, квалификационные аттестаты)</strong>, подтверждающие стаж работы оценщиков, их высокую квалификацию, а так же документы, подтверждающие право на проведение оценочных работ. </p>
        </div>
        <div class="documents__items">

          @php foreach ($documents_items as $document_item) : @endphp
          <div class="documents__item">
            {!! $document_item !!}
          </div>
          @php endforeach; @endphp

        </div>
      </div>
    </div>

    <div class="resources__column resources__column--2">
      <div class="documents">
        <div class="documents__heading">
          <h2 class="documents__title">ОТЗЫВЫ КЛИЕНТОВ</h2>
          <p class="documents__subtitle"><strong>Мы очень гордимся всеми нашими потрясающими клиентами</strong> и выражаем всем им огромную признательность за многолетнее сотрудничество, доверие и возможность работать над самыми интересными и сложными проектами, которые позволяют нам реализовать наш потенциал.</p>
        </div>
        <div class="documents__items">

          @php foreach ($reviews_items as $review_item) : @endphp
          <div class="documents__item">
            {!! $review_item !!}
          </div>
          @php endforeach; @endphp


        </div>
      </div>
    </div>
  </div>
</section>