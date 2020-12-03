<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coverpage;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Promotion;
use App\Models\PromotionPhoto;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductPhoto;

class PageController extends Controller
{
    public function Inicio()
    {
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();
        $categories_photo = Category::where('state', 1)->inRandomOrder()->limit(2)->get();
        $products = Product::where('outstanding', 1)->where('state', 1)->limit(20)->get();
        $promotion = Promotion::where('state',1)->first();

        return view('pages.inicio', [
            'coverpages' => $coverpages,
            'categories' => $categories,
            'categories_photo' => $categories_photo,
            'products' => $products,
            'promotion' => $promotion,
        ]);
    }

    public function Nosotros(){
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();

        return view('pages.nosotros',[
            'coverpages' => $coverpages,
            'categories' => $categories,
        ]);
    }

    public function Contactenos(){
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();

        return view('pages.contactenos', [
            'coverpages' => $coverpages,
            'categories' => $categories,
        ]);
    }

    public function CondicionesVenta(){
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();

        return view('pages.condiciones-venta', [
            'coverpages' => $coverpages,
            'categories' => $categories,
        ]);
    }

    public function CambiosDevoluciones(){
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();

        return view('pages.cambios-devoluciones', [
            'coverpages' => $coverpages,
            'categories' => $categories,
        ]);
    }

    public function GuiaTallas(){
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();

        return view('pages.guia-tallas', [
            'coverpages' => $coverpages,
            'categories' => $categories,
        ]);
    }

    public function Tienda(){
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();

        return view('pages.tienda', [
            'coverpages' => $coverpages,
            'categories' => $categories,
        ]);
    }

    public function PreguntasFrecuentes(){
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();

        return view('pages.preguntas-frecuentes', [
            'coverpages' => $coverpages,
            'categories' => $categories,
        ]);
    }

    //products

    public function Categorias(){
        $categories = Category::where('state', 1)->get();
        return view('pages.products.categorias', [
            'categories' => $categories
        ]);
    }

    public function ProductoCategory(Request $request){
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();

        $category = Category::find($request->category);
        $products = Product::where('state', 1)->where('id_category', $request->category)->get();
        return view('pages.products.producto-categoria', [
            'coverpages' => $coverpages,
            'categories' => $categories,
            'category' => $category,
            'products' => $products
        ]);
    }

    public function ProductoSubCategory(Request $request){
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();

        
        $subcategory = SubCategory::find($request->subcategory);
        $products = Product::where('state', 1)->where('id_subcategory', $request->subcategory)->get();
        $category = Category::find($subcategory->id_category);
        return view('pages.products.producto-subcategoria', [
            'coverpages' => $coverpages,
            'categories' => $categories,
            'subcategory' => $subcategory,
            'category' => $category,
            'products' => $products
        ]);
    }

    public function Producto(Request $request){
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();


        $product = Product::find($request->product);
        $related_product = json_decode($product->related_product);
        $product_colors = array();
        for ($i=0; $i < count($related_product); $i++) { 
            $r_product = Product::find($related_product[$i]);
            array_push($product_colors, $r_product);
        }
        $product_photos = ProductPhoto::where('id_product',$request->product)->get();
        $relateds = Product::where('state', 1)->where('id_category', $product->id_category)->where('id_product', '<>', $product->id_product)->inRandomOrder()->limit(8)->get(); 
        return view('pages.products.producto', [
            'coverpages' => $coverpages,
            'categories' => $categories,
            'product' => $product,
            'product_photos' => $product_photos,
            'relateds' => $relateds,
            'product_colors' => $product_colors,
        ]);
    }

    public function ProductoSearch(Request $request)
    {   
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();


        $products = Product::where('state', 1)->where('name', 'like', '%'.$request->q.'%')->get();
        return view('pages.products.search', [
            'coverpages' => $coverpages,
            'categories' => $categories,
            'products' => $products,
        ]);
    }




}
