<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class TelegramHelper
{
    public static function sendRujukanMessage($rujukan, $faskes, $link, $token, $chat_id)
    {
        $message = "📋 *Data Rujukan Baru:*\n"
            . "👤 Nama: " . self::escapeMarkdown($rujukan->nama) . "\n"
            . "🆔 NIK: " . self::escapeMarkdown($rujukan->nik) . "\n"
            . "📄 No Rujukan: " . self::escapeMarkdown($rujukan->No_Rujukan) . "\n"
            . "🩺 Perujuk: " . self::escapeMarkdown($rujukan->perujuk) . "\n"
            . "🧑‍⚕️ Profesi: " . self::escapeMarkdown($rujukan->profesi) . "\n"
            . "📋 Subjek: " . self::escapeMarkdown($rujukan->subjek) . "\n"
            . "🔍 Objek: " . self::escapeMarkdown($rujukan->objek) . "\n"
            . "🌡️ Suhu: " . self::escapeMarkdown($rujukan->suhu) . "\n"
            . "🩸 Tensi: " . self::escapeMarkdown($rujukan->tensi) . "\n"
            . "⚖️ Berat: " . self::escapeMarkdown($rujukan->berat) . "\n"
            . "📏 Tinggi: " . self::escapeMarkdown($rujukan->tinggi) . "\n"
            . "💨 RR: " . self::escapeMarkdown($rujukan->RR) . "\n"
            . "❤️ Nadi: " . self::escapeMarkdown($rujukan->nadi) . "\n"
            . "🫁 SpO2: " . self::escapeMarkdown($rujukan->SpO2) . "\n"
            . "🧠 GCS: " . self::escapeMarkdown($rujukan->GCS) . "\n"
            . "💡 Kesadaran: " . self::escapeMarkdown($rujukan->Kesadaran) . "\n"
            . "📂 LP: " . self::escapeMarkdown($rujukan->LP) . "\n"
            . "⚠️ Alergi: " . self::escapeMarkdown($rujukan->Alergi) . "\n"
            . "📝 Asesmen: " . self::escapeMarkdown($rujukan->Asesmen) . "\n"
            . "📌 Plan: " . self::escapeMarkdown($rujukan->Plan) . "\n"
            . "📄 Instruksi: " . self::escapeMarkdown($rujukan->Instruksi) . "\n"
            . "✅ Evaluasi: " . self::escapeMarkdown($rujukan->Evaluasi) . "\n"
            . "📝 Keterangan: " . self::escapeMarkdown($rujukan->Keterangan ?? '-') . "\n"
            . "🕒 Tanggal: " . self::escapeMarkdown(now()->format('d-m-Y H:i')) . "\n\n"
            . "📌 Status: " . self::escapeMarkdown($rujukan->status) . "\n\n"
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
            . "🩺 Jadwal Dokter: " . self::escapeMarkdown($booking->jadwal->jam_mulai) . "\-" . self::escapeMarkdown($booking->jadwal->jam_selesai) . "\n"
            . "📞 No HP: " . self::escapeMarkdown($booking->no_hp) . "\n"
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

    public static function sendKritikSaran($kritikSaran, $token, $chat_id)
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
