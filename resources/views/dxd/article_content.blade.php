<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset(env('THEME')) }}/img/article/{{ $article->img->path }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h1 class="title">{{ $article->title }}</h1>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section section-text">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <p>{!! $article->text !!}  </p>
                </div>
            </div>
        </div>
    </div>
</div>