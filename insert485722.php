<head> <title> mongo and php - insert into DM, CO, and SV </title> </head>
<body> <pre>

<?php
    #----------
    #this function returns the next sequential subject id (USUBJID)
    function getDM ( $m ) {
        $query = new MongoDB\Driver\Query( [] );
        $rows  = $m->executeQuery( "da660655.DM", $query );
        $count = 0;
        foreach ($rows as $r) {
            ++$count;
        }
        return $count + 1;
    }
    #----------
    #this function returns the next sequential comment number (COSEQ)
    # for a given subject (USUBJID)
    function getCO ( $m, $usubjid ) {
        $query = new MongoDB\Driver\Query( ['USUBJID' => $usubjid ] );
        $rows  = $m->executeQuery( "da660655.CO", $query );
        $count = 0;
        foreach ($rows as $r) {
            ++$count;
        }
        return $count + 1;
    }
    #----------
    #this function returns the next sequential visit number (VISITNUM)
    # for a given subject (USUBJID)
    function getSV ( $m, $usubjid ) {
        $query = new MongoDB\Driver\Query( ['USUBJID' => $usubjid ] );
        $rows  = $m->executeQuery( "da660655.SV", $query );
        $count = 0;
        foreach ($rows as $r) {
            ++$count;
        }
        return $count + 1;
    }
    #----------
    $m = new MongoDB\Driver\Manager(
                 "mongodb://da660655:706403@localhost:27017/da660655" );

    #example of inserting a new subject
    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2010-12-30 23:21:46' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'm',
                    'RACE'         => 'caucasian',
                    'COUNTRY' => 'USA' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );
    #example of inserting a new comment for the above subject
    $bulk = new MongoDB\Driver\BulkWrite();
    $coseq = getCO( $m, $usubjid );
    $now = new DateTime( date("Y-m-d H:i:s") );
    $_id = $bulk->insert([
                    'STUDYID'  => '12700',
                    'DOMAIN'  => 'CO',
                    'USUBJID'   => $usubjid,
                    'COSEQ'     => $coseq,
                    'COVAL'     => 'this is my comment',
                    'CODTC'     => $now->format( DateTime::ATOM ) ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.CO', $bulk );

    #insert another comment for the above subject
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

    #example of inserting subject visit for the above subject
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
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.SV', $bulk );

    echo "\nDone. \n";
?>

</pre> </body>
</html>
