<?php

namespace App\Console\Commands;

use App\Models\Absence;
use Illuminate\Console\Command;

class AbsenceUpdateActive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'absence:updateactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Absence update active inactive';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = Absence::where('endDate', '<', now()->format('Y-m-d H:i:s'));
        foreach ($data as $key) {
            if($key['active'] = 1){
                Absence::update($key['active'] , 0);
            };
            ;
            };
        }

}

