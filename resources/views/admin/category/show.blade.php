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

      	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Tags</h3>

              <a class="col-lg-offset-10 btn btn-success" href=" {{ route('category.index') }} ">Add new Category</a>
            </div>


            <!-- /.box-header -->
            <div class="box-body">



              
                  
              <table id="example1" class="table table-bordered table-striped">

                <thead>

                		<tr>
		                  <th>Sl number</th>
		                  <th>Category name</th>
		                  <th>slug</th>
                      <td> Edit</td>
                      <td>Dlete</td>
		                  
		                </tr>

                </thead>

                 <tbody>

                	@foreach ($category as $category)
		                <tr>
		                  <td>{{ $loop->index+1 }}</td>
		                  <td>{{ $category->name}}</td>
		                  <td>{{ $category->slug}}</td>
                      <td><a href="{{ route('category.edit', $category->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
                      </td>


                      <td>
                        <form id="delete-form-{{ $category->id }}" method="post" action="{{ route('category.destroy', $category->id) }}"  style="display:none">
                        {{ csrf_field() }}
                        category
                        {{ method_field('DELETE') }}
   
                        </form>

                        <a href="" onclick="
                              if(confirm('Are you sure, You Want to delete this?'))
                                  {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $category->id }}').submit();
                                  }
                                  else{
                                    event.preventDefault();
                                  }" ><span class="glyphicon glyphicon-trash"></span></a>

                      </td>
		                  
		                </tr>
                	@endforeach

                
                


                </tbody>

                <thead>
                <tr>
                  <th>Sl number</th>
                  <th>Category name</th>
                  <th>slug</th>
                  <th>Edit</th>
                  <th>Dlete</th>
                </tr>
                </thead>

              </table>
            </div>



    </section>
</div>

	@endsection