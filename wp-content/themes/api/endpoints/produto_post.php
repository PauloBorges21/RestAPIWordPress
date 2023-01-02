<?php

function apiProdutoPOST($request)
{
	// Verificando se tem usuario logado
	$user = wp_get_current_user();
	$userID = $user->ID;
	if ($userID > 0) {

		$nome   = sanitize_text_field($request['nome']);
		$preco    = sanitize_text_field($request['preco']);
		$descricao = sanitize_text_field($request['descricao']);
		$usuarioID = $user->user_login;

		
			$response = array(
				'post_author' => $userID,
				'post_type' => '$produto',
				'post_title' => $nome,
				'post_status' =>'publish',
				'meta_input' => array(
					'nome' => $nome,
					'preco' => $preco,
					'descricao' => $descricao,
					'usuario_id' =>$usuarioID,
					'vendido' => 'false',
				),
			);

			$produtoID = wp_insert_post($response);
			$response['id'] = get_post_field('post_name', $produtoID);
			$files = $request->get_files_params();
			if($files){
				require_once(ABSPATH . 'wp-admin/includes/image.php');
				require_once(ABSPATH . 'wp-admin/includes/file.php');	
				require_once(ABSPATH . 'wp-admin/includes/media.php');
				foreach($files as $file => $array):
					media_handle_upload($file, $produtoID);
				endforeach;
			}
		} else {
			$response = new WP_Error('permissao', 'Usuário não possui permissão.', array('status' => 403));
			//echo $erroString = $response->get_error_message();

		}
	

	return rest_ensure_response($response);
}


function resgistrarApiProdutoPOST()
{
	register_rest_route(
		'api',
		'/produto',
		array(
			array(
				'methods'  => WP_REST_Server::CREATABLE, //PUT
				'callback' => 'apiProdutoPOST'
			)
		)
	);
}


add_action('rest_api_init', 'resgistrarapiProdutoPOST');