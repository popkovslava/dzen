@section('gallery-stack-3')
    @if($page->work)
        @if($page->work->gallery_3)

            @php
                $gallery = $page->work->gallery_3;
                $slides = $gallery->shuffle ? $gallery->slides->shuffle() : $gallery->slides;
            @endphp

            <section class="container other-projects">
                <h2 class="ta-center">{{ $page->work->gallery_3->title }}</h2>
                <div class="projects-gallery">
                    @foreach($slides as $k => $slide)
                        <div class="project">
                            <a href="{{ $slide->link_to }}">
                                <div class="image progressive" style="background-image: url({{ url($slide->image_mini) }});">

                                    @include('partials.gallery.picture-width', ['item' => $slide , 'class' => 'hide'])

                                    <div class="project-info">
                                        <div class="project-logo progressive" 
                                            data-normal="{{ url("/$slide->title_img")}}"
                                        ></div>
                                        <p class="use">{{ $page->stackByIdCategory($slide->stack_category_id) }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                @if($page->work->gallery_3->url)
                    <p class="ta-center">
                        <a class="btn btn-blue-color" href="{{ URL::to($page->work->gallery_3->url) }}">Go to full portfolio</a>
                    </p>
                @endif
            </section>
            <br> <br>
        @endif
    @endif
@show

