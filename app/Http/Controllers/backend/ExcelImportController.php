<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Illuminate\Support\Facades\Validator;
use Box\Spout\Common\Helper\EncodingHelper;

class ExcelImportController extends Controller
{
    public function skills_import(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx,csv',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all(),
            ], 200);
        }

        // Load the file
        $file = $request->file('file');
        $filePath = $file->getRealPath();

        // Create reader instance based on file type
        $reader = null;
        if ($file->getClientOriginalExtension() === 'csv') {
            $reader = ReaderEntityFactory::createCSVReader();
            $reader->setEncoding(EncodingHelper::ENCODING_UTF8); // Force UTF-8 encoding
        } else {
            $reader = ReaderEntityFactory::createXLSXReader();
        }

        // Open file to validate row count
        $reader->open($filePath);

        // Initialize row counter
        $rowCount = 0;
        $maxRows = 3000;

        // First loop: Count rows without processing
        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $index => $row) {
                // Skip the header row (assuming first row is the header)
                if ($index === 1) {
                    continue;
                }

                // Increment the row counter
                $rowCount++;

                // Stop if row count exceeds 3000
                if ($rowCount > $maxRows) {
                    $reader->close();
                    return response()->json([
                        'status' => false,
                        'notification' => 'File contains more than 3000 rows. Please upload a smaller file.',
                    ], 200);
                }
            }
        }

        // Close and reopen the reader to process the data after validation
        $reader->close();
        $reader->open($filePath);

        // Second loop: Process data
        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $index => $row) {
                $cells = $row->toArray();

                // Skip the header row (assuming first row is the header)
                if ($index === 1) {
                    continue;
                }

                // Check and process data
                $skillName = mb_convert_encoding(trim($cells[0] ?? ''), 'UTF-8', 'UTF-8');
                $skillStatus = mb_convert_encoding(trim($cells[1] ?? ''), 'UTF-8', 'UTF-8');

                if ($skillName) {
                    $existingSkill = DB::table('skills')->where('name', $skillName)->first();

                    if (!$existingSkill) {
                        DB::table('skills')->insert([
                            'name' => $skillName,
                            'status' => $skillStatus,
                        ]);
                    }
                }
            }
        }

        // Close reader after processing
        $reader->close();

        return response()->json([
            'status' => true,
            'notification' => 'Skills Imported successfully!',
        ]);
    }

}