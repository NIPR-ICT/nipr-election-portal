<!DOCTYPE html>
<html>
<head>
    <title>Payment Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px;">
    <div style="max-width: 600px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 style="color: #28a745;">🎉 Payment Successful!</h2>
        <p>Dear {{ $userData->first_name }} {{ $userData->surname }},</p>
        <p>Thank you for showing interest and making the payment for the <strong>{{ $userData->position }}</strong> position.</p>
        <p>Your payment has been successfully processed.</p>

        <p><strong>Transaction ID:</strong> {{ $userData->transaction_id }}</p>
        <p><strong>Amount Paid:</strong> ₦{{ number_format($userData->amount, 2) }}</p>

        <p>To complete your application, please update your profile by clicking the link below:</p>
        <p><a href="{{ $customLink }}" style="background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;">Update Your Profile</a></p>

        <p>Best Regards,</p>
        <p><strong>NIPR Electoral Committee</strong></p>
    </div>
</body>
</html>
