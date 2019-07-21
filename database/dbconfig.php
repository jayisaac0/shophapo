<?php
class Database
{   
    private $host = "db4free.net";
    private $db_name = "shophapo";
    private $username = "shophapo";
    private $password = "Jayluv3139";
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;   
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            ?>
            <style> body,h1 {font-family: "Raleway", sans-serif} body, html {height: 100%;clear:both;} .bgimg {background-image: url();min-height: 100%;background-position: center;background-size: cover;} </style>

            <body>
                <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
                    <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
                        <div class="w3-display-middle" style="margin-top: 100px;">
                            <h1 class="w3-jumbo w3-animate-top"><center>CONNECTION TIMED OUT</center></h1>
                            <hr class="w3-border-grey" style="margin:auto;width:40%">
                            <h1 class="w3-jumbo w3-animate-top"><center><a href="index.php" class="w3-btn w3-padding-16 w3-btn w3-teal w3-padding-large w3-hover-black">REFRESH</a></center> </h1>
                        </div>
                    </div>
                </div>
            </body>


            <?php
            echo "" .$exception->getMessage('aaaw');
        }
         
        return $this->conn;
    }
}
?>
