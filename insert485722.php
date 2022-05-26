<html> <head> <title> mongo and php - insert into DM, CO, and SV </title> </head>
<body> <pre>
<a href="http://grevera.ddns.net/~da660655/main.html">Back to Main Page</a><br>
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

    #example of inserting a new subject
    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2010-03-14 12:32:14' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'm',
                    'RACE'         => 'asian',
                    'COUNTRY' => 'CN' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );


    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2016-05-16 15:08:23' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'f',
                    'RACE'         => 'european',
                    'COUNTRY' => 'UN' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );


    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2013-04-28 17:33:46' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'f',
                    'RACE'         => 'italian',
                    'COUNTRY' => 'IT' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );

    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2012-02-14 08:12:32' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'm',
                    'RACE'         => 'russian',
                    'COUNTRY' => 'RU' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );


    #example of inserting a new subject
    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2010-11-19 23:12:56' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'f',
                    'RACE'         => 'african',
                    'COUNTRY' => 'SA' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );

    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2011-10-29 20:31:26' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'm',
                    'RACE'         => 'korean',
                    'COUNTRY' => 'KO' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );

    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2013-03-03 23:23:23' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'm',
                    'RACE'         => 'arabian',
                    'COUNTRY' => 'AR' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );

   #example of inserting a new subject
    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2014-07-15 16:25:34' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'm',
                    'RACE'         => 'hispanic',
                    'COUNTRY' => 'ES' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );  

    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2011-04-18 21:18:35' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'f',
                    'RACE'         => 'asian',
                    'COUNTRY' => 'CN' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );


    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2010-12-14 15:20:42' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'm',
                    'RACE'         => 'european',
                    'COUNTRY' => 'UN' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );


    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2012-09-17 22:13:45' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'm',
                    'RACE'         => 'italian',
                    'COUNTRY' => 'IT' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );

    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2010-12-25 12:00:00' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'f',
                    'RACE'         => 'russian',
                    'COUNTRY' => 'RU' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );


    #example of inserting a new subject
    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2014-10-14 13:23:28' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'm',
                    'RACE'         => 'african',
                    'COUNTRY' => 'SA' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );

    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2013-08-18 18:21:31' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'f',
                    'RACE'         => 'korean',
                    'COUNTRY' => 'KO' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );

    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2011-04-15 22:24:33' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'f',
                    'RACE'         => 'arabian',
                    'COUNTRY' => 'AR' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );

   #example of inserting a new subject
    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2010-01-12 23:21:46' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'f',
                    'RACE'         => 'hispanic',
                    'COUNTRY' => 'ES' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );

    $bulk = new MongoDB\Driver\BulkWrite();
    $usubjid = getDM( $m );
    $dob = new DateTime( '2016-01-03 24:14:36' );
    $_id = $bulk->insert([
                    'STUDYID'   => '12700',
                    'DOMAIN'   => 'DM',
                    'USUBJID'    => $usubjid,
                    'BRTHDTC'  => $dob->format( DateTime::ATOM ),  # ISO8601
                    'SEX'            => 'f',
                    'RACE'         => 'caucasian',
                    'COUNTRY' => 'ES' ]);
    echo "$_id \n";
    $result = $m->executeBulkWrite( 'da660655.DM', $bulk );


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


