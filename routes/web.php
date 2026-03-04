<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Landing\AboutController;

use App\Http\Controllers\Landing\ServiceController;

use App\Http\Controllers\Landing\ContactController;

use App\Http\Controllers\Landing\HomeController;

use App\Http\Controllers\Landing\ProduitController;

use App\Http\Controllers\Landing\BlogController;

use App\Http\Controllers\Landing\PanierController;


Route::get('/about',[AboutController::class,'about'])->name('about');

Route::get('/services',[ServiceController::class,'service'])->name('service');

Route::get('/contact',[ContactController::class,'contact'])->name('contact');

Route::get('/',[HomeController::class,'home'])->name('home');

Route::get('/produit',[ProduitController::class,'produit'])->name('produit');

Route::get('/blog',[BlogController::class,'blog'])->name('blog');

Route::get('/details/{public_id}/blog',[BlogController::class,'detailsBlog'])->name('detailsblog');


Route::get('/mon_panier',[PanierController::class,'panier'])->name('panier');

Route::post('/panier/add/{public_id}', [PanierController::class, 'add'])->name('cart.add');

Route::patch('/panier/update', [PanierController::class, 'update'])->name('cart.update');   

Route::delete('/panier/remove', [PanierController::class, 'remove'])->name('cart.remove');

Route::get('/panier/clear', [PanierController::class, 'clear'])->name('cart.clear');

Route::post('/commande/valider', [PanierController::class, 'store'])->name('commande.store');

//les routes pour l'authentification avec breeze

require __DIR__.'/auth.php';


//les routes de l'admin 

require __DIR__.'/Admin/admin.php';

require __DIR__.'/Admin/bon.php';

require __DIR__.'/Admin/facture.php';

require __DIR__.'/Admin/materiel.php';

require __DIR__.'/Admin/profil.php';

require __DIR__.'/Admin/transaction.php';

require __DIR__.'/Admin/quincaillerie.php';

require __DIR__.'/Admin/client.php';

require __DIR__.'/Admin/stock.php';

require __DIR__.'/Admin/produit.php';

require __DIR__.'/Admin/vente.php';

require __DIR__.'/Admin/newsletter.php';

require __DIR__.'/Admin/order.php';

require __DIR__.'/Admin/fournisseur.php';

require __DIR__.'/Admin/creance.php';

require __DIR__.'/Admin/demande.php';

require __DIR__.'/Admin/blog.php';

require __DIR__.'/Admin/categorie.php';


//les routes du superadmin

require __DIR__.'/SuperAdmin/superadmin.php';

require __DIR__.'/SuperAdmin/bon.php';

require __DIR__.'/SuperAdmin/facture.php';

require __DIR__.'/SuperAdmin/profil.php';

require __DIR__.'/SuperAdmin/quincaillerie.php';

require __DIR__.'/SuperAdmin/client.php';

require __DIR__.'/SuperAdmin/user.php';

require __DIR__.'/SuperAdmin/stock.php';

require __DIR__.'/SuperAdmin/produit.php';

require __DIR__.'/SuperAdmin/vente.php';

require __DIR__.'/SuperAdmin/newsletter.php';

require __DIR__.'/SuperAdmin/order.php';

require __DIR__.'/SuperAdmin/fournisseur.php';

require __DIR__.'/SuperAdmin/creance.php';

require __DIR__.'/SuperAdmin/demande.php';

require __DIR__.'/SuperAdmin/blog.php';

require __DIR__.'/SuperAdmin/categorie.php';



//les routes du client

require __DIR__.'/Client/client.php';

require __DIR__.'/Client/dette.php';

require __DIR__.'/Client/facture.php';

require __DIR__.'/Client/devis.php';

require __DIR__.'/Client/historique.php';

require __DIR__.'/Client/profil.php';