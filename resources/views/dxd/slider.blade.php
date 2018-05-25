<div class="section-space"></div>
<div class="cd-section" id="headers">
<div class="header-1">
        @if($slider)
    @foreach($slider as $item)
        @if($item->img)
            <div class="page-header header-filter" style="background-image: url('{{ asset(env('THEME')) }}/img/sliders/{{ $item->img->path }}');">
        @endif
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">{!! $item->title !!}</h1>
                    <h4>{!! $item->desc !!}</h4>
                    <br />
                    <a href="https://github.com/dexploitdm/larareposit" target="_blank" class="btn btn-danger btn-lg">
                        <i class="fa fa-git"></i>
                    </a>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <div class="iframe-container">
                        <iframe src="https://www.youtube.com/embed/IN6QnLpVEPI?modestbranding=1&autohide=1&showinfo=0" frameborder="0" allowfullscreen height="250"></iframe>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endforeach
@endif
</div>
</div>