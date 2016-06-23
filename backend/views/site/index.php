<?php

/* @var $this yii\web\View */

//$this->title = 'My Yii Application';
?>
 <div class="row">
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-success pull-right"><?php echo Yii::t('app', 'Monthly');?></span>
                <h5><?php echo Yii::t('app', 'Purchase');?></h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">$<?php echo Yii::t('app', '48,250');?></h1>
                <div class="stat-percent font-bold text-success"><?php echo Yii::t('app', '98%');?> <i class="fa fa-bolt"></i></div>
                <small><?php echo Yii::t('app', 'Total Purchase');?></small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-info pull-right"><?php echo Yii::t('app', 'Annual');?></span>
                <h5><?php echo Yii::t('app', 'Orders');?></h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo Yii::t('app', '58,700');?></h1>
                <div class="stat-percent font-bold text-info"><?php echo Yii::t('app', '20%');?> <i class="fa fa-level-up"></i></div>
                <small><?php echo Yii::t('app', 'Total Orders');?></small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-primary pull-right"><?php echo Yii::t('app', 'Today');?></span>
                <h5><?php echo Yii::t('app', 'Goods Received');?></h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo Yii::t('app', '55,500');?></h1>
                <div class="stat-percent font-bold text-navy"><?php echo Yii::t('app', '44%');?> <i class="fa fa-level-up"></i></div>
                <small><?php echo Yii::t('app', 'Total Goods');?></small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-danger pull-right"><?php echo Yii::t('app', 'Low value');?></span>
                <h5><?php echo Yii::t('app', 'Hotel Users');?></h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo Yii::t('app', '300');?></h1>
                <div class="stat-percent font-bold text-danger"><?php echo Yii::t('app', '38%');?> <i class="fa fa-level-down"></i></div>
                <small><?php echo Yii::t('app', 'Total Hotel Users');?></small>
            </div>
        </div>
</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo Yii::t('app', 'Orders');?></h5>
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-xs btn-white active"><?php echo Yii::t('app', 'Today');?></button>
                        <button type="button" class="btn btn-xs btn-white"><?php echo Yii::t('app', 'Monthly');?></button>
                        <button type="button" class="btn btn-xs btn-white"><?php echo Yii::t('app', 'Annual');?></button>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                <div class="col-lg-9">
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <ul class="stat-list">
                        <li>
                            <h2 class="no-margins"><?php echo Yii::t('app', '2,346');?></h2>
                            <small><?php echo Yii::t('app', 'Total orders in period');?></small>
                            <div class="stat-percent"><?php echo Yii::t('app', '48%');?> <i class="fa fa-level-up text-navy"></i></div>
                            <div class="progress progress-mini">
                                <div style="width: 48%;" class="progress-bar"></div>
                            </div>
                        </li>
                        <li>
                            <h2 class="no-margins "><?php echo Yii::t('app', '4,422');?></h2>
                            <small><?php echo Yii::t('app', 'Orders in last month');?></small>
                            <div class="stat-percent"><?php echo Yii::t('app', '60%');?> <i class="fa fa-level-down text-navy"></i></div>
                            <div class="progress progress-mini">
                                <div style="width: 60%;" class="progress-bar"></div>
                            </div>
                        </li>
                        <li>
                            <h2 class="no-margins "><?php echo Yii::t('app', '9,180');?></h2>
                            <small><?php echo Yii::t('app', 'Monthly income from orders');?></small>
                            <div class="stat-percent"><?php echo Yii::t('app', '22%');?> <i class="fa fa-bolt text-navy"></i></div>
                            <div class="progress progress-mini">
                                <div style="width: 22%;" class="progress-bar"></div>
                            </div>
                        </li>
                        </ul>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>


