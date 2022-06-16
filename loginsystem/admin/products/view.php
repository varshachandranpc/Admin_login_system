
<?php 
// Start session 
session_start(); 
 
$postData = $galData = array(); 
 
// Get session data 
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
 
// Get status message from session 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
} 
 
// Get posted data from session 
if(!empty($sessData['postData'])){ 
    $postData = $sessData['postData']; 
    unset($_SESSION['sessData']['postData']); 
} 
 
// Get gallery data 
if(!empty($_GET['id'])){ 
    // Include and initialize DB class 
    require_once 'DB.class.php'; 
    $db = new DB(); 
     
    $conditions['where'] = array( 
        'id' => $_GET['id'], 
    ); 
    $conditions['return_type'] = 'single'; 
    $galData = $db->getRows($conditions); 
} 
 
// Pre-filled data 
$galData = !empty($postData)?$postData:$galData; 
 
// Define action 
$actionLabel = !empty($_GET['id'])?'Edit':'Add'; 
?>

<?php include "../header.php" ?>
            <div class="row">
              <div class="col-md-12">
                <div class="content-panel">
                  <h1 class="text-label"><?php echo  $galData['product_name'];?></h1>
                   <hr>
                   <div class="mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            
              
                    <div class="col-md-6">
                        <div class="images p-3">
                            
                            <div class="text-center p-4 "> 
                      

<?php if(!empty($galData['images'])){ 
                foreach($galData['images'] as $row){ 
                    $defaultImage = !empty($row['file_name'])?'<img class="default-image" src="uploads/images/'.$row['file_name'].'" alt="" />':''; 
                    
                     }} 
                
            ?>


<?php echo $defaultImage; ?>
                                 
                            </div>

                            
                            <div class="thumbnail text-center display-img"> 
                            <?php if(!empty($galData['images'])){
                        
                        foreach($galData['images'] as $imgRow){
                        ?>
                                <img onclick="change_image(this)" src="uploads/images/<?php echo $imgRow['file_name']; ?>" width="40">
                                <?php }} ?>   
                           </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1"> <a href="manage-products.php" >Back</a></span> </div>
                            </div>
                            <div class="mt-4 mb-3">
                                <h5 class="text-uppercase"><?php echo !empty($galData['product_name'])?$galData['product_name']:''; ?></h5>
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price"> $ <?php echo !empty($galData['product_price'])?$galData['product_price']:''; ?></span>
                                    <div class="ml-2"> <small class="dis-price">$59</small> <span>40% OFF</span> </div>
                                </div>
                            </div>
                            <p class="about"><?php echo !empty($galData['product_description'])?$galData['product_description']:''; ?></p>
                           
                            <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                        </div>
                    </div>
                </div>
            </div>   
         


        </div>   

      </div>
          
      <?php include "../footer.php" ?>



























