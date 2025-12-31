<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\AboutController;
use App\Http\Controllers\Landing\ServiceController;
use App\Http\Controllers\Landing\ContactController;
use App\Http\Controllers\Landing\HomeController;
use App\Http\Controllers\Landing\ProduitController;
use App\Http\Controllers\Landing\BlogController;





// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/about',[AboutController::class,'about'])->name('about');
Route::get('/services',[ServiceController::class,'service'])->name('service');
Route::get('/contact',[ContactController::class,'contact'])->name('contact');
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/produit',[ProduitController::class,'produit'])->name('produit');
Route::get('/blog',[BlogController::class,'blog'])->name('blog');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//les routes pour l'authentification avec breeze
require __DIR__.'/auth.php';


//les routes de l'admin 
require __DIR__.'/Admin/admin.php';
require __DIR__.'/Admin/stock.php';
require __DIR__.'/Admin/fournisseur.php';
require __DIR__.'/Admin/produit.php';
require __DIR__.'/Admin/bon.php';
require __DIR__.'/Admin/facture.php';
require __DIR__.'/Admin/materiel.php';
require __DIR__.'/Admin/profil.php';
require __DIR__.'/Admin/transaction.php';
require __DIR__.'/Admin/quincaillerie.php';
require __DIR__.'/Admin/client.php';






//les routes du superadmin
require __DIR__.'/SuperAdmin/superadmin.php';
require __DIR__.'/SuperAdmin/bon.php';
require __DIR__.'/SuperAdmin/facture.php';
require __DIR__.'/SuperAdmin/materiel.php';
require __DIR__.'/SuperAdmin/profil.php';
require __DIR__.'/SuperAdmin/transaction.php';
require __DIR__.'/SuperAdmin/quincaillerie.php';
require __DIR__.'/SuperAdmin/client.php';
require __DIR__.'/SuperAdmin/user.php';
require __DIR__.'/SuperAdmin/stock.php';
require __DIR__.'/SuperAdmin/produit.php';
require __DIR__.'/SuperAdmin/vente.php';
require __DIR__.'/SuperAdmin/newsletter.php';




 


//les routes du client
require __DIR__.'/Client/client.php';
require __DIR__.'/Client/dette.php';
require __DIR__.'/Client/facture.php';
require __DIR__.'/Client/devis.php';
require __DIR__.'/Client/historique.php';
require __DIR__.'/Client/panier.php';
require __DIR__.'/Client/profil.php';