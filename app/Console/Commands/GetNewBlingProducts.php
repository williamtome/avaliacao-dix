<?php

namespace App\Console\Commands;

use App\Jobs\GetNewBlingProductsJob;
use Illuminate\Console\Command;

class GetNewBlingProducts extends Command
{
    protected $signature = 'new-bling:get-products';

    protected $description = 'Comando responsável por disparar job que traz os produtos do Novo Bling.';

    public function handle(): int
    {
        GetNewBlingProductsJob::dispatch();

        $this->info("Comando {$this->signature} executado com sucesso.");

        info("Comando {$this->signature} executado com sucesso.");

        return Command::SUCCESS;
    }
}
