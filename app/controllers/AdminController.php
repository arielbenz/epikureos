<?php

class AdminController extends BaseController {

	public function index() {
		return View::make('admin.index');
	}

	/*==========  USUARIOS  ==========*/

	public function usuarios_all() {
		$usuarios = User::orderBy('id', 'ASC')->paginate(20);
		return View::make('admin.usuarios.all')->with('usuarios', $usuarios);
	}

	/*==========  COMENTARIOS  ==========*/

	public function comentarios_all() {
		$comentarios = Comentario::orderBy('id', 'ASC')->paginate(20);
		return View::make('admin.comentarios.all')->with('comentarios', $comentarios);
	}

	/*==========  LUGARES  ==========*/

	public function lugares_all() {
		$lugares = Lugar::orderBy('nombre', 'ASC')->paginate(20);
		return View::make('admin.lugares.all')->with('lugares', $lugares);
	}

	public function lugar($id) {
		$lugar = Lugar::find($id);
		$categorias = Categoria::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$etiquetas = Etiqueta::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$ciudades = Ciudad::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$mapas = Mapa::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$eventos = Evento::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$promos = Promo::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$niveles = Nivel::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$zonas = Zona::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$ocasiones = Ocasion::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$comidas = Comida::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$thumb = Foto::where('id_lugar', '=', $id)->where('tipo', '=', 1)->first();

		$slides = Foto::where('id_lugar', '=', $id)->where('tipo', '=', 2)->first();
		if ($slides == null) {
			$slides = 0;
		} else {
			$slides = $slides->cantidad;
		}

		return View::make('admin.lugares.lugar')->with('lugar', $lugar)->with('categorias', $categorias)->with('etiquetas', $etiquetas)->with('ciudades', $ciudades)->with('zonas', $zonas)->with('ocasiones', $ocasiones)->with('thumb', $thumb)->with('slides', $slides)->with('comidas', $comidas)->with('eventos', $eventos)->with('mapas', $mapas)->with('niveles', $niveles)->with('promos', $promos);
	}

	public function get_add() {
		$categorias = Categoria::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$etiquetas = Etiqueta::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$ciudades = Ciudad::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$mapas = Mapa::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$eventos = Evento::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$promos = Promo::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$niveles = Nivel::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$zonas = Zona::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$ocasiones = Ocasion::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$comidas = Comida::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');

		return View::make('admin.lugares.lugar')->with('categorias', $categorias)->with('etiquetas', $etiquetas)->with('ciudades', $ciudades)->with('zonas', $zonas)->with('ocasiones', $ocasiones)->with('comidas', $comidas)->with('eventos', $eventos)->with('mapas', $mapas)->with('niveles', $niveles)->with('promos', $promos);
	}

	public function post_add() {
		$input = Input::all();

		$rules = array(
			'nombre' => 'required',
			'categorias' => 'required',
			'etiquetas' => 'required',
			'estado' => 'required',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$lugar = new Lugar;
				$lugar->nombre = Input::get('nombre');
				$lugar->slug = Input::get('slug');
				$lugar->descripcion = Input::get('descripcion');
				$lugar->horario = Input::get('horario');
				$lugar->longitud = Input::get('longitud');
				$lugar->latitud = Input::get('latitud');
				$lugar->direccion = Input::get('direccion');
				$lugar->telefono = Input::get('telefono');
				$lugar->web = Input::get('web');
				$lugar->twitter = Input::get('twitter');
				$lugar->facebook = Input::get('facebook');
				$lugar->ciudad = Input::get('ciudad');
				$lugar->mapa_id = Input::get('mapa');
				$lugar->evento_id = Input::get('evento');
				$lugar->nivel_id = Input::get('nivel');
				$lugar->estado = Input::get('estado');
				$lugar->zona = Input::get('zona');
				$lugar->menu = Input::get('menu');
				$lugar->promo_id = Input::get('promo');
			$lugar->save();

			$thumb = Input::get('thumb');

			$fotoThumb = new Foto;
			$fotoThumb->cantidad = 1;
			$fotoThumb->tipo = 1;
			$fotoThumb->id_lugar = $lugar->id;
			$fotoThumb->save();

			$slides = Input::get('slides');

			$fotoSlide = new Foto;
			$fotoSlide->cantidad = $slides;
			$fotoSlide->tipo = 2;
			$fotoSlide->id_lugar = $lugar->id;
			$fotoSlide->save();

			$categorias = Input::get('categorias');
			foreach($categorias as $categoria) {
				$relation = new CategoriaLugar;
					$relation->id_lugar = $lugar->id;
					$relation->id_categoria = $categoria;
				$relation->save();
			}

			$etiquetas = Input::get('etiquetas');
			foreach($etiquetas as $etiqueta) {
				$relation = new EtiquetaLugar;
					$relation->id_lugar = $lugar->id;
					$relation->id_etiqueta = $etiqueta;
				$relation->save();
			}

			$ocasiones = Input::get('ocasiones');
			if($ocasiones != null) {
				foreach($ocasiones as $ocasion) {
					$relation = new OcasionLugar;
						$relation->lugar_id = $lugar->id;
						$relation->ocasion_id = $ocasion;
					$relation->save();
				}
			}

			$comidas = Input::get('comidas');
			if($comidas != null) {
				foreach($comidas as $comida) {
					$relation = new ComidaLugar;
						$relation->lugar_id = $lugar->id;
						$relation->comida_id = $comida;
					$relation->save();
				}
			}

			return Redirect::to('/admin/lugares');
		}
	}

