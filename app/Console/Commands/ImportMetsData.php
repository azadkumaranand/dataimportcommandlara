<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MetsDataImport;

class ImportMetsData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:mets-data {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Mets Members data from Excel file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $file = $this->argument('file');

        if (!file_exists($file)) {
            $this->error("File not found: {$file}");
            return 1;
        }

        $this->info("Importing data from {$file}");

        try {
            Excel::import(new MetsDataImport, $file);
            $this->info('Import completed successfully.');
        } catch (\Exception $e) {
            $this->error("Error during import: " . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
