<ol class="breadcrumb">

    @php
        $segments = explode('/', Route::getCurrentRoute()->uri);
        $last = '';
    @endphp
    @foreach($segments as $item)
        @php
            $last .= '/' . $item;
        @endphp
        <li>
            @if($loop->last)
                {{ __('Admin::breadcrumbs.' . $item) }}
            @elseif($loop->first)
                <a href="{{ $last }}">
                    <b>
                        <span class="fa fa-home"></span>
                        {{ __('Admin::breadcrumbs.' . $item) }}
                    </b>
                </a>
            @else
                <a href="{{ $last }}">
                    {{ __('Admin::breadcrumbs.' . $item) }}
                </a>
            @endif
        </li>
    @endforeach
</ol>