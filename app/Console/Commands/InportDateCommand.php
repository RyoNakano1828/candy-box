<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\Candy;

class InportDateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'insert candies command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->head = $this->getHead();
        
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('info');
        try {
            $file = new \SplFileObject(storage_path('app/csv/candy6.csv'));
            
            $file->setFlags(
              \SplFileObject::READ_CSV |         
              \SplFileObject::READ_AHEAD |       
              \SplFileObject::SKIP_EMPTY |      
              \SplFileObject::DROP_NEW_LINE
            );
      
      
            $flag = 0;
            foreach ($file as $line) {
              mb_convert_variables('UTF-8', 'sjis-win', $line);

              // log::debug($line[0]);
      
              if($flag==0 && !$this->checkHeaders($line)) {
                throw new Exception('error');
              }

              if($flag!=0){
                $this->writeDb($line);
              }
              $flag++;
            }
      
            //DB::commit();
          } catch (Exception  $e) {
            //DB::rollback();
            throw $e;
          }
    }
 
    private function writeDb($records)
    {
        
        log::debug($records);
        $candy = new Candy;
        $candy->name = $records[2];
        $candy->price = $records[5];
        $candy->weight = $records[4];
        $candy->category_id = $records[1];
        $candy->score = $records[3];
        // $candy->timestamps = false;
        $candy->save();

    }

    private function checkHeaders($array)
    {
        return ($this->head == $array);
    }

    private function getHead()
    {
        $head = [
        "id",
        "category_id",
        "title",
        "score",
        "gram",
        "cost",
        ];

        return $head;
    }
}
