<?php
class CityRestService extends AdiantiRecordService
{
    const DATABASE = 'samples';
    const ACTIVE_RECORD = 'City';
    
    public function state_name($param)
    {
        TTransaction::open(self::DATABASE);
        
        $city = City::find($param['id']);
        $name = $city->state->name;
        TTransaction::close();
        
        return $name;
    }
}
