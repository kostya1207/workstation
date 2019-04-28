<?php
    include ('header.php');
    $user_id = $_SESSION['login_user_id'];

    $type = 1;//$_GET["type"];
    $id = 1;//$_GET["id"];

    $age = 0;
    $mon_salary = 0;
	$ann_salary = 0;
	$other_income = 0;
	$ann_other_income = 0;
	$total_income = 0;
	$ann_total_income = 0;
	$rent = 0;
	$ann_rent = 0;
	$food = 0;
	$ann_food = 0;
	$utilities = 0;
	$ann_utilities = 0;
	$other_expenses = 0;
	$ann_other_expenses = 0;
	$total_expenses = 0;
	$ann_total_expenses = 0;
	$savings_rate = 0;
	$savings_account = 0;
	$invested = 0;
	$cash_hand = 0;
	$liquid_assets = 0;
	$total_networth = 0;
	$percentage = 0;
	$roi = 0;
	$networth_eoy = 0;
	$per = 0;

	if($type == "delete"){
		$sql = "delete from financial where user_id = ".$user_id;
		$result = mysqli_query($conn,$sql);
		if($result == ""){
			$result = 0;
		}
		echo "<script>window.location.href = 'manage_financial.php?page=manage&delete=".$result."'</script>";
	}else if($type == "edit" || $type == "view"){
		$query = "select * from financial where user_id = '$user_id' and id = '$id'";
		$result = mysqli_query($conn,$query);
		$rows_num = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);

		$roi = floatval($row["total_networth"]) * floatval($row["percentage"]) / 100;
		$networth_eoy = round((floatval($row["total_networth"]) + floatval($roi)),2);
		if(floatval($row["ann_total_expenses"]) != 0){
			$per = round(floatval($roi) * 100 / floatval($row["ann_total_expenses"]),2);
		}

		$age = $row["age"];
	    $mon_salary = $row["mon_salary"];
		$ann_salary = $row["ann_salary"];
		$other_income = $row["other_income"];
		$ann_other_income = $row["ann_other_income"];
		$total_income = $row["total_income"];
		$ann_total_income = $row["ann_total_income"];
		$rent = $row["rent"];
		$ann_rent = $row["ann_rent"];
		$food = $row["food"];
		$ann_food = $row["ann_food"];
		$utilities = $row["utilities"];
		$ann_utilities = $row["ann_utilities"];
		$other_expenses = $row["other_expenses"];
		$ann_other_expenses = $row["ann_other_expenses"];
		$total_expenses = $row["total_expenses"];
		$ann_total_expenses = $row["ann_total_expenses"];
		$savings_rate = $row["savings_rate"];
		$savings_account = $row["savings_account"];
		$invested = $row["invested"];
		$cash_hand = $row["cash_hand"];
		$liquid_assets = $row["liquid_assets"];
		$total_networth = $row["total_networth"];
		$percentage = $row["percentage"];
	}
