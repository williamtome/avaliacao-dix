<?php

namespace App\Console\Commands;

use App\Jobs\GetBlingProductsJob;
use Illuminate\Console\Command;

class GetBlingProducts extends Command
{
    protected $signature = 'bling:get-products';

    protected $description = 'Comando responsável por disparar job que traz os produtos do Antigo Bling.';

    public function handle(): int
    {
        GetBlingProductsJob::dispatch();

        $this->info("Comando {$this->signature} executado com sucesso.");

        info("Comando {$this->signature} executado com sucesso.");

        return Command::SUCCESS;
    }
}
