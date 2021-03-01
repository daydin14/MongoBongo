<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		<title> Study Subjects </title> 
	</head>
	<body>
		<?php
			$m = new MongoDB\Driver\Manager("mongodb://da660655:706403@localhost:27017/da660655");
            $bulk = new MongoDB\Driver\BulkWrite();
            $bulk-> delete([]);
            $m->executeBulkWrite("da660655.DM", $bulk);

            $m = new MongoDB\Driver\Manager("mongodb://da660655:706403@localhost:27017/da660655");
            $bulk = new MongoDB\Driver\BulkWrite();
            $bulk-> delete([]);
            $m->executeBulkWrite("da660655.CO", $bulk);

            $m = new MongoDB\Driver\Manager("mongodb://da660655:706403@localhost:27017/da660655");
            $bulk = new MongoDB\Driver\BulkWrite();
            $bulk-> delete([]);
            $m->executeBulkWrite("da660655.SV", $bulk);

		?>
	</body>
</html>