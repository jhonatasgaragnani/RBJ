<li class="treeview {{ starts_with(Route::getCurrentRoute()->uri, 'admin/' . $start) ? 'active' : ''}}">
    <a href="#">
        <i class="fa fa-{{ $icon }}"></i> <span>{{ $title }}</span>
        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
    </a>
    <ul class="treeview-menu">

        {{ $slot }}
    </ul>
</li>
