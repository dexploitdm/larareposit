{!! Form::open(['url' => (isset($article->id)) ? route('article.update',['article'=>$article->alias]) : route('article.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}
<div class="container-fluid">
    <!-- CKEditor -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="form-group">
                        {!! Form::text('title',isset($article->title) ? $article->title  : old('title'), ['class'=>'form-control','placeholder' => 'Введите название статьи']) !!}
                    </div>
                    {!! Form::select('category_id', $categories,isset($article->category_id) ? $article->category_id  : '',['class'=>'form-control show-tick']) !!}
                </div>
            </div>
            <div class="card">
                <div class="body">
                    {!! Form::textarea('text',isset($article->text) ? $article->text  : old('text'), ['id'=>'ckeditor']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12 col-lg-4">
            <div class="card weather">
                <div class="header">
                    <h2><strong>Обложка</strong></h2>
                </div>
                <div class="body">
                    @if(isset($article->img->path))
                        {{ Html::image(asset(env('THEME')).'/img/article/'.$article->img->path,'',['style'=>'width: auto; height: auto']) }}
                        {!! Form::hidden('old_image',$article->img->path) !!}
                    @endif
                        {!! Form::file('image', ['class' => 'btn btn-primary btn-round waves-effect m-t-20']) !!}
                </div>
            </div>
        </div>


        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="header">
                    <h2><strong>Описание</strong></h2>
                    <ul class="header-dropdown">
                        <li class="remove">
                            <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <h2 class="card-inside-title">Краткое описание статьи</h2>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4"  name="desc" class="form-control no-resize" placeholder="Напишите...">
                                         @if(isset($article->desc)){!! $article->desc !!}@endif
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card top-report">
                    <div class="body">
                        <div class="form-group">
                            {!! Form::text('alias',isset($article->alias) ? $article->alias  : old('alias'), ['class'=>'form-control', 'style'=> 'width: auto']) !!}
                            {!! Form::button('Сохранить', ['class' => 'btn btn-primary btn-round waves-effect m-t-20','type'=>'submit']) !!}
                        </div>
                    </div>
            </div>
        </div>

    </div>
    <!-- #END# CKEditor -->
</div>
@if(isset($article->id))
    <input type="hidden" name="_method" value="PUT">
@endif
{!! Form::close() !!}