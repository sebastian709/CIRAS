<?php

session_start();
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "ciras";

$conn = mysqli_connect($sname, $uname, $password, $db_name);


#adminlogin
if (isset($_POST['email']) && isset($_POST['pass'])) {

	#default password
	$mail = $_POST['email'];
	$dpass = $_POST['pass'];
	
	if ($mail == "admin" && $dpass == "123") {
		$_SESSION['ID'] = 1;
		$_SESSION['NAME'] = "Admin";
		header("location: main-dashboard.php?success=Welcome Admin!");
		exit();
	}else{
	
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$uname = validate($_POST['email']);
	$pass = validate($_POST['pass']);
	if (empty($uname)) {
		header("location: index.php?error=Incorrect username or password ");
		exit();
	}elseif (empty($pass)) {
		header("location: index.php?error=Incorrect username or password ");
		exit();
		}else{

		//$pass = md5($pass);
		$sql = "SELECT * FROM tbl_accounts WHERE username = '$uname' AND password = '$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) ==1) {
			$row = mysqli_fetch_assoc($result);

			if ($row['username'] == $uname && $row['password'] == $pass && $row['status'] == 'done' && $row['acclvl'] == 'Admin') {
				$_SESSION['USERNAME'] = $row['username'];
				$_SESSION['NAME'] = $row['rfirstname'];
				$_SESSION['ID'] = $row['id'];
				header("Location:main-dashboard.php");
				exit();
			}
			elseif ($row['username'] == $uname && $row['password'] == $pass && $row['status'] == 'done' && $row['acclvl'] == 'Investigator') {
				$_SESSION['USERNAME'] = $row['username'];
				$_SESSION['NAME'] = $row['rfirstname'];
				$_SESSION['ID'] = $row['id'];
				header("Location:Admin-dashboard.php");
				exit();
			}
			elseif ($row['username'] == $uname && $row['password'] == $pass && $row['status'] == 'done' && $row['acclvl'] == 'Desk Officer') {
				$_SESSION['USERNAME'] = $row['username'];
				$_SESSION['NAME'] = $row['rfirstname'];
				$_SESSION['ID'] = $row['id'];
				header("Location:DO-Dashboard.php");
				exit();
			}
			elseif ($row['username'] == $uname && $row['password'] == $pass && $row['status'] == 'pending') {
				$_SESSION['USERNAME'] = $row['username'];
				$_SESSION['lvlacc'] = $row['acclvl'];
				$_SESSION['ID'] = $row['id'];
				header("Location:register.php");
				exit();
			}else{
				header("Location: register.php?error=Incorrect username or password ");
				exit();
			}
		}else{
			header("Location: index.php?error=Incorrect username or password ");
			exit();
		}
	}
}
}



#Add Victim Data

if(isset($_POST['victimsave'])) {


	$invno = $_POST['investigid'];
	$incitype = $_POST['incitypesus'];
	$surname = $_POST['vlastname'];
	$firstname = $_POST['vfirstname'];
	$middlename = $_POST['vmidname'];
	$nickname = $_POST['vnickname'];
	$citizenship = $_POST['vcitizen'];
	$gender = $_POST['vgender'];
	$civilstatus = $_POST['vcivilstatus'];
	$dateofbirth = $_POST['vbirthday'];
	$age = $_POST['vage'];
	$placeofbirth = $_POST['vplaceofbirth'];
	$mobilenumber = $_POST['vmobileno'];
	$completeaddress = $_POST['vaddress'];
	$educational = $_POST['vhigheduc'];
	$occupation = $_POST['voccu'];
	$workaddress = $_POST['vworkadd'];
	$email = $_POST['vemail'];
	

	$user_data = 'vlastname='. $surname.'&vfirstname='. $firstname. '&vmidname='. $middlename. '&vnickname='. $nickname. '&vcitizen='. $citizenship. '&vgender='. $gender. '&vcivilstatus='. $civilstatus.'&vbirthday='. $dateofbirth.'&vage='. $age. '&vplaceofbirth='. $placeofbirth.'&vmobileno='. $mobilenumber. '&vaddress='. $completeaddress. '&vhigheduc='. $educational. '&voccu='. $occupation. '&vworkadd='. $workaddress. '&vemail='. $email;


		$sql = "INSERT INTO tbl_victim(investigno, incitype, vlastname, vfirstname, vmidname, vnickname, vcitizen, vgender, vcivilstatus, vbirthday, vage, vplaceofbirth, vmobileno, vaddress, vhigheduc, voccu, vworkadd, vemail, vdeleted) VALUES('$invno','$incitype', '$surname', '$firstname', '$middlename', '$nickname', '$citizenship', '$gender', '$civilstatus', '$dateofbirth', '$age', '$placeofbirth', '$mobilenumber', '$completeaddress', '$educational', '$occupation', '$workaddress', '$email', 'No')";
           $result = mysqli_query($conn, $sql);
           if ($result) {
           	 header("Location: admin-irfthree.php?success=Victim has been added successfully");
	         exit();
           }else {
	           	header("Location: admin-irfthree.php?error=unknown error occurred&$user_data");
		        exit();
           }
	


}
#Add Victim Data 2 

if(isset($_POST['victimsave1'])) {


	$invno = $_POST['investigid1'];
	$incitype = $_POST['incitypesus1'];
	$surname = $_POST['vlastname1'];
	$firstname = $_POST['vfirstname1'];
	$middlename = $_POST['vmidname1'];
	$nickname = $_POST['vnickname1'];
	$citizenship = $_POST['vcitizen1'];
	$gender = $_POST['vgender1'];
	$civilstatus = $_POST['vcivilstatus1'];
	$dateofbirth = $_POST['vbirthday1'];
	$age = $_POST['vage1'];
	$placeofbirth = $_POST['vplaceofbirth1'];
	$mobilenumber = $_POST['vmobileno1'];
	$completeaddress = $_POST['vaddress1'];
	$educational = $_POST['vhigheduc1'];
	$occupation = $_POST['voccu1'];
	$workaddress = $_POST['vworkadd1'];
	$email = $_POST['vemail1'];
	

	$user_data = 'vlastname='. $surname.'&vfirstname='. $firstname. '&vmidname='. $middlename. '&vnickname='. $nickname. '&vcitizen='. $citizenship. '&vgender='. $gender. '&vcivilstatus='. $civilstatus.'&vbirthday='. $dateofbirth.'&vage='. $age. '&vplaceofbirth='. $placeofbirth.'&vmobileno='. $mobilenumber. '&vaddress='. $completeaddress. '&vhigheduc='. $educational. '&voccu='. $occupation. '&vworkadd='. $workaddress. '&vemail='. $email;


		$sql = "INSERT INTO tbl_victim(investigno, incitype, vlastname, vfirstname, vmidname, vnickname, vcitizen, vgender, vcivilstatus, vbirthday, vage, vplaceofbirth, vmobileno, vaddress, vhigheduc, voccu, vworkadd, vemail, vdeleted) VALUES('$invno','$incitype', '$surname', '$firstname', '$middlename', '$nickname', '$citizenship', '$gender', '$civilstatus', '$dateofbirth', '$age', '$placeofbirth', '$mobilenumber', '$completeaddress', '$educational', '$occupation', '$workaddress', '$email', 'No')";
           $result = mysqli_query($conn, $sql);
           if ($result) {
           	 header("Location: admin-crimevictimlist.php?success=Victim has been added successfully");
	         exit();
           }else {
	           	header("Location: admin-victimadd.php?error=unknown error occurred&$user_data");
		        exit();
           }
	


}

# Moving into Victim Recovery Data
if (isset($_POST['vdeletedata']))
{
	$vdelid = $_POST['vdelete_id'];

	$query= "UPDATE tbl_victim SET vdeleted ='Yes' WHERE ID='$vdelid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:admin-victimlist.php?success=Deleted Successfully");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

# Restoring Data
if (isset($_POST['vrestoredata']))
{
	$vresid = $_POST['vrestore_id'];

	$query= "UPDATE tbl_victim SET vdeleted ='No' WHERE ID='$vresid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:admin-victimrecover.php?success=Data has been successfully restored!");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

#Deleting Victim Data

if (isset($_POST['vpdeletedata'])) 
{
	$vpid = $_POST['vpdelete_id'];

	$q = "DELETE FROM tbl_victim WHERE ID='$vpid'";
	$q_run = mysqli_query($conn, $q);

	if ($q_run) 
	{
		echo '<script> alert("Deleted"); </script>';
		header("Location:admin-victimrecover.php?success=Data has been successfully deleted!");
	}
	else
	{
		echo '<script> alert("Failed to delete"); </script>';
	}
}

# Transferring Victim data to edit
if(isset($_POST['vpassdatabtn'])){
	$vpassdataid = $_POST['vpassdataid'];


	$_SESSION['editids'] = $vpassdataid;
	header("Location:admin-victimedit.php");
	exit();
}


# Edit Victim Data
if (isset($_POST['evictimsave']))
{
	$veid = $_POST['vedit_id'];
	$esurname = $_POST['velastname'];
	$efirstname = $_POST['vefirstname'];
	$emiddlename = $_POST['vemidname'];
	$enickname = $_POST['venickname'];
	$ecivilstatus = $_POST['vecivilstatus'];
	$egender = $_POST['vegender'];
	$edateofbirth = $_POST['vebirthday'];
	$eage = $_POST['veage'];
	$emobilenumber = $_POST['vemobileno'];
	$ecitizenship = $_POST['vecitizen'];
	$eplaceofbirth = $_POST['veplaceofbirth'];
	$ecompleteaddress = $_POST['veaddress'];
	$eeducational = $_POST['vehigheduc'];
	$eoccupation = $_POST['veoccu'];
	$eworkaddress = $_POST['veworkadd'];
	$eemail = $_POST['veemail'];

	$query= "UPDATE tbl_victim SET vlastname ='$esurname', vfirstname ='$efirstname', vmidname ='$emiddlename', vnickname ='$enickname', vcivilstatus ='$ecivilstatus', vgender ='$egender', vbirthday ='$edateofbirth', vage ='$eage', vmobileno ='$emobilenumber', vcitizen ='$ecitizenship', vplaceofbirth ='$eplaceofbirth', vaddress ='$ecompleteaddress', vhigheduc ='$eeducational', voccu ='$eoccupation', vworkadd ='$eworkaddress', vemail ='$eemail'  WHERE ID='$veid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:admin-victimedit.php?success=Data has been edited successfully!");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

#Remove Victim Data

if (isset($_POST['ivdeletedata'])) 
{
	$spid = $_POST['ivdelete_id'];

	$q = "DELETE FROM tbl_victim WHERE id='$spid'";
	$q_run = mysqli_query($conn, $q);

	if ($q_run) 
	{
		echo '<script> alert("Deleted"); </script>';
		header("Location:admin-irfthree.php?success=Data has been successfully deleted!");
	}
	else
	{
		echo '<script> alert("Failed to delete"); </script>';
	}
}

