<?php

class AdminController extends BaseController {

	public function index()
	{
		return View::make('admin.index');
	}

	public function lugares_all()
	{
		$lugares = Lugar::all();
		return View::make('admin.lugares.all')->with('lugares', $lugares);
	}

	public function lugar($id)
	{
		$foto = Lugar::getThumb($id);
		echo $foto[0];

		$lugar = Lugar::find($id);
		$categorias = Categoria::all()->lists('descripcion', 'id');
		$ciudades = Ciudad::all()->lists('descripcion', 'id');
		$zonas = Zona::all()->lists('descripcion', 'id');
		return View::make('admin.lugares.lugar')->with('lugar', $lugar)->with('categorias', $categorias)->with('ciudades', $ciudades)->with('zonas', $zonas);
	}

	public function get_add()
	{
		$categorias = Categoria::all()->lists('descripcion', 'id');
		$ciudades = Ciudad::all()->lists('descripcion', 'id');
		$zonas = Zona::all()->lists('descripcion', 'id');
		return View::make('admin.lugares.lugar')->with('categorias', $categorias)->with('ciudades', $ciudades)->with('zonas', $zonas);
	}

	public function post_add()
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
			$lugar = new Lugar;
				$lugar->nombre = Input::get('nombre');
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

			$categorias = Input::get('categorias');
			foreach($categorias as $categoria)
			{
				$relation = new CategoriaLugar;
					$relation->id_lugar = $lugar->id;
					$relation->id_categoria = $categoria;
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

			$categorias = Input::get('categorias');

			$old_relations = CategoriaLugar::where('id_lugar', '=', $id)->delete();

			foreach($categorias as $categoria)
			{
				$relation = new CategoriaLugar;
					$relation->id_lugar = $id;
					$relation->id_categoria = $categoria;
				$relation->save();
			}

			return Redirect::to('/admin/lugares');
		}
	}

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


}