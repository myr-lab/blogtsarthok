@extends('admin.master')

	@section('body')


	 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Post Editor
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick Tag Edit</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body" style="width: 500px">


              @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

              <form action="{{ route('tag.store') }}" method="post">

              	@csrf
                
                <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="Tag-Name:">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="slug" placeholder="Slug">
                </div>

                <div>

                </div>
                <div>
                	<button type="Submit" class="btn btn-success">Submit</button>

                  <a class="btn btn-warning" href = '{{ route('tag.create') }}'> Show list</a>
                </div>
              </form>

            </div>
            <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>


	@endsection