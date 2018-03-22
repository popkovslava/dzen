@section('gallery-stack-1')
    @if($page->work->gallery_1)

        @php
            $gallery = $page->work->gallery_1;
            $slides = $gallery->shuffle ? $gallery->slides->shuffle() : $gallery->slides;
        @endphp

        <section class="container">
            <div class="screenshot-slider">
                @foreach($slides as $k => $slide)
                    <div class="screenshot-item progressive" style="background-image: url({{ url($slide->image_mini) }}">
                        @include('partials.gallery.picture-width', ['item' => $slide , 'class' => 'hide'])
                    </div>
                @endforeach
            </div>
        </section>

    @endif
@show

