<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('admin/dist/img/ammar.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Md Ammar Hossain</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="{{ route('post.index') }}">
            <i class="fa fa-dashboard"></i> <span>Post</span>
            <span class="pull-right-container">

            </span>
          </a>
          
        </li>
        <li class="active treeview">
          <a href="{{ route('category.index') }}">
            <i class="fa fa-dashboard"></i> <span>Category</span>
            <span class="pull-right-container">

            </span>
          </a>
        </li>

        <li class="active treeview">
          <a href="{{ route('tag.index') }}">
            <i class="fa fa-dashboard"></i> <span>Tag</span>
            <span class="pull-right-container">

            </span>
          </a>
        </li>

>
        
      </ul>
    </section>