<!DOCTYPE html>
<html> 
<head> 
	<title>Loan Repayment Schedules Application</title>
		<!-- styling of the loan repayment schedules table and calculate again button starts -->
	<style>
		table{
			width:100%;
			border:none;
			font-weight: bold;
		}
		
		table tr th{
			background-color: aquamarine;
			height: 35px;
			font-size: 20px;
		}
		
		table tr td{
			text-align: right;
			font-size: 18px;
		}
		
		.calc_again{
			width: 165px;
			margin: 0 auto;
		}
		
		.calc_again a{
			background-color: #f44336;
			color: white;
			padding: 14px 25px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
		}
		
		.calc_again a:hover, .calc_again a:active {
			background-color: red;
		}
		
	</style>
	<!-- styling of the loan repayment schedules table and calculate again button ends -->
</head> 
<body> 
	<?php
		//Recieving the values from the form using POST method
		$loan_amount=$_POST['loan_amount']; 
		$annual_interest=$_POST['annual_interest']; 
		$no_of_loan_periods=$_POST['no_of_loan_periods']; 
		$instalment=$_POST['instalment']; 

		if (strcmp($instalment,"Payment in Monthly")==0){ 
		//Calculating the number of months if it is a monthly payment
			$months=$no_of_loan_periods * 12; 
			$pay_month="Month";
			//Printing the values passed. 
			print "Loan Amount = &pound;$loan_amount<br>"; 
			print "Interest = $annual_interest %<br>"; 
			print "Pay back Period = $instalment $months<br><br><br>"; 
			//Passing the values to the function for calculating the repayment schedules using the equal total payments method
			loan_payment_calc($months,$loan_amount,$annual_interest,$pay_month);
		}else{
			//assigning the years to calculate yearly payment
			$months=$no_of_loan_periods;
			$pay_month="Year";
			//Printing the values passed. 
			print "Loan Amount = &pound;$loan_amount<br>"; 
			print "Interest = $annual_interest %<br>"; 
			print "Pay back Period = $instalment $months<br><br><br>";
			//Passing the values to the function for calculating the repayment schedules using the equal total payments method
			loan_payment_calc($months,$loan_amount,$annual_interest,$pay_month);
		}
		
		function loan_payment_calc($months,$loan_amount,$annual_interest,$pay_month){
			echo '<table border="1">';
			echo '<tr><th>Payment in '.$pay_month.'</th><th>Payment Amount</th><th>Principal Amount Paid</th><th>Interest Amount Paid</th><th>Loan Outstanding Balanace</th></tr>';
			for ($i=0;$i<$months;$i++){ 
				//Calculating montly interest. 
				$interest1=$annual_interest / 100; 
				$interest2=$interest1 / 12;
				//Calculating the monthly/yearly Payment amount
				$payment=($interest2 * $loan_amount) * pow(1 + $interest2,$months) / (pow(1 + $interest2,$months) - 1);     
				$month=$i+1; 
				//Calculating the Principal paid amount
				$monthlyPayment=$payment/ pow(( 1 + $interest2),(1 + $months - $month));
				//Calculating the interest paid amount
				$monthlyInterestAmount=$payment - $monthlyPayment;
				//Calculating the outstanding Balanace
				$outstandingBal=(($monthlyInterestAmount/$interest2) - $monthlyPayment);
					echo '<tr><td>'.$month.'</td>';
					//Appending the values in table by rounding to 2 decimal values
					echo '<td>&pound;'.number_format($payment,2).'</td>';
					echo '<td>&pound;'.number_format($monthlyPayment,2).'</td>';
					echo '<td>&pound;'.number_format($monthlyInterestAmount,2).'</td>';
					echo '<td>&pound;'.number_format($outstandingBal,2).'</td>';
					echo '</tr>';	
			}
			echo '</table>';
		}
	?> 
	<br><div class="calc_again"><a href="index.php">Calculate again</a></div> 
</body> 
</html>