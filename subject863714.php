<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		<title> Study Subjects </title> 
	</head>
	<body>
		<br>
			<a href="http://grevera.ddns.net/~da660655/add142412.php">Add Subject</a>
		<br>
		<?php
			$m = new MongoDB\Driver\Manager("mongodb://da660655:706403@localhost:27017/da660655");

   			$listsubject = new MongoDB\Driver\Query([]);

            $rows = $m->executeQuery("da660655.DM", $listsubject);


            foreach($rows as $r1){
                                echo "\n";
                                $subjectid = $r1->USUBJID;
                                echo $r1->STUDYID;
                                echo '<br>';
                                echo $r1->DOMAIN;
                                echo '<br>';
                                echo $r1->USUBJID;
                                echo '<br>';
                                echo $r1->BRTHDTC;
                                echo '<br>';
                                echo $r1->SEX;
                                echo '<br>';
                                echo $r1->RACE;
                                echo '<br>';
                                echo $r1->COUNTRY;
                                echo '<br>';
                                echo '<br>';
                        }
            if(isset($_POST['USUBJID']))
            {
            	$subjectid = $_POST['USUBJID'];
            	$filter = (int)$subjectid;
            	echo $filter;
            }
		?>
	</body>
</html>