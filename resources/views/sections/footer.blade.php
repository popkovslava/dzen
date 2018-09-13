
<footer class="footer onepage-scroll">
    <div class="container">
        @if( !empty($config))
            <div class="columns-wrap">
                <div class="column column-soc">
                    <ul class="social">
                        @foreach($config as $item)
                            @if($item->keyConfig && $item->link )

                                @if(
                                $item->keyConfig->public==1 &&
                                $item->keyConfig->title=="social-github"||
                                 $item->keyConfig->public==1 &&
                                $item->keyConfig->title=='social-behance' ||
                                 $item->keyConfig->public==1 &&
                                $item->keyConfig->title=='social-dribbble' ||
                                 $item->keyConfig->public==1 &&
                                 $item->keyConfig->title=='social-facebook' ||
                                  $item->keyConfig->public==1 &&
                                $item->keyConfig->title=='social-twitter' ||
                                 $item->keyConfig->public==1 &&
                                $item->keyConfig->title=='social-linkedin'

                                )
                                    <li>
                                        <a href="{{ $item->link->url ? URL::to($item->link->url) : URL::to($page->getSlugById($item->link->page_id)->slug) }}" 
                                            class="social-icon" 
                                            target="_blank" 
                                            rel="noopener"
                                        >
                                            <svg class="icon icon-{{$item->keyConfig->title}}">
                                                <use xlink:href="#icon-{{$item->keyConfig->title}}"></use>
                                            </svg>
                                        </a>
                                    </li>

                                @endif
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="column column-btn">
                    @foreach($config as $item)
                        @if($item->keyConfig && $item->link )
                            @if($item->keyConfig->title=="contact_us_link")
                                @if($item->keyConfig->public==1 )
                                    <a class="btn btn-no-bg" href="{{$item->link->url?URL::to($item->link->url):URL::to($page->getSlugById($item->link->page_id)->slug) }}">{{$item->link->title }}</a>
                                @endif
                            @endif
                        @endif
                    @endforeach
                    <div class="info-wrap">
                        <div class="info">
                            @foreach($config as $item)
                                @if($item->keyConfig && !$item->link )
                                    @if($item->keyConfig->title=="mail")
                                        <p>
                                            <svg class="icon icon-mail">
                                                <use xlink:href="#icon-mail"></use>
                                            </svg>
                                            <a href="mailto:{{$item->title}}">{{$item->title}}</a>
                                        </p>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="column column-contacts">
                    <div class="info-wrap">

                        <div class="info">
                            <p>
                                <svg class="icon icon-location">
                                    <use xlink:href="#icon-location"></use>
                                </svg>
                                75 st Nicholas street<br>
                                Toronto, M4Y 0A5

                            </p>
                            <p>
                                <svg class="icon icon-location">
                                    <use xlink:href="#icon-location"></use>
                                </svg>

                                14 Skryhanava street<br>
                                Minsk, 220 073

                            </p>
                            <div class="clearfix"><!----></div>
                        </div>
                        <div class="info">
                            <p>
                                <svg class="icon icon-phone">
                                    <use xlink:href="#icon-phone"></use>
                                </svg>
                                <a href="tel:+1(647) 313-3428"> Toronto: (647) 313-3428</a><br/>
                                <a href="tel:+1(646) 883-9743">      NY: (646) 883-9743</a>
                            </p>
                            <p>
                                <svg class="icon icon-phone">
                                    <use xlink:href="#icon-phone"></use>
                                </svg>
                                <a href="tel:+375 29 677-22-44">BY: +375 (29) 677-2244</a><br/>

                            </p>
                            <div class="clearfix"><!----></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="clearfix"><!----></div>
        <p class="rights">&copy;‎ Dzensoft 2018 <a href="privacy" class="to-right">Privacy Policy</a></p>
    </div>
</footer>



