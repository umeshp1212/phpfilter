<?php
include"conf.php"; 
$colour="";
$brand="";
$size="";
$eprice="";
$colour = isset($_REQUEST['colour'])?$_REQUEST['colour']:"";
$brand = isset($_REQUEST['brand'])?$_REQUEST['brand']:"";
$size = isset($_REQUEST['size'])?$_REQUEST['size']:"";
$sprice = isset($_REQUEST['sprice'])?$_REQUEST['sprice']:"";
$eprice = isset($_REQUEST['eprice'])?$_REQUEST['eprice']:"";

	     $query = "select * from product where product_status = '1'"; 
		 
		           //filter query start 
					  if(!empty($colour)){
						  $colordata =implode("','",$colour);
						  $query  .= " and product_color in('$colordata')"; 
					  }
					  
					   if(!empty($brand)){
						  $branddata =implode("','",$brand);
						  $query  .= " and product_brand in('$branddata')"; 
					  }
					  
					  if(!empty($size)){
						  $sizedata =implode("','",$size);
						  $query  .= " and product_size in('$sizedata')"; 
					  }
					  
					  if(!empty($sprice) && !empty($eprice)){
						  $query  .= " and product_price >='$sprice' and product_price <='$eprice'"; 
					  }
                      
				     $rs = mysql_query($query,$conn) or die("Error : ".mysql_error());
					 
					 while($product_data = mysql_fetch_assoc($rs)){
				  ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="image/<?php echo $product_data['product_image']; ?>" alt="">
                            <div class="caption">
                               
                                <p><strong><a href="#"><?php echo $product_data['product_name']; ?></a>
                                </strong></p>
								 <h4 style="text-align:center;" >$ <?php echo $product_data['product_price']; ?></h4>
                                <p>Color : <?php echo $product_data['product_color']; ?> &nbsp; &nbsp; &nbsp; &nbsp;  Brand : <?php echo $product_data['product_brand']; ?> </p>
								
								<p>Size : <?php echo $product_data['product_size']; ?> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quantity : <?php echo $product_data['product_quantity']; ?> </p>
								
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
					 <?php  } ?>