#Add Suspect Data

if(isset($_POST['suspectsave'])) {


	$invno = $_POST['investigid'];
	$incitype = $_POST['incitypesus'];
	$surname = $_POST['slastname'];
	$firstname = $_POST['sfirstname'];
	$middlename = $_POST['smidname'];
	$nickname = $_POST['snickname'];
	$citizenship = $_POST['scitizen'];
	$gender = $_POST['sgender'];
	$civilstatus = $_POST['scivilstatus'];
	$dateofbirth = $_POST['sbirthday'];
	$age = $_POST['sage'];
	$placeofbirth = $_POST['splaceofbirth'];
	$mobilenumber = $_POST['smobileno'];
	$completeaddress = $_POST['saddress'];
	$educational = $_POST['shigheduc'];
	$occupation = $_POST['soccu'];
	$workaddress = $_POST['sworkadd'];
	$email = $_POST['semail'];
	

	$user_data = 'slastname='. $surname.'&sfirstname='. $firstname. '&smidname='. $middlename. '&snickname='. $nickname. '&scitizen='. $citizenship. '&sgender='. $gender. '&scivilstatus='. $civilstatus.'&sbirthday='. $dateofbirth.'&sage='. $age. '&splaceofbirth='. $placeofbirth.'&smobileno='. $mobilenumber. '&saddress='. $completeaddress. '&shigheduc='. $educational. '&soccu='. $occupation. '&sworkadd='. $workaddress. '&semail='. $email;


		


		$sql = "INSERT INTO tbl_suspect(investigno, incitype, slastname, sfirstname, smidname, snickname, scitizen, sgender, scivilstatus, sbirthday, sage, splaceofbirth, smobileno, saddress, shigheduc, soccu, sworkadd, semail, sdeleted, status) VALUES('$invno','$incitype','$surname', '$firstname', '$middlename', '$nickname', '$citizenship', '$gender', '$civilstatus', '$dateofbirth', '$age', '$placeofbirth', '$mobilenumber', '$completeaddress', '$educational', '$occupation', '$workaddress', '$email', 'No', 'At-large')";
           $result = mysqli_query($conn, $sql);
           if ($result) {
           	 header("Location: admin-irftwo.php?success=Suspect has been added successfully");
	         exit();
           }else {
	           	header("Location: admin-irftwo.php?error=unknown error occurred&$user_data");
		        exit();
           }
	


}


#another add suspectdata
if(isset($_POST['suspectsave1'])) {

	
	$invno = $_POST['investigid1'];
	$incitype = $_POST['incitypesus1'];
	$surname = $_POST['slastname1'];
	$firstname = $_POST['sfirstname1'];
	$middlename = $_POST['smidname1'];
	$nickname = $_POST['snickname1'];
	$citizenship = $_POST['scitizen1'];
	$gender = $_POST['sgender1'];
	$civilstatus = $_POST['scivilstatus1'];
	$dateofbirth = $_POST['sbirthday1'];
	$age = $_POST['sage1'];
	$placeofbirth = $_POST['splaceofbirth1'];
	$mobilenumber = $_POST['smobileno1'];
	$completeaddress = $_POST['saddress1'];
	$educational = $_POST['shigheduc1'];
	$occupation = $_POST['soccu1'];
	$workaddress = $_POST['sworkadd1'];
	$email = $_POST['semail1'];
	

	$user_data = 'slastname='. $surname.'&sfirstname='. $firstname. '&smidname='. $middlename. '&snickname='. $nickname. '&scitizen='. $citizenship. '&sgender='. $gender. '&scivilstatus='. $civilstatus.'&sbirthday='. $dateofbirth.'&sage='. $age. '&splaceofbirth='. $placeofbirth.'&smobileno='. $mobilenumber. '&saddress='. $completeaddress. '&shigheduc='. $educational. '&soccu='. $occupation. '&sworkadd='. $workaddress. '&semail='. $email;


		


		$sql = "INSERT INTO tbl_suspect(investigno, incitype, slastname, sfirstname, smidname, snickname, scitizen, sgender, scivilstatus, sbirthday, sage, splaceofbirth, smobileno, saddress, shigheduc, soccu, sworkadd, semail, sdeleted, status) VALUES('$invno','$incitype','$surname', '$firstname', '$middlename', '$nickname', '$citizenship', '$gender', '$civilstatus', '$dateofbirth', '$age', '$placeofbirth', '$mobilenumber', '$completeaddress', '$educational', '$occupation', '$workaddress', '$email', 'No', 'At-large')";
           $result = mysqli_query($conn, $sql);
           if ($result) {
           	 header("Location: admin-crimesuspectlist.php?success=Suspect has been added successfully");
	         exit();
           }else {
	           	header("Location: admin-suspectadd.php?error=unknown error occurred&$user_data");
		        exit();
           }
	


}


# Moving into suspect Recovery Data
if (isset($_POST['sdeletedata']))
{
	$sdelid = $_POST['sdelete_id'];

	$query= "UPDATE tbl_suspect SET sdeleted ='Yes' WHERE id='$sdelid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:admin-suspectlist.php?success=Deleted Successfully");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

# Restoring suspect Data
if (isset($_POST['srestoredata']))
{
	$sresid = $_POST['srestore_id'];

	$query= "UPDATE tbl_suspect SET sdeleted ='No' WHERE id='$sresid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:admin-suspectrecover.php?success=Data has been successfully restored!");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

#Deleting suspect Data

if (isset($_POST['spdeletedata'])) 
{
	$spid = $_POST['spdelete_id'];

	$q = "DELETE FROM tbl_suspect WHERE id='$spid'";
	$q_run = mysqli_query($conn, $q);

	if ($q_run) 
	{
		echo '<script> alert("Deleted"); </script>';
		header("Location:admin-suspectrecover.php?success=Data has been successfully remove to recovery list!");
	}
	else
	{
		echo '<script> alert("Failed to delete"); </script>';
	}
}

#Remove suspect Data

if (isset($_POST['rvdeletedata'])) 
{
	$spid = $_POST['evdelete_id'];

	$q = "DELETE FROM tbl_suspect WHERE id='$spid'";
	$q_run = mysqli_query($conn, $q);

	if ($q_run) 
	{
		echo '<script> alert("Deleted"); </script>';
		header("Location:admin-irftwo.php?success=Data has been successfully deleted!");
	}
	else
	{
		echo '<script> alert("Failed to delete"); </script>';
	}
}

# Transferring suspect data to edit
if(isset($_POST['spassdatabtn'])){
	$spassdataid = $_POST['spassdataid'];


	$_SESSION['seditids'] = $spassdataid;
	header("Location:admin-suspectedit.php");
	exit();
}


# Edit suspect Data
if (isset($_POST['esuspectsave']))
{
	$seid = $_POST['sedit_id'];
	$sesurname = $_POST['selastname'];
	$sefirstname = $_POST['sefirstname'];
	$semiddlename = $_POST['semidname'];
	$senickname = $_POST['senickname'];
	$secivilstatus = $_POST['secivilstatus'];
	$segender = $_POST['segender'];
	$sedateofbirth = $_POST['sebirthday'];
	$seage = $_POST['seage'];
	$semobilenumber = $_POST['semobileno'];
	$secitizenship = $_POST['secitizen'];
	$seplaceofbirth = $_POST['seplaceofbirth'];
	$secompleteaddress = $_POST['seaddress'];
	$seeducational = $_POST['sehigheduc'];
	$seoccupation = $_POST['seoccu'];
	$seworkaddress = $_POST['seworkadd'];
	$seemail = $_POST['seemail'];

	$query= "UPDATE tbl_suspect SET slastname ='$sesurname', sfirstname ='$sefirstname', smidname ='$semiddlename', snickname ='$senickname', scivilstatus ='$secivilstatus', sgender ='$segender', sbirthday ='$sedateofbirth', sage ='$seage', smobileno ='$semobilenumber', scitizen ='$secitizenship', splaceofbirth ='$seplaceofbirth', saddress ='$secompleteaddress', shigheduc ='$seeducational', soccu ='$seoccupation', sworkadd ='$seworkaddress', semail ='$seemail'  WHERE sid='$seid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:admin-suspectedit.php?success=Data has been edited successfully!");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

#==================== Item A ==========

#proceed Step 1 Data

if(isset($_POST['itemabtn'])) {


	$bno = $_POST['ben'];
	$incitype = $_POST['toi'];
	$drep = $_POST['dr'];
	$trep = $_POST['tr'];
	$dinci = $_POST['di'];
	$tinci = $_POST['ti'];
	$istc = $_POST['iic'];
	$bidstats = $_POST['blotterstatus'];


	$surname = $_POST['ilastname'];
	$firstname = $_POST['ifirstname'];
	$middlename = $_POST['imidname'];
	$nickname = $_POST['inickname'];
	$citizenship = $_POST['icitizen'];
	$gender = $_POST['igender'];
	$civilstatus = $_POST['icivilstatus'];
	$dateofbirth = $_POST['ibirthday'];
	$age = $_POST['iage'];
	$placeofbirth = $_POST['iplaceofbirth'];
	$mobilenumber = $_POST['imobileno'];
	$completeaddress = $_POST['iaddress'];
	$educational = $_POST['ihigheduc'];
	$occupation = $_POST['ioccu'];
	$workaddress = $_POST['iworkadd'];
	$email = $_POST['iemail'];
	$vdel = "Yes";

	$ibarangay = $_POST['ibarangay'];
	$imuni = $_POST['imuni'];
	$iprovince = $_POST['iprovince'];




	$user_data = 'ilastname='. $surname.'&ifirstname='. $firstname. '&imidname='. $middlename. '&inickname='. $nickname. '&icitizen='. $citizenship. '&igender='. $gender. '&icivilstatus='. $civilstatus.'&ibirthday='. $dateofbirth.'&iage='. $age. '&iplaceofbirth='. $placeofbirth.'&imobileno='. $mobilenumber. '&iaddress='. $completeaddress. '&ihigheduc='. $educational. '&ioccu='. $occupation. '&iworkadd='. $workaddress. '&iemail='. $email;

		$blotterupstatus = "UPDATE tbl_blotter SET bstatus='Pending' WHERE entryno='$bidstats'";
		$bupstats = mysqli_query($conn, $blotterupstatus);
		
		$irf = "INSERT INTO tbl_irf(blotterno, incitype, datereported, timereported, dateincident, timeincident, isitcrime) VALUES('$bno', '$incitype', '$drep', '$trep', '$dinci', '$tinci', '$istc')";

		$irfresult = mysqli_query($conn, $irf);
		
		$sql = "INSERT INTO tbl_informant(investigno,incitype,ilastname, ifirstname, imidname, inickname, icitizen, igender, icivilstatus, ibirthday, iage, iplaceofbirth, imobileno, iaddress, ihigheduc, ioccu, iworkadd, iemail, ideleted, barangay, municipality, province) VALUES('$bno', '$incitype','$surname', '$firstname', '$middlename', '$nickname', '$citizenship', '$gender', '$civilstatus', '$dateofbirth', '$age', '$placeofbirth', '$mobilenumber', '$completeaddress', '$educational', '$occupation', '$workaddress', '$email', 'No', '$ibarangay', '$imuni', '$iprovince')";
          $result = mysqli_query($conn, $sql);

          if ($result) {
          	if ($bupstats) {
	          	if ($irfresult) {
	          		$_SESSION['incises'] = $incitype;	
		           	header("Location: admin-irftwo.php");
			          exit();
		          }else {
			          header("Location: admin-irf.php?error=unknown error occurred&$user_data");
				     exit();
		          }
	          }
          }
	}

