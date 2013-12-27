<?php

class AdminController extends BaseController {

	public function index()
	{
		return View::make('admin.index');
	}


	/**
	*
	* LUGARES
	*
	**/

	public function lugares_all()
	{
		$lugares = Lugar::orderBy('nombre', 'ASC')->get();
		return View::make('admin.lugares.all')->with('lugares', $lugares);
	}

	public function lugar($id)
	{
		$foto = Lugar::getThumb($id);
		echo $foto[0];

		$lugar = Lugar::find($id);
		$categorias = Categoria::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$etiquetas = Etiqueta::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$ciudades = Ciudad::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$zonas = Zona::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$thumb = Foto::where('id_lugar', '=', $id)->first();

		return View::make('admin.lugares.lugar')->with('lugar', $lugar)->with('categorias', $categorias)->with('etiquetas', $etiquetas)->with('ciudades', $ciudades)->with('zonas', $zonas)->with('thumb', $thumb);
	}

	public function get_add()
	{
		$categorias = Categoria::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$etiquetas = Etiqueta::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$ciudades = Ciudad::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$zonas = Zona::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');

		return View::make('admin.lugares.lugar')->with('categorias', $categorias)->with('etiquetas', $etiquetas)->with('ciudades', $ciudades)->with('zonas', $zonas);
	}

	public function post_add()
	{
		$input = Input::all();

		$rules = array(
			'nombre' => 'required',
			'categorias' => 'required',
			'etiquetas' => 'required',
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
				$lugar->longitud = Input::get('longitud');
				$lugar->latitud = Input::get('latitud');
				$lugar->direccion = Input::get('direccion');
				$lugar->telefono = Input::get('telefono');
				$lugar->web = Input::get('web');
				$lugar->twitter = Input::get('twitter');
				$lugar->facebook = Input::get('facebook');
				$lugar->ciudad = Input::get('ciudad');
				$lugar->zona = Input::get('zona');
			$lugar->save();

			$thumb = Input::get('thumb');

			$foto = new Foto;
			$foto->url = $thumb;
			$foto->tipo = 1;
			$foto->id_lugar = $lugar->id;
			$foto->estado = 1;
			$foto->save();

			$categorias = Input::get('categorias');
			foreach($categorias as $categoria)
			{
				$relation = new CategoriaLugar;
					$relation->id_lugar = $lugar->id;
					$relation->id_categoria = $categoria;
				$relation->save();
			}

			$etiquetas = Input::get('etiquetas');
			foreach($etiquetas as $etiqueta)
			{
				$relation = new EtiquetaLugar;
					$relation->id_lugar = $lugar->id;
					$relation->id_etiqueta = $etiqueta;
				$relation->save();
			}

			return Redirect::to('/admin/lugares');
		}
	}

	public function lugar_edit($id)
	{
		$input = Input::all();

		$rules = array(
			'nombre' => 'required',
			'categorias' => 'required',
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
				$lugar->longitud = Input::get('longitud');
				$lugar->latitud = Input::get('latitud');
				$lugar->direccion = Input::get('direccion');
				$lugar->telefono = Input::get('telefono');
				$lugar->web = Input::get('web');
				$lugar->twitter = Input::get('twitter');
				$lugar->facebook = Input::get('facebook');
				$lugar->ciudad = Input::get('ciudad');
				$lugar->zona = Input::get('zona');
			$lugar->save();

			$thumb = Input::get('thumb');

			$foto = Foto::where('id_lugar', '=', $id)->first();
			$foto->url = $thumb;
			$foto->save();

			$categorias = Input::get('categorias');
			$etiquetas = Input::get('etiquetas');

			$old_relations = CategoriaLugar::where('id_lugar', '=', $id)->delete();
			$old_relations_tag = EtiquetaLugar::where('id_lugar', '=', $id)->delete();

			foreach($categorias as $categoria)
			{
				$relation = new CategoriaLugar;
					$relation->id_lugar = $id;
					$relation->id_categoria = $categoria;
				$relation->save();
			}

			foreach($etiquetas as $etiqueta)
			{
				$relation = new EtiquetaLugar;
					$relation->id_lugar = $id;
					$relation->id_etiqueta = $etiqueta;
				$relation->save();
			}

			return Redirect::to('/admin/lugares');
		}
	}


	/*==========  CATEGORIAS  ==========*/
	

	public function categorias()
	{
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

	public function categorias_get_edit($id)
	{
		$categorias = Categoria::all();
		$categoria = Categoria::find($id);
		return View::make('admin.categorias.categorias')->with('categorias', $categorias)->with('categoria', $categoria);
	}

	public function categorias_post_edit($id)
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
			$categoria = Categoria::find($id);
				$categoria->slug = Input::get('slug');
				$categoria->descripcion = Input::get('descripcion');
			$categoria->save();

			return Redirect::to('/admin/categorias');
		}
	}

	public function categorias_delete($id)
	{
		$categoria = Categoria::find($id);
		$categoria->delete();
		return Redirect::to('/admin/categorias');
	}



	/*==========  ETIQUETAS  ==========*/



	public function etiquetas()
	{
		$etiquetas = Etiqueta::all();
		return View::make('admin.etiquetas.etiquetas')->with('etiquetas', $etiquetas);
	}

	public function etiquetas_add()
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
			$etiqueta = new Etiqueta;
				$etiqueta->slug = Input::get('slug');
				$etiqueta->descripcion = Input::get('descripcion');
			$etiqueta->save();

			return Redirect::to('/admin/etiquetas');
		}
	}

	public function etiquetas_get_edit($id)
	{
		$etiquetas = Etiqueta::all();
		$etiqueta = Etiqueta::find($id);
		return View::make('admin.etiquetas.etiquetas')->with('etiquetas', $etiquetas)->with('etiqueta', $etiqueta);
	}

	public function etiquetas_post_edit($id)
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
			$etiqueta = Etiqueta::find($id);
				$etiqueta->slug = Input::get('slug');
				$etiqueta->descripcion = Input::get('descripcion');
			$etiqueta->save();

			return Redirect::to('/admin/etiquetas');
		}
	}

	public function etiquetas_delete($id)
	{
		$etiqueta = Etiqueta::find($id);
		$etiqueta->delete();
		return Redirect::to('/admin/etiquetas');
	}

}