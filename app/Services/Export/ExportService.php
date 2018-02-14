<?php

namespace App\Services\Export;

use Illuminate\Support\Facades\Response;

class ExportService {
    /**     * type => ['key' => 'value']
     */
    protected $currentKey = '';
    protected $columnsAll = [0 => ['key' => 'value']];
    protected $columns;

    protected function makeFileResponse($data) {
        $name = $this->currentKey.".".date("YmdHis", time());
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$name.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];
        $callback = function() use ($data)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, array_keys($data[0]));

            foreach ($data as $item) {
                fputcsv($file, array_values($item));
            }

            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }

    public function getKeysColumns(int $type) {
        return array_keys($this->columnsAll[(int)$type]);
    }
}