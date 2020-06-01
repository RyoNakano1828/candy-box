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
    protected $description = '商品データインポート';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        // ヘッダ項目の設定
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
            // CSVファイルの読み込み
            $file = new \SplFileObject(storage_path('app/csv/candy.csv'));
            
            $file->setFlags(
              \SplFileObject::READ_CSV |           // CSV 列として行を読み込む
              \SplFileObject::READ_AHEAD |       // 先読み/巻き戻しで読み出す。
              \SplFileObject::SKIP_EMPTY |         // 空行は読み飛ばす
              \SplFileObject::DROP_NEW_LINE    // 行末の改行を読み飛ばす
            );
      
      
            // 読み込んだCSVデータをループ
            $flag = 0;
            foreach ($file as $line) {
              // 文字コードを UTF-8 へ変換
              mb_convert_variables('UTF-8', 'sjis-win', $line);

              log::debug($line[0]);
      
              // ヘッダーチェック
              if($flag==0 && !$this->checkHeaders($line)) {
                // ここにヘッダーチェックエラー時の処理
                // フォームからのアップロードであればヘッダーチェックは
                // リクエストクラスで実装するのがおすすめ
                throw new Exception('ヘッダーが合致しません');
              }

              if($flag!=0){
                // DBへ書き込み
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
        $candy->name = $records[1];
        $candy->price = $records[4];
        $candy->weight = $records[3];
        $candy->category_id = $records[5];
        $candy->score = $records[2];
        $candy->timestamps = false;
        $candy->save();

    }

    private function checkHeaders($array)
    {
        return ($this->head == $array);
    }

    private function getHead()
    {
        $head = [
        "index",
        "title",
        "score",
        "gram",
        "cost",
        "category",
        ];

        return $head;
    }
}
