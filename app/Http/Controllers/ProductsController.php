<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use App\Http\Controllers\Controller;
use App\Services\UploadImage;
use App\Services\ResizeImage;

use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//get all products
        $products = Product::all();

        // Add instructions and a link
        $header = 'Product Information Page';
        $instructions = 'You can create, update, and delete product information';
        $createButton = 'Create Product';

        return view('products.index')->with([
            'products' => $products,
            'header' => $header,
            'instructions' => $instructions,
            'createButton' => $createButton
        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// variables needed
        $categories = Category::lists('catName', 'id');

        return view('products.create')->with([
            'categories' => $categories
        ]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateProductRequest $request)
	{
        // Variables needed
        $max = 500 * 1024; //size of the image
        $destination =  public_path('images/products'); //use local

		// Add values to the database
        $input = $request->all();
        $product = Product::create($input);

        // Prepare the uploaded file
        //not working
        if (Input::hasFile('proImage'))
        {
            $file = $this->uploadFile($destination, $max);
            // Save the newly created image path to the database
            if (file_exists($file))
            {
                $product->proImagePath = $file;
                $product->save();
            }
            // Image is resized and a thumbnail has been created
            if(file_exists($file))
            {
                $resize = new ResizeImage($file, 400, 400);
                $resize->createResizeImage();
                $resize->createThumbNail(200, 200);
            }
        }






        return redirect ('products');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//Variables needed
        $product = Product::findOrFail($id);

        return view('products.show')->with([
           'product' => $product
        ]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// variables needed
        $product = Product::findOrFail($id);
        $categories = Category::lists('catName', 'id');

        return view('products.edit')->with([
            'product' => $product,
            'categories' => $categories
        ]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CreateProductRequest $request)
	{
		// variables needed
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect('products');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


    private function uploadFile($destination, $max){
        try {
            $upload = new UploadImage($destination);
            $upload->setMaxSize($max);
            $upload->upload();
            $results = $upload->getMessages();
        } catch (Exception $e) {
            $results = $e->getMessage();
        }

        // Collecting the data to save into the table
        $fileName = $upload->getName(current($_FILES));
        $file = $destination . '/' . $fileName;

        return $file;
    }

    private function saveData() {

    }
}
