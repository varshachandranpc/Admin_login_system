<?php
session_start();
// Include and initialize DB class 
require_once 'DB.class.php'; 


$db = new DB();
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

 
 
// Fetch the gallery data 
$images = $db->getRows(); 
 
// Get session data 
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
 
// Get status message from session 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
} 
?>
 <?php include "../header.php" ?>
				<div class="row">
		
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4  class="btn-style">
                                <i class="fa fa-angle-right"></i> All Products Details  
                               <a href="addEdit.php" class="btn btn-success pull-right" >
                                    <i class=" fa fa-angle-right"></i> New Product</a></h4>
                                 
      
                         <!-- Add link -->
                        
                             
                          

	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th class="hidden-phone">Product Name</th>
                                  <th>Product Description</th>
                                  <th>Product Price</th>
                                  <th>Product Image</th>
                                  <th>Created On</th>
                              </tr>
                              </thead>
                              <tbody>
            <?php 
            if(!empty($images)){ $i=0; 
                foreach($images as $row){ $i++; 
                    $defaultImage = !empty($row['default_image'])?'<img src="uploads/images/'.$row['default_image'].'" alt="" width="70" />':''; 
                    
                    
                
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                
                <td><?php echo substr( $row['product_description'],0,20); ?></td>
                <td><?php echo $row['product_price']; ?></td>
                <td><?php echo $defaultImage; ?></td>
                <td><?php echo $row['created']; ?></td>
                
                <td>
                    <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">view</a>
                    <a href="addEdit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">edit</a>
                    <a href="postAction.php?action_type=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?')?true:false;">delete</a>
                </td>
            </tr>
            <?php } }else{ ?>
            <tr><td colspan="6">No Products found...</td></tr>
            <?php } ?>
        </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <?php } ?>
              <?php include "../footer.php" ?>