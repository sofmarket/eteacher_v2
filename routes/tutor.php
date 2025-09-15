<?php

use App\Http\Controllers\Tutor\ChatsController;
use App\Http\Controllers\Tutor\CouponsController;
use App\Http\Controllers\Tutor\DisputesController;
use App\Http\Controllers\Tutor\HomeController;
use App\Http\Controllers\Tutor\IdentityVerificationController;
use App\Http\Controllers\Tutor\InvoicesController;
use App\Http\Controllers\Tutor\PayoutsController;
use App\Http\Controllers\Tutor\ProfileController;
use App\Http\Controllers\Tutor\ProfileEducationController;
use App\Http\Controllers\Tutor\ProfileExperienceController;
use App\Http\Controllers\Tutor\ProfileCertificateController;
use App\Http\Controllers\Tutor\UserSubjectController;
use App\Http\Controllers\Tutor\UserSubjectSortOrderController;
use App\Http\Controllers\Tutor\UserSubjectGroupController;
use App\Http\Controllers\Tutor\UserSubjectGroupSortOrderController;
use App\Http\Controllers\Tutor\UserSubjectSlotController;
use App\Http\Controllers\Tutor\SlotBookingsController;
use App\Http\Controllers\Tutor\UpdatePasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::post('/profile/update-password', UpdatePasswordController::class)->name('profile.update-password');

Route::post('/profile/education', [ProfileEducationController::class, 'store'])->name('profile.education.store');
Route::put('/profile/education/{education}', [ProfileEducationController::class, 'update'])->name('profile.education.update');
Route::delete('/profile/education/{education}', [ProfileEducationController::class, 'destroy'])->name('profile.education.destroy');

Route::post('/user/subject-group/update-sort-order', UserSubjectGroupSortOrderController::class)->name('user.subject.group.update_sort_order');

Route::get('bookings/teached-subjects', [UserSubjectGroupController::class, 'index'])->name('bookings.teached-subjects');
Route::get('bookings/manage-sessions', [UserSubjectSlotController::class, 'index'])->name('bookings.manage-sessions');
Route::get('bookings/upcoming-bookings', [SlotBookingsController::class, 'index'])->name('bookings.upcoming-bookings');

Route::post('/user/subject-group', [UserSubjectGroupController::class, 'store'])->name('user.subject.group.store');
Route::delete('/user/subject-group/{group}', [UserSubjectGroupController::class, 'destroy'])->name('user.subject.group.destroy');


Route::post('/user/subjects/update-sort-order', UserSubjectSortOrderController::class)->name('user.subject.update_sort_order');

Route::post('/user/subject', [UserSubjectController::class, 'store'])->name('user.subject.store');
Route::put('/user/subject/{subject}', [UserSubjectController::class, 'update'])->name('user.subject.update');
Route::delete('/user/subject/{subject}', [UserSubjectController::class, 'destroy'])->name('user.subject.destroy');

// User Subject Slots (Sessions) Routes
Route::post('/user/subject/slots', [UserSubjectSlotController::class, 'store'])->name('user.subject.slots.store');
Route::get('/user/subject/slots/{slot}', [UserSubjectSlotController::class, 'show'])->name('user.subject.slots.show');
Route::get('/user/subject/slots/{slot}/edit', [UserSubjectSlotController::class, 'edit'])->name('user.subject.slots.edit');
Route::put('/user/subject/slots/{slot}', [UserSubjectSlotController::class, 'update'])->name('user.subject.slots.update');
Route::delete('/user/subject/slots/{slot}', [UserSubjectSlotController::class, 'destroy'])->name('user.subject.slots.destroy');
Route::get('/user/subject/slots/by-subject', [UserSubjectSlotController::class, 'getSlotsBySubject'])->name('user.subject.slots.by-subject');


Route::get('/profile/experience', [ProfileExperienceController::class, 'index'])->name('profile.experience');
Route::post('/profile/experience', [ProfileExperienceController::class, 'store'])->name('profile.experience.store');
Route::put('/profile/experience/{experience}', [ProfileExperienceController::class, 'update'])->name('profile.experience.update');
Route::delete('/profile/experience/{experience}', [ProfileExperienceController::class, 'destroy'])->name('profile.experience.destroy');

Route::get('/profile/certificate', [ProfileCertificateController::class, 'index'])->name('profile.certificate');
Route::post('/profile/certificate', [ProfileCertificateController::class, 'store'])->name('profile.certificate.store');
Route::put('/profile/certificate/{certificate}', [ProfileCertificateController::class, 'update'])->name('profile.certificate.update');
Route::delete('/profile/certificate/{certificate}', [ProfileCertificateController::class, 'destroy'])->name('profile.certificate.destroy');

Route::post('/profile/identity_verification', IdentityVerificationController::class)->name('profile.identity_verification');

Route::get('/invoices', [InvoicesController::class, 'index'])->name('invoices.index');

Route::get('/chats', [ChatsController::class, 'index'])->name('chats');

Route::get('/coupons', [CouponsController::class, 'index'])->name('coupons');

Route::get('/disputes', [DisputesController::class, 'index'])->name('disputes');
Route::get('/disputes/{dispute}', [DisputesController::class, 'show'])->name('disputes.show');
Route::post('/disputes', [DisputesController::class, 'store'])->name('disputes.store');

Route::get('/payouts', [PayoutsController::class, 'index'])->name('payouts');
