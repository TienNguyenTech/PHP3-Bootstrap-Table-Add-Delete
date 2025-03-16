<?php
function formatPhoneNumber($phone) {
    // We're matching 10-digit Australian phone numbers

    /*
     * To be compatible with both mobile format and landline format,
     * we'll need to disassemble phone number into
     * (0x) (ab) (cd) (e) (fgh)
     */
    $phoneNumberPattern = '/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{3})$/';
    if (preg_match($phoneNumberPattern, $phone, $matches)) {
        // And formatting the phone number on whether it's a mobile number
        // And note $matches[0] is still the original string, actual segments start from index 1
        if ($matches[1] == "04") {
            // 04xx xxx xxx
            return $matches[1] . $matches[2] . " " . $matches[3] . $matches[4] . " " . $matches[5];
        } else {
            // 0x xxxx xxxx
            return $matches[1] . " " . $matches[2] . $matches[3] . " " . $matches[4] . $matches[5];
        }
    }

    // If phone number is incorrect, just return the original number instead
    return $phone;
}