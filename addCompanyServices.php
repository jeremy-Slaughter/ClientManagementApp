<?php require("./nav.html"); ?>
<?php include("./connectDB.php"); ?>

<link rel="stylesheet" type="text/css" href="./CSS/main.css">


<div style="margin-left: 20px;">
<h1>Manage Company Options</h1>
<form action="" method="POST">
	<!-- Search Feature for quick referencing Row 1 -->

	<!-- <div class="form-group row"> -->
		<div class="input-group" style="margin-bottom:15px">
		<div class="input-group-prepend">
    		<span class="input-group-text">Select Company Name</span>
		</div>
		<input type="text" class="form-control col-md-5" list="companyName" name="companyName" placeholder="Type Company Name">
		<datalist id='companyName' class="datalist-form">
		<?php 
			$conn = dbConnect();
			$sql = "select * from company_names";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
				$company = $row["company_name"];
				echo "<option>$company</option>";
			}   
			dbClose($conn); 
		?>
		</datalist>
		</div>
		
	<!-- </div> -->
	<!-- Row 2 -->
	<div class="form-group row " >
		<!-- Setup Accounts Payable -->
		<div class="col-lg-3"  >
			<div class="form-check font-weight-bold primaryForm">
				<input class="form-check-input" type="checkbox" id="APOptions" onclick="showFunction('APOptionscheck')">
				<label class="form-check-label" for="APOptions" > Accounts Payable </label><br>
					<div class="listOptions" id="APOptionscheck" style="display:none">
						<ul list-style-type="none">
						<?php 
							$conn = dbConnect();
							$sql = "select * from reftable where description = 'Sub Category Accounts Payable'";
							$result = $conn->query($sql);
							while($row = $result->fetch_assoc()){
								$refName = $row["refName"];
								$category = $row["category"];
								echo "<input name=$refName value='0' type='hidden'>";
								echo "<li><label><input class='form-check-input' type='checkbox' name=$refName value='$refName'> $category</label></li>";
							}   
							dbClose($conn); 
						?>
					</div>
				</label>
			</div>
		</div>
		<!-- Setup Accounts Recievable-->
		<div class="col-lg-4">
			<div class="form-check font-weight-bold primaryForm" >
				<input class="form-check-input" type="checkbox" id="AROptions"  onclick="showFunction('AROptionscheck')">
				<label class="form-check-label " for="AROptions"> Accounts Receivable </label><br>
				<div class="listOptions" id="AROptionscheck" style="display:none">
					<ul list-style-type="none">
					<?php 
					$conn = dbConnect();
					$sql = "select * from reftable where description = 'Sub Category Accounts Receivable'";
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc()){
						$refName = $row["refName"];
						$category = $row["category"];
						echo "<input name=$refName value='0' type='hidden'>";
						echo "<li><label><input class='form-check-input' type='checkbox' name=$refName value='$refName'> $category </label></li>";
					}   
					dbClose($conn); 
					?>
				</label>
				</div>
			</div>
		</div>
		<!-- Setup Bank Reconciliation-->
		<div class="col-lg-4">
			<div class="form-check font-weight-bold primaryForm">
				<input class="form-check-input" type="checkbox" id="bankReconOptions" onclick="showFunction('bankReconOptionsCheck')">
				<label class="form-check-label" for="bankReconOptions"  > Bank Reconciliation </label><br>
				<div class="listOptions" id="bankReconOptionsCheck" style="display:none">
					<ul list-style-type="none">
					<?php 
					$conn = dbConnect();
					$sql = "select * from reftable where description = 'Sub Category Bank Reconciliation'";
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc()){
						$refName = $row["refName"];
						$category = $row["category"];
						echo "<input name=$refName value='0' type='hidden'>";
						echo "<li><label><input class='form-check-input' type='checkbox' name='$refName' value='$refName'> $category</label></li>";
					}   
					dbClose($conn); 
					?>
				</label>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Row 3 -->
	<div class="form-group row">
		<!-- Setup 1099 -->
		<div class="col-lg-3">
			<div class="form-check font-weight-bold primaryForm">
				<input class="form-check-input " type="checkbox" id="1099Options" onclick="showFunction('1099OptionsCheck')">
				<label class="form-check-label" for="1099Options"> 1099 </label><br>
					<div class="listOptions" id="1099OptionsCheck" style="display:none">
						<ul list-style-type="none">
						<?php 
						$conn = dbConnect();
						$sql = "select * from reftable where description = 'Sub Category 1099'";
						$result = $conn->query($sql);
						while($row = $result->fetch_assoc()){
							$refName = $row["refName"];
							$category = $row["category"];
							echo "<input name=$refName value='0' type='hidden'>";
							echo "<li><label><input class='form-check-input' type='checkbox' name=$refName value='$refName'> $category</label></li>";
						}   
						dbClose($conn); 
						?>
					</div>
				</label>
			</div>
		</div>
		<!-- Setup Check Stubs -->
		<div class="col-lg-4">
			<div class="form-check font-weight-bold primaryForm" >
			<input class="form-check-input" type="checkbox" id="csOptions" onclick="showFunction('csOptionsCheck')">
					<label class="form-check-label" for="csOptions"> Check Stubs </label><br>
					<div class="listOptions" id="csOptionsCheck" style="display:none">
						<ul list-style-type="none">
						<?php 
						$conn = dbConnect();
						$sql = "select * from reftable where description = 'Sub Category Check Stubs'";
						$result = $conn->query($sql);
						while($row = $result->fetch_assoc()){
							$refName = $row["refName"];
							$category = $row["category"];
							echo "<input name=$refName value='0' type='hidden'>";
							echo "<li><label><input class='form-check-input' type='checkbox' name=$refName value='$refName'> $category</label></li>";
						}   
						dbClose($conn); 
						?>
					</label>
				</div>
			</div>
		</div>
		<!-- Setup Revenue Billing -->
		<div class="col-lg-4">
			<div class="form-check font-weight-bold primaryForm">
				<input class="form-check-input" type="checkbox" id="revBillOptions" onclick="showFunction('revBillOptionsCheck')">
				<label class="form-check-label" for="revBillOptions"> Revenue Billing </label><br>
					<div class="listOptions" id="revBillOptionsCheck" style="display:none">
						<ul list-style-type="none">
						<?php 
						$conn = dbConnect();
						$sql = "select * from reftable where description = 'Sub Category Revenue Billing'";
						$result = $conn->query($sql);
						while($row = $result->fetch_assoc()){
							$refName = $row["refName"];
							$category = $row["category"];
							echo "<input name=$refName value='0' type='hidden'>";
							echo "<li><label><input class='form-check-input' type='checkbox' name=$refName value='$refName'> $category</label></li>";
						}   
						dbClose($conn); 
						?>
					</label>
				</div>
			</div>
		</div>
	</div>
