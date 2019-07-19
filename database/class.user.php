<?php
error_reporting (0);
require_once('dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($uname,$umail,$upass)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO users(user_name,user_email,user_pass) 
		                                               VALUES(:uname, :umail, :upass)");
												  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function doLogin($uname,$umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT user_id, user_name, user_email, user_pass FROM users WHERE user_name=:uname OR user_email=:umail ");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['user_pass']))
				{
					$_SESSION['user_session'] = $userRow['user_id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function services($user_id, $service, $service_image, $serviceprice, $servicedescription, $fulldetails, $serviceid)
    {
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO services(user_id, service, service_image, serviceprice, servicedescription, fulldetails, serviceid)
			 VALUES(:user_id, :service, :service_image, :serviceprice, :servicedescription, :fulldetails, :serviceid) ");

			$stmt->bindparam(":user_id", $user_id);
			$stmt->bindparam(":serviceid", $serviceid);
			$stmt->bindparam(":service", $service);
			$stmt->bindparam(":service_image", $service_image);
			$stmt->bindparam(":serviceprice", $serviceprice);
			$stmt->bindparam(":servicedescription", $servicedescription);
			$stmt->bindparam(":fulldetails", $fulldetails);
			$stmt->execute();

		    return $stmt;
		}
			catch(PDOException $e)
		{
			echo $e->getMessage();
		}
    }


	public function orderproduct($user_id, $id, $sellerid, $productname, $Productcategory, $productmanufacturer, $productprice, $productquantity, $totalcost)
    {
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO orderproduct(user_id, id, sellerid, productname, Productcategory, productmanufacturer, productprice, productquantity, totalcost)
			 VALUES(:user_id, :id, :sellerid, :productname, :Productcategory, :productmanufacturer, :productprice, :productquantity, :totalcost) ");

			$stmt->bindparam(":user_id", $user_id);
			$stmt->bindparam(":id", $id);
			$stmt->bindparam(":sellerid", $sellerid);
			$stmt->bindparam(":productname", $productname);
			$stmt->bindparam(":Productcategory", $Productcategory);
			$stmt->bindparam(":productmanufacturer", $productmanufacturer);
			$stmt->bindparam(":productprice", $productprice);
			$stmt->bindparam(":productquantity", $productquantity);
			$stmt->bindparam(":totalcost", $totalcost);
			$stmt->execute();

		    return $stmt;
		}
			catch(PDOException $e)
		{
			echo $e->getMessage();
		}
    }




    public function businesscycle($user_id, $id)
    {
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO businesscycle(user_id, id)
			 VALUES(:user_id, :id) ");

			$stmt->bindparam(":user_id", $user_id);
			$stmt->bindparam(":id", $id);
			$stmt->execute();

		    return $stmt;
		}
			catch(PDOException $e)
		{
			echo $e->getMessage();
		}
    }


    public function insertintolog($txn_id, $payer_email)
    {
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO log(txn_id, payer_email)
			 VALUES(:txn_id, :payer_email) ");

			$stmt->bindparam(":txn_id", $txn_id);
			$stmt->bindparam(":payer_email", $payer_email);
			$stmt->execute();

		    return $stmt;
		}
			catch(PDOException $e)
		{
			echo $e->getMessage();
		}
    }

	public function updateuserpremium($premium)
	{
		try
		{
			$user_id = $_SESSION['user_session'];

			$stmt = $this->conn->prepare("UPDATE `users` SET `premium`=:premium  WHERE `user_id`= '$user_id'");
												  
			$stmt->bindparam(":premium", $premium);									  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}















    public function deliveryorders($user_id, $message_id)
    {
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO orders(user_id, message_id)
			 VALUES(:user_id, :message_id) ");

			$stmt->bindparam(":user_id", $user_id);
			$stmt->bindparam(":message_id", $message_id);
			$stmt->execute();

		    return $stmt;
		}
			catch(PDOException $e)
		{
			echo $e->getMessage();
		}
    }


    public function chat($id, $user_id, $message)
    {
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO chat(id, user_id, message)
			 VALUES(:id, :user_id, :message) ");

			$stmt->bindparam(":user_id", $user_id);
			$stmt->bindparam(":id", $id);
			$stmt->bindparam(":message", $message);
			$stmt->execute();

		    return $stmt;
		}
			catch(PDOException $e)
		{
			echo $e->getMessage();
		}
    }



	public function deletefromcircle($id)
	{
		try
		{

			$stmt = $this->conn->prepare("DELETE FROM `businesscycle` WHERE `id`='$id' ");
												  
			$stmt->bindparam(":id", $id);				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}

	
	public function deleteproduct($productid)
	{
		try
		{

			$stmt = $this->conn->prepare("DELETE FROM `products` WHERE `productid`='$productid' ");
			unlink($product->product_image);
												  
			$stmt->bindparam(":productid", $productid);	
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}


	public function deleteservice($serviceid)
	{
		try
		{

			$stmt = $this->conn->prepare("DELETE FROM `services` WHERE `serviceid`='$serviceid' ");
												  
			$stmt->bindparam(":serviceid", $serviceid);				
			$stmt->execute();	
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}




    public function servicegallery($user_id, $service_gallery_image, $servicegallery)
    {
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO servicegallery(user_id, service_gallery_image, servicegallery)
			 VALUES(:user_id, :service_gallery_image, :servicegallery) ");

			$stmt->bindparam(":user_id", $user_id);
			$stmt->bindparam(":service_gallery_image", $service_gallery_image);
			$stmt->bindparam(":servicegallery", $servicegallery);
			$stmt->execute();

		    return $stmt;
		}
			catch(PDOException $e)
		{
			echo $e->getMessage();
		}
    }


    public function products($user_id, $productid, $productname, $Productcategory, $productmanufacturer, $productprice, $productdetails, $productspecification, $productquantity, $product_image, $productwarrant)
    {
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO products(user_id, productid, productname, Productcategory, productmanufacturer, productprice, productdetails, productspecification, productquantity, product_image, productwarrant)
			 VALUES(:user_id, :productid, :productname, :Productcategory, :productmanufacturer, :productprice, :productdetails, :productspecification, :productquantity, :product_image, :productwarrant) ");

			$stmt->bindparam(":user_id", $user_id);
			$stmt->bindparam(":productid", $productid);
			$stmt->bindparam(":productname", $productname);
			$stmt->bindparam(":Productcategory", $Productcategory);
			$stmt->bindparam(":productmanufacturer", $productmanufacturer);
			$stmt->bindparam(":productprice", $productprice);
			$stmt->bindparam(":productdetails", $productdetails);
			$stmt->bindparam(":productspecification", $productspecification);
			$stmt->bindparam(":productquantity", $productquantity);
			$stmt->bindparam(":product_image", $product_image);
			$stmt->bindparam(":productwarrant", $productwarrant);
			$stmt->execute();

			return $stmt;
		}
			catch(PDOException $e)
		{
			echo $e->getMessage();
		}
    }


    public function updateuser($postaladdress, $postalcode, $city, $country)
	{
		try
		{
			$user_id = $_SESSION['user_session'];

			$stmt = $this->conn->prepare("UPDATE `users` SET `postaladdress`=:postaladdress,`postalcode`=:postalcode,`city`=:city,`country`=:country WHERE `user_id`= '$user_id' ");
												  
			$stmt->bindparam(":postaladdress", $postaladdress);
			$stmt->bindparam(":postalcode", $postalcode);
			$stmt->bindparam(":city", $city);
			$stmt->bindparam(":country", $country);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}





	public function createpagesite($shopname, $idnumber, $license, $onlinebusinessid, $facebook, $twitter, $googleplus, $linkedin)
	{
		try
		{
			$user_id = $_SESSION['user_session'];

			$stmt = $this->conn->prepare("UPDATE `users` SET `shopname`=:shopname,`idnumber`=:idnumber,`license`=:license,`onlinebusinessid`=:onlinebusinessid, `facebook`=:facebook,`twitter`=:twitter,`googleplus`=:googleplus,`linkedin`=:linkedin  WHERE `user_id`= '$user_id'");
												  
			$stmt->bindparam(":shopname", $shopname);
			$stmt->bindparam(":idnumber", $idnumber);
			$stmt->bindparam(":license", $license);
			$stmt->bindparam(":onlinebusinessid", $onlinebusinessid);
			$stmt->bindparam(":facebook", $facebook);
			$stmt->bindparam(":twitter", $twitter);
			$stmt->bindparam(":googleplus", $googleplus);
			$stmt->bindparam(":linkedin", $linkedin);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}


	public function formaluserdetails($firstname, $middlename, $lastname, $profile_image)
	{
		try
		{
			$user_id = $_SESSION['user_session'];

			$stmt = $this->conn->prepare("UPDATE `users` SET `firstname`=:firstname,`middlename`=:middlename,`lastname`=:lastname,`profile_image`=:profile_image  WHERE `user_id`= '$user_id'");
												  
			$stmt->bindparam(":firstname", $firstname);
			$stmt->bindparam(":middlename", $middlename);
			$stmt->bindparam(":lastname", $lastname);
			$stmt->bindparam(":profile_image", $profile_image);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}



	//create theme
	public function createthemename($user_id, $themename)
    {
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO themes(user_id, themename)
			 VALUES(:user_id, :themename) ");

			$stmt->bindparam(":user_id", $user_id);
			$stmt->bindparam(":themename", $themename);
			$stmt->execute();

		    return $stmt;
		}
			catch(PDOException $e)
		{
			echo $e->getMessage();
		}
    }




	public function updateproductbackground($productsbackground, $productsbackgroundcolor, $productpricecolor, $productfontcolor, $productheadingcolor, $productbodycontainer)
	{
		try
		{
			$user_id = $_SESSION['user_session'];

			$stmt = $this->conn->prepare("UPDATE `themes` SET `productsbackground`=:productsbackground,`productsbackgroundcolor`=:productsbackgroundcolor,`productpricecolor`=:productpricecolor,`productfontcolor`=:productfontcolor, `productheadingcolor`=:productheadingcolor, `productbodycontainer`=:productbodycontainer  WHERE `user_id`= '$user_id'");
												  
			$stmt->bindparam(":productsbackground", $productsbackground);
			$stmt->bindparam(":productsbackgroundcolor", $productsbackgroundcolor);
			$stmt->bindparam(":productpricecolor", $productpricecolor);
			$stmt->bindparam(":productfontcolor", $productfontcolor);	
			$stmt->bindparam(":productheadingcolor", $productheadingcolor);
			$stmt->bindparam(":productbodycontainer", $productbodycontainer);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}


	public function updatecontainerwidth($productcontainerradius, $alignment, $border)
	{
		try
		{
			$user_id = $_SESSION['user_session'];

			$stmt = $this->conn->prepare("UPDATE `themes` SET `productcontainerradius`=:productcontainerradius, `alignment`=:alignment, `border`=:border WHERE `user_id`= '$user_id' ");
												  
			$stmt->bindparam(":productcontainerradius", $productcontainerradius);
			$stmt->bindparam(":alignment", $alignment);	
			$stmt->bindparam(":border", $border);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}


	public function updateservicebackground($servicebackground, $servisefontcolor, $serviseheadingcolor)
	{
		try
		{
			$user_id = $_SESSION['user_session'];

			$stmt = $this->conn->prepare("UPDATE `themes` SET `servicebackground`=:servicebackground,`servisefontcolor`=:servisefontcolor,`serviseheadingcolor`=:serviseheadingcolor WHERE `user_id`= '$user_id'");
												  
			$stmt->bindparam(":servicebackground", $servicebackground);
			$stmt->bindparam(":servisefontcolor", $servisefontcolor);
			$stmt->bindparam(":serviseheadingcolor", $serviseheadingcolor);									  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}

	public function updateservicecontainerwidth($servicecontainerwidth)
	{
		try
		{
			$user_id = $_SESSION['user_session'];

			$stmt = $this->conn->prepare("UPDATE `themes` SET `servicecontainerwidth`=:servicecontainerwidth WHERE `user_id`= '$user_id' ");
												  
			$stmt->bindparam(":servicecontainerwidth", $servicecontainerwidth);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}






    public function createForum($user_id, $createForum)
    {
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO forumName(user_id, createForum)
			 VALUES(:user_id, :createForum) ");

			$stmt->bindparam(":user_id", $user_id);
			$stmt->bindparam(":createForum", $createForum);
			$stmt->execute();

		    return $stmt;
		}
			catch(PDOException $e)
		{
			echo $e->getMessage();
		}
    }


    public function foruminvite($forumName_id, $shopid, $inviteduserid)
    {
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO foruminvitation(forumName_id, shopid, inviteduserid)
			 VALUES(:forumName_id, :shopid, :inviteduserid) ");

			$stmt->bindparam(":forumName_id", $forumName_id);
			$stmt->bindparam(":shopid", $shopid);
			$stmt->bindparam(":inviteduserid", $inviteduserid);
			$stmt->execute();

		    return $stmt;
		}
			catch(PDOException $e)
		{
			echo $e->getMessage();
		}
    }


//------------------------------------------------------------
//
//
//------------------------------------------------------------


	public function serviceorderpost($user_id, $shopid, $specificserviceid, $service_id, $service_image, $customername, $servicename)
    {
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO serviceorder(user_id, shopid, specificserviceid, service_id, service_image, customername, servicename)
			 VALUES(:user_id, :shopid, :specificserviceid, :service_id, :service_image, :customername, :servicename) ");

			$stmt->bindparam(":user_id", $user_id);
			$stmt->bindparam(":shopid", $shopid);
			$stmt->bindparam(":specificserviceid", $specificserviceid);
			$stmt->bindparam(":service_id", $service_id);
			$stmt->bindparam(":service_image", $service_image);
			$stmt->bindparam(":customername", $customername);
			$stmt->bindparam(":servicename", $servicename);
			$stmt->execute();

		    return $stmt;
		}
			catch(PDOException $e)
		{
			echo $e->getMessage();
		}
    }




	public function postreview($serviceid, $user_id)
    {
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO servicestats(user_id, serviceid)
			 VALUES(:user_id, :serviceid) ");

			$stmt->bindparam(":user_id", $user_id);
			$stmt->bindparam(":serviceid", $serviceid);
			$stmt->execute();

		    return $stmt;
		}
			catch(PDOException $e)
		{
			echo $e->getMessage();
		}
    }


    public function postproductreview($productid, $user_id)
    {
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO productstats(user_id, productid)
			 VALUES(:user_id, :productid) ");

			$stmt->bindparam(":user_id", $user_id);
			$stmt->bindparam(":productid", $productid);
			$stmt->execute();

		    return $stmt;
		}
			catch(PDOException $e)
		{
			echo $e->getMessage();
		}
    }


	public function postiprove($improve)
	{
		try
		{
			$user_id = $_SESSION['user_session'];

			$stmt = $this->conn->prepare("UPDATE `themes` SET `improve`=:improve WHERE `user_id`='$user_id' ");
												  
			$stmt->bindparam(":improve", $improve);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}  





//------------------------------------------------------------
//
//
//------------------------------------------------------------






	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}


















}
?>