<html>
<head> <title> Add Visit </title> </head>
<body> <pre>

    <a href="main.html">Back</a>
    <br/><br/>

    <form action="visit346500.php" method="post" name="form">
        <table width="25%" border="0">
            <tr> 
                <td>VISIT</td>
                <td><input type="text" name="visit"></td>
            </tr>
            <tr> 
                <td>START DATE</td>
                <td><input type="text" name="startdate"></td>
            </tr>
	    <tr> 
                <td>END DATE</td>
                <td><input type="text" name="enddate"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="subjectID" value=""></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    <?php
        function getSV ( $m, $usubjid ) {
            $query = new MongoDB\Driver\Query( ['USUBJID' => $usubjid ] );
            $rows  = $m->executeQuery( "da660655.SV", $query );
            $count = 0;
            foreach ($rows as $r) {
                ++$count;
            }
            return $count + 1;
        }

        
            $bulk = new MongoDB\Driver\BulkWrite();
            $visitnum = getSV( $m, $usubjid );
            $now     = new DateTime( date("Y-m-d H:i:s") );
            $svendtc = new DateTime( date("Y-m-d H:i:s") );
            $svendtc->modify( '+1 hour' );
            $_id = $bulk->insert([
                    'STUDYID'    => '12700',
                    'DOMAIN'   => 'SV',
                    'USUBJID'    => $usubjid,
                    'VISITNUM' => $visitnum,
                    'VISIT'          => 'visit for MRI study',
                    'SVSTDTC'   => $now->format( DateTime::ATOM ),
                    'SVENDTC'  => $svendtc->format( DateTime::ATOM ) ]);


            if(isset($_POST['Submit']))
            {

                $bulk = new MongoDB\Driver\BulkWrite();
                $bulk->insert($demographics);
                $m->executeBulkWrite("da660655.DM", $bulk);
        
                echo "Visit Added\n";

            }
    ?>
