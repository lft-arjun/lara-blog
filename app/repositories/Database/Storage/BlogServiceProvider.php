<?php namespace Database\Storage;
 
use Illuminate\Support\ServiceProvider;
 /**
  * Class Service Provider
  */
class BlogServiceProvider extends ServiceProvider 
{
 
 /**
  * @return object
  */
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