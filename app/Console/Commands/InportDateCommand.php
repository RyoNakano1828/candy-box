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
    protected $description = '���i�f�[�^�C���|�[�g';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        // �w�b�_���ڂ̐ݒ�
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
            // CSV�t�@�C���̓ǂݍ���
            $file = new \SplFileObject(storage_path('app/csv/candy2.csv'));
            
            $file->setFlags(
              \SplFileObject::READ_CSV |           // CSV ��Ƃ��čs��ǂݍ���
              \SplFileObject::READ_AHEAD |       // ��ǂ�/�����߂��œǂݏo���B
              \SplFileObject::SKIP_EMPTY |         // ��s�͓ǂݔ�΂�
              \SplFileObject::DROP_NEW_LINE    // �s���̉��s��ǂݔ�΂�
            );
      
      
            // �ǂݍ���CSV�f�[�^�����[�v
            $flag = 0;
            foreach ($file as $line) {
              // �����R�[�h�� UTF-8 �֕ϊ�
              mb_convert_variables('UTF-8', 'sjis-win', $line);

              // log::debug($line[0]);
      
              // �w�b�_�[�`�F�b�N
              if($flag==0 && !$this->checkHeaders($line)) {
                throw new Exception('�w�b�_�[�����v���܂���');
              }

              if($flag!=0){
                // DB�֏�������
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
