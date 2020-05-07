<?php

class Purchase {

	private $order;
	private $billing;
	private $shipping;

	public function __construct(OrderInterface $order, BillingInterface $billing, ShippingInterface $shipping){

		$this->order = $order;
		$this->billing = $billing;
		$this->shipping = $shipping;
	}

	public function finish(){
		$this->billing->chargeCreditCard();
		$this->order->setStatus($this->billing->getStatus());
	
		if($this->order->isOk()){
			$this->shipping-addToPipeline($this->order);
		}
	}
}

$purchase = new Purchase($order, $billing, $shipping);
$purchase->finish();