?>
<script type="text/javascript">
	function setAge(){
		if($("#age").val() == ""){
			$("#age").val("0");
		}
		$("#td_1").html($("#age").val());
	}
	function setmon_salary(){
		if($("#mon_salary").val() == ""){
			$("#mon_salary").val("0");
		}
		var val = $("#mon_salary").val();
		$("#ann_salary").val(val * 12);
		$("#ann_salary").val(parseFloat($("#ann_salary").val()).toFixed(2));
		$("#total_income").val(parseFloat($("#mon_salary").val()) + parseFloat($("#other_income").val()));
		$("#total_income").val(parseFloat($("#total_income").val()).toFixed(2));
		$("#ann_total_income").val(parseFloat($("#ann_salary").val()) + parseFloat($("#ann_other_income").val()));
		$("#ann_total_income").val(parseFloat($("#ann_total_income").val()).toFixed(2));
		$("#td_2").html($("#ann_total_income").val());
		;getsavinge_rate();
	}

	function setother_income(){
		if($("#other_income").val() == ""){
			$("#other_income").val("0");
		}
		var val = $("#other_income").val();
		$("#ann_other_income").val(val * 12);
		$("#ann_other_income").val(parseFloat($("#ann_other_income").val()).toFixed(2));
		$("#total_income").val(parseFloat($("#mon_salary").val()) + parseFloat($("#other_income").val()));
		$("#total_income").val(parseFloat($("#total_income").val()).toFixed(2));
		$("#ann_total_income").val(parseFloat($("#ann_salary").val()) + parseFloat($("#ann_other_income").val()));
		$("#ann_total_income").val(parseFloat($("#ann_total_income").val()).toFixed(2));
		$("#td_2").html($("#ann_total_income").val());
		getsavinge_rate();
	}

	function setrent(){
		if($("#rent").val() == ""){
			$("#rent").val("0");
		}
		$("#ann_rent").val($("#rent").val() * 12);
		$("#ann_rent").val(parseFloat($("#ann_rent").val()).toFixed(2));
		$("#total_expenses").val(parseFloat($("#rent").val()) + parseFloat($("#food").val()) + parseFloat($("#utilities").val()) + parseFloat($("#other_expenses").val()));
		$("#total_expenses").val(parseFloat($("#total_expenses").val()).toFixed(2));
		$("#ann_total_expenses").val($("#total_expenses").val() * 12);
		$("#ann_total_expenses").val(parseFloat($("#ann_total_expenses").val()).toFixed(2));
		$("#td_3").html($("#ann_total_expenses").val());
		getsavinge_rate();
	}

	function setfood(){
		if($("#food").val() == ""){
			$("#food").val("0");
		}
		$("#ann_food").val($("#food").val() * 12);
		$("#ann_food").val(parseFloat($("#ann_food").val()).toFixed(2));
		$("#total_expenses").val(parseFloat($("#rent").val()) + parseFloat($("#food").val()) + parseFloat($("#utilities").val()) + parseFloat($("#other_expenses").val()));
		$("#total_expenses").val(parseFloat($("#total_expenses").val()).toFixed(2));
		$("#ann_total_expenses").val($("#total_expenses").val() * 12);
		$("#ann_total_expenses").val(parseFloat($("#ann_total_expenses").val()).toFixed(2));
		$("#td_3").html($("#ann_total_expenses").val());
		getsavinge_rate();
	}

	function setutilities(){
		if($("#utilities").val() == ""){
			$("#utilities").val("0");
		}
		$("#ann_utilities").val($("#utilities").val() * 12);
		$("#ann_utilities").val(parseFloat($("#ann_utilities").val()).toFixed(2));
		$("#total_expenses").val(parseFloat($("#rent").val()) + parseFloat($("#food").val()) + parseFloat($("#utilities").val()) + parseFloat($("#other_expenses").val()));
		$("#total_expenses").val(parseFloat($("#total_expenses").val()).toFixed(2));
		$("#ann_total_expenses").val($("#total_expenses").val() * 12);
		$("#ann_total_expenses").val(parseFloat($("#ann_total_expenses").val()).toFixed(2));
		$("#td_3").html($("#ann_total_expenses").val());
		getsavinge_rate();
	}

	function setother_expenses(){
		if($("#other_expenses").val() == ""){
			$("#other_expenses").val("0");
		}
		$("#ann_other_expenses").val($("#other_expenses").val() * 12);
		$("#ann_other_expenses").val(parseFloat($("#ann_other_expenses").val()).toFixed(2));
		$("#total_expenses").val(parseFloat($("#rent").val()) + parseFloat($("#food").val()) + parseFloat($("#utilities").val()) + parseFloat($("#other_expenses").val()));
		$("#total_expenses").val(parseFloat($("#total_expenses").val()).toFixed(2));
		$("#ann_total_expenses").val($("#total_expenses").val() * 12);
		$("#ann_total_expenses").val(parseFloat($("#ann_total_expenses").val()).toFixed(2));
		$("#td_3").html($("#ann_total_expenses").val());
		getsavinge_rate();
	}

	function getsavinge_rate(){
		var save_income = $("#ann_total_income").val();
		var save_expenses = $("#ann_total_expenses").val();
		if(save_income != 0){
			$("#savings_rate").val((save_income - save_expenses) * 100 / save_income);
			$("#savings_rate").val(parseFloat($("#savings_rate").val()).toFixed(2));
		}
		gettotalpercentage();
	}

	function setsavings_account(){
		if($("#savings_account").val() == ""){
			$("#savings_account").val("0");
		}
		$("#total_networth").val(parseFloat($("#savings_account").val()) + parseFloat($("#invested").val()) + parseFloat($("#cash_hand").val()) + parseFloat($("#liquid_assets").val()));
		$("#total_networth").val(parseFloat($("#total_networth").val()).toFixed(2));
		$("#td_4").html($("#total_networth").val());
		setpercentage();
	}

	function setinvested(){
		if($("#invested").val() == ""){
			$("#invested").val("0");
		}
		$("#total_networth").val(parseFloat($("#savings_account").val()) + parseFloat($("#invested").val()) + parseFloat($("#cash_hand").val()) + parseFloat($("#liquid_assets").val()));
		$("#total_networth").val(parseFloat($("#total_networth").val()).toFixed(2));
		$("#td_4").html($("#total_networth").val());
		setpercentage();
	}

	function setcash_hand(){
		if($("#cash_hand").val() == ""){
			$("#cash_hand").val("0");
		}
		$("#total_networth").val(parseFloat($("#savings_account").val()) + parseFloat($("#invested").val()) + parseFloat($("#cash_hand").val()) + parseFloat($("#liquid_assets").val()));
		$("#total_networth").val(parseFloat($("#total_networth").val()).toFixed(2));
		$("#td_4").html($("#total_networth").val());
		setpercentage();
	}

	function setliquid_assets(){
		if($("#liquid_assets").val() == ""){
			$("#liquid_assets").val("0");
		}
		$("#total_networth").val(parseFloat($("#savings_account").val()) + parseFloat($("#invested").val()) + parseFloat($("#cash_hand").val()) + parseFloat($("#liquid_assets").val()));
		$("#total_networth").val(parseFloat($("#total_networth").val()).toFixed(2));
		$("#td_4").html($("#total_networth").val());
		setpercentage();
	}

	function setpercentage(){
		if($("#percentage").val() == ""){
			$("#percentage").val("0");
		}
		$("#td_6").html(parseFloat($("#total_networth").val() * $("#percentage").val() / 100).toFixed(2));
		$("#td_5").html(parseFloat(parseFloat($("#total_networth").val() * $("#percentage").val() / 100).toFixed(2)) + parseFloat($("#total_networth").val()));
		gettotalpercentage();
	}

	function gettotalpercentage(){
		var investments = parseFloat($("#total_networth").val() * $("#percentage").val() / 100).toFixed(2);
		var expenses = parseFloat($("#ann_total_expenses").val());
		if(expenses != 0){
			$("#td_7").html(parseFloat(investments * 100 / expenses).toFixed(2));
			$("#td_7").append("%");
		}
	}
	
