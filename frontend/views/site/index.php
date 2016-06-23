<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'IHG Home');
$this->params['breadcrumbs'][] = $this->title;
$hasError = count($model->errors);
?>
<style>
/* Override Green Theme */
.btn-group-lg>.btn, .btn-lg{
    font-size:16px;
}
.landing-page .navbar-default .navbar-nav > .active > a, .landing-page .navbar-default .navbar-nav > .active > a:hover {
        border-top: 6px solid #e25f27 !important;
    }
.landing-page .navbar-scroll.navbar-default .nav li a:hover,.landing-page .navbar-default .nav li a:hover {
    color: #e25f27 !important;
}
.landing-page .features-icon {
    color: #e25f27 !important;
}
.greenHeading {
    color: #e25f27 !important;
}
.landing-page a.navy-link {
    color: #e25f27 !important;
}
.landing-page .navy-line {
    border-bottom: 2px solid #e25f27 !important;
}
.landing-page .testimonials {
    background-color: #e25f27 !important;
}
.landing-page .features small {
    color: #e25f27 !important;
}
.landing-page .features .big-icon {
    color: #e25f27 !important;
}
.landing-page span.navy {
    color: #e25f27 !important;
}
.landing-page .social-icon a {
    background: #e25f27 !important;
}
.landing-page .btn-primary:hover, .landing-page .btn-primary:focus, .landing-page .btn-primary:active, .landing-page .btn-primary.active, .landing-page .open .dropdown-toggle.btn-primary,.landing-page .btn-primary {
    background-color: #e25f27 !important;
    border-color: #e25f27 !important;
}
</style>
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                    <div class="form-horizontal">
                        <div class="pull-left">
                            <h3><?php echo Yii::t('app', 'Login to our site')?></h3>
                            <p style="font-size:10px;forn-weight:normal"><?php echo Yii::t('app', 'Enter username and password to log on')?>:</p>
                        </div>
                        <div class="pull-right">
                            <i class="fa fa-lock"></i>
                        </div>
                        <div class="clearfix"></div>
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>Yii::t('app', 'Username').'..','class' => 'form-control input-lg'])->label(false) ?>

                            <?= $form->field($model, 'password')->passwordInput(['placeholder'=>Yii::t('app', 'Password').'..','class' => 'form-control input-lg'])->label(false) ?>

                            <?= $form->field($model, 'rememberMe')->checkbox() ?>

                            <div style="color:#fff;margin:1em 0">
                               <?php echo Yii::t('app', 'If you forgot your password you can')?> <?= Html::a(Yii::t('app', 'reset it'), ['site/request-password-reset']) ?>.
                            </div>
                            <div class="form-group">

                                <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>

            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>
         </div>
    </div>
</div>
<section id="features" class="container services">
    <div class="row">
        <div class="col-sm-3">
            <h2 class="greenHeading"><?php echo Yii::t('app', 'The Program')?></h2>
            <p class="text-justify"><?php echo Yii::t('app', 'IHG Marketplace combines world-class strategic sourcing tools and techniques with the collective buying power of the IHG system')?>.</p>
            <p><a class="navy-link" href="#" role="button"><?php echo Yii::t('app', 'Details')?> &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2 class="greenHeading"><?php echo Yii::t('app', 'How we can help you')?></h2>
            <p class="text-justify"><?php echo Yii::t('app', 'HG® Marketplace brings a robust, global and much more dynamic user experience to drive our IHG ambition to Be #1 for Our Owners, Operators and Management Company teams')?>.</p>
            <p><a class="navy-link" href="#" role="button"><?php echo Yii::t('app', 'Details')?> &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2 class="greenHeading"><?php echo Yii::t('app', 'Quick Facts')?></h2>
            <p class="text-justify">IHG's <?php echo Yii::t('app','Launched in January 2015 • More than 3,500 hotels enrolled • More than 140 member suppliers • Available in U.S. and to Canada in 2016 • No licensing or set up fees • Created in response to hotel requests')?>.</p>
            <p><a class="navy-link" href="#" role="button"><?php echo Yii::t('app', 'Details')?> &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2 class="greenHeading"><?php echo Yii::t('app', 'Faster, Cheaper, Better...')?></h2>
            <p class="text-justify"><?php echo Yii::t('app', 'Auto-enrollment for IHG brand hotels • No up-front implementation costs • Total transparency on pricing for Owners/Operators/General Managers • Not-for-profit program • Immediate savings • Drives food rebate consolidation • Rebates are passed directly to Owners')?>.</p>
            <p><a class="navy-link" href="#" role="button"><?php echo Yii::t('app', 'Details')?> &raquo;</a></p>
        </div>
    </div>
