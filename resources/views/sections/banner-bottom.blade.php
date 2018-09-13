@section('banner-bottom')
    @if($page->bannerBottom)
        @if($page->bannerBottom->gallery)

            @php
                $gallery = $page->bannerBottom->gallery;
                $slides = $gallery->shuffle ? $gallery->slides->shuffle() : $gallery->slides;
            @endphp

            @foreach($slides as $key=> $slide)
                @if($key == 0)
                
                <section class="banner-bottom section progressive">
                    @include('partials.gallery.main.picture', ['item' => $slide, 'class' => 'hide'])

                        <div class="container">
                            @if($page->bannerBottom->description)
                                <h2 class="ta-center">{!! $page->bannerBottom->description!!}</h2>
                            @endif
                            <p class="ta-center">
                                @if($slide->id)
                                    @if($slide->buttons($slide->id))
                                        @foreach($slide->buttons($slide->id) as $key=> $item)
                                            @if($key % 2 == 0)
                                                @if($item->page_id)
                                                    <a class="btn btn-main-color with-border" href="{{URL::to($page->getSlugById($item->page_id)->slug) }}" class="btn btn-main-color">{{$item->title}}</a>
                                                @else
                                                    <a class="btn btn-main-color with-border"  href="{{$item->url}}" class="btn btn-main-color">{{$item->title}}</a>
                                                @endif
                                            @else
                                                @if($item->page_id)
                                                    <a class="btn btn-main-color with-border transparent" href="{{URL::to($page->getSlugById($item->page_id)->slug) }}" class="btn btn-main-color">{{$item->title}}</a>
                                                @else
                                                    <a class="btn btn-main-color with-border transparent" href="{{$item->url}}" class="btn btn-main-color">{{$item->title}}</a>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                @endif
                            </p>
                        </div>
                    </section>
                @endif
            @endforeach
        @endif
    @endif
@show




