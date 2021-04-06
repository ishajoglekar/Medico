<?php

use App\Coupon;
use App\Doctor;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\HomeController;
use App\Product;
use App\User;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*Header Routes*/

Route::get('/', function () {
    $section = 'consult';
    return view('home.index', compact([
        'section'
    ]));
})->name('index');



//User Routes
Route::post('user/address', 'AddressController@store')->name('users.address');
Route::get('/doctors', function () {
    $doctors = Doctor::orderBy('fees', 'asc')->get();
    $section = 'doctors';
    return view('user.findDoctor.doctors', compact([
        'doctors',
        'section'
    ]));
})->name('doctors.findDoctors');

Route::get('/pharma', function () {
    $products = Product::where('status', 'accept')->get()->take(5);

    $section = 'pharma';
    return view('user.pharma.index', compact([
        'section', 'products'
    ]));
})->name('pharma.index');


/*End of Header Routes*/


Route::get('/user/consult', 'User\UsersController@createChatAppointment')->name('users.chatAppointment');
Route::post('/user/consult/bookAppointment', 'User\UsersController@bookChatAppointment')->name('users.bookChatAppointment');

Route::post('/user/consult/checkChatAppointment', 'User\UsersController@checkChatBookedAppointment')->name('users.checkChatBookedAppointment');


Route::get('/pharma/single-product', function () {
    return view('user.pharma.single_product');
});

Route::get('/order/cart', 'CartController@index');
// Route::get('/order/checkout', function () {
//     return view('pharma.dashboard.cart.checkout');
// });
Route::get('/order/checkout', 'CartController@checkout')->name('cart.checkout');

// Route::get('/order/checkout', function () {
//     return view('pharma.dashboard.cart.checkout');
// });

Route::resource('doctor', 'User\DoctorsController');
Route::post('user\getCurrentLocation', 'User\UsersController@getCurrentLocation')->name('ajax.getCurrentLocation');
Route::post('doctor\getDoctors', 'User\DoctorsController@getDoctors')->name('ajax.getDoctors');

/*Login controller routes*/

Auth::routes();

Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/getotp', 'Auth\RegisterController@generateMessage')->name('register.sendotp');
Route::post('/getotpforuser', 'Auth\RegisterController@generateMessageForUser')->name('sendotpForuser');
Route::get('/resendotp', 'Auth\RegisterController@resendOTP')->name('resend');
Route::post('/verifyotp', 'Auth\RegisterController@verifyOtp')->name('verifyotp');
Route::get('/home', 'HomeController@index')->name('home');

/*Login controller routes*/

Route::get('/doctors/{doctor}/appointment/{slot}/{type}', 'User\DoctorsController@confirmAppointment')->name('doctors.confirmAppointment');
Route::post('/doctors/{doctor}/appointment/{slot}/store/p', 'User\DoctorsController@bookPersonalAppointment')->name('doctors.bookPersonalAppointment');
Route::post('/doctors/{doctor}/appointment/{slot}/store/o', 'User\DoctorsController@bookOthersAppointment')->name('doctors.bookOthersAppointment');

Route::post('/doctor/getslot', 'User\DoctorsController@fetchNextDaySlots')->name('ajax.fetchNextDaySlots');
Route::get('/doctors/{doctor}', 'User\DoctorsController@show')->name('doctors.show');

Route::get('/chats/chat', function () {
    return view('chats.chat');
});

Route::get('/dashboard/doctor', function () {
    $section = "profile";
    return view('doctor.dashboard.index', compact([
        'section'
    ]));
})->name('doctor.dashboard');

/*Slots*/
Route::get('dashboard/doctor/slots/{SlotDate}/edit', 'Doctor\SlotsController@edit')->name('slot.edit');
Route::resource('dashboard/doctor/slots', 'Doctor\SlotsController')->except('edit', 'update', 'destroy');
Route::put('dashboard/doctor/slots/{SlotDate}/update', 'Doctor\SlotsController@update')->name('slot.update');
Route::post('dashboard/doctor/slots/delete', 'Doctor\SlotsController@destroy')->name('ajax.deleteSlot');
/*Slots End*/

/*Appointments*/
Route::resource('dashboard/doctor/appointments', 'Doctor\AppointmentsController');
Route::get('/dashboard/doctor/appointment/{appointment}/accept', 'Doctor\AppointmentsController@accept')->name('appointment.accept');
Route::get('/dashboard/doctor/appointment/{appointment}/reject', 'Doctor\AppointmentsController@reject')->name('appointment.reject');
Route::post('/get-chats-appointments', 'Doctor\AppointmentsController@getChatsAppointments')->name('get-chats-appointments');
Route::post('/get-previous-appointments', 'Doctor\AppointmentsController@getPreviousAppointments')->name('get-previous-appointments');
Route::post('/get-new-appointments', 'Doctor\AppointmentsController@getNewAppointments')->name('get-new-appointments');