</section>

<section  class="container features" id="aboutus">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1><?php echo Yii::t('app', "Our benefits")?><br/></h1>
            <!--<p><?php echo Yii::t('app', 'We have more than 5,000 hotels and nearly 742,000 guest rooms in almost 100 countries around the world')?>.</p>-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 text-center wow fadeInLeft">
            <div>
                <i class="fa fa-bar-chart features-icon"></i>
                <h2><?php echo Yii::t('app', 'Features auto-enrollment with no up-front implementation costs')?></h2>
                <!--<p><?php echo Yii::t('app', 'Our strategy is to build the hotel industry’s strongest operating system focused on the biggest markets and segments where scale really counts')?>.</p>-->
            </div>
            <div class="m-t-lg">
                <i class="fa fa-bar-chart features-icon"></i>
                <h2><?php echo Yii::t('app', "IHG Owner Value; 'Be #1' Supporting owner heartbeat & brand delivery consistency")?></h2>
                <!--<p><?php echo Yii::t('app', 'We announced our First Quarter Trading Update on 6 May 2016 at 7:00am (BST)')?>.</p>-->
            </div>
        </div>
        <div class="col-md-6 text-center  wow zoomIn">
            <img src="img/landing/about.jpg" alt="dashboard" class="img-responsive">
        </div>
        <div class="col-md-3 text-center wow fadeInRight">
            <div>
                <i class="fa fa-bar-chart features-icon"></i>
                <h2><?php echo Yii::t('app', 'Not-for-profit program; we demonstrate immediate savings and total transparency')?></h2>
                <!--<p><?php echo Yii::t('app', 'IHG has renamed and relaunched its rewards club as IHG® Rewards Club, offering enhanced benefits for members')?>.</p>-->
            </div>
            <div class="m-t-lg">
                <i class="fa fa-bar-chart features-icon"></i>
                <h2><?php echo Yii::t('app', 'Rebates passed directly to Owners (you earned them, you keep them)')?></h2>
                <!--<p><?php echo Yii::t('app', 'Milestones, achievements and innovations that define IHG')?>.</p>-->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1><?php echo Yii::t('app', 'Overview')?></h1>
            <p class="text-center"><?php echo Yii::t('app', 'IHG is a global hotel company whose goal is to create Great Hotels Guests Love')?>. </p>
        </div>
    </div>
    <div class="row features-block">
        <div class="col-sm-9 features-text wow fadeInLeft">
            <p class="text-justify">
                <?php echo Yii::t('app', 'IHG® Marketplace is your one-stop shop for ordering goods and services, and has everything your hotel needs to operate at its best - all in a single platform - save on all your hotel needs with globally negotiated prices from more than 150 preferred global suppliers on everything from food and linens to energy, electronics and furniture')?>.
           </p>
           <p class="text-justify">
            <?php echo Yii::t('app', 'Created with the IHG owner in mind, IHG® Marketplace delivers an easy-to-use ordering platform and leverages the superior global buying power of IHG. Our leading-edge buying platform gives us a leap forward in technology and efficiency for IHG brand Owners and Investors')?>.
			</p>
			<p class="text-justify"><?php echo Yii::t('app', 'IHG® Marketplace brings a robust, global and much more dynamic user experience to drive our IHG ambition to Be #1 for Our Owners, Operators and Management Company teams')?>
            </p>
        </div>
        <div class="col-sm-3 text-right wow fadeInRight">
            <a href="http://www.ihgplc.com/files/pdf/factsheets/factsheet_in_greater_china.pdf" rel="external" title="See what IHG are doing in China. Opens in a new browser window." target="_blank">
                <img src="img/landing/china.jpg" alt="dashboard" class="img-responsive pull-right">
            </a>
            <br/><br/><br/><br/>
        </div>
    </div>