#Back Step 1 Data

if(isset($_POST['itemabtnup'])) {


	$bno = $_POST['upben'];
	$incitype = $_POST['uptoi'];
	$drep = $_POST['updr'];
	$trep = $_POST['uptr'];
	$dinci = $_POST['updi'];
	$tinci = $_POST['upti'];
	$istc = $_POST['upiic'];


	$surname = $_POST['upilastname'];
	$firstname = $_POST['upifirstname'];
	$middlename = $_POST['upimidname'];
	$nickname = $_POST['upinickname'];
	$civilstatus = $_POST['upicivilstatus'];
	$gender = $_POST['upigender'];
	$dateofbirth = $_POST['upibirthday'];
	$age = $_POST['upiage'];
	$mobilenumber = $_POST['upimobileno'];
	$citizenship = $_POST['upicitizen'];
	$placeofbirth = $_POST['upiplaceofbirth'];
	$completeaddress = $_POST['upiaddress'];
	$educational = $_POST['upihigheduc'];
	$occupation = $_POST['upioccu'];
	$workaddress = $_POST['upiworkadd'];
	$email = $_POST['upiemail'];
	




	$user_data = 'ilastname='. $surname.'&ifirstname='. $firstname. '&imidname='. $middlename. '&inickname='. $nickname. '&icitizen='. $citizenship. '&igender='. $gender. '&icivilstatus='. $civilstatus.'&ibirthday='. $dateofbirth.'&iage='. $age. '&iplaceofbirth='. $placeofbirth.'&imobileno='. $mobilenumber. '&iaddress='. $completeaddress. '&ihigheduc='. $educational. '&ioccu='. $occupation. '&iworkadd='. $workaddress. '&iemail='. $email;

		
		$irfup = "UPDATE tbl_irf SET incitype='$incitype', datereported='$drep', timereported='$trep', dateincident='$dinci', timeincident='$tinci', isitcrime='$istc' WHERE blotterno ='$bno'";

		$irfresultup = mysqli_query($conn, $irfup);
		
		$sqlup = "UPDATE tbl_informant SET incitype='$incitype', ilastname ='$surname', ifirstname ='$firstname', imidname ='$middlename', inickname ='$nickname', icivilstatus ='$civilstatus', igender ='$gender', ibirthday ='$dateofbirth', iage ='$age', imobileno ='$mobilenumber', icitizen ='$citizenship', iplaceofbirth ='$placeofbirth', iaddress ='$completeaddress', ihigheduc ='$educational', ioccu ='$occupation', iworkadd ='$workaddress', iemail ='$email' WHERE investigno='$bno'";
          $resultup = mysqli_query($conn, $sqlup);

          if ($irfresultup) {
          	$_SESSION['mybackid2'] = $bno;
			header("Location: admin-irftwo.php");
			 exit();
		     }else {
			     header("Location: admin-irf.php?error=unknown error occurred&$user_data");
				exit();
          }
	}

# Moving into informant Recovery Data
if (isset($_POST['ideletedata']))
{
	$idelid = $_POST['idelete_id'];

	$query= "UPDATE tbl_informant SET ideleted ='Yes' WHERE ID='$idelid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:admin-informantlist.php?success=Deleted Successfully");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

# Restoring Data
if (isset($_POST['irestoredata']))
{
	$iresid = $_POST['irestore_id'];

	$query= "UPDATE tbl_informant SET ideleted ='No' WHERE ID='$iresid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:admin-informantrecover.php?success=Data has been successfully restored!");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

#Deleting informant Data

if (isset($_POST['ipdeletedata'])) 
{
	$ipid = $_POST['ipdelete_id'];

	$q = "DELETE FROM tbl_informant WHERE ID='$ipid'";
	$q_run = mysqli_query($conn, $q);

	if ($q_run) 
	{
		echo '<script> alert("Deleted"); </script>';
		header("Location:admin-informantrecover.php?success=Data has been successfully deleted!");
	}
	else
	{
		echo '<script> alert("Failed to delete"); </script>';
	}
}

# Transferring informant data to edit
if(isset($_POST['ipassdatabtn'])){
	$ipassdataid = $_POST['ipassdataid'];


	$_SESSION['editids'] = $ipassdataid;
	header("Location:admin-informantedit.php");
	exit();
}


# Edit informant Data
if (isset($_POST['einformantsave']))
{
	$ieid = $_POST['iedit_id'];
	$esurname = $_POST['ielastname'];
	$efirstname = $_POST['iefirstname'];
	$emiddlename = $_POST['iemidname'];
	$enickname = $_POST['ienickname'];
	$ecivilstatus = $_POST['iecivilstatus'];
	$egender = $_POST['iegender'];
	$edateofbirth = $_POST['iebirthday'];
	$eage = $_POST['ieage'];
	$emobilenumber = $_POST['iemobileno'];
	$ecitizenship = $_POST['iecitizen'];
	$eplaceofbirth = $_POST['ieplaceofbirth'];
	$ecompleteaddress = $_POST['ieaddress'];
	$eeducational = $_POST['iehigheduc'];
	$eoccupation = $_POST['ieoccu'];
	$eworkaddress = $_POST['ieworkadd'];
	$eemail = $_POST['ieemail'];

	$query= "UPDATE tbl_informant SET ilastname ='$esurname', ifirstname ='$efirstname', imidname ='$emiddlename', inickname ='$enickname', icivilstatus ='$ecivilstatus', igender ='$egender', ibirthday ='$edateofbirth', iage ='$eage', imobileno ='$emobilenumber', icitizen ='$ecitizenship', iplaceofbirth ='$eplaceofbirth', iaddress ='$ecompleteaddress', ihigheduc ='$eeducational', ioccu ='$eoccupation', iworkadd ='$eworkaddress', iemail ='$eemail'  WHERE ID='$ieid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:admin-informantedit.php?success=Data has been edited successfully!");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

# missing add data

if (isset($_POST['missingsave'])) {
    // for the database
    $mname = stripslashes($_POST['mname']);
    $mnickname = stripslashes($_POST['mnickname']);
    $maddress = stripslashes($_POST['maddress']);
    $mgender = stripslashes($_POST['mgender']);
    $mcitizenship = stripslashes($_POST['mcitizenship']);
    $mage = stripslashes($_POST['mage']);
    $mcomplexion = stripslashes($_POST['mcomplexion']);
    $mheight = stripslashes($_POST['mheight']);
    $mweight = stripslashes($_POST['mweight']);
    $mbuild = stripslashes($_POST['mbuild']);
    $mhair = stripslashes($_POST['mhair']);
    $mpeculiar = stripslashes($_POST['mpeculiar']);
    $mother = stripslashes($_POST['mother']);
    $madditional = stripslashes($_POST['madditional']);
    $profileImageName = time() . '-' . $_FILES["mprofile_image"]["name"];


    // For image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['mprofile_image']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    $user_data = 'mname='. $mname.'&mnickname='. $mnickname.'&maddress='. $maddress.'&mgender='. $mgender.'&mcitizenship='. $mcitizenship.'&mage='. $mage.'&mcomplexion='. $mcomplexion.'&mheight='. $mheight.'&mweight='. $mweight.'&mbuild='. $mbuild.'&mhair='. $mhair.'&mpeculiar='. $mpeculiar.'&mother='. $mother.'&madditional='. $madditional;


	if(empty($mname)){
        header("Location: admin-missingadd.php?error=Name of subject is required&$user_data");
	    exit();
	}
	elseif (!preg_match('/^[0-9]*$/', $mage)) {
         header("Location: admin-missingadd.php?error= Use only number for age&$user_data");
	    exit();
     }
	else if(empty($mnickname)) {
		header("Location: admin-missingadd.php?error=Nickname is required&$user_data");
	    exit();
	}
	else if(empty($maddress)){
        header("Location: admin-missingadd.php?error=Address is required&$user_data");
	    exit();
	}
	else if(empty($mgender)){
        header("Location: admin-missingadd.php?error=Gender is required&$user_data");
	    exit();
	}
	else if(empty($mcitizenship)){
        header("Location: admin-missingadd.php?error=Citizenship is required&$user_data");
	    exit();
	}
	else if(empty($mage)){
        header("Location: admin-missingadd.php?error=Age is required&$user_data");
	    exit();
	}
	else if(empty($mcomplexion)){
        header("Location: admin-missingadd.php?error=Complexion is required&$user_data");
	    exit();
	}
	else if(empty($mheight)){
        header("Location: admin-missingadd.php?error=Height is required&$user_data");
	    exit();
	}
	else if(empty($mweight)){
        header("Location: admin-missingadd.php?error=Weight is required&$user_data");
	    exit();
	}
	else if(empty($mbuild)){
        header("Location: admin-missingadd.php?error=Build is required&$user_data");
	    exit();
	}
	else if(empty($mhair)){
        header("Location: admin-missingadd.php?error=Hair is required&$user_data");
	    exit();
	}
	else if(empty($mpeculiar)){
        header("Location: admin-missingadd.php?error=Peculiarities is required&$user_data");
	    exit();
	}
    // check if file exists
    if(file_exists($target_file)) {
      header("Location: admin-missingadd.php?error=This photo is already Exist&$user_data");
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["mprofile_image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO tbl_missing SET mprofile_image='$profileImageName',mdateupload = NOW(), mname='$mname', mnickname='$mnickname', maddress='$maddress', mgender='$mgender', mcitizenship='$mcitizenship', mage='$mage', mcomplexion='$mcomplexion', mheight='$mheight', mweight='$mweight', mbuild='$mbuild', mhair='$mhair', mpeculiar='$mpeculiar', mother='$mother', madditional='$madditional', mdeleted='No' ";

        #
        if(mysqli_query($conn, $sql)){
          header("Location:admin-missingadd.php?success=Data has been edited successfully!");
        } else {
          echo '<script> alert("Failed to delete"); </script>';
        }
      } else {
        echo '<script> alert("Failed to delete"); </script>';
      }
    }
  }


