@extends (env('THEME').'.admin.layouts.admin')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Статьи
                    <small>Welcome to Dexploitdm</small>
                </h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <a href="{{ route('article.create') }}"><button class="btn btn-white btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button></a>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> Site</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                    <li class="breadcrumb-item active"><a href="{{ route('article.index') }}">Статьи</a></li>
                </ul>
            </div>
        </div>
    </div>
    {!! $content !!}
@endsection