@extends('api.base')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">登录</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/api/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="app" value="{{$app_info['name']}}">

						<div class="form-group">
							<label class="col-md-4 control-label">账户</label>
							<div class="col-md-5">
								<input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="用户名/邮箱/手机">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">密码</label>
							<div class="col-md-5">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> 记住我
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">登录</button>
								<a class="btn btn-link" href="{{ url('/password/email') }}">忘记密码</a>
								<a class="btn btn-link" href="{{ url('/auth/register') }}">注册账户</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
