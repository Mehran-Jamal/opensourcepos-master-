	<div class="modal modal-solditem fade" id="tbl-payment" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document" style="margin-left:22%;">
    <div class="modal-content" style="width:750px;">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Select Invoice#</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#faf0f085;padding-right:0;margin-right:3px;">
			                   <table id="tblcourse" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                 <thead style="background:black;color:white;font-size:10px;">
    <tr>
	<th class="th-md" style="display:none;">ID# HIDDEN
      </th>
	<th class="th-md">Invoice#
      </th>
	<th class="th-md">customer
      </th>
 
	  <th class="th-md">item(s)
      </th>
	  	  <th class="th-md">Paid
      </th>
	  	  <th class="th-md">Balance
      </th>
	  	  <th class="th-md">Date
      </th> 
    </tr>
  </thead>
                  <tbody id="tblsoldcustomer">
				 <?php 
				 include_once('../database.php');
				$customername=0;
				 $sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge");
				 if(mysqli_num_rows($sql)>0)
				 {
					 while($row=mysqli_fetch_array($sql))
					 { 
				 $sql1=mysqli_query($conn,"SELECT * FROM tblcustomer WHERE customerId='".$row['customerId']."'");
				 while($row1=mysqli_fetch_array($sql1)){
					 $customername=$row1['fullname'];
				 }
				 
				 ?>
				 <tr>
				 <td style="display:none;"><?php echo $row['solditem_merge']?></td>
				 <td><?php echo $row['invoiceId'];?></td>
				 <td><?php echo $customername;?></td>
				 <td><?php echo $row['totalitem'];?></td>
				 <td><?php echo $row['amountdue'];?></td> 
				 <td><?php echo $row['balance'];?></td> 
				 <td><?php echo $row['solddate'];?></td> 
				 </tr>
				 <?php 		 
					 }
				 }
				 ?>
                  </tbody>
                   
                </table>

					
      </div>

 
    </div>
  </div>
</div>