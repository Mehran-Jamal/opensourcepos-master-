	<script src="../plugins/export/src/jquery.table2excel.js"></script>
	<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	<script>
$(document).ready(function(){ 
function doConfirm(msg, yesFn, noFn)
{
    var confirmBox = $("#confirmBox");
    confirmBox.find(".message").text(msg);
    confirmBox.find(".yes,.no").unbind().click(function()
    {
        confirmBox.hide();
    });
    confirmBox.find(".yes").click(yesFn);
    confirmBox.find(".no").click(noFn);
    confirmBox.show();
}

	$("#tblactivity tbody").on('click', 'tr', function(e){
		e.stopImmediatePropagation();
		var row=$(this).closest("tr"); //getting the selected row of table
	    var invoiceid=row.find("td:eq(0)").text(); //getting the row column selected

	    	$('#tblitemlist').load('itemlist.php',{'invoiceid':invoiceid,});	
		$('.modal-update').modal("show"); 

});	

 $("#tblactivity tbody").on('click', '#click-return', function(e){
		e.stopImmediatePropagation();
		var row=$(this).closest("tr"); //getting the selected row of table 
		var invoiceid=row.find("td:eq(0)").text();
		 
	    window.location.href="../Return-Sale/index.php?invoiceid="+invoiceid;

});	



 
$('#edit-purchase').on('click', function(){
	var purchaseid = $('#purchaseid').val();
	$.ajax
	({
		url:'submit-edit-purchase.php',
		type:'POST',
		data:
		{
			'updating':1,
			purchaseid:purchaseid
		},
		success:function()
		{
				window.location.href="../edit-purchase/index.php?purchaseid="+purchaseid;
		},
		error:function(data){
			alert('Something went error');
		}
		
	});
 
});
 

});
</script>
<style>
.table tr {
    cursor: pointer;
}
</style>
	 <div class="content-wrapper"  >
	 
										 
		<!-- Content Header (Page header) -->
		<section class="content-header" style="padding:1px;">
		  <div class="container-fluid">
			<div class="row mb-2">
			  
			  <div class="col-sm-12">
				<ol class="breadcrumb float-sm-left">
				  <li class="breadcrumb-item"><a href="#">Home</a></li>
				  <li class="breadcrumb-item active">Solditem list</li>
				</ol>
			  </div>
			</div>
		  </div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
	 
		  <div class="container-fluid" style="margin-left:0px;">
			<div class="row" >
			  <div class="col-12" style="margin:1px;padding:1px;">
				<div class="card">
				  <div class="card-header" style="padding:0px;">

	 
		<div class="navbar navbar-expand navbar-white navbar-light" style="padding:1px;margin:0px;">
		<h5 style="margin-left:2%; 	">Sold list Management </h5>
	 
		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
	 

		  <!-- Messages Dropdown Menu -->
		  <li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" style=" margin:1px;color:rgb(23, 162, 184);border-radius:2px;font-size:20px; ">
			  <i class="fas fa-bars"></i>
			  
			</a>
			<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="text-align:center;">
			  
		   
			 
		   
			  <a href="addpurchase.php" class="dropdown-item"><span class="fas fa-plus-circle"></span> Add Purchase</a>
				  <div class="dropdown-divider"></div>
			  <a href="#" class="dropdown-item " id="exportexcel">Export(CSV)</a>
			</div>
		  </li>
		  
		</ul>
	  </div>
				  </div>
				  <!-- /.card-header -->
				  <div class="card-body">
								<div class="row mb-2">
							<div class="col-sm-10">
						 
 <div class="card-tools float-left" style="margin-left:1.0rem;">
					  <div class="input-group input-group-sm" style="width:100%;padding-top:0.5rem;">
						   
						  <input type="text" name="table_search" class="form-control float-right" placeholder="Search name here">

						<div class="input-group-append">
						  <button type="submit" class="btn btn-default">
							<i class="fas fa-search"></i>
						  </button>
						</div>
				
					  
					  </div>
					</div>
					 
							</div>
										
							</div>
					 <?php include('tablesolditem.php');?>
				  </div>
				  <!-- /.card-body -->
				</div>
				<!-- /.card -->

	  
			  </div>
			  <!-- /.col -->
			</div>
			<!-- /.row -->
		  </div>
		  <!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	  </div>
 <!--MODAL EDIT ITEM(S) -->
        <div class="modal modal-update fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="height:5px;background-color:white;">
               <h6 class="" style="color:gray;margin-bottom:3px;">Sale list</h6>
            </div>
            <div class="modal-body" id="itemlist">
			<input type="hidden" id="Solditemid" value="">
				 
				 
				   <table   class="table table-bordered table-hover" id="tablesolditem">
                  <thead style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:0;font-family:verdana;">
                 <tr>
                    <th class="p-1" style="display: none;font-weight:400;">hidden(productid)</th>
                    <th class="p-1"  style="border:none;font-weight:400;">#</th> 
                    <th class="p-1"  style="border:none;font-weight:400;">Item code</th> 
                    <th class="p-1"  style="border:none;font-weight:400;" >productname</th>   
                    <th  class="p-1" style="border:none;font-weight:400;">Price</th>    
                    <th  class="p-1" style="border:none;font-weight:400;">Qty</th>    
                    <th  class="p-1" style="border:none;font-weight:400;">Sub total</th>     
                  </tr>
                  </thead>
                  <tbody id="tblitemlist"> 
                  </tbody>
                  
                </table>
				
			 <div class="modal-footer">
               
               <input type="button" id="edit-purchase" name="submit" data-dismiss="modal"  class="col-md-4 btn btn-default btn-save" value="Print">   
			  
			  <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            </div>
            </div>
      
     
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
 <!--END OF EDIT ITEM(S) -->
<!--MODAL PAYMENT-->
<?php include('payment.php');?>
<!--END OFMODAL PAYMENT-->