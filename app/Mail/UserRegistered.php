<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $user;  // Menyimpan objek pengguna

    /**
     * Buat instance pesan baru.
     */
    public function __construct($user)
    {
        $this->user = $user;  // Menyimpan objek pengguna yang baru terdaftar
    }

    /**
     * Bangun pesan.
     */
    public function build()
    {
        return $this->subject('Welcome to Our Platform!')
                    ->view('emails.user_registered')
                    ->with([
                        'name' => $this->user->name,  // Mengirimkan nama pengguna ke tampilan
                        'email' => $this->user->email, // Mengirimkan email pengguna ke tampilan
                    ]);
    }
}
