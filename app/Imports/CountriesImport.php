<?php
  
namespace App\Imports;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Countries;
  
class CountriesImport implements ToCollection
{
     /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
            if($key != 0){
                if(Countries::where('common_name',$row[7])->exists()){
                   //
                }else{
                    $insertData = new Countries;
                    $insertData->continent_code = $row[0];
                    $insertData->currency_code = $row[1];
                    $insertData->iso2_code = $row[2];
                    $insertData->iso3_code = $row[3];
                    $insertData->iso_numeric_code = $row[4];
                    $insertData->fips_code = $row[5];
                    $insertData->calling_code = $row[6];
                    $insertData->common_name = $row[7];
                    $insertData->official_name = $row[8];
                    $insertData->endonym = $row[9];
                    $insertData->demonym = $row[10];
                    $insertData->save();
                }
            }
        }
    }
}