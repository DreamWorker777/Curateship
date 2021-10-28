<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Services\ScraperService;

use Modules\Admin\Entities\{Scraper, ScraperStat, ScraperLog, Settings};
use Illuminate\Support\Facades\Log;

class doScrape extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'do:scrape {scraper_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run existing scrapers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $scraper_settings = Settings::getScraperSettingInfo();

        $scraper_id = intval($this->argument('scraper_id'));
        if ($scraper_id > 0) {
            $scraper = Scraper::find($scraper_id);
            if ($scraper) {
                // Do Scrape action.
                $scraper_service = new ScraperService($scraper, $scraper_settings);
                $scraper_service->run();
                Log::info('Run Scraper by id (' . $scraper_id . ') - ' . date("Y-m-d H:i:s") );
            }    
        } else {
            Log::info('Run Re-Scraper - ' . date("Y-m-d H:i:s") );

            // Get all logs item from logs table.
            $logs = ScraperLog::all();
            foreach($logs as $log) {
                // ignore log item have empty `url` column.
                if (!empty($log->url)) {
                    $scraper = Scraper::find($log->scraper_id);
                    if ($scraper) {
                        // Do custom scrape action.
                        $scraper_service = new ScraperService($scraper, $scraper_settings);
                        $scraper_service->retry($log);
                    }
                } else {
                    ScraperLog::where('id', $log->id)->delete();
                }
            }

            Log::debug('Completed run Re-Scraper - ' . date("Y-m-d H:i:s") );
            // After complete running re-scraper, update status.
            $row = Settings::where('key', 'scraper_retry');
            $row->update(['value' => 'stopped']);
        }
    
        return 0;
    }
}
