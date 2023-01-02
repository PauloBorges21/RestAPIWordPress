<?php

function apiUsuarioPUT($request)
{
	// Verificando se tem usuario logado
	$user = wp_get_current_user();
	$userID = $user->ID;
	if ($userID > 0) {

		$email  = sanitize_email($request['email']);
		$senha  = $request['senha'];
		$nome   = sanitize_text_field($request['nome']);
		$rua    = sanitize_text_field($request['rua']);
		$cep    = sanitize_text_field($request['cep']);
		$numero = sanitize_text_field($request['numero']);
		$bairro = sanitize_text_field($request['bairro']);
		$cidade = sanitize_text_field($request['cidade']);
		$estado = sanitize_text_field($request['estado']);

		$email_exists = email_exists($email);

		if (!$email_exists || $email_exists === $userID) {
			$response = array(
				'ID'  => $userID,
				'user_pass' => $senha,
				'user_email' => $email,
				'display_name' => $nome,
				'first_name'   => $nome,
			
			);

			wp_update_user($response);
			update_user_meta($userID, 'rua', $rua);
			update_user_meta($userID, 'cep', $cep);
			update_user_meta($userID, 'numero', $numero);
			update_user_meta($userID, 'bairro', $bairro);
			update_user_meta($userID, 'cidade', $cidade);
			update_user_meta($userID, 'estado', $estado);
		} else {
			$response = new WP_Error('email', 'Email já cadastrado.', array('status' => 403));
			//echo $erroString = $response->get_error_message();

		}
	} else{
		$response = new WP_Error('permissao', 'Usuário não possui Permissão.', array('status' => 401));
	}

	return rest_ensure_response($response);
}


function resgistrarApiUsuarioPUT()
{
	register_rest_route(
		'api',
		'/usuario',
		array(
			array(
				'methods'  => WP_REST_Server::EDITABLE, //PUT
				'callback' => 'apiUsuarioPUT'
			)
		)
	);
}


add_action('rest_api_init', 'resgistrarApiUsuarioPUT');