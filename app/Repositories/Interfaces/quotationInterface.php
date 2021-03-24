<?php

namespace App\Repositories\Interfaces;


interface quotationInterface
{
    public function Create($request);

    public function allQuotation();

    public function deleteQuote($id);
}