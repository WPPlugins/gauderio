<?php
/**
 * @package Gauderio
 * @version 0.2
 */
/*
Plugin Name: Gaud&eacute;rio
Plugin URI: http://wordpress.org/extend/plugins/gauderio/
Description: Baseado no simples e belo "Hello, Dolly" do criador do Wordpress, Matt Mullenweg, este n&atilde;o &eacute; apenas um plug-in. Ele simboliza todo o entusiasmo que os desenvolvedores ga&uacute;chos tem pela incr&iacute;vel plataforma e pelo Rio Grande do Sul, seu rinc&atilde;o. O plug-in mostra um verso do poema Gaud&eacute;rio, de Jo&atilde;o da Cunha Vargas, a cada p&aacute;gina da tela de administra&ccedil;&atilde;o. 

(Based on "Hello, Dolly", by Matt Mullenweg, this plug-in shows a line from "Gaud&eacute;rio", a poem by Jo&atilde;o da Cunha Vargas.)
Author: Marco Andrei Kichalowsky
Version: 0.2
Author URI: http://marcoandrei.com
*/


if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Blocking direct access. Aborta a execução se acessado diretamente.
}



function aprende_gauderio() {
	/** Este é o poema. This is the poem. */
	$lyrics = "Poncho e la&ccedil;o na garupa
Do pingo quebrei o cacho
Dum zaino negro gordacho
Assim me soltei no pampa
Rec&eacute;m apontando a guampa
Pelito grosso de guacho
Fui pelechando na estrada
Do velho torr&atilde;o pampeano
J&aacute; serrava sobreano
Cruzava de um pago a outro
Quebrando queixo de potro
Sem nunca ter desengano
Fui conhecendo as est&acirc;ncias
O dono, a marca, o sinal
Churrasco que j&aacute; tem sal
Guaiaca que tem dinheiro
Cavalo que &eacute; caborteiro
E o jujo que me faz mal
Conhe&ccedil;o todo o Rio Grande
Qualquer estrada ou atalho
Quando me seco trabalho
Na velha lida campeira
Corro bem uma carreira
Manejo bem o baralho
Na tava sempre fui taura
Nunca achei parada feia
Quando o parceiro cambeia
Dist&acirc;ncia de nove passo
Quando espicho bem o bra&ccedil;o
Num tiro de volta e meia
Num bolicho de campanha
De volta de uma tropeada
Botei ali uma olada
A maior da minha vida:
Dezoito sorte corrida
Quarenta e cinco clavada
E quanto baile acabei
Solito, sem companheiro
Dava um tapa no candeeiro
Um talho no mais afoito
Cal&ccedil;ado no trinta e oito
Botava pra fora o gaiteiro
Trancava o p&eacute; no portal
Abria a porta da sala
Entre bufido de bala
E a provid&ecirc;ncia divina
S&oacute; manota&ccedil;os de china
Rasgando a franja do pala
Ningu&eacute;m me toca por diante
Nem tampouco cabresteio
Eu me empaco e me boleio
N&atilde;o paro nem com sinuelo
E tourito de outro pelo
N&atilde;o berra no meu rodeio
N&atilde;o quero morrer de doen&ccedil;a
Nem com a vela na m&atilde;o
Eu quero guasquear no ch&atilde;o
Com um bala&ccedil;o bem na testa
E que seja em dia de festa
De carreira ou marca&ccedil;&atilde;o
E pe&ccedil;o, quando eu morrer
N&atilde;o me por em cemit&eacute;rio
Existe muito mist&eacute;rio
Prefiro um lugar deserto
E que o zaino paste perto
Cuidando os restos gaud&eacute;rio
E vou levar quando eu for
No caix&atilde;o algum trof&eacute;u:
Chilena, adaga, chap&eacute;u
Meu tirador e o la&ccedil;o
O pala eu quero no bra&ccedil;o
Pra gauderiar l&aacute; no c&eacute;u!";

	// Aqui dividimos o poema em linhas. Here we split it into lines.
	$lyrics = explode( "\n", $lyrics );

	// E depois escolhemos um verso aleatoriamente. And then randomly choose a line.
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// Agora ecoamos o verso. This just echoes the chosen line, we'll position it later.
function canta_gauderio() {
	$chosen = aprende_gauderio();
	echo "<p id='gauderio'>$chosen</p>";
}

// Agora configuramos para que a função seja executada a ação admin_notices é chamada. Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'canta_gauderio' );

// Um pouco de CSS para posicionar o verso. We need some CSS to position the paragraph.
function gauderio_css() {
	// Isso garante que o posicionamento será correto mesmo para idiomas escritos da direita para esquerda. This makes sure that the positioning is also good for right-to-left languages.
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#gauderio {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'gauderio_css' );

?>