</section>

<!--<section id="team" class="gray-section team">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Our Team</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 wow fadeInLeft">
                <div class="team-member">
                    <img src="img/landing/avatar3.jpg" class="img-responsive img-circle img-small" alt="">
                    <h4><span class="navy">Amelia</span> Smith</h4>
                    <p>Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam an soluta sensibus. </p>
                    <ul class="list-inline social-icon">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member wow zoomIn">
                    <img src="img/landing/avatar1.jpg" class="img-responsive img-circle" alt="">
                    <h4><span class="navy">John</span> Novak</h4>
                    <p>Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam an soluta sensibus.</p>
                    <ul class="list-inline social-icon">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4 wow fadeInRight">
                <div class="team-member">
                    <img src="img/landing/avatar2.jpg" class="img-responsive img-circle img-small" alt="">
                    <h4><span class="navy">Peter</span> Johnson</h4>
                    <p>Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam an soluta sensibus.</p>
                    <ul class="list-inline social-icon">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
        </div>
    </div>
</section>

<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Even more great feautres</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>
            </div>
        </div>
        <div class="row features-block">
            <div class="col-lg-3 features-text wow fadeInLeft">
                <small>INSPINIA</small>
                <h2>Perfectly designed </h2>
                <p>INSPINIA Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="" class="btn btn-primary">Learn more</a>
            </div>
            <div class="col-lg-6 text-right m-t-n-lg wow zoomIn">
                <img src="img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
            </div>
            <div class="col-lg-3 features-text text-right wow fadeInRight">
                <small>INSPINIA</small>
                <h2>Perfectly designed </h2>
                <p>INSPINIA Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="" class="btn btn-primary">Learn more</a>
            </div>
        </div>
    </div>

</section>

<section class="timeline gray-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Our workflow</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>
            </div>
        </div>
        <div class="row features-block">

            <div class="col-lg-12">
                <div id="vertical-timeline" class="vertical-container light-timeline center-orientation">
                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-briefcase"></i>
                        </div>

                        <div class="vertical-timeline-content">
                            <h2>Meeting</h2>
                            <p>Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products. Below please find the current status of the sale.
                            </p>
                            <a href="#" class="btn btn-xs btn-primary"> More info</a>
                            <span class="vertical-date"> Today <br/> <small>Dec 24</small> </span>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-file-text"></i>
                        </div>

                        <div class="vertical-timeline-content">
                            <h2>Decision</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                            <a href="#" class="btn btn-xs btn-primary"> More info</a>
                            <span class="vertical-date"> Tomorrow <br/> <small>Dec 26</small> </span>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-cogs"></i>
                        </div>

                        <div class="vertical-timeline-content">
                            <h2>Implementation</h2>
                            <p>Go to shop and find some products. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
                            <a href="#" class="btn btn-xs btn-primary"> More info</a>
                            <span class="vertical-date"> Monday <br/> <small>Jan 02</small> </span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</section>-->

<section id="testimonials" class="navy-section testimonials" style="margin-top: 0">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center wow zoomIn">
                <i class="fa fa-comment big-icon"></i>
                <h1>
                    <?php echo Yii::t('app', "What our customer say")?>
                </h1>
                <div class="testimonials-text">
                    <i>"<?php echo Yii::t('app', "IHG hotels provide best hotels for their customers. Gives a good care for you and your family.")?><br/>
                    <?php echo Yii::t('app', "The staff is best supportive. They help you to feel at home with luxury. Food is great. Great Experience.")?>"</i>
                </div>
                <small>
                    <strong><?php echo Yii::t('app', "12.02.2014 - Andy Smith")?></strong>
                </small>
            </div>
        </div>
    </div>

</section>

