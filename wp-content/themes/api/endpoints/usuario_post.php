<?php

function apiUsuarioPost( $request ) {
	$email  = sanitize_email( $request['email'] );
	$senha  = $request['senha'];
	$nome   = sanitize_text_field( $request['nome'] );
	$rua    = sanitize_text_field( $request['rua'] );
	$cep    = sanitize_text_field( $request['cep'] );
	$numero = sanitize_text_field( $request['numero'] );
	$bairro = sanitize_text_field( $request['bairro'] );
	$cidade = sanitize_text_field( $request['cidade'] );
	$estado = sanitize_text_field( $request['estado'] );

	$user_exists  = username_exists( $email );
	$email_exists = email_exists( $email );

	if ( ! $user_exists && ! $email_exists && $email && $senha ) {

		$userID = wp_create_user( $email, $senha, $email );

		$response = array(
			'ID'           => $userID,
			'display_name' => $nome,
			'first_name'   => $nome,
			'role'         => 'subscriber'
		);

		wp_update_user( $response );
		update_user_meta($userID , 'rua',$rua);
		update_user_meta($userID , 'cep',$cep);
		update_user_meta($userID , 'numero',$numero);
		update_user_meta($userID , 'bairro',$bairro);
		update_user_meta($userID , 'cidade',$cidade);
		update_user_meta($userID , 'estado',$estado);
	} else {
		$response = new WP_Error( 'email', 'Email já cadastrado.', array( 'status' => 403 ) );
	}


//	$response = array(
//		'nome'   => $nome,
//		'email'  => $email,
//		'senha'  => $senha,
//		'rua'    => $rua,
//		'cep'    => $cep,
//		'numero' => $numero,
//		'bairro' => $bairro,
//		'cidade' => $cidade,
//		'estado' => $estado
//	);

	return rest_ensure_response( $response );

}


function resgistrarApiUsuarioPost() {
	register_rest_route(
		'apiTeste', '/usuario', array(
			'methods'  => 'POST', //PUT
			'callback' => 'apiUsuarioPost'
		)
	);
}


add_action( 'rest_api_init', 'resgistrarApiUsuarioPost' );