	public function lugar_edit($id)	{
		$input = Input::all();

		$rules = array(
			'nombre' => 'required',
			'categorias' => 'required',
			'etiquetas' => 'required',
			'estado' => 'required',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$lugar = Lugar::find($id);
				$lugar->nombre = Input::get('nombre');
				$lugar->slug = Input::get('slug');
				$lugar->descripcion = Input::get('descripcion');
				$lugar->horario = Input::get('horario');
				$lugar->longitud = Input::get('longitud');
				$lugar->latitud = Input::get('latitud');
				$lugar->direccion = Input::get('direccion');
				$lugar->telefono = Input::get('telefono');
				$lugar->web = Input::get('web');
				$lugar->twitter = Input::get('twitter');
				$lugar->facebook = Input::get('facebook');
				$lugar->ciudad = Input::get('ciudad');
				$lugar->mapa_id = Input::get('mapa');
				$lugar->evento_id = Input::get('evento');
				$lugar->nivel_id = Input::get('nivel');
				$lugar->estado = Input::get('estado');
				$lugar->zona = Input::get('zona');
				$lugar->menu = Input::get('menu');
				$lugar->promo_id = Input::get('promo');
			$lugar->save();

			$thumb = Input::get('thumb');
			$fotoThumb = Foto::where('id_lugar', '=', $id)->where('tipo', '=', 1)->first();
			$fotoThumb->cantidad = $thumb;
			$fotoThumb->save();

			$slides = Input::get('slides');
			$fotoSlide = Foto::where('id_lugar', '=', $id)->where('tipo', '=', 2)->first();
			if ($fotoSlide == null) {
				$fotoSlide = new Foto;
				$fotoSlide->tipo = 2;
				$fotoSlide->id_lugar = $lugar->id;
			}
			$fotoSlide->cantidad = $slides;
			$fotoSlide->save();


			$categorias = Input::get('categorias');
			$etiquetas = Input::get('etiquetas');
			$ocasiones = Input::get('ocasiones');
			$comidas = Input::get('comidas');

			$old_relations = CategoriaLugar::where('id_lugar', '=', $id)->delete();
			$old_relations_tag = EtiquetaLugar::where('id_lugar', '=', $id)->delete();
			$old_relations_ocasiones = OcasionLugar::where('lugar_id', '=', $id)->delete();
			$old_relations_comidas = ComidaLugar::where('lugar_id', '=', $id)->delete();

			foreach($categorias as $categoria) {
				$relation = new CategoriaLugar;
					$relation->id_lugar = $id;
					$relation->id_categoria = $categoria;
				$relation->save();
			}

			foreach($etiquetas as $etiqueta) {
				$relation = new EtiquetaLugar;
					$relation->id_lugar = $id;
					$relation->id_etiqueta = $etiqueta;
				$relation->save();
			}

			if($ocasiones != null) {
				foreach($ocasiones as $ocasion)	{
					$relation = new OcasionLugar;
						$relation->lugar_id = $lugar->id;
						$relation->ocasion_id = $ocasion;
					$relation->save();
				}
			}

			if($comidas != null) {
				foreach($comidas as $comida)	{
					$relation = new ComidaLugar;
						$relation->lugar_id = $lugar->id;
						$relation->comida_id = $comida;
					$relation->save();
				}
			}

			return Redirect::to('/admin/lugares');
		}
	}

