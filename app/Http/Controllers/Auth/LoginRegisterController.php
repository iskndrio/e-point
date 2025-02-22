<?php

namespace App\Http\Controllers\Auth;

use App\Models\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;


class LoginRegisterController extends Controller {

    public function index() {

        // get data
        $users = User::latest()->paginate(10);

        return view('admin.akun.index', compact('users'));
    }


    public function create() {
        return view('admin.akun.create');
    }
    public function register(){
        return view('auth.register');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
            'usertype' => 'required'
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype
        ]);

        return redirect()->route('akun.index')->with(['success' => 'Data Berhasil Disimpan']);
    }
public function login() {
    return view('auth.login');
}

public function authenticate(Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);


if (Auth::attempt($credentials)) {
    $request->session()->regenerate();
    if ($request->user()->usertype == 'admin') {
        return redirect('admin/dashboard')->withSuccess('You have successfully logged in!');
    }
}

return back()->withErrors([
    'email' => 'Your provided credentials do not match in our records',
])->onlyInput('email');
}

public function logout(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login')->withSuccess('You have logged out successfully');
}

public function update(Request $request, $id): RedirectResponse {
    //validate form
    $validated = $request->validate([
        'name' => 'required|string|max:250',
        'usertype' => 'required'
    ]);

    //get post by ID 
    $datas = User::findOrFail($id);
    //edit akun

    $datas->update([
        'name' => $request->name,
        'usertype' => $request->usertype

    ]);

    //redirect to Index
    return redirect()->route('akun.edit', $id)->with(['success' => 'Data Berhasil Dubah!']);
}

public function updateEmail(Request $request, $id): RedirectResponse {
    //validate form
    $validated = $request->validate([
        'email' => 'required|email|max:250|unique:users'
    ]);

    //get post by ID
    $datas = User::findOrFail($id);
    //edit akun

    $datas->update([
        'email' => $request->email

    ]);
    //redirect to index
    return redirect()->route('akun.edit', $id)->with(['success' => 'Email Berhasil Diubah!']);
}

public function updatePassword(Request $request, $id): RedirectResponse {
    //validate form
    $validated = $request->validate([
        'password' => 'required|min:8|confirmed'
    ]);

    //get post by ID
    $datas = User::findOrFail($id);
    //edit akun

    $datas->update([
        'password' => Hash::make($request->password)

    ]);
    //redirect to index
    return redirect()->route('akun.edit', $id)->with(['success' => 'Password  Berhasil Diubah!']);
}

public function edit($id) {
    $akun = User::findOrFail($id);
    return view('admin.akun.edit', compact('akun'));
}

//Hapus Data 
public function destroy($id): RedirectResponse {
    //cari id siswa 
    $siswa = DB::table('siswas')->where('id_user', $id)->value('id');

    //jika siswa
    if ($siswa) {
        //delete siswa
        $this->destroySiswa($siswa);
    }

    //get post by ID
    $post = User::findOrFail($id);

    //delete post
    $post->delete();

    //redirect to index
    return redirect()->route('akun.index')->with(['succes' => 'Akun berhasil diubah']);
}

public function destroySiswa(string $id) {
    //get id siswa
    $post = Siswa::findOrFail($id);

    //delete image
    Storage::delete('public/siswas/' . $post->image);

    //delete post 
    $post->delete();
}
}