<html>
<head> <title> Add Comment </title> </head>
<body> <pre>

    <a href="main.html">Back</a>
    <br/><br/>

    <form action="comment795316.php" method="post" name="form">
        <table width="25%" border="0">
            <tr> 
                <td>COVAL</td>
                <td><input type="text" name="COVAL"></td>
            </tr>
            <tr> 
                <td>CODTC</td>
                <td><input type="text" name="CODTC"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="subjectID" value=""></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    <?php
        function getCO ( $m, $usubjid ) {
            $query = new MongoDB\Driver\Query( ['USUBJID' => $usubjid ] );
            $rows  = $m->executeQuery( "da660655.CO", $query );
            $count = 0;
            foreach ($rows as $r) {
                ++$count;
            }
            return $count + 1;
            }

        
            $bulk = new MongoDB\Driver\BulkWrite();
            $coseq = getCO( $m, $usubjid );
            $now = new DateTime( date("Y-m-d H:i:s") );
            $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'  => 'CO',
                    'USUBJID'   => $usubjid,
                    'COSEQ'      => $coseq,
                    'COVAL'      => 'this is another comment',
                    'CODTC'      => $now->format( DateTime::ATOM ) ]);
            echo "$_id \n";
            $result = $m->executeBulkWrite( 'da660655.CO', $bulk );



            if(isset($_POST['Submit']))
            {

                $bulk = new MongoDB\Driver\BulkWrite();
                $bulk->insert($demographics);
                $m->executeBulkWrite("da660655.DM", $bulk);
        
                echo "Comment Added\n";

            }
    ?>
