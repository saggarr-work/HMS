<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Employee;
use App\Models\Meal;
use App\Models\MealDeposit;
use App\Models\MealRate;
use App\Models\Member;
use App\Models\OtherExpense;
use App\Models\Payment;
use App\Models\PaymentStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function addPayment()
    {
        return view('backend.payment.index');
    }

    public function calculatePayment(Request $request)
    {
        // validation
        $this->validate($request, [
            'month_year' => 'required|date_format:Y-m',
        ]);

        $selectedMonthYear = $request->input('month_year');

        // Fetch bills and other expenses for the selected month and year
        $bills = Bill::where('month_year', 'like', "{$selectedMonthYear}%")->first();
        $others = OtherExpense::where('month_year', 'like', "{$selectedMonthYear}%")->first();
        $mealDeposits = MealDeposit::all();
        $employee = Employee::all();

        // Check if records are found for the selected month and year
        if (!$bills || $mealDeposits->isEmpty()) {
            return back()->with('error-msg', 'No records found for the selected month and year');
        }

        $members = Member::all();
        $countMembers = count($members);

        // employee salary calculation
        $employeeSalaries = $employee->pluck('employeeDesignation.designation_salary')->toArray();
        $employeeSalary = array_sum($employeeSalaries);
        $memberWiseEmoloyeeSalary = $employeeSalary / $countMembers;

        // Fetch meal rate for the selected month and year
        $mealRate = MealRate::where('month_year', 'like', "{$selectedMonthYear}%")->first();

        // Fetch member-wise meals for the selected month and year
        $memberWiseMeals = Meal::where('month_year', 'like', "{$selectedMonthYear}%")->get();

        $otherExpenseAmount = 0;

        if ($others) {
            $otherExpenseAmount = $others->other_expense_amount;
        }

        $totalBill = ($bills->electric_bill + $bills->gas_bill + $bills->water_bill + $bills->internet_bill + $bills->dish_bill) + $otherExpenseAmount;

        
        
        // Calculate the service charge per member
        $serviceCharge = $totalBill / $countMembers;

        // Check if payment records already exist for the selected month and year
        $existingPayments = Payment::where('month_year', $selectedMonthYear)->get();

        if ($existingPayments->isNotEmpty()) {
            return back()->with('error-msg', 'Payment records already exist for the selected month and year');
        }

        // Loop through member-wise meals and create payment records
        foreach ($memberWiseMeals as $memberWiseMeal) {
            $depositsSum = $mealDeposits
                ->where('member_id', $memberWiseMeal->member_id)
                ->filter(function ($mealDeposit) use ($selectedMonthYear) {
                    // Compare the month and year components only
                    return Carbon::parse($mealDeposit->deposit_date)->format('Y-m') === $selectedMonthYear;
                })
                ->sum('deposit_amount');

            // Check if meal rate is calculated
            if (!$mealRate) {
                return back()->with('warning-msg', 'Meal rate not calculated for the selected month and year. Calculate it first');
            }

            $mealExpense = ($memberWiseMeal->total_meal * $mealRate->meal_rate);

            $mealBalance = $depositsSum - $mealExpense;

            if ($mealBalance >= 0) {
                // If $mealBalance is positive, subtract it
                $payableAmount = $mealBalance - ($serviceCharge + $memberWiseMeal->member->seat->room->seat_rent + $memberWiseEmoloyeeSalary);
            } else {
                // If $mealBalance is negative, add its absolute value
                $payableAmount = abs($mealBalance) + ($serviceCharge + $memberWiseMeal->member->seat->room->seat_rent + $memberWiseEmoloyeeSalary);
            }

            $payment = new Payment();
            $payment->month_year = $selectedMonthYear;
            $payment->electric_bill = $bills->electric_bill;
            $payment->gas_bill = $bills->gas_bill;
            $payment->water_bill = $bills->water_bill;
            $payment->internet_bill = $bills->internet_bill;
            $payment->dish_bill = $bills->dish_bill;
            $payment->other_expense = $otherExpenseAmount;
            $payment->total_bill = $totalBill;
            $payment->total_members = $countMembers;
            $payment->member_id = $memberWiseMeal->member_id;
            $payment->total_meal = $memberWiseMeal->total_meal;
            $payment->meal_rate = $mealRate->meal_rate;
            $payment->meal_expense = $mealExpense;
            $payment->meal_deposit = $depositsSum;
            $payment->meal_balance = $mealBalance;
            $payment->service_charge = $serviceCharge;
            $payment->seat_rent = $memberWiseMeal->member->seat->room->seat_rent;
            $payment->employee_salary = $employeeSalary;
            $payment->member_wise_employee_salary = $memberWiseEmoloyeeSalary;
            $payment->payable_amount = abs($payableAmount); // with negative
            $payment->save();
        }

        return back()->with('msg', 'Payment records added successfully');
    }

    public function managePayment(){
        $payments = Payment::all();
        $paymentStatus = PaymentStatus::all();
        return view('backend.payment.manage', compact('payments', 'paymentStatus'));
    }

    public function showPayment(string $id){
        $payment = Payment::find($id);
        return view('backend.payment.show', compact('payment'));
    }
}
