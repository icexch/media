<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function indexAdvertiser() {
        return view('pages.export.advertiser');
    }

    public function indexPublisher() {
        return view('pages.export.publisher');
    }

    public function exportAdvertiser() {

    }

    public function exportPublisher() {

    }

    private function export() {
        Excel::create('Filename', function($excel) {

            // Set the title
            $excel->setTitle('Our new awesome title');

            // Chain the setters
            $excel->setCreator('Maatwebsite')
                ->setCompany('Maatwebsite');

            // Call them separately
            $excel->setDescription('A demonstration to change the file properties');

        })->download('csv');
    }
}
