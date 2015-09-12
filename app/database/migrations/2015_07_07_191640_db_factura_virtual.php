<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbFacturaVirtual extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//base  de datos 
		Schema::create('currencies', function($t)
        {
            $t->increments('id');

            $t->string('name');
            $t->string('symbol');
            $t->string('precision');
            $t->string('thousand_separator');
            $t->string('decimal_separator');
            $t->string('code');
        });            

        Schema::create('unidades', function($t)
        {
            $t->increments('id');

            $t->string('nombre');
            $t->boolean('is_int');
        });   
       
        Schema::create('timezones', function($t)
        {
            $t->increments('id');
            $t->string('name');
            $t->string('location');
        });

        Schema::create('date_formats', function($t)
        {
            $t->increments('id');
            $t->string('format');    
            $t->string('picker_format');                    
            $t->string('label');            
        });

        Schema::create('datetime_formats', function($t)
        {
            $t->increments('id');
            $t->string('format');            
            $t->string('label');            
        });

        Schema::create('accounts', function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('currency_id')->nullable();
            
            $t->unsignedInteger('timezone_id')->nullable();
            $t->unsignedInteger('date_format_id')->nullable();
            $t->unsignedInteger('datetime_format_id')->nullable();

            $t->timestamps();
            $t->softDeletes();

            $t->string('ip');
            $t->string('account_key')->unique();
            $t->timestamp('last_login')->nullable();
            $t->string('domain')->unique();
            $t->string('nit')->unique();
            $t->string('name')->unique();
           
            $t->boolean('confirmed')->default(false);

            $t->integer('credit_counter')->default(0);

            $t->boolean('op1')->default(false);
            $t->boolean('op2')->default(false);
            $t->boolean('op3')->default(false);

            $t->date('billing_deadline')->null();

            $t->boolean('is_uniper')->default(false);
            $t->string('uniper')->nullable();

            $t->string('custom_client_label1')->nullable();         
            $t->string('custom_client_label2')->nullable();
            $t->string('custom_client_label3')->nullable();
            $t->string('custom_client_label4')->nullable();
            $t->string('custom_client_label5')->nullable();
            $t->string('custom_client_label6')->nullable();
            $t->string('custom_client_label7')->nullable();
            $t->string('custom_client_label8')->nullable();
            $t->string('custom_client_label9')->nullable();
            $t->string('custom_client_label10')->nullable();
            $t->string('custom_client_label11')->nullable();
            $t->string('custom_client_label12')->nullable();

   
            $t->foreign('currency_id')->references('id')->on('currencies');
 
        });        

        Schema::create('branches', function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('account_id')->index();
         

            $t->timestamps();
            $t->softDeletes();
            
            $t->string('name');

            $t->string('address1');
            $t->string('address2');
            $t->string('city');
            $t->string('state');
            $t->string('work_phone');
            
            $t->string('sfc');

            $t->integer('number_branch');//adicionado para el numero de de sucursal
            
            $t->string('number_process');
            $t->string('number_autho');
            $t->date('deadline');
            $t->string('key_dosage');

            $t->string('economic_activity');

            $t->string('law');

            $t->boolean('type_third')->default(false);

            $t->integer('invoice_number_counter')->default(0);
           
            $t->text('quote_number_prefix')->nullable();
            $t->integer('quote_number_counter')->default(0)->nullable();       

            $t->foreign('account_id')->references('id')->on('accounts');
     

            $t->unsignedInteger('public_id')->index();
            $t->unique( array('account_id','public_id'));     
        }); 

        Schema::create('users', function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('account_id')->index();
         

            $t->timestamps();
            $t->softDeletes();

            $t->string('first_name')->nullable();
            $t->string('last_name')->nullable();
            $t->string('phone')->nullable();
            $t->string('username')->unique();
            $t->string('email')->nullable();
            $t->string('password');
            $t->string('confirmation_code');

            $t->boolean('registered')->default(true);
            $t->boolean('confirmed')->default(true); 
            $t->rememberToken();

            $t->boolean('is_admin')->default(0);            

            $t->boolean('notify_sent')->default(true);
            $t->boolean('notify_viewed')->default(true);
            $t->boolean('notify_paid')->default(true);

            $t->foreign('account_id')->references('id')->on('accounts');
         
            $t->unsignedInteger('public_id')->nullable();
            $t->unique( array('account_id','public_id'));
        });
        Schema::create('user_branch',function($t)
        {
            
            $t->increments('id');
            $t->unsignedInteger('account_id')->index();
            $t->unsignedInteger('user_id')->index();
            $t->unsignedInteger('branch_id')->index();


            $t->timestamps();
            $t->softDeletes();

            $t->foreign('account_id')->references('id')->on('accounts');
            $t->foreign('user_id')->references('id')->on('users');
            $t->foreign('branch_id')->references('id')->on('branches');
            $t->unsignedInteger('public_id')->nullable();
            $t->unique( array('account_id','public_id'));

        });      

        Schema::create('clients', function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('account_id')->index(); 
     

            $t->timestamps();
            $t->softDeletes();

            $t->string('name');
            $t->string('business_name')->nullable();
            $t->string('nit');

            $t->string('address1')->nullable();
            $t->string('address2')->nullable();
            $t->string('city')->nullable();
            $t->string('state')->nullable();

            $t->string('work_phone')->nullable();
            $t->text('private_notes')->nullable();

            $t->decimal('balance', 13, 2)->nullable();
            $t->decimal('paid_to_date', 13, 2)->nullable();

            $t->timestamp('last_login')->nullable();

            $t->string('custom_value1')->nullable();
            $t->string('custom_value2')->nullable();
            $t->string('custom_value3')->nullable();
            $t->string('custom_value4')->nullable();    
            $t->string('custom_value5')->nullable();
            $t->string('custom_value6')->nullable();
            $t->string('custom_value7')->nullable();
            $t->string('custom_value8')->nullable();
            $t->string('custom_value9')->nullable();
            $t->string('custom_value10')->nullable();
            $t->string('custom_value11')->nullable();
            $t->string('custom_value12')->nullable();

            $t->foreign('account_id')->references('id')->on('accounts');
                    
            
            $t->unsignedInteger('public_id')->index();
            $t->unique( array('account_id','public_id'));
        });     

        Schema::create('contacts', function($t)
        {
            $t->increments('id');         
            $t->unsignedInteger('account_id');
     
            $t->unsignedInteger('client_id')->index();
            
            $t->timestamps();
            $t->softDeletes();

            $t->boolean('is_primary')->default(0);
            $t->boolean('send_invoice')->default(0);

            $t->string('first_name')->nullable();
            $t->string('last_name')->nullable();
            $t->string('email')->nullable();
            $t->string('phone')->nullable();

            $t->foreign('client_id')->references('id')->on('clients'); 

            $t->unsignedInteger('public_id')->nullable();
            $t->unique( array('account_id','public_id'));
        });     

        Schema::create('invoice_statuses', function($t)
        {
            $t->increments('id');
            $t->string('name');
        });

        Schema::create('frequencies', function($t)
        {
            $t->increments('id');
            $t->string('name');
        });

        Schema::create('invoices', function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('account_id')->index();
            $t->unsignedInteger('branch_id')->index();
         
            $t->unsignedInteger('client_id');
            $t->unsignedInteger('user_id');
            
            // $t->unsignedInteger('invoice_design_id');
            $t->unsignedInteger('invoice_status_id')->default(1);
            $t->unsignedInteger('frequency_id');
            $t->unsignedInteger('recurring_invoice_id')->index()->nullable();

            $t->timestamps();
            $t->softDeletes();

            $t->string('invoice_number');
            $t->date('invoice_date')->nullable();
            $t->date('due_date')->nullable();
            $t->float('discount');
            $t->string('po_number');

            $t->text('terms');
            $t->text('public_notes');

            $t->boolean('is_recurring');
            $t->date('start_date')->nullable();
            $t->date('end_date')->nullable();
            $t->timestamp('last_sent_date')->nullable();  

            $t->string('account_name');
            $t->string('account_nit');
            $t->string('account_uniper');
            $t->string('sfc');

            $t->string('branch_name');
            $t->string('address1');
            $t->string('address2');
            $t->string('phone');
            $t->string('city');
            $t->string('state');
            $t->string('number_autho');
            $t->date('deadline');
            $t->string('key_dosage');
            $t->boolean('type_third')->default(false);

            $t->string('client_nit');
            $t->string('client_name');

            $t->string('economic_activity');

            $t->string('law');

            $t->string('control_code');

            $t->string('qr');

            $t->decimal('debito_fiscal');
            $t->decimal('importe_neto');
            $t->decimal('importe_total');
            $t->decimal('importe_ice');
            $t->decimal('importe_exento');
            $t->decimal('descuento_total');

            $t->text('logo');
            $t->text('javascript')->nullable();

            $t->foreign('client_id')->references('id')->on('clients');
            $t->foreign('branch_id')->references('id')->on('branches');
            $t->foreign('account_id')->references('id')->on('accounts');
         
            $t->foreign('user_id')->references('id')->on('users'); 
            $t->foreign('invoice_status_id')->references('id')->on('invoice_statuses');
      
            //$t->foreign('invoice_design_id')->references('id')->on('invoice_designs');

            $t->unsignedInteger('public_id')->index();
            $t->unique( array('account_id','public_id'));
        });


        Schema::create('invitations', function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('account_id');
            $t->unsignedInteger('user_id');
            $t->unsignedInteger('contact_id');
            $t->unsignedInteger('invoice_id')->index();
            $t->string('invitation_key')->index()->unique();
            $t->timestamps();
            $t->softDeletes();

            $t->string('transaction_reference')->nullable();
            $t->timestamp('sent_date');
            $t->timestamp('viewed_date');

            $t->foreign('user_id')->references('id')->on('users');
            $t->foreign('contact_id')->references('id')->on('contacts');
            $t->foreign('invoice_id')->references('id')->on('invoices');

            $t->unsignedInteger('public_id')->index();
            $t->unique( array('account_id','public_id'));
        });

        Schema::create('tax_rates', function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('account_id')->index();
 
            $t->timestamps();
            $t->softDeletes();

            $t->string('name');
            $t->decimal('rate', 13, 2);
            
            $t->foreign('account_id')->references('id')->on('accounts'); 
       
            
            $t->unsignedInteger('public_id');
            $t->unique( array('account_id','public_id'));
        });

        Schema::create('categories', function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('account_id')->index();
            
            $t->timestamps();
            $t->softDeletes();

            $t->text('name');
            $t->text('description');
         
            $t->foreign('account_id')->references('id')->on('accounts');             
            
            
            $t->unsignedInteger('public_id');
            $t->unique( array('account_id','public_id'));
        });

        Schema::create('products', function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('account_id')->index();
            $t->unsignedInteger('category_id')->nullable();
            $t->unsignedInteger('unidad_id')->nullable();
         
            $t->timestamps();
            $t->softDeletes();

            $t->boolean('is_product');
            $t->string('product_key');
            $t->text('notes');
            $t->decimal('cost', 13, 2);
            $t->decimal('qty', 13, 2)->nullable();
            
            $t->foreign('account_id')->references('id')->on('accounts');            
            $t->foreign('category_id')->references('id')->on('categories');     
            $t->foreign('unidad_id')->references('id')->on('unidades');     
        
            $t->unsignedInteger('public_id');
            $t->unique( array('account_id','public_id'));
        });

        Schema::create('invoice_items', function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('account_id');
        
            $t->unsignedInteger('invoice_id')->index();
            $t->unsignedInteger('product_id')->nullable();
            $t->timestamps();
            $t->softDeletes();

            $t->boolean('is_product');
            $t->string('product_key');
            $t->text('notes');
            $t->decimal('cost', 13, 2);
            $t->decimal('qty', 13, 2)->nullable();
            $t->float('discount');            

            $t->text('unidad');

            $t->foreign('invoice_id')->references('id')->on('invoices');
            $t->foreign('product_id')->references('id')->on('products');
          

            $t->unsignedInteger('public_id');
            $t->unique( array('account_id','public_id'));
        });

        Schema::create('payment_types', function($t)
        {
            $t->increments('id');
            $t->string('name');
        });

        Schema::create('payments', function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('invoice_id')->nullable();
            $t->unsignedInteger('account_id')->index();
            $t->unsignedInteger('client_id')->index();
            $t->unsignedInteger('contact_id')->nullable();
            $t->unsignedInteger('invitation_id')->nullable();
            $t->unsignedInteger('user_id')->nullable();
            $t->unsignedInteger('payment_type_id')->nullable();
            $t->timestamps();
            $t->softDeletes();

            $t->decimal('amount', 13, 2);
            $t->date('payment_date')->nullable();
            $t->string('transaction_reference')->nullable();
            $t->string('payer_id')->nullable();

            $t->foreign('invoice_id')->references('id')->on('invoices'); 
            $t->foreign('account_id')->references('id')->on('accounts');
            $t->foreign('client_id')->references('id')->on('clients');
            $t->foreign('contact_id')->references('id')->on('contacts');
            $t->foreign('user_id')->references('id')->on('users');
            $t->foreign('payment_type_id')->references('id')->on('payment_types');
            
            $t->unsignedInteger('public_id')->index();
            $t->unique( array('account_id','public_id'));
        });     

        Schema::create('credits', function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('account_id')->index();
            $t->unsignedInteger('client_id')->index();
            $t->unsignedInteger('user_id');
            $t->timestamps();
            $t->softDeletes();
            
            $t->decimal('amount', 13, 2);
            $t->decimal('balance', 13, 2);
            $t->date('credit_date')->nullable();
            $t->string('credit_number')->nullable();
            $t->text('private_notes');
            
            $t->foreign('account_id')->references('id')->on('accounts');
            $t->foreign('client_id')->references('id')->on('clients');
            $t->foreign('user_id')->references('id')->on('users');
            
            $t->unsignedInteger('public_id')->index();
            $t->unique( array('account_id','public_id'));
        });     

        Schema::create('activities', function($t)
        {
            $t->increments('id');
            $t->timestamps();

            $t->unsignedInteger('account_id');
            $t->unsignedInteger('client_id');
            $t->unsignedInteger('user_id');
            $t->unsignedInteger('contact_id')->nullable();
            $t->unsignedInteger('payment_id')->nullable();
            $t->unsignedInteger('invoice_id')->nullable();
            $t->unsignedInteger('credit_id')->nullable();
            $t->unsignedInteger('invitation_id')->nullable();
            
            $t->text('message')->nullable();
            $t->text('json_backup')->nullable();
            $t->integer('activity_type_id');            
            $t->decimal('adjustment', 13, 2)->nullable();
            $t->decimal('balance', 13, 2)->nullable();
            
            $t->foreign('account_id')->references('id')->on('accounts');
            $t->foreign('client_id')->references('id')->on('clients');
        });

        Schema::create('book_sales', function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('account_id');
        
            $t->unsignedInteger('invoice_id')->index();
            $t->timestamps();
            $t->softDeletes();

            $t->string('invoice_date');
            $t->string('invoice_number');
            $t->string('number_autho');
			$t->string('status');

			$t->string('client_nit');
            $t->string('client_name');

            $t->decimal('amount', 13, 2);

            $t->decimal('ice_amount', 13, 2);
            $t->decimal('export_amount', 13, 2);
            $t->decimal('grav_amount', 13, 2);

            $t->decimal('subtotal', 13, 2);

            $t->decimal('disc_bonus_amount', 13, 2);

            $t->decimal('base_fiscal_debit_amount', 13, 2);
            $t->decimal('fiscal_debit_amount', 13, 2);
            
            $t->string('control_code');

            $t->foreign('account_id')->references('id')->on('accounts');
  
        });
		
        Schema::create('password_reminders', function($t)
        {
            $t->string('email');
            $t->timestamps();
             $t->softDeletes();
            $t->string('token');
        });

        Schema::create('master_documents', function($t)
        {

            $t->increments('id');
            $t->string('name');
            $t->text('description');
            $t->text('javascript_web');
            $t->text('javascript_pos');
            $t->timestamps();

        });

        Schema::create('type_documents',function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('account_id');
            $t->unsignedInteger('master_id');
            $t->text('logo');
            $t->text('javascript_web');
            $t->text('javascript_pos');

            $t->timestamps();
            $t->softDeletes();

            $t->unsignedInteger('public_id')->index();
            $t->unique( array('account_id','public_id'));

            $t->foreign('account_id')->references('id')->on('accounts');
            $t->foreign('master_id')->references('id')->on('master_documents');

        });
        Schema::create('type_documents_branch',function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('branch_id');
            $t->unsignedInteger('type_document_id');

            $t->timestamps();
            $t->softDeletes();

            $t->foreign('branch_id')->references('id')->on('branches');
            $t->foreign('type_document_id')->references('id')->on('type_documents');

        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('currencies');
	
		Schema::drop('timezones');
		Schema::drop('date_formats');
		Schema::drop('date_formats');
		Schema::drop('datetime_formats');
		Schema::drop('datetime_formats');
		Schema::drop('accounts');

		Schema::drop('branches');
		Schema::drop('users');
        Schema::drop('user_branch');
		Schema::drop('clients');
		Schema::drop('contacts');
		Schema::drop('invoice_designs');
		Schema::drop('invoice_statuses');
		Schema::drop('invoices');
		Schema::drop('invitations');
		Schema::drop('tax_rates');
		Schema::drop('categories');
		Schema::drop('products');
		Schema::drop('invoice_items');
		Schema::drop('payment_types');
		Schema::drop('payments');
		Schema::drop('credits');
		Schema::drop('activities');
	
		Schema::drop('book_sales');
		Schema::drop('password_reminders');
        Schema::drop('master_documents');
        Schema::drop('type_documents');
        Schema::drop('type_documents_branch');

	}

}
