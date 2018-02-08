<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i><span>Users</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('users.index')}}"><i class="fa fa-circle-o"></i>List</a></li>
                    <li><a href="{{route('users.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>