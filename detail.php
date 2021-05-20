<?php
	include_once("./libs/classes/DB.php");
    include_once('./libs/classes/Children.php');
    include_once('./libs/classes/Orphanage.php');
    $pdo = new DB();
    $home = new Children($pdo);
    $orphanage = new Orphanage($pdo);
    $homes = $home->orphan([$_GET['childid']]);

?>
<?php include_once('inc/nav.php');?>
	<!--Header-Ends-Here-->
	<!--gallery-Ends-Here-->
	 <?php foreach ($homes as $res){

	 	$result = $orphanage->index([$res->orphanage_id]);
	?>

	 <div class='container'>
    <div class='row' style='padding-top:25px; padding-bottom:25px;'>
        <div class='col-md-12'>
            <div id='mainContentWrapper'>
                <div class="col-md-8 col-md-offset-2">
                    <h2 style="text-align: center;">
                        Orphan Details
                    </h2>
                    <hr/>
                    <a href="#" class="btn btn-info" style="width: 100%;"><?php echo $res->name;?></a>
                    <hr/>

                    <div class="shopping_cart">
                        <form class="form-horizontal" role="form" action="paystack/init.php" method="post" id="payment-form">
                        	<input type="hidden" class="form-control" id="orphanId" name="orphanId" required="required" value="<?php echo $res->id;?>" />
                            <input type="hidden" class="form-control" id="orphanageId" name="orphanageId" required="required" value="<?php echo $result->id;?>" />

                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="items">
                                                <div class="col-md-9">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td>
                                                                <ul>
                                                                    <li>Orphanage:</li>
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <b><?php echo $result->name;?></b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul>
                                                                    <li>Date of Birth:</li>
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <b><?php echo $res->dob;?></b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul>
                                                                    <li>Gender:</li>
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <b><?php echo $res->gender;?></b>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-3">
                                                    <div style="text-align: center;">
                                                        <h3><img src="orphanage/image/<?php echo $res->picture;?>" class="card-img-top" alt="..." height="64px" width="64px"></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <div style="text-align: center; width:100%;"><a style="width:100%;" class=" btn btn-success">Continue
                                            to Billing Information»</a></div>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <b>please verify your billing
                                        information.</b>
                                    <br/><br/>
                                    <table class="table table-striped" style="font-weight: bold;">
                                        <tr>
                                            <td style="width: 175px;">
                                                <label for="id_email">Best Email:</label></td>
                                            <td>
                                                <input class="form-control" id="email" name="email"
                                                       required="required" type="text"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 175px;">
                                                <label for="id_first_name">Full name:</label></td>
                                            <td>
                                                <input class="form-control" id="name" name="name"
                                                       required="required" type="text"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 175px;">
                                                <label for="id_address_line_1">Address:</label></td>
                                            <td>
                                                <input class="form-control" id="address"
                                                       name="address" required="required" type="text"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 175px;">
                                                <label for="id_phone">Phone:</label></td>
                                            <td>
                                                <input class="form-control" id="phone" name="phone" type="text"/>
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <div style="text-align: center;"><a >Enter Payment Information »</a>
                                        </div>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a>
                                            <b>Payment Information</b>
                                        </a>
                                    </h4>
                                </div>
                                    <div class="panel-body">
                                        <span class='payment-errors'></span>
                                        <fieldset>
                                            <legend>Help this child today, for better tomorrow.</legend>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="amount">Amount to Donate
                                                    </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" stripe-data="name" id="amount" name="amount" placeholder="#0.00" required>
                                                </div>
                                            </div>                                               
                                        </fieldset>
                                        <br>
                                        <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-lg" style="width:100%;">Pay
                                            Now
                                        </button>
                                    	</div>
                                        <br/>
                                        <div style="text-align: left;"><br/>
                                            By submiting this order you are agreeing to our <a href="/legal/billing/">universal
                                                billing agreement</a>, and <a href="/legal/terms/">terms of service</a>.
                                            If you have any questions about our products or services please contact us
                                            before placing this order.
                                        </div>
                                    </div>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
	<!--gallery-Ends-Here-->
		<!--footer-Ends-Here-->
<?php include_once('inc/footer.php');?>