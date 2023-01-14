<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\package;
use Illuminate\Support\Facades\File;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package = package::all();
        return view('admin.packages.index',compact('package'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'packagename'=>'required|string',
        'packagelocation'=>'required|alpha',
        'packageprice'=>'required|numeric',
        'packagedetails'=>'required',
        'days'=>'required|numeric',
        'nights'=>'required|numeric',
        'packageimage'=>'required|mimes:jpeg,png,jpg,gif'
    ]);
        // return in_array("All kinds of Entries Fee.",$request->packagefeatures);
        $package = new package;
            $package->PackageName = $request ->input ('packagename');
            $package->PackageLocation= $request-> input ('packagelocation');
            // $package->PackageType = $request->input('packagetype');
            $package->PackagePrice = $request->input('packageprice');
            $package->PackageFeatures = implode(',', $request->input('packagefeatures'));
            $package->PackageDetails = $request->input('packagedetails');
            $package->Days = $request->input('days');
            $package->Nights = $request->input('nights');
            $package->Popular = $request->input('popular');
            $package->created_by = auth()->user()->id;

        if($request->hasfile('packageimage'))
        {
            $file=$request->file('packageimage');
            $extension = $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('assets/packages',$filename);
            $package->PackageImage = $filename;
        }
        $package->save();
        return redirect()->route('packages.index')->with('success','Package Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
     {
        $package_id = $id;
    $package = package::find($id);
    return view('frontend.package_details', compact(['package','package_id']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
     {

    $package = package::find($id);
    return view('admin.packages.view', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = package::find($id);
         $features_arr = explode(",",$package->PackageFeatures);
        return view('admin.packages.edit', compact('package','features_arr'));
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
       $package = package::find($id);
       $package->PackageName = $request ->input ('packagename');
       $package->PackageLocation= $request-> input ('packagelocation');
    //    $package->PackageType = $request->input('packagetype');
       $package->PackagePrice = $request->input('packageprice');
    //    $package->PackageFeatures = $request->input('packagefeatures');
       $package->PackageFeatures = implode(',', $request->input('packagefeatures'));
       $package->PackageDetails = $request->input('packagedetails');
       $package->Days = $request->input('days');
        $package->Nights = $request->input('nights');
       $package->Popular = $request->input('popular');
       $package->updated_by = auth()->user()->id;

   if($request->hasfile('packageimage'))
   {
      $destination = 'assets/packages/'.$package->PackageImage;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
       $file=$request->file('packageimage');
       $extension = $file->getClientOriginalExtension();
       $filename= time().'.'.$extension;
       $file->move('assets/packages',$filename);
       $package->PackageImage = $filename;
   }
   $package->update();
   return redirect()->route('packages.index')->with('success','Package Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('package_delete_id');
       $package = package::find($id);
       $destination = 'assets/packages/'.$package->PackageImage;
       if(File::exists($destination))
       {
           File::delete($destination);
       }
       $package->delete();
   return redirect()->back()->with('success','Package Deleted Successfully');
    }
}
