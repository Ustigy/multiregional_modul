<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\City;

class ImportCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:cities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import cities from hh.ru API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Получаем города');

        $response = Http::get('https://api.hh.ru/areas');

        if($response->successful()) {
            $areas = $response->json();

            $cities = $this->extractCities($areas);

            foreach($cities as $city) {
                City::updateOrCreate(
                    ['name' => $city['name']]
                );
            }

            $this->info('Города успешно импортированы');
        } else {
            $this->error('Не удалось импортировать города');
        }

    }

    private function extractCities(array $areas): array 
    {
        $cities = [];

        foreach ($areas as $area) {
            if (isset($area['areas'])) {
                foreach ($area['areas'] as $subArea) {
                    if (isset($subArea['areas'])) {
                        foreach ($subArea['areas'] as $city) {
                            $cities[] = [
                                'name' => $city['name'],
                            ];
                        }
                    } else {
                        $cities[] = [
                            'name' => $subArea['name'],
                        ];
                    }
                }
            }
        }

        return $cities;
    }


}
