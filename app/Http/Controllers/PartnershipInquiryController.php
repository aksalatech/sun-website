<?php

namespace App\Http\Controllers;

use App\Models\PartnershipInquiry;
use Illuminate\Http\Request;

class PartnershipInquiryController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'company' => 'nullable|string|max:150',
            'phone' => 'nullable|string|max:30',
            'subject' => 'nullable|string|max:150',
            'message' => 'nullable|string',
        ]);

        PartnershipInquiry::create($data);

        return back()->with('success', 'Thank you! We have received your inquiry.');
    }
}


