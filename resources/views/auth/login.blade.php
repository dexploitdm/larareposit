@extends (env('THEME').'.layouts.site')

@section('content')
    <div class="page-header header-filter" style="background-image: url('{{ asset(env('THEME')) }}/assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
        <style>
            .page-header .container { padding-top: 90px;}
        </style>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">
                        <form class="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="header header-primary text-center">
                                <h4 class="card-title">Вход</h4>
                            </div>
                            <div class="card-content">

                                <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<span class="input-group-addon">
										<i class="material-icons">email</i>
									</span>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email..." required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
									<span class="input-group-addon">
										<i class="material-icons">lock_outline</i>
									</span>
                                    <input id="password" type="password" placeholder="Password..." class="form-control" name="password" required/>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>


								<div class="checkbox">
									<label>
										<input type="checkbox"  name="remember" {{ old('remember') ? 'checked' : '' }}>
										Запомнить
									</label>
								</div>

                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-primary btn-simple btn-wd btn-lg">
                                    Get Started
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
