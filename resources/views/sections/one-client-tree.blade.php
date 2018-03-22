@section('one-client-too')
    @if($page->clientsSection)
        <section class="section section-gray">
            <div class="review review-fw fh-inner">
                <div class="container">
                    <div class="content-wrap">
                        <div class="quote">
                            <svg class="icon icon-quotes">
                                <use xlink:href="#icon-quotes"></use>
                            </svg>
                        </div>
                        <blockquote>
                            After more than three years Dzensoft is still our remote development center. I think that speaks for itself.
                        </blockquote>


                        <a class="photo progressive">
                            @include('partials.clients-section.picture', ['item' => $page->clientsSection])
                        </a>

                        @if($page->clientsSection->link_in)
                            <p class="name"><a href="{{$page->clientsSection->link_in}}" target="_blank" rel="noopener">{{$page->clientsSection->name}}</a></p>
                        @else
                            <p class="name"><a href="{{$page->clientsSection->link_fb}}" target="_blank" rel="noopener">{{$page->clientsSection->name}}</a></p>
                        @endif
                        <p class="post">{!! $page->clientsSection->description !!}</p>

                    </div>
                </div>
            </div>
        </section>

    @endif
@show














