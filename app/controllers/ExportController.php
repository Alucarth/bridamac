<?php

class ExportController extends \BaseController {


    public function exportBookSales()
	{

		return View::make('exportar.export_book');	

	}

    public function doExportBookSales()
    {

    	$action = Input::get('login');

    	if ($action == 'Exportar en CSV')
		{
			Excel::create('Libro de Ventas, '. $date = Input::get('date'), function($excel) {

		    $excel->sheet('Libro enero', function($sheet) {
			
			$date = Input::get('date');

		    	$booksale = BookSale::select('invoice_date', 'invoice_number', 'number_autho', 'status', 'client_nit', 'client_name', 'amount', 'ice_amount', 'export_amount', 'grav_amount', 'subtotal', 'disc_bonus_amount', 'base_fiscal_debit_amount', 'fiscal_debit_amount', 'control_code')
									->where('account_id','=',Auth::user()->account_id)
									->where('invoice_date','LIKE','%'.$date)
									->orderBy('invoice_date', 'asc')
		    						->get();

			    $sheet->fromModel($booksale, null, 'A1', false, false);

	   		});

			})->download('csv');

		}
		else
		{
			Excel::create('Libro de Ventas, '. $date = Input::get('date'), function($excel) {

		    $excel->setTitle('Libro de Ventas Facturacion Virtual');

		    $excel->setCreator('iPX Server')
		          ->setCompany('iPX Server');

		    $excel->setDescription('Libro de ventas Estándar');

		    $excel->sheet('Libro enero', function($sheet) {

		    	$sheet->setStyle(array(
				    'font' => array(
				        'name'      =>  'Calibri',
				        'size'      =>  12
				    )
			));

				$sheet->setWidth(array(
				    'A'     =>  10,
				    'B'     =>  10,
				    'C'     =>  15,
				    'D'     =>  8,
				    'E'     =>  14,
				    'F'     =>  22,
				    'G'     =>  13,
				    'H'     =>  13,
				    'I'     =>  20,
				    'J'     =>  15,
				    'K'     =>  12,
				    'L'     =>  20,
				    'M'     =>  15,
				    'N'     =>  14,
				    'O'     =>  14,
				));

				$sheet->mergeCells('G1:I1');
				$sheet->mergeCells('G2:I2');
				$sheet->mergeCells('B6:C6');
				$sheet->mergeCells('D6:F6');


				$sheet->cells('G1:G2', function($cells) {
	    		$cells->setFontWeight('bold');
	    		$cells->setAlignment('center');
	    		$cells->setValignment('middle');
				});
				$sheet->cells('C3:C4', function($cells) {
	    		$cells->setFontWeight('bold');
	    		$cells->setAlignment('right');
	    		$cells->setValignment('middle');
				});
				$sheet->cells('B6', function($cells) {
	    		$cells->setFontWeight('bold');
	    		$cells->setAlignment('right');
	    		$cells->setValignment('middle');
				});
				$sheet->cells('E4', function($cells) {
	    		$cells->setFontWeight('bold');
	    		$cells->setAlignment('right');
	    		$cells->setValignment('middle');
				});
				$sheet->cells('G6', function($cells) {
	    		$cells->setFontWeight('bold');
	    		$cells->setAlignment('right');
	    		$cells->setValignment('middle');
				});
				$sheet->cells('D4', function($cells) {
	    		$cells->setAlignment('left');
	    		$cells->setValignment('middle');
				});

				$date = Input::get('date');
				$dateA = explode("/", $date);
				$year = $dateA[1];
				$month = intval($dateA[0]);

				$account = Auth::user()->account;

				$months = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 

				$sheet->row(1, array('', '', '', '', '', '','LIBRO DE VENTAS'));
				$sheet->row(2, array('', '', '', '', '', '','ESTANDAR'));
				$sheet->row(3, array('', '', 'PERIODO:'));
				$sheet->row(4, array('', '', 'AÑO:', $year, 'MES:',$months[$month-1]));
				$sheet->row(6, array('','NOMBRE O RAZÓN SOCIAL:', '', $account->name, '', '', 'NIT:', $account->nit));

			    $sheet->setStyle(array(
					    'font' => array(
					        'name'      =>  'Calibri',
					        'size'      =>  10
					    )
				));

				$sheet->cells('A8:O8', function($cells) {
	    		$cells->setFontWeight('bold');
				});

				$sheet->row(8, array('FECHA DE FACTURA', 'Nº DE FACTURA', 'Nº DE AUTORIZACIÓN', 'ESTADO', 'NIT/CI CLIENTE', 'NOMBRE O RAZÓN SOCIAL', 'IMPORTE TOTAL DE LA VENTA', 'IMPORTE ICE / IEHD / TASAS', 'EXPORTACIONES Y OPERACIONES EXENTAS', 'VENTAS GRAVADAS A TASA CERO', 'SUBTOTAL', 'DESC. BONIF. Y REBAJAS OTORGADAS', 'IMP. BASE PARA DÉBITO FISCAL', 'DÉBITO FISCAL', 'CÓDIGO DE CONTROL'));

				$sheet->getStyle('A8:O' . $sheet->getHighestRow())
	            ->getAlignment()->setWrapText(true);

				$sheet->cells('A8:O8', function($cells) {
	    		$cells->setFontWeight('bold');
	    		$cells->setAlignment('center');
	    		$cells->setValignment('middle');
				});

		    	$booksale = BookSale::select('invoice_date', 'invoice_number', 'number_autho', 'status', 'client_nit', 'client_name', 'amount', 'ice_amount', 'export_amount', 'grav_amount', 'subtotal', 'disc_bonus_amount', 'base_fiscal_debit_amount', 'fiscal_debit_amount', 'control_code')
									->where('account_id','=',Auth::user()->account_id)
									->where('invoice_date','LIKE','%'.$date)
									->orderBy('invoice_date', 'asc')
		    						->get();

			    $sheet->fromModel($booksale, null, 'A9', false, false);

	   		});

			})->download('xlsx');
		}
    }

}
