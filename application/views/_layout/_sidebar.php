<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
     
      <!-- Optionally, you can add icons to the links -->

      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>
      </li>
      
      <li <?php if ($page == 'customers') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('customers'); ?>">
          <i class="fa fa-user"></i>
          <span>Customers</span>
        </a>
      </li>

      <li <?php if ($page == 'plots') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('plots'); ?>">
          <i class="fa fa-map-signs"></i>
          <span>Plots</span>
        </a>
      </li>
      
      <li <?php if ($page == 'survey') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('survey'); ?>">
          <i class="fa fa-map-marker"></i>
          <span>Survey</span>
        </a>
      </li>
	  
	    <li <?php if ($page == 'plot_photos') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('plot_photos'); ?>">
          <i class="fa fa-picture-o"></i>
          <span>Plot Photos</span>
        </a>
      </li>
	  
	  	    <li <?php if ($page == 'plot_videos') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('plot_videos'); ?>">
          <i class="fa fa-file-movie-o"></i>
          <span>Plot Videos</span>
        </a>
      </li>
	  
	  	  	    <li <?php if ($page == 'logout') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Auth/logout'); ?>">
          <i class="fa fa-sign-out"></i>
          <span>Logout</span>
        </a>
      </li>
	  
	  
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>