<?php

namespace App\Http\Controllers;

use App\Helpers\formatAPI;
use App\Models\Ktp;
use Exception;
use Illuminate\Http\Request;

class KtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ktp::all();

        if ($data){
            return formatAPI::createAPI(200,'Success',$data);
        }else{
            return formatAPI::createAPI(400,'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            //untuk create data ke database
            $ktp = Ktp::create($request->all());

            //get data ktp 
            $data = Ktp::where('id_ktp','=',$ktp->id_ktp)->get();

            //check data id_ktp valid? return data :failed 
            if($data){
                return formatAPI::createAPI(200,'Success',$data);
            }
            else{
                return formatAPI::createAPI(400,'Failed');
    
            }
        }catch(Exception $error){
            return formatAPI::createAPI(400,'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_ktp)
    {
        try{
            $data = Ktp::where('id_ktp',"=",$id_ktp)->first();
            if($data){
                return formatAPI::createAPI(200,'Success',$data);
            }else{
                return formatAPI::createAPI(400,'Failed');
            }
        }catch(Exception $error){
            return formatAPI::createAPI(400, 'Failed', $error);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ktp)
    {
        try{
            $ktp = Ktp::findorfail($id_ktp);
            $ktp->update($request->all());

            $data = Ktp::where('id',"=",$ktp->$id_ktp)->get();
            if($data){
                return formatAPI::createAPI(200,'Success',$data);
            }else{
                return formatAPI::createAPI(400,'Failed');
            }
        }catch(Exception $error){
            return formatAPI::createAPI(400, 'Failed', $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ktp)
    {
        try{
            $ktp = Ktp::findorfail($id_ktp);

            $data = $ktp->delete();
            if($data){
                return formatAPI::createAPI(200,'Success',$data);
            }else{
                return formatAPI::createAPI(400,'Failed');
            }
        }catch(Exception $error){
            return formatAPI::createAPI(400, 'Failed', $error);
        }
    }
}
