<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassSchedules;
use Yajra\Datatables\Datatables;
use App\Http\Requests\ClassSchedulesRequest;

class ClassSchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('templates/classSchedule');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassScheduleRequest $request)
    {
        try {
            $data = (new ClassSchedules)->fill($request->all());
            if($data->save()){
                $answer=array(
                    "datos" => $request->all(),
                    "code" => 200
                ); 
            }  else{
                $answer=array(
                    "error" => 'Error al intentar registrar.',
                    "code" => 600
                );
            }
            return $answer;
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassScheduleRequest $request, $id)
    {
        try {
            // if ($request->ajax()) {
                $data = ClassSchedules::findOrFail($id);
                $data->update($request->all());
                if($data->save()){
                    $answer=array(
                        "datos" => $request->all(),
                        "code" => 200
                    ); 
                }else{
                    $answer=array(
                        "error" => 'Error al intentar actualizar.',
                        "code" => 600
                    );
                } 
                return $answer;
        } catch (Exception $e) {
            return $e->error;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ClassSchedules::findOrFail($id);
        $now = new \DateTime();
        $data->deleted_at = $now->format('Y-m-d H:i:s');
        $data->save();
    }
    /**
     * Obtener todos los registros de la tabla
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $data = ClassSchedules::select(['id', 'date','time','quotas','users_id'])->where('deleted_at', '=', NULL);
        return Datatables::of($data)->make(true);
    }
    /**
     * Restaura registro eliminado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $data = ClassSchedules::findOrFail($id);
        $data->deleted_at = NULL;
        $data->save();
    }
}
