@section('gallery-stack-2')
    @if($page->work->gallery_2)

        @php
            $gallery = $page->work->gallery_2;
            $slides = $gallery->shuffle ? $gallery->slides->shuffle() : $gallery->slides;
        @endphp

        <section class="container">
            <div  class="sm-screenshot-slider">
                @foreach($slides as $k => $slide)
                    <div class="sm-screenshot-item">
                        <div class="progressive" style="background-image: url({{ url($slide->image_height_mini) }});">
                            @include('partials.gallery.picture-height', ['item' => $slide , 'class' => 'hide'])
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @else
        <br> <br>
    @endif
@show