<?php
	include ('database.php');
	$type = "";
	$f_id = $_POST["f_id"];
	$user_id = $_POST["userid"];
	$age = $_POST["age"];

	$mon_salary = $_POST["mon_salary"];
	$ann_salary = $_POST["ann_salary"];
	$other_income = $_POST["other_income"];
	$ann_other_income = $_POST["ann_other_income"];
	$total_income = $_POST["total_income"];
	$ann_total_income = $_POST["ann_total_income"];
	$rent = $_POST["rent"];
	$ann_rent = $_POST["ann_rent"];
	$food = $_POST["food"];
	$ann_food = $_POST["ann_food"];
	$utilities = $_POST["utilities"];
	$ann_utilities = $_POST["ann_utilities"];
	$other_expenses = $_POST["other_expenses"];
	$ann_other_expenses = $_POST["ann_other_expenses"];
	$total_expenses = $_POST["total_expenses"];
	$ann_total_expenses = $_POST["ann_total_expenses"];
	$savings_rate = $_POST["savings_rate"];
	$savings_account = $_POST["savings_account"];
	$invested = $_POST["invested"];
	$cash_hand = $_POST["cash_hand"];
	$liquid_assets = $_POST["liquid_assets"];
	$total_networth = $_POST["total_networth"];
	$percentage = $_POST["percentage"];
	
	$roi = round(floatval($total_networth) * floatval($percentage) / 100,2);
	$roi_per = 0;
	if ($ann_total_expenses != 0) {
		$roi_per = round(floatval($roi) * 100 / floatval($ann_total_expenses),2);
	}
	if($f_id == 0){
		while ($roi_per < 100) {
			$sql = "INSERT INTO financial (user_id,age,mon_salary,ann_salary,other_income,ann_other_income,total_income,ann_total_income,rent,ann_rent,food,ann_food,utilities,ann_utilities,other_expenses,ann_other_expenses,total_expenses,ann_total_expenses,savings_rate,savings_account,invested,cash_hand,liquid_assets,total_networth,percentage) VALUES ('$user_id','$age','$mon_salary','$ann_salary','$other_income','$ann_other_income','$total_income','$ann_total_income','$rent','$ann_rent','$food','$ann_food','$utilities','$ann_utilities','$other_expenses','$ann_other_expenses','$total_expenses','$ann_total_expenses','$savings_rate','$savings_account','$invested','$cash_hand','$liquid_assets','$total_networth','$percentage')";
			$result = mysqli_query($conn,$sql);

			$age = $age + 1;
			$total_networth = $ann_total_income + $total_networth + $roi - $ann_total_expenses;
			$roi = round(floatval($total_networth) * floatval($percentage) / 100,2);
			$roi_per = 0;
			if ($ann_total_expenses != 0) {
				$roi_per = round(floatval($roi) * 100 / floatval($ann_total_expenses),2);
			}
		}

		$sql = "INSERT INTO financial (user_id,age,mon_salary,ann_salary,other_income,ann_other_income,total_income,ann_total_income,rent,ann_rent,food,ann_food,utilities,ann_utilities,other_expenses,ann_other_expenses,total_expenses,ann_total_expenses,savings_rate,savings_account,invested,cash_hand,liquid_assets,total_networth,percentage) VALUES ('$user_id','$age','$mon_salary','$ann_salary','$other_income','$ann_other_income','$total_income','$ann_total_income','$rent','$ann_rent','$food','$ann_food','$utilities','$ann_utilities','$other_expenses','$ann_other_expenses','$total_expenses','$ann_total_expenses','$savings_rate','$savings_account','$invested','$cash_hand','$liquid_assets','$total_networth','$percentage')";
		$result = mysqli_query($conn,$sql);
		
		$type = "insert";

	}else{
		$sql = "delete from financial where user_id = ".$user_id;
		$result = mysqli_query($conn,$sql);

		while ($roi_per < 100) {
			$sql = "INSERT INTO financial (user_id,age,mon_salary,ann_salary,other_income,ann_other_income,total_income,ann_total_income,rent,ann_rent,food,ann_food,utilities,ann_utilities,other_expenses,ann_other_expenses,total_expenses,ann_total_expenses,savings_rate,savings_account,invested,cash_hand,liquid_assets,total_networth,percentage) VALUES ('$user_id','$age','$mon_salary','$ann_salary','$other_income','$ann_other_income','$total_income','$ann_total_income','$rent','$ann_rent','$food','$ann_food','$utilities','$ann_utilities','$other_expenses','$ann_other_expenses','$total_expenses','$ann_total_expenses','$savings_rate','$savings_account','$invested','$cash_hand','$liquid_assets','$total_networth','$percentage')";
			$result = mysqli_query($conn,$sql);

			$age = $age + 1;
			$total_networth = $ann_total_income + $total_networth + $roi - $ann_total_expenses;
			$roi = round(floatval($total_networth) * floatval($percentage) / 100,2);
			$roi_per = 0;
			if ($ann_total_expenses != 0) {
				$roi_per = round(floatval($roi) * 100 / floatval($ann_total_expenses),2);
			}
		}

		$sql = "INSERT INTO financial (user_id,age,mon_salary,ann_salary,other_income,ann_other_income,total_income,ann_total_income,rent,ann_rent,food,ann_food,utilities,ann_utilities,other_expenses,ann_other_expenses,total_expenses,ann_total_expenses,savings_rate,savings_account,invested,cash_hand,liquid_assets,total_networth,percentage) VALUES ('$user_id','$age','$mon_salary','$ann_salary','$other_income','$ann_other_income','$total_income','$ann_total_income','$rent','$ann_rent','$food','$ann_food','$utilities','$ann_utilities','$other_expenses','$ann_other_expenses','$total_expenses','$ann_total_expenses','$savings_rate','$savings_account','$invested','$cash_hand','$liquid_assets','$total_networth','$percentage')";
		$result = mysqli_query($conn,$sql);

		$type = "update";
	}
	
	
	if($result == "")
	{
		$result = 0;
	}
	header("Location: index.php?page=index&".$type."=".$result);
?>