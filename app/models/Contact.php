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
}