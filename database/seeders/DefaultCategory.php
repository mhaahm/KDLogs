<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->getOutput()->block("Start seeding of categories");
        $categories = [
            [
                'name' => 'Nyellow'
            ],
            [
                'name' => 'Globalview'
            ],
            [
                'name' => 'Apache'
            ],
            [
                'name' => 'Postgresql'
            ],
            [
                'name' => 'Jobs Sequencing'
            ],
            [
                'name' => 'KD Jobs'
            ],
            [
                'name' => 'KD Logs'
            ],
            [
                'name' => 'managetdb'
            ],
            [
                'name' => 'Dashboard Consolidation'
            ],
            [
                'name' => 'Patchs'
            ],
            [
                'name' => 'Console Administration'
            ],
            [
                'name' => 'PHP'
            ],
            [
                'name' => 'SQL'
            ],
            [
                'name' => 'POWERSHELL'
            ],
            [
                'name' => 'GV_IMPORT'
            ],
            [
                'name' => 'COLLECTIONS'
            ]
        ];

        try {
            foreach ($categories as $category) {
                $categ = Category::firstOrNew([
                    'name' => $category['name']
                ]);
                $categ->name = $category['name'];
                $categ->save();
            }
        } catch (\Exception $e) {
            $this->command->getOutput()->error("Error add categorie to database " . $e->getMessage());
        }

    }
}
