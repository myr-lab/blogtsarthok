@extends('user/app')

@section('bg-img', Storage::disk('local')->url($post->image)) 

@section('title',  $post->title) 
@section('sub-title', $post->subtitle) 

@section('main-body')

  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

        	<small class=""> Created at  : {{  $post->created_at->diffForHumans() }} </small>

          @foreach ( $post->categories as $category )
              <small style=" float: right; border-radius: 50px; border:1px solid green ; padding: 1px 5px 1px 5px;">
                <a style="text-decoration: none;" href="{{ route('category',$category->slug) }}"> {{ $category->name }} </a>
              </small>
            @endforeach


          {!! htmlspecialchars_decode($post->body) !!}

          <hr>


          <h3>Tags Cloud</h3>

           @foreach ( $post->tags as $tag )
              <small class="pull-left "  style="margin-right: 20px; border-radius: 5px; border:1px solid gray ; padding: 5px;">
              	<a style="text-decoration: none;" href="{{ route('tag',$tag->slug) }}"> {{ $tag->name }} </a>
              </small>
            @endforeach

        </div>
      </div>
    </div>
  </article>

@endsection