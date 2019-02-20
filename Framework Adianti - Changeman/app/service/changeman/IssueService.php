<?php
class IssueService
{
    public static function getIssueByState()
    {
        $conn = TTransaction::get();
        $result = $conn->query("SELECT status.description, count(issue.id)
                                  FROM issue, status
                                 WHERE issue.id_status = status.id
                                       AND status.final_state='N'
                              GROUP BY 1
                              ORDER BY 1");
        
        $data = [];
        if ($result)
        {
            foreach ($result as $row)
            {
                $name  = $row[0];
                $value  = $row[1];
                
                $data[ $name ] = (int) $value;
            }
        }
        
        return $data;
    }
    
    public static function getIssueByCategory()
    {
        $conn = TTransaction::get();
        $result = $conn->query("SELECT category.description, count(issue.id)
                                  FROM issue, status, category
                                 WHERE issue.id_status = status.id
                                       AND issue.id_category = category.id
                                       AND status.final_state='N'
                              GROUP BY 1
                              ORDER BY 1");
        
        $data = [];
        if ($result)
        {
            foreach ($result as $row)
            {
                $name  = $row[0];
                $value  = $row[1];
                
                $data[ $name ] = (int)  $value;
            }
        }
        
        return $data;
    }
    
    public static function getIssueByMonth($year)
    {
        $conn = TTransaction::get();
        $result = $conn->query("SELECT strftime('%m', register_date),
                                       count(id)
                                  FROM issue
                                 WHERE strftime('%Y', register_date) = '$year'
                                 GROUP BY 1
                                 ORDER BY 1");
        
        $data = [];
        if ($result)
        {
            foreach ($result as $row)
            {
                $month  = $row[0];
                $count  = $row[1];
                
                $data[ $month ] = (int) $count;
            }
        }
        
        return $data;
    }
}
