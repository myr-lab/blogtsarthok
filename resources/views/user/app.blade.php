<!DOCTYPE html>
<html lang="en">

<head>

  @include('user.layouts.head')

</head>

<body>

  <!-- Navigation -->
  @include('user.layouts.nav')

  <!-- Page Header -->

          <header class="masthead" style="background-image: url(@yield('bg-img'))">
            <div class="overlay"></div>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                  <div class="site-heading">
                    <h1>@yield('title')</h1>
                    <span class="subheading">@yield('sub-title')</span>
                  </div>
                </div>
              </div>
            </div>
          </header>


  <!-- Main Content -->

  @section('main-body')
      {{-- expr --}}

      {{-- expr --}}
  @show

  <hr>

  <!-- Footer -->
  <footer>
    @include('user.layouts.footer')
  </footer>

  <!-- Bootstrap core JavaScript -->
  @include('user.layouts.scripts')


</body>

</html>
