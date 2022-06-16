<?php
  
namespace App\Imports;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Currencies;
  
class CurrenciesImport implements ToCollection
{
     /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
            if($key != 0){
                if(Currencies::where('iso_code',$row[0])->exists()){
                   //
                }else{
                    $insertData = new Currencies;
                    $insertData->iso_code = $row[0];
                    $insertData->iso_numeric_code = $row[1];
                    $insertData->common_name = $row[2];
                    $insertData->official_name = $row[3];
                    $insertData->symbol = $row[4];
                    $insertData->save();
                }
            }
        }
    }
}