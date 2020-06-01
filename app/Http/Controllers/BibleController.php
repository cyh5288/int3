<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($book = 19, $chapter = 1)
    {
        $ndx = \App\BibleModel\bindex::all();
        $vers = \App\BibleModel\Btext::where('book',$book)->where('chapter',$chapter)->get();
        return view('Bible.index',compact('ndx', 'book','chapter','vers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $kws1 = $request->kw1;
        $kws2 = $request->kw2;
        if ($kws1 == "")
            return redirect()->route('bible.index');
        if ($kws2 == "") {
            $result = \App\BibleModel\Btext::where('cunp','like', '%'.$kws1.'%')->get();
        } else {
            $result = \App\BibleModel\Btext::where('cunp','like', '%'.$kws1.'%')->where('cunp','like', '%'.$kws2.'%')->get(); 
        }
        $ndx = \App\BibleModel\bindex::all();
       
        $kws = $kws1." ".$kws2;
        // $result = \App\BibleModel\Btext::where('cunp','like', '%'.$kws.'%')->get();
        // echo $result->cunp;
        // echo "<p>";
        // echo $result->niv;
        // dd($result);
        return view('Bible.show2',compact('result'),compact('ndx'))->with('kws', $kws);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
