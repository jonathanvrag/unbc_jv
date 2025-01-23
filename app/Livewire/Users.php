<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Users extends Component
{
    public $users, $name, $last_name, $email, $phone_number, $password, $user_id;
    public $modal = false;
    public $showUsers = false;

    protected $listeners = ['showUsers' => 'show'];

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.users');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->password = '';
        $this->openModal();
    }

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->last_name = '';
        $this->email = '';
        $this->phone_number = '';
        $this->password = '';
        $this->user_id = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|regex:/^\d{10}$/',
            'password' =>  [
                'nullable',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[-@$!%*?&#]/',
            ],
        ]);

        User::create([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'password' => $this->password,
        ]);

        session()->flash('message', 'Usuario creado.');

        $this->closeModal();
        $this->resetInputFields();
        $this->loadUsers();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user_id . ',id',
            'phone_number' => 'required|regex:/^\d{10}$/',
            'password' => [
                'nullable',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[-@$!%*?&#]/',
            ],
        ]);

        $user = User::findOrFail($this->user_id);

        $data = [
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
        ];

        if ($this->password) {
            $data['password'] = $this->password;
        }

        $user->update($data);


        session()->flash('message', 'Usuario actualizado.');

        $this->closeModal();
        $this->resetInputFields();
        $this->loadUsers();
    }

    private function fillUserData($user)
    {
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->fillUserData($user);
        $this->openModal();
    }

    public function delete($id)
    {
        try {
            User::find($id)->delete();
            session()->flash('message', 'Usuario eliminado.');
            $this->loadUsers();
        } catch (\Exception $e) {
            session()->flash('error', 'Error al eliminar el usuario. Por favor, inténtalo de nuevo más tarde.');
            Log::error($e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
