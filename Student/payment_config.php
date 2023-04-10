<?php 
// Product Details 
// Minimum amount is $0.50 US 
$itemName = "School Fee"; 
$itemNumber = "PN12345"; 
$itemPrice = 50; 
$currency = "USD"; 
 
// Stripe API configuration  
define('STRIPE_API_KEY', 'pk_live_51ISc1WGJxnWEqwl38jfmtLcUsbaEhktQajwUNRo7iUZlPaG4ucTBjpEexoYOtk6VYnhf9fjdtKrrdj32lhw8z62f00ooibxZGz'); 
define('STRIPE_PUBLISHABLE_KEY', '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');

// Database configuration  
define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'elearning_system');

?>