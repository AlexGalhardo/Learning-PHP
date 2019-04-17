<?php
require_once 'init.php';

$conn = TTransaction::open('changeman');
TTransaction::setLogger(new TLoggerSTD);

TDatabase::clearData($conn, 'issue');
for ($n=1; $n<= 300; $n++)
{
    $month = str_pad(my_rand(1,12), 2, '0', STR_PAD_LEFT);
    $day   = str_pad(my_rand(1,29), 2, '0', STR_PAD_LEFT);
    
    $issue = new Issue;
    $issue->id_user       = my_rand(2,4);
    $issue->id_status     = my_rand(1,8);
    $issue->id_project    = my_rand(1,2);
    $issue->id_priority   = my_rand(1,4);
    $issue->id_category   = my_rand(1,5);
    $issue->id_member     = my_rand(2,3);
    $issue->register_date = date("Y-$month-$day");
    $issue->close_date    = date("Y-$month-$day", strtotime("+7 days"));
    $issue->issue_time    = '10:30';
    $issue->close_time    = '11:30';
    $issue->title         = "Fix the bug $n";
    $issue->description   = "Description for the ticket $n";
    $issue->solution      = "Solution for the ticket $n";
    $issue->store();
}

function my_rand($from, $to)
{
    return round( mt_rand(0,100)/100 * ($to-$from), 0) + $from;
}

TTransaction::close();
