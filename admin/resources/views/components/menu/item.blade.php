<li class="{{ URL::to(Route::getCurrentRoute()->uri) == URL::to($target) ? 'active' : ''}}">
    <a href="{{ $target }}">
        <i class="fa fa-{{ $icon }}"></i>
        {{ $slot }}
    </a>
</li>
