        <?php

        use Illuminate\Support\Facades\Route;
        use App\Http\Controllers\AdminController;
        use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
        use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
        use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
        use App\Http\Controllers\Frontend\WelcomeController;
        use App\Http\Controllers\MenuController;
        use App\Http\Controllers\ProfileController;
        use App\Http\Controllers\ReservationController;
        use App\Http\Controllers\TableController;

        /*
        |--------------------------------------------------------------------------
        | Web Routes
        |--------------------------------------------------------------------------
        |
        | Here is where you can register web routes for your application. These
        | routes are loaded by the RouteServiceProvider and all of them will
        | be assigned to the "web" middleware group. Make something great!
        |
        */

        Route::get('/', [WelcomeController::class, 'index'])->name('welcome');


        // cart 
        Route::post('cart/{id}',[CartController::class,'addToCart'])->name('cart.addToCart');
        Route::get('cart',[CartController::class,'show'])->name('cart.show');
        Route::delete('cart/{id}',[CartController::class,'removeItemFromCart'])->name('cart.remove');

        // payment 
        Route::get('payment',[PaymentController::class,'paymentform'])->name('payment.form');

        // categories
        Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');

        Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');

        // reservations
        Route::get('reservations/step-one', [FrontendReservationController::class, 'stepOne'])->name('reservations.step.one');
        Route::post('reservations/step-one', [FrontendReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
        Route::get('reservations/step-two', [FrontendReservationController::class, 'stepTwo'])->name('reservations.step.two');
        Route::post('reservations/step-two', [FrontendReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');
        Route::get('reservations', [FrontendReservationController::class, 'reservations'])->name('reservations');
        Route::delete('/reservations/{reservation}', [FrontendReservationController::class, 'cancel'])->name('reservations.cancel');

        Route::get('thankyou', [WelcomeController::class, 'thankYou'])->name('thankYou');

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');


        Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {

            Route::get('/', [AdminController::class, 'index'])->name('index');
            Route::resource('menus', MenuController::class);
            Route::resource('categories', CategoryController::class);
            Route::resource('tables', TableController::class);
            Route::resource('reservations', ReservationController::class);
        });


        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        require __DIR__ . '/auth.php';
