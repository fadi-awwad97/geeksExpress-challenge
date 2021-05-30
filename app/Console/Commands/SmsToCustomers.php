<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SmsToCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:msg {data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send SMS message every two hours to customers';

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
        {     //configuration from Nexmo official doc
            try {
                $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
                $client = new \Nexmo\Client($basic);

                $data =$this->argument('data');
                $receiverNumber = $data->phone_number;
                $message = $data->message;
                $message = $client->message()->send([
                    'to' => $receiverNumber,
                    'from' => 'Vonage APIs',
                    'text' => $message
                ]);
      
                dd('SMS Sent Successfully.');
            } catch (Exception $e) {
                dd("Error: ". $e->getMessage());
            }
        }
    }
}
