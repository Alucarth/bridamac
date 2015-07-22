<?php

class ImportController extends \BaseController {


    public function importClients()
	{

		return View::make('importar.import_clients');	

	}

	public function doImportClients()
	{
		$data = Session::get('data');
		Session::forget('data');

		$map = Input::get('map');
		$count = 0;
		$first = true;		

		foreach ($data as $row)
		{
			if ($first)
			{
				$first = false;
				continue;
			}

			$client = Client::createNew();		
			$contact = Contact::createNew();
			$contact->is_primary = true;
			$contact->send_invoice = true;
			$count++;

			foreach ($row as $index => $value)
			{
				$field = $map[$index];
				$value = trim($value);

				if ($field == Client::$fieldName && !$client->name)
				{
					$client->name = $value;
				}
				else if ($field == Client::$fieldBusinessName && !$client->business_name)
				{
					$client->business_name = $value;
				}
				else if ($field == Client::$fieldNit && !$client->nit)
				{
					$client->nit = $value;
				}
				else if ($field == Client::$fieldAddress1 && !$client->address1)
				{
					$client->address1 = $value;
				}
				else if ($field == Client::$fieldAddress2 && !$client->address2)
				{
					$client->address2 = $value;
				}
				else if ($field == Client::$fieldWorkPhone && !$client->work_phone)
				{
					$client->work_phone = $value;
				}
				else if ($field == Client::$fieldPrivateNotes && !$client->private_notes)
				{
					$client->private_notes = $value;
				}


				else if ($field == Contact::$fieldFirstName && !$contact->first_name)
				{
					$contact->first_name = $value;
				}
				else if ($field == Contact::$fieldLastName && !$contact->last_name)
				{
					$contact->last_name = $value;
				}
				else if ($field == Contact::$fieldPhone && !$contact->phone)
				{
					$contact->phone = $value;
				}
				else if ($field == Contact::$fieldEmail && !$contact->email)
				{
					$contact->email = strtolower($value);
				}				
			}

			$client->save();
			$client->contacts()->save($contact);	
			$client->save();	

			// Activity::createClient($client, false);
		}

		$message = $count == 1 ? 'cliente creado con éxito' : $count . 'clientes creados con éxito';		
		Session::flash('message', $message);

		return Redirect::to('clientes');
	}

	public function importClientsMap()
	{		
		$file = Input::file('file');

		if ($file == null)
		{
			Session::flash('error', 'Debe seleccionar un archivo');
			return Redirect::to('importar/clientes');			
		}

		$name = $file->getRealPath();

		require_once(app_path().'/includes/parsecsv.lib.php');
		$csv = new parseCSV();
		$csv->heading = false;
		$csv->auto($name);

		Session::put('data', $csv->data);

		$headers = true;
		$hasHeaders = true;
		$mapped = array();
		$columns = array('',
			
			Client::$fieldName,
			Client::$fieldBusinessName,
			Client::$fieldNit,
			Client::$fieldAddress1,
			Client::$fieldAddress2,
			Client::$fieldWorkPhone,
			Client::$fieldPrivateNotes,

			Contact::$fieldFirstName,
			Contact::$fieldLastName,
			Contact::$fieldPhone,
			Contact::$fieldEmail

		);

		if (count($csv->data) > 0) 
		{
			$headers = $csv->data[0];


			for ($i=0; $i<count($headers); $i++)
			{
				$title = strtolower($headers[$i]);
				$mapped[$i] = '';

				$map = array(

					'Nombre' => Client::$fieldName,
					'Razón Social' => Client::$fieldBusinessName,
					'Nit' => Client::$fieldNit,
					'Zona/Barrio' => Client::$fieldAddress1,	
					'Dirección' => Client::$fieldAddress2,	
					'Teléfono' => Client::$fieldWorkPhone,					
					'Antecedentes' => Client::$fieldPrivateNotes,

					'Nombre(s)' => Contact::$fieldFirstName,
					'Apellidos' => Contact::$fieldLastName,
					'Correo' => Contact::$fieldEmail,
					'Celular' => Contact::$fieldPhone,
					
				);

				foreach ($map as $search => $column)
				{
					foreach(explode("|", $search) as $string)
					{
						if (strpos($title, 'sec') === 0)
						{
							continue;
						}

						if (strpos($title, $string) !== false)
						{
							$mapped[$i] = $column;
							break(2);
						}
					}
				}
			}
		}

		$data = array(
			'data' => $csv->data, 
			'headers' => $headers,
			'hasHeaders' => $hasHeaders,
			'columns' => $columns,
			'mapped' => $mapped
		);

		return View::make('importar.import_clients_map', $data);
	}


}