</script>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Informant<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
		
		<form class="form-horizontal" id="update_form" action="insert_data.php" method="post">
			<fieldset class="content-group">
				<legend class="text-bold"></legend>

				<div class="form-group">
					<div class="col-lg-12">
						<div class="text-right">
							<button type="button" class="btn btn-primary" onclick="javascript:update_data();"><i class="icon-plus3 position-right"></i> Add a New Informant </button>
							<button type="button" class="btn btn-primary" onclick="javascript:update_data();"  style="background-color: #232323;border-color: #232323;"><i class="icon-pencil4 position-right"></i> Edit this Informant </button>
						</div>
						<div class="row">
							<div class="form-group has-feedback has-feedback-left">
				                <label class="control-label col-sm-3">Choose an existing Information</label>
				                <div class="col-sm-12">
				                  <select class="bootstrap-select" name="country_code" id="country_code" style="background: #eaf1f7;" required="" data-width="100%">
				                    <option value="AD">AD - Andorra (+376)</option>
				                    <option value="AE">AE - United Arab Emirates (+971)</option>
				                    <option value="AF">AF - Afghanistan (+93)</option>
				                    <option value="AG">AG - Antigua And Barbuda (+1268)</option>
				                    <option value="AI">AI - Anguilla (+1264)</option>
				                    <option value="AL">AL - Albania (+355)</option>
				                  </select>
				                </div>
				            </div>
				        </div>
						<div class="row">
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<input type="hidden" name="f_id" id="f_id" style="" readonly class="form-control input-sm" value="<?php echo $id;?>" placeholder="Username">
									<input type="hidden" name="userid" id="userid" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user_id'];?>" placeholder="Username">
									<label class="control-label col-lg-12">Name</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Address</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">City</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">State</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Zip Code</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Dayphone</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Nightphone</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Relationship</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Email</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Misc</label>
								<div class="form-group has-feedback has-feedback">
									<label class="checkbox-inline">
				                      <div><span class="checked" ><input type="checkbox" class="styled" style="margin-left: 7px;" checked="checked"></span></div>
				                      Store
				                    </label>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</fieldset>
		</form>
	</div>
