<?php namespace Database\Storage\Interfaces;
 
interface RepositoryInterface {
	public function all($param = null);
	public function find($id);
	public function create($input);
	public function update($id, $input);
	public function destroy($ids);
	public function search($param = null);
}