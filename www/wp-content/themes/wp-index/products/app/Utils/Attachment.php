<?php

namespace App\Utils;

class Attachment {

    /**
     * Substitui caracteres não-ASCII.
     * https://github.com/toscho/Germanix-WordPress-Plugin
     * @param string $str
     * @return string
     */
    private static function t5f_translit(string $str): string
    {
        $utf8 = array(
            'Ä'  => 'Ae'
        , 'ä'    => 'ae'
        , 'Æ'    => 'Ae'
        , 'æ'    => 'ae'
        , 'À'    => 'A'
        , 'à'    => 'a'
        , 'Á'    => 'A'
        , 'á'    => 'a'
        , 'Â'    => 'A'
        , 'â'    => 'a'
        , 'Ã'    => 'A'
        , 'ã'    => 'a'
        , 'Å'    => 'A'
        , 'å'    => 'a'
        , 'ª'    => 'a'
        , 'ₐ'    => 'a'
        , 'ā'    => 'a'
        , 'Ć'    => 'C'
        , 'ć'    => 'c'
        , 'Ç'    => 'C'
        , 'ç'    => 'c'
        , 'Ð'    => 'D'
        , 'đ'    => 'd'
        , 'È'    => 'E'
        , 'è'    => 'e'
        , 'É'    => 'E'
        , 'é'    => 'e'
        , 'Ê'    => 'E'
        , 'ê'    => 'e'
        , 'Ë'    => 'E'
        , 'ë'    => 'e'
        , 'ₑ'    => 'e'
        , 'ƒ'    => 'f'
        , 'ğ'    => 'g'
        , 'Ğ'    => 'G'
        , 'Ì'    => 'I'
        , 'ì'    => 'i'
        , 'Í'    => 'I'
        , 'í'    => 'i'
        , 'Î'    => 'I'
        , 'î'    => 'i'
        , 'Ï'    => 'Ii'
        , 'ï'    => 'ii'
        , 'ī'    => 'i'
        , 'ı'    => 'i'
        , 'I'    => 'I' // turkish, correct?
        , 'Ñ'    => 'N'
        , 'ñ'    => 'n'
        , 'ⁿ'    => 'n'
        , 'Ò'    => 'O'
        , 'ò'    => 'o'
        , 'Ó'    => 'O'
        , 'ó'    => 'o'
        , 'Ô'    => 'O'
        , 'ô'    => 'o'
        , 'Õ'    => 'O'
        , 'õ'    => 'o'
        , 'Ø'    => 'O'
        , 'ø'    => 'o'
        , 'ₒ'    => 'o'
        , 'Ö'    => 'Oe'
        , 'ö'    => 'oe'
        , 'Œ'    => 'Oe'
        , 'œ'    => 'oe'
        , 'ß'    => 'ss'
        , 'Š'    => 'S'
        , 'š'    => 's'
        , 'ş'    => 's'
        , 'Ş'    => 'S'
        , '™'    => 'TM'
        , 'Ù'    => 'U'
        , 'ù'    => 'u'
        , 'Ú'    => 'U'
        , 'ú'    => 'u'
        , 'Û'    => 'U'
        , 'û'    => 'u'
        , 'Ü'    => 'Ue'
        , 'ü'    => 'ue'
        , 'Ý'    => 'Y'
        , 'ý'    => 'y'
        , 'ÿ'    => 'y'
        , 'Ž'    => 'Z'
        , 'ž'    => 'z'
            // misc
        , '¢'    => 'Cent'
        , '€'    => 'Euro'
        , '‰'    => 'promille'
        , '№'    => 'Nr'
        , '$'    => 'Dollar'
        , '℃'    => 'Grad Celsius'
        , '°C' => 'Grad Celsius'
        , '℉'    => 'Grad Fahrenheit'
        , '°F' => 'Grad Fahrenheit'
            // Superscripts
        , '⁰'    => '0'
        , '¹'    => '1'
        , '²'    => '2'
        , '³'    => '3'
        , '⁴'    => '4'
        , '⁵'    => '5'
        , '⁶'    => '6'
        , '⁷'    => '7'
        , '⁸'    => '8'
        , '⁹'    => '9'
            // Subscripts
        , '₀'    => '0'
        , '₁'    => '1'
        , '₂'    => '2'
        , '₃'    => '3'
        , '₄'    => '4'
        , '₅'    => '5'
        , '₆'    => '6'
        , '₇'    => '7'
        , '₈'    => '8'
        , '₉'    => '9'
            // Operators, punctuation
        , '±'    => 'plusminus'
        , '×'    => 'x'
        , '₊'    => 'plus'
        , '₌'    => '='
        , '⁼'    => '='
        , '⁻'    => '-' // sup minus
        , '₋'    => '-' // sub minus
        , '–'    => '-' // ndash
        , '—'    => '-' // mdash
        , '‑'    => '-' // non breaking hyphen
        , '․'    => '.' // one dot leader
        , '‥'    => '..'  // two dot leader
        , '…'    => '...'  // ellipsis
        , '‧'    => '.' // hyphenation point
        , ' '    => '-'   // nobreak space
        , ' '    => '-'   // normal space
        );

        $str = strtr( $str, $utf8 );
        return trim( $str, '-' );
    }

