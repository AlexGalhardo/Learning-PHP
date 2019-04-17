<?php
class DBTest
{
    public function run()
    {
        TTransaction::open('samples');
        
        $repo = new TRepository('Customer');
        $customer = new Customer(1);
        print_r($customer->toArray());
        
        foreach ($customer->getContacts() as $contact)
        {
            print_r($contact->toArray());
        }
        
        $criteria = new TCriteria;
        $criteria->add(new TFilter('city_id', '=', '1'));
        $criteria->add(new TFilter('name', 'like', '%AND%'));
        $colecao = $repo->load($criteria);
        foreach ($colecao as $customer)
        {
            print_r($customer->toArray());
        }
        
        print_r(Customer::find(1)->toArray());
        print_r(Customer::find(1)->toJson());
        echo "\n";
        // var_dump(Customer::all());

        $city = new City;
        $city->name = 'asdf';
        // $city->save();
        
        $customers = Customer::where('gender', '=', 'F')->where('status', '=', 'S')->orderBy('name')->get();
        foreach ($customers as $customer)
        {
            print_r($customer->toArray());
        }
        
        $customers = Customer::orWhere('id', '=', '1')->orWhere('id', '=', '3')->get();
        foreach ($customers as $customer)
        {
            print_r($customer->toArray());
        }
        var_dump(Customer::where('gender', '=', 'F')->where('status', '=', 'S')->count());
        
        $customers = Customer::where('gender', '=', 'F')->where('status', '=', 'S')->orderBy('name')->get();
        foreach ($customers as $customer)
        {
            print_r($customer->toArray());
        }
        
        $customers = Customer::where('gender', '=', 'M')->take(3)->skip(2)->get();
        foreach ($customers as $customer)
        {
            print_r($customer->toArray());
        }
        
        // $customers = Customer::where('gender', '=', 'F')->where('status', '=', 'S')->delete();
        TTransaction::close();
    }
}
?>