# Moving into Missing person Recovery Data
if (isset($_POST['mdeletedata']))
{
	$idelid = $_POST['mdelete_id'];

	$query= "UPDATE tbl_missing SET mdeleted ='Yes' WHERE ID='$idelid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:admin-missinglist.php?success=Deleted Successfully");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

# Restoring Missing person Data
if (isset($_POST['mrestoredata']))
{
	$iresid = $_POST['mrestore_id'];

	$query= "UPDATE tbl_missing SET mdeleted ='No' WHERE ID='$iresid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:admin-missingrecover.php?success=Data has been successfully restored!");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

#Deleting Missing Data

if (isset($_POST['mpdeletedata'])) 
{
	$ipid = $_POST['mpdelete_id'];

	$q = "DELETE FROM tbl_missing WHERE ID='$ipid'";
	$q_run = mysqli_query($conn, $q);

	if ($q_run) 
	{
		echo '<script> alert("Deleted"); </script>';
		header("Location:admin-missingrecover.php?success=Data has been successfully deleted!");
	}
	else
	{
		echo '<script> alert("Failed to delete"); </script>';
	}
}

# Transferring Missing data to edit
if(isset($_POST['mpassdatabtn'])){
	$ipassdataid = $_POST['mpassdataid'];


	$_SESSION['meditids'] = $ipassdataid;
	header("Location:admin-missingedit.php");
	exit();
}
# Edit Missing Data
if (isset($_POST['missingedit'])) {
    // for the database
    $meid = $_POST['medit_id'];
    $mname = stripslashes($_POST['mename']);
    $mnickname = stripslashes($_POST['menickname']);
    $maddress = stripslashes($_POST['meaddress']);
    $mgender = stripslashes($_POST['megender']);
    $mcitizenship = stripslashes($_POST['mecitizenship']);
    $mage = stripslashes($_POST['meage']);
    $mcomplexion = stripslashes($_POST['mecomplexion']);
    $mheight = stripslashes($_POST['meheight']);
    $mweight = stripslashes($_POST['meweight']);
    $mbuild = stripslashes($_POST['mebuild']);
    $mhair = stripslashes($_POST['mehair']);
    $mpeculiar = stripslashes($_POST['mepeculiar']);
    $mother = stripslashes($_POST['meother']);
    $madditional = stripslashes($_POST['meadditional']);
    $profileImageName = time() . '-' . $_FILES["meprofile_image"]["name"];
    $nophoto = 1;


    // For image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($profileImageName);


    if ($nophoto > 0) {
      	$sql1 = "UPDATE tbl_missing SET mname='$mname', mnickname='$mnickname', maddress='$maddress', mgender='$mgender', mcitizenship='$mcitizenship', mage='$mage', mcomplexion='$mcomplexion', mheight='$mheight', mweight='$mweight', mbuild='$mbuild', mhair='$mhair', mpeculiar='$mpeculiar', mother='$mother', madditional='$madditional', mdeleted='No' WHERE ID='$meid'";

        #
        if(mysqli_query($conn, $sql1)){
          header("Location:admin-missingedit.php?success=Data has been edited successfully!");
        } else {
          echo '<script> alert("Failed to delete"); </script>';
        }
     }
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['meprofile_image']['size'] > 0) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    
    // Upload image only if no errors
    	if (empty($error) ) {
      
      if(move_uploaded_file($_FILES["meprofile_image"]["tmp_name"], $target_file)) {
        $sql = "UPDATE tbl_missing SET mprofile_image='$profileImageName', mname='$mname', mnickname='$mnickname', maddress='$maddress', mgender='$mgender', mcitizenship='$mcitizenship', mage='$mage', mcomplexion='$mcomplexion', mheight='$mheight', mweight='$mweight', mbuild='$mbuild', mhair='$mhair', mpeculiar='$mpeculiar', mother='$mother', madditional='$madditional', mdeleted='No' WHERE ID='$meid'";

        #
        if(mysqli_query($conn, $sql)){
          header("Location:admin-missingedit.php?success=Data has been edited successfully!");
        } else {
          echo '<script> alert("Failed to delete 2"); </script>';
        }
     } else {
        echo '<script> alert("Failed to delete 1"); </script>';
     }

    }
  }


# drug arrested add data

if (isset($_POST['drugarrsave'])) {
    // for the database
    $dainvestigno = stripslashes($_POST['dainvestigno']);
    $dafullname = stripslashes($_POST['dafullname']);
    $danickname = stripslashes($_POST['danickname']);
    $dacivilstatus = stripslashes($_POST['dacivilstatus']);
    $dagender = stripslashes($_POST['dagender']);
    $damobileno = stripslashes($_POST['damobileno']);
    $daaddress = stripslashes($_POST['daaddress']);
    $daoccupation = stripslashes($_POST['daoccupation']);
    $danationality = stripslashes($_POST['danationality']);
    $daweight = stripslashes($_POST['daweight']);
    $daheight = stripslashes($_POST['daheight']);
    $dacoloreyes = stripslashes($_POST['dacoloreyes']);
    $dahair = stripslashes($_POST['dahair']);
    $dacomplexion = stripslashes($_POST['dacomplexion']);
    $dadatereported = stripslashes($_POST['dadatereported']);
    $dadateofbirth = stripslashes($_POST['dadateofbirth']);
    $daplaceofbirth = stripslashes($_POST['daplaceofbirth']);
    $daeducattain = stripslashes($_POST['daeducattain']);
    $daworkadd = stripslashes($_POST['daworkadd']);
    $daafppnprank = stripslashes($_POST['daafppnprank']);
    $daunitassign = stripslashes($_POST['daunitassign']);
    $dagroupaff = stripslashes($_POST['dagroupaff']);
    $dastatus = stripslashes($_POST['dastatus']);
    $b = html_entity_decode($dastatus);
    $dadescripteyes = stripslashes($_POST['dadescripteyes']);
    $dadescripthair = stripslashes($_POST['dadescripthair']);
    $dacontactname = stripslashes($_POST['dacontactname']);
    $darelationship = stripslashes($_POST['darelationship']);
    $darelcontactno = stripslashes($_POST['darelcontactno']);
    $daemail = stripslashes($_POST['daemail']);
    $profileImageName = time() . '-' . $_FILES["dprofile_image"]["name"];


    // For image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['dprofile_image']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    $user_data = 'dinvestigno='. $dainvestigno.'&dfullname='. $dafullname.'&dnickname='. $danickname.'&dcivilstatus='. $dacivilstatus.'&dgender='. $dagender.'&dmobileno='. $damobileno.'&daddress='. $daaddress.'&doccupation='. $daoccupation.'&dnationality='. $danationality.'&dweight='. $daweight.'&dheight='. $daheight.'&dcoloreyes='. $dacoloreyes.'&dhair='. $dahair.'&dcomplexion='. $dacomplexion.'&ddatereported='. $dadatereported.'&ddateofbirth='. $dadateofbirth.'&dplaceofbirth='. $daplaceofbirth.'&deducattain='. $daeducattain.'&dworkadd='. $daworkadd.'&dafppnprank='. $daafppnprank.'&dunitassign='. $daunitassign.'&dgroupaff='. $dagroupaff.'&dstatus='. $b.'&ddescripteyes='. $dadescripteyes.'&ddescripthair='. $dadescripthair.'&dcontactname='. $dacontactname.'&drelationship='. $darelationship.'&drelcontactno='. $darelcontactno.'&demail='. $daemail;


	if(empty($dainvestigno)){
        header("Location: admin-drugarradd.php?error=Investigation No. is required&$user_data");
	    exit();
	}
	elseif (!preg_match('/^[0-9]*$/', $damobileno)) {
         header("Location: admin-drugarradd.php?error= Use only number for age&$user_data");
	    exit();
     }
	else if(empty($dafullname)) {
		header("Location: admin-drugarradd.php?error=Name of Subject is required&$user_data");
	    exit();
	}
	else if(empty($danickname)){
        header("Location: admin-drugarradd.php?error=Allias is required&$user_data");
	    exit();
	}
	else if(empty($dacivilstatus)){
        header("Location: admin-drugarradd.php?error=Civil Status is required&$user_data");
	    exit();
	}
	else if(empty($dagender)){
        header("Location: admin-drugarradd.php?error=Gender is required&$user_data");
	    exit();
	}
	else if(empty($damobileno)){
        header("Location: admin-drugarradd.php?error=Mobile No. is required&$user_data");
	    exit();
	}
	else if(empty($daaddress)){
        header("Location: admin-drugarradd.php?error=Address is required&$user_data");
	    exit();
	}
	else if(empty($daoccupation)){
        header("Location: admin-drugarradd.php?error=Occupation is required&$user_data");
	    exit();
	}
	else if(empty($danationality)){
        header("Location: admin-drugarradd.php?error=Nationality is required&$user_data");
	    exit();
	}
	else if(empty($daweight)){
        header("Location: admin-drugarradd.php?error=Weight is required&$user_data");
	    exit();
	}
	else if(empty($daheight)){
        header("Location: admin-drugarradd.php?error=Height is required&$user_data");
	    exit();
	}
	else if(empty($dacoloreyes)){
        header("Location: admin-drugarradd.php?error=Color Eyes is required&$user_data");
	    exit();
	}
	else if(empty($dahair)) {
		header("Location: admin-drugarradd.php?error=Color Hair is required&$user_data");
	    exit();
	}
	else if(empty($dacomplexion)){
        header("Location: admin-drugarradd.php?error=Complexion is required&$user_data");
	    exit();
	}
	else if(empty($dadatereported)){
        header("Location: admin-drugarradd.php?error=Date Reported is required&$user_data");
	    exit();
	}
	else if(empty($dadateofbirth)){
        header("Location: admin-drugarradd.php?error=Date of Birth is required&$user_data");
	    exit();
	}
	else if(empty($daplaceofbirth)){
        header("Location: admin-drugarradd.php?error=Place of Birth is required&$user_data");
	    exit();
	}
	else if(empty($daeducattain)){
        header("Location: admin-drugarradd.php?error=Highest Educational Attainment is required&$user_data");
	    exit();
	}
	else if(empty($daworkadd)){
        header("Location: admin-drugarradd.php?error=Work Address is required&$user_data");
	    exit();
	}
	else if(empty($daafppnprank)){
        header("Location: admin-drugarradd.php?error=AFP/PNP Rank is required&$user_data");
	    exit();
	}
	else if(empty($daunitassign)){
        header("Location: admin-drugarradd.php?error=Unit Assignment is required&$user_data");
	    exit();
	}
	else if(empty($dagroupaff)){
        header("Location: admin-drugarradd.php?error=Group Affliation is required&$user_data");
	    exit();
	}
	else if(empty($b)){
        header("Location: admin-drugarradd.php?error=Status is required&$user_data");
	    exit();
	}
	else if(empty($dadescripteyes)){
        header("Location: admin-drugarradd.php?error=Description of Eyes is required&$user_data");
	    exit();
	}
	else if(empty($dadescripthair)){
        header("Location: admin-drugarradd.php?error=Description of Hair is required&$user_data");
	    exit();
	}
	else if(empty($dacontactname)){
        header("Location: admin-drugarradd.php?error=Contact Name is required&$user_data");
	    exit();
	}
	else if(empty($darelationship)){
        header("Location: admin-drugarradd.php?error=Relationship is required&$user_data");
	    exit();
	}
	else if(empty($darelcontactno)){
        header("Location: admin-drugarradd.php?error=Contact Number is required&$user_data");
	    exit();
	}
	else if(empty($daemail)){
        header("Location: admin-drugarradd.php?error=Email is required&$user_data");
	    exit();
	}
    // check if file exists
    if(file_exists($target_file)) {
      header("Location: admin-drugarradd.php?error=This photo is already Exist&$user_data");
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["dprofile_image"]["tmp_name"], $target_file)) {
      	
        $sql = "INSERT INTO tbl_drug SET dprofile_image='$profileImageName',ddateup = NOW(), dinvestigno='$dainvestigno', dfullname='$dafullname', dnickname='$danickname', dcivilstatus='$dacivilstatus', dgender='$dagender', dmobileno='$damobileno', daddress='$daaddress', doccupation='$daoccupation', dnationality='$danationality', dweight='$daweight', dheight='$daheight', dcoloreyes='$dacoloreyes', dhair='$dahair', dcomplexion='$dacomplexion', ddatereported='$dadatereported',ddateofbirth='$dadateofbirth', dplaceofbirth='$daplaceofbirth', deducattain='$daeducattain', dworkadd='$daworkadd', dafppnprank='$daafppnprank', dunitassign='$daunitassign', dgroupaff='$dagroupaff', dstatus='$b', ddescripteyes='$dadescripteyes', ddescripthair='$dadescripthair', dcontactname='$dacontactname', drelationship='$darelationship', drelcontactno='$darelcontactno', demail='$daemail', ddeleted='No', dtype='arrested'";

        #
        if(mysqli_query($conn, $sql)){
          header("Location:admin-drugarradd.php?success=Data has been edited successfully!");
        } else {
          echo '<script> alert("Failed to delete1"); </script>';
        }
      } else {
        echo '<script> alert("Failed to delete2"); </script>';
      }
    }
  }