    /**
     * Reduz meta caracteres (-=+.) repetidos para apenas um.
     * @param string $str
     * @return string
     */
    private static function t5f_remove_doubles(string $str): string
    {
        $regex = array(
            'pattern'        => '~([=+.-])\\1+~'
        , 'replacement'  => "\\1"
        );
        return preg_replace( $regex['pattern'], $regex['replacement'], $str );
    }

    /**
     * Converte maiúsculas em minúsculas e remove o resto.
     *
     * @param  string $str Input string
     * @return string
     */
    private static function t5f_lower_ascii(string $str): string
    {
        $str     = strtolower( $str );
        $regex   = array(
            'pattern'        => '~([^a-z\d_.-])~'
        , 'replacement'  => ''
        );
        // Leave underscores, otherwise the taxonomy tag cloud in the
        // backend won’t work anymore.
        return preg_replace( $regex['pattern'], $regex['replacement'], $str );
    }


    /**
     * Limpar nome de arquivo no upload
     *
     * Sanitization test done with the filename:
     * ÄäÆæÀàÁáÂâÃãÅåªₐāĆćÇçÐđÈèÉéÊêËëₑƒğĞÌìÍíÎîÏïīıÑñⁿÒòÓóÔôÕõØøₒÖöŒœßŠšşŞ™ÙùÚúÛûÜüÝýÿŽž¢€‰№$℃°C℉°F⁰¹²³⁴⁵⁶⁷⁸⁹₀₁₂₃₄₅₆₇₈₉±×₊₌⁼⁻₋–—‑․‥…‧.png
     * @param string $filename
     * @return string
     */
    private static function t5f_sanitize_filename(string $filename) : string
    {

        $filename    = html_entity_decode( $filename, ENT_QUOTES, 'utf-8' );
        $filename    = self::t5f_translit( $filename );
        $filename    = self::t5f_lower_ascii( $filename );
        $filename    = self::t5f_remove_doubles( $filename );
        return $filename;
    }

    /**
     * Método responsável por efetuar o ‘upload’ dos anexos, e por gerar a ‘string’ com o link de acesso
     * @param array $arquivo
     * @return string
     */
    public static function saveAttachment(array $arquivo): string
    {

            //RENOMEIA O NOME DO ANEXO
            $name = self::t5f_sanitize_filename($arquivo['name']);
            $upName = "/var/www/html/wp-content/themes/wp-index/products/resources/img/" . $name;

            //UPLOAD ARQUIVO
            move_uploaded_file($arquivo['tmp_name'], $upName);

            //GERANDO O CAMINHO NO BANCO
            $nameDB = "/wp-content/themes/wp-index/products/resources/img/" . $name . ",";

        /** RETIRA O ÚLTIMO "," DO TEXTO E RETORNA O DADOS */
        return substr($nameDB, 0, -1);

    }
}