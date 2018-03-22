@section('gallery-main')

    @if($page->gallery)

        <div class="top-banner-wrap" id="parallax">

                <div class="top-banner-slider">

                    @if($page->gallery)

                        @php
                            $gallery = $page->gallery;
                            $slides = $gallery->shuffle ? $gallery->slides->shuffle() : $gallery->slides;
                        @endphp

                        @foreach($slides as $k => $slide)

                            <div class="fh top-banner section">
                                <div class="background-wrap">

                                    <div class='img progressive' style='background-image: url({{ url($slide->image_mini) }});'>
                                        @include('partials.gallery.main.picture', ['item' => $slide, 'class' => 'hide'])
                                    </div>

                                    @if( $k == count($page->gallery->slides)-1)
                                        <div class='img-next progressive' style='background-image: url({{ url($page->gallery->slides[0]->image_mini) }});'>
                                            @include('partials.gallery.main.picture', ['item' => $page->gallery->slides[0], 'class' => 'hide'])
                                        </div>
                                    @else
                                        <div class='img-next progressive' style='background-image: url({{ url($page->gallery->slides[$k+1]->image_mini) }});'>
                                            @include('partials.gallery.main.picture', ['item' => $page->gallery->slides[$k+1], 'class' => 'hide'])
                                        </div>
                                    @endif

                                </div>
                            </div>

                        @endforeach
                    @endif

                </div>

                <div class="top-banner-text">
                    <div class="fh-inner top-banner-inner">
                        <div class="content">
                            <h1 class="promo-title">{!! $page->title !!}</h1>
                            <p class="promo-text">{!! $page->description !!}</p>
                            @if($page->gallery)
                                @foreach($slides as $k => $slide)

                                    @if($slide->buttons($slide->id))

                                        @foreach($slide->buttons($slide->id) as $key => $item)

                                            @if($key % 2 == 0)
                                                @if($item->page_id)
                                                    <a href="{{ URL::to($page->getSlugById($item->page_id)->slug) }}" class="btn btn-main-color">{{$item->title}}</a>
                                                @else
                                                    <a href="{{ $item->url }}" class="btn btn-main-color">{{$item->title}}</a>
                                                @endif
                                            @else
                                                @if($item->page_id)
                                                    <a href="{{ URL::to($page->getSlugById($item->page_id)->slug) }}" class="btn btn-main-color with-border transparent">{{$item->title}}</a>
                                                @else
                                                    <a href="{{ $item->url }}" class="btn btn-main-color with-border transparent">{{ $item->title }}</a>
                                                @endif
                                            @endif

                                        @endforeach

                                    @endif

                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
        </div>
    @endif

@show