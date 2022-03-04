<?php
session_start();
include("config.php"); 
 header("location:products.php");

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

$action="";
print_r($_POST);

foreach ($_POST as $k => $v)
{
    $action = $k;
    break;
}
switch ($action)
{  
    case "Add_To_Cart":
        addToCart();
        break;

    case "quantity":
        changeQuantity();
        break;

    case "remove":
        delete();
        break;
}
function addToCart()
{
    foreach($_SESSION['product'] as $key=> $value)
    {
        if (isset($_SESSION['cart']))
        {
            foreach($_SESSION['cart'] as $key =>$val){
                if($val['id']==$_POST['Add_To_Cart']){
                    $_SESSION['cart'][$key]['quantity'] +=1;

                    return;
                }
            }
        }        
    }
    foreach ($_SESSION['product'] as $value){ 
        if ($value['id'] == $_POST['Add_To_Cart'])
        {
            $id = $value['id'];
            $name = $value['name'];
            $image =$value['image'];
            $price =$value ['price'];
            $data = array("id" => $id ,"name"=> $name , "image"=> $image ,"price" => $price, "quantity" => "1");
            array_push($_SESSION['cart'], $data);
        }
    }
   }

   function changeQuantity()
   {
       foreach($_SESSION['cart'] as $key =>$val){
        if($val['id']==$_POST['id']){
            $_SESSION['cart'][$key]['quantity'] =$_POST['quantity'];
            return;
        }
    }
   }
  
   

        function delete(){
            foreach($_SESSION['cart'] as $key => $val){
                if($val['id'] == $_POST['remove']){
                    array_splice($_SESSION['cart'] , $key,1);
                    return;
                }
            }
        }   


?>