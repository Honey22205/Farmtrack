<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotController;

// Apply CORS middleware to the routes
Route::middleware(['cors'])->group(function () {
    // Route for handling Dialogflow webhook
    Route::post('/webhook', [BotController::class, 'webhook'])
        ->name('webhook.handle'); // Added name for easier reference in views or redirects

    // Route for the chatbot interface on the web
    Route::post('/bot', [BotController::class, 'handle'])
        ->name('bot.handle'); // Added name for easier reference in views or redirects

    // Route to display the chat interface
    Route::get('/chat', function () {
        return view('chat');
    })->name('chat'); // Added name for easier reference in views or redirects
});
