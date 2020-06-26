          <div class="panel panel-default">
              <div class="panel-body">
              <h3 class="page-header">Dashboard</h3>            
                <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="fa fa-users"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text">{lang('users')}</span>
                              <span class="info-box-number badge-success">{$usersCount}</span>
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
                              <span class="info-box-text">{lang('Bidders')}</span>
                              <span class="info-box-number">{$BidderCount}</span>
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
                              <span class="info-box-text">{lang('employee')}</span>
                              <span class="info-box-number">{$employeeCount}</span>
                              
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                    </div>

            <div class="row">
            <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div style="border-radius:10px; border:1px solid rgb(241, 245, 245)">
                <!-- Add the bg color to the header using any of the bg-* classes -->

{*                <div class="text-center">*}
{*                  <img class="img-circle" style="margin:2px 2px 5px 2px" *}
{*                   src="{$config.base_url}assets/dist/img/user3-128x128.jpg" alt="User Avatar">*}
{*                </div>*}
                <div  style="border-radius:10px; background:white; padding:1px 1px 1px 1px">
                  <div class="row">
                
                    <div class="col-sm-4 border-right">
                      <hr>
                      <div class="description-block">
{*                        <h5 class="description-header">3,200 </h5>*}
                        <span class="description-text"> 
                         {lang('sale')}</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
              <div class="col-sm-4 border-right">
                     <hr>
                  <div class="description-block">
{*                        <h5 class="description-header">13,000</h5>*}
{*                        <span class="description-text">{lang('items')}</span>*}
                  </div>
                      <!-- /.description-block -->
              </div>
                    <!-- /.col -->
              <div class="col-sm-4">
                     <hr>
                  <div class="description-block">
{*                        <h5 class="description-header">3500</h5>*}
{*                        <span class="description-text">{lang('categories')}</span>*}
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
                   <h3 class="text-capitalize  text-success"> <strong> {lang('sale')} </strong> </h3>
                   <h5>{lang('income_vs_profit')}</h5>
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
