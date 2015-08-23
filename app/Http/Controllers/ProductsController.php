<?php namespace App\Http\Controllers;

use App;
use App\Category;
use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use App\Http\Controllers\Controller;
use App\library\UploadImage;
use App\library\ResizeImage;
use App\library\DeleteFile;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller {

    /**
     * Only admins are allowed to view this page except index
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminOnly', ['except' => 'index']);
        $this->middleware('staffOnly');
    }


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
        $categoriesList = Category::lists('name', 'id');

        return view('products.create')->with([
            'categoriesList' => $categoriesList
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
        // Publish_date needs to be formatted for Jquery calendar
        $input = $request->all();
        $product = new Product();
        $product->category_id = $input['category_id'];
        $product->title = $input['title'];
        $product->name = $input['name'];
        $product->author = $input['author'];
        $product->publisher = $input['publisher'];
        $product->price = $input['price'];
        $product->description = $input['description'];
        $product->publish_date = date('Y-d-m', strtotime($input['publish_date']));
        $product->save();

        //$product = Product::create($input);

        // Save the newly created image path to the database
        if (!empty($_FILES['image']['name']))
        {
            $file = $this->uploadFile($destination, $max);
            $product->image = $file;
            $product->save();

            $resize = new ResizeImage($file, 400, 400);
            $resize->createResizeImage();
            $resize->createThumbNail(200, 200);
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
        $categories = Category::lists('name', 'id');

        return view('products.edit')->with([
            'product' => $product,
            'categoriesList' => $categories
        ]);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param CreateProductRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function update($id, CreateProductRequest $request)
	{
		// variables needed
        $product = Product::findOrFail($id);

        $max = 500 * 1024; //size of the image
        $destination =  public_path('images/products');

        // Upadate image
        if (!empty($_FILES['image']['name']))
        {
            $this->deleteImage($product->proImagePath);
            $file = $this->uploadFile($destination, $max);
            $product->image = $file;
            $product->save();

            $resize = new ResizeImage($file, 400, 400);
            $resize->createResizeImage();
            $resize->createThumbNail(200, 200);
        }

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
        $product = Product::findOrFail($id);

        //Delete the image and thumbnail
        $this->deleteImage($product->image);
        $product->delete();

        return redirect ('products');
	}

    /**
     * Upload a file
     *
     * @param $destination
     * @param $max
     * @return string
     * @throws \Exception
     */
    private function uploadFile($destination, $max)
    {
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

    /**
     * function that deletes an image from the folder
     *
     * @param $image
     */
    private function deleteImage($image)
    {
        $results = [];
        if(file_exists($image)) {
            try
            {
                $delete = new DeleteFile($image);
                $delete->deleteThumbnail();
                $delete->deleteFile();
                $results = $delete->getMessages();
            } catch (Exception $e)
            {
                $results = $e->getMessage();
            }
        }
    }

}
