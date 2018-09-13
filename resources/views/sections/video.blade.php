@section('video')
    @if($page->videoCategory)
        <section class="clients">
            <div class="container">
                <h2>{{$page->videoCategory->title}}</h2>
                <div class="video-clients">
                    @foreach($page->videoCategory->videos as $k=>$item)
                    <div class="video-clients-item">
                        <div class="video">
                            <iframe width="30%" height="300px" src="https://www.youtube.com/embed/{{$item->url}}?rel=0;controls=1" allowfullscreen frameborder="0" >
                            </iframe>
                        </div>
                        <div class="video-clients-info ta-center">

                            @if($item->title)
                                <p class="company">{!!  $item->title !!}</p>
                            @endif

                            @if($item->description)
                               <p>{{ $item->description }}</p>
                            @endif

                            @if($item->image)

                                <div class="progressive">
                                    @include('partials.video.picture', ['item' => $item])
                                </div>

                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@show





