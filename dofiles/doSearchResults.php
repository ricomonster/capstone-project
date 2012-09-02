<?php
	include '../init.php';
	
	sleep(3);
	
	$errors = array();
	
	$opdnum = $_POST["opdnum"];
	$firstname = $_POST["firstname"];
	$middlename = $_POST["middlename"];
	$lastname = $_POST["lastname"];
	$cs = $_POST["cs"];
	$bdMonth = $_POST["bdMonth"];
	$bdDay = $_POST["bdDay"];
	$bdYear = $_POST["bdYear"];
	$address = $_POST["address"];
	
	$query = array();
	$querysql = array();
	
	if (!empty($opdnum)){
		$query[] = "op=" . $opdnum;
		$querysql[] = "opdnum = '" . $opdnum . "'";
	}
	if (!empty($lastname)){
		$query[] = "ln=" . $lastname;
		$querysql[] = "lastname LIKE '" . $lastname . "%'";
	}
	if (!empty($firstname)){
		$query[] = "fn=" . $firstname;
		$querysql[] = "firstname LIKE '" . $firstname . "%'";
	}
	if (!empty($middlename)){
		$query[] = "mn=" . $middlename;
		$querysql[] = "middlename LIKE '" . $middlename . "%'";
	}
	
	if (!empty($birthday)){
		$birthday = "$bdYear-$bdMonth-$bdDay";
		$query[] = "db=" . $birthday;
		$querysql[] = "dateofbirth LIKE '" . $birthday . "'";
	}
	if (!empty($cs)){
		$query[] = "cs=" . $cs;
		$querysql[] = "cs LIKE '" . $cs. "%'";
	}
	if (!empty($address)){
		$query[] = "ad=" . $address;
		$querysql[] = "address LIKE '%" . $address . "%'";
	}
	
	if (empty($query)){
		$errors[] = "Please input something in the search fields.";
	}else{
	
		$sqlstat = implode(" AND ", $querysql);
		if (verifySearch($sqlstat) === false){
			$errors[] = "The parameters that you have inserted doesn't correspond to any of the data in the database.";
		}
	}
	
	if (!empty($errors)){
		foreach ($errors as $error){
			$return['error'] = true;
			$return['msg'] = $error;
		}
	}else{
		$param = implode("&", $query);
		$url = "searchresults.php?srch=yes&" . $param;
		$return['error'] = false;
		$return['msg'] = $url;
	}
echo json_encode($return);
?>