</div>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Physician<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
		
		<form class="form-horizontal" id="update_form" action="insert_data.php" method="post">
			<fieldset class="content-group">
				<legend class="text-bold"></legend>

				<div class="form-group">
					<div class="col-lg-12">
						<div class="text-right">
							<button type="button" class="btn btn-primary" onclick="javascript:update_data();"><i class="icon-plus3 position-right"></i> Add a Physician </button>
							<button type="button" class="btn btn-primary" onclick="javascript:update_data();" style="background-color: #232323;border-color: #232323;"><i class="icon-pencil4 position-right"></i> Edit this Physician </button>
						</div>
						<div class="row">
							<div class="form-group has-feedback has-feedback-left">
				                <label class="control-label col-sm-3">Choose an existing Physician</label>
				                <div class="col-sm-12">
				                  <select class="bootstrap-select" name="country_code" id="country_code" style="background: #eaf1f7;" required="" data-width="100%">
				                    <option value="AD">AD - Andorra (+376)</option>
				                    <option value="AE">AE - United Arab Emirates (+971)</option>
				                    <option value="AF">AF - Afghanistan (+93)</option>
				                    <option value="AG">AG - Antigua And Barbuda (+1268)</option>
				                    <option value="AI">AI - Anguilla (+1264)</option>
				                    <option value="AL">AL - Albania (+355)</option>
				                  </select>
				                </div>
				            </div>
				        </div>
						<div class="row">
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<input type="hidden" name="f_id" id="f_id" style="" readonly class="form-control input-sm" value="<?php echo $id;?>" placeholder="Username">
									<input type="hidden" name="userid" id="userid" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user_id'];?>" placeholder="Username">
									<label class="control-label col-lg-12">Name</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Address</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">City</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">State</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Zip Code</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Office Telephone</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Cellphone</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Home Telephone</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Pager</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Email</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</fieldset>
		</form>
	</div>
</div>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Place of Death<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
		
		<form class="form-horizontal" id="update_form" action="insert_data.php" method="post">

			<fieldset class="content-group">
				<legend class="text-bold"></legend>

				<div class="form-group">
					<div class="col-lg-12">
						<div class="text-right">
							<button type="button" class="btn btn-primary" onclick="javascript:update_data();"><i class="icon-plus3 position-right"></i> Add a Place Death </button>
							<button type="button" class="btn btn-primary" onclick="javascript:update_data();" style="background-color: #232323;border-color: #232323;"><i class="icon-pencil4 position-right"></i> Edit this Place Death </button>
						</div>
						<div class="row">
							<div class="form-group has-feedback has-feedback-left">
				                <label class="control-label col-sm-3">Choose an existing Place Death</label>
				                <div class="col-sm-12">
				                  <select class="bootstrap-select" name="country_code" id="country_code" style="background: #eaf1f7;" required="" data-width="100%">
				                    <option value="AD">AD - Andorra (+376)</option>
				                    <option value="AE">AE - United Arab Emirates (+971)</option>
				                    <option value="AF">AF - Afghanistan (+93)</option>
				                    <option value="AG">AG - Antigua And Barbuda (+1268)</option>
				                    <option value="AI">AI - Anguilla (+1264)</option>
				                    <option value="AL">AL - Albania (+355)</option>
				                  </select>
				                </div>
				            </div>
				        </div>
						<div class="row">
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<input type="hidden" name="f_id" id="f_id" style="" readonly class="form-control input-sm" value="<?php echo $id;?>" placeholder="Username">
									<input type="hidden" name="userid" id="userid" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user_id'];?>" placeholder="Username">
									<label class="control-label col-lg-12">Location</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Address</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">City</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">State</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Zip Code</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="checkbox-inline">
				                      <div><span class="checked" ><input type="checkbox" class="styled" style="margin-left: 7px;" checked="checked"></span></div>
				                      Store
				                    </label>
								</div>
							</div>
				        </div>
					</div>
				</div>
				
			</fieldset>
		</form>
	</div>
