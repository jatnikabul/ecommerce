<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    public function images()
    {
        return $this->belongsToMany('App\Models\Image', 'product_images');
    }

    /**
     * Get the product_reviews for the product.
     */
    public function productReviews()
    {
        return $this->hasMany('App\Models\ProductReview', 'product_id');
    }

    public function orderProducts($order_by) {
        // secara default product akan di urutkan berdasarkan created_at
        // $query = 'SELECT * FROM products ORDER BY created_at DESC';

        // if ($order_by == 'best_seller') {
        //     // best seller
        //     // Untuk lebih lanjut bisa pelajari MYSQL
        //     // JOIN dan aggregation
        //     $query ="SELECT p.*, oi.quantity FROM products AS p
        //              LEFT JOIN (
        //                 SELECT products_id, SUM(quantity) as quantity from order_items
        //                     GROUP BY product_id
        //             ) AS oi ON oi.product_id = p.id
        //             ORDER BY oi.quantity DESC;";

        // } else if ($order_by == 'terbaik') {
        //     // terbaik
        //     // Untuk lebih lanjut pelajari MYSQL
        //     // JOIN dan aggregation

        //     // NOTE
        //     // anda harus mengubah query ini supaya bisa mengurutkan product berdasarkan rating tertinggi
        //     $query ="SELECT * FROM products ORDER BY created_at DESC";

        // } else if ($order_by == 'termurah') {
        //     // termurah
        //     $query = "SELECT * FROM products ORDER BY price ASC";

        // } else if ($order_by == 'termahal') {
        //     // termahal
        //     $query = "SELECT * FROM products ORDER BY price DESC";
        
        // } else if ($order_by == 'terbaru') {
        //     // terbaru
        //     $query = "SELECT * FROM products ORDER BY created_at DESC";
        // }

        // return DB::select($query);
        $query = DB::table('products')
    	->join('product_images','products.id','=','product_images.product_id')
    	->join('images','product_images.image_id','=','images.id');
    	if($order_by=='termurah'){
    		$query = $query->orderBy('products.price','asc');
    	} else if($order_by=='termahal'){
            $query = $query->orderBy('products.price','desc');
        } else if($order_by=='terbaru'){
            $query = $query->orderBy('products.created_at','desc');
        }
    	return $query->get();
    
    }
}

