<div class="container-fluid">
    <div class="container-fluid">
        <!-- Basic Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Навигация</strong> сайта</h2>
                        <ul class="header-dropdown">
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
                                <th data-breakpoints="xs">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($menus)
                                @include(env('THEME').'.admin.custom-menu-items', array('items' => $menus->roots(),'paddingLeft' => ''))
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>