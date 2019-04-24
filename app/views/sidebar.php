<!--Header-part-->
<div id="header">
  <h1><a href="<?=base_url()?>">Rigen</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="fa fa-user"></i>  <span class="text">Welcome <?=$this->session->userdata('data')['username']?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="<?=base_url()?>profile"><i class="fa fa-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="fa fa-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="<?=base_url()?>logout"><i class="fa fa-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="fa fa-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="fa fa-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="fa fa-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="fa fa-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="fa fa-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="fa fa-cog"></i> <span class="text">Settings</span></a></li>
  </ul>
</div>

<!--start-top-serch-->
<!-- <div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="fa fa-search fa-white"></i></button>
</div> -->
<!--close-top-serch--> 

<!--sidebar-menu-->

<div id="sidebar"><a href="#" class="visible-phone"><i class="fa fa-home"></i> Dashboard2</a>
  <ul>
    <li ><a href="<?=base_url()?>"><i class="fa fa-home"></i> <span>Dashboard</span></a> </li>
    <li ><a href="<?=base_url()?>driver"><i class="fa fa-drivers-license-o"></i> <span>Driver</span></a> </li>
    <li ><a href="<?=base_url()?>"><i class="fa fa-headphones"></i> <span>Customer Service</span></a> </li>
    <li ><a href="<?=base_url()?>service"><i class="fa fa-motorcycle"></i> <span>Services</span></a> </li>
    <li ><a href="<?=base_url()?>"><i class="fa fa-group"></i> <span>Customer</span></a> </li>
    <li class="submenu"><a href="<?=base_url()?>"><i class="fa fa-motorcycle"></i> <span>Order</span></a> 
      <ul>
        <li><a href="<?=base_url()?>order">Order</a></li>
        <li><a href="<?=base_url()?>">Form with Validation</a></li>
        <li><a href="<?=base_url()?>">Form with Wizard</a></li>
      </ul>
    </li>
    <li ><a href="<?=base_url()?>admin"><i class="fa fa-user"></i> <span>Admin</span></a> </li>
  </ul>
</div>