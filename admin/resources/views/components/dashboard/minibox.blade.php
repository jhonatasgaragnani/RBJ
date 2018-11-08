<div class="small-box bg-{{ $bg or 'red' }}">
    <div class="inner">
        <h3>{{ $title or 'Default' }}</h3>

        <p>{{ $slot }}</p>
    </div>
    <div class="icon">
        <i class="fa fa-{{ $icon or 'user' }}"></i>
    </div>
    <a href="{{ $target or '/' }}" class="small-box-footer">{{ $targetMessage or 'Mais informações' }} <i class="fa fa-arrow-circle-right"></i></a>
</div>