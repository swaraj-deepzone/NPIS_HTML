<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getUsers(Request $request)
    {
        try {
            
            $users = \App\Models\User::
            with(['jawatan'=> function ($query) {
                $query->select('id', 'nama_jawatan');
            }])
            ->with(['jabatan'=> function ($query) {
                $query->select('id', 'nama_jabatan');
            }])
            ->with(['agensi'=> function ($query) {
                $query->select('id', 'nama_agensi');
            }])
            ->with(['bahagian'=> function ($query) {
                $query->select('id', 'nama_bahagian');
            }])
            ->with(['daerah'=> function ($query) {
                $query->select('id', 'nama_daerah');
            }])
            ->with(['gredJawatan'=> function ($query) {
                $query->select('id', 'nama_gred_jawatan');
            }])
            ->with(['jenisPengguna'=> function ($query) {
                $query->select('id', 'nama_jenis_pengguna');
            }])
            ->with(['negeri'=> function ($query) {
                $query->select('id', 'nama_negeri');
            }])
            ->get();
            return response()->json([
                'code' => '200',
                'status' => 'Success',
                'data' => $users,
            ]);
        } catch (\Throwable $th) {
            logger()->error($th->getMessage());

            return response()->json([
                'code' => '500',
                'status' => 'Failed',
                'error' => $th,
            ]);
        }
    }

    public function getTempUsers(Request $request)
    {
        try {
            
            $users = \App\Models\tempUser::
            with(['jawatan'=> function ($query) {
                $query->select('id', 'nama_jawatan');
            }])
            ->with(['jabatan'=> function ($query) {
                $query->select('id', 'nama_jabatan');
            }])
            ->with(['agensi'=> function ($query) {
                $query->select('id', 'nama_agensi');
            }])
            ->with(['bahagian'=> function ($query) {
                $query->select('id', 'nama_bahagian');
            }])
            ->with(['daerah'=> function ($query) {
                $query->select('id', 'nama_daerah');
            }])
            ->with(['gredJawatan'=> function ($query) {
                $query->select('id', 'nama_gred_jawatan');
            }])
            ->with(['jenisPengguna'=> function ($query) {
                $query->select('id', 'nama_jenis_pengguna');
            }])
            ->with(['negeri'=> function ($query) {
                $query->select('id', 'nama_negeri');
            }])
            ->get();
            return response()->json([
                'code' => '200',
                'status' => 'Success',
                'data' => $users,
            ]);
        } catch (\Throwable $th) {
            logger()->error($th->getMessage());

            return response()->json([
                'code' => '500',
                'status' => 'Failed',
                'error' => $th,
            ]);
        }
    }

    public function createUser(Request $request)
    {
        try {
            $validated = $this->validator($request->all())->validate();

            if($validated) {

                $user = $this->createData($request->all());

                return response()->json([
                    'code' => '200',
                    'status' => 'Sucess',
                    'data' => $user,
                ]);
            }else {
                return response()->json([
                    'code' => '422',
                    'status' => 'Unprocessable Entity',
                    'data' => $validated,
                ]);
            }

        } catch (\Throwable $th) {
            logger()->error($th->getMessage());

            return response()->json([
                'code' => '500',
                'status' => 'Failed',
                'error' => $th,
            ]);
        }        

    }

    public function userDetails($id)
    {
        try {
            //code...
            $user = \App\Models\User::whereId($id)
            ->with(['jawatan'=> function ($query) {
                $query->select('id', 'nama_jawatan');
            }])
            ->with(['jabatan'=> function ($query) {
                $query->select('id', 'nama_jabatan');
            }])
            ->with(['agensi'=> function ($query) {
                $query->select('id', 'nama_agensi');
            }])
            ->with(['bahagian'=> function ($query) {
                $query->select('id', 'nama_bahagian');
            }])
            ->with(['daerah'=> function ($query) {
                $query->select('id', 'nama_daerah');
            }])
            ->with(['gredJawatan'=> function ($query) {
                $query->select('id', 'nama_gred_jawatan');
            }])
            ->with(['jenisPengguna'=> function ($query) {
                $query->select('id', 'nama_jenis_pengguna');
            }])
            ->with(['negeri'=> function ($query) {
                $query->select('id', 'nama_negeri');
            }])->first();
            return response()->json([
                'code' => '200',
                'status' => 'Sucess',
                'data' => $user,
            ]);

        } catch (\Throwable $th) {
            logger()->error($th->getMessage());

            return response()->json([
                'code' => '500',
                'status' => 'Failed',
                'error' => $th,
            ]);
        }
    }

    public function firstResetUpdate(Request $request)
    {
        //
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'])->validate();
        
        $user = Auth::user();
        
        $user->password = Hash::make($request->password);

        $user->setRememberToken(Str::random(60));

        $user->first_time = 0;

        $user->save();

        //event(new PasswordReset($user));

        Auth::guard()->login($user);
        
        return redirect()->route('home');
    }    

    /**
     * Approve user registration
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userApproval($id)
    {
        //
        $tempUser = \App\Models\tempUser::whereId($id)->first();
        
        User::create([
            'name' => $tempUser->name,
            'email' => $tempUser->email,
            'password' => $tempUser->password,
            'no_ic' => $tempUser->no_ic,          
            'jenis_pengguna_id' => $tempUser->jenis_pengguna_id,
            'no_telefon' => $tempUser->no_telefon,
            'jawatan_id' => $tempUser->jawatan_id,
            'jabatan_id' => $tempUser->jabatan_id,
            'gred_jawatan_id' => $tempUser->gred_jawatan_id,
            //'kementerian' => $tempUser->kementerian,
            'bahagian_id' => $tempUser->bahagian_id,
            'negeri_id' => $tempUser->negeri_id,
            'daerah_id' => $tempUser->daerah_id,
            'catatan' => $tempUser->catatan,
            'first_time' => $tempUser->first_time,
            'status_pengguna_id' => $tempUser->status_pengguna_id,
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dibuat_oleh' => Auth::user()->id,
            'dikemaskini_pada' => Auth::user()->id,
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $tempUser->delete();
        session()->flash('message', 'Approval for User Berjaya.'); 

        return redirect('home');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_kod_penganalan' => ['required', 'string',  'max:255'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
            'kategori' => ['required', 'integer', 'max:255'],
            'no_telefon' => ['required', 'string', 'max:255'],
            'jawatan' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'gred' => ['required', 'string', 'max:255'],
            'kementerian' => ['required', 'integer', 'max:255'],
            'bahagian' => ['required', 'integer', 'max:255'],
            'negeri' => ['required', 'integer', 'max:255'],
            'daerah' => ['required', 'integer', 'max:255']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function createData(array $data)
    {
        return User::create([
            'name' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make('password'),
            'no_ic' => $data['no_kod_penganalan'],            
            'jenis_pengguna_id' => $data['kategori'],
            'no_telefon' => $data['no_telefon'],
            'jawatan_id' => $data['jawatan'],
            'jabatan_id' => $data['jabatan'],
            'gred_jawatan_id' => $data['gred'],
            //'kementerian' => $data['kementerian'],
            'bahagian_id' => $data['bahagian'],
            'negeri_id' => $data['negeri'],
            'daerah_id' => $data['daerah'],
            'catatan' => $data['catatan'],
            'dibuat_pada' => Carbon::now()->format('Y-m-d H:i:s'),
            'dikemaskini_pada' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
