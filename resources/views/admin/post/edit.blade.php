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

              <h3 class="box-title">Quick Post Edit</h3>
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
                  
          <form role="form" action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="box-body">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $post->title }}">
                </div>

                <div class="form-group">
                  <label for="subtitle">Post Sub Title</label>
                  <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub Title" value="{{ $post->subtitle }}">
                </div>

                <div class="form-group">
                  <label for="slug">Post Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ $post->slug }}">
                </div>
                
              </div>
              <div class="col-lg-6">
                <br>
                <div class="form-group">
                  <div class="pull-right">
                    <label for="image">File input</label>
                    <input type="file" name="image" id="image">
                  </div>
                  <div class="checkbox pull-left">
                    <label>
                      <input type="checkbox" name="status" value="1" @if ($post->status == 1)
                        {{'checked'}}
                      @endif> Publish
                    </label>
                  </div>
                </div>
                <br>
                <div class="form-group" style="margin-top:18px;">
                  <label>Select Tags</label>
                  <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                    @foreach ($tag as $tag)
                    <option value="{{ $tag->id }}"
                      @foreach ($post->tags as $postTag)
                        @if ($postTag->id == $tag->id)
                          selected
                        @endif
                      @endforeach
                    >{{ $tag->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group" style="margin-top:18px;">
                  <label>Select Category</label>
                  <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                    @foreach ($category as $category)
                    <option value="{{ $category->id }}"


                    @foreach ($post->categories as $postCategory)
                      @if ($postCategory->id == $category->id)
                        selected
                      @endif
                    @endforeach
                    
                    >{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                
              </div>
            </div>
            <!-- /.box-body -->
            
            <div class="box">
             <div class="box-header">
               <h3 class="box-title">Write Post Body Here
                 <small>Simple and fast</small>
               </h3>
               <!-- tools box -->
               <div class="pull-right box-tools">
                 <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                   <i class="fa fa-minus"></i></button>
                 </div>
                 <!-- /. tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body pad">
                <textarea name="body" style="width: 100%; height: 700px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">{{ $post->body }}</textarea>
              </div>
             </div>

             <div class="box-footer">
              <input type="submit" class="btn btn-primary">
              <a href='{{ route('post.index') }}' class="btn btn-warning">Back</a>
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

