<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use DB;

class HomeController extends Controller
{


    public function index()
    {   

        $data = DB::table('data')->orderBy('id', 'DESC')->get();
        return view('welcome', compact('data'));
    }

    public function generateCsv(){
        $data = Data::latest()->get();
        $filename = "application.csv";
        $fp=fopen($filename, 'w+');
        fputcsv($fp, array('Name', 'Email', 'Address', 'City', 'State', 'Country', 'Image'));

        foreach($data as $row){
            fputcsv($fp, array($row->name, $row->email, $row->address, $row->city, $row->state, $row->country, $row->image));
        }
        
        fclose($fp);
        $headers = array('Content-Type' => 'text/csv');

        return response()->download($filename, 'application.csv', $headers);
    }

    public function upload(Request $request)
    {


        $request->validate(
            [   
                'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            ]);

       $data=new  data;

       $image=$request->file;
       $imagename = time().'.'.$image->getClientoriginalExtension();
       $request->file->move('dataimage',$imagename);
       $data->image=$imagename;

    //    $requestData = $request->all();  
    //   $fileName = time().$request-file('image')->getClientOriginalName();
    //   $path = $request->file('image')->storeAs('images', $fileName, 'public');
    //   $requestData['image'] = '/storage/'.$path;
    //   Data::create($requestData);

       $data->name=$request->name;
       $data->email=$request->email;
       $data->address=$request->address;
       $data->number=$request->number;
       $data->city=$request->city;
       $data->state=$request->state;
       $data->country=$request->country;

       $data->save();

       return redirect()->back();

    }
}
