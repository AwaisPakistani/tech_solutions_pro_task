<?php

namespace App\Imports;

use Illuminate\Support\Collection;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\ToCollection;
class SalesImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row)
        {
            // $sale = Sale::where('order_id', $row['order_id'])->first();
            // if ($sale) {

            //     $sale->update([
            //         'country' => $row['country'],
            //         'item_type' => $row['item_type'],
            //         'sales_channel' => $row['sales_channel'],
            //         'unit_price' => $row['unit_price'],
            //         'total_profit' => $row['total_profit'],
            //     ]);
            // } else {
                // Create new record
                Sale::create([
                    'country' => $row[0],
                    'item_type' => $row[1],
                    'sales_channel' => $row[2],
                    'order_id' => $row[3],
                    'unit_price' => $row[4],
                    'total_profit' => $row[5],
                ]);
            // }
        }
    }
}