# Moving into Drug person Recovery Data
if (isset($_POST['ddeletedata']))
{
	$ddelid = $_POST['ddelete_id'];

	$query= "UPDATE tbl_drug SET ddeleted ='Yes' WHERE ID='$ddelid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:admin-druglist.php?success=Deleted Successfully");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}
# Restoring drug person Data
if (isset($_POST['darestoredata']))
{
	$iresid = $_POST['darestore_id'];

	$query= "UPDATE tbl_drug SET ddeleted ='No' WHERE ID='$iresid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:admin-drugrecover.php?success=Data has been successfully restored!");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

#Deleting drug Data

if (isset($_POST['dapdeletedata'])) 
{
	$ipid = $_POST['dapdelete_id'];

	$q = "DELETE FROM tbl_drug WHERE ID='$ipid'";
	$q_run = mysqli_query($conn, $q);

	if ($q_run) 
	{
		echo '<script> alert("Deleted"); </script>';
		header("Location:admin-drugrecover.php?success=Data has been successfully deleted!");
	}
	else
	{
		echo '<script> alert("Failed to delete"); </script>';
	}
}

# Transferring drug data to edit
if(isset($_POST['dpassdatabtn'])){
	$ipassdataid = $_POST['dpassdataid'];


	$_SESSION['deditids'] = $ipassdataid;
	header("Location:admin-drugarredit.php");
	exit();
}


# drug arrested edit data

if (isset($_POST['drugarredit'])) {
    // for the database
    $deid = $_POST['daedit_id'];	
    $dainvestigno = stripslashes($_POST['dainvestigno']);
    $dafullname = stripslashes($_POST['dafullname']);
    $danickname = stripslashes($_POST['danickname']);
    $dacivilstatus = stripslashes($_POST['dacivilstatus']);
    $dagender = stripslashes($_POST['dagender']);
    $damobileno = stripslashes($_POST['damobileno']);
    $daaddress = stripslashes($_POST['daaddress']);
    $daoccupation = stripslashes($_POST['daoccupation']);
    $danationality = stripslashes($_POST['danationality']);
    $daweight = stripslashes($_POST['daweight']);
    $daheight = stripslashes($_POST['daheight']);
    $dacoloreyes = stripslashes($_POST['dacoloreyes']);
    $dahair = stripslashes($_POST['dahair']);
    $dacomplexion = stripslashes($_POST['dacomplexion']);
    $dadatereported = stripslashes($_POST['dadatereported']);
    $dadateofbirth = stripslashes($_POST['dadateofbirth']);
    $daplaceofbirth = stripslashes($_POST['daplaceofbirth']);
    $daeducattain = stripslashes($_POST['daeducattain']);
    $daworkadd = stripslashes($_POST['daworkadd']);
    $daafppnprank = stripslashes($_POST['daafppnprank']);
    $daunitassign = stripslashes($_POST['daunitassign']);
    $dagroupaff = stripslashes($_POST['dagroupaff']);
    $dadescripteyes = stripslashes($_POST['dadescripteyes']);
    $dadescripthair = stripslashes($_POST['dadescripthair']);
    $dacontactname = stripslashes($_POST['dacontactname']);
    $darelationship = stripslashes($_POST['darelationship']);
    $darelcontactno = stripslashes($_POST['darelcontactno']);
    $daemail = stripslashes($_POST['daemail']);
    $profileImageName = time() . '-' . $_FILES["dprofile_image"]["name"];
    $nophoto = 1;


    // For image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($profileImageName);

    $user_data = 'dinvestigno='. $dainvestigno.'&dfullname='. $dafullname.'&dnickname='. $danickname.'&dcivilstatus='. $dacivilstatus.'&dgender='. $dagender.'&dmobileno='. $damobileno.'&daddress='. $daaddress.'&doccupation='. $daoccupation.'&dnationality='. $danationality.'&dweight='. $daweight.'&dheight='. $daheight.'&dcoloreyes='. $dacoloreyes.'&dhair='. $dahair.'&dcomplexion='. $dacomplexion.'&ddatereported='. $dadatereported.'&ddateofbirth='. $dadateofbirth.'&dplaceofbirth='. $daplaceofbirth.'&deducattain='. $daeducattain.'&dworkadd='. $daworkadd.'&dafppnprank='. $daafppnprank.'&dunitassign='. $daunitassign.'&dgroupaff='. $dagroupaff.'&ddescripteyes='. $dadescripteyes.'&ddescripthair='. $dadescripthair.'&dcontactname='. $dacontactname.'&drelationship='. $darelationship.'&drelcontactno='. $darelcontactno.'&demail='. $daemail;

    	if ($nophoto > 0) {
      	$sql1 = "UPDATE tbl_drug SET dinvestigno='$dainvestigno', dfullname='$dafullname', dnickname='$danickname', dcivilstatus='$dacivilstatus', dgender='$dagender', dmobileno='$damobileno', daddress='$daaddress', doccupation='$daoccupation', dnationality='$danationality', dweight='$daweight', dheight='$daheight', dcoloreyes='$dacoloreyes', dhair='$dahair', dcomplexion='$dacomplexion', ddatereported='$dadatereported',ddateofbirth='$dadateofbirth', dplaceofbirth='$daplaceofbirth', deducattain='$daeducattain', dworkadd='$daworkadd', dafppnprank='$daafppnprank', dunitassign='$daunitassign', dgroupaff='$dagroupaff', ddescripteyes='$dadescripteyes', ddescripthair='$dadescripthair', dcontactname='$dacontactname', drelationship='$darelationship', drelcontactno='$darelcontactno', demail='$daemail' WHERE ID='$deid'";

        #
        if(mysqli_query($conn, $sql1)){
          header("Location:admin-drugarredit.php?success=Data has been edited successfully!");
        } else {
          echo '<script> alert("Failed to edit!"); </script>';
        }
     }
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['dprofile_image']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["dprofile_image"]["tmp_name"], $target_file)) {
      	
        $sql = "UPDATE tbl_drug SET dprofile_image='$profileImageName', dinvestigno='$dainvestigno', dfullname='$dafullname', dnickname='$danickname', dcivilstatus='$dacivilstatus', dgender='$dagender', dmobileno='$damobileno', daddress='$daaddress', doccupation='$daoccupation', dnationality='$danationality', dweight='$daweight', dheight='$daheight', dcoloreyes='$dacoloreyes', dhair='$dahair', dcomplexion='$dacomplexion', ddatereported='$dadatereported',ddateofbirth='$dadateofbirth', dplaceofbirth='$daplaceofbirth', deducattain='$daeducattain', dworkadd='$daworkadd', dafppnprank='$daafppnprank', dunitassign='$daunitassign', dgroupaff='$dagroupaff', ddescripteyes='$dadescripteyes', ddescripthair='$dadescripthair', dcontactname='$dacontactname', drelationship='$darelationship', drelcontactno='$darelcontactno', demail='$daemail' WHERE ID='$deid'";

        #
        if(mysqli_query($conn, $sql)){
          header("Location:admin-drugarredit.php?success=Data has been edited successfully!&$user_data");
        } else {
          echo '<script> alert("Failed to edit!"); </script>';
        }
      } else {
       echo '<script> alert("Failed to edit!"); </script>';
      }
    }
  }


# drug surrendered add data

