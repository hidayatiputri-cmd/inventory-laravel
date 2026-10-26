use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Rute utama mengarah ke Dashboard
Route::get('/', [ProductController::class, 'dashboard'])->name('dashboard');

// Resource Route untuk CRUD Produk
Route::resource('products', ProductController::class);