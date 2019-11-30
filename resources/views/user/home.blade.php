@extends('user/app')

@section('bg-img',  asset('user/img/home-bg.jpg'))

{{-- Post Title and Sub-title --}} 
@section('title',  'Obstructions!') 
@section('sub-title','All about my mind is here!') 



@section('main-body')

 <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">


        @foreach ($post as $item)
                  <div class="row">
                    <div class="col-8">
                      <div class="post-preview">
                        <a href="{{ route('post',$item->slug) }}">
                          <h2 class="post-title">
                           {{$item->title}}
                          </h2>
                          <h3 class="post-subtitle">
                            {{$item->subtitle}}
                          </h3>
                        </a>
                        <p class="post-meta">Posted by
                          <a href="{{ route('post',$item->slug) }}">Read more...</a>
                          {{$item->created_at->diffForHumans()}}</p>
               
                      </div>
                     </div>

                  <div class="col-4">
                    <div class="container" style="padding-top: 30px;">

                      {{ Storage::disk('local')->url($item->image) }}
                      

                    </div>

                  </div>
                </div>

               
              @endforeach   

               <ul class="pager">
                  <li class="next">
                    {{ $post->links() }}
                  </li>
              </ul>

        <div class="clearfix">
         
        </div>
      </div>


    </div>
  </div>

@endsection
