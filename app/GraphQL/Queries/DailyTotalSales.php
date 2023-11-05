<?php

namespace App\GraphQL\Queries;

use Closure;
use App\Models\Sale; // Assuming Sale is the name of your model

class DailyTotalSales
{
    public function __invoke($root, array $args, Closure $totalSales)
    {
        $startDate = $args['startDate'];
        $endDate = $args['endDate'];
        $paymentStatus = $args['paymentStatus'];
        $payeeId = $args['payeeId'];

        // Implement the logic to calculate daily total sales here
        $totalSales = Sale::where('invoice_date', '>=', $startDate)
            ->where('invoice_date', '<=', $endDate)
            ->when($paymentStatus, function ($query) use ($paymentStatus) {
                return $query->where('payment_status', $paymentStatus);
            })
            ->when($payeeId, function ($query) use ($payeeId) {
                return $query->where('payee_id', $payeeId);
            })
            ->sum('total');

        return $totalSales;
    }
}
