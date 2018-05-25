<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('{{ asset(env('THEME')) }}/assets/img/bg10.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h2 class="title">Записи</h2>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">
        @if($article && count($article)>0)

        <div class="section">
            <h3 class="title text-center">Все самое интересное только у нас</h3>
            <br />
            <div class="row">

                @foreach($article as $item)
                <div class="col-md-4">
                    <div class="card card-plain card-blog">
                        <div class="card-image">
                            <a href="{{ route('articles.show', ['alias' =>$item->alias]) }}">
                                <img class="img img-raised" src="{{ asset(env('THEME')) }}/img/article/{{ $item->img->path }}" />
                            </a>
                        </div>

                        <div class="card-content">
                            <a href="{{ route('articleCat', ['cat_alias' => $item->category->alias]) }}">
                                @if($item->category->title == 'Советы')
                                    <h6 class="category text-warning">{{ $item->category->title }}</h6></a>
                                @else
                                <h6 class="category text-info">{{ $item->category->title }}</h6></a>
                                @endif

                            <h4 class="card-title">
                                <a href="{{ route('articles.show', ['alias' =>$item->alias]) }}">{{ $item->title }}</a>
                            </h4>
                            <p class="card-description">
                                {!! str_limit($item->desc,150) !!}<a href="{{ route('articles.show', ['alias' =>$item->alias]) }}"> Читать </a>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
        @else
            <div class="section">
                <h3 class="title text-center">По данной теме записей нету</h3>
            </div>
        @endif
    </div>


    <div class="subscribe-line">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title">Get Tips & Tricks every Week!</h4>
                        <p class="description">
                            Join our newsletter and get news in your inbox every week! We hate spam too, so no worries about this.
                        </p>
                </div>
                <div class="col-md-6">
                    <div class="card card-plain card-form-horizontal">
                        <div class="card-content">
                            <form method="" action="">
                                <div class="row">
                                    <div class="col-md-8">

                                        <div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">mail</i>
												</span>
                                            <input type="email" value="" placeholder="Your Email..." class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-primary btn-round btn-block">Subscribe</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>