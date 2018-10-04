<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;
use App\Position;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $employees = Employee::paginate(10);

        return view('employees', ['employees' => $employees]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $positions = Position::all();

        return view('emp_add', ['positions'=>$positions]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Employee $employee, Request $request)
    {
        if($request->isMethod('post')) {
            $input = $request->except('_token');
            if($request->hasFile('img')) {
                $file = $request->file('img');
                $file->move(public_path().'/images', $file->getClientOriginalName());
                $input['img'] = $file->getClientOriginalName();
            }
            $employee->fill($input);
        }

        if($employee->save()) {
            return redirect(route('employee.index'))->with('status','Сотрудник добавлен');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo __METHOD__;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $positions = Position::all();

        $parent = $positions->where('id', $employee->position_id)->first()->parent_id;

        $subposition = $positions->where('id', $parent)->first();
        if(is_object($subposition)) {
            $subposition = $subposition->name;
        }

        $subordinate = $employee->where('position_id', $parent)->first();
        if(is_object($subordinate)) {
            $subordinate = $subordinate->fullname;
        }

        return view('emp_edit', [
                                    'employee' => $employee, 
                                    'positions' => $positions,
                                    'subposition' => $subposition,
                                    'subordinate' => $subordinate
                                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if($request->isMethod('put')) {
            $input = $request->except('_token');
            $employee = Employee::find($id);
            $employee->fill($input);

            if($request->hasFile('img')) {
                $file = $request->file('img');
                $file->move(public_path().'/images', $file->getClientOriginalName());
                $input['img'] = $file->getClientOriginalName();
            } else {
                $input['img'] = $input['old_img'];
            }
            
            unset($input['old_img']);

            $employee->fill($input);

            if($employee->update()) {
                return redirect()->route('employee.index')->with('status', 'Данные обновлены');
            } 
        }

        return redirect()->route('employee.index')->with('status', 'Ошибка обновления');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $employee = Employee::find($id);
        //dd($employee);
        if($employee->delete()) {
            return redirect()->route('employee.index')->with('status', 'Сoтрудник удален');
        }

    }
}
