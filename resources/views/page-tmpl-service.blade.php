{{--
  Template Name: Service
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

              @include('partials.service.h-widgets')

            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  {!! $service_info !!}

  @include('partials.commons.consultant')

  <section class="projects-list">
    <div class="projects-list__heading">
      <h2 class="projects-list__title">ПРОЕКТЫ КОМПАНИИ</h2>
      <p class="projects-list__descr">Ниже представлено несколько проектов по определению рыночной стоимости зданий или их арендной ставки (арендных платежей), выполненных компанией "АРГЕНТ БИЗНЕС" для различных целей, для понимания наличия опыта оценки объектов, подобных Вашему.</p>
    </div>

    <div class="projects-list__items">
      {!! $projects_list !!}
    </div>

    <div class="projects-list__callback">
      <p>Это только небольшая часть из сотен, выполненных компанией проектов, по оценке земельных участков в нескольких регионах России. </p>
      <p><a class="btn btn--primary" href="javascript:;" data-fancybox data-src="#modal-request">Заказать оценку</a></p>
    </div>
  </section>

  {!! $last_news !!}

  @include('partials.commons.pay-description')

  {!! $resources !!}

  @include('partials.commons.manager')

  @endwhile
@endsection
