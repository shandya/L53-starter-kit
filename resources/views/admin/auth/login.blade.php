@extends('admin.layouts.simple')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Please Sign In</h3>
          </div>
          <div class="panel-body">
            @include('admin._partials.notifications')
            <form method="post" role="form">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <fieldset>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <!-- Change this to a button or input when using this as a form -->
                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
