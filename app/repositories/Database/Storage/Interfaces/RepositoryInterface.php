<?php namespace Database\Storage\Interfaces;
 /**
  * Repository Interface 
  */
interface RepositoryInterface {
	public function all($param = null);
	public function find($id);
	public function create($input);
	public function update($id, $input);
	public function destroy($ids);
	public function search($param = null);
}