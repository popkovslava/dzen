@section('gallery-product')
    @if($page->gallery)

        @php
            $gallery = $page->gallery;
            $slides = $gallery->shuffle ? $gallery->slides->shuffle() : $gallery->slides;
        @endphp

        @foreach($slides as $k => $slide)

            <div class="main-banner top-banner fh" id="parallax">
                <div class="top-banner-bg progressive" style='background-image:url({{ url($slide->image_mini) }});'>

                    @include('partials.gallery.main.picture', ['item' => $slide, 'class' => 'hide'])

                </div>
                <div class="fh-inner top-banner-inner">
                    <div class="content">
                        @if($slide->title_img)
                            <h1 class="promo-text"> <img src="{{$slide->title_img}}"/></h1>
                        @endif
                        @if($page->description)
                            <p class="promo-text">{{$page->description}}</p>
                        @endif
                    </div>
                </div>
            </div>

        @endforeach

    @endif
@show

@section('gallery-simple')

    @if($page->gallery)

        @php
            $gallery = $page->gallery;
            $slides = $gallery->shuffle ? $gallery->slides->shuffle() : $gallery->slides;
        @endphp

        <div class="top-banner-wrap" >
            <div class="top-banner-slider" >
                <div class="top-banner section">
                    <div class="background-wrap">

                        @foreach($slides as $k => $slide)
                            <div class='img progressive' style='background-image: url({{ url($slide->image_mini) }});'>
                                @include('partials.gallery.main.picture', ['item' => $slide, 'class' => 'hide'])
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            @foreach($slides as $k => $slide)

                <div class="top-banner-text">
                    <div class="top-banner-inner">
                        <div class="content">

                            @if($slide->title)
                                <h1 class="promo-title">{{$slide->title}}</h1>
                            @endif

                            @if($slide->description)
                                <p class="promo-text">{{$slide->description}}</p>
                            @endif

                            @foreach($slide->buttons($slide->id) as $item)
                                @if($item->page_id)
                                    <a href="{{URL::to($page->getSlugById($item->page_id)->slug) }}" class="btn btn-main-color with-border ">{{$item->title}}</a>
                                @else
                                    <a href="{{$item->url}}" class="btn btn-main-color with-border ">{{$item->title}}</a>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>

            @endforeach

        </div>

    @endif

@stop
