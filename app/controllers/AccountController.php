<?php
class AccountController extends BaseController
{

	public function create()
	{

		if (Auth::check())
		{
			return Redirect::to('dashboard');				
		}
		else
		{
			return View::make('cuentas.form');
		}
	}

	public function store()
	{
		// if (Auth::check())
		// {
		// 	return Redirect::to('hello');
		// }

  //   	$account = DB::table('accounts')->select('pro_plan_paid')->orderBy('id', 'desc')->first();
  //   	if($account)
  //   	{
		// 	$datePaid = $account->pro_plan_paid;
		// 	if (!$datePaid || $datePaid == '0000-00-00')
		// 	{
		// 		return 'Vuelva a intentarlo mas tarde';
		// 	}
		// }
		//colocar reglas de validacion tambien en este punto para verificar la informacion enviada


		$account = new Account;
		$account->ip = Request::getClientIp();
		$account->account_key = str_random(RANDOM_KEY_LENGTH);
		$account->domain = trim(Input::get('domain'));
		$account->nit= trim(Input::get('nit'));
		$account->name = trim(Input::get('name'));
		$account->language_id = 1;

		$account->save();

		$user = new User;
		$username = trim(Input::get('username'));
		$user->username = $username . "@" . $account->domain;
		$user->password = Hash::make(trim(Input::get('password')));
		$user->public_id = 1;
		$user->confirmation_code = '';
		$user->is_admin = true;
		$account->users()->save($user);

		$category = new Category;
		$category->user_id =$user->getId();
		$category->name = "General";
		$category->public_id = 1;
		$account->categories()->save($category);

		$InvoiceDesign = new InvoiceDesign;
		$InvoiceDesign->user_id =$user->getId();
		$InvoiceDesign->logo = "";
		$InvoiceDesign->x = "5";
		$InvoiceDesign->y = "5";
		$InvoiceDesign->javascript = "displaytittle(doc, invoice, layout);

displayHeader(doc, invoice, layout);

doc.setFontSize(11);
doc.setFontType('normal');

var activi = invoice.economic_activity;
var activityX = 565 - (doc.getStringUnitWidth(activi) * doc.internal.getFontSize());
doc.text(activityX, layout.headerTop+45, activi);

var aleguisf_date = getInvoiceDate(invoice);

layout.headerTop = 50;
layout.tableTop = 190;
doc.setLineWidth(0.8);
doc.setFillColor(255, 255, 255);
doc.roundedRect(layout.marginLeft - layout.tablePadding, layout.headerTop+95, 572, 35, 2, 2, 'FD');

var marginLeft1=30;
var marginLeft2=80;
var marginLeft3=180;
var marginLeft4=220;

datos1y = 160;
datos1xy = 15;
doc.setFontSize(11);
doc.setFontType('bold');
doc.text(marginLeft1, datos1y, 'Fecha : ');
doc.setFontType('normal');

doc.text(marginLeft2-5, datos1y, aleguisf_date);

doc.setFontType('bold');
doc.text(marginLeft1, datos1y+datos1xy, 'Señor(es) :');
doc.setFontType('normal');
doc.text(marginLeft2+15, datos1y+datos1xy, invoice.client_name);

doc.setFontType('bold');
doc.text(marginLeft3+240, datos1y+datos1xy, 'NIT/CI :');
doc.setFontType('normal');
doc.text(marginLeft4+245, datos1y+datos1xy, invoice.client_nit);

doc.setDrawColor(241,241,241);
doc.setFillColor(241,241,241);
doc.rect(layout.marginLeft - layout.tablePadding, layout.headerTop+140, 572, 20, 'FD');

doc.setFontSize(10);
doc.setFontType('bold');

if(invoice.branch_type_id==1)
{

    displayInvoiceHeader2(doc, invoice, layout);
	var y = displayInvoiceItems2(doc, invoice, layout);
	displayQR(doc, layout, invoice, y);
	y += displaySubtotals2(doc, layout, invoice, y+15, layout.unitCostRight+35);
}
if(invoice.branch_type_id==2)
{
    displayInvoiceHeader2(doc, invoice, layout);
	var y = displayInvoiceItems2(doc, invoice, layout);
	displayQR(doc, layout, invoice, y);
	y += displaySubtotals2(doc, layout, invoice, y+15, layout.unitCostRight+35);
}

y -=10;
displayNotesAndTerms(doc, layout, invoice, y);";

		$account->invoice_designs()->save($InvoiceDesign);

		
		// Auth::login($user);
		// $data = array('guardado exitoso' => ' se registro correctamente hasta aqui todo blue :)' ,'datos'=>Input::all());
		// $direccion = "http://".$account->domain.".localhost/devipx/public/crear/sucursal";
		// $direccion = "/crear/sucursal";
		// return Redirect::to($direccion);



		Session::put('account_id',$user->account_id);
		// return View::make('sucursales.edit')->with(array('account_id' => $user->account_id));
		return Redirect::to('crear/sucursal');

	}

