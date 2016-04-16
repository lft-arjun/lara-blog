<?php namespace Database\Storage\Interfaces;
 
interface RepositoryInterface {
   
  public function all();
  public function find($id);
  public function create($input);
  public function update($id, $input);
  public function destroy($ids);
 
}