
@section('client-gallery')

    @if($page->clientSectionCategory)

        <div class="section section-gray">
            <div class="container">
                <div class="review-slider">

                    @foreach($page->clientSectionCategory->clients as $item)

                        @if($item->public)
                            <div>
                                <div class="review">
                                    <div class="content-wrap">
                                        <div class="photo progressive">
                                            @include('partials.clients-section.picture', ['item' => $item])
                                        </div>
                                        <p class="name">
                                            {!! $item->name !!}

                                            @if($item->link_in)
                                                <a href="{{ $item->link_in }}" target="_blank" rel="noopener">
                                                    <svg class="icon icon-in">
                                                        <use xlink:href="#icon-in"></use>
                                                    </svg>
                                                </a>
                                            @endif

                                            @if($item->link_fb)
                                                <a href="{{ $item->link_fb }}" target="_blank" rel="noopener">
                                                    <svg class="icon icon-fb">
                                                        <use xlink:href="#icon-fb"></use>
                                                    </svg>
                                                </a>
                                            @endif

                                        </p>
                                        <p class="post"><span>{!! $item->description  !!}</span></p>
                                        <p class="review-body">
                                            "{{ $item->text }}"
                                        </p>

                                        @foreach($item->buttons($item->id) as $key => $btn)

                                            @if(substr($btn->title, 0, 10) == "Case study")

                                                <a class="btn-review" href="{{ ($btn->url) ? $btn->url : url($page->pageById($btn->id)->slug) }}">
                                                    <svg class="icon icon-letter-svg">
                                                        <use xlink:href="#icon-letter-svg"></use>
                                                    </svg>
                                                    {{ substr($btn->title, 0, 10) }}
                                                </a>

                                            @else

                                                <a class="btn-review js_popup-youtube" href="{{ ($btn->url) ? $btn->url : url($page->pageById($btn->id)->slug) }}">
                                                    {{ substr($btn->title, 0, 11) }}
                                                </a>

                                            @endif

                                        @endforeach

                                    </div>
                                </div>
                            </div>

                        @endif

                    @endforeach

                </div>
            </div>
        </div>

    @endif

@show

