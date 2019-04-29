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
<style>
  .dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }

  .dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
  }

  #informant {
    background-repeat: no-repeat;
    font-size: 12px;
    padding: 14px 20px 12px 10px;
    border: 1px solid #ddd;
  }


  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff;
    min-width: 245px;
    overflow: auto;
    border: 1px solid #ddd;
    z-index: 1;
    width: 100%;
    max-height: 250px;
  }

  .dropdown-content a {
    color: #808080;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {background-color: #eee;}
  .show_con{
    display: block;
  }
  .hide_con{
    display: none;
  }
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$("#informant_insert_button").click(function(){
			if($("#informant_Name").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Name data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#informant_Address").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Address data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#CityID").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Correct City data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#StateID").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Correct State data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#ZipCodeID").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Correct ZipCode data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#informant_DayPhone").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Dayphone data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#informant_EveningPhone").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Nightphone data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#informant_Relationship").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Relationship data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#informant_Email").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Email data',
				        addclass: 'bg-warning'
				    });
				return;
			}
		  $.post("first_call_con.php",
		  {
		    InformantID: 0,
		    Name: $("#informant_Name").val(),
		    Address: $("#informant_Address").val(),
		    CityID: $("#CityID").val(),
		    StateID: $("#StateID").val(),
		    ZipCodeID: $("#ZipCodeID").val(),
		    DayPhone: $("#informant_DayPhone").val(),
		    EveningPhone: $("#informant_EveningPhone").val(),
		    Relationship: $("#informant_Relationship").val(),
		    Email: $("#informant_Email").val(),
		    Misc: $("#informant_Misc").val()
		  },
		  function(data, status){
		    if(status == "success"){
		    	var con = data;
		    	$("#informant").val($("#informant_Name").val());
		    	var ht = '<a href="#" id="a_' + con + '" onclick="sel_con(\''+con+'\');">';
		    	ht += $("#informant_Name").val();
		    	ht += '</a>';
		    	$("#informantDropdown").append(ht);
		    	$("#informantDropdown").append('<input type="hidden" name="informant_Name_' + con + '" id="informant_Name_' + con + '" value="' + $('#informant_Name').val() + '">');
		    	$("#informantDropdown").append('<input type="hidden" name="informant_Address_' + con + '" id="informant_Address_' + con + '" value="' + $('#informant_Address').val() + '">');
		    	$("#informantDropdown").append('<input type="hidden" name="CityID_' + con + '" id="CityID_' + con + '" value="' + $('#CityID').val() + '">');
		    	$("#informantDropdown").append('<input type="hidden" name="informantcity_' + con + '" id="informantcity_' + con + '" value="' + $('#informantcity').val() + '">');
		    	$("#informantDropdown").append('<input type="hidden" name="StateID_' + con + '" id="StateID_' + con + '" value="' + $('#StateID').val() + '">');
		    	$("#informantDropdown").append('<input type="hidden" name="informantstate_' + con + '" id="informantstate_' + con + '" value="' + $('#informantstate').val() + '">');
		    	$("#informantDropdown").append('<input type="hidden" name="ZipCodeID_' + con + '" id="ZipCodeID_' + con + '" value="' + $('#ZipCodeID').val() + '">');
		    	$("#informantDropdown").append('<input type="hidden" name="informantzipcode_' + con + '" id="informantzipcode_' + con + '" value="' + $('#informantzipcode').val() + '">');
		    	$("#informantDropdown").append('<input type="hidden" name="informant_DayPhone_' + con + '" id="informant_DayPhone_' + con + '" value="' + $('#informant_DayPhone').val() + '">');
		    	$("#informantDropdown").append('<input type="hidden" name="informant_EveningPhone_' + con + '" id="informant_EveningPhone_' + con + '" value="' + $('#informant_EveningPhone').val() + '">');
		    	$("#informantDropdown").append('<input type="hidden" name="informant_Relationship_' + con + '" id="informant_Relationship_' + con + '" value="' + $('#informant_Relationship').val() + '">');
	            $("#informantDropdown").append('<input type="hidden" name="informant_Email_' + con + '" id="informant_Email_' + con + '" value="' + $('#informant_Email').val() + '">');
	            new PNotify({
			        title: 'Success',
			        text: 'Add a New Informant Success!',
			        addclass: 'bg-success'
			    });
		    	filterFunction();
		    }
		  });
		});

		$("#informant_update_button").click(function(){
			if($("#informant").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please Choose an existing Information data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#informant_Name").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Name data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#informant_Address").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Address data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#CityID").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Correct City data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#StateID").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Correct State data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#ZipCodeID").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Correct ZipCode data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#informant_DayPhone").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Dayphone data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#informant_EveningPhone").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Nightphone data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#informant_Relationship").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Relationship data',
				        addclass: 'bg-warning'
				    });
				return;
			}
			if($("#informant_Email").val() == ""){
				    new PNotify({
				        title: 'Warning',
				        text: 'Please input Email data',
				        addclass: 'bg-warning'
				    });
				return;
			}
		  $.post("first_call_con.php",
		  {
		    InformantID: $("#InformantID").val(),
		    Name: $("#informant_Name").val(),
		    Address: $("#informant_Address").val(),
		    CityID: $("#CityID").val(),
		    StateID: $("#StateID").val(),
		    ZipCodeID: $("#ZipCodeID").val(),
		    DayPhone: $("#informant_DayPhone").val(),
		    EveningPhone: $("#informant_EveningPhone").val(),
		    Relationship: $("#informant_Relationship").val(),
		    Email: $("#informant_Email").val(),
		    Misc: $("#informant_Misc").val()
		  },
		  function(data, status){
		    if(status == "success"){
		    	var con = $("#InformantID").val();
		    	$("#informant").val($("#informant_Name").val());
		    	var ht = '<a href="#" id=' + con + ' onclick="sel_con(\''+con+'\');">';
		    	ht += $("#informant_Name").val();
		    	ht += '</a>';
		    	$("#a_" + con).html($("#informant_Name").val());
		    	$("#informant_Name_" + con).val($("#informant_Name").val());
		    	$("#informant_Address_" + con).val($("#informant_Address").val());
		    	$("#CityID_" + con).val($("#CityID").val());
		    	$("#informantcity_" + con).val($("#informantcity").val());
		    	$("#StateID_" + con).val($("#StateID").val());
		    	$("#informantstate_" + con).val($("#informantstate").val());
		    	$("#ZipCodeID_" + con).val($("#ZipCodeID").val());
		    	$("#informantzipcode_" + con).val($("#informantzipcode").val());
		    	$("#informant_DayPhone_" + con).val($("#informant_DayPhone").val());
		    	$("#informant_EveningPhone_" + con).val($("#informant_EveningPhone").val());
		    	$("#informant_Relationship_" + con).val($("#informant_Relationship").val());
		    	$("#informant_Email_" + con).val($("#informant_Email").val());
	            new PNotify({
			        title: 'Success',
			        text: 'Edit this Informant Success!',
			        addclass: 'bg-success'
			    });
		    	filterFunction();
		    }
		  });
		});
	});
         function show_search_city() {
         	filterFunctionCity();
            document.getElementById("cityDropdown").classList.toggle("hide_con");
            document.getElementById("cityDropdown").classList.toggle("show_con");
        }

        function filterFunctionCity() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("informantcity");
            filter = input.value.toUpperCase();
            div = document.getElementById("cityDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
              txtValue = a[i].textContent || a[i].innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
              } else {
                a[i].style.display = "none";
              }
            }
          }

        function sel_con_city(id,val){
            $("#CityID").val(id);
            $("#informantcity").val(val);
            show_search_city();
        }

        function show_search_state() {
        	filterFunctionState();
            document.getElementById("stateDropdown").classList.toggle("hide_con");
            document.getElementById("stateDropdown").classList.toggle("show_con");
        }

        function filterFunctionState() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("informantstate");
            filter = input.value.toUpperCase();
            div = document.getElementById("stateDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
              txtValue = a[i].textContent || a[i].innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
              } else {
                a[i].style.display = "none";
              }
            }
        }

        function sel_con_state(id,val){
            $("#StateID").val(id);
            $("#informantstate").val(val);
            show_search_state();
        }
        

        function show_search_zipcode() {
        	filterFunctionZipCode();
            document.getElementById("zipcodeDropdown").classList.toggle("hide_con");
            document.getElementById("zipcodeDropdown").classList.toggle("show_con");
        }

        function filterFunctionZipCode() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("informantzipcode");
            filter = input.value.toUpperCase();
            div = document.getElementById("zipcodeDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
              txtValue = a[i].textContent || a[i].innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
              } else {
                a[i].style.display = "none";
              }
            }
        }

        function sel_con_zipcode(id,val){
            $("#ZipCodeID").val(id);
            $("#informantzipcode").val(val);
            show_search_zipcode();
        }

        function show_search() {
            document.getElementById("informantDropdown").classList.toggle("hide_con");
            document.getElementById("informantDropdown").classList.toggle("show_con");
        }

        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("informant");
            filter = input.value.toUpperCase();
            div = document.getElementById("informantDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
              txtValue = a[i].textContent || a[i].innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
              } else {
                a[i].style.display = "none";
              }
            }
        }

        function sel_con(con){
        	$("#informant").val($('#informant_Name_' + con).val());
            $("#InformantID").val(con);
            $("#informant_Name").val($('#informant_Name_' + con).val());
            $("#informant_Address").val($('#informant_Address_' + con).val());
            $("#CityID").val($('#CityID_' + con).val());
            $("#informantcity").val($('#informantcity_' + con).val());
            $("#StateID").val($('#StateID_' + con).val());
            $("#informantstate").val($('#informantstate_' + con).val());
            $("#ZipCodeID").val($('#ZipCodeID_' + con).val());
            $("#informantzipcode").val($('#informantzipcode_' + con).val());
            $("#informant_DayPhone").val($('#informant_DayPhone_' + con).val());
            $("#informant_EveningPhone").val($('#informant_EveningPhone_' + con).val());
            $("#informant_Relationship").val($('#informant_Relationship_' + con).val());
            $("#informant_Email").val($('#informant_Email_' + con).val());
            show_search();
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
	<?php/*
		$query = "select * from tblinformant";
		$informant = mysqli_query($conn,$query);
		$query = "select * from tblcity limit 100";
		$city = mysqli_query($conn,$query);
		$query = "select * from tblstate";
		$state = mysqli_query($conn,$query);
		$query = "select * from tblzipcode limit 100";
		$zipcode = mysqli_query($conn,$query);*/
	?>
	<div class="panel-body">
		
		<form class="form-horizontal"  action="insert_data.php" method="post">
			<fieldset class="content-group">
				<legend class="text-bold"></legend>

				<div class="form-group">
					<div class="col-lg-12">
						<div class="text-right">
							<button type="button" class="btn btn-primary" id="informant_insert_button"><i class="icon-plus3 position-right"></i> Add a New Informant </button>
							<button type="button" class="btn btn-primary" id="informant_update_button" style="background-color: #232323;border-color: #232323;"><i class="icon-pencil4 position-right"></i> Edit this Informant </button>
						</div>
						<div class="row">
							<div class="form-group has-feedback has-feedback-left">
				                <label class="control-label col-sm-3">Choose an existing Information</label>
				                <div class="col-sm-12">				
					                <input type="text" class="form-control" placeholder="Choose an existing Information" id="informant" name="informant"   onkeyup="filterFunction();" onclick="show_search();" >
					                <div id="informantDropdown" class="dropdown-content hide_con" style="">
						                <?php
						                  $result = mysqli_query($conn,"select tblinformant.*,tblcity.City,tblzipcode.ZipCode,tblstate.State from tblinformant  left JOIN tblcity on tblinformant.CityID = tblcity.CityID left join tblstate on tblinformant.StateID = tblstate.StateID LEFT JOIN tblzipcode on tblzipcode.ZipCodeID = tblinformant.ZipCodeID");
						                  while ($row = mysqli_fetch_assoc($result)){
						                ?>
						                  <a href="#" id="a_<?php echo $row['InformantID'];?>" onclick="sel_con('<?php echo $row['InformantID'];?>');">
						                    <?php echo $row['Name'];?>
						                  </a>
						                  <input type="hidden" name="informant_Name_<?php echo $row['InformantID']?>" id="informant_Name_<?php echo $row['InformantID']?>" value="<?php echo $row['Name'];?>">
						                  <input type="hidden" name="informant_Address_<?php echo $row['InformantID']?>" id="informant_Address_<?php echo $row['InformantID']?>" value="<?php echo $row['Address'];?>">
						                  <input type="hidden" name="CityID_<?php echo $row['InformantID']?>" id="CityID_<?php echo $row['InformantID']?>" value="<?php echo $row['CityID'];?>">
						                  <input type="hidden" name="informantcity_<?php echo $row['InformantID']?>" id="informantcity_<?php echo $row['InformantID']?>" value="<?php echo $row['City'];?>">
						                  <input type="hidden" name="StateID_<?php echo $row['InformantID']?>" id="StateID_<?php echo $row['InformantID']?>" value="<?php echo $row['StateID'];?>">
						                  <input type="hidden" name="informantstate_<?php echo $row['InformantID']?>" id="informantstate_<?php echo $row['InformantID']?>" value="<?php echo $row['State'];?>">
						                  <input type="hidden" name="ZipCodeID_<?php echo $row['InformantID']?>" id="ZipCodeID_<?php echo $row['InformantID']?>" value="<?php echo $row['ZipCodeID'];?>">
						                  <input type="hidden" name="informantzipcode_<?php echo $row['InformantID']?>" id="informantzipcode_<?php echo $row['InformantID']?>" value="<?php echo $row['ZipCode'];?>">
						                  <input type="hidden" name="informant_DayPhone_<?php echo $row['InformantID']?>" id="informant_DayPhone_<?php echo $row['InformantID']?>" value="<?php echo $row['DayPhone'];?>">
						                  <input type="hidden" name="informant_EveningPhone_<?php echo $row['InformantID']?>" id="informant_EveningPhone_<?php echo $row['InformantID']?>" value="<?php echo $row['EveningPhone'];?>">
						                  <input type="hidden" name="informant_Relationship_<?php echo $row['InformantID']?>" id="informant_Relationship_<?php echo $row['InformantID']?>" value="<?php echo $row['Relationship'];?>">
						                  <input type="hidden" name="informant_Email_<?php echo $row['InformantID']?>" id="informant_Email_<?php echo $row['InformantID']?>" value="<?php echo $row['Email'];?>">
						                <?php
						                  }
						                ?>
					                </div>
				                </div>
				            </div>
				        </div>
						<div class="row">
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<input type="hidden" name="InformantID" id="InformantID" style=""  class="form-control input-sm" value="0" placeholder="">
									<label class="control-label col-lg-12">Name</label>
									<input type="text" style="" name="informant_Name" id="informant_Name" class="form-control input-sm" value="" placeholder="Name">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Address</label>
									<input type="text" style="" name="informant_Address" id="informant_Address" class="form-control input-sm" value="" placeholder="Address">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">City</label>
								<input type="hidden" id="CityID" name="CityID" value="">
				                <input type="text" class="form-control" placeholder="City" id="informantcity" name="informantcity"   onkeyup="filterFunctionCity();" onclick="show_search_city();" >
				                <div id="cityDropdown" class="dropdown-content hide_con" style="">
					                <?php
					                  $result = mysqli_query($conn,"select * from tblcity");
					                  while ($row = mysqli_fetch_assoc($result)){
					                ?>
					                  <a href="#" onclick="sel_con_city('<?php echo $row['CityID'];?>','<?php echo $row['City'];?>');">
					                    <?php echo $row['City'];?>
					                  </a>
					                <?php
					                  }
					                ?>
				                </div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">State</label>
								<input type="hidden" id="StateID" name="StateID" value="">
								<input type="text" class="form-control" placeholder="State" id="informantstate" name="informantstate"   onkeyup="filterFunctionState();" onclick="show_search_state();" >
				                <div id="stateDropdown" class="dropdown-content hide_con" style="">
					                <?php
					                  $result = mysqli_query($conn,"select * from tblstate");
					                  while ($row = mysqli_fetch_assoc($result)){
					                ?>
					                  <a href="#" onclick="sel_con_state('<?php echo $row['StateID'];?>','<?php echo $row['State'];?>');">
					                    <?php echo $row['State'];?>
					                  </a>
					                <?php
					                  }
					                ?>
				                </div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Zip Code</label>
								<input type="hidden" id="ZipCodeID" name="ZipCodeID" value="">
								<input type="text" class="form-control" placeholder="ZipCode" id="informantzipcode" name="informantzipcode" onkeyup="filterFunctionZipCode();" onclick="show_search_zipcode();" >
				                <div id="zipcodeDropdown" class="dropdown-content hide_con" style="">
					                <?php
					                  $result = mysqli_query($conn,"select * from tblzipcode");
					                  while ($row = mysqli_fetch_assoc($result)){
					                ?>
					                  <a href="#" onclick="sel_con_zipcode('<?php echo $row['ZipCodeID'];?>','<?php echo $row['ZipCode'];?>');">
					                    <?php echo $row['ZipCode'];?>
					                  </a>
					                <?php
					                  }
					                ?>
				                </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Dayphone</label>
									<input type="text" style=""  name="informant_DayPhone" id="informant_DayPhone" class="form-control input-sm" value="" placeholder="Dayphone">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Nightphone</label>
									<input type="text" style=""  name="informant_EveningPhone" id="informant_EveningPhone" class="form-control input-sm" value="" placeholder="Nightphone">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Relationship</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  name="informant_Relationship" id="informant_Relationship" class="form-control input-sm" value="" placeholder="Relationship">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Email</label>
								<div class="form-group has-feedback has-feedback">
									<input type="email" style="" name="informant_Email" id="informant_Email" class="form-control input-sm" value="" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Misc</label>
								<div class="form-group has-feedback has-feedback">
									<label class="checkbox-inline">
				                      <div><span class="checked" ><input type="checkbox" name="informant_Misc" id="informant_Misc"  class="styled" style="margin-left: 7px;" checked="checked"></span></div>
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
		
		<form class="form-horizontal"  action="insert_data.php" method="post">
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
				                  <select class="bootstrap-select" name="" id="" style="background: #eaf1f7;" required="" data-width="100%">
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
									<input type="hidden"   style=""  class="form-control input-sm" value="<?php echo $id;?>" placeholder="Username">
									<input type="hidden"   style=""  class="form-control input-sm" value="" placeholder="Username">
									<label class="control-label col-lg-12">Name</label>
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Username">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Address</label>
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">City</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">State</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Zip Code</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Office Telephone</label>
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Username">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Cellphone</label>
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Home Telephone</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Pager</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Email</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
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
		
		<form class="form-horizontal"  action="insert_data.php" method="post">

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
				                  <select class="bootstrap-select" name="" id="" style="background: #eaf1f7;" required="" data-width="100%">
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
									<input type="hidden"   style=""  class="form-control input-sm" value="<?php echo $id;?>" placeholder="Username">
									<input type="hidden"   style=""  class="form-control input-sm" value="" placeholder="Username">
									<label class="control-label col-lg-12">Location</label>
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Username">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Address</label>
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">City</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">State</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Zip Code</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
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
		
		<form class="form-horizontal"  action="insert_data.php" method="post">

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
				                  <select class="bootstrap-select" name="" id="" style="background: #eaf1f7;" required="" data-width="100%">
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
									<input type="hidden"   style=""  class="form-control input-sm" value="<?php echo $id;?>" placeholder="Username">
									<input type="hidden"   style=""  class="form-control input-sm" value="" placeholder="Username">
									<label class="control-label col-lg-12">Location</label>
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Username">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Address</label>
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">City</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">State</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Zip Code</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Contact Name</label>
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Email">
								</div>
							</div>
							<div class="col-md-6">
								<label class="control-label col-lg-12">Telephone</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
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
		
		<form class="form-horizontal"  action="insert_data.php" method="post">

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
		
		<form class="form-horizontal"  action="insert_data.php" method="post">

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
									<input type="hidden"   style=""  class="form-control input-sm" value="<?php echo $id;?>" placeholder="Username">
									<input type="hidden"   style=""  class="form-control input-sm" value="" placeholder="Username">
									<label class="control-label col-lg-12">Honorific</label>
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Username">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">First name</label>
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Middle name</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Last name</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2">
								<label class="control-label col-lg-12">Suffix</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Address</label>
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Username">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Township</label>
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">City</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">County</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2">
								<label class="control-label col-lg-12">State</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Zip Code</label>
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Username">
								</div>
							</div>
							<div class="col-md-2_5">
								<div class="form-group has-feedback has-feedback">
									<label class="control-label col-lg-12">Date of Death</label>
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Email">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">Time of Death</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2_5">
								<label class="control-label col-lg-12">SSN</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
								</div>
							</div>
							<div class="col-md-2">
								<label class="control-label col-lg-12">Gender</label>
								<div class="form-group has-feedback has-feedback">
									<input type="text" style=""  class="form-control input-sm" value="" placeholder="Phone no">
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