<div class="row">
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo Yii::t('app', 'Messages');?></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content ibox-heading">
                <h3><i class="fa fa-envelope-o"></i><?php echo Yii::t('app', 'New messages');?> </h3>
                <small><i class="fa fa-tim"></i> <?php echo Yii::t('app', 'You have 22 new messages and 16 waiting in draft folder.');?></small>
            </div>
            <div class="ibox-content">
                <div class="feed-activity-list">

                    <div class="feed-element">
                        <div>
                            <small class="pull-right text-navy"><?php echo Yii::t('app', '1m ago');?></small>
                            <strong><?php echo Yii::t('app', 'Monica Smith');?></strong>
                            <div><?php echo Yii::t('app', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum');?></div>
                            <small class="text-muted"><?php echo Yii::t('app', 'Today 5:60 pm - 12.06.2014');?></small>
                        </div>
                    </div>

                    <div class="feed-element">
                        <div>
                            <small class="pull-right"><?php echo Yii::t('app', '2m ago');?></small>
                            <strong><?php echo Yii::t('app', 'Jogn Angel');?></strong>
                            <div><?php echo Yii::t('app', 'There are many variations of passages of Lorem Ipsum available');?></div>
                            <small class="text-muted"><?php echo Yii::t('app', 'Today 2:23 pm - 11.06.2014');?></small>
                        </div>
                    </div>

                    <div class="feed-element">
                        <div>
                            <small class="pull-right"><?php echo Yii::t('app', '5m ago');?></small>
                            <strong><?php echo Yii::t('app', 'Jesica Ocean');?></strong>
                            <div><?php echo Yii::t('app', 'Contrary to popular belief, Lorem Ipsum');?></div>
                            <small class="text-muted"><?php echo Yii::t('app', 'Today 1:00 pm - 08.06.2014');?></small>
                        </div>
                    </div>

                    <div class="feed-element">
                        <div>
                            <small class="pull-right"><?php echo Yii::t('app', '5m ago');?></small>
                            <strong><?php echo Yii::t('app', 'Monica Jackson');?></strong>
                            <div><?php echo Yii::t('app', 'The generated Lorem Ipsum is therefore ');?></div>
                            <small class="text-muted"><?php echo Yii::t('app', 'Yesterday 8:48 pm - 10.06.2014');?></small>
                        </div>
                    </div>


                    <div class="feed-element">
                        <div>
                            <small class="pull-right"><?php echo Yii::t('app', '5m ago');?></small>
                            <strong><?php echo Yii::t('app', 'Anna Legend');?></strong>
                            <div><?php echo Yii::t('app', 'All the Lorem Ipsum generators on the Internet tend to repeat');?> </div>
                            <small class="text-muted"><?php echo Yii::t('app', 'Yesterday 8:48 pm - 10.06.2014');?></small>
                        </div>
                    </div>
                    <div class="feed-element">
                        <div>
                            <small class="pull-right"><?php echo Yii::t('app', '5m ago');?></small>
                            <strong><?php echo Yii::t('app', 'Damian Nowak');?></strong>
                            <div><?php echo Yii::t('app', 'The standard chunk of Lorem Ipsum used');?> </div>
                            <small class="text-muted"><?php echo Yii::t('app', 'Yesterday 8:48 pm - 10.06.2014');?></small>
                        </div>
                    </div>
                    <div class="feed-element">
                        <div>
                            <small class="pull-right"><?php echo Yii::t('app', '5m ago');?></small>
                            <strong><?php echo Yii::t('app', 'Gary Smith');?></strong>
                            <div><?php echo Yii::t('app', '200 Latin words, combined with a handful');?></div>
                            <small class="text-muted"><?php echo Yii::t('app', 'Yesterday 8:48 pm - 10.06.2014');?></small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo Yii::t('app', 'Hotels worldwide');?></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table table-hover margin bottom">
                                    <thead>
                                    <tr>
                                        <th style="width: 1%" class="text-center"><?php echo Yii::t('app', 'No.');?></th>
                                        <th><?php echo Yii::t('app', 'Hotel Name');?></th>
                                        <th class="text-center"><?php echo Yii::t('app', 'Location');?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td><?php echo Yii::t('app', 'Johannesburg');?>
                                            </td>
                                        <td class="text-center"><span class="label label-primary"><?php echo Yii::t('app', 'South Africa');?></span></td>

                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td> <?php echo Yii::t('app', 'Crowne Plaza');?>
                                        </td>
                                        <td class="text-center"><span class="label label-info"><?php echo Yii::t('app', 'India');?></span></td>

                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td><?php echo Yii::t('app', 'Fortaleza');?>
                                        </td>
                                        <td class="text-center"><span class="label label-warning"><?php echo Yii::t('app', 'Brazil');?></span></td>

                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td><?php echo Yii::t('app', 'Ixtapa Zihuatanejo');?></td>
                                        <td class="text-center"><span class="label label-primary"><?php echo Yii::t('app', 'Mexico');?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td><?php echo Yii::t('app', 'Hiroshima-shi');?></td>
                                        <td class="text-center"><span class="label label-success"><?php echo Yii::t('app', 'Japan');?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td><?php echo Yii::t('app', 'Stratford-upon-avon');?></td>
                                        <td class="text-center"><span class="label label-primary"><?php echo Yii::t('app', 'United Kingdom');?></span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <div id="world-map" style="height: 300px;"></div>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    

        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo Yii::t('app', 'Favourite list');?></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-hover no-margins">
                            <thead>
                            <tr>
                                <th><?php echo Yii::t('app', 'Product Name');?></th>
                                <th><?php echo Yii::t('app', 'Price');?></th>
                                <th><?php echo Yii::t('app', 'Status');?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                
                                <td><?php echo Yii::t('app', 'Indoor access point');?></td>
                               
                                <td><?php echo Yii::t('app', '$15');?>  </td>
                                <td><span class="label label-primary"><?php echo Yii::t('app', 'Enable');?></span> </td>
                            </tr>
                            <tr>
                              
                                <td><?php echo Yii::t('app', '3560-CX Series Switches');?></td>
                                <td ><?php echo Yii::t('app', '$20');?> </td>
                                <td><span class="label label-danger"><?php echo Yii::t('app', 'Disable');?></span> </td>
                            </tr>
                            <tr>
                                
                                
                                <td><?php echo Yii::t('app', '4000 Series Integrated Services Routers');?></td>
                                  <td ><?php echo Yii::t('app', '$20');?>  </td>
                                <td><span class="label label-primary"><?php echo Yii::t('app', 'Enable');?></span> </td>
                            </tr>
                            <tr>
                                
                                
                                <td><?php echo Yii::t('app', 'Cisco TelePresence Conductor');?></td>
                                  <td ><?php echo Yii::t('app', '$20');?>  </td>
                                <td><span class="label label-danger"><?php echo Yii::t('app', 'Disable');?></span> </td>
                            </tr>
                            <tr>
                               
                               
                                <td><?php echo Yii::t('app', '4050 Series Integrated Services Routers');?></td>
                                  <td > <?php echo Yii::t('app', '$21');?> </td>
                                <td><span class="label label-warning"><?php echo Yii::t('app', 'Low Stock');?></span> </td>
                            </tr>
                            <tr>
                                
                                
                                <td><?php echo Yii::t('app', '3560-NX Series Switches');?></td>
                                  <td > <?php echo Yii::t('app', '$17');?> </td>
                                <td><span class="label label-primary"><?php echo Yii::t('app', 'Enable');?></span> </td>
                            </tr>
                            <tr>
                                
                                
                                <td><?php echo Yii::t('app', 'Wifi Access Point');?></td>
                                  <td ><?php echo Yii::t('app', '$16');?> </td>
                                <td><span class="label label-warning"><?php echo Yii::t('app', 'Low Stock');?></span> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo Yii::t('app', 'Orders');?></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-hover no-margins">
                            <thead>
                            <tr>
                                <th><?php echo Yii::t('app', 'Status');?></th>
                                <th><?php echo Yii::t('app', 'Date');?></th>
                                <th><?php echo Yii::t('app', 'User');?></th>
                                <th><?php echo Yii::t('app', 'Value');?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><small><?php echo Yii::t('app', 'Pending...');?></small></td>
                                <td> <?php echo Yii::t('app', '11:20pm');?></td>
                                <td><?php echo Yii::t('app', 'Samantha');?></td>
                                <td class="text-navy"> <i class="fa fa-level-up"></i> <?php echo Yii::t('app', '24%');?> </td>
                            </tr>
                            <tr>
                                <td><span class="label label-warning"><?php echo Yii::t('app', 'Canceled');?></span> </td>
                                <td><?php echo Yii::t('app', '10:40am');?></td>
                                <td><?php echo Yii::t('app', 'Monica');?></td>
                                <td class="text-navy"> <i class="fa fa-level-up"></i><?php echo Yii::t('app', '0%');?>  </td>
                            </tr>
                            <tr>
                                <td><small><?php echo Yii::t('app', 'Pending...');?></small> </td>
                                <td><?php echo Yii::t('app', '01:30pm');?></td>
                                <td><?php echo Yii::t('app', 'John');?></td>
                                <td class="text-navy"> <i class="fa fa-level-up"></i> <?php echo Yii::t('app', '54%');?> </td>
                            </tr>
                            <tr>
                                <td><small><?php echo Yii::t('app', 'Pending...');?></small> </td>
                                <td> <?php echo Yii::t('app', '02:20pm');?></td>
                                <td><?php echo Yii::t('app', 'Agnes');?></td>
                                <td class="text-navy"> <i class="fa fa-level-up"></i><?php echo Yii::t('app', '12%');?>  </td>
                            </tr>
                            <tr>
                                <td><small><?php echo Yii::t('app', 'Pending...');?></small> </td>
                                <td> <?php echo Yii::t('app', '09:40pm');?></td>
                                <td><?php echo Yii::t('app', 'Janet');?></td>
                                <td class="text-navy"> <i class="fa fa-level-up"></i><?php echo Yii::t('app', '22%');?>  </td>
                            </tr>
                            <tr>
                                <td><span class="label label-primary"><?php echo Yii::t('app', 'Completed');?></span> </td>
                                <td><?php echo Yii::t('app', '04:10am');?> </td>
                                <td><?php echo Yii::t('app', 'Amelia');?></td>
                                <td class="text-navy"> <i class="fa fa-level-up"></i> <?php echo Yii::t('app', '100%');?> </td>
                            </tr>
                            <tr>
                                <td><small><?php echo Yii::t('app', 'Pending...');?></small> </td>
                                <td> <?php echo Yii::t('app', '12:08am');?></td>
                                <td><?php echo Yii::t('app', '40 Damian');?></td>
                                <td class="text-navy"> <i class="fa fa-level-up"></i> <?php echo Yii::t('app', '23%');?> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        

    </div>

</div>

<!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <script>
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];


            var dataset = [
                {
                    label: "<?php echo Yii::t('app', 'Number of orders');?>",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "<?php echo Yii::t('app', 'Payments');?>",
                    data: data2,
                    yaxis: 2,
                    color: "#1C84C6",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.4
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script>
