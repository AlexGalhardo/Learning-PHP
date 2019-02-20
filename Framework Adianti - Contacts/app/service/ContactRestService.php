<?php
/**
 * Contact REST service
 */
class ContactRestService extends AdiantiRecordService
{
    const DATABASE      = 'contacts';
    const ACTIVE_RECORD = 'Contact';
    const ATTRIBUTES    = ['id', 'name', 'address'];
    
    public static function getBetween( $request )
    {
        TTransaction::open('contacts');
        $response = array();
        
        // carrega os produtos
        $all = Contact::where('id', '>=', $request['from'])->where('id', '<=', $request['to'])->load();
        foreach ($all as $product)
        {
            $response[] = $product->toArray();
        }
        TTransaction::close();
        return $response;
    }
    
    public function name( $request )
    {
        TTransaction::open('contacts');
        $name = Contact::find($request['id'])->name;
        TTransaction::close();
        
        return $name;
    }
}
