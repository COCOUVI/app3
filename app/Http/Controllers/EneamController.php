<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class EneamController extends Controller
{
    //
    public function AfficherPageIg(){
        $nameStig="flora";
        return view('Eneam.pageIg',[
            
            "Name"=>$nameStig
        ]);
    }
    public function PostPageIg(Request $request){
        if($request->age){
            return  redirect()->route('regist');
         }

    }


    public function AfficherRegister(){
        echo "bienvenu sur la page  d'inscription de l'eneam";
    }
    public function AfficherLogin(){
        echo "bienvenu sur la page  de connexion de l'eneam ";
    }
     public function Showpage(){
        return view('products');
     }
     public function gp(ProductRequest $request){
                Produit::create([
                    'name' => $request->name,
                    'price' => $request->price,
                    'description' => $request->description,
                    'iduser'=>Auth::id(),
                ]);
                return redirect()->back()->with("success","votre produit a été avec succès");

     }
    public function EditProduct(Produit $product){
        return view('edit',[
            'product'=>$product
        ]);
    }
    public function AfficherProduit(){
        $products=Produit::all();
        return view('produits',[
            "products"=>$products
        ]);

    }
    public function update(Produit $product ,ProductRequest $request){
        
        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;
        $product->save();
        return redirect()->back()->with("success","le produit est modifier avec sucess !");
    }
    public function Show(Produit $product){
        return view('showproduct',[
                'product'=>$product

        ]);
    }
    public function Destroy(Produit $product){
        
        $product->delete();
        
        return redirect('/products');


    }
    public function CreateUser(){
        return view("users.register");

    }
    public function SaveUser(User $user,Request $request){  
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect('/login');


    }
    public function ShowLogin(){
           return view('users.login');
    }
    public function PostLogin(Request $request):RedirectResponse{
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/products');
        }
 
        return back()->with('errors','Information de connexion non reconnus');


        
    }
    public function disconnect(Request $request):RedirectResponse{
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        
            return redirect('/products');


        
    }
    public function ShowEmailpage(){
         return view('users.emailpage');

    }
    public function SendEmail(Request $request){
        $request->validate(['email' => 'required|email']);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );
 
        return $status === Password::ResetLinkSent
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);

    }
    public function Showresetpassword($token){
            return view('users.resetpassword',['token' => $token]);
    }
    public function HandleResetpassword(Request $request){

        $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PasswordReset
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);

    }





    



    

}

// Les attaques CSRF exploitent les sessions actives des utilisateurs pour effectuer des actions non autorisées en leur nom.
// En régénérant le jeton de session après la déconnexion, vous invalidez le jeton précédent, ce qui rend impossible pour un attaquant d'utiliser un jeton volé pour effectuer des actions après la déconnexion de l'utilisateur.
// Si un attaquant avait un jeton CSRF valide avant la déconnexion, ce jeton ne sera plus valide après la régénération, ce qui bloque les tentatives d'attaques.

