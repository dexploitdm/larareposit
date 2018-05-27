<div class="container-fluid">
    <div class="container-fluid">
        <!-- Basic Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Статьи</strong> сайта</h2>
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
                    <div class="body table-responsive">
                        <table class="table table-striped m-b-0">
                            <thead>
                            <tr>
                                <th>Название</th>
                                <th data-breakpoints="xs">Описание</th>
                                <th data-breakpoints="xs">Картинка</th>
                            </tr>
                            </thead>
                            <tbody>
                        @if($article)
                            @foreach($article as $item)
                            <tr>
                                <td><a href="{{ route('article.edit',['article'=>$item->alias]) }}">{{ $item->title }}</a></td>
                                <td>{!! str_limit($item->desc,700) !!}</td>
                                <td>@if(isset($item->img->path))
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            {{ Html::image(asset(env('THEME')).'/img/article/'.$item->img->path,'',['style'=>'width:500px']) }}
                                            {!! Form::hidden('old_image',$item->img->path) !!}
                                        </div>
                                    @endif</td>
                            </tr>
                            @endforeach
                        @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Browser</strong> Usage</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp float-right">
                                    <li><a href="javascript:void(0);">Edit</a></li>
                                    <li><a href="javascript:void(0);">Delete</a></li>
                                    <li><a href="javascript:void(0);">Report</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="donut_chart" class="dashboard-donut-chart"></div>
                        <table class="table m-b-0">
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Chrome</td>
                                <td>6985</td>
                                <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Other</td>
                                <td>2697</td>
                                <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Safari</td>
                                <td>3597</td>
                                <td><i class="zmdi zmdi-caret-down text-danger"></i></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Firefox</td>
                                <td>2145</td>
                                <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Opera</td>
                                <td>1854</td>
                                <td><i class="zmdi zmdi-caret-down text-danger"></i></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>IE</td>
                                <td>54</td>
                                <td><i class="zmdi zmdi-caret-down text-danger"></i></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card ">
                    <div class="header">
                        <h2><strong>Latest</strong> Comments</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp float-right">
                                    <li><a href="javascript:void(0);">Edit</a></li>
                                    <li><a href="javascript:void(0);">Delete</a></li>
                                    <li><a href="javascript:void(0);">Report</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <ul class="inbox-widget list-unstyled clearfix">
                            <li class="inbox-inner"><a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-img"> <img src="{{ asset(env('THEMEA')) }}/assets/images/sm/avatar1.jpg" class="rounded" alt=""> </div>
                                        <div class="inbox-item-info">
                                            <p class="author">John Doe</p>
                                            <p class="inbox-message">Lorem Ipsum is simply dummy text of the been the industry's</p>
                                            <p class="inbox-date">12:34 PM</p>
                                        </div>
                                        <div class="hover_action">
                                            <a href="#"><i class="zmdi zmdi-favorite"></i></a>
                                            <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="#"><i class="zmdi zmdi-check-circle"></i></a>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="inbox-inner"> <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-img"> <img src="{{ asset(env('THEMEA')) }}/assets/images/sm/avatar2.jpg" class="rounded" alt=""> </div>
                                        <div class="inbox-item-info">
                                            <p class="author">Maryam Amiri</p>
                                            <p class="inbox-message">Lorem Ipsum is simply dummyLorem Ipsum has been the industry's</p>
                                            <p class="inbox-date">10:34 AM</p>
                                        </div>
                                        <div class="hover_action">
                                            <a href="#"><i class="zmdi zmdi-favorite"></i></a>
                                            <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="#"><i class="zmdi zmdi-check-circle"></i></a>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="inbox-inner"> <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-img"> <img src="{{ asset(env('THEMEA')) }}/assets/images/sm/avatar3.jpg" class="rounded" alt=""> </div>
                                        <div class="inbox-item-info">
                                            <p class="author">Fidel Tonn</p>
                                            <p class="inbox-message">text of the printing and  has been the industry's</p>
                                            <p class="inbox-date">15:34 PM</p>
                                        </div>
                                        <div class="hover_action">
                                            <a href="#"><i class="zmdi zmdi-favorite"></i></a>
                                            <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="#"><i class="zmdi zmdi-check-circle"></i></a>
                                        </div>
                                    </div>
                                </a> </li>
                            <li class="inbox-inner"> <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-img"> <img src="{{ asset(env('THEMEA')) }}/assets/images/sm/avatar4.jpg" class="rounded" alt=""> </div>
                                        <div class="inbox-item-info">
                                            <p class="author">Gary Camara</p>
                                            <p class="inbox-message">simply dummy text of the printing and typesetting industry's</p>
                                            <p class="inbox-date">11:10 AM</p>
                                        </div>
                                        <div class="hover_action">
                                            <a href="#"><i class="zmdi zmdi-favorite"></i></a>
                                            <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="#"><i class="zmdi zmdi-check-circle"></i></a>
                                        </div>
                                    </div>
                                </a> </li>
                            <li class="inbox-inner"> <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-img"><img src="{{ asset(env('THEMEA')) }}/assets/images/sm/avatar5.jpg" class="rounded" alt=""> </div>
                                        <div class="inbox-item-info">
                                            <p class="author">Tim Hank</p>
                                            <p class="inbox-message">text of the industry. Lorem Ipsum has been the industry's</p>
                                            <p class="inbox-date">18:45 PM</p>
                                        </div>
                                        <div class="hover_action">
                                            <a href="#"><i class="zmdi zmdi-favorite"></i></a>
                                            <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="#"><i class="zmdi zmdi-check-circle"></i></a>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="inbox-inner"> <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-img"> <img src="{{ asset(env('THEMEA')) }}/assets/images/sm/avatar6.jpg" class="rounded" alt=""> </div>
                                        <div class="inbox-item-info">
                                            <p class="author">Hossein Shams </p>
                                            <p class="inbox-message">text of the printing and  has been the industry's</p>
                                            <p class="inbox-date">15:34 PM</p>
                                        </div>
                                        <div class="hover_action">
                                            <a href="#"><i class="zmdi zmdi-favorite"></i></a>
                                            <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="#"><i class="zmdi zmdi-check-circle"></i></a>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card single_post">
                    <div class="header">
                        <h2><strong>Latest</strong> Post</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp float-right">
                                    <li><a href="javascript:void(0);">Edit</a></li>
                                    <li><a href="javascript:void(0);">Delete</a></li>
                                    <li><a href="javascript:void(0);">Report</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <h3 class="m-t-0 m-b-5"><a href="#">Apple Introduces Search Ads Basic</a></h3>
                        <ul class="meta">
                            <li><a href="#"><i class="zmdi zmdi-account col-blue"></i>Posted By: John Smith</a></li>
                            <li><a href="#"><i class="zmdi zmdi-label col-amber"></i>Technology</a></li>
                            <li><a href="#"><i class="zmdi zmdi-comment-text col-blue"></i>Comments: 3</a></li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="img-post m-b-15">
                            <img src="{{ asset(env('THEMEA')) }}/assets/images/blog/blog-page-4.jpg" alt="Awesome Image">
                            <div class="social_share">
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-facebook"></i></button>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-twitter"></i></button>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-instagram"></i></button>
                            </div>
                        </div>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal</p>
                        <a href="#" title="read more" class="btn btn-round btn-info">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>