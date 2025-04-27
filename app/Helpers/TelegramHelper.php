<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class TelegramHelper
{
    public static function sendRujukanMessage($rujukan, $faskes, $link,$token,$chat_id)
    {
        $message = "📋 *Data Rujukan Baru:*\n"
            . "👤 Nama: " . self::escapeMarkdown($rujukan->nama) . "\n"
            . "🆔 NIK: " . self::escapeMarkdown($rujukan->nik) . "\n"
            . "📄 No Rujukan: " . self::escapeMarkdown($rujukan->No_Rujukan) . "\n"
            . "🩺 Dokter: " . self::escapeMarkdown($rujukan->Dokter_Perujuk) . "\n"
            . "🏥 Faskes: " . self::escapeMarkdown($faskes ) . "\n"
            . "🧾 Diagnosa: " . self::escapeMarkdown($rujukan->Diagnosa) . "\n"
            . "🏷️ Kategori: " . self::escapeMarkdown($rujukan->Kategori_Rujukan) . "\n"
            . "📝 Keterangan: " . self::escapeMarkdown($rujukan->Keterangan ?? '-') . "\n"
            . "🕒 Tanggal: " . self::escapeMarkdown(now()->format('d-m-Y H:i')) . "\n\n"
            . "📌 Status: " .self::escapeMarkdown($rujukan->status) . "\n\n"
            . "🔗 Link: " . self::escapeMarkdown($link);

        $url = "https://api.telegram.org/bot{$token}/sendMessage";

        return Http::post($url, [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'MarkdownV2',
        ]);
    }

    public static function booking($booking, $token, $chat_id)
    {
        $message = "📋 *Data Booking Baru:*\n"
            . "👤 Nama: " . self::escapeMarkdown($booking->nama) . "\n"
            . "🆔 NIK: " . self::escapeMarkdown($booking->nik) . "\n"
            . "📄 Kode Booking: " . self::escapeMarkdown($booking->id) . "\n"
            . "🏥 Poliklinik: " . self::escapeMarkdown($booking->poliklinik->name) . "\n"
            . "🩺 Dokter: " . self::escapeMarkdown($booking->dokter->name) . "\n"
            . "🗓️ Tanggal Booking: " . self::escapeMarkdown($booking->tanggal_booking) . "\n\n";

        $url = "https://api.telegram.org/bot{$token}/sendMessage";

        return Http::post($url, [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'MarkdownV2',
        ]);
    }
    private static function escapeMarkdown($text)
    {
        $escape_chars = ['_', '*', '[', ']', '(', ')', '~', '`', '>', '#', '+', '-', '=', '|', '{', '}', '.', '!'];
        return str_replace($escape_chars, array_map(fn($c) => '\\' . $c, $escape_chars), $text);
    }

    public static function sendKritikSaran($kritikSaran, $token, $chat_id )
    {


        $message = "📋 *Kritik dan Saran Baru:*\n"
            . "👤 Nama: " . self::escapeMarkdown($kritikSaran->name) . "\n"
            . "✉️ Email: " . self::escapeMarkdown($kritikSaran->email) . "\n"
            . "📞 No HP: " . self::escapeMarkdown($kritikSaran->no_hp) . "\n"
            . "📝 Pesan: " . self::escapeMarkdown($kritikSaran->message) . "\n\n";

        $url = "https://api.telegram.org/bot{$token}/sendMessage";

        return Http::post($url, [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'MarkdownV2',
        ]);
    }
}
?>