if (isset($_POST['sdrugarrsave'])) {
    // for the database
    $dainvestigno = stripslashes($_POST['sdainvestigno']);
    $dafullname = stripslashes($_POST['sdafullname']);
    $danickname = stripslashes($_POST['sdanickname']);
    $dacivilstatus = stripslashes($_POST['sdacivilstatus']);
    $dagender = stripslashes($_POST['sdagender']);
    $damobileno = stripslashes($_POST['sdamobileno']);
    $daaddress = stripslashes($_POST['sdaaddress']);
    $daoccupation = stripslashes($_POST['sdaoccupation']);
    $danationality = stripslashes($_POST['sdanationality']);
    $daweight = stripslashes($_POST['sdaweight']);
    $daheight = stripslashes($_POST['sdaheight']);
    $dacoloreyes = stripslashes($_POST['sdacoloreyes']);
    $dahair = stripslashes($_POST['sdahair']);
    $dacomplexion = stripslashes($_POST['sdacomplexion']);
    $dadatereported = stripslashes($_POST['sdadatereported']);
    $dadateofbirth = stripslashes($_POST['sdadateofbirth']);
    $daplaceofbirth = stripslashes($_POST['sdaplaceofbirth']);
    $daeducattain = stripslashes($_POST['sdaeducattain']);
    $daworkadd = stripslashes($_POST['sdaworkadd']);
    $daafppnprank = stripslashes($_POST['sdaafppnprank']);
    $daunitassign = stripslashes($_POST['sdaunitassign']);
    $dagroupaff = stripslashes($_POST['sdagroupaff']);
    $dastatus = stripslashes($_POST['sdastatus']);
    $b = html_entity_decode($dastatus);
    $dadescripteyes = stripslashes($_POST['sdadescripteyes']);
    $dadescripthair = stripslashes($_POST['sdadescripthair']);
    $dacontactname = stripslashes($_POST['sdacontactname']);
    $darelationship = stripslashes($_POST['sdarelationship']);
    $darelcontactno = stripslashes($_POST['sdarelcontactno']);
    $daemail = stripslashes($_POST['sdaemail']);
    $profileImageName = time() . '-' . $_FILES["sdprofile_image"]["name"];


    // For image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['sdprofile_image']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    $user_data = 'sdainvestigno='. $dainvestigno.'&sdafullname='. $dafullname.'&sdanickname='. $danickname.'&sdacivilstatus='. $dacivilstatus.'&sdagender='. $dagender.'&sdamobileno='. $damobileno.'&sdaaddress='. $daaddress.'&sdaoccupation='. $daoccupation.'&sdanationality='. $danationality.'&sdaweight='. $daweight.'&sdaheight='. $daheight.'&sdacoloreyes='. $dacoloreyes.'&sdahair='. $dahair.'&sdacomplexion='. $dacomplexion.'&sdadatereported='. $dadatereported.'&sdadateofbirth='. $dadateofbirth.'&sdaplaceofbirth='. $daplaceofbirth.'&sdaeducattain='. $daeducattain.'&sdaworkadd='. $daworkadd.'&sdaafppnprank='. $daafppnprank.'&sdaunitassign='. $daunitassign.'&sdagroupaff='. $dagroupaff.'&sdastatus='. $b.'&sdadescripteyes='. $dadescripteyes.'&sdadescripthair='. $dadescripthair.'&sdacontactname='. $dacontactname.'&sdarelationship='. $darelationship.'&sdarelcontactno='. $darelcontactno.'&sdaemail='. $daemail;


	if(empty($dainvestigno)){
        header("Location: admin-drugsurradd.php?error=Investigation No. is required&$user_data");
	    exit();
	}
	elseif (!preg_match('/^[0-9]*$/', $damobileno)) {
         header("Location: admin-drugsurradd.php?error= Use only number for age&$user_data");
	    exit();
     }
	else if(empty($dafullname)) {
		header("Location: admin-drugsurradd.php?error=Name of Subject is required&$user_data");
	    exit();
	}
	else if(empty($danickname)){
        header("Location: admin-drugsurradd.php?error=Allias is required&$user_data");
	    exit();
	}
	else if(empty($dacivilstatus)){
        header("Location: admin-drugsurradd.php?error=Civil Status is required&$user_data");
	    exit();
	}
	else if(empty($dagender)){
        header("Location: admin-drugsurradd.php?error=Gender is required&$user_data");
	    exit();
	}
	else if(empty($damobileno)){
        header("Location: admin-drugsurradd.php?error=Mobile No. is required&$user_data");
	    exit();
	}
	else if(empty($daaddress)){
        header("Location: admin-drugsurradd.php?error=Address is required&$user_data");
	    exit();
	}
	else if(empty($daoccupation)){
        header("Location: admin-drugsurradd.php?error=Occupation is required&$user_data");
	    exit();
	}
	else if(empty($danationality)){
        header("Location: admin-drugsurradd.php?error=Nationality is required&$user_data");
	    exit();
	}
	else if(empty($daweight)){
        header("Location: admin-drugsurradd.php?error=Weight is required&$user_data");
	    exit();
	}
	else if(empty($daheight)){
        header("Location: admin-drugsurradd.php?error=Height is required&$user_data");
	    exit();
	}
	else if(empty($dacoloreyes)){
        header("Location: admin-drugsurradd.php?error=Color Eyes is required&$user_data");
	    exit();
	}
	else if(empty($dahair)) {
		header("Location: admin-drugsurradd.php?error=Color Hair is required&$user_data");
	    exit();
	}
	else if(empty($dacomplexion)){
        header("Location: admin-drugsurradd.php?error=Complexion is required&$user_data");
	    exit();
	}
	else if(empty($dadatereported)){
        header("Location: admin-drugsurradd.php?error=Date Reported is required&$user_data");
	    exit();
	}
	else if(empty($dadateofbirth)){
        header("Location: admin-drugsurradd.php?error=Date of Birth is required&$user_data");
	    exit();
	}
	else if(empty($daplaceofbirth)){
        header("Location: admin-drugsurradd.php?error=Place of Birth is required&$user_data");
	    exit();
	}
	else if(empty($daeducattain)){
        header("Location: admin-drugsurradd.php?error=Highest Educational Attainment is required&$user_data");
	    exit();
	}
	else if(empty($daworkadd)){
        header("Location: admin-drugsurradd.php?error=Work Address is required&$user_data");
	    exit();
	}
	else if(empty($daafppnprank)){
        header("Location: admin-drugsurradd.php?error=AFP/PNP Rank is required&$user_data");
	    exit();
	}
	else if(empty($daunitassign)){
        header("Location: admin-drugsurradd.php?error=Unit Assignment is required&$user_data");
	    exit();
	}
	else if(empty($dagroupaff)){
        header("Location: admin-drugsurradd.php?error=Group Affliation is required&$user_data");
	    exit();
	}
	else if(empty($b)){
        header("Location: admin-drugsurradd.php?error=Status is required&$user_data");
	    exit();
	}
	else if(empty($dadescripteyes)){
        header("Location: admin-drugsurradd.php?error=Description of Eyes is required&$user_data");
	    exit();
	}
	else if(empty($dadescripthair)){
        header("Location: admin-drugsurradd.php?error=Description of Hair is required&$user_data");
	    exit();
	}
	else if(empty($dacontactname)){
        header("Location: admin-drugsurradd.php?error=Contact Name is required&$user_data");
	    exit();
	}
	else if(empty($darelationship)){
        header("Location: admin-drugsurradd.php?error=Relationship is required&$user_data");
	    exit();
	}
	else if(empty($darelcontactno)){
        header("Location: admin-drugsurradd.php?error=Contact Number is required&$user_data");
	    exit();
	}
	else if(empty($daemail)){
        header("Location: admin-drugsurradd.php?error=Email is required&$user_data");
	    exit();
	}
    // check if file exists
    if(file_exists($target_file)) {
      header("Location: admin-drugsurradd.php?error=This photo is already Exist&$user_data");
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["sdprofile_image"]["tmp_name"], $target_file)) {
      	
        $sql = "INSERT INTO tbl_drug SET dprofile_image='$profileImageName',ddateup = NOW(), dinvestigno='$dainvestigno', dfullname='$dafullname', dnickname='$danickname', dcivilstatus='$dacivilstatus', dgender='$dagender', dmobileno='$damobileno', daddress='$daaddress', doccupation='$daoccupation', dnationality='$danationality', dweight='$daweight', dheight='$daheight', dcoloreyes='$dacoloreyes', dhair='$dahair', dcomplexion='$dacomplexion', ddatereported='$dadatereported',ddateofbirth='$dadateofbirth', dplaceofbirth='$daplaceofbirth', deducattain='$daeducattain', dworkadd='$daworkadd', dafppnprank='$daafppnprank', dunitassign='$daunitassign', dgroupaff='$dagroupaff', dstatus='$b', ddescripteyes='$dadescripteyes', ddescripthair='$dadescripthair', dcontactname='$dacontactname', drelationship='$darelationship', drelcontactno='$darelcontactno', demail='$daemail', ddeleted='No', dtype='surrendered'";

        #
        if(mysqli_query($conn, $sql)){
          header("Location:admin-drugsurradd.php?success=Data has been edited successfully!");
        } else {
          echo '<script> alert("Failed to delete1"); </script>';
        }
      } else {
        echo '<script> alert("Failed to delete2"); </script>';
      }
    }
  }




 # Moving into surrendered Drug person Recovery Data
if (isset($_POST['sddeletedata']))
{
	$sddelid = $_POST['sddelete_id'];

	$query= "UPDATE tbl_drug SET ddeleted ='Yes' WHERE ID='$sddelid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:admin-druglist.php?success=Deleted Successfully");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}
