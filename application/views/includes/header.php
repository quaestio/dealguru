<header class="header">
            <a href="<?=base_url();?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                DealGuru
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li><?php if($this->session->userdata('id_user')!="")
                                            echo '<a class="" data-toggle="modal" data-target="#myModal"><i class="fa fa-upload"></i></a>';
                                             ?>
                                           </li> 
                        
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                        <?php 
                        if($this->session->userdata('id_user')!="")
                        {
                        ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                
                                <i class="caret"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?=base_url();?>img/user.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?= $this->session->userdata('full_name')?> - Web Developer
                                        <small><?= $this->session->userdata('date_created');?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?=base_url();?>user/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                            <?php }
                            else
                            {
                            ?>
                             <a data-toggle="modal" data-target="#mLogin"><i class="fa fa-user"></i> Login</a></li>
                             <li><a href="<?=base_url();?>user/register"><i class="fa fa-user"></i> Register</a>
                            <?php }?>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>