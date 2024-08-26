<?php
@session_start();

$id = $_POST['id'] ?? null;
$name = $_POST['name'] ?? null;
$price = $_POST['price'] ?? null;
$img = $_POST['foto'] ?? null;
$desc = $_POST['description'] ?? null;

$cart = !empty($_SESSION['cart']) ? $_SESSION['cart'] : array();

if(!isset($name, $price, $img, $desc)){
    $index = find_key_by_id($id, $cart);
    $newProduct = [
        'id' => $id,
        'name' => $cart[$index]['name'],
        'price' => $cart[$index]['price'],
        'img' => $cart[$index]['img'],
        'desc' => $cart[$index]['desc'],
        'qty' => 1,
        'subtotal' => 0
    ];
}
else{
    $newProduct = [
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'img' => $img,
        'desc' => $desc,
        'qty' => 1,
        'subtotal' => 0
    ];
}

switch ($_POST['action']) {
    case 'add':
        foreach ($newProduct as $value){
            if(!isset($value)){
                return false;
            }
        }

        $prod_id = (int) $newProduct['id'];
        
        if(in_array($prod_id, array_column($cart, 'id'))){ //update
            $index = find_key_by_id($prod_id, $cart);

            $newProduct['qty'] = ((int)$cart[$index]['qty'] + 1);

            $_SESSION['cart'][$index]['qty'] = $newProduct['qty'];
            $_SESSION['cart'][$index]['subtotal'] = $newProduct['qty'] * $newProduct['price'];

            $data = [
                "id" => $prod_id,
                "qty" => $_SESSION['cart'][$index]['qty'],
                "subtotal" => $_SESSION['cart'][$index]['subtotal']
            ];
        }
        else{ //add
            $newProduct['subtotal'] = $newProduct['price'];
            array_push($cart, $newProduct);
            $_SESSION['cart'] = $cart;
        }

        $response = calc_total($data);
        echo $response;
        break;

    case 'delete':{
        $prod_id = (int) $newProduct['id'];
        $newProduct['qty'] = ((int)$cart[$index]['qty'] - 1);
        $index = find_key_by_id($prod_id, $cart);

        if(in_array($prod_id, array_column($cart, 'id'))){
            if($newProduct['qty'] <= 0){
                unset($_SESSION['cart'][$index]);
                $data = [
                    "id" => $prod_id,
                    "qty" => 0
                ];
            }
            else{    
                $_SESSION['cart'][$index]['qty'] = $newProduct['qty'];
                $_SESSION['cart'][$index]['subtotal'] = $newProduct['qty'] * $newProduct['price'];
    
                $data = [
                    "id" => $prod_id,
                    "qty" => $_SESSION['cart'][$index]['qty'],
                    "subtotal" => $_SESSION['cart'][$index]['subtotal']
                ];
                
            }

            $response = calc_total($data);
            echo $response;
        }
        break;

    }
    default:
        echo 'no action registered';
        break;
}


function find_key_by_id ($id, $array) {
    foreach ($array as $key => $value) {
        if (is_array ($value) && isset($value['id']) && $value['id'] == $id) {
            return $key;
        }
    }
    return false;
}

function calc_total($data){
    (int) $total = 0;
    foreach (array_column($_SESSION['cart'], 'subtotal') as $value){
        $total += $value;
    }
    $_SESSION['cart']['total'] = $total;

    $data['total'] = $_SESSION['cart']['total'];
    $response = json_encode($data);
    return $response;
}