<?php  require_once 'includes/session/pagesession.php'; ?>
<?php require_once 'includes/widgets/body/widgets/secure.php'; ?>
<?php require_once 'includes/widgets/header.php'; ?>
<?php require_once 'includes/widgets/body/navigation.php'; ?>
<link rel="stylesheet" href="includes/widgets/body/widgets/panel.css">

<?php
	if(isset($_GET['id'])) {
	$id = $_GET['id'];
?>

<div class="row resetTop">



<header class="w3-container w3-center w3-padding-32"> 
	<?php
	    $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id = $id ");
	    $stmt->execute(array());
	    
	    $users=$stmt->fetchAll(PDO::FETCH_OBJ);

	    foreach ($users as $user) {

	        ?>
				<h1><b><?php  echo $user->shopname; ?></b></h1>
				<p>Welcome to the blog of <span class="w3-tag">unknown</span></p>
	        <?php
	    }
	?>
</header>








<!-- Grid -->
<div class="w3-row">

	<!-- Blog entries -->
	<div class="w3-col l8 s12">
		<?php
		    $stmt = $auth_user->runQuery("SELECT * FROM products WHERE user_id = $id ORDER BY timeposted DESC LIMIT 1");
		    $stmt->execute(array());
		    
		    $products=$stmt->fetchAll(PDO::FETCH_OBJ);

		    foreach ($products as $product) {

		        ?>	
		  <!-- Blog entry -->
		<div class="w3-card-4 w3-margin w3-white">
			<img src="<?php  echo $product->product_image; ?>" alt="<?php  echo $product->productname; ?>" style="width:100%;max-height:400px;">
			<div class="w3-container w3-padding-8">
				<h3><b>TITLE HEADING</b></h3>
				<h5>Title description, <span class="w3-opacity">April 7, 2014</span></h5>
			</div>

			<div class="w3-container">
				<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed
				tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
				<div class="w3-row">
					<div class="w3-col m8 s12">
						<p><a href = "shop.php?id=<?php echo $user->user_id; ?> "><button class="w3-btn w3-padding-large w3-white w3-border w3-hover-border-black"><b>VIEW ALL PRODUCTS »</b></button></a></p>
					</div>
				</div>
			</div>
		</div>
	        <?php

	    }

	?>
		<hr>
	<?php

	    $stmt = $auth_user->runQuery("SELECT * FROM services WHERE user_id = $id ORDER BY timeposted DESC LIMIT 1 ");
	    $stmt->execute(array());
	    
	    $services=$stmt->fetchAll(PDO::FETCH_OBJ);

	    foreach ($services as $service) {

	        ?>		

		  <!-- Blog entry -->
		<div class="w3-card-4 w3-margin w3-white">
			<img src="<?php  echo $service->service_image; ?>" alt="Norway" style="width:100%;max-height:400px;">
			<div class="w3-container w3-padding-8">
				<h3><b>BLOG ENTRY</b></h3>
				<h5>Title description, <span class="w3-opacity">April 2, 2014</span></h5>
			</div>

			<div class="w3-container">
				<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed
				tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
				<div class="w3-row">
					<div class="w3-col m8 s12">
						<p><a href = " offeredservices.php?id=<?php echo $user->user_id; ?> "><button class="w3-btn w3-padding-large w3-white w3-border w3-hover-border-black"><b>VIEW ALL SERVICES »</b></button></a></p>
					</div>
				</div>
			</div>
		</div>
	        <?php

	    }

	?>
		<!-- END BLOG ENTRIES -->
	</div>




	<div class="w3-col l4">

		<!-- About Card -->
		<div class="w3-card-2 w3-margin w3-margin-top">
		<?php

		    $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id = $id ");
		    $stmt->execute(array());
		    
		    $users=$stmt->fetchAll(PDO::FETCH_OBJ);

		    foreach ($users as $user) {

		        ?>
			<img src="<?php echo $user->profile_image; ?>" class="img-circle" style = "max-width:200px;margin-bottom:5px;">
			<div class="w3-container w3-white">
				<h4><b><?php echo $user->user_name; ?></b></h4>
				<p>Just me, myself and I, exploring the universe of uknownment. I have a heart of love and a interest of lorem ipsum and mauris neque quam blog. I want to share my world with you.</p>
			</div>
		        <?php

		    }

		?>
		</div>
		<hr>
		  
		  <!-- Posts -->
		<div class="w3-card-2 w3-margin">
			<div class="w3-container w3-light-grey">
				<h4>My product categories</h4>
			</div>
			<ul class="w3-ul w3-hoverable w3-white">
		<?php
		    $stmt = $auth_user->runQuery("SELECT * FROM products WHERE user_id = $id  GROUP BY productcategory");
		    $stmt->execute(array());
		    
		    $products=$stmt->fetchAll(PDO::FETCH_OBJ);

		    foreach ($products as $product) {

		        ?>	
				<li class="w3-padding-16 ">
					<img src="<?php  echo $product->product_image; ?>" alt="Image" class="w3-left w3-margin-right" style="height:50px;max-width:50px;">
					<span class="w3-large"><?php  echo $product->Productcategory; ?></span><br>
					<span><?php  echo $product->Productcategory; ?></span>
				</li>
		        <?php

		    }

		?>

			</ul>
		</div>
		<hr> 
		 
		  <!-- Labels / tags -->
		<div class="w3-card-2 w3-margin">
			<div class="w3-container w3-padding">
				<h4>Tags</h4>
			</div>
			<div class="w3-container w3-white">
					<p><span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">London</span>
					<span class="w3-tag w3-light-grey w3-small w3-margin-bottom">IKEA</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">NORWAY</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">DIY</span>
					<span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Baby</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Family</span>
					<span class="w3-tag w3-light-grey w3-small w3-margin-bottom">News</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Clothing</span><span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Shopping</span>
					<span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Sports</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Games</span>
				</p>
			</div>
		</div>
	</div>


</div>



</div>



<?php	
} 
?>

<?php require_once 'includes/widgets/footer/footer.php'; ?>


