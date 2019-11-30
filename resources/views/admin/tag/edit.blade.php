@extends('admin.master')

@section('body')
  {{-- expr --}}

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

              <h3 class="box-title">Quick tag Edit</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">

                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                  @if(session()->has('message'))
                   <h4 class="alert alert-success">{{session()->get('message')}}</h4>
                  @endif
                  
              <form action="{{ route('tag.update', $tag->id) }}" method="post">

                @csrf

                {{ method_field('PUT') }}

                <div class="form-group">
                  <input type="text" class="form-control" name="name" value="{{ $tag->name }}" placeholder="Category Name:">
                </div>
        
                <div class="form-group">
                  <input type="text" class="form-control" name="slug" value="{{ $tag->slug }}" placeholder="Slug">
                </div>
 
           {{--   <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="customFile" name="filename">
              <label class="custom-file-label" for="customFile"></label>
            </div> --}}

                <div>
                  <button type="submit" class="btn btn-success">Submit</button>
                  <a class="btn btn-success" href="{{ route('tag.create') }}">View category</a>
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

