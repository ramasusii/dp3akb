<?php
// app/helpers/StringHelper.php
namespace app\helpers;

use yii\helpers\Html; // Untuk encode

/**
 * Class StringHelper
 *
 * Helper class untuk operasi string.
 */
class StringHelper
{
    /**
     * Memotong string berdasarkan jumlah karakter.
     *
     * @param string $string String yang akan dipotong.
     * @param int $length Jumlah karakter maksimal.
     * @param string $suffix Suffix yang ditambahkan jika string dipotong.
     * @param bool $wordBreak Apakah boleh memotong kata di tengah.
     * @return string String yang telah dipotong.
     */
    public static function truncate($string, $length, $suffix = '...', $wordBreak = false)
    {
        if (mb_strlen($string, 'UTF-8') <= $length) {
            return $string;
        }

        if ($wordBreak) {
            // Potong langsung
            return mb_substr($string, 0, $length, 'UTF-8') . $suffix;
        } else {
            // Potong di batas spasi terdekat
            $truncatedString = mb_substr($string, 0, $length, 'UTF-8');
            // Cari posisi spasi terakhir
            $lastSpacePos = mb_strrpos($truncatedString, ' ', 0, 'UTF-8');
            if ($lastSpacePos !== false) {
                $truncatedString = mb_substr($truncatedString, 0, $lastSpacePos, 'UTF-8');
            }
            return $truncatedString . $suffix;
        }
    }

    /**
     * Memotong string berdasarkan jumlah kata.
     *
     * @param string $string String yang akan dipotong.
     * @param int $limit Jumlah kata maksimal.
     * @param string $suffix Suffix yang ditambahkan jika string dipotong.
     * @return string String yang telah dipotong.
     */
    public static function truncateWords($string, $limit, $suffix = '...')
    {
        $words = explode(' ', $string);
        if (count($words) <= $limit) {
            return $string;
        }
        return implode(' ', array_slice($words, 0, $limit)) . $suffix;
    }
}
?>