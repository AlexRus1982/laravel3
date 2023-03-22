<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExportController extends Controller
{

    public function CreateExport(Request $request) {
        DB::table('exports_params')
        ->insert([
            'export_name'     => $request->export_name,
            'export_format'   => $request->export_format,
            'export_desc'     => $request->export_desc,
            'export_file_ext' => $request->export_file_ext,
        ]);
    
        return response()->json([
            "server_answer" => "success",
        ]);
    }

    public function DeleteExport(Request $request) {
        DB::table('exports_params')
        ->where('export_id', $request->export_id)
        ->delete();
    
        return response()->json([
            "server_answer" => "success",
        ]);
    }

    public function SaveExport(Request $request) {
        
        $phpData = [];
        foreach($request->savedData as $key => $value){
            $phpData["{$key}"] = $value;
        }
    
        DB::table('exports_params')
        ->where('export_id', $request->export_id)
        ->update($phpData);
    
        return response()->json([
            "server_answer" => "success",
        ]);
    }

    public function FileExport($file) {
        
        $exports = DB::table('exports_params')
        ->get();

        $found_export = null;
        $found = false;
        foreach($exports as $export) {
            $fileName = "{$export->export_file_name}.{$export->export_file_ext}";
            if ($fileName == $file) {
                $found_export = $export;
                $found = true;
                break;
            }
        }
    
        if ($found) {
            //return $file;
            return response()->view("admin.includes.contents.export_file_{$export->export_format}", ['export' => $found_export])
            ->header('Content-Type', 'text/xml');
        }
        else {
            return "File {$file} not found !!!";
        }

        // return response()->json([
        //     "server_answer" => "success",
        // ]);
    }
 
}
