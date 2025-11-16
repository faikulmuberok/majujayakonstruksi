<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pesan Baru dari Website</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #2563eb;">Pesan Baru dari Website</h2>
        
        <div style="background-color: #f3f4f6; padding: 20px; border-radius: 8px; margin: 20px 0;">
            <p><strong>Nama:</strong> {{ $contact->name }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Subjek:</strong> {{ $contact->subject }}</p>
            <p><strong>Tanggal:</strong> {{ $contact->created_at->format('d/m/Y H:i') }}</p>
        </div>
        
        <div style="background-color: #ffffff; padding: 20px; border: 1px solid #e5e7eb; border-radius: 8px;">
            <h3 style="color: #2563eb; margin-top: 0;">Pesan:</h3>
            <p style="white-space: pre-wrap;">{{ $contact->message }}</p>
        </div>
        
        <p style="margin-top: 20px; color: #6b7280; font-size: 12px;">
            Pesan ini dikirim melalui formulir kontak di website PT. Maju Jaya Konstruksi.
        </p>
    </div>
</body>
</html>

