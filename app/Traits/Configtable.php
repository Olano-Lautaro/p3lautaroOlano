<?php
    namespace App\Traits;

    use App\Models\Configuration;

    trait configtable
    {
        public function guardarConfiguracion($start_t,$end_t,$stop){

            $config= new Configuration;
            $config->starTime=$start_t;
            $config->endTime=$end_t;
            $config->stop=$stop;

            $config->save();

        }
    }
?>