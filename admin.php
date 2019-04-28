<?php 
  session_start();
  if(isset($_SESSION['login_user'])==false || $_SESSION['login_user']=='')
  {
    header('Location: login.php');
  }
  include ('database.php');
  function countryCodeToCountry($code) {
    $code = strtoupper($code);
    if ($code == 'AF') return 'Afghanistan';
    if ($code == 'AX') return 'Aland Islands';
    if ($code == 'AL') return 'Albania';
    if ($code == 'DZ') return 'Algeria';
    if ($code == 'AS') return 'American Samoa';
    if ($code == 'AD') return 'Andorra';
    if ($code == 'AO') return 'Angola';
    if ($code == 'AI') return 'Anguilla';
    if ($code == 'AQ') return 'Antarctica';
    if ($code == 'AG') return 'Antigua and Barbuda';
    if ($code == 'AR') return 'Argentina';
    if ($code == 'AM') return 'Armenia';
    if ($code == 'AW') return 'Aruba';
    if ($code == 'AU') return 'Australia';
    if ($code == 'AT') return 'Austria';
    if ($code == 'AZ') return 'Azerbaijan';
    if ($code == 'BS') return 'Bahamas the';
    if ($code == 'BH') return 'Bahrain';
    if ($code == 'BD') return 'Bangladesh';
    if ($code == 'BB') return 'Barbados';
    if ($code == 'BY') return 'Belarus';
    if ($code == 'BE') return 'Belgium';
    if ($code == 'BZ') return 'Belize';
    if ($code == 'BJ') return 'Benin';
    if ($code == 'BM') return 'Bermuda';
    if ($code == 'BT') return 'Bhutan';
    if ($code == 'BO') return 'Bolivia';
    if ($code == 'BA') return 'Bosnia and Herzegovina';
    if ($code == 'BW') return 'Botswana';
    if ($code == 'BV') return 'Bouvet Island (Bouvetoya)';
    if ($code == 'BR') return 'Brazil';
    if ($code == 'IO') return 'British Indian Ocean Territory (Chagos Archipelago)';
    if ($code == 'VG') return 'British Virgin Islands';
    if ($code == 'BN') return 'Brunei Darussalam';
    if ($code == 'BG') return 'Bulgaria';
    if ($code == 'BF') return 'Burkina Faso';
    if ($code == 'BI') return 'Burundi';
    if ($code == 'KH') return 'Cambodia';
    if ($code == 'CM') return 'Cameroon';
    if ($code == 'CA') return 'Canada';
    if ($code == 'CV') return 'Cape Verde';
    if ($code == 'KY') return 'Cayman Islands';
    if ($code == 'CF') return 'Central African Republic';
    if ($code == 'TD') return 'Chad';
    if ($code == 'CL') return 'Chile';
    if ($code == 'CN') return 'China';
    if ($code == 'CX') return 'Christmas Island';
    if ($code == 'CC') return 'Cocos (Keeling) Islands';
    if ($code == 'CO') return 'Colombia';
    if ($code == 'KM') return 'Comoros the';
    if ($code == 'CD') return 'Congo';
    if ($code == 'CG') return 'Congo the';
    if ($code == 'CK') return 'Cook Islands';
    if ($code == 'CR') return 'Costa Rica';
    if ($code == 'CI') return 'Cote d\'Ivoire';
    if ($code == 'HR') return 'Croatia';
    if ($code == 'CU') return 'Cuba';
    if ($code == 'CY') return 'Cyprus';
    if ($code == 'CZ') return 'Czech Republic';
    if ($code == 'DK') return 'Denmark';
    if ($code == 'DJ') return 'Djibouti';
    if ($code == 'DM') return 'Dominica';
    if ($code == 'DO') return 'Dominican Republic';
    if ($code == 'EC') return 'Ecuador';
    if ($code == 'EG') return 'Egypt';
    if ($code == 'SV') return 'El Salvador';
    if ($code == 'GQ') return 'Equatorial Guinea';
    if ($code == 'ER') return 'Eritrea';
    if ($code == 'EE') return 'Estonia';
    if ($code == 'ET') return 'Ethiopia';
    if ($code == 'FO') return 'Faroe Islands';
    if ($code == 'FK') return 'Falkland Islands (Malvinas)';
    if ($code == 'FJ') return 'Fiji the Fiji Islands';
    if ($code == 'FI') return 'Finland';
    if ($code == 'FR') return 'France, French Republic';
    if ($code == 'GF') return 'French Guiana';
    if ($code == 'PF') return 'French Polynesia';
    if ($code == 'TF') return 'French Southern Territories';
    if ($code == 'GA') return 'Gabon';
    if ($code == 'GM') return 'Gambia the';
    if ($code == 'GE') return 'Georgia';
    if ($code == 'DE') return 'Germany';
    if ($code == 'GH') return 'Ghana';
    if ($code == 'GI') return 'Gibraltar';
    if ($code == 'GR') return 'Greece';
    if ($code == 'GL') return 'Greenland';
    if ($code == 'GD') return 'Grenada';
    if ($code == 'GP') return 'Guadeloupe';
    if ($code == 'GU') return 'Guam';
    if ($code == 'GT') return 'Guatemala';
    if ($code == 'GG') return 'Guernsey';
    if ($code == 'GN') return 'Guinea';
    if ($code == 'GW') return 'Guinea-Bissau';
    if ($code == 'GY') return 'Guyana';
    if ($code == 'HT') return 'Haiti';
    if ($code == 'HM') return 'Heard Island and McDonald Islands';
    if ($code == 'VA') return 'Holy See (Vatican City State)';
    if ($code == 'HN') return 'Honduras';
    if ($code == 'HK') return 'Hong Kong';
    if ($code == 'HU') return 'Hungary';
    if ($code == 'IS') return 'Iceland';
    if ($code == 'IN') return 'India';
    if ($code == 'ID') return 'Indonesia';
    if ($code == 'IR') return 'Iran';
    if ($code == 'IQ') return 'Iraq';
    if ($code == 'IE') return 'Ireland';
    if ($code == 'IM') return 'Isle of Man';
    if ($code == 'IL') return 'Israel';
    if ($code == 'IT') return 'Italy';
    if ($code == 'JM') return 'Jamaica';
    if ($code == 'JP') return 'Japan';
    if ($code == 'JE') return 'Jersey';
    if ($code == 'JO') return 'Jordan';
    if ($code == 'KZ') return 'Kazakhstan';
    if ($code == 'KE') return 'Kenya';
    if ($code == 'KI') return 'Kiribati';
    if ($code == 'KP') return 'Korea';
    if ($code == 'KR') return 'Korea';
    if ($code == 'KW') return 'Kuwait';
    if ($code == 'KG') return 'Kyrgyz Republic';
    if ($code == 'LA') return 'Lao';
    if ($code == 'LV') return 'Latvia';
    if ($code == 'LB') return 'Lebanon';
    if ($code == 'LS') return 'Lesotho';
    if ($code == 'LR') return 'Liberia';
    if ($code == 'LY') return 'Libyan Arab Jamahiriya';
    if ($code == 'LI') return 'Liechtenstein';
    if ($code == 'LT') return 'Lithuania';
    if ($code == 'LU') return 'Luxembourg';
    if ($code == 'MO') return 'Macao';
    if ($code == 'MK') return 'Macedonia';
    if ($code == 'MG') return 'Madagascar';
    if ($code == 'MW') return 'Malawi';
    if ($code == 'MY') return 'Malaysia';
    if ($code == 'MV') return 'Maldives';
    if ($code == 'ML') return 'Mali';
    if ($code == 'MT') return 'Malta';
    if ($code == 'MH') return 'Marshall Islands';
    if ($code == 'MQ') return 'Martinique';
    if ($code == 'MR') return 'Mauritania';
    if ($code == 'MU') return 'Mauritius';
    if ($code == 'YT') return 'Mayotte';
    if ($code == 'MX') return 'Mexico';
    if ($code == 'FM') return 'Micronesia';
    if ($code == 'MD') return 'Moldova';
    if ($code == 'MC') return 'Monaco';
    if ($code == 'MN') return 'Mongolia';
    if ($code == 'ME') return 'Montenegro';
    if ($code == 'MS') return 'Montserrat';
    if ($code == 'MA') return 'Morocco';
    if ($code == 'MZ') return 'Mozambique';
    if ($code == 'MM') return 'Myanmar';
    if ($code == 'NA') return 'Namibia';
    if ($code == 'NR') return 'Nauru';
    if ($code == 'NP') return 'Nepal';
    if ($code == 'AN') return 'Netherlands Antilles';
    if ($code == 'NL') return 'Netherlands the';
    if ($code == 'NC') return 'New Caledonia';
    if ($code == 'NZ') return 'New Zealand';
    if ($code == 'NI') return 'Nicaragua';
    if ($code == 'NE') return 'Niger';
    if ($code == 'NG') return 'Nigeria';
    if ($code == 'NU') return 'Niue';
    if ($code == 'NF') return 'Norfolk Island';
    if ($code == 'MP') return 'Northern Mariana Islands';
    if ($code == 'NO') return 'Norway';
    if ($code == 'OM') return 'Oman';
    if ($code == 'PK') return 'Pakistan';
    if ($code == 'PW') return 'Palau';
    if ($code == 'PS') return 'Palestinian Territory';
    if ($code == 'PA') return 'Panama';
    if ($code == 'PG') return 'Papua New Guinea';
    if ($code == 'PY') return 'Paraguay';
    if ($code == 'PE') return 'Peru';
    if ($code == 'PH') return 'Philippines';
    if ($code == 'PN') return 'Pitcairn Islands';
    if ($code == 'PL') return 'Poland';
    if ($code == 'PT') return 'Portugal, Portuguese Republic';
    if ($code == 'PR') return 'Puerto Rico';
    if ($code == 'QA') return 'Qatar';
    if ($code == 'RE') return 'Reunion';
    if ($code == 'RO') return 'Romania';
    if ($code == 'RU') return 'Russian Federation';
    if ($code == 'RW') return 'Rwanda';
    if ($code == 'BL') return 'Saint Barthelemy';
    if ($code == 'SH') return 'Saint Helena';
    if ($code == 'KN') return 'Saint Kitts and Nevis';
    if ($code == 'LC') return 'Saint Lucia';
    if ($code == 'MF') return 'Saint Martin';
    if ($code == 'PM') return 'Saint Pierre and Miquelon';
    if ($code == 'VC') return 'Saint Vincent and the Grenadines';
    if ($code == 'WS') return 'Samoa';
    if ($code == 'SM') return 'San Marino';
    if ($code == 'ST') return 'Sao Tome and Principe';
    if ($code == 'SA') return 'Saudi Arabia';
    if ($code == 'SN') return 'Senegal';
    if ($code == 'RS') return 'Serbia';
    if ($code == 'SC') return 'Seychelles';
    if ($code == 'SL') return 'Sierra Leone';
    if ($code == 'SG') return 'Singapore';
    if ($code == 'SK') return 'Slovakia (Slovak Republic)';
    if ($code == 'SI') return 'Slovenia';
    if ($code == 'SB') return 'Solomon Islands';
    if ($code == 'SO') return 'Somalia, Somali Republic';
    if ($code == 'ZA') return 'South Africa';
    if ($code == 'GS') return 'South Georgia and the South Sandwich Islands';
    if ($code == 'ES') return 'Spain';
    if ($code == 'LK') return 'Sri Lanka';
    if ($code == 'SD') return 'Sudan';
    if ($code == 'SR') return 'Suriname';
    if ($code == 'SJ') return 'Svalbard & Jan Mayen Islands';
    if ($code == 'SZ') return 'Swaziland';
    if ($code == 'SE') return 'Sweden';
    if ($code == 'CH') return 'Switzerland, Swiss Confederation';
    if ($code == 'SY') return 'Syrian Arab Republic';
    if ($code == 'TW') return 'Taiwan';
    if ($code == 'TJ') return 'Tajikistan';
    if ($code == 'TZ') return 'Tanzania';
    if ($code == 'TH') return 'Thailand';
    if ($code == 'TL') return 'Timor-Leste';
    if ($code == 'TG') return 'Togo';
    if ($code == 'TK') return 'Tokelau';
    if ($code == 'TO') return 'Tonga';
    if ($code == 'TT') return 'Trinidad and Tobago';
    if ($code == 'TN') return 'Tunisia';
    if ($code == 'TR') return 'Turkey';
    if ($code == 'TM') return 'Turkmenistan';
    if ($code == 'TC') return 'Turks and Caicos Islands';
    if ($code == 'TV') return 'Tuvalu';
    if ($code == 'UG') return 'Uganda';
    if ($code == 'UA') return 'Ukraine';
    if ($code == 'AE') return 'United Arab Emirates';
    if ($code == 'GB') return 'United Kingdom';
    if ($code == 'US') return 'United States of America';
    if ($code == 'UM') return 'United States Minor Outlying Islands';
    if ($code == 'VI') return 'United States Virgin Islands';
    if ($code == 'UY') return 'Uruguay, Eastern Republic of';
    if ($code == 'UZ') return 'Uzbekistan';
    if ($code == 'VU') return 'Vanuatu';
    if ($code == 'VE') return 'Venezuela';
    if ($code == 'VN') return 'Vietnam';
    if ($code == 'WF') return 'Wallis and Futuna';
    if ($code == 'EH') return 'Western Sahara';
    if ($code == 'YE') return 'Yemen';
    if ($code == 'XK') return 'Kosovo';
    if ($code == 'ZM') return 'Zambia';
    if ($code == 'ZW') return 'Zimbabwe';
    return '';
}  
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Financial - v1.0</title>

  <!-- Global stylesheets -->
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
  <script src="global_assets/js/plugins/forms/validation/validate.min.js"></script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script src="global_assets/js/plugins/visualization/echarts/echarts.min.js"></script>
  <script src="global_assets/js/plugins/notifications/pnotify.min.js"></script>

  <script src="global_assets/js/plugins/forms/selects/bootstrap_select.min.js"></script>
  <script src="global_assets/js/demo_pages/form_bootstrap_select.js"></script>

  <script src="assets/js/app.js"></script>

  <script type="text/javascript">
    function change_setting(){
      var old_password = "<?php echo $_SESSION['login_password'];?>";
      if(old_password != $("#old_password").val()){
        $(document).ready(function(){
          new PNotify({
              title: 'Change Failed',
              text: 'Old password is not correct!',
              addclass: 'bg-warning'
          });
        });
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
                document.getElementById("form_change").submit();
            })

            // On cancel
            notice.get().on('pnotify.cancel', function() {
                return;
            });
        });
        
      }
    }
    <?php
      if(isset($_GET["change_setting"])){
      $change_setting = $_GET["change_setting"];
        if ($change_setting == 1) {
    ?>
      $(document).ready(function(){
        new PNotify({
            title: 'Change success',
            text: 'Your account change is successed',
            addclass: 'bg-success'
        });
      });
    <?php
        }else{
    ?>
      $(document).ready(function(){
        new PNotify({
            title: 'Change failed',
            text: 'Your account change is failed',
            addclass: 'bg-danger'
        });
      }); 
    <?php      
        }
      }
    ?>

    <?php
      if(isset($_GET["change_user"])){
      $change_user = $_GET["change_user"];
        if ($change_user == 1) {
    ?>
      $(document).ready(function(){
        new PNotify({
            title: 'Change success',
            text: 'User data change is successed',
            addclass: 'bg-success'
        });
      });
    <?php
        }else{
    ?>
      $(document).ready(function(){
        new PNotify({
            title: 'Change failed',
            text: 'User data change is failed',
            addclass: 'bg-danger'
        });
      }); 
    <?php      
        }
      }
    ?>

    function delete_user(id){

        $(document).ready(function(){
          var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to delete?</p>',
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
                window.location.href = "manage_user.php?type=delete&id="+id;
            })

            // On cancel
            notice.get().on('pnotify.cancel', function() {
                return;
            });
        });
      
    }

    function change_user_db(){

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
                document.getElementById("user_change").submit();
            })

            // On cancel
            notice.get().on('pnotify.cancel', function() {
                return;
            });
        });
      
    }

    function onchange_user(id){
      $("#id1").val($("#id_"+id).val());
      $("#username1").val($("#username_"+id).html());
      $("#email1").val($("#email_"+id).html());
      $("#country_code1").val($("#country_code_"+id).html());
      $("#phone_no1").val($("#phone_no_"+id).html());
    }
  </script>
