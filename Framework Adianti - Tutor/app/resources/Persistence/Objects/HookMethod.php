<?php
class YourActiveRecordClass extends TRecord
{
    const TABLENAME = 'tablename';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('name');
    }
    
    public function onBeforeLoad($id)
    {
        file_put_contents('/tmp/log.txt', "onBeforeLoad: $id\n", FILE_APPEND);
    }
    
    public function onAfterLoad($object)
    {
        file_put_contents('/tmp/log.txt', 'onAfterLoad:' . json_encode($object)."\n", FILE_APPEND);
    }
    public function onBeforeStore($object)
    {
        file_put_contents('/tmp/log.txt', 'onBeforeStore:' . json_encode($object)."\n", FILE_APPEND);
    }
    
    public function onAfterStore($object)
    {
        file_put_contents('/tmp/log.txt', 'onAfterStore:' . json_encode($object)."\n", FILE_APPEND);
    }
    
    public function onBeforeDelete($object)
    {
        file_put_contents('/tmp/log.txt', 'onBeforeDelete:' . json_encode($object)."\n", FILE_APPEND);
    }
    
    public function onAfterDelete($object)
    {
        file_put_contents('/tmp/log.txt', 'onAfterDelete:' . json_encode($object)."\n", FILE_APPEND);
    }
    
}
