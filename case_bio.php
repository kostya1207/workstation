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
		<h5 class="panel-title">Deceased Information<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
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
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<input type="hidden" name="f_id" id="f_id" style="" readonly class="form-control input-sm" value="<?php echo $id;?>" placeholder="Username">
									<input type="hidden" name="userid" id="userid" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user_id'];?>" placeholder="Username">
									<label class="control-label col-lg-12">Full name</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Date of birth</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-3">
								<label class="control-label col-lg-12">Citizenship</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-3">
								<label class="control-label col-lg-12">Race</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Religion</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Place of birth</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-3">
								<label class="control-label col-lg-12">Ansestry</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-3">
								<label class="control-label col-lg-12">Business</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Usual occupation</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">In community since</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-4">
								<label class="control-label col-lg-12">Moved from</label>
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
		<h5 class="panel-title">Parent Information<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
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
				<label class="text-bold">Father</label>
				<div class="form-group">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Name</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Date of birth</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-4">
								<label class="control-label col-lg-12">Place of birth</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
						</div>
					</div>
				</div>
				<label class="text-bold">Mother</label>
				<div class="form-group">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Name</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Maiden name</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Date of birth</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-3">
								<label class="control-label col-lg-12">Place of birth</label>
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
		<h5 class="panel-title">Children<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
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
							<div class="col-md-1">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12"></label>
									<label class="checkbox-inline">
				                      <div><span class="checked" ><input type="checkbox" class="styled" style="margin-left: 7px;" checked="checked"></span></div>
				                    </label>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Name</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Gender</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-4">
								<label class="control-label col-lg-12">Date of birth</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
						</div>
						<div class="text-right" style="margin-top: 15px;">
							<button type="button" class="btn btn-primary" onclick="javascript:update_data();"><i class="icon-plus3 position-right"></i> Add a New Child </button>
							<button type="button" class="btn btn-primary" onclick="javascript:update_data();" style="background-color: #ff0000;border-color: #ff0000;"><i class="icon-cross2 position-right"></i> Remove Children </button>
						</div>
					</div>
				</div>
				
			</fieldset>
		</form>
	</div>
</div>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Grand/Great-Grand/Gread-Great-Grand Children<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
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
							<div class="col-md-4">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Grand children</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-4">
								<label class="control-label col-lg-12">Great-grand children</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_phone'];?>" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-4">
								<label class="control-label col-lg-12">Great-great-grand children</label>
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
		<h5 class="panel-title">Marital Status<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
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
							<div class="col-md-4">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Status</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Place of marriage</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Date of marriage</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
				        </div>
				        <div class="row">
							<div class="col-md-6">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Spouse's name</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Spouse deceased</label>
									<label class="checkbox-inline">
				                      <div><span class="checked" ><input type="checkbox" class="styled" style="margin-left: 7px;" checked="checked"></span></div>
				                      Spouse deceased
				                    </label>
								</div>
							</div>
				        </div>
				        <div class="row">
							<div class="col-md-6">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Spouse's date of death</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Spouse's place of death</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
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
		<h5 class="panel-title">Military service<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
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
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Branch</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">War/campaign</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Service/Serial number</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Rank</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
				        </div>
				        <div class="row">
							<div class="col-md-4">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Enlistment</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Discharge date</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Type discharge</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
				        </div>
				        <div class="row">
							<div class="col-md-6">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Veteran Checklist</label>
									<label class="checkbox-inline">
				                      <div><span class="checked" ><input type="checkbox" class="styled" style="margin-left: 7px;" checked="checked"></span></div>
				                      DD-214
				                    </label>
				                    <label class="checkbox-inline">
				                      <div><span class="checked" ><input type="checkbox" class="styled" style="margin-left: 7px;" checked="checked"></span></div>
				                      Headstone/Marker
				                    </label>
				                    <label class="checkbox-inline">
				                      <div><span class="checked" ><input type="checkbox" class="styled" style="margin-left: 7px;" checked="checked"></span></div>
				                      Application for Burial Benefits
				                    </label>
				                    <label class="checkbox-inline">
				                      <div><span class="checked" ><input type="checkbox" class="styled" style="margin-left: 7px;" checked="checked"></span></div>
				                      Application for Flag
				                    </label>
				                    <label class="checkbox-inline">
				                      <div><span class="checked" ><input type="checkbox" class="styled" style="margin-left: 7px;" checked="checked"></span></div>
				                      Honor Guard
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
		<h5 class="panel-title">Church Affiliation<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
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
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Church</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Address</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">City</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">State</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
				        </div>
				        <div class="row">
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Zip Code</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Telephone</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Clergy name</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Clergy email</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
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
		<h5 class="panel-title">Place of worship<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
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
							<div class="col-md-4">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Place</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Address</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">City</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
				        </div>
				        <div class="row">
							<div class="col-md-6">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Contact</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Telephone</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_email'];?>" placeholder="Email">
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
		<h5 class="panel-title">Education<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
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
							<div class="col-md-12">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Highest Education</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Highschcool</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Graduated</label>
									<label class="checkbox-inline">
				                      <div><span class="checked" ><input type="checkbox" class="styled" style="margin-left: 7px;" checked="checked"></span></div>
				                    </label>
								</div>
							</div> 	
						</div>
						<div class="row">
							<div class="col-md-10">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Undergraduate</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Graduated</label>
									<label class="checkbox-inline">
				                      <div><span class="checked" ><input type="checkbox" class="styled" style="margin-left: 7px;" checked="checked"></span></div>
				                    </label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Graduate</label>
									<input type="text" style="" readonly class="form-control input-sm" value="<?php echo $_SESSION['login_user'];?>" placeholder="Username">
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Graduated</label>
									<label class="checkbox-inline">
				                      <div><span class="checked" ><input type="checkbox" class="styled" style="margin-left: 7px;" checked="checked"></span></div>
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