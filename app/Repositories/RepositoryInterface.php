<?php

namespace App\Repositories;

use Illuminate\Http\Request;


interface RepositoryInterface
{
    public function take();

    public function all();

    public function create(array $data);

    public function find($id);

    public function delete($id);

    public function update($id, array $data);

    Public function might($slug);

    public function store(Request $request);
}
