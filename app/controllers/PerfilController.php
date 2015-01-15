<?php

	class PerfilController extends BaseController {

		public function get_perfil($user_id) {

			$user = User::where('id', '=', $user_id)->first();

			$comentarios = $user->comentarios()->get();

			return View::make('perfil.index')->with('user', $user)->with('comentarios', $comentarios)->with('seccion', 'perfil');

		}

	}

?>