<?php

              // include("includes/session_file.php");
              //include('includes/connection2.php');

              //$id=$_GET['id'];

              	 

$html = '
<h1 style="text-align:center">Tax Invoice</h1>


<table style="height:150px; width:100%" border="1">
<tr>
    <td><img src="iTech.png" alt="Smiley face" style="heigth:70; width:70px"></td>
   
    <td align="right"><h2>ITECH NETWORK SOLUTIONS</h2><h4>PMC CO.:9, F:128, <br> Op. MG School Near Swargate,<br> Ghorpade Peth, Pune-411042 <br>Email : itech.network@hotmail.com <br> Mobile : 9823251539 <br> Phone : 202 26451539</h4></td>       
</tr>
</table>
<table style="float: left; width: 100mm;" border="1">
<tbody>
	<tr>
		<td style="width: 40%; text-align:center" colspan="6" ><b>Bill to Party</b></td>
		<td colspan="3"><b>Invoice No</b></td>
		<td colspan="2"><b></b></td>
	</tr>
	<tr>
		<td style="width: 40%;" colspan="6"><b>Name:</b></td>
		<td colspan="3"><b>Invoice Date</b></td>
		<td colspan="2"><b></b></td>
	</tr>
	<tr>
		<td style="width: 40%;" colspan="6" rowspan="2"><b>Address:</b></td>
		<td colspan="3"><b>Reverse Charge (Y/N)</b></td>
		<td colspan="2"><b></b></td>
	</tr>
	<tr>
		<td colspan="3"><b>P.O. No.</b></td>
		<td colspan="2"><b></b></td>
	</tr>
	<tr>
		<td style="width: 40%;" colspan="6"><b>GSTIN</b></td>
		<td colspan="3"><b>P.O. Date</b></td>
		<td colspan="2"><b></b></td>
	</tr>
	<tr>
		<td style="width: 30%;" colspan="5"><b>State: MAHARASTRA </b></td>
		<td colspan="1"><b>Code: 27</b></td>
		<td colspan="3"><b>Date Of Supply</b></td>
		<td colspan="2"><b></b></td>
	</tr>
	<tr>
		<td style="width: 40%; text-align:center" colspan="6"><b> Ship to Party</b></td>
		<td colspan="3"><b>Place Of Supply</b></td>
		<td colspan="2"><b></b></td>
	</tr>
	<tr>
		<td style="width: 40%;" colspan="6"><b>Name:</b></td>
		<td colspan="3"><b>Transport Mode</b></td>
		<td colspan="2"><b></b></td>
	</tr>
	<tr>
		<td style="width: 40%;" colspan="6" rowspan="2"><b>Address:</b></td>
		<td colspan="3"><b>Vehicle No.</b></td>
		<td colspan="2"><b></b></td>
	</tr>
	<tr>
		<td colspan="3"><b>Warranty</b></td>
		<td colspan="2"><b>Strictly from Manufacturer </b></td>
	</tr>
	<tr>
		<td style="width: 40%;" colspan="6"><b>GSTIN</b></td>
		<td colspan="3" rowspan="2"><b>State: </b></td>
		<td colspan="2" rowspan="2"><b>Code: </b></td>
	</tr>
	<tr>
		<td style="width: 30%;" colspan="5" ><b>State: MAHARASTRA </b></td>
		<td colspan="1"><b>Code: 27</b></td>
	</tr>

			<tr class=" color_change">
			    <td style="width: 35px; text-align:center"><b>S.No.</b></td>
			    <td style="text-align:center;"><b>Product Description</b></td>
			    <td style="text-align:center"><b>HSN/Service Code</b></td>
			    <td style="text-align:center; width: 60px;"><b>Quantity</b></td>
			    <td style="text-align:center; width: 80px;"><b>Rate</b></td>
			    <td style="text-align:center"><b>AMOUNT</b></td>
			     <td colspan="2" style="text-align:center; width: 150px;"><b>SGST</b></td>
			    <td colspan="2" style="text-align:center; width: 150px;"><b>CGST</b></td>
			    <td style="text-align:center"><b>Total</b></td>
			</tr>
			<tr class=" color_change">
		      	<td></td>
		        <td></td>
		        <td></td>
		        <td></td>
		        <td></td>
		        <td></td>
		      	<td style="text-align:center; width: 80px;"><b>Rate (%)</b></td>
	            <td style="text-align:center; width: 80px;"><b>Amount</b></td>
	            <td style="text-align:center; width: 80px;"><b>Rate (%)</b></td>
	            <td style="text-align:center; width: 80px;"><b>Amount</b></td>
	            <td></td>
			</tr>
			
			
					<tr>
				    	<td><span ></span></td>
				   	 	<td></td>
				   	 	<td></td>
				   	 	<td></td>
				   	 	<td></td>
				   	 	<td></td>
				   	 	<td></td>
				   	 	<td></td>
				   	 	<td></td>
				   	 	<td></td>
				   	 	<td></td>
				  	</tr>
			</tbody>
		  <tfoot> 
			<tr class=" color_change">  
				<td colspan="3" style="text-align:center" ><b>Total</></td>  
				<td style="text-align:center"><span> </span></td>  
				<td style="text-align:center"></td>  
				<td style="text-align:center"><span> </span></td>  
				<td style="text-align:center"> </td>
				<td style="text-align:center"><span> </span></td> 
				<td style="text-align:center"> </td> 
				<td style="text-align:center"><span> </span></td>  
				<td style="text-align:center"><span></td>   
			</tr>
			<tr> 
				<td colspan="5" rowspan="2"><b>Amount In Words:</b></td>  
				<td colspan="5"><b>Total Amount before Tax</b></td> 
				 
				<td style="text-align:center;" ><b>200</b></td> 
			</tr>
			<tr>  
				<td colspan="5"><b>Add: SGST</b></td> 
				 
				<td style="text-align:center;" ><b></b></td> 
			</tr>
			<tr>  
				 <td colspan="5" rowspan="4" style="text-align:center"></td>  
				<td colspan="5"><b>Add: CGST</b></td>
				<td style="text-align:center;" ></span><b></b></td>  
			</tr>
			<tr>  
				 
				<td colspan="5"><b>Rounding off</b></td>
				<td style="text-align:center;" ><b></b></td>  
			</tr>
			<tr>  
				 
				<td colspan="5"><b>Total Tax Amount</b></td>
				<td style="text-align:center;" ><b></b></td>  
			</tr>
			<tr>  
				 
				<td colspan="5"><b>Total Amount after Tax:</b></td>
				<td style="text-align:center;" ><b></b></td>  
			</tr>
			<tr>  
				 <td colspan="5"><b>Bank Details: THE COSMOS CO-OP. BANK </b></td>
				<td colspan="5"><b>GST on Reverse Charge</b></td>
				<td style="text-align:center;" ><b></b></td>  
			</tr>
			<tr>  
				 
				<td colspan="5" style="height:20px"><b>Bank A/C: 073100103995<b></td>  
				<td colspan="6" style="height:20px"><b></b></td>
			</tr>
			<tr>  
				 
				<td colspan="5" style="height:20px"><b>Bank IFSC: COSB0000073</b></td>  
				<td colspan="6" style="height:20px"><b>For iTech Network Solution</b></td>
			</tr>
			<tr>  
				 
				<td colspan="5" rowspan="4" style="text-align: justify;"><b>Term & Conditions:</b> Goods once sold will not be taken back. The product carry no warranty. Whatever from us. Warranty is from product principles if any. Our responsibility cases when goods leave our office no complaints will be entertained on short of material/brackage once it leaves our premises, bounced cheque attract bounces charges plus interest @ 24% per annum will be charged, if unpaid within 10 days of invoice date, ownership date, ownership of item invoiced will only transfer after receipt of full payment. </td>  
				<td colspan="6" rowspan="4"><b><br><br><br><br><br><br><br><br><br>Authorised Signatory</b></td>
			</tr>
			<tr>  
				   
				<td style=""><b></b></td>
			</tr>
			<tr>  
				  
				<td style=""><b></b></td>
			</tr>
			<tr>  
				  
				<td style=""><b></b></td>
			</tr>
			<tr>  
				 
				<td colspan="5" rowspan="4" style="text-align: justify;">I/We certify that our registration certificate under the <b>GST Act 2017 </b> is in force on the date on which the supply of goods specified in this Tax Invoice is mage by me/us & the trasaction of supply covered by this Tax Invoice had been effected by me/us & it shall be accounted for in the turnover of supplies while filling opf return & the due to tax if any payable on the supplies has paid or shall be paid. Further certified that the particulars gives above are true and correct & the amount indicated represents the prices actually charged and that there is no flow additional consideration directly or indirectly from the buyer. Interest @ 18% p.a. charged on all outstanding more than one month after invoice has been rendered.  </td>  
				<td colspan="6" rowspan="4" style="text-align: justify;"><b>Received above Material with all accessories in good condition <br><br><br><br><br><br><br><br><br><br><br><br> Name, stamp & Signature of Receiver. </b></td>
			</tr>
			<tr>  
				   
				<td style=""><b></b></td>
			</tr>
			<tr>  
				  
				<td style=""><b></b></td>
			</tr>
			<tr>  
				  
				<td style=""><b></b></td>
			</tr>

			<tr>  
				 
				<td colspan="5" rowspan="4" ><h4>PAYMENT DETAILS <br> <b>Bank Details:</b>____________________________ <br><b>Cheque No / Date:</b>__________________________</h4></td>  
				<td colspan="6" rowspan="4"><b>Cheque Amt:</b>_____________________________ <br> <b>CASH Recd. Rs.:</b>____________________________</td>
			</tr>
			<tr>  
				   
				<td style=""><b></b></td>
			</tr>
			<tr>  
				  
				<td style=""><b></b></td>
			</tr>
			<tr>  
				  
				<td style=""><b></b></td>
			</tr>


			</tfoot>   
	  	</table>





';

//==============================================================
//==============================================================
//==============================================================
include("../mpdf.php");

 // $mpdf=new mPDF('c','A4');
	// 	$mpdf->SetDisplayMode('fullwidth');
	// 	$mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list
	// 	$mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins
	// 	$mpdf->defaultheaderfontsize = 12;	/* in pts */
	// 	$mpdf->defaultheaderfontstyle = B;	/* blank, B, I, or BI */
	
include('mpdfstyletables.css');

$mpdf=new mPDF('c','A4','',20,31,15,10,40,8,8); 

$mpdf->autoPageBreak = false;

$mpdf->SetDisplayMode('fullwidth');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html,2);

$mpdf->Output('mpdf.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================


?>