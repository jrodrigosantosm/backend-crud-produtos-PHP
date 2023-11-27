<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Produto;

class ImportarDados extends Command
{
    protected $signature = 'importar:dados';

    protected $description = 'Importa dados da API e salva no banco de dados';

    public function handle()
    {
        $apiUrl = 'http://127.0.0.1:8000/api/produtos';
        $dadosApi = file_get_contents($apiUrl);

        // Decodificar dados JSON
        $dadosDecodificados = json_decode($dadosApi, true);

        // Iterar sobre os dados e salvar no banco de dados
        foreach ($dadosDecodificados as $dados) {
            Produto::create([
                'nome' => $dados['nome'],
                'categoria' => $dados['categoria'],
                'valor' => $dados['valor'],
                'data_vencimento' => $dados['data_vencimento'],
                'estoque' => $dados['estoque'],
                'perecivel' => $dados['perecivel'],
            ]);
        }

        $this->info('Dados importados com sucesso.');
    }
}
