<?php

namespace App\Console\Commands;

use App\Models\Token;
use App\Models\PropKey;
use App\Models\TestApi;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PropkeyCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'propkey:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test prop key with each token api';

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
            $id = DB::table('testapi')->where('id',1)->first();
            $task_id = $id->task_id;
            if($task_id > 123){
       
                return;
            }
            $propkeys = PropKey::where('id',$task_id)->first();
            $tokens = Token::all();
            
            foreach ($tokens as $token => $value) {
            $curl = curl_init();
            // connexion api
            // check each apikey with each propkey
            // if conexion good set table with this apikey and this propkey
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.beds24.com/json/getBookings',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                    "authentication": {
                        "apiKey": "'.$value->apikey.'",
                        "propKey": "'.$propkeys->propkey.'"
                    },
                        "includeInfoItems": true,
                        "includeInfoItemsConverted": true
                }',

                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));
            $response = json_decode(curl_exec($curl),true);
            $response = (object)$response;

            if(isset($response->error))
            {
                //$error = $response->error;
                curl_close($curl);
               
            }else
            {
                
                DB::table('token_propertieskey')->insert([
                    'token_id' => $value->id,
                    'propkey_id'=> $propkeys->id,
                ]);
            }


                curl_close($curl);
        }
            $newTask = TestApi::where('id',1)->first();
            $id = $newTask->task_id;
            $id += 1;
            $newTask->task_id = $id;
            $newTask->save();

    }
}