<section class="comments gray-section" style="margin-top: 0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1><?php echo Yii::t('app', "What our partners say")?></h1>
                <p><?php echo Yii::t('app', "Your feedback is important to us")?>. </p>
            </div>
        </div>
        <div class="row features-block">
            <div class="col-lg-4">
                <div class="bubble">
                    "<?php echo Yii::t('app', "Casey & the staff went above and beyond to make my birthday celebration so special. I stay here several days every week and am a Priority Club customer")?>."
                </div>
                <div class="comments-avatar">
                    <a href="" class="pull-left">
                        <img alt="image" src="img/landing/avatar8.jpg">
                    </a>
                    <div class="media-body">
                        <div class="commens-name">
                            <?php echo Yii::t('app', "Jesica Ocean")?>
                        </div>
                        <small class="text-muted"><?php echo Yii::t('app', "Samsung from California")?></small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bubble">
                    "<?php echo Yii::t('app', "Easy parking and easy access to the rooms via elevators. Activity area was great for keeping the kids entertained. The resident restaurant had awesome service. Our waiter was amazingly efficient")?>."
                </div>
                <div class="comments-avatar">
                    <a href="" class="pull-left">
                        <img alt="image" src="img/landing/avatar1.jpg">
                    </a>
                    <div class="media-body">
                        <div class="commens-name">
                            <?php echo Yii::t('app', "Andrew Williams")?>
                        </div>
                        <small class="text-muted"><?php echo Yii::t('app', "Salesforce from Newyork")?></small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bubble">
                    "<?php echo Yii::t('app', "Dan was one of the best servers I've ever had the privilege to watch. I open restaurants and train teams (mgr and staff) for a living. I would kill to film this guy for our classes. Great experience! Thanks again Dan!!!")?>"
                </div>
                <div class="comments-avatar">
                    <a href="" class="pull-left">
                        <img alt="image" src="img/landing/avatar2.jpg">
                    </a>
                    <div class="media-body">
                        <div class="commens-name">
                            <?php echo Yii::t('app', "Gary Smith")?>
                        </div>
                        <small class="text-muted"><?php echo Yii::t('app', "IBM from Boston")?></small>
                    </div>
                </div>
            </div>



        </div>
    </div>

</section>

<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1><?php echo Yii::t('app', "More and more extra great services")?></h1>
                <p><?php echo Yii::t('app', "International hotel company that tries to see the world from the eyes of others")?> </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-lg-offset-1 features-text">
                <small><?php echo Yii::t('app', "Reservation")?></small>
                <h2><?php echo Yii::t('app', "Worldwide Offices")?></h2>
                <i class="fa fa-bar-chart big-icon pull-right"></i>
                <p class="text-justify"><?php echo Yii::t('app', "When in these countries or cities, you can make reservations at any IHG property worldwide by calling these numbers. Most telephone numbers are toll-free. We recommend you check with your telephone network supplier whether any additional or local connection charges apply for the use of toll free numbers")?>.</p>
            </div>
            <div class="col-lg-5 features-text">
                <small><?php echo Yii::t('app', "Rewards")?></small>
                <h2><?php echo Yii::t('app', "Club Customer Care")?> </h2>
                <i class="fa fa-bolt big-icon pull-right"></i>
                <p class="text-justify"><?php echo Yii::t('app', "Serving the best interest of our members is the goal of our IHG Rewards Club Customer Care Centers. Serving the best interest of our members is the goal of our IHG® Rewards Club Customer Care Centers")?>.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-lg-offset-1 features-text">
                <small><?php echo Yii::t('app', "Business")?></small>
                <h2><?php echo Yii::t('app', "Reservations and Service Center")?> </h2>
                <i class="fa fa-clock-o big-icon pull-right"></i>
                <p class="text-justify"><?php echo Yii::t('app', "Serving the best interest of our members is the goal of our IHG® Business Rewards Reservations and Service Center. We recommend you check with your telephone network supplier whether any additional or local connection charges apply for the use of toll-free numbers")?>.</p>
            </div>
            <div class="col-lg-5 features-text">
                <small><?php echo Yii::t('app', "Quality")?></small>
                <h2><?php echo Yii::t('app', "Service Concern")?> </h2>
                <i class="fa fa-users big-icon pull-right"></i>
                <p class="text-justify"><?php echo Yii::t('app', "Be our eyes and ears on the road. If our hotels are not performing to the quality you've come to expect from our family of brands, let us know and we will address your concerns. Be our eyes and ears on the road. If our hotels are not performing to the quality you've come to expect from our family of brands, let us know and we will address your concerns")?>.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <img src="img/landing/group.jpg" />
            </div>
        </div>
    </div>

