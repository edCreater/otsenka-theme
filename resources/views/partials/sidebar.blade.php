@if (has_nav_menu('sidebar_navigation'))
  <div class="widget widget-services">
    <div class="widget-services__heading">
      <h2 class="widget-services__title">УСЛУГИ</h2>
      <p class="widget-services__subtitle">ВСЕ ВИДЫ И НАПРАВЛЕНИЯ УСЛУГ КОМПАНИИ</p>
    </div>
    {!! wp_nav_menu(['theme_location' => 'sidebar_navigation', 'menu_class' => 'widget-services__items', 'walker'=>new App\Modules\CS_Side_Menu_Walker()]) !!}
  </div>
@endif

@php dynamic_sidebar('sidebar-primary') @endphp