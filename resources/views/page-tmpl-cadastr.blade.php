{{--
  Template Name: Cadastr
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  <section class="service-layout">
    <div class="service-layout__inner">
      <aside class="service-layout__sidebar">

        @include('partials.service.sidebar')

      </aside>
      <div class="service-layout__content">

        <nav class="service-layout__nav">
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'primary-menu', 'walker'=>new App\Modules\CS_Primary_Menu_Walker()]) !!}
        </nav>

        <div class="service-layout__breadcrumbs">
          {!! $breadcrumbs !!}
        </div>

        <div class="service-layout__promo">
          {!! $promo !!}
        </div>

        <div class="service-content">
          <div class="service-content__inner">
            <div class="service-content__left">
              <div class="service-content__heading">
                <h1 class="service-content__title">{!! App::title() !!}</h1>
                @php if ( get_field( 'cs_service_link_text' ) ) : @endphp
                <a href="#" class="service-content__more">{{ get_field( 'cs_service_link_text' ) }}</a>
                @php endif; @endphp
              </div>
              <div class="service-content__content content">

                @php the_content() @endphp

              </div>

            </div>
            <div class="service-content__right">

              @include('partials.cadastr.h-widgets')

            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  {!! $service_info !!}

  @include('partials.cadastr.portfolio-list')

  @include('partials.cadastr.manager-inline')

  @include('partials.cadastr.stages-list')

  @include('partials.cadastr.results')

  @include('partials.cadastr.clients')

  @include('partials.commons.consultant')

  @include('partials.commons.pay-description')

  @include('partials.cadastr.statistics')

  @include('partials.cadastr.price')

  <section class="projects-list">
    <div class="projects-list__heading">
      <h2 class="projects-list__title">ВЫПОЛНЕННЫЕ ПРОЕКТЫ ПО СНИЖЕНИЮ СТОИМОСТИ</h2>
      <p class="projects-list__descr">Каждую неделю в компании находится в работе от 2 до 7 проектов по направлению "снижение кадастровой стоимости" на этапе оценки, и столько же на этапе комиссии или в судебном порядке. Ниже несколько примеров выполненных работ для понимания нашей компетенции и опыта работы с объектами подобными Вашему.</p>
    </div>

    <div class="projects-list__items">
      {!! $projects_list !!}
    </div>

    <div class="projects-list__callback">
      <p>Это только небольшая часть из сотен, выполненных компанией проектов, по оценке земельных участков в нескольких регионах России. </p>
      <p><a class="btn btn--primary" href="javascript:;" data-fancybox data-src="#modal-request">Заказать оценку</a></p>
    </div>
  </section>

  @include('partials.cadastr.solutions')

  {!! $last_news !!}

  {!! $resources !!}

  @include('partials.commons.manager')

  @endwhile
@endsection