</div>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Location Of Body<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
		
		<form class="form-horizontal" id="update_form" action="insert_data.php" method="post">

			<fieldset class="content-group">
				<legend class="text-bold"></legend>

				<div class="form-group">
					<div class="col-lg-12">
						<div class="text-right">
							<button type="button" class="btn btn-primary" onclick="javascript:update_data();"><i class="icon-plus3 position-right"></i> Add a location </button>
							<button type="button" class="btn btn-primary" onclick="javascript:update_data();" style="background-color: #232323;border-color: #232323;"><i class="icon-pencil4 position-right"></i> Edit this Location </button>
						</div>
						<div class="row">
							<div class="form-group has-feedback has-feedback-left">
				                <label class="control-label col-sm-3">Choose an existing Location</label>
				                <div class="col-sm-12">
				                  <select class="bootstrap-select" name="country_code" id="country_code" style="background: #eaf1f7;" required="" data-width="100%">
				                    <option value="AD">AD - Andorra (+376)</option>
				                    <option value="AE">AE - United Arab Emirates (+971)</option>
				                    <option value="AF">AF - Afghanistan (+93)</option>
				                    <option value="AG">AG - Antigua And Barbuda (+1268)</option>
				                    <option value="AI">AI - Anguilla (+1264)</option>
				                    <option value="AL">AL - Albania (+355)</option>
				                  </select>
				                </div>
				            </div>
				        </div>
						<div class="row">
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<input type="hidden" name="f_id" id="f_id" style="" readonly class="form-control input-sm" value="<?php echo $id;?>" placeholder="Username">
									<input type="hidden" name="userid" id="userid" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user_id'];?>" placeholder="Username">
									<label class="control-label col-lg-12">Location</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Address</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">City</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">State</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Zip Code</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Contact Name</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-6">
								<label class="control-label col-lg-12">Telephone</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="checkbox-inline">
				                      <div><span class="checked" ><input type="checkbox" class="styled" style="margin-left: 7px;" checked="checked"></span></div>
				                      Store
				                    </label>
								</div>
							</div>
				        </div>
					</div>
				</div>
				
			</fieldset>
		</form>
	</div>
</div>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Permissions<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
		
		<form class="form-horizontal" id="update_form" action="insert_data.php" method="post">

			<fieldset class="content-group">
				<legend class="text-bold"></legend>

				<div class="form-group">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-md-2">
								<div class="form-group has-feedback has-feedback">
									<label class="checkbox-inline">
				                      <div><span class="checked" ><input type="checkbox" class="styled" style="margin-left: 7px;" checked="checked"></span></div>
				                      Permission to Embalm
				                    </label>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group has-feedback has-feedback">
									<label class="checkbox-inline">
				                      <div><span class="checked" ><input type="checkbox" class="styled" style="margin-left: 7px;" checked="checked"></span></div>
				                      Body Ready for Pickup
				                    </label>
								</div>
							</div>
				        </div>
					</div>
				</div>
				
			</fieldset>

		</form>
	</div>
