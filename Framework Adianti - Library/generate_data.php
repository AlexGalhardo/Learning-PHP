<?php
require_once 'init.php';

$conn = TTransaction::open('library');
TTransaction::setLogger(new TLoggerSTD);

TDatabase::clearData($conn, 'loan');
for ($n=1; $n<= 300; $n++)
{
    $member_id = my_rand(1,10);
    $item_id   = my_rand(1,12);
    $month     = str_pad(my_rand(1,12), 2, '0', STR_PAD_LEFT);
    $day       = str_pad(my_rand(1,29), 2, '0', STR_PAD_LEFT);
    $loan_date = date("Y-$month-$day");
    $due_date  = date("Y-$month-$day", strtotime("+7 days"));
    
    $loan = new Loan;
    $loan->member_id   = $member_id;
    $loan->item_id     = $item_id;
    $loan->loan_date   = $loan_date;
    $loan->due_date    = $due_date;
    $loan->arrive_date = $due_date;
    $loan->store();
}

function my_rand($from, $to)
{
    return round( mt_rand(0,100)/100 * ($to-$from), 0) + $from;
}

TTransaction::close();