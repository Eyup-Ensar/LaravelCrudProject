<?php

namespace App\Http\Controllers;

use App\Models\PanelUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function logout(Request $request)
    {
        Auth::guard('panel')->logout(); // Panel kullanıcıları için çıkış yap
        return redirect()->route('panel.loginForm')->with('status', 'Çıkış başarılı.');
    }
    
    public function loginForm()
    {
        return view('panel.auth.login');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('kulad', 'password');
    
        if (Auth::guard('panel')->attempt($credentials)) {
            // Oturum başarıyla açıldı
            return redirect()->intended(route('panel.home'));
        }
    
        // Giriş başarısız, hata mesajı ile geri dön
        return redirect()->back()->with('error', 'Kullanıcı adı veya şifre hatalı!');
    }

    public function registerForm() {
        return view('panel.auth.register');
    }

    public function register(Request $request)
    {
        // Doğrulama işlemi (validation)
        $request->validate([
            'kulad' => 'required|string|max:255|unique:panel_users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Yeni panel kullanıcısı oluşturma
        $panelUser = PanelUsers::create([
            'kulad' => $request->kulad,
            'password' => bcrypt($request->password), // Şifreyi hashle
        ]);
    
        // Panel oturumu aç (login)
        Auth::guard('panel')->login($panelUser);
    
        // Panel ana sayfasına yönlendir
        return redirect()->route('panel.home');
    }
}
