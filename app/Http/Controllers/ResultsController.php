<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserAddress;
use App\Models\UserExperience;
use App\Models\UserQuiz;

class ResultsController extends Controller
{
    
    public function index()
    {
        if (Auth::check()) {
            $user_quizes = UserQuiz::with('user','quiz')
                    ->orderBy('id', 'desc')
                    ->get();
            if ($user_quizes) {
                return view('dashboard.candidate-quizes.results');
            }
        }
        return Response(['data' => 'Unauthorized'], 401);
    }

    public function getResultsTableData(Request $request)
    {
        // dd(request()->has('Level'));
        // dd($request->Level);

        if (Auth::check()) {
            $data = UserQuiz::with('user','quiz')
                    ->when(request()->has('Level'), function ($query) {
                        $query->whereHas('quiz', function ($quizQuery) {
                            if(request()->Level != ""){
                                $quizQuery->where('level', request('Level'));
                            }
                        });
                    })
                    ->when(request()->has('passstatus'), function ($query) {
                        $filterPassStatus = request('passstatus');
                        if(request()->passstatus != ""){
                            $query->where('pass_status', $filterPassStatus == 'pass' ? 1 : 0);
                        }
                    })
                    ->orderBy('id', 'desc')
                    ->get();

            if ($data) {
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function ($row) {
                        $actions = '<a href="/admin/user/' . $row->user_id . '" class="btn btn-sm btn-gradient-success btn-rounded">View</a>';
                        return $actions;
                    })
                    ->addColumn('pass_status', function ($row) {
                        $pass_status = $row->pass_status ? '<span class="badge badge-success" style="margin-right: 5px;">Pass</span>' : '<span class="badge badge-danger" style="margin-right: 5px;">Fail</span>';
                        return $pass_status;
                    })
                    ->addColumn('level', function ($row) {

                        $level = '';

                        switch ($row->quiz->level) {
                            case 1:
                                $level = '<span class="badge badge-info" style="margin-right: 5px;">Level 1</span>';
                                break;
                            case 2:
                                $level = '<span class="badge badge-info" style="margin-right: 5px;">Level 2</span>';
                                break;
                            case 3:
                                $level = '<span class="badge badge-info" style="margin-right: 5px;">Level 3</span>';
                                break;
                            default:
                                break;
                        }
                    
                        return $level;
                    })
                    ->rawColumns(['actions','pass_status','level'])
                    ->make(true);
            }
        }
    }
}