Route::post('/dashboard/doctor/appointment/{appointment}/generatePdf', 'DynamicPDFController@generatePdf');

/*Appointments End*/

/* Dashboard Doctors */
Route::get('/dashboard/doctor/basic-details', 'Doctor\DoctorsController@index')->name('doctor.basic-details');
Route::get('/registerUser', 'Auth\RegisterController@registerUser')->name('home.registerUser');
Route::get('/registerDoctor', 'Auth\RegisterController@registerDoctor')->name('home.registerDoctor');
Route::post('/dashboard/doctor/medical-details', 'Doctor\DoctorsController@setBasicDetails')->name('doctor.medical-details');
Route::post('/dashboard/doctor/education', 'Doctor\DoctorsController@setEducation')->name('doctor.education');
Route::post('/dashboard/doctor/establishment', 'Doctor\DoctorsController@setEstablishment')->name('doctor.establishment');
Route::post('/dashboard/doctor/completed-profile', 'Doctor\DoctorsController@createDoctor')->name('doctor.completed');
Route::get('/dashboard/doctors', function () {
    return view('doctor.dashboard.basic-details');
});

/* Dashboard Doctors */

Route::get('/dashboard/user', 'User\UsersController@index')->name('user.dashboard.profile');
Route::get('/dashboard/user/{user}/edit', 'User\UsersController@editUser')->name('user.edit');
Route::put('/dashboard/user/update', 'User\UsersController@updateUserData')->name('user.updateData');

Route::post('doctor\getDoctors', 'User\DoctorsController@getDoctors')->name('ajax.getDoctors');

/* Dashboard users */


/*Chat routes*/
Route::get('/chats/chat', function () {
    return view('chats.chat');
});

Route::get('/receive', function () {

    $users = [];
    $arr = [];
    $appointments = auth()->user()->doctor->appointments;
    foreach ($appointments as $appointment) {
        $user = $appointment->user()->where($arr)->first();
        if ($user)
            $users[] = $user;
        $arr[] = ['id', '!=', $appointment->user->id];
    }
    return view('chat.receive', compact([
        'users'
    ]));
})->name('receive');
Route::get('/send', function () {
    $users = [];
    $arr = [];
    $appointments = auth()->user()->appointments;
    foreach ($appointments as $appointment) {
        $user = $appointment->doctor->user()->where($arr)->first();
        if ($user)
            $users[] = $user;
        $arr[] = ['id', '!=', $appointment->doctor->user->id];
    }
    return view('chat.send', compact([
        'users'
    ]));
})->name('send');

Route::post('/setchat', 'ChatsController@setChat')->name('chat.set');
Route::post('/send-chat', 'ChatsController@send')->name('chat.send');
Route::post('/receive-chat', 'ChatsController@received')->name('chat.received');
Route::post('/chat-update', 'ChatsController@chatUpdate')->name('chat.update');

Route::resource('document', 'User\MedicalRecordsController');

Route::post('document/updateData', 'User\MedicalRecordsController@updateData')->name('document.updateData');
Route::delete('document/destroyDocument/{medicalrecord}', 'User\MedicalRecordsController@destroyDocument')->name('document.destroyDocument');

/*Chat Routes*/



Route::get('/prescription', 'DynamicPDFController@index');
// Route::get('/dynamic_pdf', 'DynamicPDFController@index');
Route::get('/dynamic_pdf/pdf/', 'DynamicPDFController@pdf');
Route::post('/temp-pre', 'DynamicPDFController@index');

// Route::get('/prescription-form', 'DynamicPDFController@pf');
Route::get('/prescription-form', function () {
    return view('doctor.appointments.prescription-form', compact([]));
});
Route::get('dashboard/user/slots', 'User\SlotsController@index')->name('user.appointments.index');
Route::get('dashboard/user/prescription', 'User\DoctorsController@showPrescriptions')->name('user.prescription');
Route::get('dashboard/user/orders', 'User\PharmaciesController@showOrders')->name('user.orders');

Route::post('/get-user', 'User\UsersController@getUser')->name('get-user');

/*pharma dashbaord*/
Route::delete('/dashboard/pharma/categories/destroy/{category}', 'Pharma\CategoriesController@destroy');
Route::delete('/dashboard/pharma/subcategories/destroy/{subcategory}', 'Pharma\SubcategoriesController@destroy');
Route::get('/dashboard/pharma/products/accept/{product}', 'Pharma\ProductsController@accept')->name('products.accept');
Route::get('/dashboard/pharma/products/reject/{product}', 'Pharma\ProductsController@reject')->name('products.reject');
Route::get('/dashboard/pharma/products/remove/{product}', 'Pharma\ProductsController@remove')->name('products.remove');
Route::get('/dashboard/pharma/category/{category}', 'Pharma\ProductsController@manageCategory')->name('products.manageCategory');
Route::get('/dashboard/pharma/subcategory/{subcategory}', 'Pharma\ProductsController@manageSubcategory')->name('products.manageSubcategory');

