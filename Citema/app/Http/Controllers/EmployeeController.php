<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreEmployeeRequest;

use App\Employee;

class EmployeeController extends Controller
{

  /**
     * Employee constructor
     */
  public function __construct() {
      $this->middleware('auth');
  }

  /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
  public function create() {
    return view('employees.create');
  }

    /**
     * Store a newly created resource in storage.
     *
     * @return View
     */
  public function store(StoreEmployeeRequest $request) {
    //validation happens here (see StoreEmployeeRequest)
    Employee::create($request->all());

    $employees = Employee::paginate(50);
    return view('employees.index', compact('employees'))->with('status','CREATED');
  }

  /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
  public function edit($id)
  {
    $employee = Employee::find($id);
    return view('employees.create')->with('employee',$employee);
  }

  /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return View
     */
  public function update($id, StoreEmployeeRequest $request)
  {
    $employee = Employee::find($id);

    $employee->fill($request->input())->save();

    return redirect()->action('EmployeeController@index')->with('status','UPDATED');

  }

  /**
    * Display a listing of the resource.
    *
    * @return View
    */
  public function index()
  {
    $employees = Employee::paginate(50);
    return view('employees.index', compact('employees'));
  }

  /**
     * Filter the list of employees.
     *
     * @return View
     */
  public function filter(Request $request)
  {
    $employees = Employee::where('current_salary','>',$request->input('current_salary'));;
    if($request->has('gender')) {
      $employees = $employees->where('gender',$request->input('gender'));
    }
    $employees = $employees->paginate(50);
    return view('employees.index', compact('employees'));
  }

}