</div>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Deceased Vital Statistic And Personal Information<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
		
		<form class="form-horizontal" id="update_form" action="insert_data.php" method="post">

			<fieldset class="content-group">
				<legend class="text-bold"></legend>

				<div class="form-group">
					<div class="col-lg-12">
						<div class="text-right">
							<button type="button" class="btn btn-primary" onclick="javascript:update_data();"><i class="icon-plus3 position-right"></i> Add a New Informant </button>
							<button type="button" class="btn btn-primary" onclick="javascript:update_data();"  style="background-color: #232323;border-color: #232323;"><i class="icon-pencil4 position-right"></i> Edit thisInformant </button>
						</div>
						
						<div class="row">
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<input type="hidden" name="f_id" id="f_id" style="" readonly class="form-control input-sm" value="<?php echo $id;?>" placeholder="Username">
									<input type="hidden" name="userid" id="userid" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user_id'];?>" placeholder="Username">
									<label class="control-label col-lg-12">Honorific</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">First name</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Middle name</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Last name</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2">
								<label class="control-label col-lg-12">Suffix</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Address</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Township</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">City</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">County</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2">
								<label class="control-label col-lg-12">State</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Zip Code</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Date of Death</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Time of Death</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">SSN</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2">
								<label class="control-label col-lg-12">Gender</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group has-feedback has-feedback">
								<label class="checkbox-inline">
			                      <div><span class="checked" ><input type="checkbox" class="styled" style="margin-left: 7px;" checked="checked"></span></div>
			                      Is Veteran
			                    </label>
							</div>
						</div>
					</div>
				</div>
				
			</fieldset>
		</form>
	</div>
</div>
<div class="col-md-12">
	<button type="button" class="btn btn-primary" style="width: 100%;height: 55px;font-size: 22px;" onclick="javascript:update_data();"><i class="icon-floppy-disk position-right"></i> SAVE </button>
</div>
<script type="text/javascript">
	function backtomain(){
		window.location.href = "manage_financial.php?page=manage";
	}
	function update_data(){
		if($("#ann_total_income").val() == 0 || $("#ann_total_expenses").val() == 0){
			$(document).ready(function(){
			    new PNotify({
			        title: 'Warning',
			        text: 'Please input income & expenses data',
			        addclass: 'bg-warning'
			    });
			}); 
			return;
		}
		if($("#savings_rate").val() <= 0){
			$(document).ready(function(){
			    new PNotify({
			        title: 'Warning',
			        text: 'You will NEVER retire unless you reduce your expenses or increase your income.',
			        addclass: 'bg-warning'
			    });
			}); 
			return;
		}
		if($("#total_networth").val() == 0){
			$(document).ready(function(){
			    new PNotify({
			        title: 'Warning',
			        text: 'Please input savings & liquid assets data',
			        addclass: 'bg-danger'
			    });
			}); 
			return;
		}
		if($("#percentage").val() == 0){
			$(document).ready(function(){
			    new PNotify({
			        title: 'Warning',
			        text: 'Please input investment assumption data',
			        addclass: 'bg-danger'
			    });
			}); 
			return;
		}
		if($("#f_id").val() == 0){
			$("#update_form").submit();
		}else{
			$(document).ready(function(){
	    		var notice = new PNotify({
		            title: 'Confirmation',
		            text: '<p>Are you sure you want to change?</p>',
		            hide: false,
		            type: 'warning',
		            confirm: {
		                confirm: true,
		                buttons: [
		                    {
		                        text: 'Yes',
		                        addClass: 'btn btn-sm btn-primary'
		                    },
		                    {
		                        addClass: 'btn btn-sm btn-link'
		                    }
		                ]
		            },
		            buttons: {
		                closer: false,
		                sticker: false
		            },
		            history: {
		                history: false
		            }
		        })

		        // On confirm
		        notice.get().on('pnotify.confirm', function() {
		            $("#update_form").submit();
		        })

		        // On cancel
		        notice.get().on('pnotify.cancel', function() {
		            return;
		        });
	    	});
		}
	}
</script>
<?php
    include ('footer.php');
?>