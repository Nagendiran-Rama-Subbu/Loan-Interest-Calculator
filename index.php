<!DOCTYPE html>
<html>
	<head>
		<title>Loan Repayment Schedules Application</title>
		<!-- styling of the loan repayment schedules application form starts -->
		<style>
			html {
			  height: 100%;
			}
			
			body {
			  margin:0;
			  padding:0;
			  font-family: sans-serif;
			  background: linear-gradient(#03AA98, #243b55);
			}

			select{
				border: none;
				width: 100%;
				height: 30px;
				background-color: #0D1621!important;
				color: white;
				margin-top: 10px;
			}
			
			label{
				color:white;
			}
			
			.loan-calc {
			  position: absolute;
			  top: 50%;
			  left: 50%;
			  width: 400px;
			  padding: 40px;
			  transform: translate(-50%, -50%);
			  background: rgba(0,0,0,.5);
			  box-sizing: border-box;
			  box-shadow: 0 15px 25px rgba(0,0,0,.6);
			  border-radius: 10px;
			}

			.loan-calc h2 {
			  margin: 0 0 30px;
			  padding: 0;
			  color: #fff;
			  text-align: center;
			}

			.loan-calc .loan-input-fields {
			  position: relative;
			}

			.loan-calc .loan-input-fields input {
			  width: 100%;
			  padding: 10px 0;
			  font-size: 16px;
			  color: #fff;
			  margin-bottom: 30px;
			  border: none;
			  border-bottom: 1px solid #fff;
			  outline: none;
			  background: transparent;
			}
			.loan-calc .loan-input-fields label {
			  position: absolute;
			  top:0;
			  left: 0;
			  padding: 10px 0;
			  font-size: 16px;
			  color: #fff;
			  pointer-events: none;
			  transition: .5s;
			}

			.loan-calc .loan-input-fields input:focus ~ label,
			.loan-calc .loan-input-fields input:valid ~ label {
			  top: -25px;
			  left: 0;
			  color: #03e9f4;
			  font-size: 12px;
			}
			
			.submit-btn input[type=submit]{
				background-color: #03AA98;
				border: none;
				color: white;
				padding: 16px 32px;
				text-decoration: none;
				margin: 20px 0px;
				cursor: pointer;
			}
			
			.submit-btn input[type=submit]:hover, .submit-btn input[type=submit]:active {
			background-color: #20475C;
		}
		
		</style>
		<!-- styling of the loan repayment schedules application form ends -->
	</head>
<body>
	<div class="loan-calc">
		<h2>Loan Repayment Schedules Application</h2>
		<form method="post" action="loan-calculation.php">
			<div class="loan-input-fields">
				<input type="text" name="loan_amount" required="">
				<label>Loan Amount *</label>
			</div>
			<div class="loan-input-fields">
				<input type="text" name="no_of_loan_periods" required="">
				<label>Pay Back Period *</label>
			</div>
			<div class="loan-input-fields">
				<input type="text" name="annual_interest" required="">
				<label>Rate Of Interest *</label>
			</div>
			<div>
				<label>Pay Back Period Options *</label>
				<select name="instalment" required="">
				<option value="">---Select any one option---</option>
				<option value="Payment in Monthly">Payment in Monthly</option>
				<option value="Payment in Yearly">Payment in Yearly</option>
				</select>
			</div>
			<div class="submit-btn">
				<input type="submit" value="Submit">
			</div>
		</form>
	</div>
</body>
</html>