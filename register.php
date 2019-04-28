
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Financial - v1.0</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="global_assets/js/plugins/loaders/pace.min.js"></script>
	<script src="global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="global_assets/js/core/libraries/bootstrap.min.js"></script>
	<script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="global_assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="global_assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script src="global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="global_assets/js/plugins/forms/styling/switch.min.js"></script>
	<script src="global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="assets/js/app.js"></script>
	<script src="global_assets/js/demo_pages/form_validation.js"></script>
	<script src="global_assets/js/plugins/forms/selects/bootstrap_select.min.js"></script>
	<script src="global_assets/js/demo_pages/form_bootstrap_select.js"></script>
	<!-- /theme JS files -->
	<script type="text/javascript">
		function backtologin(){
			window.location.href = "login.php";
		}
	</script>
</head>

<body class="login-container">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php?page=index"><i class="icon-book3" style="font-size:26px;color:#fff;margin-left: 16px;"></i><span style="font-size:18px;color:#fff;position: absolute;margin-left: 16px;margin-top: 2px;">   Financial </span></a>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Advanced login -->
					<form action="register_user.php" method="post" class="form-validate-jquery">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
								<h5 class="content-group">Create account <small class="display-block">All fields are required</small></h5>
							</div>

							<div class="content-divider text-muted form-group"><span>Your credentials</span></div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" name="username" class="form-control" placeholder="Username" required="required">
								<div class="form-control-feedback">
									<i class="icon-user-check text-muted"></i>
								</div>
								<!-- <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> This username is already taken</span> -->
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="email" name="email" class="form-control" placeholder="Email" required="required">
								<div class="form-control-feedback">
									<i class="icon-mention text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" name="password" class="form-control" placeholder="Password" required="required">
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
							</div>
							<div class="form-group has-feedback has-feedback-left">
								<select class="bootstrap-select" name="country_code" required="" data-width="100%">
									<option value="AD">AD - Andorra (+376)</option>
									<option value="AE">AE - United Arab Emirates (+971)</option>
									<option value="AF">AF - Afghanistan (+93)</option>
									<option value="AG">AG - Antigua And Barbuda (+1268)</option>
									<option value="AI">AI - Anguilla (+1264)</option>
									<option value="AL">AL - Albania (+355)</option>
									<option value="AM">AM - Armenia (+374)</option>
									<option value="AN">AN - Netherlands Antilles (+599)</option>
									<option value="AO">AO - Angola (+244)</option>
									<option value="AQ">AQ - Antarctica (+672)</option>
									<option value="AR">AR - Argentina (+54)</option>
									<option value="AS">AS - American Samoa (+1684)</option>
									<option value="AT">AT - Austria (+43)</option>
									<option value="AU">AU - Australia (+61)</option>
									<option value="AW">AW - Aruba (+297)</option>
									<option value="AZ">AZ - Azerbaijan (+994)</option>
									<option value="BA">BA - Bosnia And Herzegovina (+387)</option>
									<option value="BB">BB - Barbados (+1246)</option>
									<option value="BD">BD - Bangladesh (+880)</option>
									<option value="BE">BE - Belgium (+32)</option>
									<option value="BF">BF - Burkina Faso (+226)</option>
									<option value="BG">BG - Bulgaria (+359)</option>
									<option value="BH">BH - Bahrain (+973)</option>
									<option value="BI">BI - Burundi (+257)</option>
									<option value="BJ">BJ - Benin (+229)</option>
									<option value="BL">BL - Saint Barthelemy (+590)</option>
									<option value="BM">BM - Bermuda (+1441)</option>
									<option value="BN">BN - Brunei Darussalam (+673)</option>
									<option value="BO">BO - Bolivia (+591)</option>
									<option value="BR">BR - Brazil (+55)</option>
									<option value="BS">BS - Bahamas (+1242)</option>
									<option value="BT">BT - Bhutan (+975)</option>
									<option value="BW">BW - Botswana (+267)</option>
									<option value="BY">BY - Belarus (+375)</option>
									<option value="BZ">BZ - Belize (+501)</option>
									<option value="CA">CA - Canada (+1)</option>
									<option value="CC">CC - Cocos (keeling) Islands (+61)</option>
									<option value="CD">CD - Congo, The Democratic Republic Of The (+243)</option>
									<option value="CF">CF - Central African Republic (+236)</option>
									<option value="CG">CG - Congo (+242)</option>
									<option value="CH">CH - Switzerland (+41)</option>
									<option value="CI">CI - Cote D Ivoire (+225)</option>
									<option value="CK">CK - Cook Islands (+682)</option>
									<option value="CL">CL - Chile (+56)</option>
									<option value="CM">CM - Cameroon (+237)</option>
									<option value="CN">CN - China (+86)</option>
									<option value="CO">CO - Colombia (+57)</option>
									<option value="CR">CR - Costa Rica (+506)</option>
									<option value="CU">CU - Cuba (+53)</option>
									<option value="CV">CV - Cape Verde (+238)</option>
									<option value="CX">CX - Christmas Island (+61)</option>
									<option value="CY">CY - Cyprus (+357)</option>
									<option value="CZ">CZ - Czech Republic (+420)</option>
									<option value="DE">DE - Germany (+49)</option>
									<option value="DJ">DJ - Djibouti (+253)</option>
									<option value="DK">DK - Denmark (+45)</option>
									<option value="DM">DM - Dominica (+1767)</option>
									<option value="DO">DO - Dominican Republic (+1809)</option>
									<option value="DZ">DZ - Algeria (+213)</option>
									<option value="EC">EC - Ecuador (+593)</option>
									<option value="EE">EE - Estonia (+372)</option>
									<option value="EG">EG - Egypt (+20)</option>
									<option value="ER">ER - Eritrea (+291)</option>
									<option value="ES">ES - Spain (+34)</option>
									<option value="ET">ET - Ethiopia (+251)</option>
									<option value="FI">FI - Finland (+358)</option>
									<option value="FJ">FJ - Fiji (+679)</option>
									<option value="FK">FK - Falkland Islands (malvinas) (+500)</option>
									<option value="FM">FM - Micronesia, Federated States Of (+691)</option>
									<option value="FO">FO - Faroe Islands (+298)</option>
									<option value="FR">FR - France (+33)</option>
									<option value="GA">GA - Gabon (+241)</option>
									<option value="GB">GB - United Kingdom (+44)</option>
									<option value="GD">GD - Grenada (+1473)</option>
									<option value="GE">GE - Georgia (+995)</option>
									<option value="GH">GH - Ghana (+233)</option>
									<option value="GI">GI - Gibraltar (+350)</option>
									<option value="GL">GL - Greenland (+299)</option>
									<option value="GM">GM - Gambia (+220)</option>
									<option value="GN">GN - Guinea (+224)</option>
									<option value="GQ">GQ - Equatorial Guinea (+240)</option>
									<option value="GR">GR - Greece (+30)</option>
									<option value="GT">GT - Guatemala (+502)</option>
									<option value="GU">GU - Guam (+1671)</option>
									<option value="GW">GW - Guinea-bissau (+245)</option>
									<option value="GY">GY - Guyana (+592)</option>
									<option value="HK">HK - Hong Kong (+852)</option>
									<option value="HN">HN - Honduras (+504)</option>
									<option value="HR">HR - Croatia (+385)</option>
									<option value="HT">HT - Haiti (+509)</option>
									<option value="HU">HU - Hungary (+36)</option>
									<option value="ID">ID - Indonesia (+62)</option>
									<option value="IE">IE - Ireland (+353)</option>
									<option value="IL">IL - Israel (+972)</option>
									<option value="IM">IM - Isle Of Man (+44)</option>
									<option value="IN">IN - India (+91)</option>
									<option value="IQ">IQ - Iraq (+964)</option>
									<option value="IR">IR - Iran, Islamic Republic Of (+98)</option>
									<option value="IS">IS - Iceland (+354)</option>
									<option value="IT">IT - Italy (+39)</option>
									<option value="JM">JM - Jamaica (+1876)</option>
									<option value="JO">JO - Jordan (+962)</option>
									<option value="JP">JP - Japan (+81)</option>
									<option value="KE">KE - Kenya (+254)</option>
									<option value="KG">KG - Kyrgyzstan (+996)</option>
									<option value="KH">KH - Cambodia (+855)</option>
									<option value="KI">KI - Kiribati (+686)</option>
									<option value="KM">KM - Comoros (+269)</option>
									<option value="KN">KN - Saint Kitts And Nevis (+1869)</option>
									<option value="KP">KP - Korea Democratic Peoples Republic Of (+850)</option>
									<option value="KR">KR - Korea Republic Of (+82)</option>
									<option value="KW">KW - Kuwait (+965)</option>
									<option value="KY">KY - Cayman Islands (+1345)</option>
									<option value="KZ">KZ - Kazakstan (+7)</option>
									<option value="LA">LA - Lao Peoples Democratic Republic (+856)</option>
									<option value="LB">LB - Lebanon (+961)</option>
									<option value="LC">LC - Saint Lucia (+1758)</option>
									<option value="LI">LI - Liechtenstein (+423)</option>
									<option value="LK">LK - Sri Lanka (+94)</option>
									<option value="LR">LR - Liberia (+231)</option>
									<option value="LS">LS - Lesotho (+266)</option>
									<option value="LT">LT - Lithuania (+370)</option>
									<option value="LU">LU - Luxembourg (+352)</option>
									<option value="LV">LV - Latvia (+371)</option>
									<option value="LY">LY - Libyan Arab Jamahiriya (+218)</option>
									<option value="MA">MA - Morocco (+212)</option>
									<option value="MC">MC - Monaco (+377)</option>
									<option value="MD">MD - Moldova, Republic Of (+373)</option>
									<option value="ME">ME - Montenegro (+382)</option>
									<option value="MF">MF - Saint Martin (+1599)</option>
									<option value="MG">MG - Madagascar (+261)</option>
									<option value="MH">MH - Marshall Islands (+692)</option>
									<option value="MK">MK - Macedonia, The Former Yugoslav Republic Of (+389)</option>
									<option value="ML">ML - Mali (+223)</option>
									<option value="MM">MM - Myanmar (+95)</option>
									<option value="MN">MN - Mongolia (+976)</option>
									<option value="MO">MO - Macau (+853)</option>
									<option value="MP">MP - Northern Mariana Islands (+1670)</option>
									<option value="MR">MR - Mauritania (+222)</option>
									<option value="MS">MS - Montserrat (+1664)</option>
									<option value="MT">MT - Malta (+356)</option>
									<option value="MU">MU - Mauritius (+230)</option>
									<option value="MV">MV - Maldives (+960)</option>
									<option value="MW">MW - Malawi (+265)</option>
									<option value="MX">MX - Mexico (+52)</option>
									<option value="MY">MY - Malaysia (+60)</option>
									<option value="MZ">MZ - Mozambique (+258)</option>
									<option value="NA">NA - Namibia (+264)</option>
									<option value="NC">NC - New Caledonia (+687)</option>
									<option value="NE">NE - Niger (+227)</option>
									<option value="NG">NG - Nigeria (+234)</option>
									<option value="NI">NI - Nicaragua (+505)</option>
									<option value="NL">NL - Netherlands (+31)</option>
									<option value="NO">NO - Norway (+47)</option>
									<option value="NP">NP - Nepal (+977)</option>
									<option value="NR">NR - Nauru (+674)</option>
									<option value="NU">NU - Niue (+683)</option>
									<option value="NZ">NZ - New Zealand (+64)</option>
									<option value="OM">OM - Oman (+968)</option>
									<option value="PA">PA - Panama (+507)</option>
									<option value="PE">PE - Peru (+51)</option>
									<option value="PF">PF - French Polynesia (+689)</option>
									<option value="PG">PG - Papua New Guinea (+675)</option>
									<option value="PH">PH - Philippines (+63)</option>
									<option value="PK">PK - Pakistan (+92)</option>
									<option value="PL">PL - Poland (+48)</option>
									<option value="PM">PM - Saint Pierre And Miquelon (+508)</option>
									<option value="PN">PN - Pitcairn (+870)</option>
									<option value="PR">PR - Puerto Rico (+1)</option>
									<option value="PT">PT - Portugal (+351)</option>
									<option value="PW">PW - Palau (+680)</option>
									<option value="PY">PY - Paraguay (+595)</option>
									<option value="QA">QA - Qatar (+974)</option>
									<option value="RO">RO - Romania (+40)</option>
									<option value="RS">RS - Serbia (+381)</option>
									<option value="RU">RU - Russian Federation (+7)</option>
									<option value="RW">RW - Rwanda (+250)</option>
									<option value="SA">SA - Saudi Arabia (+966)</option>
									<option value="SB">SB - Solomon Islands (+677)</option>
									<option value="SC">SC - Seychelles (+248)</option>
									<option value="SD">SD - Sudan (+249)</option>
									<option value="SE">SE - Sweden (+46)</option>
									<option value="SG">SG - Singapore (+65)</option>
									<option value="SH">SH - Saint Helena (+290)</option>
									<option value="SI">SI - Slovenia (+386)</option>
									<option value="SK">SK - Slovakia (+421)</option>
									<option value="SL">SL - Sierra Leone (+232)</option>
									<option value="SM">SM - San Marino (+378)</option>
									<option value="SN">SN - Senegal (+221)</option>
									<option value="SO">SO - Somalia (+252)</option>
									<option value="SR">SR - Suriname (+597)</option>
									<option value="ST">ST - Sao Tome And Principe (+239)</option>
									<option value="SV">SV - El Salvador (+503)</option>
									<option value="SY">SY - Syrian Arab Republic (+963)</option>
									<option value="SZ">SZ - Swaziland (+268)</option>
									<option value="TC">TC - Turks And Caicos Islands (+1649)</option>
									<option value="TD">TD - Chad (+235)</option>
									<option value="TG">TG - Togo (+228)</option>
									<option value="TH">TH - Thailand (+66)</option>
									<option value="TJ">TJ - Tajikistan (+992)</option>
									<option value="TK">TK - Tokelau (+690)</option>
									<option value="TL">TL - Timor-leste (+670)</option>
									<option value="TM">TM - Turkmenistan (+993)</option>
									<option value="TN">TN - Tunisia (+216)</option>
									<option value="TO">TO - Tonga (+676)</option>
									<option value="TR">TR - Turkey (+90)</option>
									<option value="TT">TT - Trinidad And Tobago (+1868)</option>
									<option value="TV">TV - Tuvalu (+688)</option>
									<option value="TW">TW - Taiwan, Province Of China (+886)</option>
									<option value="TZ">TZ - Tanzania, United Republic Of (+255)</option>
									<option value="UA">UA - Ukraine (+380)</option>
									<option value="UG">UG - Uganda (+256)</option>
									<option value="US">US - United States (+1)</option>
									<option value="UY">UY - Uruguay (+598)</option>
									<option value="UZ">UZ - Uzbekistan (+998)</option>
									<option value="VA">VA - Holy See (vatican City State) (+39)</option>
									<option value="VC">VC - Saint Vincent And The Grenadines (+1784)</option>
									<option value="VE">VE - Venezuela (+58)</option>
									<option value="VG">VG - Virgin Islands, British (+1284)</option>
									<option value="VI">VI - Virgin Islands, U.s. (+1340)</option>
									<option value="VN">VN - Viet Nam (+84)</option>
									<option value="VU">VU - Vanuatu (+678)</option>
									<option value="WF">WF - Wallis And Futuna (+681)</option>
									<option value="WS">WS - Samoa (+685)</option>
									<option value="XK">XK - Kosovo (+381)</option>
									<option value="YE">YE - Yemen (+967)</option>
									<option value="YT">YT - Mayotte (+262)</option>
									<option value="ZA">ZA - South Africa (+27)</option>
									<option value="ZM">ZM - Zambia (+260)</option>
									<option value="ZW">ZW - Zimbabwe (+263)</option>
								</select>
							</div>
							<div class="form-group has-feedback has-feedback-left">
								<div class="row has-feedback has-feedback-left">
									<!-- <div class="col-md-6">
										<input type="text" name="country_code" class="form-control" placeholder="Country code" required="required">
										<div class="form-control-feedback" style="margin-left:10px;">
											<i class="icon-puzzle2 text-muted"></i>
										</div>
									</div> -->
									<div class="col-md-12">
										<input type="text" name="phone_no" class="form-control" placeholder="Phone no" required="required">
										<div class="form-control-feedback" style="margin-left:10px;">
											<i class="icon-mobile text-muted"></i>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" class="btn bg-teal btn-block btn-lg">Register <i class="icon-circle-right2 position-right"></i></button>
							<button type="button" style="margin-top: 20px;" class="btn btn-link"  onclick="javascript:backtologin();"><i class="icon-arrow-left13 position-left"></i> Back to login form</button>
						</div>
					</form>
					<!-- /advanced login -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; 2019. <a href="index.php?page=index">Financial Manage v1.0</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
