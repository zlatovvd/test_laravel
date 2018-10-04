<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Position;



class TreeController extends Controller
{

    public function index(Request $request) {

        if ($request->ajax()) {
            $req = $request->all();

            if (isset($req['drag'])) {
                $employee = Employee::where('id', $req['drag'])->first();
                
                $drop = (int) $req['drop'];
                $position = Position::where('id', $drop)->first();
                
                if($position->only == 1) {
                    $emp = $employee->where('position_id', $drop)->first();
                    if($emp) {
                        $arr['status'] = false;
                        $arr['message'] = "Сотрудник $employee->fullname не может быть переведен на
                                должность $position->name т.к. эту должность занимает $emp->fullname";
                        return json_encode($arr);
                    }
                } 

                $employee->position_id = $drop;

                $employee->save();

                $arr['status'] = true;
                $arr['message'] = "Сотрудник $employee->fullname переведен на должность $position->name";
                return json_encode($arr);

            }

            if(isset($req['parent'])) {
                $children = Position::where('parent_id', $req['parent'])->get();
                $children->load('employees');
                if($children->isEmpty()) {
                    return;
                } else {
                    foreach($children as $item) {
                      $employees = Employee::where('position_id', $item->id)->get();
                        if($employees->isEmpty()) {
                            return;
                        } else {
                            foreach($employees as $employee) {
                                $html[$item->id][] =  "<a href='#' class='tree-employee' ondragstart='drag(event)' class='employee' id=$employee->id>- $employee->fullname </a>";
                            }

                        }
                        
                    }

                    return json_encode($html);                
                } 

            }
            
            
        } else {

            $positions = Position::all();

            $positions = $positions->groupBy('parent_id');

            return view('tree', ['positions' => $positions]);
        }

    }


 

}