</head>

<body>

  <!-- Main navbar -->
  <div class="navbar navbar-default header-highlight">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin.php"><i class="icon-book3" style="font-size:26px;color:#fff;margin-left: 16px;"></i><span style="font-size:18px;color:#fff;position: absolute;margin-left: 16px;margin-top: 2px;">   Financial </span></a>

      <ul class="nav navbar-nav visible-xs-block">
        <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
      </ul>
    </div>
    
    <div class="navbar-collapse collapse" id="navbar-mobile">
      <ul class="nav navbar-nav">
        <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
      </ul>

      <div class="navbar-right">
        <ul class="nav navbar-nav">

          <li class="dropdown dropdown-user">
            <a class="dropdown-toggle" data-toggle="dropdown">
              <img src="image/user.jpg" alt="">
              <span><?php echo $_SESSION['login_user'];?></span>
              <i class="caret"></i>
            </a>

            <ul class="dropdown-menu dropdown-menu-right">
              <li><a href="#" data-toggle="modal" data-target="#modal_setting"><i class="icon-cog5"></i> Account settings</a></li>
              <li><a href="logout.php"><i class="icon-switch2"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /main navbar -->

    <div id="modal_setting" class="modal fade" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title">Account settings</h5>
          </div>

          <form id="form_change" action="admin_change.php" method="post" class="form-horizontal form-validate">
            <div class="modal-body">
              <div class="form-group">
                <label class="control-label col-sm-3">Email</label>
                <div class="col-sm-9">
                  <input type="hidden" placeholder="Id" name="id" id="id" value="<?php echo $_SESSION['login_user_id'];?>" readonly class="form-control" required="required">
                  <input type="email" placeholder="Email" name="email" id="email" value="<?php echo $_SESSION['login_email'];?>" readonly class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">User Name</label>
                <div class="col-sm-9">
                  <input type="text" placeholder="User Name" name="username" id="username" value="<?php echo $_SESSION['login_user'];?>" class="form-control" required="required">
                </div>
              </div>

              <div class="form-group has-feedback has-feedback-left">
                <label class="control-label col-sm-3">Country Code</label>
                <div class="col-sm-9">
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
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Phone No</label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Phone No" name="phone_no" id="phone_no" value="<?php echo $_SESSION['login_phone'];?>" class="form-control" required="required">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Old Password</label>
                <div class="col-sm-9">
                  <input type="password" name="old_password" id="old_password" placeholder="Old Password" class="form-control" required="required">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">New Password</label>
                <div class="col-sm-9">
                  <input type="password" name="new_password" id="new_password" minlength=5 placeholder="New Password ( more than 5 characters )" class="form-control">
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="javascript:change_setting();">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div id="change_user_modal" class="modal fade" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title">User Details</h5>
          </div>

          <form id="user_change" action="manage_user.php?type=update" method="post" class="form-horizontal form-validate">
            <div class="modal-body">

              <div class="form-group">
                <label class="control-label col-sm-3">User Name</label>
                <div class="col-sm-9">
                  <input type="text" placeholder="User Name" name="username1" id="username1" value="" class="form-control" required="required">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Email</label>
                <div class="col-sm-9">
                  <input type="hidden" placeholder="Id" name="id1" id="id1" value="" readonly class="form-control" required="required">
                  <input type="email" placeholder="Email" name="email1" id="email1" value="" class="form-control">
                </div>
              </div>

              <div class="form-group has-feedback has-feedback-left">
                <label class="control-label col-sm-3">Country Code</label>
                <div class="col-sm-9">
                  <select class="bootstrap-select" name="country_code1" required="" data-width="100%">
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
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Phone No</label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Phone No" name="phone_no1" id="phone_no1" value="" class="form-control" required="required">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">New Password</label>
                <div class="col-sm-9">
                  <input type="password" name="new_password1" id="new_password1" minlength=5 placeholder="New Password ( more than 5 characters )" class="form-control">
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="javascript:change_user_db();">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  <!-- Page container -->
  <div class="page-container">

    <!-- Page content -->
    <div class="page-content">

      <!-- Main sidebar -->
      <div class="sidebar sidebar-main">
        <div class="sidebar-content">

          <!-- User menu -->
          <div class="sidebar-user">
            <div class="category-content">
              <div class="media">
                <a href="#" class="media-left"><img src="image/user.jpg" class="img-circle img-sm" alt=""></a>
                <div class="media-body">
                  <span class="media-heading text-semibold"><?php echo $_SESSION['login_user'];?></span>
                  <div class="text-size-mini text-muted">
                    <i class="icon-pin text-size-small"></i> &nbsp;<?php echo $_SESSION['login_email'];?>
                  </div>
                </div>

                <div class="media-right media-middle">
                  <ul class="icons-list">
                    <li>
                      <a href="#"><i class="icon-cog3"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- /user menu -->


          <!-- Main navigation -->
          <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
              <ul class="navigation navigation-main navigation-accordion">
                <li><a href="admin.php"><i class="icon-users4"></i> <span>User management</span></a></li>
              </ul>
            </div>
          </div>
          <!-- /main navigation -->

        </div>
      </div>
      <!-- /main sidebar -->
      <!-- Main content -->
      <div class="content-wrapper">
          <!-- Page header -->
        <div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Financial - User</span>
              </h4>
            </div>

            <div class="heading-elements">
              
            </div>
          </div>

          <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
              <li><i class="icon-home2 position-left"></i> Home</li>
              <li>User</li>
              
            </ul>
          </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

              <div class="panel panel-flat">
              <div class="panel-heading">
                <h5 class="panel-title">User List<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                <div class="heading-elements">
                  <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                    </div>
              </div>

              <div class="table-responsive" style="padding: 20px;padding-bottom: 50px;"> 
                <table class="table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Country Code</th>
                      <th>Phone No</th>
                      <th class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $query = "select * from user where id > 0";
                    $result = mysqli_query($conn,$query);
                    $rows_num = mysqli_num_rows($result);
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                    <tr>
                      <td><?php echo $no;?><input type="hidden" value="<?php echo $row["id"];?>" id="id_<?php echo $row["id"];?>"></td>
                      <td id = "username_<?php echo $row["id"];?>"><?php echo $row["username"];?></td>
                      <td id = "email_<?php echo $row["id"];?>"><?php echo $row["email_address"];?></td>
                      <td id = "country_code_<?php echo $row["id"];?>">
                        <?php echo countryCodeToCountry($row["country_code"]);?>
                      </td>
                      <td id = "phone_no_<?php echo $row["id"];?>"><?php echo $row["phone_no"];?></td>
                      <td class="text-center">
                        <ul class="icons-list">
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="#" data-toggle="modal" data-target="#change_user_modal" onclick="javascript:onchange_user(<?php echo $row['id'];?>)"><i class=" icon-pencil5"></i> Edit</a></li>
                              <li><a href="#" onclick="javascript:delete_user(<?php echo $row['id'];?>);"><i class="icon-bin"></i> Delete</a></li>
                            </ul>
                          </li>
                        </ul>
                      </td>                                         
                    </tr>
                  <?php
                      $no = $no + 1;
                    }
                  ?>
                  </tbody>
                </table>
                <div class="text-right" style="margin: 30px;">
                </div>
              </div>
            </div>
          <!-- Footer -->
          <div class="footer text-muted">
            &copy; 2019. <a href="admin.php">Financial Manage v1.0</a>
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



