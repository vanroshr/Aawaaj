
      
 <header class="intro-fund-create">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    
                        
                        <!-- ===================================== -->
                        <!-- FUNDRAISER-->
                        <div class="panel panel-default">
                            <div class="panel-body black-color">

        						        <!-- Portfolio Item Heading -->
        						        <div class="row">
        						            <div class="col-lg-12">
        						                <h1 class="page-header text-center"> 
        						                	<?php echo ucfirst($fund->get_title());?>
        						                	<small class="white-color">(<?php echo $fund->get_fundraiser_type();?>)</small>
        						                </h1>
        						            </div>
        						        </div>
        						        <!-- /.row -->
                             
      						        <!-- Portfolio Item Row -->
      						        <div class="row">

      						            <div class="col-md-8">
      						                <img class="img-responsive" src="<?php echo $fund->get_image();?>" alt=""><!-- 750 x 500-->
      						            </div>

      						            <div class="col-md-3">
      						            	<h2>Amount Raised:
      						            	<br/>$ <?php echo $total;?> </h2>
      		            	                <div class="progress">
                                                <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $percentage;?>" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: <?php echo $percentage;?>%;
                                                     min-width: 2em">
                                                  <?php echo $percentage;?>%
                                                </div>
                                              </div>
                                              
      						                
      						                <div><b>Project Goal: Rs. <?php echo $fund->get_amount();?></b></div>

      						                <br/>
                                              <!-- DONATE BUTTON -->
                                              <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                              <!-- Identify your business so that you can collect the payments. -->
                                              <input type="hidden" name="business" value="pratishshr-facilitator@gmail.com">

                                              <!-- Specify a Donate button. -->
                                              <input type="hidden" name="cmd" value="_donations">

                                              <!-- Specify details about the contribution -->
                                              <input type="hidden" name="item_name" value="<?php echo $fund->get_title();?>">
                                              <input type="hidden" name="item_number" value="<?php echo $fund->get_id();?>">
                                             
                                              <input type="hidden" name="currency_code" value="USD">
                                          	
                                              <!--return type-->
                                              <input type="hidden" name="notify_url" value="<?php echo BASE_URL.'fundraiser/index.php?page=paypal';?>">
                                              <input type="hidden" name="return" value="<?php echo BASE_URL.'fundraiser/index.php?page=fund&m=campaign&id='.$fund->get_id();?>">
                                              <input type="hidden" name="cancel_return" value="<?php echo BASE_URL.'fundraiser/index.php?page=fund&m=campaign&id='.$fund->get_id();?>">
                                              <input type="submit" name="submit" value="Donate Now" class="btn btn-lg btn-primary form-control input-lg">
                                              </form>
                                              <!--DONATE BUTTON END-->
                                              <br/>
                                              <!-- Social Buttons -->
                                              <div class="col-md-12">
                                              <b>Share:</b>
                                              <div class="addthis_sharing_toolbox"></div>
                                              </div>
      						            </div>
      						        
      						         <!-- /.row -->
      						       
						              </div>
                      </div>
               </div>  

						   <br/>
						   <div class="panel panel-default col-md-8 black-color">
                <div class="panel-body">
                    <div class="text-center">
                                        <hr/>
						            	<h2>Description</h2>
						            	<hr>
						            	<p> <?php echo $fund->get_details();?> </p>
		            
                            <hr/>
                            <?php 
                            $video_url = $fund->get_video_url();
                            
                            if(!empty($video_url)){ ?>                 
							            	<h2>Campaign Video</h2>
                                             <hr/>
							            	<div class="embed-responsive embed-responsive-16by9">
	  									    		<iframe class="embed-responsive-item" src="<?php echo $fund->get_video_url();?>"></iframe>
											      </div>	
                           <?php 
                            }
                           ?> 
									       	
						        </div>
                </div>
               </div>
               <div class="col-md-4">
                   <div class="panel panel-default black-color">
                    <div class-"panel-body">  
                        <div class="text-center">
                        <hr/>
                          <h2>Recent Donations</h2>
                        <hr/>  
                          <div class="scroll">
                            <?php foreach($payList as $pay){ ?>

                              <p>
                              $<?php echo $pay->get_payment_amount();?>
                              <br/>
                              <?php echo $pay->get_payer_email();?>
                              </p>
                               <hr/>

                              <?php 
                                }
                              ?>  
                          </div>
                        </div>
                     </div>
                   </div>    
               </div>   
                            <!-- FUNDRAISER -->
                            <!-- ===================================== -->
                    
                
	       

        </div>
        </header>

	<!--/#home-->

    
    
	     <!-- Explore Section -->
 <section id="download" class="container content-section text-center">

    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
        <h2 class="pull-left">Other Campaigns you might like</h2>
        
         <div class="row">

 <!-- ///////////////////////// -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
            <?php
                $count = 0;
                foreach($allfund as $fund2){

            ?>

            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img class="img-responsive" src="<?php echo $fund2->get_image()?>" alt="">
                </a>
                <div class="caption">
                    <h3>
                        <a href="http://localhost/aawaaj/fundraiser/index.php?page=fund&m=campaign&id=<?php echo $fund2->get_id();?>" ><?php echo $fund2->get_title()?></a>
                    </h3>
                    <p><?php echo $fund2->get_description()?></p>
                </div>
            </div>

           <?php
           $count++;
           if($count == 3){
            break;
           }
       }
           ?>
        
        </div>
        
         <div class="item">
            <?php
                $count = 0;
                $check = 0;
                foreach($allfund as $fund2){
                $check++;    
                if($check<=3){
                    continue;
                   }
            ?>
             <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img class="img-responsive" src="<?php echo $fund2->get_image()?>" alt="">
                </a>
                <h3>
                    <a href="http://localhost/aawaaj/fundraiser/index.php?page=fund&m=campaign&id=<?php echo $fund2->get_id();?>" ><?php echo $fund2->get_title()?></a>
                </h3>
                <p><?php echo $fund2->get_description()?></p>
            </div>

           <?php
           $count++;
           if($count == 3){
            break;
           }
              }
           ?>
        
        </div>

        <div class="item">
            <?php
                $count = 0;
                $check = 0;
                foreach($allfund as $fund2){
                $check++;    
                if($check<=6){
                    continue;
                   }
            ?>
             <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img class="img-responsive" src="<?php echo $fund2->get_image()?>" alt="">
                </a>
                <h3>
                    <a href="http://localhost/aawaaj/fundraiser/index.php?page=fund&m=campaign&id=<?php echo $fund2->get_id();?>" ><?php echo $fund2->get_title()?></a>
                </h3>
                <p><?php echo $fund2->get_description()?></p>
            </div>

           <?php
           $count++;
           if($count == 3){
            break;
           }
              }
           ?>
        
        </div>

      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
<!-- ///////////////////////// -->
    
                  
                   
                </div>
               
            </div>
        </div>
    </section>