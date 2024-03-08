<?php
session_start();
class DB{
public static function connect(){
$servername="localhost";
$username="root";
$password="";
$DB="tech-project";
$conn=mysqli_connect($servername,$username,$password,$DB);
$count=0;
if(!$conn)
{
	die("Connection failed: ".mysqli_connect_error());
}
    return $conn;
	}
}
class Products
{ 
	public $conn;
    
    public function products(){
    	$conn = DB::connect();
    	$sql="SELECT * FROM product";
		$result = mysqli_query($conn,$sql);
		//echo $conn->error;
		if($result->num_rows>0)
		{
			return $result;
	    }
		else
		{
			echo "nothing is returned";
		}
    }
	public function products1($rate){
        
		$r=$rate;
    	$conn = DB::connect();
    	$sql="SELECT * FROM product WHERE average_rating='$r'";
		$result = mysqli_query($conn,$sql);
		//echo $conn->error;
		if($result->num_rows>0)
		{
			return $result;
	    }
		
		else
		{
			echo "nothing is returned";
		}
    }
}
class Variants{
    public $conn;
    public function variant($Vnum){
        $varnum=$Vnum;
    	$conn = DB::connect();
    	$sql="SELECT * FROM variant WHERE pid='$varnum'";
		$result = mysqli_query($conn,$sql);
		//echo $conn->error;
		if($result->num_rows>0)
		{
			return $result;
	    }
		else
		{
			echo "nothing is returned";
		}
    }
	public function variant1($size){
        
		$s=$size;
    	$conn = DB::connect();
    	$sql="SELECT * FROM variant WHERE option2 IN ('$s')";
		$result = mysqli_query($conn,$sql);
		//echo $conn->error;
		if($result->num_rows>0)
		{
			return $result;
	    }
		
		else
		{
			echo "nothing is returned";
		}
    }
	public function variant2($size){
        
		$s=$size;
    	$conn = DB::connect();
    	$sql="SELECT * FROM variant WHERE option1 IN ('$s')";
		$result = mysqli_query($conn,$sql);
		//echo $conn->error;
		if($result->num_rows>0)
		{
			return $result;
	    }
		
		else
		{
			echo "nothing is returned";
		}
    }
	public function variant3($max){
        
		$m=$max;
    	$conn = DB::connect();
    	$sql="SELECT * FROM variant WHERE price<='$m'";
		$result = mysqli_query($conn,$sql);
		//echo $conn->error;
		if($result->num_rows>0)
		{
			return $result;
	    }
		
		else
		{
			echo "nothing is returned";
		}
    }
}
class Options{
    public $conn;
    public function option1(){
    	$conn = DB::connect();
        $name="size";
    	$sql="SELECT value FROM options WHERE name='$name'";
		$result = mysqli_query($conn,$sql);
		//echo $conn->error;
		if($row=mysqli_fetch_array($result))
		{
			return $row;
	    }
		else
		{
			echo "nothing is returned";
		}
    }
    public function option2(){
    	$conn = DB::connect();
    	$name="color";
    	$sql="SELECT value FROM options WHERE name='$name'";
		$result = mysqli_query($conn,$sql);
		//echo $conn->error;
		if($row=mysqli_fetch_array($result))
		{
			return $row;
	    }
		else
		{
			echo "nothing is returned";
		}
    }
}