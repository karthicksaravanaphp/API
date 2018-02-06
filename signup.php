<?php
//$json_url=("https://api.myjson.com/bins/1gdq3h");

//$json_url=("https://api.myjson.com/bins/ouhol");

$json_url=("https://api.myjson.com/bins/xmyfh");
$data = file_get_contents ($json_url);
$json = json_decode($data, true);
$conn = new MongoClient('localhost');
					$db = $conn->testdb;
					$collection = $db->androidjson;
					$a;
					$b;
					$d;
					$e;
					$c;
					$f;
    foreach ($json as $key => $value)
    {
		
		$product[$key]=$value;
		$a=$value;
		$b=$key;
	}
				$d=$product['email'];
				$e=$product['phone'];
				$f=$product['name'];
				$g=$product['password'];
				$options = array('cost' => 10);
				$product['password'] = password_hash($g, PASSWORD_BCRYPT, $options);
    
				$emailval = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
				$mob=	'/^[0-9]{10}+$/'; 
							$cursor1=$collection->findOne(array('email' => $d));
							
							if($cursor1>1)
							{
								header('Content-type: application/json; charset=utf-8');
								$response["Status"] = "0";  
								$response["message"] = "Email Exists .";  
								echo json_encode($response);
								exit();
							}
							else
							{
								if($f=="" && $d=="" && $e=="") :
								header('Content-type: application/json; charset=utf-8');
								$response["Status"] = "0";  
								$response["message"] = "please Enter Value";  
								echo json_encode($response);
								exit();
								elseif(!preg_match($emailval, $d)) :
								header('Content-type: application/json; charset=utf-8');
								$response["Status"] = "0";  
								$response["message"] = "Enter Valid Email";  
								echo json_encode($response);
								exit();
								elseif(!preg_match($mob, $e)) :
								
								header('Content-type: application/json; charset=utf-8');
								$response["Status"] = "0";  
								$response["message"] = "Enter Valid Phoneno";  
								echo json_encode($response);
								exit();
								else :
								// Write your insert coding
								$collection->insert($product);
								header('Content-type: application/json; charset=utf-8');
								$response["Status"] = "1";  
								$response["message"] = "Registered successfully .";  
								echo json_encode($response);
								endif;
							
							}
							
							

   ?>  
   
   
