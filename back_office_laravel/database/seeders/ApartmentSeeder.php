<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Promotion;
use App\Models\Apartment;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $arrAddress = [

            ['address' => 'Via Roma, 7, Viterbo', 'lat' => '41.8724', 'lon' => '12.52727'],

            ['address' => 'Piazza di Spagna, 93, Roma', 'lat' => '42.41722', 'lon' => '12.10548'],

            ['address' => 'Via Aldo Moro, 42, Rieti', 'lat' => '41.90629', 'lon' => '12.48141'],

            ['address' => 'Via Nazionale, 98, Latina', 'lat' => '42.41966', 'lon' => '12.86063'],

            ['address' => 'Corso Cavour, 89, Rieti', 'lat' => '41.58232', 'lon' => '12.97363'],

            ['address' => 'Via di Santa Maria, 36, Rieti', 'lat' => '42.71853', 'lon' => '12.11075'],

            ['address' => 'Via Roma, 29, Viterbo', 'lat' => '42.21661', 'lon' => '12.66406'],

            ['address' => 'Corso Cavour, 85, Latina', 'lat' => '42.41747', 'lon' => '12.10571'],

            ['address' => 'Via Nazionale, 72, Roma', 'lat' => '42.71848', 'lon' => '12.11048'],

            ['address' => 'Via di Santa Maria, 25, Viterbo', 'lat' => '41.89918', 'lon' => '12.49114'],

            ['address' => 'Piazza di Spagna, 58, Roma', 'lat' => '45.35518', 'lon' => '10.14442'],

            ['address' => 'Corso Cavour, 23, Frosinone', 'lat' => '41.90526', 'lon' => '12.48254'],

            ['address' => 'Via Aldo Moro, 95, Viterbo', 'lat' => '41.72614', 'lon' => '13.3441'],

            ['address' => 'Corso Cavour, 25, Latina', 'lat' => '42.56056', 'lon' => '11.83302'],

            ['address' => 'Piazza di Spagna, 90, Frosinone', 'lat' => '41.21452', 'lon' => '13.56916'],

            ['address' => 'Via Nazionale, 92, Viterbo', 'lat' => '41.90621', 'lon' => '12.48151'],

            ['address' => 'Via Nazionale, 61, Rieti', 'lat' => '39.43917', 'lon' => '9.57633'],

            ['address' => 'Via Aldo Moro, 91, Viterbo', 'lat' => '42.41911', 'lon' => '13.07977'],

            ['address' => 'Via di Santa Maria, 56, Rieti', 'lat' => '42.56054', 'lon' => '11.83344'],

            ['address' => 'Via Nazionale, 15, Roma', 'lat' => '42.21583', 'lon' => '12.66485'],

            ['address' => 'Piazza di Spagna, 58, Rieti', 'lat' => '41.90129', 'lon' => '12.49436'],

            ['address' => 'Via Roma, 26, Rieti', 'lat' => '41.90526', 'lon' => '12.48254'],

            ['address' => 'Via Aldo Moro, 6, Roma', 'lat' => '42.40041', 'lon' => '12.86087'],

            ['address' => 'Via Aldo Moro, 17, Rieti', 'lat' => '42.11289', 'lon' => '12.36828'],

            ['address' => 'Via di Santa Maria, 81, Rieti', 'lat' => '42.20257', 'lon' => '13.26604'],

            ['address' => 'Via di Santa Maria, 12, Rieti', 'lat' => '42.21416', 'lon' => '12.66242'],

            ['address' => 'Via di Santa Maria, 29, Rieti', 'lat' => '42.23238', 'lon' => '12.74121'],

            ['address' => 'Via di Santa Maria, 83, Frosinone', 'lat' => '42.22266', 'lon' => '12.6676'],

            ['address' => 'Via Roma, 61, Latina', 'lat' => '41.7046', 'lon' => '13.80747'],

            ['address' => 'Corso Cavour, 72, Viterbo', 'lat' => '41.62049', 'lon' => '13.83565'],

            ['address' => 'Via Nazionale, 81, Rieti', 'lat' => '42.5388', 'lon' => '12.0319'],

            ['address' => 'Piazza di Spagna, 37, Rieti', 'lat' => '42.41937', 'lon' => '13.0795'],

            ['address' => 'Via Aldo Moro, 66, Frosinone', 'lat' => '41.90532', 'lon' => '12.4828'],

            ['address' => 'Via Roma, 4, Rieti', 'lat' => '41.64521', 'lon' => '13.34718'],

            ['address' => 'Piazza di Spagna, 81, Viterbo', 'lat' => '42.24435', 'lon' => '12.69087'],

            ['address' => 'Via Roma, 54, Latina', 'lat' => '41.90596', 'lon' => '12.48181'],

            ['address' => 'Via Roma, 65, Latina', 'lat' => '41.61946', 'lon' => '13.83266'],

            ['address' => 'Via Aldo Moro, 53, Frosinone', 'lat' => '41.62023', 'lon' => '13.8357'],

            ['address' => 'Via Aldo Moro, 80, Latina', 'lat' => '41.64554', 'lon' => '13.3483'],

            ['address' => 'Via Nazionale, 93, Rieti', 'lat' => '41.58707', 'lon' => '12.6476'],

            ['address' => 'Via di Santa Maria, 56, Latina', 'lat' => '42.41992', 'lon' => '13.07905'],

            ['address' => 'Via Roma, 75, Frosinone', 'lat' => '43.93056', 'lon' => '10.89935'],

            ['address' => 'Corso Cavour, 57, Frosinone', 'lat' => '41.64557', 'lon' => '13.35264'],

            ['address' => 'Via Roma, 89, Rieti', 'lat' => '41.72629', 'lon' => '13.34488'],

            ['address' => 'Piazza di Spagna, 2, Latina', 'lat' => '42.40204', 'lon' => '12.86121'],

            ['address' => 'Via Aldo Moro, 47, Latina', 'lat' => '43.07694', 'lon' => '11.6794'],

            ['address' => 'Corso Cavour, 31, Rieti', 'lat' => '41.59157', 'lon' => '12.64364'],

            ['address' => 'Via Roma, 48, Rieti', 'lat' => '41.94231', 'lon' => '14.63486'],

            ['address' => 'Corso Cavour, 46, Roma', 'lat' => '42.25757', 'lon' => '12.68416'],

            ['address' => 'Corso Cavour, 64, Rieti', 'lat' => '42.95459', 'lon' => '12.70542'],

            ['address' => 'Via di Santa Maria, 10, Latina', 'lat' => '42.95428', 'lon' => '12.70567'],

            ['address' => 'Via di Santa Maria, 98, Viterbo', 'lat' => '41.52565', 'lon' => '12.817'],

            ['address' => 'Via Roma, 1, Roma', 'lat' => '41.87275', 'lon' => '12.52742'],

            ['address' => 'Piazza di Spagna, 8, Frosinone', 'lat' => '37.32877', 'lon' => '13.55116'],

            ['address' => 'Via di Santa Maria, 31, Latina', 'lat' => '41.90669', 'lon' => '12.48178'],

            ['address' => 'Corso Cavour, 1, Rieti', 'lat' => '41.34491', 'lon' => '13.43336'],

            ['address' => 'Via Nazionale, 43, Frosinone', 'lat' => '41.94203', 'lon' => '14.6358'],

            ['address' => 'Via di Santa Maria, 41, Latina', 'lat' => '41.53859', 'lon' => '13.27905'],

            ['address' => 'Via Aldo Moro, 35, Frosinone', 'lat' => '41.53131', 'lon' => '12.79526'],

            ['address' => 'Via Roma, 81, Viterbo', 'lat' => '41.64582', 'lon' => '13.34827'],

            ['address' => 'Piazza di Spagna, 96, Roma', 'lat' => '42.37923', 'lon' => '12.28386'],

            ['address' => 'Via Aldo Moro, 1, Viterbo', 'lat' => '41.90637', 'lon' => '12.48132'],

            ['address' => 'Via Roma, 15, Frosinone', 'lat' => '42.42702', 'lon' => '12.09931'],

            ['address' => 'Via di Santa Maria, 12, Latina', 'lat' => '41.6425', 'lon' => '13.35055'],

            ['address' => 'Via Roma, 36, Latina', 'lat' => '43.92793', 'lon' => '10.89914'],

            ['address' => 'Corso Cavour, 85, Latina', 'lat' => '41.61967', 'lon' => '13.83162'],

            ['address' => 'Via Nazionale, 98, Viterbo', 'lat' => '42.71848', 'lon' => '12.11048'],

            ['address' => 'Corso Cavour, 99, Frosinone', 'lat' => '38.1212', 'lon' => '15.12837'],

            ['address' => 'Via Aldo Moro, 66, Viterbo', 'lat' => '42.95417', 'lon' => '12.70588'],

            ['address' => 'Piazza di Spagna, 91, Roma', 'lat' => '42.54378', 'lon' => '11.76331'],

            ['address' => 'Via Roma, 8, Viterbo', 'lat' => '41.90626', 'lon' => '12.48155'],

            ['address' => 'Via Nazionale, 13, Rieti', 'lat' => '42.41725', 'lon' => '12.10541'],

            ['address' => 'Via Nazionale, 39, Roma', 'lat' => '42.41803', 'lon' => '13.08023'],

            ['address' => 'Via di Santa Maria, 32, Rieti', 'lat' => '41.90032', 'lon' => '12.49286'],

            ['address' => 'Corso Cavour, 86, Frosinone', 'lat' => '42.21656', 'lon' => '12.66362'],

            ['address' => 'Corso Cavour, 99, Frosinone', 'lat' => '41.72636', 'lon' => '13.34546'],

            ['address' => 'Piazza di Spagna, 10, Frosinone', 'lat' => '42.95417', 'lon' => '12.70588'],

            ['address' => 'Via di Santa Maria, 4, Viterbo', 'lat' => '43.07704', 'lon' => '11.67949'],

            ['address' => 'Via Roma, 49, Rieti', 'lat' => '37.59039', 'lon' => '14.97439'],

            ['address' => 'Via Aldo Moro, 80, Latina', 'lat' => '42.40114', 'lon' => '12.86104'],

            ['address' => 'Corso Cavour, 26, Latina', 'lat' => '41.58707', 'lon' => '12.6476'],

            ['address' => 'Via Nazionale, 69, Latina', 'lat' => '41.21469', 'lon' => '13.56902'],

            ['address' => 'Via Aldo Moro, 37, Frosinone', 'lat' => '41.58268', 'lon' => '12.97348'],

            ['address' => 'Via di Santa Maria, 96, Roma', 'lat' => '41.6458', 'lon' => '13.34823'],

            ['address' => 'Via Aldo Moro, 97, Rieti', 'lat' => '41.87277', 'lon' => '12.52746'],

            ['address' => 'Via Aldo Moro, 92, Rieti', 'lat' => '42.19658', 'lon' => '12.99635'],

            ['address' => 'Corso Cavour, 40, Frosinone', 'lat' => '42.40612', 'lon' => '13.06075'],

            ['address' => 'Via Roma, 55, Roma', 'lat' => '41.72616', 'lon' => '13.34462'],

            ['address' => 'Via Aldo Moro, 66, Frosinone', 'lat' => '42.88871', 'lon' => '13.90751'],

            ['address' => 'Via Nazionale, 8, Frosinone', 'lat' => '41.64521', 'lon' => '13.34718'],

            ['address' => 'Via Aldo Moro, 30, Latina', 'lat' => '41.53914', 'lon' => '13.27886'],

            ['address' => 'Piazza di Spagna, 9, Rieti', 'lat' => '41.40205', 'lon' => '13.04752'],

            ['address' => 'Corso Cavour, 69, Latina', 'lat' => '43.07707', 'lon' => '11.67945'],

            ['address' => 'Via Nazionale, 13, Roma', 'lat' => '41.21421', 'lon' => '13.56715'],

            ['address' => 'Via Nazionale, 10, Frosinone', 'lat' => '41.90135', 'lon' => '12.49442'],

            ['address' => 'Via Roma, 19, Latina', 'lat' => '41.53912', 'lon' => '13.27889'],

            ['address' => 'Via Aldo Moro, 11, Roma', 'lat' => '41.62013', 'lon' => '13.83389'],

            ['address' => 'Piazza di Spagna, 16, Viterbo', 'lat' => '41.69946', 'lon' => '12.69447'],

            ['address' => 'Via Nazionale, 47, Rieti', 'lat' => '41.90643', 'lon' => '12.48213'],

            ['address' => 'Corso Cavour, 48, Roma', 'lat' => '42.41879', 'lon' => '13.08009'],

            ['address' => 'Via di Santa Maria, 41, Viterbo', 'lat' => '39.68899', 'lon' => '9.25054'],

            ['address' => 'Via Roma, 17, Rieti', 'lat' => '37.66385', 'lon' => '15.10883'],

            ['address' => 'Via Nazionale, 69, Rieti', 'lat' => '42.40045', 'lon' => '12.86095'],

            ['address' => 'Via Roma, 49, Rieti', 'lat' => '42.41984', 'lon' => '13.07912'],

            ['address' => 'Corso Cavour, 51, Viterbo', 'lat' => '42.40114', 'lon' => '12.86104'],

            ['address' => 'Via di Santa Maria, 49, Viterbo', 'lat' => '42.53928', 'lon' => '12.03249'],

            ['address' => 'Via Aldo Moro, 42, Latina', 'lat' => '41.86117', 'lon' => '12.70601'],

            ['address' => 'Via Roma, 96, Latina', 'lat' => '41.58585', 'lon' => '12.64851'],

            ['address' => 'Via Aldo Moro, 33, Frosinone', 'lat' => '41.62005', 'lon' => '13.83536'],

            ['address' => 'Via Roma, 35, Rieti', 'lat' => '41.64585', 'lon' => '13.3483'],

            ['address' => 'Via di Santa Maria, 88, Frosinone', 'lat' => '42.4008', 'lon' => '12.861'],

            ['address' => 'Piazza di Spagna, 80, Frosinone', 'lat' => '41.7047', 'lon' => '13.80763'],

            ['address' => 'Via Nazionale, 89, Rieti', 'lat' => '41.90594', 'lon' => '12.48183'],

            ['address' => 'Via Roma, 80, Viterbo', 'lat' => '42.41942', 'lon' => '13.07941'],

            ['address' => 'Via Roma, 78, Roma', 'lat' => '42.31913', 'lon' => '12.0575'],

            ['address' => 'Via Nazionale, 15, Rieti', 'lat' => '41.39095', 'lon' => '13.86934'],

            ['address' => 'Piazza di Spagna, 76, Latina', 'lat' => '42.38805', 'lon' => '12.9486'],

            ['address' => 'Corso Cavour, 41, Viterbo', 'lat' => '41.90568', 'lon' => '12.48232'],

            ['address' => 'Via di Santa Maria, 7, Viterbo', 'lat' => '42.64513', 'lon' => '11.98591'],

            ['address' => 'Via Nazionale, 37, Viterbo', 'lat' => '43.92784', 'lon' => '10.89905'],

            ['address' => 'Via Nazionale, 89, Rieti', 'lat' => '42.63637', 'lon' => '12.11236'],

            ['address' => 'Via Nazionale, 73, Roma', 'lat' => '42.41942', 'lon' => '13.07941'],

            ['address' => 'Piazza di Spagna, 54, Rieti', 'lat' => '41.89915', 'lon' => '12.4911'],

            ['address' => 'Piazza di Spagna, 13, Latina', 'lat' => '41.90478', 'lon' => '12.48284'],

            ['address' => 'Via Roma, 58, Viterbo', 'lat' => '37.18517', 'lon' => '13.77034'],

            ['address' => 'Via di Santa Maria, 10, Latina', 'lat' => '42.31929', 'lon' => '12.05702'],

            ['address' => 'Piazza di Spagna, 23, Frosinone', 'lat' => '41.52565', 'lon' => '12.817'],

            ['address' => 'Via di Santa Maria, 1, Viterbo', 'lat' => '41.90606', 'lon' => '12.48236'],

            ['address' => 'Corso Cavour, 55, Frosinone', 'lat' => '42.41405', 'lon' => '12.11043'],

            ['address' => 'Via di Santa Maria, 68, Viterbo', 'lat' => '41.72627', 'lon' => '13.34483'],

            ['address' => 'Via di Santa Maria, 29, Frosinone', 'lat' => '41.93156', 'lon' => '12.51995'],

            ['address' => 'Via Aldo Moro, 71, Frosinone', 'lat' => '41.45832', 'lon' => '13.66555'],

            ['address' => 'Via Roma, 36, Frosinone', 'lat' => '41.64553', 'lon' => '13.34819'],

            ['address' => 'Via di Santa Maria, 62, Frosinone', 'lat' => '41.64422', 'lon' => '13.35201'],

            ['address' => 'Via Aldo Moro, 12, Latina', 'lat' => '41.46766', 'lon' => '13.87654'],

            ['address' => 'Via Aldo Moro, 1, Latina', 'lat' => '41.30219', 'lon' => '14.2533'],

            ['address' => 'Via Roma, 100, Viterbo', 'lat' => '41.60057', 'lon' => '12.84491'],

            ['address' => 'Via di Santa Maria, 40, Viterbo', 'lat' => '42.54841', 'lon' => '11.91047'],

            ['address' => 'Via di Santa Maria, 43, Frosinone', 'lat' => '41.87347', 'lon' => '12.52861'],

            ['address' => 'Piazza di Spagna, 7, Roma', 'lat' => '41.46885', 'lon' => '13.88035'],

            ['address' => 'Via di Santa Maria, 24, Rieti', 'lat' => '41.90668', 'lon' => '12.48174'],

            ['address' => 'Corso Cavour, 58, Rieti', 'lat' => '42.2167', 'lon' => '12.6635'],

            ['address' => 'Corso Cavour, 16, Latina', 'lat' => '42.78058', 'lon' => '12.40767'],

            ['address' => 'Corso Cavour, 15, Roma', 'lat' => '41.21486', 'lon' => '13.56968'],

            ['address' => 'Via Roma, 19, Viterbo', 'lat' => '41.97523', 'lon' => '12.86816'],

            ['address' => 'Corso Cavour, 47, Rieti', 'lat' => '42.41738', 'lon' => '12.10562'],

            ['address' => 'Corso Cavour, 82, Frosinone', 'lat' => '41.02995', 'lon' => '15.96959'],

            ['address' => 'Piazza di Spagna, 22, Roma', 'lat' => '41.72634', 'lon' => '13.34542'],

            ['address' => 'Piazza di Spagna, 87, Rieti', 'lat' => '41.90612', 'lon' => '12.48233'],

            ['address' => 'Via Roma, 46, Viterbo', 'lat' => '41.90616', 'lon' => '12.48157'],

            ['address' => 'Via Nazionale, 99, Rieti', 'lat' => '42.33377', 'lon' => '12.29844'],

            ['address' => 'Via Nazionale, 16, Viterbo', 'lat' => '42.4195', 'lon' => '13.07931'],

            ['address' => 'Via Roma, 43, Viterbo', 'lat' => '42.69127', 'lon' => '11.81644'],

            ['address' => 'Via di Santa Maria, 93, Viterbo', 'lat' => '42.41765', 'lon' => '12.10593'],

            ['address' => 'Via Aldo Moro, 53, Roma', 'lat' => '41.87254', 'lon' => '12.52736'],

            ['address' => 'Via Nazionale, 52, Latina', 'lat' => '41.86625', 'lon' => '12.82835'],

            ['address' => 'Via Nazionale, 14, Viterbo', 'lat' => '41.58245', 'lon' => '12.97355'],

            ['address' => 'Piazza di Spagna, 35, Rieti', 'lat' => '42.6913', 'lon' => '11.81643'],

            ['address' => 'Corso Cavour, 67, Rieti', 'lat' => '41.90536', 'lon' => '12.48275'],

            ['address' => 'Via di Santa Maria, 85, Viterbo', 'lat' => '43.10674', 'lon' => '12.3911'],

            ['address' => 'Via di Santa Maria, 55, Frosinone', 'lat' => '41.8726', 'lon' => '12.52761'],

            ['address' => 'Via di Santa Maria, 15, Frosinone', 'lat' => '41.70473', 'lon' => '13.80849'],

            ['address' => 'Via Roma, 49, Viterbo', 'lat' => '41.45835', 'lon' => '13.66586'],

            ['address' => 'Corso Cavour, 11, Rieti', 'lat' => '42.41769', 'lon' => '12.106'],

            ['address' => 'Corso Cavour, 45, Latina', 'lat' => '41.94212', 'lon' => '14.63557'],

            ['address' => 'Corso Cavour, 82, Latina', 'lat' => '41.21429', 'lon' => '13.56792'],

            ['address' => 'Via Aldo Moro, 97, Rieti', 'lat' => '41.21434', 'lon' => '13.56722'],

            ['address' => 'Via Nazionale, 6, Latina', 'lat' => '42.19658', 'lon' => '12.99635'],

            ['address' => 'Corso Cavour, 3, Viterbo', 'lat' => '41.5836', 'lon' => '12.97299'],

            ['address' => 'Via Roma, 3, Viterbo', 'lat' => '42.64482', 'lon' => '11.98681'],

            ['address' => 'Via Nazionale, 49, Viterbo', 'lat' => '42.41714', 'lon' => '12.10542'],

            ['address' => 'Via Roma, 3, Viterbo', 'lat' => '42.63633', 'lon' => '12.11282'],

            ['address' => 'Corso Cavour, 43, Frosinone', 'lat' => '42.41714', 'lon' => '12.10542'],

            ['address' => 'Via di Santa Maria, 16, Rieti', 'lat' => '41.72619', 'lon' => '13.34456'],

            ['address' => 'Via Roma, 47, Roma', 'lat' => '42.23242', 'lon' => '12.7411'],

            ['address' => 'Corso Cavour, 76, Rieti', 'lat' => '42.32196', 'lon' => '14.04549'],

            ['address' => 'Via di Santa Maria, 77, Rieti', 'lat' => '42.95407', 'lon' => '12.70584'],

            ['address' => 'Via Nazionale, 12, Viterbo', 'lat' => '42.21454', 'lon' => '12.66408'],

            ['address' => 'Corso Cavour, 73, Rieti', 'lat' => '42.53847', 'lon' => '12.0298'],

            ['address' => 'Via di Santa Maria, 70, Frosinone', 'lat' => '42.78073', 'lon' => '12.40756'],

            ['address' => 'Via Aldo Moro, 51, Viterbo', 'lat' => '41.46223', 'lon' => '13.88092'],

            ['address' => 'Via Aldo Moro, 7, Frosinone', 'lat' => '42.56129', 'lon' => '11.8323'],

            ['address' => 'Via di Santa Maria, 38, Roma', 'lat' => '41.64627', 'lon' => '13.34841'],

            ['address' => 'Piazza di Spagna, 43, Frosinone', 'lat' => '41.93175', 'lon' => '12.52062'],

            ['address' => 'Via Roma, 8, Viterbo', 'lat' => '41.90484', 'lon' => '12.48336'],

            ['address' => 'Corso Cavour, 38, Roma', 'lat' => '42.41725', 'lon' => '12.10541'],

            ['address' => 'Corso Cavour, 8, Frosinone', 'lat' => '41.97501', 'lon' => '12.86727'],

            ['address' => 'Corso Cavour, 100, Latina', 'lat' => '41.72604', 'lon' => '13.3438'],

            ['address' => 'Corso Cavour, 79, Roma', 'lat' => '41.21446', 'lon' => '13.56672'],

            ['address' => 'Piazza di Spagna, 86, Viterbo', 'lat' => '42.71848', 'lon' => '12.11024'],

            ['address' => 'Via Aldo Moro, 24, Latina', 'lat' => '41.90613', 'lon' => '12.48159'],

            ['address' => 'Piazza di Spagna, 60, Latina', 'lat' => '41.40273', 'lon' => '13.04845'],

            ['address' => 'Piazza di Spagna, 1, Viterbo', 'lat' => '41.90532', 'lon' => '12.48251'],

            ['address' => 'Via Aldo Moro, 67, Frosinone', 'lat' => '43.07697', 'lon' => '11.67935'],

            ['address' => 'Corso Cavour, 15, Roma', 'lat' => '41.64553', 'lon' => '13.34828'],

            ['address' => 'Via di Santa Maria, 79, Roma', 'lat' => '41.97523', 'lon' => '12.86816'],

            ['address' => 'Piazza di Spagna, 98, Roma', 'lat' => '41.87266', 'lon' => '12.52772'],

            ['address' => 'Via Nazionale, 16, Roma', 'lat' => '41.90642', 'lon' => '12.48126'],

            ['address' => 'Via Nazionale, 99, Roma', 'lat' => '41.90127', 'lon' => '12.49433'],

            ['address' => 'Piazza di Spagna, 25, Viterbo', 'lat' => '41.53817', 'lon' => '13.27967'],

            ['address' => 'Via Aldo Moro, 99, Viterbo', 'lat' => '41.90601', 'lon' => '12.48239'],

            ['address' => 'Via Roma, 8, Roma', 'lat' => '42.5604', 'lon' => '11.83281'],

            ['address' => 'Piazza di Spagna, 74, Frosinone', 'lat' => '39.87051', 'lon' => '9.23403'],

            ['address' => 'Piazza di Spagna, 57, Rieti', 'lat' => '41.90566', 'lon' => '12.48218'],

            ['address' => 'Piazza di Spagna, 83, Rieti', 'lat' => '41.90499', 'lon' => '12.48271'],

            ['address' => 'Via Roma, 48, Latina', 'lat' => '41.90599', 'lon' => '12.48176'],

            ['address' => 'Via Nazionale, 32, Frosinone', 'lat' => '41.61978', 'lon' => '13.83257'],

            ['address' => 'Via Nazionale, 64, Roma', 'lat' => '41.67809', 'lon' => '13.57578'],

            ['address' => 'Piazza di Spagna, 97, Frosinone', 'lat' => '41.8994', 'lon' => '12.49148'],

            ['address' => 'Via Aldo Moro, 32, Latina', 'lat' => '41.9064', 'lon' => '12.48129'],

            ['address' => 'Corso Cavour, 14, Rieti', 'lat' => '41.47534', 'lon' => '13.17286'],

            ['address' => 'Via Aldo Moro, 45, Latina', 'lat' => '39.69201', 'lon' => '9.24934'],

            ['address' => 'Via di Santa Maria, 9, Roma', 'lat' => '41.58909', 'lon' => '12.64491'],

            ['address' => 'Via Roma, 4, Viterbo', 'lat' => '41.87371', 'lon' => '12.52937'],

            ['address' => 'Via Nazionale, 3, Roma', 'lat' => '42.41716', 'lon' => '12.10533'],

            ['address' => 'Via di Santa Maria, 1, Viterbo', 'lat' => '44.52607', 'lon' => '10.86621'],

            ['address' => 'Corso Cavour, 27, Viterbo', 'lat' => '42.41405', 'lon' => '12.11043'],

            ['address' => 'Via Roma, 34, Viterbo', 'lat' => '42.53954', 'lon' => '12.03291'],

            ['address' => 'Via di Santa Maria, 11, Viterbo', 'lat' => '42.41762', 'lon' => '12.10582'],

            ['address' => 'Piazza di Spagna, 11, Frosinone', 'lat' => '43.92795', 'lon' => '10.89855'],

            ['address' => 'Corso Cavour, 21, Rieti', 'lat' => '43.07713', 'lon' => '11.67951'],

            ['address' => 'Via Aldo Moro, 65, Viterbo', 'lat' => '45.73602', 'lon' => '8.57297'],

            ['address' => 'Via Nazionale, 21, Frosinone', 'lat' => '42.56102', 'lon' => '11.83264'],

            ['address' => 'Via di Santa Maria, 60, Latina', 'lat' => '41.67643', 'lon' => '13.57653'],

            ['address' => 'Piazza di Spagna, 88, Rieti', 'lat' => '43.93083', 'lon' => '10.89943'],

            ['address' => 'Piazza di Spagna, 17, Roma', 'lat' => '41.90618', 'lon' => '12.48154'],

            ['address' => 'Corso Cavour, 10, Frosinone', 'lat' => '41.90568', 'lon' => '12.48232'],

            ['address' => 'Via Nazionale, 47, Viterbo', 'lat' => '41.72605', 'lon' => '13.34385'],

            ['address' => 'Corso Cavour, 75, Frosinone', 'lat' => '42.63633', 'lon' => '12.11272'],

            ['address' => 'Piazza di Spagna, 27, Viterbo', 'lat' => '41.72647', 'lon' => '13.34551'],

            ['address' => 'Via Roma, 47, Roma', 'lat' => '41.9057', 'lon' => '12.48255'],

            ['address' => 'Via Aldo Moro, 33, Frosinone', 'lat' => '42.32196', 'lon' => '14.04549'],

            ['address' => 'Corso Cavour, 7, Latina', 'lat' => '41.64585', 'lon' => '13.3483'],

            ['address' => 'Corso Cavour, 39, Viterbo', 'lat' => '41.2148', 'lon' => '13.57002'],

            ['address' => 'Via Nazionale, 98, Roma', 'lat' => '42.53938', 'lon' => '12.0327'],

            ['address' => 'Via Aldo Moro, 49, Rieti', 'lat' => '38.1212', 'lon' => '15.12837'],

            ['address' => 'Via Nazionale, 77, Viterbo', 'lat' => '42.19718', 'lon' => '12.99587'],

            ['address' => 'Via Roma, 30, Frosinone', 'lat' => '43.25696', 'lon' => '13.4175'],

            ['address' => 'Piazza di Spagna, 94, Latina', 'lat' => '41.64408', 'lon' => '13.35245'],

            ['address' => 'Via Nazionale, 67, Latina', 'lat' => '41.90632', 'lon' => '12.48138'],

            ['address' => 'Piazza di Spagna, 69, Latina', 'lat' => '41.58273', 'lon' => '12.97348'],

            ['address' => 'Via Roma, 48, Rieti', 'lat' => '41.90552', 'lon' => '12.48233'],

            ['address' => 'Via Roma, 12, Latina', 'lat' => '42.25757', 'lon' => '12.68416'],

            ['address' => 'Via di Santa Maria, 42, Viterbo', 'lat' => '41.61947', 'lon' => '13.83005'],

            ['address' => 'Via di Santa Maria, 84, Frosinone', 'lat' => '43.92984', 'lon' => '10.89909'],

            ['address' => 'Via Roma, 90, Latina', 'lat' => '41.70491', 'lon' => '13.80803'],

            ['address' => 'Via Nazionale, 47, Frosinone', 'lat' => '41.59408', 'lon' => '12.82172'],

            ['address' => 'Via di Santa Maria, 100, Latina', 'lat' => '41.53854', 'lon' => '13.27914'],

            ['address' => 'Corso Cavour, 94, Rieti', 'lat' => '41.87274', 'lon' => '12.5274'],

            ['address' => 'Piazza di Spagna, 60, Frosinone', 'lat' => '42.9538', 'lon' => '12.70604'],

            ['address' => 'Via di Santa Maria, 100, Roma', 'lat' => '41.90532', 'lon' => '12.48251'],

            ['address' => 'Corso Cavour, 21, Rieti', 'lat' => '41.87274', 'lon' => '12.5274'],

            ['address' => 'Corso Cavour, 19, Rieti', 'lat' => '45.73602', 'lon' => '8.57297'],

            ['address' => 'Via Aldo Moro, 13, Latina', 'lat' => '41.94215', 'lon' => '14.63539'],

            ['address' => 'Piazza di Spagna, 27, Frosinone', 'lat' => '41.30125', 'lon' => '14.25418'],

            ['address' => 'Piazza di Spagna, 82, Frosinone', 'lat' => '41.9057', 'lon' => '12.48255'],

            ['address' => 'Via di Santa Maria, 60, Viterbo', 'lat' => '41.90598', 'lon' => '12.48179'],

            ['address' => 'Via Aldo Moro, 61, Rieti', 'lat' => '43.93083', 'lon' => '10.89943'],

            ['address' => 'Corso Cavour, 91, Roma', 'lat' => '42.40666', 'lon' => '13.06109'],

            ['address' => 'Via Aldo Moro, 23, Viterbo', 'lat' => '42.71855', 'lon' => '12.11081'],

            ['address' => 'Via Roma, 75, Latina', 'lat' => '42.34813', 'lon' => '12.34985'],

            ['address' => 'Via di Santa Maria, 2, Frosinone', 'lat' => '41.62028', 'lon' => '13.83613'],

            ['address' => 'Via Aldo Moro, 84, Roma', 'lat' => '41.46311', 'lon' => '13.87846'],

            ['address' => 'Via di Santa Maria, 90, Frosinone', 'lat' => '41.76493', 'lon' => '12.60856'],

            ['address' => 'Via Nazionale, 3, Roma', 'lat' => '41.70461', 'lon' => '13.80746'],

            ['address' => 'Via Roma, 72, Viterbo', 'lat' => '44.52607', 'lon' => '10.86621'],

            ['address' => 'Via Aldo Moro, 9, Roma', 'lat' => '42.67433', 'lon' => '11.86864'],

            ['address' => 'Via di Santa Maria, 5, Frosinone', 'lat' => '42.11308', 'lon' => '12.36836'],

            ['address' => 'Corso Cavour, 31, Latina', 'lat' => '41.4584', 'lon' => '13.66635'],

            ['address' => 'Via Aldo Moro, 1, Rieti', 'lat' => '41.21436', 'lon' => '13.56873'],

            ['address' => 'Via Aldo Moro, 6, Viterbo', 'lat' => '42.41959', 'lon' => '12.85959'],

            ['address' => 'Via Aldo Moro, 77, Latina', 'lat' => '42.42693', 'lon' => '12.10014'],

            ['address' => 'Via di Santa Maria, 90, Roma', 'lat' => '41.40477', 'lon' => '13.05044'],

            ['address' => 'Via Nazionale, 100, Latina', 'lat' => '41.87283', 'lon' => '12.52755'],

            ['address' => 'Via Nazionale, 73, Rieti', 'lat' => '41.58231', 'lon' => '12.97363'],

            ['address' => 'Piazza di Spagna, 74, Roma', 'lat' => '42.41924', 'lon' => '13.07961'],

            ['address' => 'Via di Santa Maria, 37, Roma', 'lat' => '41.90566', 'lon' => '12.48218'],

            ['address' => 'Piazza di Spagna, 20, Rieti', 'lat' => '41.87334', 'lon' => '12.52879'],

            ['address' => 'Via Roma, 60, Viterbo', 'lat' => '41.9062', 'lon' => '12.48229'],

            ['address' => 'Via Aldo Moro, 15, Viterbo', 'lat' => '42.34537', 'lon' => '12.35479'],

            ['address' => 'Via Nazionale, 6, Rieti', 'lat' => '42.22179', 'lon' => '12.18294'],

            ['address' => 'Via Nazionale, 27, Roma', 'lat' => '42.38844', 'lon' => '12.94923'],

            ['address' => 'Via Nazionale, 55, Frosinone', 'lat' => '41.90071', 'lon' => '12.49344'],

            ['address' => 'Piazza di Spagna, 64, Viterbo', 'lat' => '41.53844', 'lon' => '13.27919'],

            ['address' => 'Corso Cavour, 94, Frosinone', 'lat' => '41.90541', 'lon' => '12.48243'],

            ['address' => 'Via Aldo Moro, 60, Frosinone', 'lat' => '41.72638', 'lon' => '13.34554'],

            ['address' => 'Via Roma, 30, Rieti', 'lat' => '41.64507', 'lon' => '13.34707'],

            ['address' => 'Via Aldo Moro, 49, Rieti', 'lat' => '42.40047', 'lon' => '12.86089'],

            ['address' => 'Via Aldo Moro, 42, Roma', 'lat' => '42.19718', 'lon' => '12.99587'],

            ['address' => 'Corso Cavour, 75, Latina', 'lat' => '41.74161', 'lon' => '12.64698'],

            ['address' => 'Via Nazionale, 96, Rieti', 'lat' => '41.12375', 'lon' => '16.87209'],

            ['address' => 'Via Roma, 10, Rieti', 'lat' => '42.42019', 'lon' => '13.079'],

            ['address' => 'Piazza di Spagna, 9, Viterbo', 'lat' => '42.40017', 'lon' => '12.86084'],

            ['address' => 'Piazza di Spagna, 77, Latina', 'lat' => '43.07707', 'lon' => '11.67945'],

            ['address' => 'Via di Santa Maria, 68, Latina', 'lat' => '41.90576', 'lon' => '12.48201'],

            ['address' => 'Via Nazionale, 98, Rieti', 'lat' => '41.93156', 'lon' => '12.51995'],

            ['address' => 'Via Roma, 47, Rieti', 'lat' => '42.4202', 'lon' => '13.07899'],

            ['address' => 'Via di Santa Maria, 92, Latina', 'lat' => '42.29379', 'lon' => '12.69104'],

            ['address' => 'Piazza di Spagna, 78, Latina', 'lat' => '41.87281', 'lon' => '12.52751'],

            ['address' => 'Via Aldo Moro, 23, Frosinone', 'lat' => '41.90584', 'lon' => '12.48194'],

            ['address' => 'Corso Cavour, 38, Viterbo', 'lat' => '41.64602', 'lon' => '13.34828'],

            ['address' => 'Via Nazionale, 41, Latina', 'lat' => '42.5395', 'lon' => '12.03266'],

            ['address' => 'Via Roma, 61, Frosinone', 'lat' => '41.58308', 'lon' => '12.9734'],

            ['address' => 'Via Nazionale, 94, Rieti', 'lat' => '41.6453', 'lon' => '13.35266'],

            ['address' => 'Via Aldo Moro, 74, Frosinone', 'lat' => '42.42017', 'lon' => '13.07901'],

            ['address' => 'Via Nazionale, 79, Viterbo', 'lat' => '41.64512', 'lon' => '13.34744'],

            ['address' => 'Via di Santa Maria, 14, Latina', 'lat' => '39.11275', 'lon' => '8.67303'],

            ['address' => 'Piazza di Spagna, 99, Viterbo', 'lat' => '41.34605', 'lon' => '13.4348'],

            ['address' => 'Via Nazionale, 56, Rieti', 'lat' => '41.90644', 'lon' => '12.48124'],

            ['address' => 'Corso Cavour, 100, Frosinone', 'lat' => '42.37915', 'lon' => '13.01523'],

            ['address' => 'Via di Santa Maria, 97, Roma', 'lat' => '42.95371', 'lon' => '12.70612'],

            ['address' => 'Via Aldo Moro, 78, Viterbo', 'lat' => '41.87242', 'lon' => '12.5273'],

            ['address' => 'Via Aldo Moro, 25, Latina', 'lat' => '42.23866', 'lon' => '12.34178'],

            ['address' => 'Via di Santa Maria, 63, Latina', 'lat' => '41.60086', 'lon' => '12.84419'],

            ['address' => 'Via Nazionale, 94, Rieti', 'lat' => '41.87285', 'lon' => '12.52803'],

            ['address' => 'Via Aldo Moro, 96, Viterbo', 'lat' => '42.42017', 'lon' => '13.07901'],

            ['address' => 'Via Nazionale, 52, Roma', 'lat' => '42.23804', 'lon' => '12.34241'],

            ['address' => 'Corso Cavour, 99, Frosinone', 'lat' => '41.8998', 'lon' => '12.49209'],

            ['address' => 'Via di Santa Maria, 94, Viterbo', 'lat' => '42.95417', 'lon' => '12.70588'],

            ['address' => 'Via Roma, 66, Latina', 'lat' => '41.70488', 'lon' => '13.80727'],

            ['address' => 'Via di Santa Maria, 16, Roma', 'lat' => '41.61987', 'lon' => '13.83337'],

            ['address' => 'Corso Cavour, 51, Latina', 'lat' => '41.87377', 'lon' => '12.52906'],

            ['address' => 'Corso Cavour, 62, Viterbo', 'lat' => '39.68828', 'lon' => '9.25171'],

            ['address' => 'Via Nazionale, 27, Viterbo', 'lat' => '42.64531', 'lon' => '11.98572'],

            ['address' => 'Via Aldo Moro, 3, Frosinone', 'lat' => '42.69117', 'lon' => '11.8163'],

            ['address' => 'Via Aldo Moro, 24, Viterbo', 'lat' => '41.6463', 'lon' => '13.34842'],

            ['address' => 'Piazza di Spagna, 35, Roma', 'lat' => '42.3096', 'lon' => '12.07753'],

            ['address' => 'Corso Cavour, 33, Frosinone', 'lat' => '41.90536', 'lon' => '12.48275'],

            ['address' => 'Via Roma, 50, Roma', 'lat' => '41.72615', 'lon' => '13.34436'],

            ['address' => 'Via di Santa Maria, 93, Latina', 'lat' => '45.24297', 'lon' => '10.96936'],

            ['address' => 'Via Nazionale, 14, Rieti', 'lat' => '41.87254', 'lon' => '12.52736'],

            ['address' => 'Piazza di Spagna, 10, Frosinone', 'lat' => '42.38813', 'lon' => '12.94852'],

            ['address' => 'Via di Santa Maria, 37, Latina', 'lat' => '43.07704', 'lon' => '11.67949'],

            ['address' => 'Via Nazionale, 61, Viterbo', 'lat' => '41.5301', 'lon' => '12.79997'],

            ['address' => 'Via Roma, 94, Rieti', 'lat' => '42.6363', 'lon' => '12.11309'],

            ['address' => 'Via di Santa Maria, 18, Latina', 'lat' => '42.40194', 'lon' => '12.86112'],

            ['address' => 'Via Aldo Moro, 46, Latina', 'lat' => '41.52455', 'lon' => '12.82105'],

            ['address' => 'Via Nazionale, 10, Rieti', 'lat' => '41.58593', 'lon' => '12.64841'],

            ['address' => 'Via di Santa Maria, 52, Viterbo', 'lat' => '42.38818', 'lon' => '12.94864'],

            ['address' => 'Via Aldo Moro, 11, Viterbo', 'lat' => '43.93043', 'lon' => '10.89907'],

            ['address' => 'Via Aldo Moro, 93, Latina', 'lat' => '42.28883', 'lon' => '12.20855'],

            ['address' => 'Via Roma, 60, Viterbo', 'lat' => '41.4029', 'lon' => '13.04891'],

            ['address' => 'Corso Cavour, 20, Frosinone', 'lat' => '42.34537', 'lon' => '12.35479'],

            ['address' => 'Piazza di Spagna, 10, Roma', 'lat' => '41.72608', 'lon' => '13.34408'],

            ['address' => 'Via di Santa Maria, 5, Frosinone', 'lat' => '41.90671', 'lon' => '12.48186'],

            ['address' => 'Corso Cavour, 18, Latina', 'lat' => '41.4584', 'lon' => '13.66635'],

            ['address' => 'Via di Santa Maria, 18, Roma', 'lat' => '41.21484', 'lon' => '13.56962'],

            ['address' => 'Corso Cavour, 46, Viterbo', 'lat' => '41.87374', 'lon' => '12.52902'],

            ['address' => 'Corso Cavour, 8, Viterbo', 'lat' => '42.53931', 'lon' => '12.03253'],

            ['address' => 'Via Aldo Moro, 83, Frosinone', 'lat' => '42.64491', 'lon' => '11.98678'],

            ['address' => 'Via Aldo Moro, 23, Frosinone', 'lat' => '41.64543', 'lon' => '13.34794'],

            ['address' => 'Corso Cavour, 78, Viterbo', 'lat' => '41.64602', 'lon' => '13.34828'],

            ['address' => 'Via Roma, 34, Roma', 'lat' => '42.53877', 'lon' => '12.03186'],

            ['address' => 'Piazza di Spagna, 12, Frosinone', 'lat' => '42.52889', 'lon' => '13.80148'],

            ['address' => 'Via Roma, 4, Viterbo', 'lat' => '41.90658', 'lon' => '12.48208'],

            ['address' => 'Via Nazionale, 46, Rieti', 'lat' => '42.41716', 'lon' => '12.10533'],

            ['address' => 'Via Nazionale, 72, Viterbo', 'lat' => '42.41916', 'lon' => '13.07994'],

            ['address' => 'Via Nazionale, 37, Viterbo', 'lat' => '42.63612', 'lon' => '12.11336'],

            ['address' => 'Corso Cavour, 81, Rieti', 'lat' => '42.63637', 'lon' => '12.11236'],

            ['address' => 'Via Nazionale, 94, Rieti', 'lat' => '42.78057', 'lon' => '12.40781'],

            ['address' => 'Corso Cavour, 55, Viterbo', 'lat' => '42.42017', 'lon' => '13.07901'],

            ['address' => 'Via Aldo Moro, 51, Latina', 'lat' => '42.6452', 'lon' => '11.98588'],

            ['address' => 'Via di Santa Maria, 53, Viterbo', 'lat' => '41.59198', 'lon' => '12.64385'],

            ['address' => 'Via Nazionale, 25, Viterbo', 'lat' => '43.93', 'lon' => '10.89898'],

            ['address' => 'Corso Cavour, 21, Frosinone', 'lat' => '42.63642', 'lon' => '12.11198'],

            ['address' => 'Piazza di Spagna, 27, Rieti', 'lat' => '41.72613', 'lon' => '13.34404'],

            ['address' => 'Via di Santa Maria, 16, Frosinone', 'lat' => '41.9057', 'lon' => '12.48255'],

            ['address' => 'Via Roma, 35, Viterbo', 'lat' => '41.4613', 'lon' => '13.8764'],

            ['address' => 'Via Roma, 64, Frosinone', 'lat' => '42.41755', 'lon' => '12.10579'],

            ['address' => 'Corso Cavour, 85, Rieti', 'lat' => '41.61984', 'lon' => '13.83307'],

            ['address' => 'Corso Cavour, 27, Roma', 'lat' => '42.71848', 'lon' => '12.11048'],

            ['address' => 'Via Nazionale, 86, Roma', 'lat' => '41.97495', 'lon' => '12.86739'],

            ['address' => 'Piazza di Spagna, 83, Viterbo', 'lat' => '41.89866', 'lon' => '12.49036'],

            ['address' => 'Corso Cavour, 82, Viterbo', 'lat' => '41.90599', 'lon' => '12.48176'],

            ['address' => 'Corso Cavour, 31, Rieti', 'lat' => '42.53854', 'lon' => '12.03143'],

            ['address' => 'Piazza di Spagna, 65, Viterbo', 'lat' => '41.94231', 'lon' => '14.63486'],

            ['address' => 'Piazza di Spagna, 38, Rieti', 'lat' => '41.90544', 'lon' => '12.4824'],

            ['address' => 'Via Nazionale, 52, Latina', 'lat' => '41.90525', 'lon' => '12.48289'],

            ['address' => 'Via Roma, 79, Roma', 'lat' => '41.58245', 'lon' => '12.97355'],

            ['address' => 'Via Nazionale, 95, Viterbo', 'lat' => '39.09533', 'lon' => '8.71281'],

            ['address' => 'Via Nazionale, 12, Viterbo', 'lat' => '40.4757', 'lon' => '15.62468'],

            ['address' => 'Via Roma, 20, Latina', 'lat' => '42.53847', 'lon' => '12.0298'],

            ['address' => 'Via Roma, 72, Latina', 'lat' => '41.61907', 'lon' => '13.83058'],

            ['address' => 'Via di Santa Maria, 9, Frosinone', 'lat' => '41.61991', 'lon' => '13.83367'],

            ['address' => 'Corso Cavour, 46, Rieti', 'lat' => '41.45837', 'lon' => '13.666'],

            ['address' => 'Corso Cavour, 18, Viterbo', 'lat' => '42.95459', 'lon' => '12.70542'],

            ['address' => 'Piazza di Spagna, 13, Rieti', 'lat' => '42.53971', 'lon' => '12.03323'],

            ['address' => 'Piazza di Spagna, 9, Latina', 'lat' => '37.18517', 'lon' => '13.77034'],

            ['address' => 'Via Aldo Moro, 30, Latina', 'lat' => '43.07707', 'lon' => '11.67945'],

            ['address' => 'Piazza di Spagna, 17, Latina', 'lat' => '41.40205', 'lon' => '13.04752'],

            ['address' => 'Via Roma, 93, Rieti', 'lat' => '37.82137', 'lon' => '13.85651'],

            ['address' => 'Via Nazionale, 61, Roma', 'lat' => '42.40207', 'lon' => '12.8612'],

            ['address' => 'Via di Santa Maria, 39, Frosinone', 'lat' => '41.89947', 'lon' => '12.49158'],

            ['address' => 'Corso Cavour, 92, Viterbo', 'lat' => '41.45832', 'lon' => '13.66533'],

            ['address' => 'Corso Cavour, 53, Viterbo', 'lat' => '42.53834', 'lon' => '12.03135'],

            ['address' => 'Via Nazionale, 12, Rieti', 'lat' => '42.64521', 'lon' => '11.98567'],

            ['address' => 'Via Aldo Moro, 13, Roma', 'lat' => '42.38816', 'lon' => '12.94861'],

            ['address' => 'Via Nazionale, 55, Rieti', 'lat' => '42.11326', 'lon' => '12.36839'],

            ['address' => 'Corso Cavour, 27, Frosinone', 'lat' => '42.4189', 'lon' => '13.08001'],

            ['address' => 'Via Roma, 64, Viterbo', 'lat' => '41.72613', 'lon' => '13.34425'],

            ['address' => 'Piazza di Spagna, 13, Rieti', 'lat' => '42.54345', 'lon' => '11.75749'],

            ['address' => 'Via Nazionale, 47, Viterbo', 'lat' => '37.18517', 'lon' => '13.77034'],

            ['address' => 'Via di Santa Maria, 3, Latina', 'lat' => '42.63633', 'lon' => '12.11272'],

            ['address' => 'Via Aldo Moro, 12, Frosinone', 'lat' => '41.34609', 'lon' => '13.43779'],

            ['address' => 'Corso Cavour, 73, Frosinone', 'lat' => '41.6462', 'lon' => '13.34814'],

            ['address' => 'Via Nazionale, 98, Rieti', 'lat' => '41.72646', 'lon' => '13.34545'],

            ['address' => 'Piazza di Spagna, 49, Roma', 'lat' => '42.4202', 'lon' => '13.07899'],

            ['address' => 'Corso Cavour, 66, Rieti', 'lat' => '41.90464', 'lon' => '12.48293'],

            ['address' => 'Via Roma, 44, Latina', 'lat' => '43.30142', 'lon' => '13.44377'],

            ['address' => 'Via di Santa Maria, 6, Roma', 'lat' => '41.61968', 'lon' => '13.83221'],

            ['address' => 'Via Aldo Moro, 93, Roma', 'lat' => '41.87388', 'lon' => '12.52925'],

            ['address' => 'Via di Santa Maria, 21, Frosinone', 'lat' => '42.16121', 'lon' => '11.90069'],

            ['address' => 'Via Aldo Moro, 82, Frosinone', 'lat' => '41.45835', 'lon' => '13.66574'],

            ['address' => 'Piazza di Spagna, 82, Rieti', 'lat' => '41.64485', 'lon' => '13.34731'],

            ['address' => 'Via Roma, 82, Rieti', 'lat' => '41.90598', 'lon' => '12.48179'],

            ['address' => 'Via Aldo Moro, 77, Rieti', 'lat' => '42.40151', 'lon' => '12.86105'],

            ['address' => 'Corso Cavour, 20, Rieti', 'lat' => '42.40843', 'lon' => '13.06622'],

            ['address' => 'Corso Cavour, 45, Roma', 'lat' => '45.37421', 'lon' => '11.13643'],

            ['address' => 'Via di Santa Maria, 36, Viterbo', 'lat' => '44.14421', 'lon' => '12.25171'],

            ['address' => 'Via Aldo Moro, 23, Rieti', 'lat' => '43.92856', 'lon' => '10.89911'],

            ['address' => 'Corso Cavour, 56, Latina', 'lat' => '42.19853', 'lon' => '12.99479'],

            ['address' => 'Via Roma, 98, Latina', 'lat' => '41.21442', 'lon' => '13.568'],

            ['address' => 'Via di Santa Maria, 100, Frosinone', 'lat' => '41.61998', 'lon' => '13.83543'],

            ['address' => 'Via Aldo Moro, 75, Viterbo', 'lat' => '41.70401', 'lon' => '13.80462'],

            ['address' => 'Via Aldo Moro, 43, Viterbo', 'lat' => '42.5609', 'lon' => '11.83316'],

            ['address' => 'Via Nazionale, 59, Rieti', 'lat' => '42.38293', 'lon' => '12.2344'],

            ['address' => 'Corso Cavour, 56, Frosinone', 'lat' => '42.41909', 'lon' => '13.07979'],

            ['address' => 'Via di Santa Maria, 32, Frosinone', 'lat' => '41.72627', 'lon' => '13.34491'],

            ['address' => 'Corso Cavour, 52, Frosinone', 'lat' => '41.46141', 'lon' => '13.87521'],

            ['address' => 'Corso Cavour, 36, Viterbo', 'lat' => '41.72625', 'lon' => '13.34484'],

            ['address' => 'Via Roma, 40, Latina', 'lat' => '42.64509', 'lon' => '11.9863'],

            ['address' => 'Corso Cavour, 21, Frosinone', 'lat' => '41.61963', 'lon' => '13.83188'],

            ['address' => 'Via di Santa Maria, 94, Viterbo', 'lat' => '41.72613', 'lon' => '13.34404'],

            ['address' => 'Via Aldo Moro, 57, Latina', 'lat' => '41.70488', 'lon' => '13.80727'],

            ['address' => 'Corso Cavour, 68, Rieti', 'lat' => '41.40578', 'lon' => '13.04951'],

            ['address' => 'Via di Santa Maria, 87, Latina', 'lat' => '43.30143', 'lon' => '13.44371'],

            ['address' => 'Via Nazionale, 45, Latina', 'lat' => '41.87258', 'lon' => '12.52758'],

            ['address' => 'Via Aldo Moro, 53, Roma', 'lat' => '41.58299', 'lon' => '12.97344'],

            ['address' => 'Corso Cavour, 99, Frosinone', 'lat' => '41.86625', 'lon' => '12.82835'],

            ['address' => 'Piazza di Spagna, 74, Frosinone', 'lat' => '42.95417', 'lon' => '12.70588'],

            ['address' => 'Via di Santa Maria, 74, Rieti', 'lat' => '41.90566', 'lon' => '12.48218'],

            ['address' => 'Corso Cavour, 52, Roma', 'lat' => '41.87307', 'lon' => '12.52795'],

            ['address' => 'Via di Santa Maria, 70, Frosinone', 'lat' => '43.88375', 'lon' => '10.76968'],

            ['address' => 'Via Roma, 41, Frosinone', 'lat' => '41.46223', 'lon' => '13.88092'],

            ['address' => 'Corso Cavour, 99, Latina', 'lat' => '41.64328', 'lon' => '13.35175'],

            ['address' => 'Via Nazionale, 89, Rieti', 'lat' => '42.95417', 'lon' => '12.70588'],

            ['address' => 'Via di Santa Maria, 26, Frosinone', 'lat' => '42.41942', 'lon' => '13.07941'],

            ['address' => 'Piazza di Spagna, 46, Rieti', 'lat' => '41.46407', 'lon' => '13.87424'],

            ['address' => 'Piazza di Spagna, 27, Rieti', 'lat' => '41.90475', 'lon' => '12.48346'],

            ['address' => 'Via di Santa Maria, 97, Latina', 'lat' => '41.9057', 'lon' => '12.48255'],

            ['address' => 'Corso Cavour, 11, Roma', 'lat' => '41.87242', 'lon' => '12.5273'],

            ['address' => 'Via Nazionale, 68, Latina', 'lat' => '41.97555', 'lon' => '12.86827'],

            ['address' => 'Corso Cavour, 56, Rieti', 'lat' => '41.58234', 'lon' => '12.9736'],

            ['address' => 'Corso Cavour, 87, Roma', 'lat' => '42.71842', 'lon' => '12.11059'],

            ['address' => 'Piazza di Spagna, 40, Frosinone', 'lat' => '41.73914', 'lon' => '14.84673'],

            ['address' => 'Via Aldo Moro, 24, Frosinone', 'lat' => '41.63948', 'lon' => '13.34273'],

            ['address' => 'Via Nazionale, 40, Roma', 'lat' => '41.64597', 'lon' => '13.34802'],

            ['address' => 'Corso Cavour, 15, Frosinone', 'lat' => '41.90029', 'lon' => '12.49283'],

            ['address' => 'Via Aldo Moro, 52, Roma', 'lat' => '41.72616', 'lon' => '13.34399'],

            ['address' => 'Via Roma, 38, Latina', 'lat' => '41.45846', 'lon' => '12.68314'],

            ['address' => 'Via di Santa Maria, 93, Roma', 'lat' => '41.61968', 'lon' => '13.83174'],

            ['address' => 'Via Nazionale, 90, Frosinone', 'lat' => '41.87254', 'lon' => '12.52736'],

            ['address' => 'Via di Santa Maria, 90, Roma', 'lat' => '41.0533', 'lon' => '14.95439'],

            ['address' => 'Piazza di Spagna, 51, Viterbo', 'lat' => '41.87283', 'lon' => '12.52755'],

            ['address' => 'Via Nazionale, 23, Rieti', 'lat' => '41.90468', 'lon' => '12.4829'],

            ['address' => 'Via Aldo Moro, 49, Roma', 'lat' => '42.31164', 'lon' => '13.05642'],

            ['address' => 'Piazza di Spagna, 59, Viterbo', 'lat' => '42.171', 'lon' => '12.58993'],

            ['address' => 'Via Roma, 93, Viterbo', 'lat' => '41.90529', 'lon' => '12.48253'],

            ['address' => 'Piazza di Spagna, 41, Roma', 'lat' => '42.41981', 'lon' => '12.34705'],

            ['address' => 'Via di Santa Maria, 24, Frosinone', 'lat' => '41.90493', 'lon' => '12.48325'],

            ['address' => 'Via di Santa Maria, 61, Rieti', 'lat' => '41.4678', 'lon' => '13.87692'],

            ['address' => 'Piazza di Spagna, 71, Rieti', 'lat' => '42.21811', 'lon' => '12.66597'],

            ['address' => 'Via Roma, 8, Viterbo', 'lat' => '41.90557', 'lon' => '12.48227'],

            ['address' => 'Via Nazionale, 67, Latina', 'lat' => '42.41725', 'lon' => '12.10541'],

            ['address' => 'Via Nazionale, 80, Frosinone', 'lat' => '41.58273', 'lon' => '12.97348'],

            ['address' => 'Via Nazionale, 80, Latina', 'lat' => '41.53829', 'lon' => '13.27994'],

            ['address' => 'Via Aldo Moro, 86, Latina', 'lat' => '41.58233', 'lon' => '12.97361'],

            ['address' => 'Via di Santa Maria, 23, Viterbo', 'lat' => '41.58714', 'lon' => '12.64746'],

            ['address' => 'Via Roma, 63, Frosinone', 'lat' => '43.92885', 'lon' => '10.89903'],

            ['address' => 'Via Aldo Moro, 5, Latina', 'lat' => '41.64535', 'lon' => '13.35268'],

            ['address' => 'Via di Santa Maria, 97, Roma', 'lat' => '41.60059', 'lon' => '12.84479'],

            ['address' => 'Corso Cavour, 92, Latina', 'lat' => '41.87242', 'lon' => '12.5273'],

            ['address' => 'Piazza di Spagna, 4, Rieti', 'lat' => '41.21437', 'lon' => '13.56694'],

            ['address' => 'Via Roma, 96, Frosinone', 'lat' => '42.95311', 'lon' => '12.00435'],

            ['address' => 'Via Roma, 69, Rieti', 'lat' => '41.5326', 'lon' => '13.69368'],

            ['address' => 'Piazza di Spagna, 17, Roma', 'lat' => '42.40166', 'lon' => '12.86114'],

            ['address' => 'Via di Santa Maria, 54, Latina', 'lat' => '41.90568', 'lon' => '12.48232'],

            ['address' => 'Via Roma, 41, Latina', 'lat' => '43.93049', 'lon' => '10.89917'],

            ['address' => 'Via Roma, 39, Frosinone', 'lat' => '41.62047', 'lon' => '13.83471'],

            ['address' => 'Via Roma, 23, Viterbo', 'lat' => '41.64326', 'lon' => '13.35229'],

            ['address' => 'Via Roma, 98, Viterbo', 'lat' => '42.41742', 'lon' => '12.10566'],

            ['address' => 'Via di Santa Maria, 78, Frosinone', 'lat' => '42.54843', 'lon' => '11.91054'],

            ['address' => 'Via Roma, 3, Rieti', 'lat' => '41.46792', 'lon' => '13.87794'],

            ['address' => 'Piazza di Spagna, 22, Latina', 'lat' => '42.4002', 'lon' => '12.86092'],

            ['address' => 'Via Nazionale, 60, Viterbo', 'lat' => '41.90612', 'lon' => '12.48233'],

            ['address' => 'Via Aldo Moro, 43, Roma', 'lat' => '42.63615', 'lon' => '12.11329'],

            ['address' => 'Piazza di Spagna, 28, Latina', 'lat' => '41.76274', 'lon' => '12.60926'],

            ['address' => 'Via Nazionale, 32, Frosinone', 'lat' => '41.90567', 'lon' => '12.48257'],

            ['address' => 'Piazza di Spagna, 45, Rieti', 'lat' => '41.67809', 'lon' => '13.57578'],

        ];

        $user_ids = User::all()->pluck('id')->all();
        $service_ids = Service::all()->pluck('id')->all();
        $categories_ids = Category::all()->pluck('id')->all();
        $promotions_ids = Promotion::all()->pluck('id')->all();
        $promo_durations = Promotion::all()->pluck('hours', 'id')->all();

        $slug_list = [];
        $pathImg = 'uploads/apartment/img_default/';

        foreach ($arrAddress as $addresses)  {

            $title = $faker->sentence(3);
            $slug = $title;
            $n = 0;
            do {
                if (in_array($slug, $slug_list)) {
                    $n++;
                    $slug = $title . '-' . $n;
                }
            } while (in_array($slug, $slug_list));

            $slug_list[] = $slug;

            $new_apartment = new Apartment();

            $new_apartment->title = $title;
            $new_apartment->slug = Str::slug($slug);
            $new_apartment->description = $faker->sentence();
            $new_apartment->price = $faker->randomFloat(2, 1, 9999);
            $new_apartment->rooms_number = $faker->numberBetween(2, 10);
            $new_apartment->beds_number = $faker->numberBetween(1, 5);
            $new_apartment->baths_number = $faker->numberBetween(1, 3);
            $new_apartment->mtq = $faker->numberBetween(10, 1000);
            $new_apartment->address = $addresses['address'];
            $new_apartment->latitude = $addresses['lat'];
            $new_apartment->longitude = $addresses['lon'];
            $new_apartment->image = $pathImg . rand(1, 26) . '.png,' . $pathImg . rand(1, 26) . '.png,' . $pathImg . rand(1, 26) . '.png';
            $new_apartment->visible = $faker->boolean();
            $new_apartment->user_id = $faker->randomElement($user_ids);
            $new_apartment->category_id = $faker->randomElement($categories_ids);

            $new_apartment->save();

            $random_service_ids = $faker->randomElements($service_ids, null);
            $new_apartment->services()->attach($random_service_ids);

            $random_promotions_ids = $faker->randomElements($promotions_ids, null);

            $promotions_with_timestamp = [];

            foreach ($random_promotions_ids as $random_promotions_id) {

                $start_date = $faker->dateTimeThisYear();

                //vedi se promotions with timestamps è vuoto o no
                if(count($promotions_with_timestamps)){
                    //se non è vuoto lo cicli
                    foreach ($promotions_with_timestamps as $promotion_with_timestamp){
                        //se start date è tra start date e expiration date precedenti
                        if($promotion_with_timestamp['start_date']->between($start_date, $expiration_date)){
                            //allora start date = expiration date + 1 secondo
                            $promotion_with_timestamp['start_date'] = $expiration_date->addSecond();
                        } else {
                            //altrimenti vai avanti creando expiration date
                            $hours = $promo_durations[$random_promotions_id];
                            $expiration_date = (new Carbon($start_date))->addHours($hours);
                        }
                    }
                }

                $promotions_with_timestamp[$random_promotions_id] = [
                    'start_date' => $start_date,
                    'expiration_date' => $expiration_date
                ];
            }

            $new_apartment->promotions()->attach($promotions_with_timestamp);
        };
    }
}
