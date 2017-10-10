<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Yajra\DataTables\Facades\DataTables;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('templates/user', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try{
            User::create($request->all());
            $answer=array(
                "datos" => $request->all(),
                "code" => 200
            );
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
    public function update(UserRequest $request, $id)
    {
        try {
            $data = User::findOrFail($id);
            $data->update($request->all());
            $answer=array(
                "datos" => $request->all(),
                "code" => 200
            );
            return $answer;
            
        } catch (Exception $e) {
            return $e;
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
        $data = User::findOrFail($id);
        $data->delete();
    }
    /**
     * Actualiza el campo deleted_at del registro seleccionado.
     *
     * @param  int  $id
     * @param  boolean  $deleteLogical
     * @return \Illuminate\Http\Response
     */
    public function delete($id,$logical)
    {
        
        if(isset($logical) and $logical == 'true'){
            $data = User::findOrFail($id);
            $now = new \DateTime();
            $data->deleted_at =$now->format('Y-m-d H:i:s');
            if($data->save()){
                    $answer=array(
                    "datos" => 'Eliminación exitosa.',
                    "code" => 200
                ); 
            }  else{
                $answer=array(
                    "error" => 'Error al intentar Eliminar el registro.',
                    "code" => 600
                );
            }          
                
                return $answer;
        }else{
            $this->destroy($id);
        }
    }
    /**
     * Obtener todos los registros de la tabla
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $data = User::select(['id','name', 'email', 'password', 'phone', 'identification_card', 'pay','premium'])->where('deleted_at', '=', NULL);
        return Datatables::of($data)->make(true);
    }
    /**
     * Obtener todos los registros de la tabla
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeState(Request $request)
    {
        $id = $request->id;
        $data = User::findOrFail($id);
        if ($data->pay == 0) {
            $data->pay = 1;
        }else{
            $data->pay = 0;
        }
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
    }

    /**
     * Restaura registro eliminado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $data = User::findOrFail($id);
        $data->deleted_at = NULL;
        $data->save();
    }
}
