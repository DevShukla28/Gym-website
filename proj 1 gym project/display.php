<?php
 include("connection.php");
 $query = "select * from customer_table";
 $data = mysqli_query($conn, $querry);
 $total = mysqli_num_rows($data);
 $result = mysqli_fetch_assoc($data);

 echo $resul['Name']." ".$result['Age']." ". $result[' Gender'] ." ".result['locality']." ".$result['Occupation']


 //echo $total;
if($total!= 0);
{
    echo "table has records";

}
else{
    echo "No records found";
}



?>