<!-- Row 4 -->
	<div class="form-group row">
		<!-- Setup Payroll -->
		<div class="col-lg-3">
		<div class="form-check font-weight-bold primaryForm">
				<input class="form-check-input" type="checkbox" id="payrollOptions" onclick="showFunction('payrollOptionsCheck')">
				<label class="form-check-label" for="payrollOptions"> Payroll </label><br>
					<div class="listOptions" id="payrollOptionsCheck" style="display:none">
						<ul list-style-type="none">
						<?php 
						$conn = dbConnect();
						$sql = "select * from reftable where description = 'Sub Category Payroll'";
						$result = $conn->query($sql);
						while($row = $result->fetch_assoc()){
							$refName = $row["refName"];
							$category = $row["category"];
							echo "<input name=$refName value='0' type='hidden'>";
							echo "<li><label><input class='form-check-input' type='checkbox' name=$refName value='$refName'> $category</label></li>";
						}   
						dbClose($conn); 
						?>
					</div>
				</label>
			</div>
		</div>
		<!-- Setup Financials -->
		<div class="col-lg-4">
			<div class="form-check font-weight-bold primaryForm">
				<input class="form-check-input" type="checkbox" id="financialsOptions" onclick="showFunction('financialsOptionsCheck')">
					<label class="form-check-label" for="financialsOptions"> Financials </label><br>
					<div class="listOptions" id="financialsOptionsCheck" style="display:none">
						<ul list-style-type="none">
						<?php 
						$conn = dbConnect();
						$sql = "select * from reftable where description = 'Sub Category Financials'";
						$result = $conn->query($sql);
						while($row = $result->fetch_assoc()){
							$refName = $row["refName"];
							$category = $row["category"];
							echo "<input name=$refName value='0' type='hidden'>";
							echo "<li><label><input class='form-check-input' type='checkbox' name=$refName value='$refName'> $category</label></li>";
						}   
						dbClose($conn); 
						?>
					</label>
				</div>
			</div>
		</div>
		<!-- Setup Additional Options -->
		<div class="col-lg-4">
			<div class="form-check font-weight-bold primaryForm">
				<input class="form-check-input" type="checkbox" id="additionalOptions" onclick="showFunction('additionalOptionsCheck')">
				<label class="form-check-label" for="additionalOptions"> Additional Options </label><br>
					<div class="listOptions" id="additionalOptionsCheck" style="display:none">
						<ul list-style-type="none">
						<?php 
						$primary = array("Financials", "1099", "Accounts Payable", "Accounts Receivable", "Bank Reconciliation", 
						"Check Stub", "Payroll", "Revenue Billing");
						$conn = dbConnect();
						$sql = "select * from reftable where description = 'Primary Category'";
						$result = $conn->query($sql);
						while($row = $result->fetch_assoc()){
							$refName = $row["refName"];
							$category = $row["category"];
							if (!in_array($category, $primary)){
								if (!in_array( $refName, $primary))
									echo "<input name=$refName value='0' type='hidden'>";
									echo "<li><label><input class='form-check-input' type='checkbox' name=$refName value='$refName'> $category</label></li>";
							}
						}   
						dbClose($conn); 
						?>
					</label>
				</div>
			</div>
		</div>
	</div>

	<div class="row" >

	<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save Client Services">
	</div>

