<?php
class BookService
{
    public static function getBookByCollection()
    {
        $conn = TTransaction::get();
        $result = $conn->query("SELECT collection.description, count(*)
                                  FROM book, collection
                                 WHERE book.collection_id = collection.id
                              GROUP BY 1");
        
        $data = [];
        if ($result)
        {
            foreach ($result as $row)
            {
                $name  = $row[0];
                $value = $row[1];
                
                $data[ $name ] = (int) $value;
            }
        }
        
        return $data;
    }
    
    public static function getBookByClassification()
    {
        $conn = TTransaction::get();
        $result = $conn->query("SELECT classification.description, count(*)
                                  FROM book, classification
                                 WHERE book.classification_id = classification.id
                              GROUP BY 1");
        
        $data = [];
        if ($result)
        {
            foreach ($result as $row)
            {
                $name  = $row[0];
                $value = $row[1];
                
                $data[ $name ] = (int) $value;
            }
        }
        
        return $data;
    }
}
