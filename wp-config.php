<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'db_rest_api' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Ql}jk5Ux,[X/-RdRSlrSTmIypQWA_z#bw&(jZq!M5Neo?CHwPmI1d++sj/# ]EY^' );
define( 'SECURE_AUTH_KEY',  '&YJ>EK*qlrXM868.p@Km5FHwQ`9F@U0M;L2cks#U!~QvLo^Y.v)O&XhrF^iiI#+_' );
define( 'LOGGED_IN_KEY',    ',T?|*m*Qrw6qS~R7W<Kl.RWU+b?[u^,5>[<%4P8oCZvi)t/C<GGjNA?$6k{v*/.}' );
define( 'NONCE_KEY',        'MKI-xG~0T&K:CQI<5Jk|)6p7~G:bhg2:ZZU|8Z_J4EuW< 4mfL@zW~3%eYG$hw3B' );
define( 'AUTH_SALT',        '!%=$+w@^B`!x:n2?Kb7d951n%h%?hsu3[ZSNe>=EZG}8QGq:Fa6-|RW7 cN/7_4P' );
define( 'SECURE_AUTH_SALT', 'M;Ui>S3j%i8MAl|b4gJSSYTiez%@Nw0;169pf9!+Pp<pvZ4<-w3l(y0&hRsiVY!W' );
define( 'LOGGED_IN_SALT',   '6QI#=i`=gJx_O6#W6YCbC(+^v+Pz)` My)7fgGp?O$0wy+1alh:DL?QFC$&$ZaBR' );
define( 'NONCE_SALT',       'ivFdOQw/=>xgI**=. E.NV3?w>f)P/)1&{M$lcj#W~Qh&_Zz<Q(erW9$Yzi@rZ Q' );
define('JWT_AUTH_SECRET_KEY', 'HNgB-td`L~z:{Dz&_[~-ea>DPth!R-8fbTYFi{Yl(+=O#5/<jk8S@48U0imQfTK');
define('JWT_AUTH_CORS_ENABLE', true);
/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );


/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
