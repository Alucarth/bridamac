<?php

class Payment extends EntityModel
{
	public function account()
	{
		return $this->belongsTo('Account');
	}

	public function invoice()
	{
		return $this->belongsTo('Invoice');
	}

	public function invitation()
	{
		return $this->belongsTo('Invitation');
	}

	public function client()
	{
		return $this->belongsTo('Client');
	}
}

Payment::created(function($payment)
{
	Activity::createPayment($payment);
});

Payment::deleting(function($payment)
{
	Activity::deletePayment($payment);
});