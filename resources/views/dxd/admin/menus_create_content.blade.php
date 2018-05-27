{!! Form::open(['url' => (isset($menu->id)) ? route('menus.update',['menus'=>$menu->id]) : route('menus.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}
<div class="container-fluid">
    <!-- CKEditor -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Ссылка</strong><small>навигации</small> </h2>
                    <ul class="header-dropdown">
                        <li class="remove">
                            <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Пользовательская</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">Раздел статей</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane in active" id="home"> <b>Ссылка</b>
                            <div class="radio">
                                {!! Form::radio('type', 'customLink',(isset($type) && $type == 'customLink') ? TRUE : FALSE,[
                                'class' => 'radioMenu','id'=>'radio1']) !!}
                                <label for="radio1">
                                    Выбрать
                                </label>
                                <div class="pathhttp" style="display: inline-block; padding-left: 20px">
                                    {!! Form::text('custom_link',(isset($menu->path) && $type=='customLink') ? $menu->path  : old('custom_link'), ['placeholder'=>'Введите название ссылки','class'=>'form-control','style'=>'width: auto']) !!}
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile"> <b>Ссылка на разделы</b>
                            <div class="radio">
                                {!! Form::radio('type', 'articleLink',(isset($type) && $type == 'articleLink') ? TRUE : FALSE,[
                                'class' => 'radioMenu','id'=>'radio2']) !!}
                                <label for="radio2">
                                    Выбрать
                                </label>
                                <div class="pathhttp" style="display: inline-block; padding-left: 20px">
                                    {!! Form::select('category_alias',$categories,(isset($option) && $option) ? $option :FALSE, ['class'=>'form-control show-tick']) !!}
                                </div>
                                <div class="pathhttp" style="display: inline-block; padding-left: 20px; ">
                                    {!! Form::select('article_alias', $articles, (isset($option) && $option) ? $option :FALSE, ['placeholder' => 'Не используется','class'=>'form-control show-tick']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12 col-lg-6">
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
                    <div class="form-group">
                        <label>Заголовок ссылки</label>
                        {!! Form::text('title',isset($menu->title) ? $menu->title  : old('title'), ['class'=>'form-control','style'=>'width: auto']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::button('Сохранить', ['class' => 'btn btn-primary btn-round waves-effect m-t-20','type'=>'submit']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
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
                    <div class="form-group">
                        <label>Заголовок ссылки</label>
                        {!! Form::select('parent', $menus, isset($menu->parent) ? $menu->parent : null, ['class'=>'form-control show-tick','style'=>'width: auto']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# CKEditor -->
</div>
@if(isset($menu->id))
    <input type="hidden" name="_method" value="PUT">
@endif
{!! Form::close() !!}