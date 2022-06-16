
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
                    <h1 class="text-label"><?php echo $actionLabel; ?> Product</h1>
                     <hr>
    
    
                   
                         
                         <form  class="form-horizontal style-form"  method="post" action="postAction.php" enctype="multipart/form-data">
                      
                      
                        
                            <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Product Name</label>
                            <div class="col-sm-10 col-md-8">
                            <input type="text" name="product_name" required class="form-control" placeholder="Enter Product Name" value="<?php echo !empty($galData['product_name'])?$galData['product_name']:''; ?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Product Price</label>
                            <div class="col-sm-10 col-md-8">
                            <input type="number" name="product_price" required class="form-control" placeholder="Enter Product Price" value="<?php echo !empty($galData['product_price'])?$galData['product_price']:''; ?>" >
                            </div>
                        </div>
                            <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Product Description </label>
                            <div class="col-sm-10 col-md-8">
                            <textarea type="text" name="product_description" required  class="form-control" placeholder="Enter description" value="" >
                            <?php echo !empty($galData['product_description'])?$galData['product_description']:''; ?> </textarea>  </div>
                           
                        </div>
                        
                             <div class="form-group">
                            <label class="col-sm-2 col-sm-2  control-label" style="padding-left:40px;">Product Image </label>
                            <div class="col-sm-10 col-md-8">
                            <input type="file" name="images[]"  class="form-control" multiple>
                    <?php if(!empty($galData['images'])){
                        
                        foreach($galData['images'] as $imgRow){
                        ?>
                        <div class="gallery-img col-md-4"  style="padding-top:40px;">
                        
                            <div class="img-box thumbnail" id="imgb_<?php echo $imgRow['id']; ?>">
                                <img src="uploads/images/<?php echo $imgRow['file_name']; ?>">
                                <div class="caption">  <p><a href="javascript:void(0);" class="badge badge-danger" onclick="deleteImage('<?php echo $imgRow['id']; ?>')">delete</a></p></div>
                            </div>
                            
                        
                        </div>
                    <?php }} ?>
                            </div>
                        </div>

                        <div style="margin-left:100px;">
                         <a href="manage-products.php" class="btn btn-theme">Back</a>
                        <input type="hidden" name="id" value="<?php echo !empty($galData['id'])?$galData['id']:''; ?>">
                        <input type="submit" name="imgSubmit" class="btn btn-success" value="SUBMIT">
                    
                        </div>



                        </form>
                    </div>
                </div>
            </div>
				
	
    <script>
function deleteImage(id){
    var result = confirm("Are you sure to delete?");
    if(result){
        $.post( "postAction.php", {action_type:"img_delete",id:id}, function(resp) {
            if(resp == 'ok'){
                $('#imgb_'+id).remove();
                alert('The image has been removed from products');
            }else{
                alert('Some problem occurred, please try again.');
            }
        });
    }
}
</script>

<?php include "../footer.php" ?>