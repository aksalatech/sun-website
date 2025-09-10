<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.5; color: #333; }
        .container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #eaeaea; border-radius: 8px; background: #f9f9f9; }
        .title { font-size: 20px; font-weight: bold; margin-bottom: 20px; color: #0058a3; }
        .label { font-weight: bold; margin-top: 10px; }
        .value { margin-bottom: 10px; }
        .footer { margin-top: 30px; font-size: 12px; color: #888; }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">Pesan Kontak Baru</div>

        <div><span class="label">Nama:</span> <span class="value">{{ $data['name'] }}</span></div>
        <div><span class="label">Email:</span> <span class="value">{{ $data['email'] }}</span></div>
        <div><span class="label">Telepon:</span> <span class="value">{{ $data['phone'] ?? '-' }}</span></div>
        <div><span class="label">Kategori:</span> <span class="value">{{ ucfirst($data['category']) }}</span></div>
        <div><span class="label">Pesan:</span></div>
        <div class="value" style="white-space: pre-line;">{{ $data['message'] }}</div>

        <div class="footer">Email ini dikirim dari formulir kontak website Bintangfajarabadi.com</div>
    </div>
</body>
</html>
