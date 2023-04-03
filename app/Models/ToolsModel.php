<?php

namespace App\Models;

// use App\Traits\TaiKhoan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use PHPExcel_Cell;
use PHPExcel_IOFactory;
use PHPExcel_Style_Border;
use function GuzzleHttp\Psr7\str;

class ToolsModel extends Model
{
    // const SESSION = [
    //     'id_tai_khoan' => "id_tai_khoan",
    // ];

    public static function status($message, $code)
    {
        return json_encode((object)["status" => $code, "message" => $message]);
    }
  
    public static function readExcel($file, $range = 'A2')
    {
        $data = [];
        if (file_exists($file)) {
            $objPHPExcel = PHPExcel_IOFactory::load($file);
            $sheet = $objPHPExcel->setActiveSheetIndex(0);
            $highestRow = $sheet->getHighestRow();
            $highestCol = $sheet->getHighestColumn();
            $data = $sheet->rangeToArray("$range:$highestCol$highestRow", null, true, false, false);;
        }
        return [
            'col' => $highestCol,
            'row' => $highestRow,
            'data' => $data
        ];
    }

    public static function chartNumber($dest)
    {
        if ($dest)
            return ord(strtolower($dest)) - 97;
        else
            return 0;
    }

    public static function excel_new_row(&$sheet, $num_rows, $total_row = 1)
    {
        $sheet->insertNewRowBefore($num_rows + 1, $total_row);
    }

    public static function excel_border(&$sheet, $num_rows)
    {
        $sheet->getActiveSheet()->getStyle($num_rows)->applyFromArray(
            array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            )
        );
    }

    public static function excel_set_value(&$sheet, $index, $value)
    {
        $sheet->setCellValue($index, $value);
    }

    public static function show_format_numberic($val)
    {
        if($val < 0)
            return '-';
        return number_format((float)$val, 2, '.', '');
    }
  
    public static function showTG($str){
        Carbon::setLocale('vi');
        return Carbon::createFromTimestamp(strtotime($str))->diffForHumans();
    }

}
