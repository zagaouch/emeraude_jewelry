<!-- resources/views/emails/contact-form.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Nouveau message de contact</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #047857; color: white; padding: 15px; text-align: center; }
        .content { padding: 20px; background-color: #f9f9f9; }
        .footer { margin-top: 20px; text-align: center; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Emeraude Jewelry - Nouveau message</h1>
        </div>
        
        <div class="content">
            <p><strong>De :</strong> {{ $formData['name'] }} ({{ $formData['email'] }})</p>
            <p><strong>Sujet :</strong> {{ $formData['subject'] }}</p>
            <p><strong>Message :</strong></p>
            <p>{{ $formData['message'] }}</p>
        </div>
        
        <div class="footer">
            <p>Ce message a été envoyé via le formulaire de contact du site Emeraude Jewelry.</p>
        </div>
    </div>
</body>
</html>