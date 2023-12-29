<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDesignationController;
use App\Http\Controllers\GroceryController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\MealDepositController;
use App\Http\Controllers\MealRateController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OtherExpenseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SeatController;
use App\Models\MealDeposit;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('backend.home.home');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/', [BackendController::class, 'index'])->name('dashboard');
    
    // routes for member
    Route::get('/member/add', [MemberController::class, 'addMember'])->name('member.add');
    Route::post('/member/add', [MemberController::class, 'storeMember'])->name('member.store');
    Route::get('/member/manage', [MemberController::class, 'manageMember'])->name('member.manage');
    Route::get('/member/{id}/show', [MemberController::class, 'showMember'])->name('member.show');
    Route::get('/member/{id}/edit', [MemberController::class, 'editMember'])->name('member.edit');
    Route::post('/member/{id}/update', [MemberController::class, 'updateMember'])->name('member.update');
    Route::post('/member/{id}/delete', [MemberController::class, 'deleteMember'])->name('member.delete');

    // routes for room
    Route::get('/room/add', [RoomController::class, 'addRoom'])->name('room.add');
    Route::post('/room/add', [RoomController::class, 'storeRoom'])->name('room.store');
    Route::get('/room/manage', [RoomController::class, 'manageRoom'])->name('room.manage');
    Route::get('/room/{id}/edit', [RoomController::class, 'editRoom'])->name('room.edit');
    Route::post('/room/{id}/update', [RoomController::class, 'updateRoom'])->name('room.update');
    Route::post('/room/{id}/delete', [RoomController::class, 'deleteRoom'])->name('room.delete');

    // routes for seat
    Route::get('/seat/add', [SeatController::class, 'alocateSeat'])->name('seat.alocate');
    Route::post('/seat/add', [SeatController::class, 'storeAlocatedSeat'])->name('store.seat.alocated');
    Route::get('/seat/{id}/edit', [SeatController::class, 'editAlocatedSeat'])->name('edit.seat.alocated');
    Route::post('/seat/{id}/delete', [SeatController::class, 'deleteAlocatedSeat'])->name('delete.seat.alocated');

    // routes for meal deposit
    Route::get('/deposit/meal', [MealDepositController::class, 'addMealDeposit'])->name('mealDeposit.add');
    Route::post('/deposit/meal', [MealDepositController::class, 'storeMealDeposit'])->name('mealDeposit.store');
    Route::get('/edit/deposit/{id}/meal', [MealDepositController::class, 'editMealDeposit'])->name('mealDeposit.edit');
    Route::post('/update/deposit/{id}/meal', [MealDepositController::class, 'updateMealDeposit'])->name('mealDeposit.update');
    Route::post('/delete/deposit/{id}/meal', [MealDepositController::class, 'deleteMealDeposit'])->name('mealDeposit.delete');

    // routes for employee
    Route::get('/employee/add', [EmployeeController::class, 'addEmployee'])->name('employee.add');
    Route::post('/employee/add', [EmployeeController::class, 'storeEmployee'])->name('employee.store');
    Route::get('/employee/manage', [EmployeeController::class, 'manageEmployee'])->name('employee.manage');
    Route::get('/employee/{id}/show', [EmployeeController::class, 'showEmployee'])->name('employee.show');
    Route::get('/employee/{id}/edit', [EmployeeController::class, 'editEmployee'])->name('employee.edit');
    Route::post('/employee/{id}/update', [EmployeeController::class, 'updateEmployee'])->name('employee.update');
    Route::post('/employee/{id}/delete', [EmployeeController::class, 'deleteEmployee'])->name('employee.delete');

    // routes for employee designation
    Route::get('/designation/add', [EmployeeDesignationController::class, 'addDesignation'])->name('designation.add');
    Route::post('/designation/add', [EmployeeDesignationController::class, 'storeDesignation'])->name('designation.store');
    Route::get('/designation/{id}/edit', [EmployeeDesignationController::class, 'editDesignation'])->name('designation.edit');
    Route::post('/designation/{id}/edit', [EmployeeDesignationController::class, 'updateDesignation'])->name('designation.update');
    Route::post('/designation/{id}/delete', [EmployeeDesignationController::class, 'deleteDesignation'])->name('designation.delete');

    // routes for meal
    Route::get('/meal/add', [MealController::class, 'addMeal'])->name('meal.add');
    Route::post('/meal/add', [MealController::class, 'storeMeal'])->name('meal.store');
    Route::get('/meal/manage', [MealController::class, 'manageMeal'])->name('meal.manage');
    Route::get('/meal/{id}/edit', [MealController::class, 'editMeal'])->name('meal.edit');
    Route::post('/meal/{id}/update', [MealController::class, 'updateMeal'])->name('meal.update');
    Route::post('/meal/{id}/delete', [MealController::class, 'deleteMeal'])->name('meal.delete');

    // routes for grocery
    Route::get('/grocery/add', [GroceryController::class, 'addGrocery'])->name('grocery.add');
    Route::post('/grocery/add', [GroceryController::class, 'storeGrocery'])->name('grocery.store');
    Route::get('/grocery/manage', [GroceryController::class, 'manageGrocery'])->name('grocery.manage');
    Route::get('/grocery/{id}/show', [GroceryController::class, 'showGrocery'])->name('grocery.show');
    Route::get('/grocery/{id}/edit', [GroceryController::class, 'editGrocery'])->name('grocery.edit');
    Route::post('/grocery/{id}/update', [GroceryController::class, 'updateGrocery'])->name('grocery.update');
    Route::post('/grocery/{id}/delete', [GroceryController::class, 'deleteGrocery'])->name('grocery.delete');

    // routes for bills
    Route::get('/bill/add', [BillController::class, 'addBill'])->name('bill.add');
    Route::post('/bill/add', [BillController::class, 'storeBill'])->name('bill.store');
    Route::get('/bill/manage', [BillController::class, 'manageBill'])->name('bill.manage');
    Route::get('/bill/{id}/show', [BillController::class, 'showBill'])->name('bill.show');
    Route::get('/bill/{id}/edit', [BillController::class, 'editBill'])->name('bill.edit');
    Route::post('/bill/{id}/update', [BillController::class, 'updateBill'])->name('bill.update');
    Route::post('/bill/{id}/delete', [BillController::class, 'deleteBill'])->name('bill.delete');

    // routes for other expense
    Route::get('/other/expense/add', [OtherExpenseController::class, 'addOtherExpense'])->name('otherExpense.add');
    Route::post('/other/expense/add', [OtherExpenseController::class, 'storeOtherExpense'])->name('otherExpense.store');
    Route::get('/other/expense/manage', [OtherExpenseController::class, 'manageOtherExpense'])->name('otherExpense.manage');
    Route::get('/other/expense/{id}/show', [OtherExpenseController::class, 'showOtherExpense'])->name('otherExpense.show');
    Route::get('/other/expense/{id}/edit', [OtherExpenseController::class, 'editOtherExpense'])->name('otherExpense.edit');
    Route::post('/other/expense/{id}/update', [OtherExpenseController::class, 'updateOtherExpense'])->name('otherExpense.update');
    Route::post('/other/expense/{id}/delete', [OtherExpenseController::class, 'deleteOtherExpense'])->name('otherExpense.delete');

    // routes for meal-rate
    Route::get('/meal-rate/add', [MealRateController::class, 'addMealRate'])->name('meal-rate.add');
    Route::post('/meal-rate/calculate', [MealRateController::class, 'calculateMealRate'])->name('meal-rate.calculate');
    Route::post('/meal-rate/store', [MealRateController::class, 'storeMealRate'])->name('meal-rate.store');
    Route::get('/meal-rate/manage', [MealRateController::class, 'manageMealRate'])->name('meal-rate.manage');
    Route::get('/meal-rate/{id}/show', [MealRateController::class, 'showMealRate'])->name('meal-rate.show');

    // routes for payment
    Route::get('/payment/add', [PaymentController::class, 'addPayment'])->name('payment.add');
    Route::post('/payment/calculate', [PaymentController::class, 'calculatePayment'])->name('payment.calculate');
});
