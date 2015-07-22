<?php

class Contact extends EntityModel
{
	public static $fieldFirstName = 'Contacto - Nombre(s)';
	public static $fieldLastName = 'Contacto - Apellidos';
	public static $fieldEmail = 'Contacto - Correo electrónico';
	public static $fieldPhone = 'Contacto - Celular';

	public function client()
	{
		return $this->belongsTo('Client');
	}
	
	public function getDisplayName()
	{
		if ($this->getFullName())
		{
			return $this->getFullName();
		}
		else
		{
			return $this->email;
		}

	}

	public function getFullName()
	{
		if ($this->first_name || $this->last_name)
		{
			return $this->first_name . ' ' . $this->last_name;
		}
		else
		{
			return '';
		}
	}

}