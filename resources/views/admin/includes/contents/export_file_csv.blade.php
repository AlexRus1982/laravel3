@php
    //требует входную переменную $export
    $seoParams = DB::table('seo_params')
    ->first();

    $columns = explode(';', $export->export_csv_columns);

    $tableColumnNames = DB::getSchemaBuilder()
    ->getColumnListing('catalog');

    header("Content-Type: text/csv; charset=utf-8");
    header("Content-Disposition: attachment; filename={$export->export_name}.csv");

    function encodeCSVArray($array){
        $newArray = [];
        foreach($array as $item){
            try {
                array_push($newArray, iconv('UTF-8', 'Windows-1251', $item));
            }
            catch(Exception $e) {
                array_push($newArray, $item);
                //logger($e->getMessage());
                //logger($item);
            }
        }
        return $newArray;
    }

    $output = fopen("php://output", "w");

    if ($export->export_csv_all_columns == "0"){
        fputcsv($output, encodeCSVArray($columns), ';');
        $catalogItems = DB::table('catalog')
        ->select($columns)
        ->get();
    }
    else {
        fputcsv($output, encodeCSVArray($tableColumnNames), ';');
        $catalogItems = DB::table('catalog')
        ->get();
    }

    foreach($catalogItems as $item) {
        $line = collect($item)->all();
        fputcsv($output, encodeCSVArray($line), ';');
    }

    fclose($output);
    
    exit;
@endphp