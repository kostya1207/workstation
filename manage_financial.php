<?php
  include ('header.php');
  	$user_id = $_SESSION['login_user_id'];
  	$query = "select min(id) as id from financial where user_id = '$user_id'";
	$result = mysqli_query($conn,$query);
	$row = $result->fetch_row();
	$id = $row[0];
  	$query = "select * from financial where user_id = '$user_id'";
	$result = mysqli_query($conn,$query);
	$rows_num = mysqli_num_rows($result);
?>
	<script type="text/javascript">
		<?php
	      if(isset($_GET["insert"])){
	      $insert = $_GET["insert"];
	        if ($insert == 1) {
	    ?>
	      $(document).ready(function(){
	        new PNotify({
	            title: 'Insert Data Success',
	            text: 'Your financial data insert is successed',
	            addclass: 'bg-success'
	        });
	      });
	    <?php
	        }else{
	    ?>
	      $(document).ready(function(){
	        new PNotify({
	            title: 'Insert Data failed',
	            text: 'Your financial data insert is failed',
	            addclass: 'bg-danger'
	        });
	      }); 
	    <?php      
	        }
	      }
	    ?>
	    <?php
	      if(isset($_GET["update"])){
	      $update = $_GET["update"];
	        if ($update == 1) {
	    ?>
	      $(document).ready(function(){
	        new PNotify({
	            title: 'Update Data Success',
	            text: 'Your financial data update is successed',
	            addclass: 'bg-success'
	        });
	      });
	    <?php
	        }else{
	    ?>
	      $(document).ready(function(){
	        new PNotify({
	            title: 'Update Data failed',
	            text: 'Your financial data update is failed',
	            addclass: 'bg-danger'
	        });
	      }); 
	    <?php      
	        }
	      }
	    ?>
	    <?php
	      if(isset($_GET["delete"])){
	      $delete = $_GET["delete"];
	        if ($delete == 1) {
	    ?>
	      $(document).ready(function(){
	        new PNotify({
	            title: 'Delete Data Success',
	            text: 'Your financial data delete is successed',
	            addclass: 'bg-success'
	        });
	      });
	    <?php
	        }else{
	    ?>
	      $(document).ready(function(){
	        new PNotify({
	            title: 'Update Data failed',
	            text: 'Your financial data delete is failed',
	            addclass: 'bg-danger'
	        });
	      }); 
	    <?php      
	        }
	      }
	    ?>
	    function delete_date(id){
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
		            window.location.href="financial_input.php?type=delete&id=" + id + "&page=input";
		        })

		        // On cancel
		        notice.get().on('pnotify.cancel', function() {
		            return;
		        });
	    	});
	    }
	</script>
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Financial List<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
		</div>

		<div class="table-responsive" style="padding: 20px;"> 
			<table class="table">
				<thead>
					<tr>
						<th>End Of Year</th>
						<th>Income</th>
						<th>Expenses</th>
						<th>Networth (start of Year)</th>
						<th>Networth (end of Year)</th>
						<th>Return On Investments (ROI)</th>
						<th>Percent Of Expenses Covered By ROI</th>
						<!-- <th class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th> -->
					</tr>
				</thead>
				<tbody>
				<?php
					while ($row = mysqli_fetch_assoc($result)) {
						$roi = round((floatval($row["total_networth"]) * floatval($row["percentage"]) / 100),2);
				?>
					<tr>
						<td><?php echo $row["age"];?></td>
						<td><?php echo $row["ann_total_income"];?></td>
						<td><?php echo $row["ann_total_expenses"];?></td>
						<td><?php echo $row["total_networth"];?></td>
						<td><?php echo round((floatval($row["total_networth"]) + floatval($roi)),2);?></td>
						<td><?php echo $roi;?></td>
						<td><?php 
								if ($row["ann_total_expenses"] != 0) {
									echo round(floatval($roi) * 100 / floatval($row["ann_total_expenses"]),2);
								}else{
									echo 0;
								}
							?>%
						</td>
						<!-- <td class="text-center">
							<ul class="icons-list">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>

									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="financial_input.php?type=view&id=<?php echo $row['id'];?>&page=input"><i class="icon-eye"></i> View</a></li>
										<li><a href="financial_input.php?type=edit&id=<?php echo $row['id'];?>&page=input"><i class=" icon-pencil5"></i> Edit</a></li>
										<li><a href="#" onclick="javascript:delete_date(<?php echo $row['id'];?>);"><i class="icon-bin"></i> Delete</a></li>
									</ul>
								</li>
							</ul>
						</td> -->
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>
			<div class="text-right" style="margin: 30px;">
				
				<?php
					if($rows_num == 0){
				?>
				<button type="" class="btn btn-primary" onclick="javascript:add_financial();">Add Financial	 <i class="icon-arrow-right14 position-right"></i></button>
				<?php
					}else{
				?>
				<button type="" class="btn btn-primary" onclick="javascript:update_financial();">Update Financial	 <i class="icon-pencil5 position-right"></i></button>
				<button type="" class="btn btn-primary" onclick="javascript:delete_financial();">Delete Financial	 <i class="icon-bin position-right"></i></button>
				<?php
					}
				?>
				
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function add_financial(){
			window.location.href = "financial_input.php?type=add&id=0&page=input";
		}
		function update_financial(){
			window.location.href = "financial_input.php?type=edit&id=<?php echo $id;?>&page=input";
		}
		function delete_financial(){

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
		            window.location.href = "financial_input.php?type=delete&id=0&page=input";
		        })

		        // On cancel
		        notice.get().on('pnotify.cancel', function() {
		            return;
		        });
	    	});
			
		}
	</script>
<?php
    include ('footer.php');
?>