	/*==========  CATEGORIAS  ==========*/
	
	public function categorias() {
		$categorias = Categoria::all();
		return View::make('admin.categorias.categorias')->with('categorias', $categorias);
	}

	public function categorias_add()
	{
		$input = Input::all();

		$rules = array(
			'slug' => 'required',
			'descripcion' => 'required',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$categoria = new Categoria;
				$categoria->slug = Input::get('slug');
				$categoria->descripcion = Input::get('descripcion');
			$categoria->save();

			return Redirect::to('/admin/categorias');
		}
	}

	public function categorias_get_edit($id) {
		$categorias = Categoria::all();
		$categoria = Categoria::find($id);
		return View::make('admin.categorias.categorias')->with('categorias', $categorias)->with('categoria', $categoria);
	}

	public function categorias_post_edit($id) {
		$input = Input::all();

		$rules = array(
			'slug' => 'required',
			'descripcion' => 'required',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$categoria = Categoria::find($id);
				$categoria->slug = Input::get('slug');
				$categoria->descripcion = Input::get('descripcion');
			$categoria->save();

			return Redirect::to('/admin/categorias');
		}
	}

	public function categorias_delete($id) {
		$categoria = Categoria::find($id);
		$categoria->delete();
		return Redirect::to('/admin/categorias');
	}

	/*==========  ETIQUETAS  ==========*/

	public function etiquetas() {
		$etiquetas = Etiqueta::all();
		return View::make('admin.etiquetas.etiquetas')->with('etiquetas', $etiquetas);
	}

	public function etiquetas_add()	{
		$input = Input::all();

		$rules = array(
			'slug' => 'required',
			'descripcion' => 'required',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$etiqueta = new Etiqueta;
				$etiqueta->slug = Input::get('slug');
				$etiqueta->descripcion = Input::get('descripcion');
			$etiqueta->save();

			return Redirect::to('/admin/etiquetas');
		}
	}

	public function etiquetas_get_edit($id)	{
		$etiquetas = Etiqueta::all();
		$etiqueta = Etiqueta::find($id);
		return View::make('admin.etiquetas.etiquetas')->with('etiquetas', $etiquetas)->with('etiqueta', $etiqueta);
	}

	public function etiquetas_post_edit($id) {
		$input = Input::all();

		$rules = array(
			'slug' => 'required',
			'descripcion' => 'required',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$etiqueta = Etiqueta::find($id);
				$etiqueta->slug = Input::get('slug');
				$etiqueta->descripcion = Input::get('descripcion');
			$etiqueta->save();

			return Redirect::to('/admin/etiquetas');
		}
	}

	public function etiquetas_delete($id) {
		$etiqueta = Etiqueta::find($id);
		$etiqueta->delete();
		return Redirect::to('/admin/etiquetas');
	}

	/*==========  COMIDAS  ==========*/

	public function comidas() {
		$comidas = Comida::all();
		return View::make('admin.comidas.comidas')->with('comidas', $comidas);
	}

	public function comidas_add()	{
		$input = Input::all();

		$rules = array(
			'slug' => 'required',
			'descripcion' => 'required',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$comida = new Comida;
				$comida->slug = Input::get('slug');
				$comida->descripcion = Input::get('descripcion');
			$comida->save();

			return Redirect::to('/admin/comidas');
		}
	}

	public function comidas_get_edit($id)	{
		$comidas = Comida::all();
		$comida = Comida::find($id);
		return View::make('admin.comidas.comidas')->with('comidas', $comidas)->with('comida', $comida);
	}

	public function comidas_post_edit($id) {
		$input = Input::all();

		$rules = array(
			'slug' => 'required',
			'descripcion' => 'required',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$comida = Comida::find($id);
				$comida->slug = Input::get('slug');
				$comida->descripcion = Input::get('descripcion');
			$comida->save();

			return Redirect::to('/admin/comidas');
		}
	}

	public function comidas_delete($id) {
		$comida = Comida::find($id);
		$comida->delete();
		return Redirect::to('/admin/comidas');
	}

}