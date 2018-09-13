@section('stack-block')
    <article>
        @if($page->work->stackCategory)
            <h3 class="ta-center">Stack</h3>
        @endif
        <p class="case-text">

            @if($page->work->stackCategory)
                @if($page->work->stackCategory->isType("frontend"))
                    @if($page->work->stackCategory)
                        @if($page->work->text_frontend && $page->work->title_frontend)
                            <span>{{$page->work->title_frontend }}:</span> {{$page->work->text_frontend }}
                        @endif
                    @endif
                @endif
            @endif

            @if($page->work->stackCategory)
                @if($page->work->stackCategory->isType("backend"))
                    <br>
                    @if($page->work->stackCategory)
                        @if($page->work->text_backend && $page->work->title_backend )
                            <span>{{$page->work->title_backend }}:</span> {{$page->work->text_backend }}
                        @endif
                    @endif
                @endif
            @endif

            @if($page->work->stackCategory)
                @if($page->work->stackCategory->isType("mobile"))
                    <br>
                    @if($page->work->stackCategory->stacks)
                        @if($page->work->text_mobile && $page->work->title_mobile)
                            <span>{{$page->work->title_mobile }}:</span> {{$page->work->text_mobile}}
                        @endif
                    @endif
                @endif
            @endif

            @if($page->work->stackCategory)
                @if($page->work->stackCategory->isType("tools"))
                    <br>
                    @if($page->work->stackCategory->stacks)
                        @if($page->work->text_tools && $page->work->title_tools )
                            <span>{{$page->work->title_tools }}:</span> {{$page->work->text_tools}}
                        @endif
                    @endif
                @endif
            @endif
            <br>
        </p>
    </article>
@show