<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\LogKd;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultPath extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $linux = stripos(PHP_OS, 'linux') !== false;
        $sub_path = $linux ? '' : '/sites/www';
        $client = config('app.client');
        $paths = [
            [
                'name' => 'nyellow_logs',
                'path' => KANDD_PATH . $sub_path . '/nyellow/app/logs',
                'extensions' => ['log'],
                'category' =>'Nyellow'
            ],
            [
                'name' => 'new_portal',
                'path' => KANDD_PATH . $sub_path . '/new_portal/var/log',
                'extensions' => ['log'],
                'category' =>'Globalview'
            ],
            [
                'name' => 'patch',
                'path' => KANDD_PATH . $sub_path . '/tools/patch/tmp',
                'extensions' => ['log'],
                'category' =>'Patchs'
            ],
            [
                'name' => 'automatic_patch_install',
                'path' => KANDD_PATH . '/Temp',
                'extensions' => ['html'],
                'pattern' => 'PatchValidationReport',
                'category' =>'Patchs'
            ],
            [
                'name' => 'report_mode_op_patch_install',
                'path' => KANDD_PATH . '/Temp',
                'extensions' => ['html'],
                'pattern' => 'REPORT_PATCH',
                'category' =>'Patchs'
            ],
            [
                'name' => 'new_patch',
                'path' => KANDD_PATH . $sub_path . '/tools/patchGv/public/tmp##' . KANDD_PATH . $sub_path . '/tools/patchGv/var/log',
                'extensions' => ['log'],
                'category' =>'Patchs'
            ],
            [
                'name' => 'administration',
                'path' => KANDD_PATH . $sub_path . '/Administration/var/logs',
                'extensions' => ['log'],
                'category' =>'Console Administration'
            ],
            [
                'name' => 'kd_jobs',
                'path' => KANDD_PATH . $sub_path . '/adminrd/KDJobs/storage/logs',
                'extensions' => ['log'],
                'category' =>'KD Jobs'
            ],
            [
                'name' => 'kd_logs',
                'path' => KANDD_PATH . $sub_path . '/adminrd/KDLogs/storage/logs',
                'extensions' => ['log'],
                'category' =>'KD Logs'
            ],
            [
                'name' => 'managetdb_v2',
                'path' => KANDD_PATH . $sub_path . '/adminrd/MANAGE_TDBV2/logs',
                'extensions' => ['log'],
                'category' =>'managetdb'
            ],
            [
                'name' => 'managetdb',
                'path' => KANDD_PATH . $sub_path . '/adminrd/MANAGE_TDB/logs',
                'extensions' => ['log'],
                'category' =>'managetdb'
            ],
            [
                'name' => 'php_global_log',
                'path' => dirname(ini_get("error_log")),
                'extensions' => ['log'],
                'pattern' => 'php_errors',
                'category' =>'PHP'
            ],
            [
                'name' => 'sql_global_log',
                'path' => KANDD_PATH . '/Temp',
                'extensions' => ['log'],
                'pattern' => 'errorsql',
                'category' =>'SQL'
            ],
            [
                'name' => 'powershell_log',
                'path' => KANDD_PATH . '/Temp/PSLogs',
                'extensions' => ['log'],
                'category' =>'POWERSHELL'
            ],
            [
                'name' => 'real_time_kpi_log',
                'path' => KANDD_PATH . '/Temp',
                'extensions' => ['log'],
                'pattern' => 'real_time_log',
                'category' =>'SQL'
            ],
            [
                'name' => 'manual_gv_import_log',
                'path' => KANDD_PATH . '/Temp',
                'extensions' => ['log'],
                'pattern' => 'ImportLog',
                'category' =>'GV_IMPORT'
            ],
            [
                'name' => 'manual_gv_import_log_managetdbv2',
                'path' => KANDD_PATH . '/Temp/importCollect',
                'extensions' => ['log'],
                'pattern' => 'ImportLog',
                'category' => 'GV_IMPORT'
            ],
            [
                'name' => 'DAILY_TREATMENT',
                'path' => KANDD_PATH . '/Temp/DAILY_TREATMENT',
                'extensions' => ['log'],
                'category' => 'Jobs Sequencing'
            ],
            [
                'name' => 'MONTHLY_TREATMENT',
                'path' => KANDD_PATH . '/Temp/MONTHLY_TREATMENT',
                'extensions' => ['log'],
                'category' => 'Jobs Sequencing'
            ],
            [
                'name' => 'ICE_IMPORT_CONSO_SEQUENCE',
                'path' => KANDD_PATH . '/Temp/ICE_IMPORT_CONSO_SEQUENCE',
                'extensions' => ['log'],
                'category' => 'Jobs Sequencing'
            ],
            [
                'name' => 'Collection_logs',
                'path' => KANDD_PATH . '/databases/scripts/input/Depot_mails/'.strtoupper($client).'/Logs',
                'extensions' => ['log'],
                'category' => 'COLLECTIONS'
            ],
            [
                'name' => 'CONSOLIDATION_LOGS',
                'path' => KANDD_PATH . '/databases/scriptsv5/logs',
                'extensions' => ['html'],
                'category' => 'Dashboard Consolidation'
            ],
        ];

        // add psql log
        /*$postgresql_cloud = defined('postgresql_cloud') && postgresql_cloud;
        if(!$postgresql_cloud) {
            $data = DB::connection('pgsql')->select("select setting from pg_settings where name = 'log_directory';");
            dd($data);
            $log_dir = $data[0]['setting'];
            $paths[] = [
                'name' => 'Postgresql_log',
                'path' => $log_dir,
                'extensions' => ['log'],
                'pattern' => ''
            ];
        }*/

        foreach ($paths as $path)
        {
            $p_model = LogKd::firstOrNew([
                'name' => $path['name'],
            ]);
            $categ_name = $path['category'];
            $categ = Category::where('name', '=', $categ_name)->firstOrFail();
            $p_model->file_path = $path['path'];
            $p_model->active = 1;
            $p_model->category_id = $categ->id;
            $p_model->extensions = json_encode($path['extensions']);
            if(isset($path['pattern']) && !empty($path['pattern'])) {
                $p_model->pattern = $path['pattern'];
            } else {
                $p_model->pattern = '';
            }
            $p_model->save();
        }
    }
}
