<?php
class LoanService
{
    public static function getLoanByMonth($year)
    {
        $conn = TTransaction::get();
        $result = $conn->query("SELECT strftime('%m', loan_date),
                                       count(id)
                                  FROM loan
                                 WHERE strftime('%Y', loan_date) = '$year'
                                 GROUP BY 1
                                 ORDER BY 1");
        
        $data = [];
        if ($result)
        {
            foreach ($result as $row)
            {
                $month  = $row[0];
                $count  = $row[1];
                
                $data[ $month ] = (float) $count;
            }
        }
        
        return $data;
    }
}