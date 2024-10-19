<!-- resources/views/emails/contact_status_updated.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Request Status Updated</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #4f6d9a, #7e9bc2);
            color: #ffffff;
            padding: 40px 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
            text-align: center;
        }
        .content h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
            margin: 15px 0;
        }
        .button {
            display: inline-block;
            padding: 15px 30px;
            font-size: 18px;
            color: #ffffff;
            background-color: #28a745; /* Green for approved */
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }
        .button-reject {
            background-color: #dc3545; /* Red for rejected */
        }
        .button:hover {
            opacity: 0.9;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            background-color: #f9f9f9;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Status Update</h1>
        </div>
        <div class="content">
            <h2>Hello {{ $contact->name }},</h2>
            <p>Your contact request "{{ $contact->subject }}" has been <strong>{{ $status }}</strong>.</p>
            <p>Thank you for reaching out! If you have any questions, feel free to reply to this email.</p>
           
            <a href="#" class="button {{ $status == 'approved' ? '' : 'button-reject' }}">
                {{ ucfirst($status) }} Your Request
            </a>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Rescuefood. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
