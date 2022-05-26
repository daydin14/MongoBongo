<html>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <title> Study Subjects </title>
        </head>
        <body>
                <?php

			echo '<a href="main.html">Back to Main Page</a><br>';
			$m = new MongoDB\Driver\Manager("mongodb://da660655:706403@localhost:27017/da660655");

                        $listsubject = new MongoDB\Driver\Query([]);

                        $rows = $m->executeQuery("da660655.DM", $listsubject);

                        echo '<br/>';
                        echo '<br/>';

			foreach($rows as $r1){
                                echo "\n";
                                $subjectid = $r1->USUBJID;
				echo '<a href="subject863714.php?USUBJID='.$subjectid.'">Subject'.$subjectid.'</a>';
				echo '<br>';
                        }
			echo '<br>';
                ?>
        </body>
</html>
