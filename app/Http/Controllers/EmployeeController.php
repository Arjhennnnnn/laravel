<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class EmployeeController extends Controller
{

    public function viewmember($id){
        $employees = User::find($id)->members;
        return view('try.tryhasmany')
            ->with(['employees' => $employees]);
    }


    public function supervisor(){
        $supervisors = User::all();
        // dd($supervisors);
        return view('try.supervisor')
            ->with(['supervisors' => $supervisors]);
    }


    public function tryhasmany(){
        $employees = User::find(5)->members;
        return view('try.tryhasmany')
            ->with(['employees' => $employees]);
    }
    


    public function trybelongsto(){
        $employees = Employees::find(5)->supervisor;
        return view('try.trybelongsto')
            ->with(['employees' => $employees]);
    }


    
    public function home(){
        $employees = Employees::where('supervisor_id',1)->get();
        return view('user.crud')
            ->with(['employees' => $employees]);
        // $employees = DB::table('employees')
        //     ->orderBy('firstname','asc')
        //     ->simplePaginate(5);

        //     // return ['employees' => $employees];
        // return view('user.crud')
        //     ->with(['employees' => $employees]);
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            "firstname" => ['required'],
            "middlename" => ['required'],
            "lastname" => ['required'],
            "email" => ['required','email',Rule::unique('employees','email')],
            "contactnumber" => 'required|digits:11',

        ]);
        $employee = Employees::create($validate);
        return redirect('/')
            ->with('message','Successfully Added');
    }


    public function edit($id){
        $edit = Employees::find($id);
        return view('user.edit')
                ->with(['edit' => $edit]);
    }


    public function update(Request $request,Employees $id){

        $validate = $request -> validate([
            "firstname" => ['required'],
            "middlename" => ['required'],
            "lastname" => ['required'],
            "email" => ['required','email'],
            "contactnumber" => ['required'],
          ]);

          $id->update($validate);

          return back()->with('message','Successfully Update');;
    }



    public function destroy(Request $request , Employees $id){
        $id->delete();
        return redirect('/')->with('message','Successfully Delete');
    }



    public function search(Request $request){
        $search = $request['search'];
        if($search == ''){
            return redirect('/');
        }
        else{
        $employee_search = DB::table('employees')
            ->where('firstname','like',"%{$search}%")
            ->orWhere('middlename','LIKE',"%{$search}%")
            ->orWhere('lastname','LIKE',"%{$search}%")
            ->orWhere('email','LIKE',"%{$search}%")
            ->orWhere('contactnumber','LIKE',"%{$search}%")
            ->simplePaginate(5);
        return view('user.crud')
            ->with(['employees' => $employee_search]);
        }

    }

    }

    // DB::table('employees')
    //         ->orderBy('firstname','asc')
    //         ->simplePaginate(5);