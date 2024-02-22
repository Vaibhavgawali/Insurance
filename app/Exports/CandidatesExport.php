<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Support\Facades\DB;

class CandidatesExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        $user = User::findOrFail(16);
        $userData = User::with('address', 'profile', 'experience')->find($user->user_id);
        // Example of custom query
        // return DB::table('table1')
        //     ->join('table2', 'table1.id', '=', 'table2.table1_id')
        //     ->select('table1.*', 'table2.column AS column_name')
        //     ->where('table1.some_column', '=', 'some_value')
        //     ->orderBy('table1.created_at', 'desc');
        return $userData;
    }
}