# Restoring drug person Data
if (isset($_POST['sdarestoredata']))
{
	$sdresid = $_POST['sdarestore_id'];

	$query= "UPDATE tbl_drug SET ddeleted ='No' WHERE ID='$sdresid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {

		header("Location:admin-drugrecover.php?success=Data has been successfully restored!");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

#Deleting drug Data

if (isset($_POST['sdapdeletedata'])) 
{
	$ipid = $_POST['sdapdelete_id'];

	$q = "DELETE FROM tbl_drug WHERE ID='$ipid'";
	$q_run = mysqli_query($conn, $q);

	if ($q_run) 
	{
		echo '<script> alert("Deleted"); </script>';
		header("Location:admin-drugrecover.php?surrendered&success=Data has been successfully deleted!");
	}
	else
	{
		echo '<script> alert("Failed to delete"); </script>';
	}
}

# Transferring drug data to edit
if(isset($_POST['sdpassdatabtn'])){
	$sdpassdataid = $_POST['sdpassdataid'];


	$_SESSION['deditids'] = $sdpassdataid;
	header("Location:admin-drugsurredit.php");
	exit();
}



# drug surrendered edit data

if (isset($_POST['sdrugarredit'])) {
    // for the database
    $deid = $_POST['sdaedit_id'];	
    $dainvestigno = stripslashes($_POST['sdainvestigno']);
    $dafullname = stripslashes($_POST['sdafullname']);
    $danickname = stripslashes($_POST['sdanickname']);
    $dacivilstatus = stripslashes($_POST['sdacivilstatus']);
    $dagender = stripslashes($_POST['sdagender']);
    $damobileno = stripslashes($_POST['sdamobileno']);
    $daaddress = stripslashes($_POST['sdaaddress']);
    $daoccupation = stripslashes($_POST['sdaoccupation']);
    $danationality = stripslashes($_POST['sdanationality']);
    $daweight = stripslashes($_POST['sdaweight']);
    $daheight = stripslashes($_POST['sdaheight']);
    $dacoloreyes = stripslashes($_POST['sdacoloreyes']);
    $dahair = stripslashes($_POST['sdahair']);
    $dacomplexion = stripslashes($_POST['sdacomplexion']);
    $dadatereported = stripslashes($_POST['sdadatereported']);
    $dadateofbirth = stripslashes($_POST['sdadateofbirth']);
    $daplaceofbirth = stripslashes($_POST['sdaplaceofbirth']);
    $daeducattain = stripslashes($_POST['sdaeducattain']);
    $daworkadd = stripslashes($_POST['sdaworkadd']);
    $daafppnprank = stripslashes($_POST['sdaafppnprank']);
    $daunitassign = stripslashes($_POST['sdaunitassign']);
    $dagroupaff = stripslashes($_POST['sdagroupaff']);
    $dadescripteyes = stripslashes($_POST['sdadescripteyes']);
    $dadescripthair = stripslashes($_POST['sdadescripthair']);
    $dacontactname = stripslashes($_POST['sdacontactname']);
    $darelationship = stripslashes($_POST['sdarelationship']);
    $darelcontactno = stripslashes($_POST['sdarelcontactno']);
    $daemail = stripslashes($_POST['sdaemail']);
    $profileImageName = time() . '-' . $_FILES["sdprofile_image"]["name"];
    $nophoto = 1;


    // For image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($profileImageName);

    $user_data = 'sdainvestigno='. $dainvestigno.'&sdafullname='. $dafullname.'&sdanickname='. $danickname.'&sdacivilstatus='. $dacivilstatus.'&sdagender='. $dagender.'&sdamobileno='. $damobileno.'&sdaaddress='. $daaddress.'&sdaoccupation='. $daoccupation.'&sdanationality='. $danationality.'&sdaweight='. $daweight.'&sdaheight='. $daheight.'&sdacoloreyes='. $dacoloreyes.'&sdahair='. $dahair.'&sdacomplexion='. $dacomplexion.'&sdadatereported='. $dadatereported.'&sdadateofbirth='. $dadateofbirth.'&sdaplaceofbirth='. $daplaceofbirth.'&sdaeducattain='. $daeducattain.'&sdaworkadd='. $daworkadd.'&sdaafppnprank='. $daafppnprank.'&sdaunitassign='. $daunitassign.'&sdagroupaff='. $dagroupaff.'&sdadescripteyes='. $dadescripteyes.'&sdadescripthair='. $dadescripthair.'&sdacontactname='. $dacontactname.'&sdarelationship='. $darelationship.'&sdarelcontactno='. $darelcontactno.'&sdaemail='. $daemail;

    	if ($nophoto > 0) {
      	$sql1 = "UPDATE tbl_drug SET dinvestigno='$dainvestigno', dfullname='$dafullname', dnickname='$danickname', dcivilstatus='$dacivilstatus', dgender='$dagender', dmobileno='$damobileno', daddress='$daaddress', doccupation='$daoccupation', dnationality='$danationality', dweight='$daweight', dheight='$daheight', dcoloreyes='$dacoloreyes', dhair='$dahair', dcomplexion='$dacomplexion', ddatereported='$dadatereported',ddateofbirth='$dadateofbirth', dplaceofbirth='$daplaceofbirth', deducattain='$daeducattain', dworkadd='$daworkadd', dafppnprank='$daafppnprank', dunitassign='$daunitassign', dgroupaff='$dagroupaff', ddescripteyes='$dadescripteyes', ddescripthair='$dadescripthair', dcontactname='$dacontactname', drelationship='$darelationship', drelcontactno='$darelcontactno', demail='$daemail' WHERE ID='$deid'";

        #
        if(mysqli_query($conn, $sql1)){
          header("Location:admin-drugsurredit.php?success=Data has been edited successfully!");
        } else {
          echo '<script> alert("Failed to edit!"); </script>';
        }
     }
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['dprofile_image']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["sdprofile_image"]["tmp_name"], $target_file)) {
      	
        $sql = "UPDATE tbl_drug SET dprofile_image='$profileImageName', dinvestigno='$dainvestigno', dfullname='$dafullname', dnickname='$danickname', dcivilstatus='$dacivilstatus', dgender='$dagender', dmobileno='$damobileno', daddress='$daaddress', doccupation='$daoccupation', dnationality='$danationality', dweight='$daweight', dheight='$daheight', dcoloreyes='$dacoloreyes', dhair='$dahair', dcomplexion='$dacomplexion', ddatereported='$dadatereported',ddateofbirth='$dadateofbirth', dplaceofbirth='$daplaceofbirth', deducattain='$daeducattain', dworkadd='$daworkadd', dafppnprank='$daafppnprank', dunitassign='$daunitassign', dgroupaff='$dagroupaff', ddescripteyes='$dadescripteyes', ddescripthair='$dadescripthair', dcontactname='$dacontactname', drelationship='$darelationship', drelcontactno='$darelcontactno', demail='$daemail' WHERE ID='$deid'";

        #
        if(mysqli_query($conn, $sql)){
          header("Location:admin-drugsurredit.php?success=Data has been edited successfully!&$user_data");
        } else {
          echo '<script> alert("Failed to edit!"); </script>';
        }
      } else {
       echo '<script> alert("Failed to edit!"); </script>';
      }
    }
  }

# Transferring drug data to edit
if(isset($_POST['pbpassdatabtn'])){
	$ipassdataid = $_POST['pbpassdataid'];


	$_SESSION['pbeditids'] = $ipassdataid;
	header("Location:DO-Blotterbookedit.php");
	exit();
}

if(isset($_POST['pbeditdata'])){
	$eeditid = $_POST['inciid'];
	$ebevent = $_POST['ebevent'];
	$ebdisposition = $_POST['ebdisposition'];

	$sql = "UPDATE tbl_blotter SET bincidentevent='$ebevent', bdisposition='$ebdisposition' WHERE entryno='$eeditid'";

        #
        if(mysqli_query($conn, $sql)){
          header("Location:DO-Blotterbookedit.php?success=Data has been edited successfully!");
        } else {
          echo '<script> alert("Failed to edit!"); </script>';
        }
}


# Moving into Blotter Recovery Data
if (isset($_POST['pbdeletedata']))
{
	$sdelid = $_POST['pbdelete_id'];

	$query= "UPDATE tbl_blotter SET bdeleted ='Yes' WHERE entryno='$sdelid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:DO-Blotterbook.php?success=Deleted Successfully");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

# Restoring Blotter Data
if (isset($_POST['pbrestoredata']))
{
	$sresid = $_POST['pbrestore_id'];

	$query= "UPDATE tbl_blotter SET bdeleted ='No' WHERE entryno='$sresid'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:DO-Blotterbookrecovery.php?success=Data has been successfully restored!");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

#Deleting Blotter Data

if (isset($_POST['pbpdeletedata'])) 
{
	$spid = $_POST['pbpdelete_id'];

	$q = "DELETE FROM tbl_blotter WHERE entryno='$spid'";
	$q_run = mysqli_query($conn, $q);

	if ($q_run) 
	{
		echo '<script> alert("Deleted"); </script>';
		header("Location:DO-Blotterbookrecovery.php?success=Data has been successfully deleted!");
	}
	else
	{
		echo '<script> alert("Failed to delete"); </script>';
	}
}



# Transferring data from step 1 to step 2
if (isset($_POST['proceedirfbtn'])) {
	$pirf = $_POST['proceedirfid'];
	$backupsession = $_POST['proceedirfid'];
	

	
	$_SESSION['backupirfid'] = $backupsession;
	$_SESSION['createirf'] = $pirf;
	header("Location:admin-irf.php");
}

# Transferring back data from step 2 to step 1
if(isset($_POST['backtoedit'])){
	$backid = $_POST['backid'];
	$pirf = 0;

	$_SESSION['createirf'] = $pirf;
	$_SESSION['backid'] = $backid;
	header("Location:admin-irf.php");
	exit();
}

# Transferring again the data from Step 1 to Step 2
if(isset($_POST['itemabtnup'])) {


	$bno = $_POST['upben'];
	$incitype = $_POST['uptoi'];
	$drep = $_POST['updr'];
	$trep = $_POST['uptr'];
	$dinci = $_POST['updi'];
	$tinci = $_POST['upti'];
	$istc = $_POST['upiic'];


	$surname = $_POST['upilastname'];
	$firstname = $_POST['upifirstname'];
	$middlename = $_POST['upimidname'];
	$nickname = $_POST['upinickname'];
	$civilstatus = $_POST['upicivilstatus'];
	$gender = $_POST['upigender'];
	$dateofbirth = $_POST['upibirthday'];
	$age = $_POST['upiage'];
	$mobilenumber = $_POST['upimobileno'];
	$citizenship = $_POST['upicitizen'];
	$placeofbirth = $_POST['upiplaceofbirth'];
	$completeaddress = $_POST['upiaddress'];
	$educational = $_POST['upihigheduc'];
	$occupation = $_POST['upioccu'];
	$workaddress = $_POST['upiworkadd'];
	$email = $_POST['upiemail'];
	


		
		$irfup = "UPDATE tbl_irf SET incitype='$incitype', datereported='$drep', timereported='$trep', dateincident='$dinci', timeincident='$tinci', isitcrime='$istc' WHERE blotterno ='$bno'";

		$irfresultup = mysqli_query($conn, $irfup);
		
		

          if ($irfresultup) {
          	$_SESSION['mybackid2'] = $bno;
			header("Location: admin-irftwo.php");
			 exit();
		     }else {
			     header("Location: admin-irf.php?error=unknown error occurred&$user_data");
				exit();
          }
	}


# Transferring data from step 2 to step 3
if(isset($_POST['itembbtn'])){
	$pirf = $_POST['ibnextno'];

	$_SESSION['createirf'] = $pirf;
	header("Location:admin-irfthree.php");
	exit();
}
# Transferring back the data from Step 3 to Step 2
if(isset($_POST['back32'])){
	header("Location:admin-irftwo.php");
	exit();
}

# Transferring data from step 3 to step 4
if(isset($_POST['itemcbtn'])){
	$pirf = $_POST['icnextno'];

	$_SESSION['createirf'] = $pirf;
	header("Location:admin-irffour.php");
	exit();
}
# Transferring back the data from step 4 to step 3
if(isset($_POST['back43'])){
	header("Location:admin-irfthree.php");
	exit();
}