</form>
</div>
<h4 id="result"></h4>




<?php


if(isset($_POST["submit"]))
{
// 	Company Name
	$company_name = $_POST['companyName'];
// 	Stand Alone
	$invoicing = $_POST['invoicing'];
	$land_system = $_POST['land_system'];
	$purchase_order = $_POST['purchase_order'];
	$service_ticket = $_POST['service_ticket'];
	$time_entry = $_POST['time_entry'];
//	Account Payable
	$ap = "Accounts Payable";
	$enter_ap = $_POST['enter_ap'];
	$approve_ap = $_POST['approve_ap'];
	$cut_checks = $_POST['cut_checks'];
//	Account Receivable
	$ar = "Accounts Receivable";
	$mail_statements = $_POST['mail_statements'];
	$reach_out_to_vendors = $_POST['reach_out_to_vendors'];
	$deposit_checks = $_POST['deposit_checks'];
//	Bank Reconciliation
	$br = "Bank Reconciliation";
	$access_to_online_banking = $_POST['access_to_online_banking'];
	$one_bank_account = $_POST['one_bank_account'];
	$multiple_bank_accounts = $_POST['multiple_bank_accounts'];
//	1099
	$ten = "1099";
	$mail_off = $_POST['mail_off'];
	$ninety_nine_transmit = $_POST['ninety_nine_transmit'];
//	Check Stubs
	$cs = "Check Stubs";
	$enter_individual_stubs = $_POST['enter_individual_stubs'];
	$enter_single_stub = $_POST['enter_single_stub'];
//	Revenue Billing
	$rev = "Revenue Billing";
	$severance_tax_filing = $_POST['severance_tax_filing'];
	$distribute_revenue = $_POST['distribute_revenue'];	
// 	Payroll
	$pay = "Payroll";
	$entering_payroll = $_POST['entering_payroll'];
	$paying_employees = $_POST['paying_employees'];
	$w2_mailing = $_POST['w2_mailing'];
	$w2_transmit = $_POST['w2_transmit'];
	$quarterly_filings = $_POST['quarterly_filings'];
//	Financials
	$fin = "Financials";
	$monthly_financials = $_POST['monthly_financials'];
	$quarterly_financials = $_POST['quarterly_financials'];
	$annually_financials = $_POST['annually_financials'];
	$budget = $_POST['budget'];
	

	$conn = dbConnect();
//	Accounts Payable
	if ($enter_ap != '0' && $enter_ap != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$ap', '$enter_ap')";
		$result = $conn->query($sql);	}
	if ($approve_ap != '0' && $approve_ap != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$ap', '$approve_ap')";
		$result = $conn->query($sql);	}
	if ($cut_checks != '0' && $cut_checks != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$ap', '$cut_checks')";
		$result = $conn->query($sql);	}

//	Accounts Receivable
	if ($mail_statements != '0' && $mail_statements != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$ar', '$mail_statements')";
		$result = $conn->query($sql);	}
	if ($reach_out_to_vendors != '0' && $reach_out_to_vendors != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$ar', '$reach_out_to_vendors')";
		$result = $conn->query($sql);	}
	if ($deposit_checks != '0' && $deposit_checks != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$ar', '$deposit_checks')";
		$result = $conn->query($sql);	}

//	Bank Reconciliation
	if ($access_to_online_banking != '0' && $access_to_online_banking != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$br', '$access_to_online_banking')";
		$result = $conn->query($sql);	}
	if ($one_bank_account != '0' && $one_bank_account != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$br', '$one_bank_account')";
		$result = $conn->query($sql);	}
	if ($multiple_bank_accounts != '0' && $multiple_bank_accounts != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$br', '$multiple_bank_accounts')";
		$result = $conn->query($sql);	}
//	1099
	if ($mail_off != '0' && $mail_off != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$ten', '$mail_off')";
		$result = $conn->query($sql);	}
	if ($ninety_nine_transmit != '0' && $ninety_nine_transmit != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$ten', '$ninety_nine_transmit')";
		$result = $conn->query($sql);	}
//	Check Stubs
	if ($enter_individual_stubs != '0' && $enter_individual_stubs != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$cs', '$enter_individual_stubs')";
		$result = $conn->query($sql);	}
	if ($enter_single_stub != '0' && $enter_single_stub != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$cs', '$enter_single_stub')";
		$result = $conn->query($sql);	}
//	Revenue Billing
	if ($severance_tax_filing != '0' && $severance_tax_filing != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$rev', '$severance_tax_filing')";
		$result = $conn->query($sql);	}
	if ($distribute_revenue != '0' && $distribute_revenue != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$rev', '$distribute_revenue')";
		$result = $conn->query($sql);	}
// 	Entering Payroll
	if ($entering_payroll != '0' && $entering_payroll != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$pay', '$entering_payroll')";
		$result = $conn->query($sql);	}
	if ($paying_employees != '0' && $paying_employees != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$pay', '$paying_employees')";
		$result = $conn->query($sql);	}
	if ($w2_mailing != '0' && $w2_mailing != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$pay', '$w2_mailing')";
		$result = $conn->query($sql);	}
	if ($w2_transmit != '0' && $w2_transmit != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$pay', '$w2_transmit')";
		$result = $conn->query($sql);	}
	if ($quarterly_filings != '0' && $quarterly_filings != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$pay', '$quarterly_filings')";
		$result = $conn->query($sql);	}
//	Financials
	if ($monthly_financials != '0' && $monthly_financials != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$fin', '$monthly_financials')";
		$result = $conn->query($sql);	}
	if ($quarterly_financials != '0' && $quarterly_financials != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$fin', '$quarterly_financials')";
		$result = $conn->query($sql);	}
	if ($annually_financials != '0' && $annually_financials != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$fin', '$annually_financials')";
		$result = $conn->query($sql);	}
	if ($budget != '0' && $budget != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', '$fin', '$budget')";
		$result = $conn->query($sql);	}

//	Stand Alone
	if ($invoicing != '0' && $invoicing != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', 'Invoicing', '$invoicing')";
		$result = $conn->query($sql);	}
	if ($land_system != '0' && $land_system != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', 'Land System', '$land_system')";
		$result = $conn->query($sql);	}
	if ($purchase_order != '0' && $purchase_order != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', 'Purchase Order', '$purchase_order')";
		$result = $conn->query($sql);	}
	if ($service_ticket != '0' && $service_ticket != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', 'Service Ticket', '$service_ticket')";
		$result = $conn->query($sql);	}
	if ($time_entry != '0' && $time_entry != null){
		$sql ="INSERT INTO testapp VALUES (NULL, '$company_name', 'Time Entry', '$time_entry')";
		$result = $conn->query($sql);	}
	
	dbClose($conn); 
}
	
?>
<?php require("./footer.html"); ?>