	public function getSearchData()
	{
		$clients = \DB::table('clients')
			->where('clients.deleted_at', '=', null)
			->where('clients.account_id', '=', \Auth::user()->account_id)
			->whereRaw("clients.name <> ''")
			->select(\DB::raw("'Clients' as type, clients.public_id, clients.name, '' as token"));

		$contacts = \DB::table('clients')
			->join('contacts', 'contacts.client_id', '=', 'clients.id')
			->where('clients.deleted_at', '=', null)
			->where('clients.account_id', '=', \Auth::user()->account_id)
			->whereRaw("CONCAT(contacts.first_name, contacts.last_name, contacts.email) <> ''")
			->select(\DB::raw("'Contacts' as type, clients.public_id, CONCAT(contacts.first_name, ' ', contacts.last_name, ' ', contacts.email) as name, '' as token"));

		$invoices = \DB::table('clients')
			->join('invoices', 'invoices.client_id', '=', 'clients.id')
			->where('clients.account_id', '=', \Auth::user()->account_id)
			->where('clients.deleted_at', '=', null)
			->where('invoices.deleted_at', '=', null)
			->select(\DB::raw("'Invoices' as type, invoices.public_id, CONCAT(invoices.invoice_number, ': ', clients.name) as name, invoices.invoice_number as token"));

		$data = [];

		foreach ($clients->union($contacts)->union($invoices)->get() as $row)
		{
			$type = $row->type;

			if (!isset($data[$type]))
			{
				$data[$type] = [];
			}

			$tokens = explode(' ', $row->name);
			$tokens[] = $type;

			if ($type == 'Invoices')
			{
				$tokens[] = intVal($row->token) . '';
			}

			$data[$type][] = [
				'value' => $row->name,
				'public_id' => $row->public_id,
				'tokens' => $tokens
			];
		}
		return Response::json($data);
	}

	public function additionalFields()
	{
		$data = [
			'account' => Auth::user()->account
		];
		return View::make('configuracion.additional_fields', $data);
	}

	public function doAdditionalFields()
	{
		$account = Auth::user()->account;

		$account->custom_client_label1 = trim(Input::get('custom_client_label1'));
		$account->custom_client_label2 = trim(Input::get('custom_client_label2'));	
		$account->custom_client_label3 = trim(Input::get('custom_client_label3'));	
		$account->custom_client_label4 = trim(Input::get('custom_client_label4'));	
		$account->custom_client_label5 = trim(Input::get('custom_client_label5'));	
		$account->custom_client_label6 = trim(Input::get('custom_client_label6'));	
		$account->custom_client_label7 = trim(Input::get('custom_client_label7'));	
		$account->custom_client_label8 = trim(Input::get('custom_client_label8'));	
		$account->custom_client_label9 = trim(Input::get('custom_client_label9'));	
		$account->custom_client_label10 = trim(Input::get('custom_client_label10'));	
		$account->custom_client_label11 = trim(Input::get('custom_client_label11'));
		$account->custom_client_label12 = trim(Input::get('custom_client_label12'));

		$account->save();

		Session::flash('message', 'Configuración actualizada con éxito');

		return Redirect::to('configuracion/campos_adicionales');
	}

	public function productSettings()
	{
		$data = [
			'account' => Auth::user()->account
		];
		return View::make('configuracion.product_settings', $data);
	}

	public function doProductSettings()
	{
		$account = Auth::user()->account;

		$account->update_products = Input::get('update_products') ? true : false;
		$account->save();

		Session::flash('message', 'Configuración actualizada con éxito');

		return Redirect::to('configuracion/productos');
	}
}