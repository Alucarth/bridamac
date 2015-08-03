<?php

class ReportController extends \BaseController
{

    public function report()
    {

        $datasets = [];
        $labels = [];

        $startDate = date("Y-m-d", strtotime(date_create()->format('Y-m-d')." -6 month"));
        $endDate = date_create()->format('Y-m-d');
        $begin = new DateTime($startDate);
        $end = new DateTime($endDate);

        $devlist2 = DB::table('payments')->select(DB::raw('sum(amount) as totals,MONTH(payment_date) as month'))
            ->where('account_id', '=', Auth::user()->account_id)
            ->where('payments.deleted_at', '=', null)
            ->where('payments.payment_date', '>=', $startDate)
            ->where('payments.payment_date', '<=', $endDate)
            ->groupBy('month');

        $devlist = DB::table('invoices')->select(DB::raw('sum(amount) as totals,MONTH(invoice_date) as month'))
            ->where('account_id', '=', Auth::user()->account_id)
            ->where('invoices.deleted_at', '=', null)
            ->where('invoices.invoice_date', '>=', $startDate)
            ->where('invoices.invoice_date', '<=', $endDate)
            ->groupBy('month');


        $interval = new DateInterval('P1M');
        $daterange = new DatePeriod($begin, $interval ,$end);

        $totals = $devlist->lists('totals');
        $dates = $devlist->lists('month');
        $data = array_combine($dates, $totals);

        foreach($daterange as $date){

            $labelFormat = 'MONTH';
            $label = $date->format('m');

            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
            $datasets[] = isset($data[intval($label)]) ? $data[intval($label)] : 0;
            $labels[] = $meses[$label-1];
        }
 

        $params = [
            'labels' => $labels,
            'datasets' => $datasets,
        ];

        return View::make('reportes.chart_builder', $params);
         // return Response::json($datasets);
    }
}
