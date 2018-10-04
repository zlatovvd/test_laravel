<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Position;
use App\Employee;

class AddController extends Controller
{

    public function shearch(Request $request) {

    	if ($request->ajax()) {
    
    		$req = $request->all();

            if (isset($req['name'])) {

                $employees = Employee::where('fullname', 'like', '%'.$req['name'].'%')
                                                    ->paginate(10);
                $request->session()->put('shearch', $req['name']);
            }  else {

                if($req['name'] == null) {

                    $employees = Employee::paginate(10);
                                                                        
                }

            }

            if($employees) {
                return view('emp_content', ['employees'=>$employees]);
            }

        } else {
            if ($request->session()->has('shearch')) {
                $like = $request->session()->get('shearch');
               
                $employees = Employee::where('fullname', 'like', '%'.$like.'%')
                                                    ->paginate(10);
            }

            return view('employees', ['employees'=>$employees]);
        }
    }



    public function sort(Request $request) {

        if ($request->ajax()) {
    
            $req = $request->all();         

            if (isset($req['sort'])) {

                $field = $req['sort'];

                if ($request->session()->has('sort')) {
                    
                    $value = $request->session()->get('sort.value');
            
                    if ($value != 'desc') {
                        $value = 'desc';           
                    } else {
                        $value = 'asc';            
                    }
                    $request->session()->put('sort.field', $field);
                    $request->session()->put('sort.value', $value);            
                    $employees = Employee::orderBy($field, $value)->paginate(10);

                } else {
                    $request->session()->put('sort.field', $field);            
                    $request->session()->put('sort.value', 'asc');            
                    $employees = Employee::orderBy($field, 'asc')->paginate(10);
                }

                return view('emp_content', ['employees'=>$employees]);
            }
        } else {
            if ($request->session()->has('sort')) {
                $field = $request->session()->get('sort.field');
                $value = $request->session()->get('sort.value');
               
                $employees = Employee::orderBy($field, $value)->paginate(10);
            }

            return view('employees', ['employees'=>$employees]);
        }
    }


    public function position(Request $request) {

        if ($request->ajax()) {
            $req = $request->all();         

            if (isset($req['position'])) {

                $position = Position::find($req['position']);

                $subordinate = Position::where('id', $position->parent_id)->first();

                return view('boss', ['subordinate' => $subordinate]);

            }

        }        
    }



}
