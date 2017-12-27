<?php include"conf.php"; 

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product filter in php</title>

    <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

  

    <!-- Page Content -->
    <div class="container" style="padding-top:2%;" >

        <div class="row">
            <div class="col-md-3">
                <p class="lead">Product filter</p>
				
				<div class="list-group">
                    <h3>Price</h3>
                    <input type="hidden" class="price1" value="0" >
                    <input type="hidden" class="price2" value="3000"  >
                    <p id="priceshow"></p>
                    <div id="slider-range"></div>
				
                </div>
				
                <div class="list-group">
                    <h3>Colour</h3>
                    <?php 
                        $query = "select distinct(product_color) from product where product_status = '1'";  
                        $rs = mysql_query($query,$conn) or die("Error : ".mysql_error());
                        while($color_data = mysql_fetch_assoc($rs)){
                    
                    ?>
                        <a href="javascript:void(0);" class="list-group-item"> 
                        <input type="checkbox" class="item_filter colour" value="<?php echo $color_data['product_color']; ?>">
                        &nbsp;&nbsp; <?php echo $color_data['product_color']; ?></a>
                    <?php } ?>	
                </div>
				
				
				<div class="list-group">
                    <h3>Brand</h3>
                    <?php 
                        $query = "select distinct(product_brand) from product where product_status = '1'";  
                        $rs = mysql_query($query,$conn) or die("Error : ".mysql_error());
                        while($brand_data = mysql_fetch_assoc($rs)){
                    
                    ?>
                        <a href="javascript:void(0);" class="list-group-item"> 
                        <input type="checkbox" class="item_filter brand" value="<?php echo $brand_data['product_brand']; ?>" >
                        &nbsp;&nbsp; <?php echo $brand_data['product_brand']; ?></a>
                    <?php } ?>	
                </div>
				
				<div class="list-group">
                    <h3>Size</h3>
                    <?php 
                        $query = "select distinct(product_size) from product where product_status = '1'";  
                        $rs = mysql_query($query,$conn) or die("Error : ".mysql_error());
                        while($size_data = mysql_fetch_assoc($rs)){
                    
                    ?>
                        <a href="javascript:void(0);" class="list-group-item"> 
                        <input type="checkbox" class="item_filter size" value="<?php echo $size_data['product_size']; ?>"  >
                        &nbsp;&nbsp; <?php echo $size_data['product_size']; ?></a>
                    <?php } ?>	
                </div>
				
				
            </div>

            <div class="col-md-9">

                
                <div class="row product-data"  >
                  
				  <?php 
				    $query = "select * from product where product_status = '1'"; 
                      
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
                    
                    
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; <a href="http://313s.com">313s</a> 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <!-- <script src="js/jquery.js"></script> -->
<style>
#loaderpro{text-align:center; background: url('loader.gif') no-repeat center; height: 150px;}
</style>
	<script>
	var colour,brand,size;
	$(function(){
		$('.item_filter').click(function(){
			$('.product-data').html('<div id="loaderpro" style="" ></div>');
		
			 colour = multiple_values('colour');
			 brand  = multiple_values('brand');
			 size   = multiple_values('size');
			
            $.ajax({
				url:"ajax.php",
				type:'post',
				data:{colour:colour,brand:brand,size:size,sprice:$(".price1" ).val(),eprice:$( ".price2" ).val()},
                
                
				success:function(result){
					$('.product-data').html(result);
				}
			});
		});
		
	});
	
	
	function multiple_values(inputclass){
		var val = new Array();
		$("."+inputclass+":checked").each(function() {
		    val.push($(this).val());
		});
		return val;
	}
	
	
  $(function() {
		$( "#slider-range" ).slider({
		  range: true,
		  min: 0,
		  max: 3000,
		  values: [ 100, 3000 ],
		  slide: function( event, ui ) {
			$( "#priceshow" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			$( ".price1" ).val(ui.values[ 0 ]);
			$( ".price2" ).val(ui.values[ 1 ]);
			$('.product-data').html('<div id="loaderpro" style="" ></div>');
			 colour = multiple_values('colour');
			 brand  = multiple_values('brand');
			 size   = multiple_values('size');
            $.ajax({
				url:"ajax.php",
				type:'post',
				data:{colour:colour,brand:brand,size:size,sprice:ui.values[ 0 ],eprice:ui.values[ 1 ]},
				success:function(result){
					$('.product-data').html(result);
				}
			});
		  }
		});
		
		$( "#priceshow" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
		 " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    });	
	
</script>
	
	
    <!-- Bootstrap Core JavaScript -->
   <!-- <script src="js/bootstrap.min.js"></script> -->

</body>

</html>