# Narrative incident to Authentication from step 4 to Step 5
if (isset($_POST['itemdbtn']))
{
	$id = $_POST['blotterno4'];
	$ids2 = 'IS-';
	$ids3 = $ids2.$id;
	$placeinci = $_POST['placeinci'];
	$narainci = $_POST['narrainci'];

	$fbarangay = $_POST['fbarangay'];
	$fmuni = $_POST['fmuni'];
	$fprovince = $_POST['fprovince'];


	$query= "UPDATE tbl_irf SET narrativerep ='$narainci', placeofinci ='$placeinci', barangay ='$fbarangay', municipality ='$fmuni', province ='$fprovince', status = 'On-Going' WHERE blotterno='$ids3'";
	$query_run = mysqli_query($conn, $query);

	$blotterupstatus1 = "UPDATE tbl_blotter SET bstatus='On-Going' WHERE entryno='$id'";
		$bupstats = mysqli_query($conn, $blotterupstatus1);

	if ($query_run) {
		if ($bupstats) {
			$_SESSION['backupirfid'] = $id;
			$_SESSION['createirf'] = $id;
			header("Location:admin-irfauth.php");
		}
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

# Transfering data from Authentication to Narrative incident
if(isset($_POST['backtoedit54'])){
	$backid = $_POST['backid54'];
	$pirf = 0;

	$_SESSION['createirf'] = $pirf;
	$_SESSION['backid'] = $backid;
	header("Location:admin-irffour.php");
	exit();
}

#Transferring Again Narrative incident to Authentication from step 4 to Step 5
if (isset($_POST['itemdbtnup']))
{
	$id = $_POST['fourtofiveup'];
	$placeinci = $_POST['placeinciup'];
	$narainci = $_POST['narrainciup'];
	$id2 = 'IS-';
	$id3 = $id2.$id;


	$query= "UPDATE tbl_irf SET narrativerep ='$narainci', placeofinci ='$placeinci' WHERE blotterno='$id3'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		$_SESSION['backupirfid2'] = $id;
		header("Location:admin-irfauth.php");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

# Transferring data from step 3 to step 4
if(isset($_POST['back43up'])){
	$pirf = $_POST['blotterno4'];

	$_SESSION['createirf'] = $pirf;
	header("Location:admin-irfthree.php");
	exit();
}

if (isset($_POST['finishna'])) {
	header("Location:admin-DOblotterbook.php?success=Successfully Added to IRF");
}

if(isset($_POST['addevidencebtn'])){
	$pirf = $_POST['addevidenceid'];

	$_SESSION['evinoid'] = $pirf;
	header("Location:admin-crimeaddevidence.php");
	exit();
}

if(isset($_POST['suspectlistbtn'])){
	$pirf = $_POST['suspectlistid'];
	$sss = $_POST['suspectlisttype'];

	$_SESSION['sllist'] = $pirf;
	$_SESSION['inclist'] = $sss;
	header("Location:admin-crimesuspectlist.php");
	exit();
}

if(isset($_POST['bookarrbtn'])){
	$pirf = $_POST['bookarrid'];
	$sus = $_POST['suspectid'];

	$_SESSION['bookarid'] = $pirf;
	$_SESSION['susid'] = $sus;
	header("Location:admin-crimebookarrest.php");
	exit();
}

#add booking arrest.

if (isset($_POST['bookcomparr'])) {
    // for the database
    $susidno = stripslashes($_POST['susidno']);
    $investigno = stripslashes($_POST['investigno']);
    $fullname = stripslashes($_POST['fullname']);
    $nameofschool = stripslashes($_POST['nameofschool']);
    $schoolloc = stripslashes($_POST['schoolloc']);
    $idmarks = stripslashes($_POST['idmarks']);
    $driverlic = stripslashes($_POST['driverlic']);
    $issueat = stripslashes($_POST['issueat']);
    $issueon = stripslashes($_POST['issueon']);
    $residentcert = stripslashes($_POST['residentcert']);
    $rdissue = stripslashes($_POST['rdissue']);
    $pissue = stripslashes($_POST['pissue']);
    $othidcard = stripslashes($_POST['othidcard']);
    $idnr = stripslashes($_POST['idnr']);
    $nameoffather = stripslashes($_POST['nameoffather']);
    $fage = stripslashes($_POST['fage']);
    $fadd = stripslashes($_POST['fadd']);
    $nameofmother = stripslashes($_POST['nameofmother']);
    $mage = stripslashes($_POST['mage']);
    $madd = stripslashes($_POST['madd']);
    $cname = stripslashes($_POST['cname']);
    $rel = stripslashes($_POST['rel']);
    $npadd = stripslashes($_POST['npadd']);
    $npnum = stripslashes($_POST['npnum']);
    $law = stripslashes($_POST['law']);
    $lawnum = stripslashes($_POST['lawnum']);
    $doc = stripslashes($_POST['doc']);
    $docnum = stripslashes($_POST['docnum']);
    $healthprob = stripslashes($_POST['healthprob']);
    $offench = stripslashes($_POST['offench']);
    $wherearr = stripslashes($_POST['wherearr']);
    $datearr = stripslashes($_POST['datearr']);
    $nameofarroff = stripslashes($_POST['nameofarroff']);
    $unit = stripslashes($_POST['unit']);
    $profileImageName = time() . '-' . $_FILES["profile_image"]["name"];


    // For image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profile_image']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }


	
    // check if file exists
    if(file_exists($target_file)) {
      header("Location: admin-crimebookarrest.php?error=This photo is already Exist");
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
      	
        $sql = "INSERT INTO tbl_arrest SET investigno='$investigno', fullname='$fullname', nameofschool='$nameofschool', schoolloc='$schoolloc', idmarks='$idmarks', driverlic='$driverlic', issueat='$issueat', issueon='$issueon', residentcert='$residentcert', rdissue='$rdissue', pissue='$pissue', othidcard='$othidcard', idnr='$idnr', nameoffather='$nameoffather', fage='$fage', fadd='$fadd', nameofmother='$nameofmother', mage='$mage', madd='$madd', cname='$cname', rel='$rel', npadd='$npadd', npnum='$npnum', law='$law', lawnum='$lawnum', doc='$doc', docnum='$docnum', healthprob='$healthprob', offench='$offench',wherearr='$wherearr', datearr='$datearr', nameofarroff='$nameofarroff', unit='$unit', profile_image='$profileImageName'";
        $sql_run = mysqli_query($conn, $sql);

        $query= "UPDATE tbl_suspect SET status ='Completed' WHERE id='$susidno'";

        $query_run = mysqli_query($conn, $query);
        
        if($sql_run){
        	if ($query_run) {
        		header("Location:admin-crimesuspectlist.php?success=Data has been book an arrest successfully!");
        	}
        } else {
          echo '<script> alert("Failed to delete1"); </script>';
        }
      } else {
        echo '<script> alert("Failed to delete2"); </script>';
      }
    }
  }



  if(isset($_POST['tempreg'])) {


	$user = $_POST['tempuser'];
	$pass = $_POST['temppass'];
	$acclvl = $_POST['acclvl'];




		
		$irf = "INSERT INTO tbl_accounts(username,password,acclvl,status) VALUES('$user', '$pass', '$acclvl','pending')";

		$irfresult = mysqli_query($conn, $irf);
		
		

         
        if ($irfresult) {
        		header("Location:main-dashboard.php?success=Data has been successfully added!");
        	}else {
          echo '<script> alert("Failed to add temporary"); </script>';
        }
	}

	if(isset($_POST['delreg'])) {


	$delid = $_POST['delregid'];

		$q = "DELETE FROM tbl_accounts WHERE id='$delid'";
		$result = mysqli_query($conn, $q);
		
		if ($result) {
        		header("Location:main-dashboard.php?success=Data has been deleted successfully!");
        	}else {
          echo '<script> alert("Failed to delete"); </script>';
        }
	}



	if(isset($_POST['regbutton'])) {

    $rrid = $_POST['rrid'];
    $rrank = $_POST['rrank'];
	$rfname = $_POST['rfname'];
	$rmname = $_POST['rmname'];
	$rlname = $_POST['rlname'];
	$remail = $_POST['remail'];
	$runame = $_POST['runame'];
	$rpass = $_POST['rpass'];
	$rcpass = $_POST['rcpass'];

		if ($rpass == $rcpass) {

			$irf= "UPDATE tbl_accounts SET rank ='$rrank', rfirstname ='$rfname', rmidname ='$rmname' , rlastname ='$rlname', email ='$remail', username ='$runame', password ='$rpass', status ='done' WHERE ID='$rrid'";

			$irfresult = mysqli_query($conn, $irf);
			
			

	         
	        if ($irfresult) {
	        		header("Location:index.php?success=Successfully registered!");
	        	}else {
	          echo '<script> alert("Failed to add temporary"); </script>';
	        }	
		}
	}


	if(isset($_POST['addinci'])) {


	$inc = $_POST['inctype'];



		
		$irf = "INSERT INTO incitype(typee) VALUES('$inc')";

		$irfresult = mysqli_query($conn, $irf);
		
		

         
        if ($irfresult) {
        		header("Location:main-incident.php?success=Data has been successfully added!");
        	}else {
          echo '<script> alert("Failed to add temporary"); </script>';
        }
	}


	if(isset($_POST['delinci'])) {


	$delids = $_POST['delinciid'];

		$q = "DELETE FROM incitype WHERE id='$delids'";
		$result = mysqli_query($conn, $q);
		
		if ($result) {
        		header("Location:main-incident.php?success=Data has been deleted successfully!");
        	}else {
          echo '<script> alert("Failed to delete"); </script>';
        }
	}




	if(isset($_POST['delvic2'])) {


	$delid = $_POST['delvic2id'];

		$q = "DELETE FROM tbl_victim WHERE id='$delid'";
		$result = mysqli_query($conn, $q);
		
		if ($result) {
        		header("Location:admin-crimevictimlist.php?success=Data has been deleted successfully!");
        	}else {
          echo '<script> alert("Failed to delete"); </script>';
        }
	}



if(isset($_POST['victimlistbtn'])){
	$pirf = $_POST['victimlistid'];
	$sss = $_POST['victimlisttype'];

	$_SESSION['sllist'] = $pirf;
	$_SESSION['inclist'] = $sss;
	header("Location:admin-crimevictimlist.php");
	exit();
}


if(isset($_POST['forcompletebtn'])) {

    $forcompleteid = $_POST['forcompleteid'];

    $nono = substr($forcompleteid, 3);

		

			$irf= "UPDATE tbl_irf SET status ='Completed' WHERE blotterno='$forcompleteid'";

			$irfresult = mysqli_query($conn, $irf);

			$irf2= "UPDATE tbl_blotter SET bstatus ='Completed' WHERE entryno='$nono'";

			$irfresult2 = mysqli_query($conn, $irf2);
			
			 if ($irfresult) {
			 	if ($irfresult2) {
			 		header("Location:admin-crimelist.php?success=Crimecase Solved!");
			 	}
	        		
	        	}else {
	          echo '<script> alert("Failed to add temporary"); </script>';
	        }	
		
	}

if(isset($_POST['reloadbtn'])){
	$choose = $_POST['chooseinp'];

	
	$_SESSION['choosebtn'] = $choose;
	header("Location:admin-crimereports.php");
	exit();
}


?>