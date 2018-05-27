{!! Form::open(['url' => (isset($article->id)) ? route('article.update',['article'=>$article->alias]) : route('article.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}
<div class="container-fluid">
    <!-- CKEditor -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2> <strong>Добавление статьи</strong> <small>на сайт</small> </h2>
                    <ul class="header-dropdown">
                        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else</a></li>
                            </ul>
                        </li>
                        <li class="remove">
                            <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                        </li>
                    </ul>
                </div>
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
                    <h2><strong>Weather</strong></h2>
                </div>
                <div class="body">
                    <div class="city">
                        <span>sky is clear</span>
                        <h3>New York</h3>
                        <img src="assets/images/weather/summer.svg" alt="">
                    </div>
                    <ul class="row days list-unstyled m-b-0">
                        <li>
                            <h5>SUN</h5>
                            <img src="assets/images/weather/sky.svg" alt="">
                            <span class="degrees">77</span>
                        </li>
                        <li>
                            <h5>MON</h5>
                            <img src="assets/images/weather/rain.svg" alt="">
                            <span class="degrees">81</span>
                        </li>
                        <li>
                            <h5>TUE</h5>
                            <img src="assets/images/weather/summer.svg" alt="">
                            <span class="degrees">82</span>
                        </li>
                        <li>
                            <h5>WED</h5>
                            <img src="assets/images/weather/summer.svg" alt="">
                            <span class="degrees">82</span>
                        </li>
                        <li>
                            <h5>THU</h5>
                            <img src="assets/images/weather/cloudy.svg" alt="">
                            <span class="degrees">81</span>
                        </li>
                        <li>
                            <h5>FRI</h5>
                            <img src="assets/images/weather/summer.svg" alt="">
                            <span class="degrees">67</span>
                        </li>
                        <li>
                            <h5>SAT</h5>
                            <img src="assets/images/weather/cloudy.svg" alt="">
                            <span class="degrees">81</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card top-report">
                <div class="body">
                    <h3 class="m-t-0 m-b-0">50.5 Gb</h3>
                    <p class="text-muted">Traffic this month</p>
                    <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="68" type="success">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                    </div>
                    <small>4% higher than last month</small>
                </div>
            </div>
        </div>

        
        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="header">
                    <h2><strong>New</strong> Friends <small>Add new friend in last month</small></h2>
                </div>
                <div class="body">
                    <ul class="new_friend_list list-unstyled row">
                        <li class="col-lg-4 col-md-2 col-sm-6 col-4">
                            <a href="">
                                <img src="assets/images/sm/avatar1.jpg" class="img-thumbnail" alt="User Image">
                                <h6 class="users_name">Jackson</h6>
                                <small class="join_date">Today</small>
                            </a>
                        </li>
                        <li class="col-lg-4 col-md-2 col-sm-6 col-4">
                            <a href="">
                                <img src="assets/images/sm/avatar2.jpg" class="img-thumbnail" alt="User Image">
                                <h6 class="users_name">Aubrey</h6>
                                <small class="join_date">Yesterday</small>
                            </a>
                        </li>
                        <li class="col-lg-4 col-md-2 col-sm-6 col-4">
                            <a href="">
                                <img src="assets/images/sm/avatar3.jpg" class="img-thumbnail" alt="User Image">
                                <h6 class="users_name">Oliver</h6>
                                <small class="join_date">08 Nov</small>
                            </a>
                        </li>
                        <li class="col-lg-4 col-md-2 col-sm-6 col-4">
                            <a href="">
                                <img src="assets/images/sm/avatar4.jpg" class="img-thumbnail" alt="User Image">
                                <h6 class="users_name">Isabella</h6>
                                <small class="join_date">12 Dec</small>
                            </a>
                        </li>
                        <li class="col-lg-4 col-md-2 col-sm-6 col-4">
                            <a href="">
                                <img src="assets/images/sm/avatar1.jpg" class="img-thumbnail" alt="User Image">
                                <h6 class="users_name">Jacob</h6>
                                <small class="join_date">12 Dec</small>
                            </a>
                        </li>
                        <li class="col-lg-4 col-md-2 col-sm-6 col-4">
                            <a href="">
                                <img src="assets/images/sm/avatar5.jpg" class="img-thumbnail" alt="User Image">
                                <h6 class="users_name">Matthew</h6>
                                <small class="join_date">17 Dec</small>
                            </a>
                        </li>
                    </ul>
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