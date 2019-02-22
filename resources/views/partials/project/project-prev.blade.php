<div class="projects-list__item">
  <div class="project-prev">
    <div class="project-prev__heading">
      <p class="project-prev__title">{!! $title !!}</p>
      <p class="project-prev__subtitle">{{ $subtitle }}</p>
    </div>
    <a href="{!! $url !!}" class="project-prev__thumb">
      {!! $thumb !!}
    </a>
    <div class="project-prev__descr">
      <span class="project-prev__lbl">Описание:</span> {{ $description }}
    </div>
  </div>
</div>