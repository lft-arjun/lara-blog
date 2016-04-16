<?php namespace Database\Storage;
 
use Illuminate\Support\ServiceProvider;
 
class BlogServiceProvider extends ServiceProvider {
 
  public function register()
  {
    $this->app->bind(
		'Database\Storage\Interfaces\RepositoryInterface',
		'Database\Storage\User\EloquentUserRepository',
		'Database\Storage\Post\EloquentPostRepository',
		'Database\Storage\Post\EloquentCommentRepository'
    );
  }
 
}