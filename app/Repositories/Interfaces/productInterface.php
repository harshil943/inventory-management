<?php

namespace App\Repositories\Interfaces;

use App\User;

interface productInterface
{
    public function allProducts();

    public function productsByCategory($id);

    public function productById($id);

    public function categoryById($id);

    public function productsCategoryAll();

    public function deleteProduct($id);

    public function storeProduct($request);

    public function deleteCategory($id);

    public function storeCategory($request);
    
    public function updateCategory($request,$id);

    public function updateProduct($request,$id);



}