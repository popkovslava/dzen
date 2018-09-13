<nav class="main-nav">
    <ul class="nav">
        @if( !empty($menu))
            @foreach($menu as $item)
                @if($item->public==true)
                    @if($item->page->slug == '/')
                        <li {!! classActivePath($item->page->slug ,$page->work) !!}><a href="{{ asset($item->page->slug)}}">{{$item->title}}</a></li>
                    @else
                        <li {!! classActivePath($item->page->slug ,$page->work) !!}><a href="{{action('PageController@show', $item->page->slug)}}">{{$item->title}}</a></li>
                    @endif
                @endif
            @endforeach
        @endif

    </ul>
    <div class="dot"><!-- --></div>
</nav>



<div class="nav-mobile">
    <div id="menuToggle">
        <input type="checkbox"/>
        <span></span>
        <span></span>
        <span></span>

        <div id="menu">
            <ul>
                @if( !empty($menu))
                    @foreach($menu as $item)
                        @if($item->public==true)
                            @if($item->page->slug == '/')
                                <li {!! classActivePath( $item->page->slug ,$page->work) !!}><a href="{{ asset($item->page->slug)}}">{{$item->title}}</a></li>
                            @else
                                <li {!! classActivePath( $item->page->slug ,$page->work) !!}><a href="{{action('PageController@show', $item->page->slug)}}">{{$item->title}}</a></li>
                            @endif
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
