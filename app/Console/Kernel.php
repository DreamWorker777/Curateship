<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Scraper;
use Modules\Admin\Entities\Settings;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\doScrape::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();

        $ids = [];
        // Check for waiting schedulers every 5 seconds.
        $delay = 5;
        for ($i=0; $i<10; $i++) {
            $scrapers = Scraper::where('status', 'ready')->get();
            if (count($scrapers) > 0) {
                foreach($scrapers as $scraper) {
                    if ( !isset($ids[$scraper->id])) {
                        //Execute commands to execute scraper.
                        $out->writeln('Schedule Scraper - ' . $scraper->id . ' (' . date('Y-m-d H:i:s') . ')' );
                        $schedule->command('do:scrape ' . $scraper->id)->everyMinute()->runInBackground();
                    } else {
                        $out->writeln('Scraper (' . $scraper->id . ') is already scheduled for run. (' . date('Y-m-d H:i:s') . ')' );
                    }

                    $ids[$scraper->id] = 1;
                }
            } else {
                $out->writeln('No scrapers waiting for run. (' . date('Y-m-d H:i:s') . ')' );
            }            
            sleep($delay);
        }

        // Check re-scraper status
        $re_scraper_settings = Settings::where('key', 'scraper_retry')->get()->first();
        if ($re_scraper_settings) {
            $status = $re_scraper_settings['value'];
            if ( $status == 'ready' ) {
                // Execute command without parameter.
                $out->writeln('Schedule Re-Scraper. (' . date('Y-m-d H:i:s') . ')' );
                $schedule->command('do:scrape 0')->everyMinute()->runInBackground();

                $row = Settings::where('key', 'scraper_retry');
                $row->update(['value' => 'running']);    
            }
        }
    
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
