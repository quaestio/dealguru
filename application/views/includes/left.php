 <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?=$this->session->userdata('user_image_url')==""?'img/user.png':$this->session->userdata('user_image_url');?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?= $this->session->userdata('full_name')?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                   
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                       
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>All Categories</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                            <?php foreach($deal_categories as $cItems):?>
                            <li><a href="<?=base_url()?><?=$cItems['SEO_LINK']?>"><i class="fa fa-angle-double-right"></i> <?=$cItems['CATEGORY_NAME'];?></a></li>
							<?php endforeach;?>
                              </ul>
                        </li>
                     
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Posted by</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href=""><i class="fa fa-angle-double-right"></i> Individual</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i> Dealer</a></li>
                               
                            </ul>
                        </li>
                       
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>