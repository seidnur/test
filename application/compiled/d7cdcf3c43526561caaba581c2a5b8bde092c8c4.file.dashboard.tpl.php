<?php /* Smarty version Smarty-3.1.7, created on 2019-08-23 19:51:03
         compiled from "C:\xampp\htdocs\kass\application\views\dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:215955d383962cbe7f7-77569804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7cdcf3c43526561caaba581c2a5b8bde092c8c4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kass\\application\\views\\dashboard.tpl',
      1 => 1562052976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '215955d383962cbe7f7-77569804',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d383962dee5d',
  'variables' => 
  array (
    'usersCount' => 0,
    'itemsCount' => 0,
    'categoriesCount' => 0,
    'saleCount' => 0,
    'user' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d383962dee5d')) {function content_5d383962dee5d($_smarty_tpl) {?>          <div class="panel panel-default">
            <div class="panel-body">     
              <h3 class="page-header">Dashboard</h3>            
                <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="fa fa-users"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text"><?php echo lang('users');?>
</span>
                              <span class="info-box-number badge-success"><?php echo $_smarty_tpl->tpl_vars['usersCount']->value;?>
</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-orange">
                            <span class="info-box-icon"><i class="fa fa-cog"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text"><?php echo lang('items');?>
</span>
                              <span class="info-box-number"><?php echo $_smarty_tpl->tpl_vars['itemsCount']->value;?>
</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-tasks"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text"><?php echo lang('categories');?>
</span>
                              <span class="info-box-number"><?php echo $_smarty_tpl->tpl_vars['categoriesCount']->value;?>
</span>
                              
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                      <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-envelope"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text"><?php echo lang('sale');?>
</span>
                              <span class="info-box-number"><?php echo $_smarty_tpl->tpl_vars['saleCount']->value;?>
</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                      </div>
                        <!-- /.col -->
                    </div>

            <div class="row">
            <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div style="border-radius:10px; border:1px solid rgb(241, 245, 245)">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div  style="border-radius:2px;  padding:0 2px 5px 2px">
                   <h3 class="text-capitalize text-center text-success">
                   <?php echo $_smarty_tpl->tpl_vars['user']->value;?>

                   </h3>
                  <h5 class="text-center"  style="margin:0 0 0 0">
                  <span class="badge bg-green"> <?php echo lang('top_seller');?>
 </span> </h5>
                  <hr>
                </div>
                <div class="text-center">
                  <img class="img-circle" style="margin:2px 2px 5px 2px" 
                   src="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/dist/img/user3-128x128.jpg" alt="User Avatar">
                </div>
                <div  style="border-radius:10px; background:white; padding:1px 1px 1px 1px">
                  <div class="row">
                
                    <div class="col-sm-4 border-right">
                      <hr>
                      <div class="description-block">
                        <h5 class="description-header">3,200 </h5>
                        <span class="description-text"> 
                         <?php echo lang('sale');?>
</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
              <div class="col-sm-4 border-right">
                     <hr>
                  <div class="description-block">
                        <h5 class="description-header">13,000</h5>
                        <span class="description-text"><?php echo lang('items');?>
</span>
                  </div>
                      <!-- /.description-block -->
              </div>
                    <!-- /.col -->
              <div class="col-sm-4">
                     <hr>
                  <div class="description-block">
                        <h5 class="description-header">3500</h5>
                        <span class="description-text"><?php echo lang('categories');?>
</span>
                  </div>
                      <!-- /.description-block -->
              </div>
                    <!-- /.col -->
            </div>
                  <!-- /.row -->
          </div>
        </div>
              <!-- /.widget-user -->
        </div>      <div class="col-md-8">
              <!-- Widget: user widget style 1 -->
              <div style="border-radius:10px;padding:8px 2px 4px 10px; border:1px solid rgb(241, 245, 245)">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div  style="border-radius:2px;  padding:10px 2px 15px 2px">
                   <h3 class="text-capitalize  text-success"> <strong> <?php echo lang('sale');?>
 </strong> </h3>
                   <h5><?php echo lang('income_vs_profit');?>
</h5>
                   <hr>
                <div class="chart">
                  <canvas id="barChart" style="height: 243px; width: 90%;" width="487" height="180px"></canvas>
                </div>
                 </div>
               </div>
            </div>
          <!-- /.widget-user -->
      </div>
  </div><!-- .panel-body -->
</div><!-- .panel -->
<?php }} ?>