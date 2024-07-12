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

            ['address' => 'Via di Santa Maria Ausiliatrice 99, 00181 Roma', 'lat' => '41.872478', 'lon' => '12.527176'],

            ['address' => 'Via Roma 7, 01100 Viterbo', 'lat' => '42.417229', 'lon' => '12.105445'],

            ['address' => 'Piazza di Spagna 93, 00187 Roma', 'lat' => '41.906330', 'lon' => '12.481470'],

            ['address' => 'Viale Aldo Moro 42, 02100 Rieti', 'lat' => '42.419590', 'lon' => '12.860620'],

            ['address' => 'Via Nazionale 107, 04010 Norma', 'lat' => '41.582355', 'lon' => '12.973577'],

            ['address' => 'Via della Costituente 2, 05018 Orvieto', 'lat' => '42.718639', 'lon' => '12.110722'],

            ['address' => 'Via Santa Maria 89, 02034 Montopoli di Sabina', 'lat' => '42.216591', 'lon' => '12.664132'],

            ['address' => 'Via Roma 29, 01100 Viterbo', 'lat' => '42.417492', 'lon' => '12.105656'],

            ['address' => 'Corso Cavour 85, 05018 Orvieto', 'lat' => '42.718449', 'lon' => '12.110478'],

            ['address' => 'Via Nazionale 72, 00184 Roma', 'lat' => '41.899288', 'lon' => '12.491017'],

            ['address' => 'Via Santa Maria Crocifissa di Rosa 25, 25025 Manerbio', 'lat' => '45.355156', 'lon' => '10.144387'],

            ['address' => 'Via Borgognona 14, 00187 Roma', 'lat' => '41.905167', 'lon' => '12.482369'],

            ['address' => 'Corso Cavour 25, 03011 Alatri', 'lat' => '41.726105', 'lon' => '13.344176'],

            ['address' => 'Via Aldo Moro 95, 01018 Valentano', 'lat' => '42.560596', 'lon' => '11.832822'],

            ['address' => 'Corso Cavour 25, 04024 Gaeta', 'lat' => '41.214615', 'lon' => '13.569106'],

            ['address' => 'Piazza di Spagna 90, 00187 Roma', 'lat' => '41.906250', 'lon' => '12.481565'],

            ['address' => 'Via Nazionale 92, 09040 Villaputzu', 'lat' => '39.439213', 'lon' => '9.576353'],

            ['address' => 'Via Nazionale 61, 02013 Antrodoco', 'lat' => '42.419174', 'lon' => '13.079870'],

            ['address' => 'Via Aldo Moro 85, 01018 Valentano', 'lat' => '42.560715', 'lon' => '11.833376'],

            ['address' => 'Via Santa Maria 89, 02034 Montopoli di Sabina', 'lat' => '42.216591', 'lon' => '12.664132'],

            ['address' => 'Via Nazionale 15, 00184 Roma', 'lat' => '41.901390', 'lon' => '12.494250'],

            ['address' => 'Via Borgognona 14, 00187 Roma', 'lat' => '41.905167', 'lon' => '12.482369'],

            ['address' => 'Via Roma 26, 02100 Rieti', 'lat' => '42.400406', 'lon' => '12.860918'],

            ['address' => 'Via Aldo Moro 6, 00063 Campagnano di Roma', 'lat' => '42.113033', 'lon' => '12.368223'],

            ['address' => 'Viale Aldo Moro 17, 02021 Borgorose', 'lat' => '42.202560', 'lon' => '13.266003'],

            ['address' => 'Via Santa Maria 71, 02034 Montopoli di Sabina', 'lat' => '42.215019', 'lon' => '12.664727'],

            ['address' => 'Via Santa Maria 12, 02031 Castelnuovo di Farfa', 'lat' => '42.232361', 'lon' => '12.741213'],

            ['address' => 'Via Santa Maria 29, 02034 Montopoli di Sabina', 'lat' => '42.222691', 'lon' => '12.667336'],

            ['address' => 'Via Santa Maria 114, 03046 San Donato Val di Comino', 'lat' => '41.704594', 'lon' => '13.807475'],

            ['address' => 'Via Roma 61, 03040 Villa Latina', 'lat' => '41.620178', 'lon' => '13.835725'],

            ['address' => 'Corso Cavour 87, 01027 Montefiascone', 'lat' => '42.538784', 'lon' => '12.031928'],

            ['address' => 'Via Nazionale 81, 02013 Antrodoco', 'lat' => '42.419426', 'lon' => '13.079596'],

            ['address' => 'Piazza di Spagna 37, 00187 Roma', 'lat' => '41.905243', 'lon' => '12.482717'],

            ['address' => 'Via Aldo Moro 66, 03100 Frosinone', 'lat' => '41.645046', 'lon' => '13.347527'],

            ['address' => 'Via Roma 4, 02034 Montopoli di Sabina', 'lat' => '42.244366', 'lon' => '12.690817'],

            ['address' => 'Piazza di Spagna 81, 00187 Roma', 'lat' => '41.906002', 'lon' => '12.481872'],

            ['address' => 'Via Roma 54, 03040 Villa Latina', 'lat' => '41.619465', 'lon' => '13.832684'],

            ['address' => 'Via Roma 65, 03040 Villa Latina', 'lat' => '41.620178', 'lon' => '13.835714'],

            ['address' => 'Via Aldo Moro 59, 03100 Frosinone', 'lat' => '41.645309', 'lon' => '13.348230'],

            ['address' => 'Via Aldo Moro 80, 04011 Aprilia', 'lat' => '41.586903', 'lon' => '12.647496'],

            ['address' => 'Via Nazionale 149, 02013 Antrodoco', 'lat' => '42.419952', 'lon' => '13.079096'],

            ['address' => 'Via Francesco Cilea 41, 51100 Pistoia', 'lat' => '43.930374', 'lon' => '10.899625'],

            ['address' => 'Viale Roma 75, 03100 Frosinone', 'lat' => '41.645550', 'lon' => '13.352779'],

            ['address' => 'Corso Cavour 57, 03011 Alatri', 'lat' => '41.726242', 'lon' => '13.344902'],

            ['address' => 'Via Roma 83, 02100 Rieti', 'lat' => '42.402016', 'lon' => '12.861151'],

            ['address' => 'Via della Chiochina 1, 53026 Pienza', 'lat' => '43.076958', 'lon' => '11.679416'],

            ['address' => 'Via Aldo Moro 47, 04011 Aprilia', 'lat' => '41.591549', 'lon' => '12.643730'],

            ['address' => 'Corso Cavour 31, 66050 Dogliola', 'lat' => '41.942429', 'lon' => '14.634944'],

            ['address' => 'Via Ferruti 48, 02047 Poggio Mirteto', 'lat' => '42.257526', 'lon' => '12.684284'],

            ['address' => 'Corso Cavour 46, 06034 Foligno', 'lat' => '42.954605', 'lon' => '12.705452'],

            ['address' => 'Corso Cavour 64, 06034 Foligno', 'lat' => '42.954296', 'lon' => '12.705711'],

            ['address' => 'Via Santa Maria Goretti 10, 04012 Cisterna di Latina', 'lat' => '41.525604', 'lon' => '12.816985'],

            ['address' => 'Via di Santa Maria Ausiliatrice 98, 00181 Roma', 'lat' => '41.872688', 'lon' => '12.527497'],

            ['address' => 'Via Roma 1 1, 92100 Agrigento', 'lat' => '37.328785', 'lon' => '13.551110'],

            ['address' => 'Piazza di Spagna 8, 00187 Roma', 'lat' => '41.906647', 'lon' => '12.481802'],

            ['address' => 'Via di Santa Maria della Rosa 20, 04022 Fondi', 'lat' => '41.345551', 'lon' => '13.433856'],

            ['address' => 'Vico Primo Corso Cavour, 66050 Dogliola', 'lat' => '41.942032', 'lon' => '14.635800'],

            ['address' => 'Via Nazionale 43, 03020 Giuliano di Roma', 'lat' => '41.538620', 'lon' => '13.279108'],

            ['address' => 'Via Santa Maria Goretti 41, 04012 Cisterna di Latina', 'lat' => '41.531387', 'lon' => '12.795297'],

            ['address' => 'Via Aldo Moro 35, 03100 Frosinone', 'lat' => '41.645866', 'lon' => '13.348084'],

            ['address' => 'Via Roma 81, 01039 Vignanello', 'lat' => '42.379185', 'lon' => '12.283867'],

            ['address' => 'Piazza di Spagna 96, 00187 Roma', 'lat' => '41.906410', 'lon' => '12.481374'],

            ['address' => 'Via Aldo Moro 1, 01100 Viterbo', 'lat' => '42.426956', 'lon' => '12.099323'],

            ['address' => 'Viale Roma 3, 03100 Frosinone', 'lat' => '41.642681', 'lon' => '13.351679'],

            ['address' => 'Via di Santa Maria Maggiore 12, 51100 Pistoia', 'lat' => '43.927929', 'lon' => '10.899100'],

            ['address' => 'Via Roma 36, 03040 Villa Latina', 'lat' => '41.619709', 'lon' => '13.831610'],

            ['address' => 'Corso Cavour 85, 05018 Orvieto', 'lat' => '42.718449', 'lon' => '12.110478'],

            ['address' => 'Via Nazionale Vigliatore (173 - 81), 98050 Terme Vigliatore', 'lat' => '38.121201', 'lon' => '15.128368'],

            ['address' => 'Via Giuseppe Piermarini 2, 06034 Foligno', 'lat' => '42.954254', 'lon' => '12.705935'],

            ['address' => 'Via Aldo Moro 66, 01010 Ischia di Castro', 'lat' => '42.543797', 'lon' => '11.763354'],

            ['address' => 'Piazza di Spagna 90, 00187 Roma', 'lat' => '41.906250', 'lon' => '12.481565'],

            ['address' => 'Via dei Magazzini 1, 01100 Viterbo', 'lat' => '42.417233', 'lon' => '12.105402'],

            ['address' => 'Via Nazionale 13, 02013 Antrodoco', 'lat' => '42.418037', 'lon' => '13.080329'],

            ['address' => 'Via Nazionale 39, 00184 Roma', 'lat' => '41.900410', 'lon' => '12.492757'],

            ['address' => 'Via Santa Maria 32, 02034 Montopoli di Sabina', 'lat' => '42.216858', 'lon' => '12.663843'],

            ['address' => 'Corso Cavour 71A, 03011 Alatri', 'lat' => '41.726395', 'lon' => '13.345427'],

            ['address' => 'Via Giuseppe Piermarini 2, 06034 Foligno', 'lat' => '42.954254', 'lon' => '12.705935'],

            ['address' => 'Via dell\'Angelo 4, 53026 Pienza', 'lat' => '43.077030', 'lon' => '11.679569'],

            ['address' => 'Via Santa Maria di Licodia 4, 95032 Belpasso', 'lat' => '37.590355', 'lon' => '14.974352'],

            ['address' => 'Via Roma 49, 02100 Rieti', 'lat' => '42.401142', 'lon' => '12.861031'],

            ['address' => 'Via Aldo Moro 80, 04011 Aprilia', 'lat' => '41.586903', 'lon' => '12.647496'],

            ['address' => 'Corso Cavour 26, 04024 Gaeta', 'lat' => '41.214603', 'lon' => '13.569068'],

            ['address' => 'Via Nazionale 69, 04010 Norma', 'lat' => '41.582672', 'lon' => '12.973419'],

            ['address' => 'Via Aldo Moro 37, 03100 Frosinone', 'lat' => '41.645836', 'lon' => '13.348070'],

            ['address' => 'Via di Santa Maria Ausiliatrice 96, 00181 Roma', 'lat' => '41.872711', 'lon' => '12.527532'],

            ['address' => 'Via Aldo Moro 69, 02020 Ascrea', 'lat' => '42.196640', 'lon' => '12.996367'],

            ['address' => 'Via Aldo Moro 92, 02010 Borgo Velino', 'lat' => '42.406246', 'lon' => '13.060653'],

            ['address' => 'Corso Cavour 45, 03011 Alatri', 'lat' => '41.726162', 'lon' => '13.344617'],

            ['address' => 'Via Roma 35, 64014 Martinsicuro', 'lat' => '42.888660', 'lon' => '13.907531'],

            ['address' => 'Via Aldo Moro 66, 03100 Frosinone', 'lat' => '41.645046', 'lon' => '13.347527'],

            ['address' => 'Via Cairoli 13, 03020 Giuliano di Roma', 'lat' => '41.539310', 'lon' => '13.278781'],

            ['address' => 'Via Aldo Moro 30, 04014 Pontinia', 'lat' => '41.402012', 'lon' => '13.047571'],

            ['address' => 'Via Guglielmo Marconi 27, 53026 Pienza', 'lat' => '43.077099', 'lon' => '11.679328'],

            ['address' => 'Corso Cavour 69, 04024 Gaeta', 'lat' => '41.214298', 'lon' => '13.567157'],

            ['address' => 'Via Nazionale 13, 00184 Roma', 'lat' => '41.901440', 'lon' => '12.494326'],

            ['address' => 'Via Cairoli 13, 03020 Giuliano di Roma', 'lat' => '41.539310', 'lon' => '13.278781'],

            ['address' => 'Via Roma 19, 03040 Villa Latina', 'lat' => '41.619972', 'lon' => '13.833918'],

            ['address' => 'Via Aldo Moro 11, 00045 Genzano di Roma', 'lat' => '41.699154', 'lon' => '12.694050'],

            ['address' => 'Piazza di Spagna 15, 00187 Roma', 'lat' => '41.906429', 'lon' => '12.482052'],

            ['address' => 'Via Nazionale 47, 02013 Antrodoco', 'lat' => '42.418800', 'lon' => '13.080221'],

            ['address' => 'Corso Cavour 48, 09061 Orroli', 'lat' => '39.688999', 'lon' => '9.250608'],

            ['address' => 'Via Armando Diaz 39, 95019 Zafferana Etnea', 'lat' => '37.663715', 'lon' => '15.108871'],

            ['address' => 'Via Roma 17, 02100 Rieti', 'lat' => '42.400452', 'lon' => '12.860925'],

            ['address' => 'Via Nazionale 143, 02013 Antrodoco', 'lat' => '42.419857', 'lon' => '13.079162'],

            ['address' => 'Via Roma 49, 02100 Rieti', 'lat' => '42.401142', 'lon' => '12.861031'],

            ['address' => 'Corso Cavour 51, 01027 Montefiascone', 'lat' => '42.539230', 'lon' => '12.032552'],

            ['address' => 'Via di Valle Santa Maria 49, 00132 Roma', 'lat' => '41.861229', 'lon' => '12.706124'],

            ['address' => 'Via Aldo Moro 42, 04011 Aprilia', 'lat' => '41.585903', 'lon' => '12.648298'],

            ['address' => 'Via Roma 96, 03040 Villa Latina', 'lat' => '41.620132', 'lon' => '13.835345'],

            ['address' => 'Via Aldo Moro 33, 03100 Frosinone', 'lat' => '41.645901', 'lon' => '13.348100'],

            ['address' => 'Via Roma 35, 02100 Rieti', 'lat' => '42.400803', 'lon' => '12.860978'],

            ['address' => 'Via Santa Maria 88, 03046 San Donato Val di Comino', 'lat' => '41.704727', 'lon' => '13.807604'],

            ['address' => 'Piazza di Spagna 80, 00187 Roma', 'lat' => '41.905983', 'lon' => '12.481896'],

            ['address' => 'Via Nazionale 89, 02013 Antrodoco', 'lat' => '42.419491', 'lon' => '13.079527'],

            ['address' => 'Via Roma 80, 01019 Vetralla', 'lat' => '42.319176', 'lon' => '12.057525'],

            ['address' => 'Via Roma 58, 03040 Sant\'Ambrogio sul Garigliano', 'lat' => '41.390930', 'lon' => '13.869257'],

            ['address' => 'Via Nazionale 15, 02015 Cittaducale', 'lat' => '42.388096', 'lon' => '12.948563'],

            ['address' => 'Piazza di Spagna 28, 00187 Roma', 'lat' => '41.905678', 'lon' => '12.482317'],

            ['address' => 'Corso Cavour 41, 01023 Bolsena', 'lat' => '42.645168', 'lon' => '11.985942'],

            ['address' => 'Via di Santa Maria Maggiore 7, 51100 Pistoia', 'lat' => '43.927845', 'lon' => '10.899106'],

            ['address' => 'Via Nazionale 37, 01020 Lubriano', 'lat' => '42.636356', 'lon' => '12.112356'],

            ['address' => 'Via Nazionale 89, 02013 Antrodoco', 'lat' => '42.419491', 'lon' => '13.079527'],

            ['address' => 'Via Nazionale 73, 00184 Roma', 'lat' => '41.899261', 'lon' => '12.490979'],

            ['address' => 'Piazza di Spagna 54, 00187 Roma', 'lat' => '41.904800', 'lon' => '12.482906'],

            ['address' => 'Via Tito, 92020 Palma di Montechiaro', 'lat' => '37.185169', 'lon' => '13.770342'],

            ['address' => 'Via Roma 58, 01019 Vetralla', 'lat' => '42.319332', 'lon' => '12.057043'],

            ['address' => 'Via Santa Maria Goretti 10, 04012 Cisterna di Latina', 'lat' => '41.525604', 'lon' => '12.816985'],

            ['address' => 'Piazza di Spagna 23, 00187 Roma', 'lat' => '41.906040', 'lon' => '12.482230'],

            ['address' => 'Via San Biele 2, 01100 Viterbo', 'lat' => '42.413898', 'lon' => '12.110427'],

            ['address' => 'Corso Cavour 52, 03011 Alatri', 'lat' => '41.726227', 'lon' => '13.344853'],

            ['address' => 'Via di Santa Maria Goretti 68, 00199 Roma', 'lat' => '41.931488', 'lon' => '12.519988'],

            ['address' => 'Via Santa Maria di Porta 29, 03037 Pontecorvo', 'lat' => '41.458412', 'lon' => '13.665561'],

            ['address' => 'Via Aldo Moro 71, 03100 Frosinone', 'lat' => '41.645592', 'lon' => '13.347963'],

            ['address' => 'Viale Roma 22, 03100 Frosinone', 'lat' => '41.644054', 'lon' => '13.352398'],

            ['address' => 'Via Santa Maria di Trocchio 62, 03044 Cervaro', 'lat' => '41.467625', 'lon' => '13.876559'],

            ['address' => 'Via Aldo Moro 2, 81010 Baia e Latina', 'lat' => '41.302330', 'lon' => '14.253257'],

            ['address' => 'Via Aldo Moro 1, 04012 Cisterna di Latina', 'lat' => '41.600689', 'lon' => '12.845016'],

            ['address' => 'Via Roma 100, 01010 Capodimonte', 'lat' => '42.548485', 'lon' => '11.910381'],

            ['address' => 'Via di Santa Maria Ausiliatrice 40, 00181 Roma', 'lat' => '41.873409', 'lon' => '12.528679'],

            ['address' => 'Via Santa Maria di Trocchio 43, 03044 Cervaro', 'lat' => '41.468815', 'lon' => '13.880370'],

            ['address' => 'Piazza di Spagna 7, 00187 Roma', 'lat' => '41.906635', 'lon' => '12.481756'],

            ['address' => 'Via Santa Maria 24, 02034 Montopoli di Sabina', 'lat' => '42.216930', 'lon' => '12.663671'],

            ['address' => 'Corso Cavour 58, 06059 Todi', 'lat' => '42.780613', 'lon' => '12.407709'],

            ['address' => 'Corso Cavour 16, 04024 Gaeta', 'lat' => '41.214802', 'lon' => '13.569711'],

            ['address' => 'Corso Cavour 15, 00024 Castel Madama', 'lat' => '41.975231', 'lon' => '12.868145'],

            ['address' => 'Via Roma 19, 01100 Viterbo', 'lat' => '42.417393', 'lon' => '12.105581'],

            ['address' => 'Corso Cavour 118, 85020 Montemilone', 'lat' => '41.029785', 'lon' => '15.969482'],

            ['address' => 'Corso Cavour 74, 03011 Alatri', 'lat' => '41.726387', 'lon' => '13.345410'],

            ['address' => 'Piazza di Spagna 22, 00187 Roma', 'lat' => '41.906094', 'lon' => '12.482209'],

            ['address' => 'Piazza di Spagna 87, 00187 Roma', 'lat' => '41.906197', 'lon' => '12.481630'],

            ['address' => 'Via Roma 46, 01034 Fabrica di Roma', 'lat' => '42.333820', 'lon' => '12.298492'],

            ['address' => 'Via Nazionale 99, 02013 Antrodoco', 'lat' => '42.419575', 'lon' => '13.079436'],

            ['address' => 'Via Nazionale 16, 01010 Onano', 'lat' => '42.691235', 'lon' => '11.816306'],

            ['address' => 'Via Aurelio Saffi 1, 01100 Viterbo', 'lat' => '42.417538', 'lon' => '12.105912'],

            ['address' => 'Via Eurialo 51, 00181 Roma', 'lat' => '41.872456', 'lon' => '12.527410'],

            ['address' => 'Viale Aldo Moro 53, 00010 Gallicano nel Lazio', 'lat' => '41.866337', 'lon' => '12.828458'],

            ['address' => 'Via Nazionale 97, 04010 Norma', 'lat' => '41.582432', 'lon' => '12.973495'],

            ['address' => 'Via Nazionale 14, 01010 Onano', 'lat' => '42.691273', 'lon' => '11.816290'],

            ['address' => 'Piazza di Spagna 35, 00187 Roma', 'lat' => '41.905262', 'lon' => '12.482682'],

            ['address' => 'Corso Cavour 67, 06121 Perugia', 'lat' => '43.106770', 'lon' => '12.391179'],

            ['address' => 'Via di Santa Maria Ausiliatrice 85, 00181 Roma', 'lat' => '41.872692', 'lon' => '12.527503'],

            ['address' => 'Via Santa Maria 55, 03046 San Donato Val di Comino', 'lat' => '41.704990', 'lon' => '13.808061'],

            ['address' => 'Via Santa Maria di Porta 15, 03037 Pontecorvo', 'lat' => '41.458401', 'lon' => '13.665854'],

            ['address' => 'Piazza delle Erbe 19, 01100 Viterbo', 'lat' => '42.417706', 'lon' => '12.106044'],

            ['address' => 'Corso Cavour 11, 66050 Dogliola', 'lat' => '41.942223', 'lon' => '14.635601'],

            ['address' => 'Corso Cavour 45, 04024 Gaeta', 'lat' => '41.214329', 'lon' => '13.567907'],

            ['address' => 'Corso Cavour 82, 04024 Gaeta', 'lat' => '41.214294', 'lon' => '13.567214'],

            ['address' => 'Via Aldo Moro 69, 02020 Ascrea', 'lat' => '42.196640', 'lon' => '12.996367'],

            ['address' => 'Via delle Mura Castellane 11, 04010 Norma', 'lat' => '41.583591', 'lon' => '12.973353'],

            ['address' => 'Corso Cavour 3, 01023 Bolsena', 'lat' => '42.644863', 'lon' => '11.986843'],

            ['address' => 'Via Roma 3, 01100 Viterbo', 'lat' => '42.417156', 'lon' => '12.105379'],

            ['address' => 'Via Nazionale 49, 01020 Lubriano', 'lat' => '42.636299', 'lon' => '12.112809'],

            ['address' => 'Via Roma 3, 01100 Viterbo', 'lat' => '42.417156', 'lon' => '12.105379'],

            ['address' => 'Corso Cavour 43, 03011 Alatri', 'lat' => '41.726154', 'lon' => '13.344566'],

            ['address' => 'Via Santa Maria 16, 02031 Castelnuovo di Farfa', 'lat' => '42.232361', 'lon' => '12.741099'],

            ['address' => 'Via Roma 47, 65020 Rosciano', 'lat' => '42.321903', 'lon' => '14.045527'],

            ['address' => 'Corso Cavour 76, 06034 Foligno', 'lat' => '42.954090', 'lon' => '12.705876'],

            ['address' => 'Via Santa Maria 71, 02034 Montopoli di Sabina', 'lat' => '42.215019', 'lon' => '12.664727'],

            ['address' => 'Via Nazionale 12, 01027 Montefiascone', 'lat' => '42.538528', 'lon' => '12.029819'],

            ['address' => 'Corso Cavour 73, 06059 Todi', 'lat' => '42.780720', 'lon' => '12.407547'],

            ['address' => 'Via Santa Maria di Trocchio 70, 03044 Cervaro', 'lat' => '41.462181', 'lon' => '13.880853'],

            ['address' => 'Via Aldo Moro 51, 01018 Valentano', 'lat' => '42.561180', 'lon' => '11.832198'],

            ['address' => 'Via Aldo Moro 5, 03100 Frosinone', 'lat' => '41.646320', 'lon' => '13.348293'],

            ['address' => 'Via di Santa Maria Goretti 38, 00199 Roma', 'lat' => '41.931679', 'lon' => '12.520656'],

            ['address' => 'Piazza di Spagna 43, 00187 Roma', 'lat' => '41.904789', 'lon' => '12.483276'],

            ['address' => 'Via dei Magazzini 1, 01100 Viterbo', 'lat' => '42.417233', 'lon' => '12.105402'],

            ['address' => 'Vicolo del Mattatoio 6A, 00024 Castel Madama', 'lat' => '41.974903', 'lon' => '12.867366'],

            ['address' => 'Corso Cavour 8, 03011 Alatri', 'lat' => '41.726051', 'lon' => '13.343798'],

            ['address' => 'Corso Cavour 100, 04024 Gaeta', 'lat' => '41.214390', 'lon' => '13.566684'],

            ['address' => 'Corso Cavour 79, 05018 Orvieto', 'lat' => '42.718468', 'lon' => '12.110236'],

            ['address' => 'Piazza di Spagna 86, 00187 Roma', 'lat' => '41.906178', 'lon' => '12.481655'],

            ['address' => 'Via Aldo Moro 24, 04014 Pontinia', 'lat' => '41.402699', 'lon' => '13.048488'],

            ['address' => 'Piazza di Spagna 60, 00187 Roma', 'lat' => '41.905334', 'lon' => '12.482557'],

            ['address' => 'Via della Chiochina 1, 53026 Pienza', 'lat' => '43.076984', 'lon' => '11.679361'],

            ['address' => 'Via Aldo Moro 59, 03100 Frosinone', 'lat' => '41.645309', 'lon' => '13.348230'],

            ['address' => 'Corso Cavour 15, 00024 Castel Madama', 'lat' => '41.975231', 'lon' => '12.868145'],

            ['address' => 'Via di Santa Maria Ausiliatrice 79, 00181 Roma', 'lat' => '41.872757', 'lon' => '12.527604'],

            ['address' => 'Piazza di Spagna 98, 00187 Roma', 'lat' => '41.906460', 'lon' => '12.481316'],

            ['address' => 'Via Nazionale 16, 00184 Roma', 'lat' => '41.901371', 'lon' => '12.494219'],

            ['address' => 'Circonvallazione Aldo Moro 20, 03020 Giuliano di Roma', 'lat' => '41.538033', 'lon' => '13.279638'],

            ['address' => 'Piazza di Spagna 25, 00187 Roma', 'lat' => '41.905991', 'lon' => '12.482246'],

            ['address' => 'Via Aldo Moro 101, 01018 Valentano', 'lat' => '42.560593', 'lon' => '11.832821'],

            ['address' => 'Via Roma 8, 09065 Seulo', 'lat' => '39.870579', 'lon' => '9.234085'],

            ['address' => 'Piazza di Spagna 74, 00187 Roma', 'lat' => '41.905685', 'lon' => '12.482233'],

            ['address' => 'Piazza di Spagna 57, 00187 Roma', 'lat' => '41.905018', 'lon' => '12.482794'],

            ['address' => 'Piazza di Spagna 83, 00187 Roma', 'lat' => '41.906036', 'lon' => '12.481824'],

            ['address' => 'Via Roma 48, 03040 Villa Latina', 'lat' => '41.619823', 'lon' => '13.832561'],

            ['address' => 'Via Nazionale 32, 03036 Isola del Liri', 'lat' => '41.678085', 'lon' => '13.575752'],

            ['address' => 'Via Nazionale 64, 00184 Roma', 'lat' => '41.899506', 'lon' => '12.491362'],

            ['address' => 'Piazza di Spagna 97, 00187 Roma', 'lat' => '41.906433', 'lon' => '12.481345'],

            ['address' => 'Via San Lorenzo, 04015 Priverno', 'lat' => '41.475224', 'lon' => '13.172733'],

            ['address' => 'Corso Cavour 14, 09061 Orroli', 'lat' => '39.692066', 'lon' => '9.249412'],

            ['address' => 'Via Aldo Moro 45, 04011 Aprilia', 'lat' => '41.589123', 'lon' => '12.644984'],

            ['address' => 'Via di Santa Maria Ausiliatrice 9, 00181 Roma', 'lat' => '41.873795', 'lon' => '12.529262'],

            ['address' => 'Via Roma 4, 01100 Viterbo', 'lat' => '42.417145', 'lon' => '12.105371'],

            ['address' => 'Piazza Roma, 41053 Maranello', 'lat' => '44.526066', 'lon' => '10.866208'],

            ['address' => 'Via San Biele 2, 01100 Viterbo', 'lat' => '42.413898', 'lon' => '12.110427'],

            ['address' => 'Corso Cavour 27, 01027 Montefiascone', 'lat' => '42.539516', 'lon' => '12.032942'],

            ['address' => 'Via Roma 34, 01100 Viterbo', 'lat' => '42.417633', 'lon' => '12.105810'],

            ['address' => 'Via di Santa Maria Maggiore 11, 51100 Pistoia', 'lat' => '43.927971', 'lon' => '10.899097'],

            ['address' => 'Via dell\'Angelo 4, 53026 Pienza', 'lat' => '43.077030', 'lon' => '11.679569'],

            ['address' => 'Corso Cavour 21, 28040 Dormelletto', 'lat' => '45.735943', 'lon' => '8.572776'],

            ['address' => 'Via Aldo Moro 71, 01018 Valentano', 'lat' => '42.560913', 'lon' => '11.832766'],

            ['address' => 'Via Caprera 5, 03036 Isola del Liri', 'lat' => '41.676178', 'lon' => '13.577259'],

            ['address' => 'Via di Santa Maria Maggiore 60, 51100 Pistoia', 'lat' => '43.930836', 'lon' => '10.899359'],

            ['address' => 'Piazza di Spagna 88, 00187 Roma', 'lat' => '41.906219', 'lon' => '12.481605'],

            ['address' => 'Piazza di Spagna 28, 00187 Roma', 'lat' => '41.905678', 'lon' => '12.482317'],

            ['address' => 'Corso Cavour 10, 03011 Alatri', 'lat' => '41.726059', 'lon' => '13.343845'],

            ['address' => 'Via Nazionale 47, 01020 Lubriano', 'lat' => '42.636311', 'lon' => '12.112717'],

            ['address' => 'Vicolo Tiberio 1, 03011 Alatri', 'lat' => '41.726509', 'lon' => '13.345533'],

            ['address' => 'Piazza di Spagna 27, 00187 Roma', 'lat' => '41.905697', 'lon' => '12.482317'],

            ['address' => 'Via Roma 47, 65020 Rosciano', 'lat' => '42.321903', 'lon' => '14.045527'],

            ['address' => 'Via Aldo Moro 33, 03100 Frosinone', 'lat' => '41.645901', 'lon' => '13.348100'],

            ['address' => 'Corso Cavour 7, 04024 Gaeta', 'lat' => '41.214882', 'lon' => '13.569972'],

            ['address' => 'Corso Cavour 39, 01027 Montefiascone', 'lat' => '42.539360', 'lon' => '12.032726'],

            ['address' => 'Via Nazionale Vigliatore (173 - 81), 98050 Terme Vigliatore', 'lat' => '38.121201', 'lon' => '15.128368'],

            ['address' => 'Via Roma 19, 02020 Ascrea', 'lat' => '42.197178', 'lon' => '12.995940'],

            ['address' => 'Piazza Ludovico Ciccolini 3, 62100 Macerata', 'lat' => '43.256992', 'lon' => '13.417399'],

            ['address' => 'Viale Roma 22, 03100 Frosinone', 'lat' => '41.644054', 'lon' => '13.352398'],

            ['address' => 'Piazza di Spagna 94, 00187 Roma', 'lat' => '41.906357', 'lon' => '12.481441'],

            ['address' => 'Via dell\'Orso 2, 04010 Norma', 'lat' => '41.582767', 'lon' => '12.973537'],

            ['address' => 'Piazza di Spagna 69, 00187 Roma', 'lat' => '41.905544', 'lon' => '12.482375'],

            ['address' => 'Via Ferruti 48, 02047 Poggio Mirteto', 'lat' => '42.257526', 'lon' => '12.684284'],

            ['address' => 'Via Roma 12, 03040 Villa Latina', 'lat' => '41.619507', 'lon' => '13.830045'],

            ['address' => 'Via di Santa Maria Maggiore 42, 51100 Pistoia', 'lat' => '43.929832', 'lon' => '10.899032'],

            ['address' => 'Via Santa Maria 55, 03046 San Donato Val di Comino', 'lat' => '41.704990', 'lon' => '13.808061'],

            ['address' => 'Via Roma 90, 04012 Cisterna di Latina', 'lat' => '41.593987', 'lon' => '12.821740'],

            ['address' => 'Via Nazionale 47, 03020 Giuliano di Roma', 'lat' => '41.538555', 'lon' => '13.279174'],

            ['address' => 'Via di Santa Maria Ausiliatrice 100, 00181 Roma', 'lat' => '41.872677', 'lon' => '12.527478'],

            ['address' => 'Corso Cavour 100, 06034 Foligno', 'lat' => '42.953728', 'lon' => '12.706166'],

            ['address' => 'Piazza di Spagna 60, 00187 Roma', 'lat' => '41.905334', 'lon' => '12.482557'],

            ['address' => 'Via di Santa Maria Ausiliatrice 100, 00181 Roma', 'lat' => '41.872677', 'lon' => '12.527478'],

            ['address' => 'Corso Cavour 21, 28040 Dormelletto', 'lat' => '45.735943', 'lon' => '8.572776'],

            ['address' => 'Corso Cavour 19, 66050 Dogliola', 'lat' => '41.942257', 'lon' => '14.635442'],

            ['address' => 'Via Aldo Moro 13, 81010 Baia e Latina', 'lat' => '41.301216', 'lon' => '14.254115'],

            ['address' => 'Piazza di Spagna 27, 00187 Roma', 'lat' => '41.905697', 'lon' => '12.482317'],

            ['address' => 'Piazza di Spagna 82, 00187 Roma', 'lat' => '41.906021', 'lon' => '12.481848'],

            ['address' => 'Via di Santa Maria Maggiore 60, 51100 Pistoia', 'lat' => '43.930836', 'lon' => '10.899359'],

            ['address' => 'Via Aldo Moro 61, 02010 Borgo Velino', 'lat' => '42.406452', 'lon' => '13.061222'],

            ['address' => 'Corso Cavour 91, 05018 Orvieto', 'lat' => '42.718510', 'lon' => '12.110832'],

            ['address' => 'Via Aldo Moro 23, 01030 Corchiano', 'lat' => '42.348110', 'lon' => '12.349845'],

            ['address' => 'Via Ponte Confine 1, 03040 Villa Latina', 'lat' => '41.621841', 'lon' => '13.834064'],

            ['address' => 'Via Santa Maria di Trocchio 1, 03044 Cervaro', 'lat' => '41.463062', 'lon' => '13.878496'],

            ['address' => 'Via Aldo Moro 84, 00047 Marino', 'lat' => '41.764851', 'lon' => '12.608558'],

            ['address' => 'Via Santa Maria 114, 03046 San Donato Val di Comino', 'lat' => '41.704594', 'lon' => '13.807475'],

            ['address' => 'Piazza Roma, 41053 Maranello', 'lat' => '44.526066', 'lon' => '10.866208'],

            ['address' => 'Via Roma 72, 01025 Grotte di Castro', 'lat' => '42.674366', 'lon' => '11.868627'],

            ['address' => 'Via Aldo Moro 9, 00063 Campagnano di Roma', 'lat' => '42.113064', 'lon' => '12.368367'],

            ['address' => 'Via Santa Maria di Porta 5, 03037 Pontecorvo', 'lat' => '41.458488', 'lon' => '13.666299'],

            ['address' => 'Via Cagliari 1, 04024 Gaeta', 'lat' => '41.214233', 'lon' => '13.568686'],

            ['address' => 'Viale Aldo Moro 1, 02100 Rieti', 'lat' => '42.419647', 'lon' => '12.859591'],

            ['address' => 'Via Alessandro Polidori 49, 01100 Viterbo', 'lat' => '42.426735', 'lon' => '12.100173'],

            ['address' => 'Via Aldo Moro 77, 04014 Pontinia', 'lat' => '41.404640', 'lon' => '13.050243'],

            ['address' => 'Via di Santa Maria Ausiliatrice 90, 00181 Roma', 'lat' => '41.872768', 'lon' => '12.527620'],

            ['address' => 'Via Garibaldi 1, 04010 Norma', 'lat' => '41.582291', 'lon' => '12.973608'],

            ['address' => 'Via Nazionale 73, 02013 Antrodoco', 'lat' => '42.419308', 'lon' => '13.079726'],

            ['address' => 'Piazza di Spagna 74, 00187 Roma', 'lat' => '41.905685', 'lon' => '12.482233'],

            ['address' => 'Via di Santa Maria Ausiliatrice 37, 00181 Roma', 'lat' => '41.873417', 'lon' => '12.528695'],

            ['address' => 'Piazza di Spagna 20, 00187 Roma', 'lat' => '41.906178', 'lon' => '12.482176'],

            ['address' => 'Via Roma 60, 01030 Corchiano', 'lat' => '42.345337', 'lon' => '12.354790'],

            ['address' => 'Via Aldo Moro 15, 01030 Bassano Romano', 'lat' => '42.221821', 'lon' => '12.182959'],

            ['address' => 'Via Nazionale 6, 02015 Cittaducale', 'lat' => '42.388405', 'lon' => '12.949256'],

            ['address' => 'Via Nazionale 27, 00184 Roma', 'lat' => '41.900795', 'lon' => '12.493333'],

            ['address' => 'Via Nazionale 55, 03020 Giuliano di Roma', 'lat' => '41.538475', 'lon' => '13.279253'],

            ['address' => 'Piazza di Spagna 64, 00187 Roma', 'lat' => '41.905434', 'lon' => '12.482483'],

            ['address' => 'Corso Cavour 78, 03011 Alatri', 'lat' => '41.726418', 'lon' => '13.345505'],

            ['address' => 'Via Aldo Moro 60, 03100 Frosinone', 'lat' => '41.644909', 'lon' => '13.347414'],

            ['address' => 'Via Roma 30, 02100 Rieti', 'lat' => '42.400463', 'lon' => '12.860927'],

            ['address' => 'Via Roma 19, 02020 Ascrea', 'lat' => '42.197178', 'lon' => '12.995940'],

            ['address' => 'Viale Aldo Moro 42, 00073 Castel Gandolfo', 'lat' => '41.741665', 'lon' => '12.647015'],

            ['address' => 'Corso Cavour 75, 70121 Bari', 'lat' => '41.123760', 'lon' => '16.872217'],

            ['address' => 'Via Nazionale 153, 02013 Antrodoco', 'lat' => '42.420036', 'lon' => '13.079036'],

            ['address' => 'Largo Giuseppe Fiordeponti 2, 02100 Rieti', 'lat' => '42.400162', 'lon' => '12.860842'],

            ['address' => 'Via Guglielmo Marconi 27, 53026 Pienza', 'lat' => '43.077099', 'lon' => '11.679328'],

            ['address' => 'Via dei Condotti 4, 00187 Roma', 'lat' => '41.905724', 'lon' => '12.482038'],

            ['address' => 'Via di Santa Maria Goretti 68, 00199 Roma', 'lat' => '41.931488', 'lon' => '12.519988'],

            ['address' => 'Via Nazionale 153, 02013 Antrodoco', 'lat' => '42.420036', 'lon' => '13.079036'],

            ['address' => 'Strada Provinciale Via Roma 49, 02040 Poggio Catino', 'lat' => '42.293751', 'lon' => '12.691044'],

            ['address' => 'Via di Santa Maria Ausiliatrice 92, 00181 Roma', 'lat' => '41.872749', 'lon' => '12.527589'],

            ['address' => 'Piazza di Spagna 78, 00187 Roma', 'lat' => '41.905895', 'lon' => '12.482011'],

            ['address' => 'Via Aldo Moro 23, 03100 Frosinone', 'lat' => '41.646053', 'lon' => '13.348166'],

            ['address' => 'Corso Cavour 38, 01027 Montefiascone', 'lat' => '42.539406', 'lon' => '12.032790'],

            ['address' => 'Via Nazionale 41, 04010 Norma', 'lat' => '41.583076', 'lon' => '12.973350'],

            ['address' => 'Viale Roma 61, 03100 Frosinone', 'lat' => '41.645294', 'lon' => '13.352720'],

            ['address' => 'Via Nazionale 153, 02013 Antrodoco', 'lat' => '42.420036', 'lon' => '13.079036'],

            ['address' => 'Via Aldo Moro 70, 03100 Frosinone', 'lat' => '41.645069', 'lon' => '13.347548'],

            ['address' => 'Via Nazionale 67, 09010 Villaperuccio', 'lat' => '39.112751', 'lon' => '8.672996'],

            ['address' => 'Via di Santa Maria della Rosa 14, 04022 Fondi', 'lat' => '41.346008', 'lon' => '13.434841'],

            ['address' => 'Piazza di Spagna 99, 00187 Roma', 'lat' => '41.906479', 'lon' => '12.481293'],

            ['address' => 'Seconda Via Nazionale 56, 02010 Castel Sant\'Angelo', 'lat' => '42.379120', 'lon' => '13.015258'],

            ['address' => 'Corso Cavour 100, 06034 Foligno', 'lat' => '42.953728', 'lon' => '12.706166'],

            ['address' => 'Via di Santa Maria Ausiliatrice 97, 00181 Roma', 'lat' => '41.872501', 'lon' => '12.527208'],

            ['address' => 'Via Aldo Moro 78, 01036 Nepi', 'lat' => '42.238686', 'lon' => '12.341833'],

            ['address' => 'Via Aldo Moro 25, 04012 Cisterna di Latina', 'lat' => '41.600956', 'lon' => '12.844339'],

            ['address' => 'Via di Santa Maria Ausiliatrice 63, 00181 Roma', 'lat' => '41.872959', 'lon' => '12.527910'],

            ['address' => 'Via Nazionale 153, 02013 Antrodoco', 'lat' => '42.420036', 'lon' => '13.079036'],

            ['address' => 'Via Aldo Moro 96, 01036 Nepi', 'lat' => '42.238071', 'lon' => '12.342475'],

            ['address' => 'Via Nazionale 52, 00184 Roma', 'lat' => '41.899899', 'lon' => '12.491968'],

            ['address' => 'Via Giuseppe Piermarini 2, 06034 Foligno', 'lat' => '42.954254', 'lon' => '12.705935'],

            ['address' => 'Via Santa Maria 94, 03046 San Donato Val di Comino', 'lat' => '41.704884', 'lon' => '13.807309'],

            ['address' => 'Via Roma 66, 03040 Villa Latina', 'lat' => '41.619911', 'lon' => '13.833361'],

            ['address' => 'Via di Santa Maria Ausiliatrice 16, 00181 Roma', 'lat' => '41.873707', 'lon' => '12.529130'],

            ['address' => 'Corso Cavour 51, 09061 Orroli', 'lat' => '39.688225', 'lon' => '9.251711'],

            ['address' => 'Corso Cavour 62, 01023 Bolsena', 'lat' => '42.645271', 'lon' => '11.985692'],

            ['address' => 'Via Nazionale 25, 01010 Onano', 'lat' => '42.691181', 'lon' => '11.816330'],

            ['address' => 'Via Aldo Moro 3, 03100 Frosinone', 'lat' => '41.646339', 'lon' => '13.348303'],

            ['address' => 'Via Aldo Moro 24, 01019 Vetralla', 'lat' => '42.309528', 'lon' => '12.077470'],

            ['address' => 'Piazza di Spagna 35, 00187 Roma', 'lat' => '41.905262', 'lon' => '12.482682'],

            ['address' => 'Corso Cavour 33, 03011 Alatri', 'lat' => '41.726128', 'lon' => '13.344361'],

            ['address' => 'Via Roma 50, 37060 Erbè', 'lat' => '45.243080', 'lon' => '10.969337'],

            ['address' => 'Via Eurialo 51, 00181 Roma', 'lat' => '41.872456', 'lon' => '12.527410'],

            ['address' => 'Via Nazionale 14, 02015 Cittaducale', 'lat' => '42.388092', 'lon' => '12.948555'],

            ['address' => 'Via dell\'Angelo 4, 53026 Pienza', 'lat' => '43.077030', 'lon' => '11.679569'],

            ['address' => 'Via Santa Maria Goretti 35, 04012 Cisterna di Latina', 'lat' => '41.529915', 'lon' => '12.800830'],

            ['address' => 'Vicolo Romanelli 3, 01020 Lubriano', 'lat' => '42.636299', 'lon' => '12.113095'],

            ['address' => 'Via del Duomo 14, 02100 Rieti', 'lat' => '42.401920', 'lon' => '12.861036'],

            ['address' => 'Via Torre Astura 59, 04012 Cisterna di Latina', 'lat' => '41.525158', 'lon' => '12.821619'],

            ['address' => 'Via Aldo Moro 46, 04011 Aprilia', 'lat' => '41.585953', 'lon' => '12.648319'],

            ['address' => 'Via Nazionale 10, 02015 Cittaducale', 'lat' => '42.388145', 'lon' => '12.948665'],

            ['address' => 'Via di Santa Maria Maggiore 52, 51100 Pistoia', 'lat' => '43.930428', 'lon' => '10.898981'],

            ['address' => 'Via Aldo Moro 11, 01037 Ronciglione', 'lat' => '42.288776', 'lon' => '12.208602'],

            ['address' => 'Via Aldo Moro 93, 04014 Pontinia', 'lat' => '41.402950', 'lon' => '13.048837'],

            ['address' => 'Via Roma 60, 01030 Corchiano', 'lat' => '42.345337', 'lon' => '12.354790'],

            ['address' => 'Corso Cavour 20, 03011 Alatri', 'lat' => '41.726089', 'lon' => '13.344074'],

            ['address' => 'Piazza di Spagna 10, 00187 Roma', 'lat' => '41.906666', 'lon' => '12.481885'],

            ['address' => 'Via Santa Maria di Porta 5, 03037 Pontecorvo', 'lat' => '41.458488', 'lon' => '13.666299'],

            ['address' => 'Corso Cavour 18, 04024 Gaeta', 'lat' => '41.214779', 'lon' => '13.569647'],

            ['address' => 'Via di Santa Maria Ausiliatrice 18, 00181 Roma', 'lat' => '41.873680', 'lon' => '12.529091'],

            ['address' => 'Corso Cavour 54, 01027 Montefiascone', 'lat' => '42.539261', 'lon' => '12.032594'],

            ['address' => 'Corso Cavour 8, 01023 Bolsena', 'lat' => '42.644890', 'lon' => '11.986775'],

            ['address' => 'Via Aldo Moro 83, 03100 Frosinone', 'lat' => '41.645466', 'lon' => '13.347863'],

            ['address' => 'Via Aldo Moro 23, 03100 Frosinone', 'lat' => '41.646053', 'lon' => '13.348166'],

            ['address' => 'Corso Cavour 78, 01027 Montefiascone', 'lat' => '42.538750', 'lon' => '12.031882'],

            ['address' => 'Via Roma 34, 64033 Bisenti', 'lat' => '42.528774', 'lon' => '13.801537'],

            ['address' => 'Piazza di Spagna 12, 00187 Roma', 'lat' => '41.906555', 'lon' => '12.481985'],

            ['address' => 'Via Roma 4, 01100 Viterbo', 'lat' => '42.417145', 'lon' => '12.105371'],

            ['address' => 'Via Nazionale 46, 02013 Antrodoco', 'lat' => '42.419136', 'lon' => '13.079911'],

            ['address' => 'Via Nazionale 54, 01020 Lubriano', 'lat' => '42.636227', 'lon' => '12.113233'],

            ['address' => 'Via Nazionale 37, 01020 Lubriano', 'lat' => '42.636356', 'lon' => '12.112356'],

            ['address' => 'Corso Cavour 81, 06059 Todi', 'lat' => '42.780556', 'lon' => '12.407802'],

            ['address' => 'Via Nazionale 153, 02013 Antrodoco', 'lat' => '42.420036', 'lon' => '13.079036'],

            ['address' => 'Corso Cavour 54, 01023 Bolsena', 'lat' => '42.645195', 'lon' => '11.985881'],

            ['address' => 'Via Aldo Moro 51, 04011 Aprilia', 'lat' => '41.591949', 'lon' => '12.643936'],

            ['address' => 'Via di Santa Maria Maggiore 53, 51100 Pistoia', 'lat' => '43.930000', 'lon' => '10.899020'],

            ['address' => 'Via Nazionale 25, 01020 Lubriano', 'lat' => '42.636398', 'lon' => '12.111981'],

            ['address' => 'Corso Cavour 15, 03011 Alatri', 'lat' => '41.726082', 'lon' => '13.344015'],

            ['address' => 'Piazza di Spagna 27, 00187 Roma', 'lat' => '41.905697', 'lon' => '12.482317'],

            ['address' => 'Via Santa Maria di Trocchio 27, 03044 Cervaro', 'lat' => '41.461361', 'lon' => '13.875325'],

            ['address' => 'Via Roma 35, 01100 Viterbo', 'lat' => '42.417580', 'lon' => '12.105741'],

            ['address' => 'Via Roma 64, 03040 Villa Latina', 'lat' => '41.619865', 'lon' => '13.832928'],

            ['address' => 'Corso Cavour 85, 05018 Orvieto', 'lat' => '42.718449', 'lon' => '12.110478'],

            ['address' => 'Vicolo del Mattatoio 6A, 00024 Castel Madama', 'lat' => '41.974903', 'lon' => '12.867366'],

            ['address' => 'Via Nazionale 86, 00184 Roma', 'lat' => '41.898766', 'lon' => '12.490224'],

            ['address' => 'Piazza di Spagna 83, 00187 Roma', 'lat' => '41.906036', 'lon' => '12.481824'],

            ['address' => 'Corso Cavour 82, 01027 Montefiascone', 'lat' => '42.538483', 'lon' => '12.031506'],

            ['address' => 'Corso Cavour 31, 66050 Dogliola', 'lat' => '41.942429', 'lon' => '14.634944'],

            ['address' => 'Piazza di Spagna 65, 00187 Roma', 'lat' => '41.905468', 'lon' => '12.482452'],

            ['address' => 'Piazza di Spagna 38, 00187 Roma', 'lat' => '41.905178', 'lon' => '12.482794'],

            ['address' => 'Via Nazionale 97, 04010 Norma', 'lat' => '41.582432', 'lon' => '12.973495'],

            ['address' => 'Via Roma 59, 09010 Santadi', 'lat' => '39.095364', 'lon' => '8.712840'],

            ['address' => 'Via Nazionale 95, 85050 Brienza', 'lat' => '40.475784', 'lon' => '15.624751'],

            ['address' => 'Via Nazionale 12, 01027 Montefiascone', 'lat' => '42.538528', 'lon' => '12.029819'],

            ['address' => 'Via Roma 20, 03040 Villa Latina', 'lat' => '41.619160', 'lon' => '13.830870'],

            ['address' => 'Via Roma 72, 03040 Villa Latina', 'lat' => '41.619946', 'lon' => '13.833667'],

            ['address' => 'Via Santa Maria di Porta 9, 03037 Pontecorvo', 'lat' => '41.458408', 'lon' => '13.665993'],

            ['address' => 'Corso Cavour 46, 06034 Foligno', 'lat' => '42.954605', 'lon' => '12.705452'],

            ['address' => 'Corso Cavour 18, 01027 Montefiascone', 'lat' => '42.539722', 'lon' => '12.033212'],

            ['address' => 'Via Tito, 92020 Palma di Montechiaro', 'lat' => '37.185169', 'lon' => '13.770342'],

            ['address' => 'Via Guglielmo Marconi 27, 53026 Pienza', 'lat' => '43.077099', 'lon' => '11.679328'],

            ['address' => 'Via Aldo Moro 30, 04014 Pontinia', 'lat' => '41.402012', 'lon' => '13.047571'],

            ['address' => 'Piazza Madonna di Fatina 15, 90020 Sclafani Bagni', 'lat' => '37.821289', 'lon' => '13.856461'],

            ['address' => 'Via Roma 102, 02100 Rieti', 'lat' => '42.402054', 'lon' => '12.861139'],

            ['address' => 'Via Nazionale 61, 00184 Roma', 'lat' => '41.899570', 'lon' => '12.491462'],

            ['address' => 'Via Santa Maria di Porta 39, 03037 Pontecorvo', 'lat' => '41.458439', 'lon' => '13.665382'],

            ['address' => 'Corso Cavour 92, 01027 Montefiascone', 'lat' => '42.538357', 'lon' => '12.031328'],

            ['address' => 'Corso Cavour 53, 01023 Bolsena', 'lat' => '42.645264', 'lon' => '11.985708'],

            ['address' => 'Via Nazionale 12, 02015 Cittaducale', 'lat' => '42.388130', 'lon' => '12.948635'],

            ['address' => 'Via Aldo Moro 13, 00063 Campagnano di Roma', 'lat' => '42.113087', 'lon' => '12.368459'],

            ['address' => 'Via Nazionale 55, 02013 Antrodoco', 'lat' => '42.418964', 'lon' => '13.080101'],

            ['address' => 'Corso Cavour 27, 03011 Alatri', 'lat' => '41.726116', 'lon' => '13.344258'],

            ['address' => 'Via Roma 64, 01010 Ischia di Castro', 'lat' => '42.543575', 'lon' => '11.757502'],

            ['address' => 'Via Tito, 92020 Palma di Montechiaro', 'lat' => '37.185169', 'lon' => '13.770342'],

            ['address' => 'Via Nazionale 47, 01020 Lubriano', 'lat' => '42.636311', 'lon' => '12.112717'],

            ['address' => 'Via di Santa Maria della Rosa 1, 04022 Fondi', 'lat' => '41.346104', 'lon' => '13.438055'],

            ['address' => 'Via Aldo Moro 12, 03100 Frosinone', 'lat' => '41.646179', 'lon' => '13.348220'],

            ['address' => 'Corso Cavour 73, 03011 Alatri', 'lat' => '41.726410', 'lon' => '13.345484'],

            ['address' => 'Via Nazionale 153, 02013 Antrodoco', 'lat' => '42.420036', 'lon' => '13.079036'],

            ['address' => 'Via Frattina 152, 00187 Roma', 'lat' => '41.904591', 'lon' => '12.482899'],

            ['address' => 'Via 24 Maggio 1, 62100 Macerata', 'lat' => '43.301376', 'lon' => '13.443976'],

            ['address' => 'Via Roma 44, 03040 Villa Latina', 'lat' => '41.619781', 'lon' => '13.832187'],

            ['address' => 'Via di Santa Maria Ausiliatrice 6, 00181 Roma', 'lat' => '41.873829', 'lon' => '12.529312'],

            ['address' => 'Via Aldo Moro 93, 00051 Allumiere', 'lat' => '42.161312', 'lon' => '11.900584'],

            ['address' => 'Via Santa Maria di Porta 21, 03037 Pontecorvo', 'lat' => '41.458401', 'lon' => '13.665744'],

            ['address' => 'Via Aldo Moro 82, 03100 Frosinone', 'lat' => '41.644833', 'lon' => '13.347347'],

            ['address' => 'Piazza di Spagna 82, 00187 Roma', 'lat' => '41.906021', 'lon' => '12.481848'],

            ['address' => 'Via Roma 82, 02100 Rieti', 'lat' => '42.401505', 'lon' => '12.861087'],

            ['address' => 'Via Aldo Moro 77B, 02013 Antrodoco', 'lat' => '42.408459', 'lon' => '13.066278'],

            ['address' => 'Corso Cavour 12, 37059 Zevio', 'lat' => '45.374157', 'lon' => '11.136476'],

            ['address' => 'Corso Roma 17, 47521 Cesena', 'lat' => '44.144474', 'lon' => '12.251719'],

            ['address' => 'Via di Santa Maria Maggiore 36, 51100 Pistoia', 'lat' => '43.928558', 'lon' => '10.899071'],

            ['address' => 'Via Aldo Moro 23, 02020 Ascrea', 'lat' => '42.198513', 'lon' => '12.994712'],

            ['address' => 'Corso Cavour 56, 04024 Gaeta', 'lat' => '41.214348', 'lon' => '13.568019'],

            ['address' => 'Viale Parco delle Rimembranze 21, 03040 Villa Latina', 'lat' => '41.619453', 'lon' => '13.835511'],

            ['address' => 'Via Santa Maria 91, 03046 San Donato Val di Comino', 'lat' => '41.704521', 'lon' => '13.806519'],

            ['address' => 'Via Aldo Moro 75, 01018 Valentano', 'lat' => '42.560989', 'lon' => '11.833084'],

            ['address' => 'Via Aldo Moro 43, 01030 Canepina', 'lat' => '42.382790', 'lon' => '12.234544'],

            ['address' => 'Via Nazionale 59, 02013 Antrodoco', 'lat' => '42.419151', 'lon' => '13.079896'],

            ['address' => 'Corso Cavour 56, 03011 Alatri', 'lat' => '41.726246', 'lon' => '13.344920'],

            ['address' => 'Via Santa Maria di Trocchio 32, 03044 Cervaro', 'lat' => '41.461395', 'lon' => '13.875202'],

            ['address' => 'Corso Cavour 52, 03011 Alatri', 'lat' => '41.726227', 'lon' => '13.344853'],

            ['address' => 'Corso Cavour 36, 01023 Bolsena', 'lat' => '42.645054', 'lon' => '11.986285'],

            ['address' => 'Via Roma 40, 03040 Villa Latina', 'lat' => '41.619740', 'lon' => '13.831855'],

            ['address' => 'Corso Cavour 15, 03011 Alatri', 'lat' => '41.726082', 'lon' => '13.344015'],

            ['address' => 'Via Santa Maria 94, 03046 San Donato Val di Comino', 'lat' => '41.704884', 'lon' => '13.807309'],

            ['address' => 'Via Aldo Moro 57, 04014 Pontinia', 'lat' => '41.405487', 'lon' => '13.049155'],

            ['address' => 'Via 24 Maggio 1, 62100 Macerata', 'lat' => '43.301376', 'lon' => '13.443976'],

            ['address' => 'Via di Santa Maria Ausiliatrice 87, 00181 Roma', 'lat' => '41.872669', 'lon' => '12.527471'],

            ['address' => 'Via Nazionale 45, 04010 Norma', 'lat' => '41.582981', 'lon' => '12.973363'],

            ['address' => 'Viale Aldo Moro 53, 00010 Gallicano nel Lazio', 'lat' => '41.866337', 'lon' => '12.828458'],

            ['address' => 'Via Giuseppe Piermarini 2, 06034 Foligno', 'lat' => '42.954254', 'lon' => '12.705935'],

            ['address' => 'Piazza di Spagna 74, 00187 Roma', 'lat' => '41.905685', 'lon' => '12.482233'],

            ['address' => 'Via di Santa Maria Ausiliatrice 74, 00181 Roma', 'lat' => '41.873024', 'lon' => '12.528010'],

            ['address' => 'Corso Roma 15B, 51016 Montecatini-Terme', 'lat' => '43.883801', 'lon' => '10.769567'],

            ['address' => 'Via Santa Maria di Trocchio 70, 03044 Cervaro', 'lat' => '41.462181', 'lon' => '13.880853'],

            ['address' => 'Viale Roma 3, 03100 Frosinone', 'lat' => '41.642681', 'lon' => '13.351679'],

            ['address' => 'Via Giuseppe Piermarini 2, 06034 Foligno', 'lat' => '42.954254', 'lon' => '12.705935'],

            ['address' => 'Via Nazionale 89, 02013 Antrodoco', 'lat' => '42.419491', 'lon' => '13.079527'],

            ['address' => 'Via Santa Maria di Trocchio 26, 03044 Cervaro', 'lat' => '41.464127', 'lon' => '13.874001'],

            ['address' => 'Piazza di Spagna 46, 00187 Roma', 'lat' => '41.904732', 'lon' => '12.483342'],

            ['address' => 'Piazza di Spagna 27, 00187 Roma', 'lat' => '41.905697', 'lon' => '12.482317'],

            ['address' => 'Via di Santa Maria Ausiliatrice 97, 00181 Roma', 'lat' => '41.872501', 'lon' => '12.527208'],

            ['address' => 'Corso Cavour 11, 00024 Castel Madama', 'lat' => '41.975555', 'lon' => '12.868222'],

            ['address' => 'Via Nazionale 107, 04010 Norma', 'lat' => '41.582355', 'lon' => '12.973577'],

            ['address' => 'Corso Cavour 56, 05018 Orvieto', 'lat' => '42.718452', 'lon' => '12.110584'],

            ['address' => 'Corso Roma 87, 86043 Casacalenda', 'lat' => '41.739193', 'lon' => '14.846660'],

            ['address' => 'Viale Giuseppe Mazzini 224, 03100 Frosinone', 'lat' => '41.639431', 'lon' => '13.342861'],

            ['address' => 'Via Aldo Moro 24, 03100 Frosinone', 'lat' => '41.645943', 'lon' => '13.348119'],

            ['address' => 'Via Nazionale 40, 00184 Roma', 'lat' => '41.900387', 'lon' => '12.492719'],

            ['address' => 'Corso Cavour 15A, 03011 Alatri', 'lat' => '41.726082', 'lon' => '13.344010'],

            ['address' => 'Via Aldo Moro 52, 00048 Nettuno', 'lat' => '41.458561', 'lon' => '12.683099'],

            ['address' => 'Via Roma 38, 03040 Villa Latina', 'lat' => '41.619724', 'lon' => '13.831731'],

            ['address' => 'Via Eurialo 51, 00181 Roma', 'lat' => '41.872456', 'lon' => '12.527410'],

            ['address' => 'Frazione Calore 1, 83036 Mirabella Eclano', 'lat' => '41.053879', 'lon' => '14.951113'],

            ['address' => 'Via di Santa Maria Ausiliatrice 90, 00181 Roma', 'lat' => '41.872768', 'lon' => '12.527620'],

            ['address' => 'Piazza di Spagna 50, 00187 Roma', 'lat' => '41.904682', 'lon' => '12.482971'],

            ['address' => 'Via Nazionale 23, 02025 Petrella Salto', 'lat' => '42.311611', 'lon' => '13.056470'],

            ['address' => 'Via Aldo Moro 49, 00065 Fiano Romano', 'lat' => '42.171017', 'lon' => '12.589908'],

            ['address' => 'Piazza di Spagna 59, 00187 Roma', 'lat' => '41.905308', 'lon' => '12.482575'],

            ['address' => 'Via Roma 93, 01030 Vasanello', 'lat' => '42.419804', 'lon' => '12.347079'],

            ['address' => 'Piazza di Spagna 41, 00187 Roma', 'lat' => '41.904873', 'lon' => '12.483175'],

            ['address' => 'Via Santa Maria di Trocchio 24, 03044 Cervaro', 'lat' => '41.467762', 'lon' => '13.876949'],

            ['address' => 'Via Santa Maria 61, 02034 Montopoli di Sabina', 'lat' => '42.218113', 'lon' => '12.666018'],

            ['address' => 'Piazza di Spagna 71, 00187 Roma', 'lat' => '41.905598', 'lon' => '12.482322'],

            ['address' => 'Via dei Magazzini 1, 01100 Viterbo', 'lat' => '42.417233', 'lon' => '12.105402'],

            ['address' => 'Via dell\'Orso 2, 04010 Norma', 'lat' => '41.582767', 'lon' => '12.973537'],

            ['address' => 'Via Nazionale 80, 03020 Giuliano di Roma', 'lat' => '41.538284', 'lon' => '13.279938'],

            ['address' => 'Via Nazionale 107, 04010 Norma', 'lat' => '41.582355', 'lon' => '12.973577'],

            ['address' => 'Via Aldo Moro 86, 04011 Aprilia', 'lat' => '41.586952', 'lon' => '12.647345'],

            ['address' => 'Via di Santa Maria Maggiore 23, 51100 Pistoia', 'lat' => '43.928848', 'lon' => '10.899062'],

            ['address' => 'Viale Roma 63, 03100 Frosinone', 'lat' => '41.645340', 'lon' => '13.352734'],

            ['address' => 'Via Aldo Moro 5, 04012 Cisterna di Latina', 'lat' => '41.600735', 'lon' => '12.844916'],

            ['address' => 'Via di Santa Maria Ausiliatrice 97, 00181 Roma', 'lat' => '41.872501', 'lon' => '12.527208'],

            ['address' => 'Corso Cavour 92, 04024 Gaeta', 'lat' => '41.214333', 'lon' => '13.566932'],

            ['address' => 'Piazza di Spagna 4, 06062 Città della Pieve', 'lat' => '42.953121', 'lon' => '12.004337'],

            ['address' => 'Via Roma 96, 03030 Castrocielo', 'lat' => '41.532532', 'lon' => '13.693606'],

            ['address' => 'Via Roma 69, 02100 Rieti', 'lat' => '42.401661', 'lon' => '12.861111'],

            ['address' => 'Piazza di Spagna 28, 00187 Roma', 'lat' => '41.905678', 'lon' => '12.482317'],

            ['address' => 'Via di Santa Maria Maggiore 54, 51100 Pistoia', 'lat' => '43.930485', 'lon' => '10.898976'],

            ['address' => 'Via Roma 39, 03040 Villa Latina', 'lat' => '41.620693', 'lon' => '13.834278'],

            ['address' => 'Viale Roma 20, 03100 Frosinone', 'lat' => '41.643318', 'lon' => '13.352082'],

            ['address' => 'Via Roma 23, 01100 Viterbo', 'lat' => '42.417439', 'lon' => '12.105614'],

            ['address' => 'Via Roma 98, 01010 Capodimonte', 'lat' => '42.548519', 'lon' => '11.910436'],

            ['address' => 'Via Santa Maria di Trocchio 78, 03044 Cervaro', 'lat' => '41.467888', 'lon' => '13.877952'],

            ['address' => 'Via Roma 3, 02100 Rieti', 'lat' => '42.400211', 'lon' => '12.860888'],

            ['address' => 'Piazza di Spagna 22, 00187 Roma', 'lat' => '41.906094', 'lon' => '12.482209'],

            ['address' => 'Via Nazionale 54, 01020 Lubriano', 'lat' => '42.636227', 'lon' => '12.113233'],

            ['address' => 'Via Aldo Moro 43, 00047 Marino', 'lat' => '41.762730', 'lon' => '12.609358'],

            ['address' => 'Piazza di Spagna 28, 00187 Roma', 'lat' => '41.905678', 'lon' => '12.482317'],

            ['address' => 'Via Nazionale 32, 03036 Isola del Liri', 'lat' => '41.678085', 'lon' => '13.575752'],

        ];

        $apartments = array(
            array(
                "title" => "Accogliente Monolocale  hdegf67467hj in Centro",
                "description" => "Monolocale luminoso con cucina attrezzata e bagno privato. A due passi dai principali luoghi di interesse."
            ),
            array(
                "title" => "Appartamento hdegf67467hj Moderno con Vista Mare",
                "description" => "Elegante appartamento con due camere da letto, soggiorno spazioso e terrazza con vista panoramica sul mare."
            ),
            array(
                "title" => "Bilocale hdegf67467hj Ristrutturato in Zona Tranquilla",
                "description" => "Bilocale recentemente ristrutturato, con finiture di pregio e giardino privato. Perfetto per coppie."
            ),
            array(
                "title" => "Spazioso Trilocale hdegf67467hj con Parcheggio",
                "description" => "Trilocale ampio e luminoso, con cucina abitabile, balcone e posto auto riservato. Ottimi collegamenti con i mezzi pubblici."
            ),
            array(
                "title" => "Attico hdegf67467hj di Lusso in Centro Storico",
                "description" => "Attico esclusivo con rifiniture di alta qualità, due terrazze panoramiche e vista sulla città. Disponibile con o senza arredamento."
            ),
            array(
                "title" => "Monolocale hdegf67467hj Economico Vicino alla Metro",
                "description" => "Monolocale funzionale e ben collegato, situato a pochi passi dalla stazione della metro. Ideale per studenti."
            ),
            array(
                "title" => "Ampio Quadrilocale hdegf67467hj con Doppi Servizi",
                "description" => "Quadrilocale spazioso con due bagni, cucina abitabile e tre camere da letto. Perfetto per famiglie numerose."
            ),
            array(
                "title" => "Bilocale hdegf67467hj con Giardino Privato",
                "description" => "Bilocale accogliente con accesso diretto a un giardino privato. Zona tranquilla e ben servita."
            ),
            array(
                "title" => "Trilocale hdegf67467hj Arredato in Zona Residenziale",
                "description" => "Trilocale arredato con gusto, situato in un'area residenziale verde e silenziosa. Ideale per giovani coppie."
            ),
            array(
                "title" => "Monolocale hdegf67467hj di Design nel Cuore della Città",
                "description" => "Monolocale moderno e di design, con arredi nuovi e tutti i comfort. Posizione centralissima."
            ),
            array(
                "title" => "Appartamento hdegf67467hj Panoramico con Terrazza",
                "description" => "Appartamento con vista mozzafiato, terrazza spaziosa e ambienti luminosi. Contesto signorile."
            ),
            array(
                "title" => "Bilocale hdegf67467hj con Cucina a Vista",
                "description" => "Bilocale con cucina a vista, soggiorno ampio e balcone. Ottime condizioni interne."
            ),
            array(
                "title" => "Attico hdegf67467hj con Piscina Condominiale",
                "description" => "Attico esclusivo con accesso a piscina condominiale e terrazza privata. Finiture di pregio."
            ),
            array(
                "title" => "Trilocale hdegf67467hj con Camino e Giardino",
                "description" => "Trilocale caratteristico con camino funzionante e giardino di proprietà. Ambiente rustico e accogliente."
            ),
            array(
                "title" => "Quadrilocale hdegf67467hj con Garage Doppio",
                "description" => "Quadrilocale ben disposto con garage doppio, cucina abitabile e tre camere da letto. Zona tranquilla."
            ),
            array(
                "title" => "Appartamento hdegf67467hj di Charme in Villa Storica",
                "description" => "Appartamento unico in villa storica ristrutturata, con soffitti affrescati e ampio parco condominiale."
            ),
            array(
                "title" => "Bilocale hdegf67467hj con Vista Parco",
                "description" => "Bilocale con splendida vista sul parco, soggiorno luminoso e cucina separata. Ideale per amanti della natura."
            ),
            array(
                "title" => "Monolocale hdegf67467hj in Stabile di Pregio",
                "description" => "Monolocale elegante e ben rifinito, situato in uno stabile di pregio con portineria. Ottima posizione."
            ),
            array(
                "title" => "Trilocale hdegf67467hj Vicino al Mare",
                "description" => "Trilocale a pochi passi dalla spiaggia, con due camere da letto e terrazza vista mare. Perfetto per vacanze."
            ),
            array(
                "title" => "Ampio Bilocale hdegf67467hj con Soffitta",
                "description" => "Bilocale di grandi dimensioni con soffitta abitabile, cucina separata e bagno finestrato. Zona servita."
            ),
            array(
                "title" => "Attico hdegf67467hj con Vista Montagna",
                "description" => "Attico con vista sulle montagne, ampie vetrate e terrazza abitabile. Contesto tranquillo e riservato."
            ),
            array(
                "title" => "Monolocale hdegf67467hj con Angolo Cottura",
                "description" => "Monolocale ben organizzato con angolo cottura e bagno privato. Vicino a tutti i servizi principali."
            ),
            array(
                "title" => "Quadrilocale hdegf67467hj su Due Livelli",
                "description" => "Quadrilocale disposto su due livelli, con scala interna, due bagni e giardino condominiale. Ideale per famiglie."
            ),
            array(
                "title" => "Bilocale hdegf67467hj con Terrazza Abitabile",
                "description" => "Bilocale moderno con ampia terrazza abitabile, soggiorno con angolo cottura e camera matrimoniale."
            ),
            array(
                "title" => "Trilocale hdegf67467hj Ristrutturato con Balcone",
                "description" => "Trilocale recentemente ristrutturato, con balcone, cucina abitabile e due camere da letto. Pronto da abitare."
            ),
            array(
                "title" => "Monolocale hdegf67467hj Centralissimo",
                "description" => "Monolocale in posizione centrale, a due passi dalle principali attrazioni turistiche. Ottimo investimento."
            ),
            array(
                "title" => "Appartamento hdegf67467hj con Giardino Condominiale",
                "description" => "Appartamento con affaccio su giardino condominiale, soggiorno ampio e cucina separata. Zona ben servita."
            ),
            array(
                "title" => "Bilocale hdegf67467hj in Complesso Residenziale",
                "description" => "Bilocale in complesso residenziale con piscina e area giochi per bambini. Ideale per famiglie giovani."
            ),
            array(
                "title" => "Trilocale hdegf67467hj con Cantina e Garage",
                "description" => "Trilocale con cantina e garage, cucina abitabile e ampio soggiorno. Zona tranquilla e ben collegata."
            ),
            array(
                "title" => "Monolocale hdegf67467hj Vicino al Politecnico",
                "description" => "Monolocale perfetto per studenti, situato vicino al Politecnico. Completamente arredato e pronto da abitare."
            ),
            array(
                "title" => "Attico hdegf67467hj con Terrazza Panoramica",
                "description" => "Attico con grande terrazza panoramica, tre camere da letto e doppi servizi. Finiture di lusso."
            ),
            array(
                "title" => "Bilocale hdegf67467hj Economico in Periferia",
                "description" => "Bilocale economico in periferia, ideale per chi cerca una soluzione conveniente. Ben collegato dai mezzi pubblici."
            ),
            array(
                "title" => "Trilocale hdegf67467hj con Doppi Servizi",
                "description" => "Trilocale con due bagni, soggiorno spazioso e cucina abitabile. Ottimo per famiglie numerose."
            ),
            array(
                "title" => "Monolocale hdegf67467hj di Recente Costruzione",
                "description" => "Monolocale in edificio di recente costruzione, con finiture moderne e spazi ben organizzati."
            ),
            array(
                "title" => "Quadrilocale hdegf67467hj in Zona Centrale",
                "description" => "Quadrilocale in posizione centrale, con tre camere da letto e doppi servizi. Ottimo investimento immobiliare."
            ),
            array(
                "title" => "Bilocale hdegf67467hj con Posto Auto",
                "description" => "Bilocale con posto auto riservato, soggiorno con angolo cottura e camera matrimoniale. Zona servita."
            ),
            array(
                "title" => "Trilocale hdegf67467hj Arredato con Giardino",
                "description" => "Trilocale completamente arredato con giardino privato, ideale per coppie o piccole famiglie."
            ),
            array(
                "title" => "Monolocale hdegf67467hj in Zona Universitaria",
                "description" => "Monolocale perfetto per studenti, situato in zona universitaria. Completamente arredato e vicino ai servizi."
            ),
            array(
                "title" => "Appartamento hdegf67467hj con Piscina Privata",
                "description" => "Appartamento di lusso con piscina privata, ampie vetrate e terrazza abitabile. Finiture di pregio e giardino privato. Perfetto per coppie."
            ),
            array(
                "title" => "Accogliente Monolocale hdegf67467hj in Centro",
                "description" => "Monolocale luminoso con cucina attrezzata e bagno privato. A due passi dai principali luoghi di interesse."
            ),
            array(
                "title" => "Appartamento hdegf67467hj Moderno con Vista Mare",
                "description" => "Elegante appartamento con due camere da letto, soggiorno spazioso e terrazza con vista panoramica sul mare."
            ),
            array(
                "title" => "Bilocale hdegf67467hj Ristrutturato in Zona Tranquilla",
                "description" => "Bilocale recentemente ristrutturato, con finiture di pregio e giardino privato. Perfetto per coppie."
            ),
            array(
                "title" => "Spazioso Trilocale hdegf67467hj con Parcheggio",
                "description" => "Trilocale ampio e luminoso, con cucina abitabile, balcone e posto auto riservato. Ottimi collegamenti con i mezzi pubblici."
            ),
            array(
                "title" => "Attico hdegf67467hj di Lusso in Centro Storico",
                "description" => "Attico esclusivo con rifiniture di alta qualità, due terrazze panoramiche e vista sulla città. Disponibile con o senza arredamento."
            )
        );




        $user_ids = User::all()->pluck('id')->all();
        $service_ids = Service::all()->pluck('id')->all();
        $categories_ids = Category::all()->pluck('id')->all();
        $promotions_ids = Promotion::all()->pluck('id')->all();
        $promo_durations = Promotion::all()->pluck('hours', 'id')->all();

        $slug_list = [];
        $pathImg = 'uploads/apartment/img_default/';

        foreach ($arrAddress as $key => $addresses) {

            $name = $faker->firstName(null);
            $apartment_tit_desc = $faker->randomElement($apartments);

            if (checkEqual($arrAddress, $addresses['address'], $key)) {
                $title = str_replace("hdegf67467hj", $name, $apartment_tit_desc['title']);
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
                $new_apartment->description = $apartment_tit_desc['description'];
                $new_apartment->price = $faker->randomFloat(2, 20, 1200);
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
                    $hours = $promo_durations[$random_promotions_id];

                    //vedi se promotions with timestamps è vuoto o no
                    if (count($promotions_with_timestamp)) {

                        while (checkPromoDate($start_date, $promotions_with_timestamp, $hours)[0]) {
                            $start_date = (new Carbon(checkPromoDate($start_date, $promotions_with_timestamp, $hours)[1]))->addSecond();
                        }
                    }

                    $expiration_date = (new Carbon($start_date))->addHours($hours);
                    $promotions_with_timestamp[$random_promotions_id] = [
                        'start_date' => $start_date,
                        'expiration_date' => $expiration_date
                    ];
                }

                $new_apartment->promotions()->attach($promotions_with_timestamp);
            }
        };
    }
}

function checkPromoDate($start_date, $promotions_with_timestamp, $hours)
{
    $new_start_date = new Carbon($start_date);
    $new_expiration_date = (new Carbon($start_date))->addHours($hours);
    foreach ($promotions_with_timestamp as $pDate) {
        if ($new_start_date->between($pDate['start_date'], $pDate['expiration_date']) && $new_expiration_date->between($pDate['start_date'], $pDate['expiration_date'])) {
            return [true, $pDate['expiration_date']];
        }
    }
    return [false, ''];
}

function checkEqual($arrAddress, $addressTocheck, $key)
{
    foreach ($arrAddress as $key2 => $address) {
        if ($address['address'] === $addressTocheck && $key !== $key2) {
            return false;
        }
    }
    return true;
}
