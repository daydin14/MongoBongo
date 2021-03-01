<html>
<head> <title> Add Subject </title> </head>
<body> <pre>

    <a href="main.html">Back</a>
    <br/><br/>

    <form action="add142412.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>BRTHDTC</td>
                <td><input type="text" name="dob"></td>
            </tr>
            <tr>
                <td>SEX</td>
                <td><input type="text" name="sex"></td>
            </tr>
            <tr>
                <td>RACE</td>
                <td><input type="text" name="race"></td>
            </tr>
            <tr>
                <td>COUNTRY</td>
                <td><input type="text" name="country"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="subjectID" value=""></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    <?php
        function getDM ( $m ) {
        $query = new MongoDB\Driver\Query( [] );
        $rows  = $m->executeQuery( "da660655.DM", $query );
        $count = 0;
        foreach ($rows as $r) {
            ++$count;
        }
        return $count + 1;
        }


        if(isset($_POST['Submit']))
        {
            $m = new MongoDB\Driver\Manager("mongodb://da660655:706403@localhost:27017/da660655");

            $usubjid =getDM($m);
            $filter =(int)$usubjid;
            echo $filter;


            $demographics = array([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $filter,
                    'BRTHDTC'  => $_POST['dob'],
                    'SEX'            => $_POST['sex'],
                    'RACE'         => $_POST['race'],
                    'COUNTRY' => $_POST['country'] ]);

            $bulk = new MongoDB\Driver\BulkWrite();
            $bulk-> insert($demographics);
            $m->executeBulkWrite("da660655.DM", $bulk);
        }
    ?>

</pre> </body>
</html>