Route::resource('dashboard/pharma/products', 'Pharma\ProductsController');
Route::resource('dashboard/pharma/coupons', 'Pharma\CouponsController');
Route::resource('dashboard/pharma/categories', 'Pharma\CategoriesController');
Route::resource('dashboard/pharma/subcategories', 'Pharma\SubcategoriesController');
Route::get('/dashboard/pharma', function () {
    return view('pharma.dashboard.index');
})->name('pharma.dashboard');



Route::get('dashboard/pharma/manufacturerRequest', 'Pharma\ManufacturersController@index')->name('manufacturer.requests');
Route::put('dashboard/pharma/{user}/Accept', 'Pharma\ManufacturersController@accept')->name('manufacturer.accept');
Route::delete('dashboard/pharma/{user}/Reject', 'Pharma\ManufacturersController@reject')->name('manufacturer.reject');
/*User Product*/
Route::resource('/pharma/product', 'User\ProductsController');
Route::post('/addToCart', 'User\ProductsController@addToCart')->name('addToCart');
Route::post('/updateQuantity', 'User\ProductsController@updateQuantity')->name('updateQuantity');
/*End User Product*/

//Manufacturers routes


Route::get('/health-products/{category}', 'Pharma\CategoriesController@viewCategoryProducts')->name('pharma.view.categoryProducts');
Route::get('/health-products/{category}/subcategory/{subcategory}', 'Pharma\SubcategoriesController@viewSubCategory')->name('pharma.view.subCategory');

/* Pharma Routes */

/*Manufacturers routes*/

//Manufacturers routes


Route::middleware(['verifyManufacturer'])->group(function () {
    Route::get('dashboard/manufacturer', 'Manufacturer\ManufacturersController@index')->name('manufacturer.index');
    Route::get('dashboard/manufacturer/{user}/edit', 'Manufacturer\ManufacturersController@editManufacturer')->name('manufacturer.edit');
    Route::post('dashboard/manufacturer/{user}/update', 'Manufacturer\ManufacturersController@update')->name('manufacturer.update');
});

//Products routes
Route::get('dashboard/product/addProduct', 'Manufacturer\ProductsController@addProduct')->name('product.addProduct');
Route::post('dashboard/product/storeProduct', 'Manufacturer\ProductsController@storeProduct')->name('product.storeProduct');
Route::get('dashboard/product/{product}/edit', 'Manufacturer\ProductsController@editProduct')->name('product.editProduct');
Route::post('dashboard/product/{product}/updateProduct', 'Manufacturer\ProductsController@updateProduct')->name('product.updateProduct');
Route::get('dashboard/products', 'Manufacturer\ProductsController@index')->name('product.index');
Route::get('dashboard/product/{product}/deleteProduct', 'Manufacturer\ProductsController@deleteProduct')->name('product.deleteProduct');



Route::get('manufacturer/register', 'Manufacturer\ManufacturersController@register')->name('manufacturer.register');
Route::post('manufacturer/storeManufacturer', 'Manufacturer\ManufacturersController@storeManufacturer')->name('manufacturer.storeManufacturer');

Route::post('user/address', 'AddressController@store')->name('users.address');

Route::get('/video-index', 'VideoRoomsController@index')->name('video-index');
Route::get('room/join/{roomName}', 'VideoRoomsController@joinRoom')->name('join-room');
Route::post('room/create', 'VideoRoomsController@createRoom')->name('video-room-create');
/*End of Manufacturers routes*/

/*Cart Routes*/
Route::get('/order/checkout', 'CartController@checkout')->name('cart.checkout');
Route::post('user/address', 'AddressController@store')->name('users.address');
Route::post('coupon/check', 'Pharma\CouponsController@check')->name('coupon.check');
Route::get('/order/cart', 'CartController@index')->name('order.cart');
Route::post('cart/placeOrder', 'CartController@placeOrder')->name('cart.placeOrder');
Route::post('cart/payment', 'CartController@payment')->name('cart.continueToPayment');/*End of Cart Routes*/



Route::get('feedback/index/{appointment_id}', 'FeedbackController@index')->name('feedback.index');
Route::resource('feedback', 'FeedbackController');
// Route::get('/feedback/index/{$appointment_id}',function(){
//     return view('feedback.index');
// })->name('feedback.index');


// Route::get('/feedback/index/{$appointment_id}',function(){
//     return view('feedback.index');
// });
Route::resource('dashboard/doctor/feedbacks', 'Doctor\FeedbacksController');


//notification route

Route::post('readnotification', 'Notification\NotificationsController@update')->name('ajax.readNotification');
