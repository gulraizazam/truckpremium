
<table>
	<tr>
		<td><strong>Name: </td></strong><td>{{$data['fullname']}}</td>
	</tr>
	<tr>
		<td><strong>Address: </strong></td><td>{{$data['adress']}}</td>
	</tr>
	<tr>
		<td><strong>Phone:</strong></td><td>{{$data['phone']}}</td>
	</tr>
	<tr>
		<td><strong>Email: </strong></td><td>{{$data['phone']}}</td>
	</tr>
	<tr>
		<td><strong>Refered By: </strong></td><td>{{$data['referedby']}}</td>
	</tr>
		@for($i=1; $i<=$data['countdrivers']; $i++)
		<tr><td><strong>Driver Name</strong></td><td>{{ $data['drivername'.$i] }}</td></tr>
		<tr><td><strong>Driver Liecence</strong></td><td>{{$data['licensenumber'.$i]}}</td></tr>
		<tr><td><strong>Driver Liecence Class</strong></td><td>{{$data['driverlicenseclass'.$i]}}</td></tr>
		<tr><td><strong>Driver Date Of Birth</strong></td><td>{{$data['dateofbirth'.$i]}}</td></tr>
		@endfor
	<tr>
		<td><strong>Truck Made Year: </strong></td><td>{{$data['truckmadeyear']}}</td>
	</tr>
	<tr>
		<td><strong>Truck Brand Name: </strong></td><td>{{$data['truckbrandname']}}</td>
	</tr>
	<tr>
		<td><strong>Truck Model: </strong></td><td>{{$data['truckmodel']}}</td>
	</tr>
	<tr>
		<td><strong>Truck Purchase Cost: </strong></td><td>{{$data['truckpurchacecost']}}</td>
	</tr>
	<tr>
		<td><strong>Truck Purchase Date: </strong></td><td>{{$data['datetruckpurchase']}}</td>
	</tr>
	<tr>
		<td><strong>Truck Purchase Details: </strong></td><td>{{$data['truckdetails']}}</td>
	</tr>
	<tr>
		<td><strong>Compnay Name: </strong></td><td>{{$data['compnayname']}}</td>
	</tr>
	<tr>
		<td><strong>Compnay Address: </strong></td><td>{{$data['compnayadress']}}</td>
	</tr>
	<tr>
		<td><strong>Plan Goods Distance: </strong></td><td>{{$data['planedriving']}}</td>
	</tr>
	<tr>
		<td><strong>Plan Goods Type: </strong></td><td>{{$data['plangoods']}}</td>
	</tr>
	<tr>
		<td><strong>Truck Most Stop Location: </strong></td><td>{{$data['locationtruckstop']}}</td>
	</tr>
	<tr>
		<td><strong>Standared Covrage: </strong></td><td>{{$data['standardcoverage']}}</td>
	</tr>
	<tr>
		<td><strong>Do you need Transport Cargo Insurance ?: </strong></td><td><?php if(isset($data['transportcargoinsurance'])) { echo 'Yes'; } else { echo 'No'; } ?></td>
	</tr>
	<tr>
		<td><strong>Do you need gap insurance covering depreciation: </strong></td><td><?php if(isset($data['gapinsurance'])) { echo 'Yes'; } else { echo 'No'; } ?></td>
	</tr>
	<tr>
		<td><strong>Do you need health insurance for driver: </strong></td><td><?php if(isset($data['healthinsurance'])) { echo 'Yes'; } else { echo 'No'; } ?></td>
	</tr>
	<tr>
		<td><strong>Do you need Hospitalized cash coverage : </strong></td><td><?php if(isset($data['hospitalizedcoverage'])) { echo 'Yes'; } else { echo 'No'; } ?></td>
	</tr>
	<tr>
		<td><strong>If company owned, do you need business liability?: </strong></td><td><?php if(isset($data['companyowned'])) { echo 'Yes'; } else { echo 'No'; } ?></td>
	</tr>
	<tr>
		<td><strong>Collision</strong></td><td>{{$data['collision']}}</td>
		<td><strong>Liabilty</strong></td><td>{{$data['liability']}}</td>
		
	</tr>
	<tr>
		<td><strong>Comprehensive</strong></td><td>{{$data['comprehensive']}}</td>
		<td><strong>accident Benefit</strong></td><td>{{$data['accidentBenefit']}}</td>
	</tr>
	<tr>
		<td>Total</td><td>{{ $data['totalPrice'] }}</td>
	</tr>
</table>