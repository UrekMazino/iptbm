<?php

namespace Database\Seeders\iptbm;

use App\Models\iptbm\IptbmInventor;
use Illuminate\Database\Seeder;

class InventorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $iptbm_inventors = array(
            array('id' => '4', 'name' => 'John Philip Madrid', 'agency' => '1', 'address' => 'Dingras, Ilocos Norte', 'created_at' => '2023-08-30 01:04:15', 'updated_at' => '2023-08-30 01:04:15', 'status' => 'ACTIVE'),
            array('id' => '5', 'name' => 'Kyle Cedric Dadoy', 'agency' => '1', 'address' => 'Currimao, Ilocos Norte ', 'created_at' => '2023-08-30 01:09:27', 'updated_at' => '2023-08-30 01:09:27', 'status' => 'ACTIVE'),
            array('id' => '6', 'name' => 'Monalyn L. Oloroso', 'agency' => '7', 'address' => 'Burias, Mambusao, Capiz', 'created_at' => '2023-08-30 03:26:10', 'updated_at' => '2023-08-30 03:26:10', 'status' => 'ACTIVE'),
            array('id' => '7', 'name' => 'Efren L. Linan', 'agency' => '7', 'address' => 'Burias, Mambusao, Capiz', 'created_at' => '2023-08-30 03:27:14', 'updated_at' => '2023-08-30 03:27:14', 'status' => 'ACTIVE'),
            array('id' => '8', 'name' => 'Linda W. Tagtagon', 'agency' => '15', 'address' => 'Nayon, Lamut, Ifugao', 'created_at' => '2023-08-30 03:29:10', 'updated_at' => '2023-08-30 03:29:10', 'status' => 'ACTIVE'),
            array('id' => '9', 'name' => 'Leo C. Rio', 'agency' => '23', 'address' => 'Sitio Sumipit, Cervantes St., Brgy. San Jose, Baras, Rizal', 'created_at' => '2023-08-30 03:29:59', 'updated_at' => '2023-08-30 03:29:59', 'status' => 'ACTIVE'),
            array('id' => '11', 'name' => 'Jerry C. Esperanza', 'agency' => '23', 'address' => 'B5 L6 Johnny St., Sunnyvale 3 Subdivision, Palangoy, 1940, Binangonan, Rizal, Philippines', 'created_at' => '2023-08-30 03:34:36', 'updated_at' => '2023-08-30 03:34:36', 'status' => 'ACTIVE'),
            array('id' => '12', 'name' => 'Nona D. Nagares', 'agency' => '36', 'address' => 'Tayabas City, Quezon Province', 'created_at' => '2023-08-30 03:35:44', 'updated_at' => '2023-08-30 03:35:44', 'status' => 'ACTIVE'),
            array('id' => '13', 'name' => 'Errol A. Rosaldo', 'agency' => '23', 'address' => 'Morong, Rizal, 1960 Rizal, Philippines', 'created_at' => '2023-08-30 03:35:59', 'updated_at' => '2023-08-30 03:35:59', 'status' => 'ACTIVE'),
            array('id' => '14', 'name' => 'Jerome Lacsamana', 'agency' => '1', 'address' => 'Laoag City', 'created_at' => '2023-08-30 03:37:17', 'updated_at' => '2023-08-30 03:37:17', 'status' => 'ACTIVE'),
            array('id' => '16', 'name' => 'Alma J. Caringal', 'agency' => '36', 'address' => 'Tiaong, Quezon', 'created_at' => '2023-08-30 03:37:19', 'updated_at' => '2023-08-30 03:37:19', 'status' => 'ACTIVE'),
            array('id' => '17', 'name' => 'Concepcion Ponce', 'agency' => '18', 'address' => 'Miagao, Iloilo', 'created_at' => '2023-08-30 03:38:14', 'updated_at' => '2023-08-30 03:38:14', 'status' => 'ACTIVE'),
            array('id' => '18', 'name' => 'Violeto N. Coronacion', 'agency' => '36', 'address' => 'Infanta, Quezon', 'created_at' => '2023-08-30 03:38:24', 'updated_at' => '2023-08-30 03:38:24', 'status' => 'ACTIVE'),
            array('id' => '20', 'name' => 'John Fitzken Da Vinci M. Niro', 'agency' => '31', 'address' => 'Ligao City, Albay', 'created_at' => '2023-08-30 03:39:18', 'updated_at' => '2023-08-30 03:39:18', 'status' => 'ACTIVE'),
            array('id' => '21', 'name' => 'Jomar E. Tuazon', 'agency' => '31', 'address' => 'Guinobatam, Albay', 'created_at' => '2023-08-30 03:45:26', 'updated_at' => '2023-08-30 03:45:26', 'status' => 'ACTIVE'),
            array('id' => '22', 'name' => 'Maria Leonora Teresa', 'agency' => '1', 'address' => 'Batac, Ilocos Norte', 'created_at' => '2023-08-30 03:46:20', 'updated_at' => '2023-08-30 03:46:20', 'status' => 'ACTIVE'),
            array('id' => '24', 'name' => 'Rizza Mae B. Burac', 'agency' => '31', 'address' => 'Bacacay, Albay', 'created_at' => '2023-08-30 03:50:19', 'updated_at' => '2023-08-30 03:50:19', 'status' => 'ACTIVE'),
            array('id' => '25', 'name' => 'Albert B. Pantoja', 'agency' => '31', 'address' => 'Legazpi, Albay', 'created_at' => '2023-08-30 03:51:16', 'updated_at' => '2023-08-30 03:51:16', 'status' => 'ACTIVE'),
            array('id' => '26', 'name' => 'Angelica E. Pomay', 'agency' => '31', 'address' => 'Legazpi, Albay', 'created_at' => '2023-08-30 03:51:47', 'updated_at' => '2023-08-30 03:51:47', 'status' => 'ACTIVE'),
            array('id' => '27', 'name' => 'Marinel A. Palamara', 'agency' => '31', 'address' => 'Guinobatan, Albay', 'created_at' => '2023-08-30 03:52:19', 'updated_at' => '2023-08-30 03:52:19', 'status' => 'ACTIVE'),
            array('id' => '28', 'name' => 'Daniel Leslie Tan, Julie Tan,Inish Chris Mesias, Benjamin Cinto, Genesis Jared Cutamora', 'agency' => '37', 'address' => 'Baybay City, Leyte', 'created_at' => '2023-08-30 03:53:13', 'updated_at' => '2023-08-30 03:53:13', 'status' => 'ACTIVE'),
            array('id' => '29', 'name' => 'Gee Jay C. Bartolome', 'agency' => '19', 'address' => 'General Trias, Cavite', 'created_at' => '2023-08-30 03:54:54', 'updated_at' => '2023-08-30 03:54:54', 'status' => 'ACTIVE'),
            array('id' => '30', 'name' => 'Hosea Matel', 'agency' => '19', 'address' => 'Indang, Cavite', 'created_at' => '2023-08-30 03:55:40', 'updated_at' => '2023-08-30 03:55:40', 'status' => 'ACTIVE'),
            array('id' => '31', 'name' => 'Rene C. Santiago', 'agency' => '8', 'address' => 'BAI-NSPRDC', 'created_at' => '2023-08-30 04:01:07', 'updated_at' => '2023-08-30 04:01:07', 'status' => 'ACTIVE'),
            array('id' => '32', 'name' => 'Zaldy A. Fernandez', 'agency' => '1', 'address' => 'Brgy. 7-B P.Gomez St. Nuestra Señora 2900 Laoag City, Ilocos Norte Philippines', 'created_at' => '2023-08-30 04:05:12', 'updated_at' => '2023-08-30 04:05:12', 'status' => 'ACTIVE'),
            array('id' => '33', 'name' => 'Jihan Alumbro', 'agency' => '18', 'address' => 'Miagao, Iloilo', 'created_at' => '2023-08-30 04:05:16', 'updated_at' => '2023-08-30 04:05:16', 'status' => 'ACTIVE'),
            array('id' => '34', 'name' => 'Feliciano Sinon', 'agency' => '37', 'address' => 'Baybay City, Leyte', 'created_at' => '2023-08-30 04:05:48', 'updated_at' => '2023-08-30 04:05:48', 'status' => 'RETIRED'),
            array('id' => '36', 'name' => 'Moses B. Appoy', 'agency' => '15', 'address' => 'Nayon, Lamut, Ifugao', 'created_at' => '2023-08-30 04:24:44', 'updated_at' => '2023-08-30 04:24:44', 'status' => 'ACTIVE'),
            array('id' => '37', 'name' => 'Roger C. Montepio', 'agency' => '21', 'address' => 'Blk 18. Lot 7. Dreamville Subd. Mangga, Visayan Village, Tagum City', 'created_at' => '2023-08-30 04:26:15', 'updated_at' => '2023-08-30 04:26:15', 'status' => 'ACTIVE'),
            array('id' => '38', 'name' => 'Ryan C. Abenoja', 'agency' => '21', 'address' => 'Tagum City', 'created_at' => '2023-08-30 04:26:42', 'updated_at' => '2023-08-30 04:26:42', 'status' => 'ACTIVE'),
            array('id' => '39', 'name' => 'Ruel Tuyogon', 'agency' => '21', 'address' => 'Tagum City', 'created_at' => '2023-08-30 04:27:30', 'updated_at' => '2023-08-30 04:27:30', 'status' => 'ACTIVE'),
            array('id' => '41', 'name' => 'Roland Bayron', 'agency' => '21', 'address' => 'Tagum City', 'created_at' => '2023-08-30 04:28:14', 'updated_at' => '2023-08-30 04:28:14', 'status' => 'ACTIVE'),
            array('id' => '42', 'name' => 'Clarissa Domingo', 'agency' => '7', 'address' => 'Central Luzon State University', 'created_at' => '2023-09-01 23:17:46', 'updated_at' => '2023-09-01 23:17:46', 'status' => 'ACTIVE')
        );
        foreach ($iptbm_inventors as $inventor) {
            IptbmInventor::create($inventor);
        }
    }
}