</section>
<!--<section id="pricing" class="pricing">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>App Pricing</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 wow zoomIn">
                <ul class="pricing-plan list-unstyled">
                    <li class="pricing-title">
                        Basic
                    </li>
                    <li class="pricing-desc">
                        Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam an soluta sensibus.
                    </li>
                    <li class="pricing-price">
                        <span>$16</span> / month
                    </li>
                    <li>
                        Dashboards
                    </li>
                    <li>
                        Projects view
                    </li>
                    <li>
                        Contacts
                    </li>
                    <li>
                        Calendar
                    </li>
                    <li>
                        AngularJs
                    </li>
                    <li>
                        <a class="btn btn-primary btn-xs" href="#">Signup</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 wow zoomIn">
                <ul class="pricing-plan list-unstyled selected">
                    <li class="pricing-title">
                        Standard
                    </li>
                    <li class="pricing-desc">
                        Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam an soluta sensibus.
                    </li>
                    <li class="pricing-price">
                        <span>$22</span> / month
                    </li>
                    <li>
                        Dashboards
                    </li>
                    <li>
                        Projects view
                    </li>
                    <li>
                        Contacts
                    </li>
                    <li>
                        Calendar
                    </li>
                    <li>
                        AngularJs
                    </li>
                    <li>
                        <strong>Support platform</strong>
                    </li>
                    <li class="plan-action">
                        <a class="btn btn-primary btn-xs" href="#">Signup</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 wow zoomIn">
                <ul class="pricing-plan list-unstyled">
                    <li class="pricing-title">
                        Premium
                    </li>
                    <li class="pricing-desc">
                        Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam an soluta sensibus.
                    </li>
                    <li class="pricing-price">
                        <span>$160</span> / month
                    </li>
                    <li>
                        Dashboards
                    </li>
                    <li>
                        Projects view
                    </li>
                    <li>
                        Contacts
                    </li>
                    <li>
                        Calendar
                    </li>
                    <li>
                        AngularJs
                    </li>
                    <li>
                        <a class="btn btn-primary btn-xs" href="#">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row m-t-lg">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg">
                <p>*Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. <span class="navy">Various versions</span>  have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
            </div>
        </div>
    </div>
</section>-->
<section id="contact" class="gray-section contact">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1><?php echo Yii::t('app', "Contact Us")?></h1>
                <p><?php echo Yii::t('app', "Reach us with any questions or issues")?></p>
            </div>
        </div>
        <div class="row m-b-lg">
            <div class="col-lg-3 col-lg-offset-3">
                <address>
                    <strong><span class="navy"><?php echo Yii::t('app', "InterContinental Hotels Group")?></span></strong><br/>
                    <?php echo Yii::t('app', "22nd Floor, Citigroup Tower")?><br/>
                    <?php echo Yii::t('app', "No. 33, Huayuanshiqiao Road")?><br/>
                    <?php echo Yii::t('app', "Pudong New Area 200120")?><br/>
                    <?php echo Yii::t('app', "Shanghai")?><br/>
                    <?php echo Yii::t('app', "PR China")?><br/>
                    <abbr title="Phone">P:</abbr>86 (21) 2893 3388
                </address>
            </div>
            <div class="col-lg-4">
                <p class="text-color">
                    <?php echo Yii::t('app', "Be our eyes and ears on the road. If our hotels are not performing to the quality you've come to expect from our family of brands, let us know and we will address your concerns")?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:test@email.com" class="btn btn-primary"><?php echo Yii::t('app', "Send us mail")?></a>
                <p class="m-t-sm">
                   <?php echo Yii::t('app', "Or follow us on social platform")?> 
                </p>
                <ul class="list-inline social-icon">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p><strong>&copy; <?php echo Yii::t('app', "2016 IHG. All rights reserved")?></strong><br/>
                <?php echo Yii::t('app', "Most hotels are independently owned and operated")?>.</p>
            </div>
        </div>
    </div>
</section>