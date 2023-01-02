<?php

function apiUsuarioGET( $request ) {

    //Usuario do Token
    $user = wp_get_current_user();
    $user_id = $user->ID;
	if($user_id > 0){
       $user_meta = get_user_meta($user_id); 

       $response = array(
        "id"=>$user->user_login,
        "nome"=>$user->display_name,
        "email"=>$user->user_email,
        "cep"=>$user_meta['cep'][0],
        "rua"=>$user_meta['rua'][0],        
        "numero"=>$user_meta['numero'][0],        
        "bairro"=>$user_meta['bairro'][0],        
        "cidade"=>$user_meta['cidade'][0],        
        "estado"=>$user_meta['estado'][0],
       );
    } else {
        $response = new WP_Error('permissão','Usuário não possui permissão', array('status'=>401));
    }


	return rest_ensure_response( $response);

}


function resgistrarApiUsuarioGET() {
	register_rest_route(
			'api', '/usuario', array(
				array(
			'methods'  => WP_REST_Server::READABLE, //PUT
			'callback' => 'apiUsuarioGET'
		))
	);
}


add_action( 'rest_api_init', 'resgistrarApiUsuarioGET' );