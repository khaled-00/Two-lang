@extends('panel.index', ['p' => 'user'])

@section('content')
 <div class="row">
      <div class="col-md-offset-1 col-md-10">

        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Adding a new user</h3>
          </div>
          <div class="box-body">

            <div class="form-group">
              <label>First name:</label>

              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user"></i>
                </div>
                <input type="text" class="form-control">
              </div>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->

            <div class="form-group">
              <label>Last name:</label>

              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user"></i>
                </div>
                <input type="text" class="form-control">
              </div>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->

            <div class="form-group">
              <label>E-mail:</label>

              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-envelope"></i>
                </div>
                <input type="email" class="form-control">
              </div>
              <!-- /.input group -->

            </div>
            <!-- /.form group -->
            <div class="form-group">
              <label>Password:</label>

              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-lock"></i>
                </div>
                <input type="password" class="form-control">
              </div>
              <!-- /.input group -->
            </div>
            
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!-- /.input group -->

            <!-- /.form group -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
       </div>
     </div>
@stop