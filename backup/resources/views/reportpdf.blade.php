<table>
	<tr><td><a href="{{$edit_link}}"><button>Edit Report</button></a></td>
		<td><a href="{{$verify_link}}"><button>Verify Report</button></a></td>
	<tr>
	<tr>
		<td><strong>Name: </td></strong><td>{{$fullname}}</td>
	</tr>
	<tr>
		<td><strong>Address: </strong></td><td>{{$adress}}</td>
	</tr>
	<tr>
		<td><strong>Phone:</strong></td><td>{{$phone}}</td>
	</tr>
	<tr>
		<td><strong>Email: </strong></td><td>{{$phone}}</td>
	</tr>
	<tr>
		<td><strong>Refered By: </strong></td><td>{{$referedby}}</td>
	</tr>
	<?php  ?>
	<tr><td><strong>Driver Name</strong></td><td>{{ $drivername1}}</td></tr>
	<tr><td><strong>Driver Liecence</strong></td><td>{{ $licensenumber1}}</td></tr>
	<tr><td><strong>Driver Liecence Class</strong></td><td>{{$driverlicenseclass1}}</td></tr>
	<tr><td><strong>Driver Date Of Birth</strong></td><td>{{$dateofbirth1}}</td></tr>
	<?php if(isset($drivername2)){
		?>
			<tr><td><strong>Driver Name</strong></td><td>{{ $drivername2}}</td></tr>
			<tr><td><strong>Driver Liecence</strong></td><td>{{ $licensenumber2}}</td></tr>
			<tr><td><strong>Driver Liecence Class</strong></td><td>{{$driverlicenseclass2}}</td></tr>
			<tr><td><strong>Driver Date Of Birth</strong></td><td>{{$dateofbirth2}}</td></tr>
		<?php
	} ?>
	<?php if(isset($drivername3)){
		?>
			<tr><td><strong>Driver Name</strong></td><td>{{ $drivername3}}</td></tr>
			<tr><td><strong>Driver Liecence</strong></td><td>{{ $licensenumber3}}</td></tr>
			<tr><td><strong>Driver Liecence Class</strong></td><td>{{$driverlicenseclass3}}</td></tr>
			<tr><td><strong>Driver Date Of Birth</strong></td><td>{{$dateofbirth3}}</td></tr>
		<?php
	} ?>
	
	<tr>
		<td><strong>Truck Made Year: </strong></td><td>{{$truckmadeyear}}</td>
	</tr>
	<tr>
		<td><strong>Truck Brand Name: </strong></td><td>{{$truckbrandname}}</td>
	</tr>
	<tr>
		<td><strong>Truck Model: </strong></td><td>{{$truckmodel}}</td>
	</tr>
	<tr>
		<td><strong>Truck Purchase Cost: </strong></td><td>{{$truckpurchacecost}}</td>
	</tr>
	<tr>
		<td><strong>Truck Purchase Date: </strong></td><td>{{$datetruckpurchase}}</td>
	</tr>
	<tr>
		<td><strong>Truck Purchase Details: </strong></td><td>{{$truckdetails}}</td>
	</tr>
	<tr>
		<td><strong>Compnay Name: </strong></td><td>{{$compnayname}}</td>
	</tr>
	<tr>
		<td><strong>Compnay Address: </strong></td><td>{{$compnayadress}}</td>
	</tr>
	<tr>
		<td><strong>Plan Goods Distance: </strong></td><td>{{$planedriving}}</td>
	</tr>
	<tr>
		<td><strong>Plan Goods Type: </strong></td><td>{{$plangoods}}</td>
	</tr>
	<tr>
		<td><strong>Truck Most Stop Location: </strong></td><td>{{$locationtruckstop}}</td>
	</tr>
	<tr>
		<td><strong>Standared Covrage: </strong></td><td>{{$standardcoverage}}</td>
	</tr>
	<tr>
		<td><strong>Do you need Transport Cargo Insurance ?: </strong></td><td><?php if(isset($transportcargoinsurance)) { echo 'Yes'; } else { echo 'No'; } ?></td>
	</tr>
	<tr>
		<td><strong>Do you need gap insurance covering depreciation: </strong></td><td><?php if(isset($gapinsurance)) { echo 'Yes'; } else { echo 'No'; } ?></td>
	</tr>
	<tr>
		<td><strong>Do you need health insurance for driver: </strong></td><td><?php if(isset($healthinsurance)) { echo 'Yes'; } else { echo 'No'; } ?></td>
	</tr>
	<tr>
		<td><strong>Do you need Hospitalized cash coverage : </strong></td><td><?php if(isset($hospitalizedcoverage)) { echo 'Yes'; } else { echo 'No'; } ?></td>
	</tr>
	<tr>
		<td><strong>If company owned, do you need business liability?: </strong></td><td><?php if(isset($companyowned)) { echo 'Yes'; } else { echo 'No'; } ?></td>
	</tr>
	<tr>
		<td><strong>Collision</strong></td><td>{{$collision}}</td>
		<td><strong>Liabilty</strong></td><td>{{$liability}}</td>
		
	</tr>
	<tr>
		<td><strong>Comprehensive</strong></td><td>{{$comprehensive}}</td>
		<td><strong>accident Benefit</strong></td><td>{{$accidentBenefit}}</td>
	</tr>
	<tr>
		<td>Total</td><td>{{ $totalPrice}}</td>
	</tr>
</table>