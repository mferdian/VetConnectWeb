<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    /**
     * Show the form for creating a new review.
     */
    public function create(Booking $booking)
    {
        // Booking sudah di-load oleh middleware Review
        return view('review', compact('booking'));
    }

    /**
     * Store a newly created review in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:500',
        ]);

        $booking = Booking::findOrFail($validated['booking_id']);

        // Middleware seharusnya sudah memastikan ini, tapi tidak ada salahnya untuk check lagi
        if ($booking->user_id !== Auth::id()) {
            return redirect()->route('history')->with('error', 'Anda tidak memiliki akses ke janji temu ini.');
        }

        // Create the review
        Review::create([
            'user_id' => Auth::id(),
            'vet_id' => $booking->vet_id,
            'booking_id' => $booking->id,
            'rating' => $validated['rating'],
            'review' => $validated['review'],
        ]);

        return redirect()->route('history')->with('success', 'Terima kasih atas review Anda!');
    }

    /**
     * Get featured reviews for homepage display.
     */
    public function featuredReviews()
    {
        $reviews = Review::with(['user', 'vet'])
                    ->orderBy('rating', 'desc')
                    ->orderBy('created_at', 'desc')
                    ->take(3)
                    ->get();

        return response()->json($reviews);
    }
}
