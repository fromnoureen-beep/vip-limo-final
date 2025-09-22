<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

require_once 'vendor/autoload.php';

// Get Stripe secret key from environment
$stripe_secret_key = getenv('STRIPE_SECRET_KEY');
if (!$stripe_secret_key) {
    http_response_code(500);
    echo json_encode(['error' => 'Stripe configuration error']);
    exit;
}

\Stripe\Stripe::setApiKey($stripe_secret_key);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    try {
        // Create payment intent with the booking details
        $payment_intent = \Stripe\PaymentIntent::create([
            'amount' => round($input['amount'] * 100), // Convert to cents
            'currency' => 'usd',
            'metadata' => [
                'pickup_location' => $input['pickup_location'],
                'dropoff_location' => $input['dropoff_location'],
                'pickup_date' => $input['pickup_date'],
                'pickup_time' => $input['pickup_time'],
                'vehicle_type' => $input['vehicle_type'],
                'distance' => $input['distance'],
                'duration' => $input['duration'],
                'passengers' => $input['passengers']
            ],
            'description' => 'VIP Limo Reservation - ' . $input['vehicle_type']
        ]);

        echo json_encode([
            'client_secret' => $payment_intent->client_secret,
            'payment_intent_id' => $payment_intent->id
        ]);
        
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
?>