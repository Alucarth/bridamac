<?php

class ReportController extends \BaseController
{
    public function d3()
    {
        $message = '';

        if (Auth::user()->account->isPro()) {
            $account = Account::where('id', '=', Auth::user()->account->id)->with(['clients.invoices.invoice_items', 'clients.contacts'])->first();
            $account = $account->hideFieldsForViz();
            $clients = $account->clients->toJson();
        } elseif (isset($_ENV['DATA_VIZ_SAMPLE'])) {
            $clients = $_ENV['DATA_VIZ_SAMPLE'];
            $message = trans('texts.sample_data');
        } else {
            $clients = '[]';
        }

        $data = [
            'feature' => ACCOUNT_DATA_VISUALIZATIONS,
            'clientes' => $clients,
            'message' => $message,
        ];

        return View::make('reports.d3', $data);
    }

    public function report()
    {
        // if (Input::all()) {
        //     $groupBy = Input::get('group_by');
        //     $chartType = Input::get('chart_type');
        //     $startDate = Utils::toSqlDate(Input::get('start_date'), false);
        //     $endDate = Utils::toSqlDate(Input::get('end_date'), false);
        // } else {
            $groupBy = 'MONTH';
            $chartType = 'Bar';
            $startDate = date("2015-05-30");
            $endDate = date("Y-m-d");
        // }

        $padding = $groupBy == 'DAYOFYEAR' ? 'day' : ($groupBy == 'WEEK' ? 'week' : 'month');

        $datasets = [];
        $labels = [];
        $maxTotals = 0;
        $width = 10;

        if (Auth::user()->account->isPro()) {
            foreach ([ENTITY_INVOICE, ENTITY_PAYMENT, ENTITY_CREDIT] as $entityType) {
                $records = DB::table($entityType.'s')
                            ->select(DB::raw('sum(amount) as total, '.$groupBy.'('.$entityType.'_date) as '.$groupBy))
                            ->where('account_id', '=', Auth::user()->account_id)
                            ->where($entityType.'s.deleted_at', '=', null)
                            ->where($entityType.'s.'.$entityType.'_date', '>=', $startDate->format('Y-m-d'))
                            ->where($entityType.'s.'.$entityType.'_date', '<=', $endDate->format('Y-m-d'))
                            ->groupBy($groupBy);

                if ($entityType == ENTITY_INVOICE) {
                    $records->where('is_quote', '=', false)
                                    ->where('is_recurring', '=', false);
                }

                $totals = $records->lists('total');
                $dates = $records->lists($groupBy);
                $data = array_combine($dates, $totals);

                $interval = new DateInterval('P1'.substr($groupBy, 0, 1));
                $period = new DatePeriod($startDate, $interval, $endDate);

                $totals = [];

                foreach ($period as $d) {
                    $dateFormat = $groupBy == 'DAYOFYEAR' ? 'z' : ($groupBy == 'WEEK' ? 'W' : 'n');
                    $date = $d->format($dateFormat);
                    $totals[] = isset($data[$date]) ? $data[$date] : 0;

                    if ($entityType == ENTITY_INVOICE) {
                        $labelFormat = $groupBy == 'DAYOFYEAR' ? 'j' : ($groupBy == 'WEEK' ? 'W' : 'F');
                        $label = $d->format($labelFormat);
                        $labels[] = $label;
                    }
                }

                $max = max($totals);

                if ($max > 0) {
                    $datasets[] = [
                        'totals' => $totals,
                        'colors' => $entityType == ENTITY_INVOICE ? '78,205,196' : ($entityType == ENTITY_CREDIT ? '199,244,100' : '255,107,107'),
                    ];
                    $maxTotals = max($max, $maxTotals);
                }
            }

            $width = (ceil($maxTotals / 100) * 100) / 10;
            $width = max($width, 10);
        }

        $dateTypes = [
            'DAYOFYEAR' => 'Diario',
            'WEEK' => 'Semanal',
            'MONTH' => 'Mensual'
        ];

        $chartTypes = [
            'Bar' => 'Barras',
            'Line' => 'Líneal'
        ];

        $params = [
            'labels' => $labels,
            'datasets' => $datasets,
            'scaleStepWidth' => $width,
            'dateTypes' => $dateTypes,
            'chartTypes' => $chartTypes,
            'chartType' => $chartType,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'groupBy' => $groupBy,
        ];

        return View::make('reportes.chart_builder', $params);
    }
}
