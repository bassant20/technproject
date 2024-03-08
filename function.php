<?php
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
function getCustomerList(){
    global $conn;
    $query="SELECT * FROM product";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        if(mysqli_num_rows($query_run)>0){
            $res=mysqli_fetch_all($query_run,MYSQLI_ASSOC);
            $data=[
                'data'=>$res,
                'status'=>200,
                'message'=>"list fetched",
            ];
            header("HTTP/1.0 200 list fetched");
            echo json_encode($data);
        }
        else{
            $data=[
                'status'=>404,
                'message'=>"No product found",
            ];
            header("HTTP/1.0 404 No customer found");
            echo json_encode($data);
        }
    }
    {
        $data=[
            'status'=>500,
            'message'=>"Internall Server Error",
        ];
        header("HTTP/1.0 500 Method Not Allowed");
        echo json_encode($data);
    }
}
?>